<?php 

/**
 * 生成随机字符串
 * @param string $lenth 长度
 * @return string 字符串
 */
function create_randomstr($lenth = 6) {
	return random($lenth, '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ');
}

/**
 * 
 * @param $password 密码
 * @param $random 随机数
 */
function create_password($password='', $random='') {
	if(empty($random)) {
		$array['random'] = create_randomstr();
		$array['password'] = md5(md5($password).$array['random']);
		return $array;
	}
	return md5(md5($password).$random);
}

?>