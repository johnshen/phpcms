<?php

/*Language Format:
Add a new file(.lang.php) with your module name at /phpcms/languages/
translation save at the array:$LANG
*/
$LANG['trade_sn'] = '支付單號';
$LANG['addtime'] = '訂單時間';
$LANG['to'] = '至';
$LANG['confirm_pay'] = '確認並支付';
$LANG['usernote'] = '備註';
$LANG['adminnote'] = '管理員操作';
$LANG['user_balance'] = '用戶餘額：';
$LANG['yuan'] = '&nbsp;元';
$LANG['dian'] = '&nbsp;點';
$LANG['trade_succ'] = '成功';
$LANG['checking'] = '驗證中..';
$LANG['user_not_exist'] = '該用戶不存在';

$LANG['input_price_to_change'] = '輸入修改數量（資金或者點數）';
$LANG['number'] = '數量 ';
$LANG['must_be_price'] = '必須為金額，最多保留兩位小數';
$LANG['reason_of_modify'] = '要修改的理由';

//modify_deposit.php
$LANG['recharge_type'] = '充值類型';
$LANG['capital'] = '資金';
$LANG['point'] = '點數';
$LANG['recharge_quota'] = '充值額度';
$LANG['increase'] = '增加';
$LANG['reduce'] = '減少';
$LANG['trading'] = '交易';
$LANG['op_notice'] = '提醒操作';
$LANG['op_sendsms'] = '發送短消息通知會員';
$LANG['op_sendemail'] = '發送e-mail通知會員';
$LANG['send_account_changes_notice'] = '賬戶變更通知';
$LANG['background_operation'] = '後台操作';
$LANG['account_changes_notice_tips'] = '尊敬的{username},您好！<br/>您的賬戶於{time}發生變動,操作：{op},理由:{note},當前餘額：{amount}元，{point}積分。';

//payment.php
$LANG['basic_config'] = '基本設置';
$LANG['contact_email'] = '聯繫郵箱';
$LANG['contact_phone'] = '聯繫電話';
$LANG['order_info'] = '訂單信息';
$LANG['order_sn'] = '支付單號';
$LANG['order_name'] = '名稱';
$LANG['order_price'] = '訂單價格';
$LANG['order_discount'] = '交易加價/漲價';
$LANG['order_addtime'] = '訂單生成時間';
$LANG['order_ip'] = '訂單生成IP';
$LANG['payment_type'] = '支付類型';
$LANG['order'] = '訂單';
$LANG['disount_notice'] = '要給顧客便宜10元,降價請輸入「-10」';

$LANG['discount'] = '訂單改價';
$LANG['recharge'] = '在線充值';
$LANG['offline'] = '線下支付';
$LANG['online'] = '在線支付';
$LANG['selfincome'] = '自助獲取';

$LANG['order_time'] = '支付時間';
$LANG['business_mode'] = '業務方式';
$LANG['payment_mode'] = '支付方式';
$LANG['deposit_amount'] = '存入金額';
$LANG['pay_status'] = '付款狀態';
$LANG['pay_btn'] = '付款';

$LANG['name'] = '名稱';
$LANG['desc'] = '描述';
$LANG['pay_factorage'] = '支付手續費';
$LANG['pay_method_rate'] = '按比例收費';
$LANG['pay_method_fix'] = '固定費用';
$LANG['pay_rate'] = '費率';
$LANG['pay_fix'] = '金額';
$LANG['pay_method_rate_desc'] = '說明：顧客將支付訂單總金額乘以此費率作為手續費；';
$LANG['pay_method_fix_desc'] = '說明：顧客每筆訂單需要支付的手續費；';

$LANG['parameter_config'] = '參數設置';
$LANG['plus_version'] = '插件版本';
$LANG['plus_author'] = '插件作者';
$LANG['plus_site'] = '插件網址';

$LANG['plus_install'] = '安裝';
$LANG['plus_uninstall'] = '卸載';

$LANG['check_confirm'] = '確認要通過訂單  {sn} 審核？';
$LANG['check_passed'] = '審核通過';

$LANG['change_price'] = '改價';
$LANG['check'] = '審核';
$LANG['closed'] = '關閉';

$LANG['thispage'] = '本頁';
$LANG['finance'] = '財務';
$LANG['totalize'] = '總計';
$LANG['amount'] = '金額';
$LANG['total'] = '總';
$LANG['bi'] = '筆';
$LANG['trade_succ'] = '成功';
$LANG['transactions'] = '交易量';
$LANG['trade'] = '交易';
$LANG['trade_record_del'] = '確認刪除該記錄？';

/******************error & notice********************/

$LANG['illegal_sign'] = '簽名錯誤';
$LANG['illegal_notice'] = '通知錯誤';
$LANG['illegal_return'] = '信息返回錯誤';
$LANG['illegal_pay_method'] = '支付方式錯誤';
$LANG['illegal_creat_sn'] = '訂單號生成錯誤';


