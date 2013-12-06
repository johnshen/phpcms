$(document).ready(function(){
	var myPlayer = $("#jquery_jplayer"),
		myPlayerData,
		fixFlash_mp4,
		fixFlash_mp4_id,
		ignore_timeupdate,
		options = {
			ready: function (event) {
				if(event.jPlayer.status.noVolume) {
					$(".jp-gui").addClass("jp-no-volume");
				}
				fixFlash_mp4 = event.jPlayer.flash.used && /mp3/.test(event.jPlayer.options.supplied);
				$(this).jPlayer("setMedia", {
					mp3: imgPath+"/music.mp3"
				}).jPlayer("play",$.cookie('musicTime')?parseFloat($.cookie('musicTime'),10):0);

			},
			timeupdate: function(event) {
				if(!ignore_timeupdate) {
					myControl.progress.slider("value", event.jPlayer.status.currentPercentAbsolute);
				}
			},
			swfPath: jsPath,
			supplied: "mp3",
			cssSelectorAncestor: "#jp_container",
			wmode: "window",
			keyEnabled: true
		},
		myControl = {
			progress: $(options.cssSelectorAncestor + " .jp-progress-slider")
		};

	myPlayer.jPlayer(options);

	myPlayerData = myPlayer.data("jPlayer");

	myControl.progress.slider({
		animate: "fast",
		max: 100,
		range: "min",
		step: 0.1,
		value : 0,
		slide: function(event, ui) {
			var sp = myPlayerData.status.seekPercent;
			if(sp > 0) {
				if(fixFlash_mp4) {
					ignore_timeupdate = true;
					clearTimeout(fixFlash_mp4_id);
					fixFlash_mp4_id = setTimeout(function() {
						ignore_timeupdate = false;
					},1000);
				}
				myPlayer.jPlayer("playHead", ui.value * (100 / sp));
			} else {
				setTimeout(function() {
					myControl.progress.slider("value", 0);
				}, 0);
			}
		}
	});

});