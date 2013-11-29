<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
class legalAdvice extends admin {

	function __construct() {
		parent::__construct();
		$this->db = pc_base::load_model('legal_advice_model');
	}

	public function init() {
        $where = array();
        $order = 'createtime DESC';
 		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$advices = $this->db->listinfo($where, $order, $page);
		$pages = $this->db->pages;
		include $this->admin_tpl('advice_list');
	}

    public function delete() {
        if (isset($_REQUEST['dosubmit'])) {
            if (isset($_REQUEST['id'])) {
                $ids = array($_REQUEST['id']);
            }else {
                showmessage(L('illegal_parameters'), HTTP_referer);
            }
            $where = sprintf('`id` in (%s)', implode(',', $ids));
            $this->db->delete($where);
            showmessage(L('operation_success'), HTTP_REFERER);
        }
    }
}
?>
