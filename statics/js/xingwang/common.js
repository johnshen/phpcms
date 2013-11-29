$(function(){
	var hideMusic = function(){
			$('#pageMusic').hide();
			$('#pageMask').hide();
		},
		showMusic = function(){
			$('#pageMusic').show();
			$('#pageMask').show();
		};

	if(document.getElementById('musicAbout')){
		$('#musicAbout').on('click',showMusic);
	}

	if(document.getElementById('pageMask')){
		$('#pageMask').on('click',hideMusic);
	}
})