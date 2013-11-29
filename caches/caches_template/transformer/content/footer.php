<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><style type="text/css">
	.page-container .wrap-bottom{
		background: url(<?php echo IMG_PATH;?>xingwang/bottom.png)center center;
		background-repeat:no-repeat;
	}

	.page-tip .music-about{
		background:url(<?php echo IMG_PATH;?>xingwang/music_about.png);
		background-repeat: no-repeat;
	}

	.page-tip .music-off{
		background:url(<?php echo IMG_PATH;?>xingwang/music_off.png);
		background-repeat: no-repeat;
	}

	.page-music .logo{
		background: url(<?php echo IMG_PATH;?>xingwang/music.png) center top;
		background-repeat: no-repeat;
	}

	.page-music .title{
		background: url(<?php echo IMG_PATH;?>xingwang/title.png) center top;
		background-repeat: no-repeat;
	}

	.page-music .pic{
		background: url(<?php echo IMG_PATH;?>xingwang/pic.png);
		background-repeat: no-repeat;
	}

	.page-footer{
		background:url(<?php echo IMG_PATH;?>xingwang/footer.png) center center;
		background-repeat:no-repeat;
	}

	.page-footer .location{
		background:url(<?php echo IMG_PATH;?>xingwang/location.png);
		background-repeat: no-repeat;
	}

	.page-footer .facebook{
		background:url(<?php echo IMG_PATH;?>xingwang/facebook.png);
		background-repeat: no-repeat;
	}

	.page-footer .google{
		background:url(<?php echo IMG_PATH;?>xingwang/google.png);
		background-repeat: no-repeat;
	}

	.page-footer .ping{
		background:url(<?php echo IMG_PATH;?>xingwang/ping.png);
		background-repeat: no-repeat;
	}

	.ui-widget-content {
		background:url(<?php echo IMG_PATH;?>xingwang/music_bg.png) center center repeat-x;
	}

	.ui-slider-horizontal{
		background:url(<?php echo IMG_PATH;?>xingwang/music_line.png) center center repeat-x;
	}

	.ui-icon-play{
		background:url(<?php echo IMG_PATH;?>xingwang/play.png) center center no-repeat;
	}

	.ui-icon-pause{
		background:url(<?php echo IMG_PATH;?>xingwang/pause.png) center center no-repeat;
	}

	.ui-slider .ui-slider-handle{
		background:url(<?php echo IMG_PATH;?>xingwang/music_buttom.png) center center repeat-x;
	}
</style>

				<div id="pageTip" class="page-tip">
					<span id="musicAbout" class="music-about"></span>						
					<span id="musicOff" class="music-off"></span>
				</div>
			</div>
			<div class="wrap-bottom"></div>
		</div>
		<div id="pageFooter" class="page-footer">
			<div class="wrap">
				<p>
					<span class="company first">Copyright@2013興望(Bring Hope)法律事務所著作權所有.Design By藍汛科技</span>					
					<span class="location"></span>					
					<span class="address">
						<a>公司位置</a>
					</span>					
					<a class="facebook icon"></a>
					<a class="google icon"></a>
					<a class="ping icon"></a>		
				</p>
				<p class="panel">					
					<a target="_blank" rel="nofollow" href="#">公司地址/壹北市中正品中山北路一段2號6樓之3</a>
					&nbsp;|&nbsp;					
					<a target="_blank" rel="nofollow" href="#">TEL/02-23899003</a>
					&nbsp;|&nbsp;					
					<a target="_blank" rel="nofollow" href="#">FAX/02-23899103</a>					&nbsp;|&nbsp;
					<a target="_blank" rel="nofollow" href="#">E-MAIL/bringinghopelaw@gmail.com</a>
				</p>
			</div>
		</div>
		<div id="pageMusic" class="page-music">
			<span class="logo"></span>
			<span class="title"></span>
			<div class="panel">
				<div class="left">
					<span class="pic"></span>
					<span class="desc">
						<ul>
							<li>
								<span>專輯名稱</span>
								<a>&nbsp;:&nbsp;有人在替你祈禱</a>
							</li>
							<li>
								<span>演唱者</span>
								<a>&nbsp;:&nbsp;史茵茵</a>
							</li>
							<li>
								<span>詞曲作者</span>
								<a>&nbsp;:&nbsp;Lanny Wolfe</a>
							</li>
							<li>
								<span>史茵茵官網</span>
								<a>&nbsp;:&nbsp;http://www.yingying.tw</a>
							</li>
						</ul>
					</span>
				</div>
				<div class="right">
					<div id="jquery_jplayer" class="jp-jplayer"></div>
					<div id="jp_container">
						<div class="jp-gui ui-widget ui-widget-content ui-corner-all">
							<ul>
								<li style="display:none;" class="jp-play ui-state-default ui-corner-all"><a href="javascript:;" class="jp-play ui-icon ui-icon-play" tabindex="1" title="play"></a></li>
								<li class="jp-pause ui-state-default ui-corner-all"><a href="javascript:;" class="jp-pause ui-icon ui-icon-pause" tabindex="1" title="pause"></a></li>
							</ul>
							<div class="jp-progress-slider ui-slider ui-slider-horizontal ui-widgetui-corner-all" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a></div>
							<div class="jp-clearboth"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="pageMask" class="page-mask"></div>
	</div>
</body>
</html>