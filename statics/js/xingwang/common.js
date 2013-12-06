$(function(){

	window.utils = {
		checkEmail : function(value){
			var flag = false;
			if(!value) return false;
			if(typeof value == "string")
			{
				value = value.replace(/(^\s*)|(\s*$)/g,"").split(";");
			}
			if(value[value.length-1] == "")
			{
				value.pop();
			}
			var regularExpression = /^[0-9a-z_-][_.0-9a-z-]{0,31}@([0-9a-z][0-9a-z-]{0,30}\.){1,4}[a-z]{2,4}$/i;
			for(var i = 0, len = value.length; i < len; i++) {
				if(regularExpression.test(value[i])) {
					flag = true;
				} else
					flag = false;
			}
			return flag;
		},
		checkPhone:function(value){
			var pattern=/(^[0-9]{3,4}\-[0-9]{3,8}$)|(^[0-9]{3,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)/; 
			if(pattern.test(value)) { 
				return true;
			} else {
				return false; 
			} 
		}
	};

	window.notification = {
		tipIn : function(dom,txt,time,options) {
	        dom = this.lastTip = $(dom).tip($.extend({
	            defaultPosition:"right",
	            maxWidth:"auto"
	        },options)).trigger("showTip",txt);
	       	if(this.tipTimer) clearTimeout(this.tipTimer)
	        this.tipTimer=setTimeout($.proxy(this.tipOut,dom),parseInt(time || 5000,10));
	    },
	    tipOut : function(dom) {
	        var elem = dom && ($.type(dom) != "number")?dom:this;
	        $(elem).trigger("hideTip"); 
	    },
	    tipClear:function(){
	        if(this.lastTip) {
	            this.lastTip.trigger("hideTip");
	        }
	    }
	};

	var hideMusic = function(){
			$('#pageMusic').hide();
			$('#pageMask').hide();
		},
		showMusic = function(){
			$('#pageMusic').show();
			$('#pageMask').show();
		},
		stopMusic = function(){
			$("#jquery_jplayer").jPlayer("stop");
		},
		playMusic = function(){
			$("#jquery_jplayer").jPlayer("play");
		};

	$("#jquery_jplayer").bind($.jPlayer.event.pause, function(event) {
		$.cookie('musicTime',event.jPlayer.status.currentTime);
		$('#musicSwitch').removeClass('music-off').addClass('music-on');
	});

	$("#jquery_jplayer").bind($.jPlayer.event.ended, function(event) {
		$('#musicSwitch').removeClass('music-off').addClass('music-on');
	});

	$("#jquery_jplayer").bind($.jPlayer.event.playing, function(event) {
		$('#musicSwitch').removeClass('music-on').addClass('music-off');
	});

	if(document.getElementById('musicAbout')){
		$('#musicAbout').on('click',showMusic);
	}

	if(document.getElementById('musicSwitch')){
		$('#musicSwitch').on('click',function(){
			var target = $(this);
			if(target.hasClass('music-off')){
				target.removeClass('music-off').addClass('music-on');
				stopMusic();
			}else{
				target.removeClass('music-on').addClass('music-off');
				playMusic();
			}
			
		});
	}

	if(document.getElementById('pageMask')){
		$('#pageMask').on('click',hideMusic);
	}

	$('a').on('click',function(e){
		var target = e.currentTarget,
		    url = $(target).attr('data-url');
		if(url){
			$("#jquery_jplayer").jPlayer("pause");
			setTimeout(function(){
				window.location.href = url;
			},0);
			return false;
		}
		return true;
	});
})