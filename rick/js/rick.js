// JavaScript Document
var curImageNum = 1;
var numberOfImages = 0;
//var nextImageName = ""; //i.e. img/beaver1
//var nextImageType = ""; //i.e. jpg
var vidSizingName = "";   //i.e. beaver1a
var vidSizingPrefix = "vs_";
var vidSizingExt = "jpg";
//var imgFolder = "";
//var socialMImageName = "";
var downloading_loop;
var vidPlaying = false;
var firstTime = true;

var filenamePrefix;

function setFilenamePrefix(fp) {
	filenamePrefix = fp;
}



window.onload = function() {
	
	// test
	//console.log(filenamePrefix);
		
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
	
	var tbButtons = document.querySelectorAll("a.tb");
	for (var t = 0; t < tbButtons.length; t++) {
		tbButtons[t].onclick = handleTb;
	}
	// alt image buttons
	var aiButtons = document.querySelectorAll("a.ai");
	for (var i = 0; i < aiButtons.length; i++) {
		aiButtons[i].onclick = handleAi;
		aiButtons[i].onmouseover = handleAi;
	}
	
	
};


// hides the left arrow on the first image, since you can't go back
// hides the right arrow on the last image since you can't go forward
function loadArrows() {
	var leftArrow = document.getElementById("arrowleft");
	if (curImageNum == 1) {
		leftArrow.style.visibility = "hidden";
		leftArrow.onclick = "";
	} else {
		leftArrow.style.visibility = "visible";
		leftArrow.onclick = handleArrow;
		
	}
	//so the right arrow has classes that will make it blue and bounce 3 times when loaded. 
	// after the user moves past the first image it will be greay and just have a hover-blue.
	var rightArrow = document.getElementById("arrowright");
	var divArrowRight = document.getElementById("divarrowright");
	if (firstTime == false) {
		divArrowRight.setAttribute('class', 'small-1 column text-center divarrow');
	}
	firstTime = false;
	
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
	//var nextImageName = nip[nip.length - 3];
	var nextImageExt = nip[nip.length - 1];
// ok, this is a little funky. For video, I am using a jpg file that is the same size
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

if(nextImage.nodeName.toLowerCase() === "video") {
//if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
	vidPlaying = true;
}

	vidSizingName = filenamePrefix + curImageNum + "a";
	


	
	var imageFileName;
	if(nextImage.nodeName.toLowerCase() === "video") {
	//if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
	// i.e. img/vs_beaver1a_lg.png
		imageFileName = imgFolder + "/" + vidSizingPrefix + vidSizingName + curImageSize + "." + vidSizingExt;
	} else {
		// i.e. img/flower1a_lg.jpg
		imageFileName = imgFolder + "/" + filenamePrefix + curImageNum + "a" + curImageSize + "." + nextImageExt;
	}
		
	// imageFileName will look something like img/flower1_lg.jpg
	// the key thing is we are getting the name from the html doc so it doesn't 
	// need to be hard coded into the JS. So the JS can stay the same for all 
	// portfolio sections
	var sizingImage = document.getElementById("sizing-image");
	sizingImage.src = imageFileName;
	
 	var sIContainer = document.getElementById("si-container");
	
  // if the image is verical, add a margin so it is not so huge compared to the 
  // horizontal images
     if (nextImage.height > nextImage.width) {
			 sIContainer.style.padding = "0 15%";
   	 } else {
       sIContainer.style.padding = "0";
  	}


  // this is the foundation function that actually does the resize
	new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();
	
	//unhighlight (curImageNum);
}

