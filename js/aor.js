// JavaScript Document
window.onload = function() {
	
	

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


// functions to call social media
function fbShare() {
	var imageFileName = "http://" + location.hostname + "/img/aorhome_rick.jpg";

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
		window.open("https://twitter.com/intent/tweet?text=View%20some%20amazing%20art%20that%20will%20bend%20your%20mind%20into%20a%20pretzel%20at%20Art-O-Rama%20Gallery:&url=" + location.protocol+"//"+location.host+location.pathname + "&via=JosephCrosetto", "", "width=550,height=420,resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no");
}