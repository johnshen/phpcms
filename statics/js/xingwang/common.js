$(function(){
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
		};

	if(document.getElementById('musicAbout')){
		$('#musicAbout').on('click',showMusic);
	}

	if(document.getElementById('musicOff')){
		$('#musicOff').on('click',stopMusic);
	}

	if(document.getElementById('pageMask')){
		$('#pageMask').on('click',hideMusic);
	}
})