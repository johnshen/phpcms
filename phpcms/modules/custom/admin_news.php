<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);

class admin_announce extends admin {
	private $db; 
    public $username;

	public function __construct() {
		parent::__construct();
		$this->username = param::get_cookie('admin_username');
		$this->db = pc_base::load_model('news_model');
	}
	
	public function init() {
		//公告列表
		$sql = '';
		$_GET['status'] = $_GET['status'] ? intval($_GET['status']) : 1;
		$sql = '`siteid`=\''.$this->get_siteid().'\'';
		switch($_GET['s']) {
			case '1': $sql .= ' AND `passed`=\'1\' AND (`endtime` >= \''.date('Y-m-d').'\' or `endtime`=\'0000-00-00\')'; break;
			case '2': $sql .= ' AND `passed`=\'0\''; break;
			case '3': $sql .= ' AND `passed`=\'1\' AND `endtime`!=\'0000-00-00\' AND `endtime` <\''.date('Y-m-d').'\' '; break;
		}
		$page = max(intval($_GET['page']), 1);
		$data = $this->db->listinfo($sql, '`id` DESC', $page);
		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=announce&c=admin_announce&a=add\', title:\''.L('announce_add').'\', width:\'700\', height:\'500\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('announce_add'));
		include $this->admin_tpl('news_list');
	}
	
	/**
	 * 添加公告
	 */
	public function add() {
		if(isset($_POST['dosubmit'])) {
			$_POST['announce'] = $this->check($_POST['announce']);
			if($this->db->insert($_POST['announce'])) showmessage(L('announcement_successful_added'), HTTP_REFERER, '', 'add');
		} else {
			//获取站点模板信息
			pc_base::load_app_func('global', 'admin');
			$siteid = $this->get_siteid();
			$template_list = template_list($siteid, 0);
			$site = pc_base::load_app_class('sites','admin');
			$info = $site->get_by_id($siteid);
			foreach ($template_list as $k=>$v) {
				$template_list[$v['dirname']] = $v['name'] ? $v['name'] : $v['dirname'];
				unset($template_list[$k]);
			}
			$show_header = $show_validator = $show_scroll = 1;
			pc_base::load_sys_class('form', '', 0);
			include $this->admin_tpl('news_add');
		}
	}
	
	/**
	 * 修改公告
	 */
	public function edit() {
		$_GET['aid'] = intval($_GET['aid']);
		if(!$_GET['aid']) showmessage(L('illegal_operation'));
		if(isset($_POST['dosubmit'])) {
			$_POST['announce'] = $this->check($_POST['announce'], 'edit');
			if($this->db->update($_POST['announce'], array('aid' => $_GET['aid']))) showmessage(L('announced_a'), HTTP_REFERER, '', 'edit');
		} else {
			$where = array('aid' => $_GET['aid']);
			$an_info = $this->db->get_one($where);
			pc_base::load_sys_class('form', '', 0);
			//获取站点模板信息
			pc_base::load_app_func('global', 'admin');
			$template_list = template_list($this->siteid, 0);
			foreach ($template_list as $k=>$v) {
				$template_list[$v['dirname']] = $v['name'] ? $v['name'] : $v['dirname'];
				unset($template_list[$k]);
			}
			$show_header = $show_validator = $show_scroll = 1;
			include $this->admin_tpl('news_edit');
		}
	}
}
