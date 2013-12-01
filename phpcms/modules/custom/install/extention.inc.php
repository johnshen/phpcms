<?php
defined('IN_PHPCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');
$parentid = $menu_db->insert(array('name'=>'法律咨詢', 'parentid'=>'821', 'm'=>'custom', 'c'=>'admin_consult', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);

$parentid = $menu_db->insert(array('name'=>'最新消息', 'parentid'=>'821', 'm'=>'custom', 'c'=>'admin_news', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);
$menu_db->insert(array('name'=>'添加公告', 'parentid'=>$parentid, 'm'=>'custom', 'c'=>'admin_news', 'a'=>'add', 'data'=>'', 'listorder'=>0, 'display'=>'0'), true);
$menu_db->insert(array('name'=>'修改公告', 'parentid'=>$parentid, 'm'=>'custom', 'c'=>'admin_news', 'a'=>'edit', 'data'=>'', 'listorder'=>0, 'display'=>'0'), true);
$menu_db->insert(array('name'=>'删除公告', 'parentid'=>$parentid, 'm'=>'custom', 'c'=>'admin_news', 'a'=>'delete', 'data'=>'', 'listorder'=>0, 'display'=>'0'), true);

$language = array('法律咨詢' => '法律咨詢','最新消息'=>'最新消息');
?>
