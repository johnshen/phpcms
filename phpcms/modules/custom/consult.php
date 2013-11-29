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
            //$data = array(
            //   'subject_id'     => array2string($_POST['subjects']),
            //   'username'       => $_POST['username'],
            //   'telephone'      => $_POST['telephone'],
            //   'address'        => $_POST['address'],
            //   'qq'             => $_POST['qq'],
            //   'ip'             => ip(),
            //   'appointment_num'=> $_POST['appointment_num'],
            //   'appointment_day'=> $_POST['appointment_day'],
            //   'created_time'   => time()
            //);

            $subject = 'title';//邮件的标题
            $message = 'content';  //邮件的内容
            $mailto='263668900@qq.com'; //接收邮件的邮箱
            pc_base::load_sys_func('mail');
            sendmail($mailto, $subject, $message);

            //$this->_signupModel->insert($data);
            showmessage('申请成功,我们会尽快和您取得联系', APP_PATH);
        }
    }
}
