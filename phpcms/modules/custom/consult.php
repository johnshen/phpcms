<?php
defined('IN_PHPCMS') or exit('No permission resources.');

class consult {
    protected $db;

    public function __construct() {
        $this->db = pc_base::load_model('consult_model');
    }

    public function init() {
        pc_base::load_sys_class('form', '', 0);

		if(isset($_GET['siteid'])) {
			$siteid = intval($_GET['siteid']);
		} else {
			$siteid = 1;
		}
		$siteid = $GLOBALS['siteid'] = max($siteid,1);
        $catid = 13;
		define('SITEID', $siteid);
		$_userid = param::get_cookie('_userid');
		$_username = param::get_cookie('_username');
		$_groupid = param::get_cookie('_groupid');

		//SEO
		$SEO = seo($siteid);
		$sitelist  = getcache('sitelist','commons');
		$default_style = $sitelist[$siteid]['default_style'];
		$CATEGORYS = getcache('category_content_'.$siteid,'commons');
		if(!isset($CATEGORYS[$catid])) showmessage(L('information_does_not_exist'),'blank');
        $data = $CATEGORYS[$catid];
		extract($data);

		include template('custom', 'consult');
    }

    public function send() {
        if (isset($_POST['dosubmit'])) {

            $session_storage = 'session_'.pc_base::load_config('system','session_storage');
            pc_base::load_sys_class($session_storage);
            if (strtolower($_POST['vcode']) != $_SESSION['code']) {
                showmessage('请输入正确的验证码', HTTP_REFERER);
            }
            if (is_emai($_POST['email']) == false) {
                showmessage('请输入正确的验证码', HTTP_REFERER);
            }
            $data = array(
               'username'       => remove_xss($_POST['username']),
               'sex'            => $_POST['sex'],
               'phone'          => $_POST['phone'],
               'email'          => $_POST['email'],
               'appointment_day'=> $_POST['appointment_day'],
               'appointment_time'=> $_POST['appointment_time'],
               'topic'          => remove_xss($_POST['topic']),
               'content'        => remove_xss($_POST['content']),
               'createtime'     => date('Y-m-d')
            );

            // 获取邮件模板路径
            if(defined('SITEID')) {
                $siteid = SITEID;
            } else {
                $siteid = param::get_cookie('siteid');
            }
            if (!$siteid) $siteid = 1;
            $sitelist = getcache('sitelist','commons');
            if(!empty($siteid)) {
                $style = $sitelist[$siteid]['default_style'];
            }
            if(!$style) $style = 'default';

		    $tplfile = PC_PATH.'templates'.DIRECTORY_SEPARATOR.$style.DIRECTORY_SEPARATOR.'custom'.DIRECTORY_SEPARATOR.'consult_mail.html';

            // 邮件数据
            $mailContext = $data;
            if ($data['sex'] == '1') {
                $mailContext['sexDesc'] = '先生';
            }else {
                $mailContext['sexDesc'] = '小姐';
            }
            $mailBody = file_get_contents($tplfile);

            $mailReplaces = array_values($mailContext);
            $mailFinds = array();
            foreach($mailContext as $mailKey => $mailVal) {
                $mailFinds[] = '{' . $mailKey.'}';
            }
            $mailBody = str_replace($mailFinds, $mailReplaces, $mailBody);
            $mailto='sq6997@163.com'; //接收邮件的邮箱
            pc_base::load_sys_func('mail');
            sendmail($mailto, $data['topic'], $mailBody);

            $this->db->insert($data);
            showmessage('預約申請已經發送成功 ', 'index.php?m=content&c=index&a=lists&catid=2');
        }
    }

    //public function genConsultMail() {
    //    if (isset($_POST['sig') == false) {
    //        die('Bad Request'); 
    //    }
    //    $sig = $_POST['sig'];
    //    $data = array2string(ksort($_POST));
    //    if (sys_auth($data, 'DECODE', 'xingwang') == '') {
    //        die('Bad Request'); 
    //    }
    //    extract($_POST);
    //    include template('custom', 'consult_mail');
    //}
}
