<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
pc_base::load_sys_class('form','',0);

class urlrule extends admin {
	function __construct() {
		parent::__construct();
		$this->db = pc_base::load_model('urlrule_model');
		$this->module_db = pc_base::load_model('module_model');
	}
	
	function init () {
		$page = intval($_GET['page']);
		$infos = $this->db->listinfo('','',$page);
		$pages = $this->db->pages;
		$big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=admin&c=urlrule&a=add\', title:\''.L('add_urlrule').'\', width:\'750\', height:\'300\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('add_urlrule'));
		$this->public_cache_urlrule();
		include $this->admin_tpl('urlrule_list');
	}
	function add() {
		if(isset($_POST['dosubmit'])) {
			$this->db->insert($_POST['info']);
			$this->public_cache_urlrule();
			showmessage(L('add_success'),'','','add');
		} else {
			$show_validator = $show_header = '';
			$modules_arr = $this->module_db->select('','module,name');
			
			$modules = array();
			foreach ($modules_arr as $r) {
				$modules[$r['module']] = $r['name'];
			}
		
			include $this->admin_tpl('urlrule_add');
		}
	}
	function delete() {
		$_GET['urlruleid'] = intval($_GET['urlruleid']);
		$this->db->delete(array('urlruleid'=>$_GET['urlruleid']));
		$this->public_cache_urlrule();
		showmessage(L('operation_success'),HTTP_REFERER);
	}
	
	function edit() {
		if(isset($_POST['dosubmit'])) {
			$urlruleid = intval($_POST['urlruleid']);
			$this->db->update($_POST['info'],array('urlruleid'=>$urlruleid));
			$this->public_cache_urlrule();
			showmessage(L('update_success'),'','','edit');
		} else {
			$show_validator = $show_header = '';
			$urlruleid = $_GET['urlruleid'];
			$r = $this->db->get_one(array('urlruleid'=>$urlruleid));
			extract($r);
			$modules_arr = $this->module_db->select('','module,name');
			
			$modules = array();
			foreach ($modules_arr as $r) {
				$modules[$r['module']] = $r['name'];
			}
			include $this->admin_tpl('urlrule_edit');
		}
	}
	/**
	 * 更新URL规则
	 */
	public function public_cache_urlrule() {
		$datas = $this->db->select('','*','','','','urlruleid');
		$basic_data = array();
		foreach($datas as $roleid=>$r) {
			$basic_data[$roleid] = $r['urlrule'];;
		}
		setcache('urlrules_detail',$datas,'commons');
		setcache('urlrules',$basic_data,'commons');
	}
}
?>