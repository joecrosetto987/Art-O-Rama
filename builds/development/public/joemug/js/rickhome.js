// JavaScript Document
window.onload = function() {
	
	var rhButtons = document.querySelectorAll("div.rickhome_gallery");
	for (var t = 0; t < rhButtons.length; t++) {
		rhButtons[t].onmouseover = handleRhOver;
		rhButtons[t].onmouseout = handleRhOut;
	}

//	facebook listener
	var fbIcons = document.querySelectorAll("a.fb-icon");
	for (var c = 0; c < fbIcons.length; c++) {
		fbIcons[c].onclick = fbShare;
	}

	//twitter listener
	var twitterIcons = document.querySelectorAll("a.twitter-icon");
	for (var d = 0; d < twitterIcons.length; d++) {
		twitterIcons[d].onclick = twitterShare;
	}


};

function handleRhOver(e) {
	
	var gallery_image = e.currentTarget
	//var doc = document.getElementById("test");
	var dimmer = null;
	var name = null;
	for (var i = 0; i < gallery_image.childNodes.length; i++) {
			if (gallery_image.childNodes[i].className == "rickhome_gallery_black") {
				dimmer = gallery_image.childNodes[i];
			} else if (gallery_image.childNodes[i].className == "rickhome_gallery_names") { 
				name = gallery_image.childNodes[i];
			}
	}
	dimmer.style.opacity = "0";
	name.style.bottom = "30%";
	name.style.backgroundColor = "#0f6cdf";	
}

function handleRhOut(e) {
	
	var gallery_image = e.currentTarget
	//var doc = document.getElementById("test");
	var dimmer = null;
	var name = null;
	for (var i = 0; i < gallery_image.childNodes.length; i++) {
			if (gallery_image.childNodes[i].className == "rickhome_gallery_black") {
				dimmer = gallery_image.childNodes[i];
			} else if (gallery_image.childNodes[i].className == "rickhome_gallery_names") { 
				name = gallery_image.childNodes[i];
			}
	}
	dimmer.style.opacity = "0.15";
	name.style.bottom = "5%";
	name.style.backgroundColor = "transparent";	
}
// functions to call social media
function fbShare() {
	var imageFileName = "http://" + location.hostname + "/rick/img/rickhome_fb.jpg";

  FB.ui({
    method: 'share',
    display: 'popup',
    href: location.protocol+"//"+location.host+location.pathname,
		picture: imageFileName,
  }, function(response){});
}

function twitterShare() {
    var leftPosition, topPosition;
    //Allow for borders.
    leftPosition = (window.screen.width / 2) - 285;
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - 220;
    //Open the window.
		window.open("https://twitter.com/intent/tweet?text=Please%20look%20at%20Rick%20Therrio's%20fantastic%20art:&url=" + location.protocol+"//"+location.host+location.pathname + "&via=JosephCrosetto", "", "width=550,height=420,resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no");
}