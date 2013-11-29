<?php
define('IN_PHPSSO', true);

class phpsso {

	public $db, $settings, $applist, $appid, $data;
	/**
	 * 构造函数
	 */
	public function __construct() {
		$this->db = pc_base::load_model('member_model');
		pc_base::load_app_func('global');
		
		/*获取系统配置*/
		$this->settings = getcache('settings', 'admin');
		$this->applist = getcache('applist', 'admin');

		if(isset($_GET) && is_array($_GET) && count($_GET) > 0) {
			foreach($_GET as $k=>$v) {
				if(!in_array($k, array('m','c','a'))) {
					$_POST[$k] = $v;
				}
			}
		}

		if(isset($_POST['appid'])) {
			$this->appid = intval($_POST['appid']);
		} else {
			exit('0');
		}

		if(isset($_POST['data'])) {
			parse_str(sys_auth($_POST['data'], 'DECODE', $this->applist[$this->appid]['authkey']), $this->data);
					
			if(!is_array($this->data)) {
				exit('0');
			}
		} else {
			exit('0');
		}
		
		if(isset($GLOBALS['HTTP_RAW_POST_DATA'])) {
			$this->data['avatardata'] = $GLOBALS['HTTP_RAW_POST_DATA'];
			if($this->applist[$this->appid]['authkey'] != $this->data['ps_auth_key']) {
				exit('0');
			}
		}

	}

}