function imageForward(oldImageNum, newImageNum) {
	
	var curImageSize;
	if (Foundation.MediaQuery.atLeast('medium')) {
  	curImageSize = "_lg";
  } else {
		curImageSize = "_sm";
	}
	if (vidPlaying === true) {
		var vidID = "image" + oldImageNum;
		var vid = document.getElementById(vidID);
		vid.pause(); 
		vidPlaying = false;
	}
	
  // move out the current image
	var overlayName = "image-overlay-content" + oldImageNum;
	var curImage = document.getElementById(overlayName);
	
	curImage.style.transition = "all 0.4s ease-in-out";
	curImage.style.transform = "translateX(105%)";
	curImage.style.webkitTransform = "translateX(105%)";
  // increment counter so we have number of next image
	//curImageNum = newImageNum;
	
	var nextImageID = "image" + newImageNum;
	var nextImage = document.getElementById(nextImageID);
	var nextImagePath = nextImage.src; 
	var nip = nextImagePath.split(/[\/\\\.\_]/);	
	var imgFolder = nip[nip.length - 4];
	//var nextImageName = nip[nip.length - 3];
	var nextImageExt = nip[nip.length - 1];
	
	var imageFileName;
	if(nextImage.nodeName.toLowerCase() === "video") {
	//if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
		imageFileName = imgFolder + "/" + vidSizingPrefix + vidSizingName  + curImageSize + "." + vidSizingExt;
//		nextImage.autoplay = true;
		nextImage.load();
		vidPlaying = true;
	} else {
		imageFileName = imgFolder + "/" + filenamePrefix + newImageNum + "a"  + curImageSize + "." + nextImageExt;
	}

		
	
	
	// put the new image in a container that determines the amount of space on the page. 
  // it is actually hidden. It is just used to make the right amount of space since
  // the images are different sizes
	var sizingImage = document.getElementById("sizing-image");
	sizingImage.src = imageFileName;
	
	var sIContainer = document.getElementById("si-container");
	
  // if the image is verical, add a margin so it is not so huge compared to the 
  // horizontal images
     if (nextImage.height > nextImage.width) {
			 sIContainer.style.padding = "0 15%";
   	 } else {
       sIContainer.style.padding = "0";
  	}

  // this is the foundation function that actually does the resize
	new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();
  // now put the margin on the actual image that will be displayed (above was just the place holder)
  // note this step is not needed in the image back function because the image already has the 
  // padding added in image forward.
  //var imageName = "image" + curImageNum;
 // var newImage = document.getElementById(imageName);
 	overlayName = "image-overlay-content" + newImageNum;
	var overlayImage = document.getElementById(overlayName);

 
  if (nextImage.height > nextImage.width) {
    overlayImage.style.padding = "0 15%";
  } else {
    overlayImage.style.padding = "0";
  }
  // now slide in the new image
	//overlayName = "image-overlay-content" + newImageNum;
//	var overlayImage = document.getElementById(overlayName);

		overlayImage.style.transition = "all 0.4s ease-in-out";
		overlayImage.style.transform = "translateX(0px)";
		overlayImage.style.webkitTransform = "translateX(0px)";
		

}
// I am leaving off comments on image back because it is just image forward in reverse. 
// See comments above.
function imageBack(oldImageNum, newImageNum) {
	var curImageSize;
	if (Foundation.MediaQuery.atLeast('medium')) {
  	curImageSize = "_lg";
  } else {
		curImageSize = "_sm";
	}

	if (vidPlaying === true) {
		var vidID = "image" + oldImageNum;
		var vid = document.getElementById(vidID);
		vid.pause(); 
		vidPlaying = false;
	}


  var overlayName = "image-overlay-content" + oldImageNum;
  var curImage = document.getElementById(overlayName);
  curImage.style.transition = "all 0.4s ease-in-out";
  curImage.style.transform = "translateX(-105%)";
	curImage.style.webkitTransform = "translateX(-105%)";

	//curImageNum = newImageNum;
	
	var nextImageID = "image" + newImageNum;
	var nextImage = document.getElementById(nextImageID);
	var nextImagePath = nextImage.src; 
	var nip = nextImagePath.split(/[\/\\\.\_]/);	
	var imgFolder = nip[nip.length - 4];
//	var nextImageName = nip[nip.length - 3];
	var nextImageExt = nip[nip.length - 1];


	var imageFileName;
	if(nextImage.nodeName.toLowerCase() === "video") {
	//if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
		imageFileName = imgFolder + "/" + vidSizingPrefix + vidSizingName + curImageSize + "." + vidSizingExt;
//		nextImage.autoplay = true;
		nextImage.load();
		vidPlaying = true;
	} else {
		imageFileName = imgFolder + "/" + filenamePrefix + newImageNum + "a"  + curImageSize + "." + nextImageExt;
	}
	
	var sizingImage = document.getElementById("sizing-image");
	sizingImage.src = imageFileName;
	
	var sIContainer = document.getElementById("si-container");
  // if the image is verical, add a margin so it is not so huge compared to the 
  // horizontal images
     if (nextImage.height > nextImage.width) {
			 sIContainer.style.padding = "0 15%";
   	 } else {
       sIContainer.style.padding = "0";
  	}


  new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();
	
	
	
	overlayName = "image-overlay-content" + newImageNum;
	var overlayImage = document.getElementById(overlayName);

  overlayImage.style.transition = "all 0.4s ease-in-out";
  overlayImage.style.transform = "translateX(0px)";
	overlayImage.style.webkitTransform = "translateX(0px)";
	
}



