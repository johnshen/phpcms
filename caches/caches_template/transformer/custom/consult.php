<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>xingwang/consult.css" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>jquery.validate.js" charset="UTF-8"></script>
<style type="text/css">
	.page-panel .send{
		background:url(<?php echo IMG_PATH;?>xingwang/send.png);
		background-repeat: no-repeat;
	}
</style>

				<div id="pagePanel" class="page-panel">
					<div class="desc"><?php echo $desc;?></div>
					<div class="content">
                        <form id="myform" method="post" action="?m=custom&c=consult&a=send">
							<div class="item">
								<span name="userName" class="user-text">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</span>
								<input class="user-input-name" type="text" name="username"/>
								<input class="user-radio" name="radioSex" type="radio" name="sex" value="1"> 
								<span class="user-sex">先&nbsp;&nbsp;生</span>
								<input class="user-radio" name="radioSex" type="radio" name="sex" value="0">
								<span class="user-sex">小&nbsp;&nbsp;姐</span>
							</div>
							<div class="item">
								<span name="userTal" class="user-text">联络电话</span>
								<input class="user-input" type="text" name="phone"/>
							</div>
							<div class="item">
								<span name="userEmail" class="user-text">电子信箱</span>
								<input class="user-input" type="text" name="email"/>
							</div>
							<div class="item">
								<span name="userTime" class="user-text">预约时间</span>
								<input class="user-input" type="text" name="appointment"/>
							</div>
							<div class="item">
								<span name="userConsult" class="user-text consult-time">咨询时段</span>
								<span class="container">
									<input class="radio-icon" type="radio" name="duration" value="09:00~09:30"> 
									<span class="user-time">09:00~09:30</span>
									<input class="radio-icon" type="radio" name="duration" value="10:30~11:00">
									<span class="user-time">10:30~11:00</span>
									</br>
									<input class="radio-icon" type="radio" name="duration" value="09:30~10:00"> 
									<span class="user-time">09:30~10:00</span>
									<input class="radio-icon" type="radio" name="duration" value="11:00~11:30">
									<span class="user-time">11:00~11:30</span>
									</br>
									<input class="radio-icon" type="radio" name="duration" value="10:00~10:30"> 
									<span class="user-time">10:00~10:30</span>
									<input class="radio-icon" type="radio" name="duration" value="10:00~10:30">
									<span class="user-time">11:30~12:00</span>
								</span>
							</div>
							<div class="item">
								<span name="userGist" class="user-text">主&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;旨</span>
								<input class="user-input" type="text" name="topic" />
							</div>
							<div class="item">
								<span name="userContent" class="user-text consult-content">咨询内容</span>
								<textarea class="user-textarea" name="content"></textarea>
							</div>
							<div class="item">
								<span class="code-panel">
									<span name="userCode" class="user-text">验&nbsp;&nbsp;证&nbsp;&nbsp;码</span>
									<input class="user-input-code" type="text" name="vcode"/>
									<span class="warn">*请输入右方图片所显示的文字</span>
								</span>
								<!-- image class="code-image" src="images/code.png"></image-->
                                <?php echo form::checkcode('checkcode', 5, 20, 130, 50, '', '', '', 'code-image'); ?>
							</div>
							<div class="item send-item">
								<input class="send" type="submit" value='送&nbsp;&nbsp;&nbsp;&nbsp;出' id="dosubmit" name="dosubmit">
							</div>
						</form>
					</div>
				</div>
<script type="text/javascript">
  $(function() {
      formvalidate('#myform', {
        'name': {required: true, chinese: true, minlength: 2},
        'telephone': {required: true, mobile: true},
        'email':{email: true},
        'address': {required: true, minlength: 10}
      }, {
        'name': {chinese : '请填写正确的姓名', minlength: '请填写正确的姓名'}
        'address': {required: '请填写您的详细地址'},
        'content': {required: '请填写加盟留言'}
      });
  });
</script>
<?php include template("content","footer"); ?>
