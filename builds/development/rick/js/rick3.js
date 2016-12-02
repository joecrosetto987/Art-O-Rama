// JavaScript Document
var curImageNum = 1;
var numberOfImages = 0;
//var nextImageName = ""; //i.e. img/beaver1
//var nextImageType = ""; //i.e. jpg
var vidSizingName = "";   //i.e. beaver1
var vidSizingPrefix = "vs_";
var vidSizingExt = "jpg";
//var imgFolder = "";
//var socialMImageName = "";
var downloading_loop;
var vidPlaying = false;
var watchedAll = false;





window.onload = function() {
	loadNumOfImages();
	loadArrows();
// hammer is code for swiping images on and off the screen on phones	
	loadHammer();
	sizeFirstImage();

	var zoomPlus = document.getElementById("zoom-plus");
	zoomPlus.onclick = handleZoomPlus;

	var zoomMinus = document.getElementById("zoom-minus");
	zoomMinus.onclick = handleZoomMinus;
	
//	var fbIcon = document.getElementById("fb-icon");
//	fbIcon.onclick = fbShare;
	var fbIcons = document.querySelectorAll("a.fb-icon");
	for (var c = 0; c < fbIcons.length; c++) {
		fbIcons[c].onclick = fbShare;
	}


	//var twitterIcon = document.getElementById("twitter-icon");
	//twitterIcon.onclick = twitterShare;
	var twitterIcons = document.querySelectorAll("a.twitter-icon");
	for (var d = 0; d < twitterIcons.length; d++) {
		twitterIcons[d].onclick = twitterShare;
	}

	//var pinterestIcon = document.getElementById("pinterest-icon");
	//pinterestIcon.onclick = pinterestShare;
	var pinterestIcons = document.querySelectorAll("a.pinterest-icon");
	for (var e = 0; e < pinterestIcons.length; e++) {
		pinterestIcons[e].onclick = pinterestShare;
	}

// this is a bit silly, I should just make handles for left and right arrows cause that is all there will ever be. 
	var arrowButtons = document.querySelectorAll("a.arrow");
	for (var b = 0; b < arrowButtons.length; b++) {
		arrowButtons[b].onclick = handleArrow;
	}
};
// hides the left arrow on the first image, since you can't go back
// hides the right arrow on the last image since you can't go forward
function loadArrows() {
	var leftArrow = document.getElementById("arrowleft");
	if (curImageNum === 1) {
		leftArrow.style.visibility = "hidden";
		leftArrow.onclick = "";
	} else {
		leftArrow.style.visibility = "visible";
		leftArrow.onclick = handleArrow;
		
	}
	var rightArrow = document.getElementById("arrowright");
	var divArrowRight = document.getElementById("divarrowright");
	if (watchedAll === false) {
			 divArrowRight.setAttribute('class', 'small-1 column text-center divarrow animated three-times bounce');
//			 divArrowRight.style.paddingTop = "24%";
			 rightArrow.style.color = "#2D8CD7";
//			 rightArrow.style.fontSize = "150%";
	} else {
			 divArrowRight.setAttribute('class', 'small-1 column text-center divarrow');
//			 divArrowRight.style.paddingTop = "25%";
			 rightArrow.style.color = "#5e5e5e";
//			 rightArrow.style.fontSize = "100%";
	}
	
// ok, a bit of a cludge. The last image will also have an animation. I don't want
// to load it with the rest of the images when the page loads because it is big. 
// so I load it asynchronously when the visitor gets to the last image. Since I am
// testing for that condition when loading the arrows, I put the call to 
//loadAnim() here. on the last slide, also make room for the anim.

 // var sizingAnim = document.getElementById("sizing-anim"); 
	if (curImageNum === numberOfImages) {
		rightArrow.style.visibility = "hidden";
		rightArrow.onclick = "";
	//	sizingAnim.style.display = "inline-block";
	//	loadAnim();
		watchedAll = true;
	}	else {
		rightArrow.style.visibility = "visible";
		rightArrow.onclick = handleArrow;
	//	sizingAnim.style.display = "none";

	}
}

