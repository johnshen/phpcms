<?php
defined('IN_PHPCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');
$parentid = $menu_db->insert(array('name'=>'consult', 'parentid'=>'821', 'm'=>'custom', 'c'=>'admin_consult', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);

$parentid = $menu_db->insert(array('name'=>'custom_news', 'parentid'=>'821', 'm'=>'custom', 'c'=>'admin_news', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);

$language = array('consult' => '法律咨詢','custom_news'=>'最新消息');
?>
