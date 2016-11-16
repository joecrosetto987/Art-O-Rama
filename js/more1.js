// JavaScript Document

var numberOfImages = 0;
var downloading_loop;


window.onload = function() {
//	loadAnim();
//	loadLoop();
		checkCookie();
};

// The animations are fairly big files. I don't want the visitor to wait.
// so after everything else is loaded, I asynchronously start downloading
// the loop animation, then the main animation. When they are both 
// loaded, I start playing the main animation. After 12 seconds, I swap
// in the loop animation.
function swapGif () {
	var animated_gif = document.getElementById("animatedGif");
	animated_gif.src = downloading_loop.src;
}
// commented out the loop logic because the current anim doesn't have a 
// loop. 

function loadAnim () {
	var animated_gif = document.getElementById("animatedGif");
//	downloading_loop = new Image();
//	downloading_loop.onload = function(){
    var downloading_anim = new Image();
		downloading_anim.onload = function() {
			animated_gif.src = this.src; 
	//		window.setTimeout(swapGif, 12000);
		};
		downloading_anim.src = "img/more_anim.gif";
//};
//downloading_loop.src = "img/more_anim_loop.gif";
}

function loadLoop () {
	var animated_gif = document.getElementById("animatedGif");
	downloading_loop = new Image();
	downloading_loop.onload = function(){
			animated_gif.src = this.src; 
};
	downloading_loop.src = "img/more_anim_loop.gif";
}


// I don't want the animation with the guy walking into the screen
// to restart if the visiter just left the page briefly and then returned.
// so I am setting a cookie that will expire in 5 minute when I load the animation.
// If the cookie doesn't exist, either it is the first time or it's been 5 minute
// so I'll load the guy walking into the screen. Otherwise, I load the loop of the
// guy sitting in the chair.

function setCookie(cname, cvalue, exmins) {
    var d = new Date();
    d.setTime(d.getTime() + (exmins*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var hb = getCookie("hereBefore");
    if (hb != "") {
 //       loadLoop(); 
    } else {
			  loadAnim();
				setCookie("hereBefore", "yes", 5);
    }
}









