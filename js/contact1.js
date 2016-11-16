// JavaScript Document

var numberOfImages = 0;
var downloading_loop;


window.onload = function() {
	loadAnim();
//	loadLoop();
};


// The animations are fairly big files. I don't want the visitor to wait.
// so after everything else is loaded, I asynchronously start downloading
// the loop animation, then the main animation. When they are both 
// loaded, I start playing the main animation. After 12 seconds, I swap
// in the loop animation.

// Typically these animations are in two parts a main part and a loop. It happens that the anim for 
// contacts disappears in a puff of smoke so no loop is needed. I left the code in in case I change 
// the animation someday.
function swapGif () {
	var animated_gif = document.getElementById("animatedGif");
	animated_gif.src = downloading_loop.src;
}
function loadAnim () {
	var animated_gif = document.getElementById("animatedGif");
	downloading_loop = new Image();
	downloading_loop.onload = function(){
    var downloading_anim = new Image();
		downloading_anim.onload = function() {
			animated_gif.src = this.src; 
		//	window.setTimeout(swapGif, 15000);
		};
		downloading_anim.src = "img/contact_anim3.gif";
};
downloading_loop.src = "img/anim_empty.png";
}
