// JavaScript Document
window.onload = function() {
	
	var rhButtons = document.querySelectorAll("div.rickhome_gallery");
	for (var t = 0; t < rhButtons.length; t++) {
		rhButtons[t].onmouseover = handleRhOver;
		rhButtons[t].onmouseout = handleRhOut;
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