function sizeFirstImage() {
// this just runs once to resize the first image based on the media query
	var curImageSize;
	if (Foundation.MediaQuery.atLeast('medium')) {
  	curImageSize = "_lg";
  } else {
		curImageSize = "_sm";
	}
// get the first image and break it down to its folder, filename and extention	
	var nextImageID = "image" + curImageNum;
	var nextImage = document.getElementById(nextImageID);
	var nextImagePath = nextImage.src; 
	var nip = nextImagePath.split(/[\/\\\.\_]/);	
	var imgFolder = nip[nip.length - 4];
	var nextImageName = nip[nip.length - 3];
	var nextImageExt = nip[nip.length - 1];
// ok, this is a little funky. For video, I am using a png file that is the same size
// to size the page. I didn't want to have to make a bunch of these png space holders.
// I figure all the video for a series will be the same size. So I take whatever 
// is the name of the first image (with the _lg or _sm trimmed off) whether it is 
// a video or not, and store that to use to make up the sizing image for all videos
// in the series. when I actually use it, I put a "vs_" infront of the name, a "_lg" 
// or "_sm" after it, and add a ".jpg" extention. I.e. "vs_beaver1_lg.jpg". 
// note I am currently just using one video size, 640 x 480 (which is actually 
// 640 x 360 for some reason?!) so I just make a beaver1_lg.mp4 is just a copy 
// of beaver1_sm.mp4. Maybe someday I'll use a smaller video for phones.
//
// store the sizing image name that will be used for all video.
if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
	vidPlaying = true;
}

	vidSizingName = nextImageName;
	


	
	var imageFileName;
	if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
	// i.e. img/vs_beaver1_lg.png
		imageFileName = imgFolder + "/" + vidSizingPrefix + vidSizingName + curImageSize + "." + vidSizingExt;
	} else {
		// i.e. img/flower1_lg.jpg
		imageFileName = imgFolder + "/" + nextImageName + curImageSize + "." + nextImageExt;
	}
		
	// imageFileName will look something like img/flower1_lg.jpg
	// the key thing is we are getting the name from the html doc so it doesn't 
	// need to be hard coded into the JS. So the JS can stay the same for all 
	// portfolio sections
	var sizingImage = document.getElementById("sizing-image");
	sizingImage.src = imageFileName;
	
  // if the image is verical, add a margin so it is not so huge compared to the 
  // horizontal images
     if (nextImage.height > nextImage.width) {
			 sizingImage.style.padding = "0 15%";
   	 } else {
       sizingImage.style.padding = "0";
  	}

  // this is the foundation function that actually does the resize
	new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();

}