function textForward(oldImageNum, newImageNum) {
  // move out the current image
	var overlayName = "text-overlay-content" + oldImageNum;
	var curText = document.getElementById(overlayName);
	
	curText.style.transition = "all 0.4s ease-in-out";
	curText.style.transform = "translateX(105%)";
	curText.style.webkitTransform = "translateX(105%)";
  // increment counter so we have number of next text
	//curImageNum = newImageNum;
	// put the new text in a container that determines the amount of space on the page. 
  // it is actually hidden. It is just used to make the right amount of space since
  // the text are different length. There is a section heading and a block of text.
  
    var overlayHead = "overlay-head" + newImageNum;
		var overlayHeadText = document.getElementById(overlayHead).innerHTML;
    document.getElementById("sizing-head").innerHTML = overlayHeadText;
    var overlayBody = "overlay-body" + newImageNum;
		var overlayBodyText = document.getElementById(overlayBody).innerHTML;
    document.getElementById("sizing-body").innerHTML = overlayBodyText;
    
    new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();

	overlayName = "text-overlay-content" + newImageNum;
	var newText = document.getElementById(overlayName);

		newText.style.transition = "all 0.4s ease-in-out";
		newText.style.transform = "translateX(0px)";
		newText.style.webkitTransform = "translateX(0px)";
}


// I am leaving off comments on image back because it is just image forward in reverse. 
// See comments above.
function textBack(oldImageNum, newImageNum) {
  overlayName = "text-overlay-content" + oldImageNum;
  var curText = document.getElementById(overlayName);
  curText.style.transition = "all 0.4s ease-in-out";
  curText.style.transform = "translateX(-105%)";
	curText.style.webkitTransform = "translateX(-105%)";

	//curImageNum = newImageNum;
	
	var overlayHead = "overlay-head" + newImageNum;
	var overlayHeadText = document.getElementById(overlayHead).innerHTML;
	document.getElementById("sizing-head").innerHTML = overlayHeadText;
	var overlayBody = "overlay-body" + newImageNum;
	var overlayBodyText = document.getElementById(overlayBody).innerHTML;
	document.getElementById("sizing-body").innerHTML = overlayBodyText;
	
	new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();
	
	var overlayName = "text-overlay-content" + newImageNum;
	var newText = document.getElementById(overlayName);

  newText.style.transition = "all 0.4s ease-in-out";
  newText.style.transform = "translateX(0px)";
	newText.style.webkitTransform = "translateX(0px)";


}


