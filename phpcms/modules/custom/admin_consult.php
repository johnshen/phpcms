<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
class admin_consult extends admin {

	function __construct() {
		parent::__construct();
		$this->db = pc_base::load_model('consult_model');
	}

	public function init() {
        $where = array();
        $order = 'createtime DESC';
 		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$advices = $this->db->listinfo($where, $order, $page);
		$pages = $this->db->pages;
		include $this->admin_tpl('consult_list');
	}

    public function delete() {
            if (isset($_REQUEST['id'])) {
                $ids = array($_REQUEST['id']);
            }else {
                showmessage(L('illegal_parameters'), HTTP_REFERER);
            }
            $where = sprintf('`id` in (%s)', implode(',', $ids));
            $this->db->delete($where);
            showmessage(L('operation_success'), HTTP_REFERER);
    }
}
?>