function imageForward() {
	
	var curImageSize;
	if (Foundation.MediaQuery.atLeast('medium')) {
  	curImageSize = "_lg";
  } else {
		curImageSize = "_sm";
	}
	if (vidPlaying === true) {
		var vidID = "image" + curImageNum;
		var vid = document.getElementById(vidID);
		vid.pause(); 
		vidPlaying = false;
	}
	
  // move out the current image
	var overlayName = "image-overlay-content" + curImageNum;
	var curImage = document.getElementById(overlayName);
	
	curImage.style.transition = "all 0.4s ease-in-out";
	curImage.style.transform = "translateX(105%)";
  // increment counter so we have number of next image
	curImageNum ++;
	
	var nextImageID = "image" + curImageNum;
	var nextImage = document.getElementById(nextImageID);
	var nextImagePath = nextImage.src; 
	var nip = nextImagePath.split(/[\/\\\.\_]/);	
	var imgFolder = nip[nip.length - 4];
	var nextImageName = nip[nip.length - 3];
	var nextImageExt = nip[nip.length - 1];
	
	var imageFileName;
	if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
		imageFileName = imgFolder + "/" + vidSizingPrefix + vidSizingName + curImageSize + "." + vidSizingExt;
//		nextImage.autoplay = true;
		nextImage.load();
		vidPlaying = true;
	} else {
		imageFileName = imgFolder + "/" + nextImageName + curImageSize + "." + nextImageExt;
	}

		
	
	
	// put the new image in a container that determines the amount of space on the page. 
  // it is actually hidden. It is just used to make the right amount of space since
  // the images are different sizes
	var sizingImage = document.getElementById("sizing-image");
	sizingImage.src = imageFileName;
  // if the image is verical, add a margin so it is not so huge compared to the 
  // horizontal images
     if (nextImage.height > nextImage.width) {
			 sizingImage.style.padding = "0 15%";
   	 } else {
       sizingImage.style.padding = "0";
  	}

  // this is the foundation function that actually does the resize
	new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();
  // now put the margin on the actual image that will be displayed (above was just the place holder)
  // note this step is not needed in the image back function because the image already has the 
  // padding added in image forward.
  //var imageName = "image" + curImageNum;
 // var newImage = document.getElementById(imageName);
  if (nextImage.height > nextImage.width) {
    nextImage.style.padding = "0 15%";
  } else {
    nextImage.style.padding = "0";
  }
  // now slide in the new image
	overlayName = "image-overlay-content" + curImageNum;
	var overlayImage = document.getElementById(overlayName);

		overlayImage.style.transition = "all 0.4s ease-in-out";
		overlayImage.style.transform = "translateX(0px)";
}
// I am leaving off comments on image back because it is just image forward in reverse. 
// See comments above.
function imageBack() {
	var curImageSize;
	if (Foundation.MediaQuery.atLeast('medium')) {
  	curImageSize = "_lg";
  } else {
		curImageSize = "_sm";
	}

	if (vidPlaying === true) {
		var vidID = "image" + curImageNum;
		var vid = document.getElementById(vidID);
		vid.pause(); 
		vidPlaying = false;
	}


  var overlayName = "image-overlay-content" + curImageNum;
  var curImage = document.getElementById(overlayName);
  curImage.style.transition = "all 0.4s ease-in-out";
  curImage.style.transform = "translateX(-105%)";

	curImageNum --;
	
	var nextImageID = "image" + curImageNum;
	var nextImage = document.getElementById(nextImageID);
	var nextImagePath = nextImage.src; 
	var nip = nextImagePath.split(/[\/\\\.\_]/);	
	var imgFolder = nip[nip.length - 4];
	var nextImageName = nip[nip.length - 3];
	var nextImageExt = nip[nip.length - 1];


var imageFileName;
	if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
		imageFileName = imgFolder + "/" + vidSizingPrefix + vidSizingName + curImageSize + "." + vidSizingExt;
//		nextImage.autoplay = true;
		nextImage.load();
		vidPlaying = true;
	} else {
		imageFileName = imgFolder + "/" + nextImageName + curImageSize + "." + nextImageExt;
	}
	
	var sizingImage = document.getElementById("sizing-image");
	sizingImage.src = imageFileName;
  // if the image is verical, add a margin so it is not so huge compared to the 
  // horizontal images
     if (nextImage.height > nextImage.width) {
			 sizingImage.style.padding = "0 15%";
   	 } else {
       sizingImage.style.padding = "0";
  	}


  new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();
	
	
	
	overlayName = "image-overlay-content" + curImageNum;
	var overlayImage = document.getElementById(overlayName);

  overlayImage.style.transition = "all 0.4s ease-in-out";
  overlayImage.style.transform = "translateX(0px)";
}