$LANG['pay_success'] = '恭喜您，支付成功';
$LANG['pay_failed'] = '支付失敗，請聯繫管理員';
$LANG['payment_failed'] = '支付方式發生錯誤';
$LANG['order_closed_or_finish'] = '訂單已完成或該已經關閉';
$LANG['state_change_succ'] = '狀態修改完成';

$LANG['delete_succ'] = '刪除成功';
$LANG['public_discount_succ'] = '操作成功';
$LANG['admin_recharge'] = '後台充值';

/******************pay status********************/
$LANG['all_status'] = '全部狀態';

$LANG['unpay'] = '<font color="red" class="onError">交易未支付</font>';
$LANG['succ'] = '<font color="green" class="onCorrect">交易成功</font>';
$LANG['failed'] = '交易失敗';
$LANG['error'] = '交易錯誤';
$LANG['progress'] = '<font color="orange" class="onTime">交易處理中</font>';
$LANG['timeout'] = '交易超時';
$LANG['cancel'] = '交易取消';
$LANG['waitting'] = '<font color="orange" class="onTime">等待付款</font>';

$LANG['select']['unpay'] = '交易未支付';
$LANG['select']['succ'] = '交易成功';
$LANG['select']['progress'] = '交易處理中';
$LANG['select']['cancel'] = '交易取消';

/*************pay plus language***************/

$LANG['alipay'] = '支付寶';
$LANG['alipay_account'] = '支付寶帳戶';
$LANG['alipay_tip'] = '支付寶是國內領先的獨立第三方支付平台，由阿里巴巴集團創辦。致力於為中國電子商務提供「簡單、安全、快速」的在線支付解決方案。';
$LANG['alipay_key'] = '交易安全校驗碼(key)';
$LANG['alipay_partner'] = '合作者身份(parterID)';
$LANG['service_type'] = '選擇接口類型';

$LANG['tenpay_account'] = '財付通客戶號';
$LANG['tenpay_privateKey'] = '財付通私鑰';
$LANG['tenpay_authtype'] = '選擇接口類型';

$LANG['chinabank'] = '網銀在線';
$LANG['chinabank_tip'] = '網銀在線與中國銀行、中國工商銀行、中國農業銀行、中國建設銀行、招商銀行等國內各大銀行，以及VISA、MasterCard、JCB等國際信用卡組織保持了長期、緊密、良好的合作關係。<a href="http://www.chinabank.com.cn" target="_blank"><font color="red">立即在線申請</font>';
$LANG['chinabank_account'] = '網銀在線商戶號';
$LANG['chinabank_key'] = '網銀在線MD5私鑰';

$LANG['sndapay'] = '盛付通';
$LANG['sndapay_tip'] = '盛付通是盛大網絡創辦的中國領先的在線支付平台，致力於為互聯網用戶和企業提供便捷、安全的支付服務。通過與各大銀行、通信服務商等簽約合作，提供具備相當實力和信譽保障的支付服務。<a href="http://www.shengpay.com/HomePage.aspx?tag=phpcms" target="_blank"><font color="red">立即在線申請</font>';
$LANG['sndapay_account'] = '盛大支付商戶號';
$LANG['sndapay_key'] = '盛大支付密鑰';


$LANG['service_type_range'][0] = '使用擔保交易接口';
$LANG['service_type_range'][1] = '使用標準雙接口';
$LANG['service_type_range'][2] = '使用即時到賬交易接口';

$LANG['userid'] = '用戶ID';
$LANG['op'] = '操作人';
$LANG['expenditure_patterns'] = '消費類型';
$LANG['money'] = '金錢';
$LANG['point'] = '積分';
$LANG['from'] = '從';
$LANG['content_of_consumption'] = '消費內容';
$LANG['empdisposetime'] = '消費時間';
$LANG['consumption_quantity'] = '消費數量';
$LANG['self'] = '自身';
$LANG['wrong_time_over_time_to_time_less_than'] = '錯誤的時間格式，結束時間小於開始時間！';

$LANG['spend_msg_1'] = '請對消費內容進行描述。';
$LANG['spend_msg_2'] = '請輸入消費金額。';
$LANG['spend_msg_3'] = '用戶不能為空。';
$LANG['spend_msg_6'] = '賬戶餘額不足。';
$LANG['spend_msg_7'] = '消費類型為空。';
$LANG['spend_msg_8'] = '數據存入數據庫時出錯。';
$LANG['bank_transfer'] = '銀行轉賬';
$LANG['transfer'] = '銀行匯款/轉賬';
$LANG['dsa'] = 'DSA 簽名方法待後續開發，請先使用MD5簽名方式';
$LANG['alipay_error'] = '支付寶暫不支持{sign_type}類型的簽名方式';
$LANG['execute_date'] = '執行日期';
$LANG['query_stat'] = '查詢統計';
$LANG['total_transactions'] = '總交易數';
$LANG['transactions_success'] = '成功交易';
$LANG['pay_tip'] = '我們目前支持的匯款方式，請根據您選擇的支付方式來選擇銀行匯款。匯款以後，請立即通知我們。';
$LANG['configure'] = '配置';
?>