<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);

class admin_news extends admin {
	private $db; 
    public $username;

	public function __construct() {
		parent::__construct();
		$this->username = param::get_cookie('admin_username');
		$this->db = pc_base::load_model('custom_news_model');
	}
	
	public function init() {
		//公告列表
		$sql = '';
		$sql = '`siteid`=\''.$this->get_siteid().'\'';
		//switch($_GET['s']) {
		//	case '1': $sql .= ' AND `passed`=\'1\' AND (`endtime` >= \''.date('Y-m-d').'\' or `endtime`=\'0000-00-00\')'; break;
		//	case '2': $sql .= ' AND `passed`=\'0\''; break;
		//	case '3': $sql .= ' AND `passed`=\'1\' AND `endtime`!=\'0000-00-00\' AND `endtime` <\''.date('Y-m-d').'\' '; break;
		//}
		$page = max(intval($_GET['page']), 1);
		$data = $this->db->listinfo($sql, '`id` DESC', $page);
		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=custom&c=admin_news&a=add\', title:\''.L('news_add').'\', width:\'600\', height:\'400\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('news_add'));
		include $this->admin_tpl('news_list');
	}
	
	/**
	 * 添加公告
	 */
	public function add() {
		if(isset($_POST['dosubmit'])) {
			$_POST['news'] = $this->check($_POST['news']);
			if($this->db->insert($_POST['news'])) showmessage(L('news_successful_added'), HTTP_REFERER, '', 'add');
		} else {
			//获取站点模板信息
			pc_base::load_app_func('global', 'admin');
			$siteid = $this->get_siteid();
			$show_header = $show_validator = $show_scroll = 1;
			pc_base::load_sys_class('form', '', 0);
			include $this->admin_tpl('news_add');
		}
	}
	
	/**
	 * 修改公告
	 */
	public function edit() {
		$_GET['id'] = intval($_GET['id']);
		if(!$_GET['id']) showmessage(L('illegal_operation'));
		if(isset($_POST['dosubmit'])) {
			$_POST['news'] = $this->check($_POST['news'], 'edit');
			if($this->db->update($_POST['news'], array('id' => $_GET['id']))) showmessage(L('news_a'), HTTP_REFERER, '', 'edit');
		} else {
			$where = array('id' => $_GET['id']);
			$an_info = $this->db->get_one($where);
			pc_base::load_sys_class('form', '', 0);
			$show_header = $show_validator = $show_scroll = 1;
			include $this->admin_tpl('news_edit');
		}
	}

	/**
	 * 批量删除公告
	 */
	public function delete($id = 0) {
		if((!isset($_POST['id']) || empty($_POST['id'])) && !$id) {
			showmessage(L('illegal_operation'));
		} else {
			if(is_array($_POST['id']) && !$id) {
				array_map(array($this, 'delete'), $_POST['id']);
				showmessage(L('news_deleted'), HTTP_REFERER);
			} elseif($id) {
				$this->db->delete(array('id' => intval($id)));
			}
		}
	}

	/**
	 * 验证表单数据
	 * @param  		array 		$data 表单数组数据
	 * @param  		string 		$a 当表单为添加数据时，自动补上缺失的数据。
	 * @return 		array 		验证后的数据
	 */
	private function check($data = array(), $a = 'add') {
		if($data['content']=='') showmessage(L('news_cannot_be_empty'));
		if (strtotime($data['endtime'])<strtotime($data['starttime'])) {
			$data['endtime'] = '';
		}
		if ($a=='add') {
			$data['siteid'] = $this->get_siteid();
			$data['createtime'] = date('Y-m-d H:i:s');
			$data['username'] = $this->username;
			if ($data['starttime'] == '') $data['starttime'] = date('Y-m-d');
		} else {
			if ($r['id'] && ($r['id']!=$_GET['id'])) {
				showmessage(L('news_exist'), HTTP_REFERER);
			}
		}
		return $data;
	}
}
