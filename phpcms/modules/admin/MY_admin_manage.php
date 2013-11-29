<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin', 'admin_mange', 0);

class MY_admin_manage extends admin_manage {
    protected $adminDB, $roleDB;

    public function __construct() {
        parent::__construct();
		$this->adminDB = pc_base::load_model('admin_model');
		$this->roleDB = pc_base::load_model('admin_role_model');
    }

	/**
	 * 管理员管理列表
     * 屏蔽掉超级管理员
	 */
	public function init() {
		$userid = $_SESSION['userid'];
		$admin_username = param::get_cookie('admin_username');
		$page = $_GET['page'] ? intval($_GET['page']) : '1';
        if ($userid == 1) {
		    $infos = $this->adminDB->listinfo('', '', $page, 20);
        }else{
		    $infos = $this->adminDB->listinfo('roleid != 1', '', $page, 20);
        }
		$pages = $this->adminDB->pages;
		$roles = getcache('role','commons');
        $safe_card = pc_base::load_config('system', 'safe_card', 0);
		include $this->admin_tpl('admin_list');
	}

	/**
	 * 添加管理员
	 */
	public function add() {
		if(isset($_POST['dosubmit'])) {
			$info = array();
			if(!$this->op->checkname($_POST['info']['username'])){
				showmessage(L('admin_already_exists'));
			}
			$info = checkuserinfo($_POST['info']);		
			if(!checkpasswd($info['password'])){
				showmessage(L('pwd_incorrect'));
			}
			$passwordinfo = password($info['password']);
			$info['password'] = $passwordinfo['password'];
			$info['encrypt'] = $passwordinfo['encrypt'];
			
			$admin_fields = array('username', 'email', 'password', 'encrypt','roleid','realname');
			foreach ($info as $k=>$value) {
				if (!in_array($k, $admin_fields)){
					unset($info[$k]);
				}
			}
			$this->adminDB->insert($info);
			if($this->adminDB->insert_id()){
				showmessage(L('operation_success'),'?m=admin&c=admin_manage');
			}
		} else {
		    $userid = $_SESSION['userid'];
            $condition = array('disabled' => 0);
            if ($userid != 1) { // 對他人屏蔽超級管理員角色
                $condition = '`disabled` = 0 AND `roleid` != 1';
            }
			$roles = $this->roleDB->select($condition);
			include $this->admin_tpl('admin_add');
		}
		
	}
}
