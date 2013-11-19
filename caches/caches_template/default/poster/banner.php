<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>function PCMSAD(PID) {
  this.ID        = PID;
  this.PosID  = 0; 
  this.ADID		  = 0;
  this.ADType	  = "";
  this.ADName	  = "";
  this.ADContent = "";
  this.PaddingLeft = 0;
  this.PaddingTop  = 0;
  this.Wspaceidth = 0;
  this.Height = 0;
  this.IsHitCount = "N";
  this.UploadFilePath = "";
  this.URL = "";
  this.SiteID = 0;
  this.ShowAD  = showADContent;
  this.Stat = statAD;
}

function statAD() {
	var new_element = document.createElement("script"); 
	new_element.type = "text/javascript";
	new_element.src="<?php echo APP_PATH;?>index.php?m=poster&c=index&a=show&siteid="+this.SiteID+"&spaceid="+this.ADID+"&id="+this.PosID; 
	document.body.appendChild(new_element);
}

function showADContent() {
  var content = this.ADContent;
  var str = "";
  var AD = eval('('+content+')');
  if (this.ADType == "images") {
	  if (AD.Images[0].imgADLinkUrl) str += "<a href='"+this.URL+'&a=poster_click&sitespaceid='+this.SiteID+"&id="+this.ADID+"&url="+AD.Images[0].imgADLinkUrl+"' target='_blank'>";
	  str += "<img title='"+AD.Images[0].imgADAlt+"' src='"+this.UploadFilePath+AD.Images[0].ImgPath+"' width='"+this.Width+"' height='"+this.Height+"' style='border:0px;'>";
	  if (AD.Images[0].imgADLinkUrl) str += "</a>";
  }else if(this.ADType == "flash"){
	  str += "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' width='"+this.Width+"' height='"+this.Height+"' id='FlashAD_"+this.ADID+"' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0'>";
	  str += "<param name='movie' value='"+this.UploadFilePath+AD.Images[0].ImgPath+"' />"; 
      str += "<param name='quality' value='autohigh' />";
      str += "<param name='wmode' value='opaque'/>";
	  str += "<embed src='"+this.UploadFilePath+AD.Images[0].ImgPath+"' quality='autohigh' wmode='opaque' name='flashad' swliveconnect='TRUE' pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='"+this.Width+"' height='"+this.Height+"'></embed>";
      str += "</object>";	  
  }
  str += "";
  document.write(str);
}
 
var cmsAD_<?php echo $spaceid;?> = new PCMSAD('cmsAD_<?php echo $spaceid;?>'); 
cmsAD_<?php echo $spaceid;?>.PosID = <?php echo $spaceid;?>; 
cmsAD_<?php echo $spaceid;?>.ADID = <?php echo $p_id;?>; 
cmsAD_<?php echo $spaceid;?>.ADType = "<?php echo $p_type;?>"; 
cmsAD_<?php echo $spaceid;?>.ADName = "<?php echo $p_name;?>"; 
cmsAD_<?php echo $spaceid;?>.ADContent = "{'Images':[{'imgADLinkUrl':'<?php echo urlencode($p_setting[1]['linkurl']);?>','imgADAlt':'<?php echo $p_setting['1']['alt'];?>','ImgPath':'<?php echo $p_type=='images' ? $p_setting[1]['imageurl'] : $p_setting[1]['flashurl'];?>'}],'imgADLinkTarget':'New','Count':'1','showAlt':'Y'}"; 
cmsAD_<?php echo $spaceid;?>.URL = "<?php echo APP_PATH;?>index.php?m=poster&c=index"; 
cmsAD_<?php echo $spaceid;?>.SiteID = <?php echo $siteid;?>; 
cmsAD_<?php echo $spaceid;?>.Width = <?php echo $width;?>; 
cmsAD_<?php echo $spaceid;?>.Height = <?php echo $height;?>; 
cmsAD_<?php echo $spaceid;?>.UploadFilePath = ''; 
cmsAD_<?php echo $spaceid;?>.ShowAD();

var isIE=!!window.ActiveXObject; 
if (isIE){

	if (document.readyState=="complete"){
		cmsAD_<?php echo $spaceid;?>.Stat();
	} else {
		document.onreadystatechange=function(){
			if(document.readyState=="complete") cmsAD_<?php echo $spaceid;?>.Stat();
		}
	}
} else {
	cmsAD_<?php echo $spaceid;?>.Stat();
}