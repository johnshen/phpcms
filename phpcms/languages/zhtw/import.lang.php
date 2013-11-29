<?php
$LANG['all_import'] 					=	'全部';
$LANG['content_import'] 				=	'信息導入';
$LANG['member_import'] 					=	'會員導入';
$LANG['other_import'] 					=	'其它';

$LANG['import_name'] 					=	'配置名稱';
$LANG['import_desc'] 					=	'配置說明';
$LANG['add_time'] 						=	'添加時間';
$LANG['import_time'] 					=	'導入時間';
$LANG['import_type'] 					=	'導入類型';

$LANG['do_import'] 						=	'執行';

$LANG['delete_select'] 					=	'刪除選中';
$LANG['delete_confirm'] 				=	'是否確定刪除該記錄？';
/*共用*/
$LANG['dbtype'] 						=	'數據庫類型';
$LANG['dbhost'] 						=	'數據庫主機';
$LANG['dbusername'] 					=	'數據庫用戶名';
$LANG['dbpassword'] 					=	'數據庫密碼';
$LANG['dbcharset'] 						=	'數據庫編碼';
$LANG['dbname'] 						=	'數據庫名稱';
$LANG['dbtables'] 						=	'選擇數據庫表';
$LANG['test_con'] 						=	'測試鏈接';

$LANG['show_tables'] 					=	'顯示數據表';

$LANG['show_tables_fields'] 			=	'顯示已選數據表字段';

$LANG['condition'] 						=	'數據提取條件';
$LANG['keyid'] 							=	'主鍵字段指定';
$LANG['maxid'] 							=	'上次導入最大ID';

$LANG['condition_info'] 				=	'（常用於多表聯合查詢時設置，例：v9_news.id=v9_news_data.id）';


$LANG['select_localhost_db'] 			=	'請選擇本機數據庫';
$LANG['pdo_select'] 					=	'選擇數據表';
$LANG['into_tables'] 					=	'已經選擇數據表';

$LANG['field_dy'] 						=	'數據表字段對應關係';
$LANG['field_name'] 					=	'字段名';
$LANG['field_pdo_name'] 				=	'對應源數據表字段';
$LANG['field_values'] 					=	'默認值';
$LANG['field_func'] 				     	=	'處理函數';
/*導入配置*/
$LANG['import_setting'] 				=	'數據導入執行設置';
$LANG['number'] 						=	'每次提取並導入數據條數';
$LANG['expire'] 						=	'php腳本執行超時時限'; 

/*其它*/
$LANG['import_type_other'] 				=	'數據導入規則- 通用導入';

/*信息導入*/
$LANG['import_type_content'] 			=	'數據導入規則- 內容導入';
$LANG['defaultcatid'] 					=	'默認導入欄目';
$LANG['v9_catid'] 						=	'現運行系統欄目';
$LANG['old_catid'] 						=	'原系統欄目ID';


/*會員導入*/
$LANG['import_type_member'] 			=	'數據導入規則- 會員導入';
$LANG['import_lanmu_dy'] 				=	'欄目對應設置';
$LANG['defaultgroupid'] 				=	'默認導入到用戶組';
$LANG['v9_group'] 						=	'V9 會員組';
$LANG['old_group'] 						=	'原系統會員組 ID';
$LANG['membercheck'] 					=	'是否檢查同名帳號或郵件';
$LANG['keyid_info'] 					=	'（用於多表聯合查詢時設置，例：ID）';

/*添加檢測語言包*/
$LANG['importname_must'] 				=	'配置名稱必填';
$LANG['input_importname'] 				=	'請輸入配置名稱';
$LANG['name_is_exit'] 					=	'已有同名配置。';
$LANG['connecting'] 					=	'正在連接，請稍候。';
$LANG['dbhost_infos'] 					=	'請輸入數據庫主機，當連接為Access時此處應填寫數據庫絕對地址';
$LANG['please_check_dbhost'] 			=	'請輸入數據庫主機';
$LANG['input_isok'] 					=	'輸入正確';

/*擴展語言包*/
$LANG['access_input_table'] 			=	'(當選擇數據類型為access時，請直接輸入表名)';
$LANG['maxid_info'] 					=	'（防止數據重複導入，需配合 <font color=red>數據提取條件</font> 選項使用）';
$LANG['please_select'] 					=	'請選擇';

$LANG['please_select_pdo'] 				=	'請選擇數據源';

$LANG['old_catid_info'] 				=	'多個ID請用逗號分隔'; 

$LANG['tiao'] 							=	'條';
$LANG['miao'] 							=	'秒'; 

$LANG['connect_succeed'] 				=	'鏈接成功';
$LANG['connect_fail'] 					=	'鏈接失敗'; 

/*後台模版語言包*/
$LANG['change_import_set'] 				=	'修改數據導入規則';
$LANG['select_model'] 					=	'選擇要導入的模型：'; 
$LANG['other_model'] 					=	'其它 (<font color=red>沒有限制,可任意指定數據表</font>)'; 

$LANG['all_type'] 						=	'所有分類'; 
$LANG['check_model'] 					=	'對應模型'; 

$LANG['add_import_setting'] 			=	'添加數據導入規則'; 
$LANG['no_confie'] 						=	'沒有限制,可任意指定數據表'; 

$LANG['no_data_needimport'] 			=	'沒有新數據需要導入，請返回！'; 
$LANG['no_keyid'] 						=	'沒有指定關鍵字段，請返回！'; 
$LANG['no_default_groupid'] 			=	'沒有指定默認會員組'; 
$LANG['no_default_catid'] 				=	'沒有默認欄目配置'; 
?>