function textForward() {
  // move out the current image
	var overlayName = "text-overlay-content" + curImageNum;
	var curText = document.getElementById(overlayName);
	
	curText.style.transition = "all 0.4s ease-in-out";
	curText.style.transform = "translateX(105%)";
  // increment counter so we have number of next text
	curImageNum ++;
	// put the new text in a container that determines the amount of space on the page. 
  // it is actually hidden. It is just used to make the right amount of space since
  // the text are different length. There is a section heading and a block of text.
  
    var overlayHead = "overlay-head" + curImageNum;
		var overlayHeadText = document.getElementById(overlayHead).innerHTML;
    document.getElementById("sizing-head").innerHTML = overlayHeadText;
    var overlayBody = "overlay-body" + curImageNum;
		var overlayBodyText = document.getElementById(overlayBody).innerHTML;
    document.getElementById("sizing-body").innerHTML = overlayBodyText;
    
    new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();

	overlayName = "text-overlay-content" + curImageNum;
	var newText = document.getElementById(overlayName);

		newText.style.transition = "all 0.4s ease-in-out";
		newText.style.transform = "translateX(0px)";
}


// I am leaving off comments on image back because it is just image forward in reverse. 
// See comments above.
function textBack() {
  overlayName = "text-overlay-content" + curImageNum;
  var curText = document.getElementById(overlayName);
  curText.style.transition = "all 0.4s ease-in-out";
  curText.style.transform = "translateX(-105%)";

	curImageNum --;
	
	var overlayHead = "overlay-head" + curImageNum;
	var overlayHeadText = document.getElementById(overlayHead).innerHTML;
	document.getElementById("sizing-head").innerHTML = overlayHeadText;
	var overlayBody = "overlay-body" + curImageNum;
	var overlayBodyText = document.getElementById(overlayBody).innerHTML;
	document.getElementById("sizing-body").innerHTML = overlayBodyText;
	
	new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();
	
	var overlayName = "text-overlay-content" + curImageNum;
	var newText = document.getElementById(overlayName);

  newText.style.transition = "all 0.4s ease-in-out";
  newText.style.transform = "translateX(0px)";


}


// handler for when some user clicks an arrow
function handleArrow(e) {
	var id = e.target.getAttribute("id");
	if (this.id === "arrowleft") {
		textBack();
    curImageNum ++;
    imageBack();
	} else {
		textForward();
    curImageNum --;
    imageForward();
	}
	loadArrows();
}

// here is where I count the number of images specified in the html doc. 
// I do this so the javascript can stay generic for all image series.
 function loadNumOfImages() {
	numberOfImages = 1;
	while (myImage !== null) {
		numberOfImages ++;
		var imageName = "image" + numberOfImages;
  	var myImage = document.getElementById(imageName);
	}
	numberOfImages --;
 }
 
 // this is for touch screen events
 function loadHammer() {
	 var myElement = document.getElementById('reload-eq-outer');

		// create a simple instance
		// by default, it only adds horizontal recognizers
		var mc = new Hammer(myElement);
		
		// listen to events...
		mc.on("swipeleft swiperight", function(ev) {
		//    myElement.textContent = ev.type +" gesture detected.";
		if (ev.type === "swipeleft" && curImageNum > 1 ) {
				textBack();
				curImageNum ++;
				imageBack();
//				ev.type = "";
			} else if (ev.type === "swiperight" && curImageNum < numberOfImages) {
				textForward();
				curImageNum --;
				imageForward();
//				ev.type = "";
			}
			loadArrows();
		});
		
 }
 // a bit cludgy...swaping the class for the colums to have medium-8 and medium 4 for two 
 // columns or not for one column. This is how the zoom button works (sorry!)
 function handleZoomPlus() {
 	 document.getElementById('text-panel').setAttribute('class', 'small-12 columns');
	 document.getElementById('image-panel').setAttribute('class', 'main-image-panel small-12 columns');
	 document.getElementById('text-panel-space').setAttribute('class', '');
		 
//	 document.getElementById('vSpace').setAttribute('class', 'hide-for-medium v-space');
	 sizeFirstImage();

	 document.getElementById('zoom-plus').style.display = 'none';
	 document.getElementById('zoom-minus').style.display = 'inline';
	 
//	 document.getElementById('zoom-divider').style.display = 'inline';
//	  new Foundation.Equalizer($("#reload-eq-inner")).applyHeight();
//		new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();
}
 function handleZoomMinus() {
	 document.getElementById('image-panel').setAttribute('class', 'main-image-panel medium-8 medium-push-4 small-12 columns');
 	 document.getElementById('text-panel').setAttribute('class', 'medium-4 medium-pull-8 small-12 columns');
//	 document.getElementById('vSpace').setAttribute('class', 'show-for-medium v-space');
	 sizeFirstImage();
	 document.getElementById('zoom-minus').style.display = 'none';
	 document.getElementById('zoom-plus').style.display = 'inline';
//	 document.getElementById('zoom-divider').style.display = 'none';
}