// handler for when some user clicks an arrow
function handleArrow(e) {
	// switch image on the old slide back to the main image
	switchToMainImage ();

	var id = e.target.getAttribute("id");
	var newImageNum = 0;
	if (this.id === "arrowleft") {
		newImageNum = curImageNum - 1;
		textBack(curImageNum, newImageNum);
//    curImageNum ++;
    imageBack(curImageNum, newImageNum);
	} else {
		newImageNum = curImageNum + 1;
		textForward(curImageNum, newImageNum);
 //   curImageNum --;
    imageForward(curImageNum, newImageNum);
	}
	curImageNum = newImageNum;
	unhighlight (newImageNum);
	//unhighlightAi();
	loadArrows();
}

function handleTb(e) {
	// switch image on the old slide back to the main image
	switchToMainImage ();

	var id = e.target.getAttribute("id");
	var sid = this.id.split(/[tb]/);
	var newImageNum = Number(sid[sid.length - 1]);
	var t = 0;
	var q = 0;
	if (newImageNum > curImageNum) {
			for (t = curImageNum; t < newImageNum; t++) {
				q = t + 1;
				imageForward(t, q);
				textForward(t, q);
			}
	} else if (newImageNum < curImageNum) {
			for (t = curImageNum; t > newImageNum; t--) {
				q = t - 1;
				imageBack(t, q);
				textBack(t, q);
			}
	}
 
	curImageNum = newImageNum;
	unhighlight (newImageNum);
	loadArrows();
}

function handleAi(e) {
	
	
	var curImageSize;
	if (Foundation.MediaQuery.atLeast('medium')) {
  	curImageSize = "_lg";
  } else {
		curImageSize = "_sm";
	}
	
	//var id = e.target.getAttribute("id");
//	var sid = this.id.split(/[jj]/);
//	var img_num_letter = sid[sid.length - 1];
	
		
	var curImageID = "image" + curImageNum;
	var curImage = document.getElementById(curImageID);
	
		
	var newImagePath = e.currentTarget.firstElementChild.src; 
	var nip = newImagePath.split(/[\/\\\.\_]/);	
	var imgFolder = nip[nip.length - 4];
	var newImageName = nip[nip.length - 3];
	var newImageExt = nip[nip.length - 1];
	
	
	
	
	
	
	var	imageFileName = imgFolder + "/" + newImageName  + curImageSize + "." + newImageExt;
	

	// put the new image in a container that determines the amount of space on the page. 
  // it is actually hidden. It is just used to make the right amount of space since
  // the images are different sizes
	var sizingImage = document.getElementById("sizing-image");
	sizingImage.src = imageFileName;
	
	var sIContainer = document.getElementById("si-container");
  // if the image is verical, add a margin so it is not so huge compared to the 
  // horizontal images
     if (curImage.height > curImage.width) {
			 sIContainer.style.padding = "0 15%";
   	 } else {
       sIContainer.style.padding = "0";
  	}

  // this is the foundation function that actually does the resize
	new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();
  // now put the margin on the actual image that will be displayed (above was just the place holder)
  // note this step is not needed in the image back function because the image already has the 
  // padding added in image forward.
  //var imageName = "image" + curImageNum;
 // var newImage = document.getElementById(imageName);
 	var overlayName = "image-overlay-content" + curImageNum;
	var overlayImage = document.getElementById(overlayName);

 
  if (curImage.height > curImage.width) {
    overlayImage.style.padding = "0 15%";
  } else {
    overlayImage.style.padding = "0";
  }
	
	
	curImage.src = imageFileName;
	//unhighlightAi();
}

