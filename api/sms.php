<?php
defined('IN_PHPCMS') or exit('No permission resources.'); 
/**
 * 短信发送接口
 */
pc_base::load_app_class('smsapi', 'sms', 0); //引入smsapi类
$sms_report_db = pc_base::load_model('sms_report_model');
$mobile = $_GET['mobile'];
$siteid = get_siteid() ? get_siteid() : 1 ;
$sms_setting = getcache('sms','sms');
if(!preg_match('/^(?:13\d{9}|15[0|1|2|3|5|6|7|8|9]\d{8}|18[0|2|3|5|6|7|8|9]\d{8}|14[5|7]\d{8})$/',$mobile)) exit('mobile phone error');
$posttime = SYS_TIME-86400;
$where = "`mobile`='$mobile' AND `posttime`>'$posttime'";
$num = $sms_report_db->count($where);
if($num > 3) {
	exit('-1');//当日发送短信数量超过限制 3 条
}
//同一IP 24小时允许请求的最大数
$allow_max_ip = 10;//正常注册相当于 10 个人
$ip = ip();
$where = "`ip`='$ip' AND `posttime`>'$posttime'";
$num = $sms_report_db->count($where);
if($num >= $allow_max_ip) {
	exit('-3');//当日单IP 发送短信数量超过 $allow_max_ip
}
if(intval($sms_setting[$siteid]['sms_enable']) == 0) exit('-99'); //短信功能关闭
$sms_uid = $sms_setting[$siteid]['userid'];//短信接口用户ID
$sms_pid = $sms_setting[$siteid]['productid'];//产品ID
$sms_passwd = $sms_setting[$siteid]['sms_key'];//32位密码

$id_code = random(6);//唯一吗，用于扩展验证
//$send_txt = '尊敬的用户您好，您在'.$sitename.'的注册验证码为：'.$id_code.'，验证码有效期为5分钟。';
$send_txt = $id_code;

$send_userid = intval($_GET['send_userid']);//操作者id


$smsapi = new smsapi($sms_uid, $sms_pid, $sms_passwd); //初始化接口类
$smsapi->get_price(); //获取短信剩余条数和限制短信发送的ip地址
$mobile = explode(',',$mobile);

$tplid = 1;
$sent_time = intval($_POST['sendtype']) == 2 && !empty($_POST['sendtime'])  ? trim($_POST['sendtime']) : date('Y-m-d H:i:s',SYS_TIME);
$smsapi->send_sms($mobile, $send_txt, $sent_time, CHARSET,$id_code,$tplid); //发送短信
//echo $smsapi->statuscode; 由于服务器延迟的问题，先返回发送成功的提示，以免页面等待时候过长，体验不好
echo 0;
?>