// here are the functions that handle the animation on the text section of the last image in a series.
// note I plug in the sizing image name to keep the js generic. the src will end up being
// something like img/flowers_anim.gif
function swapGif () {
	var animated_gif = document.getElementById("animatedGif");
	animated_gif.src = downloading_loop.src;
}
function loadAnim () {
	var animated_gif = document.getElementById("animatedGif");
	if (animated_gif.alt !== "0") {
		downloading_loop = new Image();
		downloading_loop.onload = function(){
			var downloading_anim = new Image();
			downloading_anim.onload = function() {
				animated_gif.src = this.src; 
				// ok not very slick but putting the time to switch the animation to the 
				// loop in the alt property. 0 means no loop gif.
				window.setTimeout(swapGif, animated_gif.alt);
			};  // end download anim
			
			downloading_anim.src = "img/" + vidSizingName + "_anim.gif";
			}; // end download loop
		downloading_loop.src = "img/" + vidSizingName + "_anim_loop.gif";
	} else {
		var downloading_anim = new Image();
		downloading_anim.onload = function() {
			animated_gif.src = this.src;
		};
		downloading_anim.src = "img/" + vidSizingName + "_anim.gif";
	} // end if
}

// functions to call social media
function fbShare() {
	var nextImageID = "image" + curImageNum;
	var nextImage = document.getElementById(nextImageID);
	var nextImagePath = nextImage.src; 
	var nip = nextImagePath.split(/[\/\\\.\_]/);
	var appFolder = nip[nip.length - 5];	
	var imgFolder = nip[nip.length - 4];
	var nextImageName = nip[nip.length - 3];
	var nextImageExt = nip[nip.length - 1];

	var imageFileName;
		if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
		imageFileName = "http://" + location.hostname + "/" + appFolder + "/" + imgFolder + "/" + vidSizingPrefix + vidSizingName + "_sm" + "." + vidSizingExt;
	} else {
		imageFileName = nextImagePath;
	}

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
		window.open("https://twitter.com/intent/tweet?text=Please%20look%20at%20Joe%20Crosetto's%20art:&url=" + location.protocol+"//"+location.host+location.pathname + "&via=JosephCrosetto", "", "width=550,height=420,resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no");
}
function pinterestShare() {
	var nextImageID = "image" + curImageNum;
	var nextImage = document.getElementById(nextImageID);
	var nextImagePath = nextImage.src; 
	var nip = nextImagePath.split(/[\/\\\.\_]/);
	var appFolder = nip[nip.length - 5];	
	var imgFolder = nip[nip.length - 4];
	var nextImageName = nip[nip.length - 3];
	var nextImageExt = nip[nip.length - 1];

	var imageFileName;
		if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
		imageFileName = "http://" + location.hostname + "/" + appFolder + "/" + imgFolder + "/" + vidSizingPrefix + vidSizingName + "_sm" + "." + vidSizingExt;
	} else {
		imageFileName = nextImagePath;
	}

	
	
    var leftPosition, topPosition;
    //Allow for borders.
    leftPosition = (window.screen.width / 2) - 385;
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - 220;
    //Open the window.
		window.open("http://pinterest.com/pin/create/button/?url=" + location.protocol+"//"+location.host+location.pathname + "&media=" + imageFileName + "&description=Please%20look%20at%20Joe%20Crosetto's%20art!", "", "width=550,height=420,resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no");
}