function switchToMainImage () {
// in case we switched to an alt image while we were looking at an slide,
// switch back to the main image  (the one that has an "ab" in the name, i.e. worlds3a_lg.jpg,
// before we leave so when the viewer returns to this slide they will see the main image.
	var curImageSize;
	if (Foundation.MediaQuery.atLeast('medium')) {
  	curImageSize = "_lg";
  } else {
		curImageSize = "_sm";
	}
	
		
	var curImageID = "image" + curImageNum;
	var curImage = document.getElementById(curImageID);
	var curImagePath = curImage.src; 
	var nip = curImagePath.split(/[\/\\\.\_]/);	
	var imgFolder = nip[nip.length - 4];
	//var nextImageName = nip[nip.length - 3];
	var curImageExt = nip[nip.length - 1];
	
	
	var	imageFileName = imgFolder + "/" + filenamePrefix + curImageNum + "a"  + curImageSize + "." + curImageExt;
	curImage.src = imageFileName;

	resetHighlightAi()
	
}

function unhighlight(tbNum) {
	var curTb = document.getElementById("tb"+ tbNum);
//	curTb.firstElementChild.style.borderColor="#4a4a4a";
	curTb.firstElementChild.setAttribute('class', 'viewed');
}

function resetHighlightAi() {
	var aiButtons = document.querySelectorAll("a.ai");
	for (var i = 0; i < aiButtons.length; i++) {
		var aiSrc = aiButtons[i].firstElementChild.src;
		var aip = aiSrc.split(/[\/\\\.\_]/);	
		var aiName = aip[aip.length - 3];
		var aiLet = aiName.charAt(aiName.length-1);
		var aiNumA = aiName.match(/(\d+)/);
		var aiNum = aiNumA[0];
		if (aiNum == curImageNum) {
			if (aiLet == "a") {
				aiButtons[i].firstElementChild.setAttribute('class', 'selected');
			} else {
				aiButtons[i].firstElementChild.setAttribute('class', 'not-selected');
			}
		}
	}
}




function unhighlightAi() {
	var aiButtons = document.querySelectorAll("a.ai");
	for (var i = 0; i < aiButtons.length; i++) {
		var aiSrc = aiButtons[i].firstElementChild.src;
		var aip = aiSrc.split(/[\/\\\.\_]/);	
		var aiName = aip[aip.length - 3];
		// only unselect alt image thumbnails in the current slide
		var aiNumA = aiName.match(/(\d+)/);
		var aiNum = aiNumA[0];
		if (aiNum == curImageNum) {
			aiButtons[i].firstElementChild.setAttribute('class', 'not-selected');
		}
	}
}

function highlightAi(x) {
	unhighlightAi();
	x.setAttribute('class', 'selected');
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
		var newImageNum = 0;
		if (ev.type === "swipeleft" && curImageNum > 1 ) {
			newImageNum = curImageNum - 1;
			textBack(curImageNum, newImageNum);
  	  imageBack(curImageNum, newImageNum);

//				textBack();
//				curImageNum ++;
//				imageBack();
//				ev.type = "";
			} else if (ev.type === "swiperight" && curImageNum < numberOfImages) {
				newImageNum = curImageNum + 1;
				textForward(curImageNum, newImageNum);
		 //   curImageNum --;
				imageForward(curImageNum, newImageNum);
			}
			curImageNum = newImageNum;
			unhighlight (newImageNum);
			//unhighlightAi();
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
//	var nextImageName = nip[nip.length - 3];
//	var nextImageExt = nip[nip.length - 1];

	var imageFileName;
	if(nextImage.nodeName.toLowerCase() === "video") {
	//	if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
		imageFileName = "http://" + location.hostname + "/" + appFolder + "/" + imgFolder + "/" + vidSizingPrefix + vidSizingName + "a" + "_sm" + "." + vidSizingExt;
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
	//var nextImageName = nip[nip.length - 3];
	//var nextImageExt = nip[nip.length - 1];

	var imageFileName;
	if(nextImage.nodeName.toLowerCase() === "video") {
	//	if (nextImageExt === "mp4" || nextImageExt === "MP4") {	
		imageFileName = "http://" + location.hostname + "/" + appFolder + "/" + imgFolder + "/" + vidSizingPrefix + vidSizingName + "a" + "_sm" + "." + vidSizingExt;
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