function setFilenamePrefix(e){filenamePrefix=e}function forwardSlide(){var e=location.search.split("mySlide=")[1]?location.search.split("mySlide=")[1]:1,t=0,n=0;if(e>curImageNum)for(t=curImageNum;t<e;t++)n=t+1,imageForward(t,n),textForward(t,n);else if(e<curImageNum)for(t=curImageNum;t>e;t--)n=t-1,imageBack(t,n),textBack(t,n);curImageNum=e,unhighlight(e),loadArrows()}function loadArrows(){var e=document.getElementById("arrowleft");1==curImageNum?(e.style.visibility="hidden",e.onclick=""):(e.style.visibility="visible",e.onclick=handleArrow);var t=document.getElementById("arrowright"),n=document.getElementById("divarrowright");0==firstTime&&n.setAttribute("class","small-1 column text-center divarrow"),firstTime=!1,curImageNum===numberOfImages?(t.style.visibility="hidden",t.onclick=""):(t.style.visibility="visible",t.onclick=handleArrow)}function sizeFirstImage(){var e;e=Foundation.MediaQuery.atLeast("medium")?"_lg":"_sm";var t="image"+curImageNum,n=document.getElementById(t),a=n.src,i=a.split(/[\/\\\.\_]/),r=i[i.length-4],l=i[i.length-1];"video"===n.nodeName.toLowerCase()&&(vidPlaying=!0),vidSizingName=filenamePrefix+curImageNum+"a";var o;o="video"===n.nodeName.toLowerCase()?r+"/"+vidSizingPrefix+vidSizingName+e+"."+vidSizingExt:r+"/"+filenamePrefix+curImageNum+"a"+e+"."+l;var m=document.getElementById("sizing-image");m.src=o;var d=document.getElementById("si-container");n.height>n.width?d.style.padding="0 15%":d.style.padding="0",new Foundation.Equalizer($("#reload-eq-outer")).applyHeight(),overlayName="image-overlay-content"+curImageNum;var s=document.getElementById(overlayName);n.height>n.width?s.style.padding="0 15%":s.style.padding="0"}function imageForward(e,t){var n;if(n=Foundation.MediaQuery.atLeast("medium")?"_lg":"_sm",vidPlaying===!0){var a="image"+e,i=document.getElementById(a);i.pause(),vidPlaying=!1}var r="image-overlay-content"+e,l=document.getElementById(r);l.style.transition="all 0.4s ease-in-out",l.style.transform="translateX(105%)",l.style.webkitTransform="translateX(105%)";var o,m="image"+t,d=document.getElementById(m),s=d.src,u=s.split(/[\/\\\.\_]/),g=u[u.length-4],c=u[u.length-1];"video"===d.nodeName.toLowerCase()?(o=g+"/"+vidSizingPrefix+vidSizingName+n+"."+vidSizingExt,d.load(),vidPlaying=!0):o=g+"/"+filenamePrefix+t+"a"+n+"."+c;var y=document.getElementById("sizing-image");y.src=o;var h=document.getElementById("si-container");d.height>d.width?h.style.padding="0 15%":h.style.padding="0",new Foundation.Equalizer($("#reload-eq-outer")).applyHeight(),r="image-overlay-content"+t;var f=document.getElementById(r);d.height>d.width?f.style.padding="0 15%":f.style.padding="0",f.style.transition="all 0.4s ease-in-out",f.style.transform="translateX(0px)",f.style.webkitTransform="translateX(0px)"}function imageBack(e,t){var n;if(n=Foundation.MediaQuery.atLeast("medium")?"_lg":"_sm",vidPlaying===!0){var a="image"+e,i=document.getElementById(a);i.pause(),vidPlaying=!1}var r="image-overlay-content"+e,l=document.getElementById(r);l.style.transition="all 0.4s ease-in-out",l.style.transform="translateX(-105%)",l.style.webkitTransform="translateX(-105%)";var o,m="image"+t,d=document.getElementById(m),s=d.src,u=s.split(/[\/\\\.\_]/),g=u[u.length-4],c=u[u.length-1];"video"===d.nodeName.toLowerCase()?(o=g+"/"+vidSizingPrefix+vidSizingName+n+"."+vidSizingExt,d.load(),vidPlaying=!0):o=g+"/"+filenamePrefix+t+"a"+n+"."+c;var y=document.getElementById("sizing-image");y.src=o;var h=document.getElementById("si-container");d.height>d.width?h.style.padding="0 15%":h.style.padding="0",new Foundation.Equalizer($("#reload-eq-outer")).applyHeight(),r="image-overlay-content"+t;var f=document.getElementById(r);f.style.transition="all 0.4s ease-in-out",f.style.transform="translateX(0px)",f.style.webkitTransform="translateX(0px)"}function textForward(e,t){var n="text-overlay-content"+e,a=document.getElementById(n);a.style.transition="all 0.4s ease-in-out",a.style.transform="translateX(105%)",a.style.webkitTransform="translateX(105%)";var i="overlay-head"+t,r=document.getElementById(i).innerHTML;document.getElementById("sizing-head").innerHTML=r;var l="overlay-body"+t,o=document.getElementById(l).innerHTML;document.getElementById("sizing-body").innerHTML=o,new Foundation.Equalizer($("#reload-eq-outer")).applyHeight(),n="text-overlay-content"+t;var m=document.getElementById(n);m.style.transition="all 0.4s ease-in-out",m.style.transform="translateX(0px)",m.style.webkitTransform="translateX(0px)"}function textBack(e,t){o="text-overlay-content"+e;var n=document.getElementById(o);n.style.transition="all 0.4s ease-in-out",n.style.transform="translateX(-105%)",n.style.webkitTransform="translateX(-105%)";var a="overlay-head"+t,i=document.getElementById(a).innerHTML;document.getElementById("sizing-head").innerHTML=i;var r="overlay-body"+t,l=document.getElementById(r).innerHTML;document.getElementById("sizing-body").innerHTML=l,new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();var o="text-overlay-content"+t,m=document.getElementById(o);m.style.transition="all 0.4s ease-in-out",m.style.transform="translateX(0px)",m.style.webkitTransform="translateX(0px)"}function handleArrow(e){switchToMainImage();var t=(e.target.getAttribute("id"),0);"arrowleft"===this.id?(t=curImageNum-1,textBack(curImageNum,t),imageBack(curImageNum,t)):(t=curImageNum+1,textForward(curImageNum,t),imageForward(curImageNum,t)),curImageNum=t,unhighlight(t),loadArrows()}function handleTb(e){switchToMainImage();var t=(e.target.getAttribute("id"),this.id.split(/[tb]/)),n=Number(t[t.length-1]),a=0,i=0;if(n>curImageNum)for(a=curImageNum;a<n;a++)i=a+1,imageForward(a,i),textForward(a,i);else if(n<curImageNum)for(a=curImageNum;a>n;a--)i=a-1,imageBack(a,i),textBack(a,i);curImageNum=n,unhighlight(n),loadArrows()}function handleAi(e){var t;t=Foundation.MediaQuery.atLeast("medium")?"_lg":"_sm";var n="image"+curImageNum,a=document.getElementById(n),i=e.currentTarget.firstElementChild.src,r=i.split(/[\/\\\.\_]/),l=r[r.length-4],o=r[r.length-3],m=r[r.length-1],d=l+"/"+o+t+"."+m,s=document.getElementById("sizing-image");s.src=d;var u=document.getElementById("si-container");a.height>a.width?u.style.padding="0 15%":u.style.padding="0",new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();var g="image-overlay-content"+curImageNum,c=document.getElementById(g);a.height>a.width?c.style.padding="0 15%":c.style.padding="0",a.src=d}function switchToMainImage(){var e;e=Foundation.MediaQuery.atLeast("medium")?"_lg":"_sm";var t="image"+curImageNum,n=document.getElementById(t),a=n.src,i=a.split(/[\/\\\.\_]/),r=i[i.length-4],l=i[i.length-1],o=r+"/"+filenamePrefix+curImageNum+"a"+e+"."+l;n.src=o,resetHighlightAi()}function unhighlight(e){var t=document.getElementById("tb"+e);t.firstElementChild.setAttribute("class","viewed")}function resetHighlightAi(){for(var e=document.querySelectorAll("a.ai"),t=0;t<e.length;t++){var n=e[t].firstElementChild.src,a=n.split(/[\/\\\.\_]/),i=a[a.length-3],r=i.charAt(i.length-1),l=i.match(/(\d+)/),o=l[0];o==curImageNum&&("a"==r?e[t].firstElementChild.setAttribute("class","selected"):e[t].firstElementChild.setAttribute("class","not-selected"))}}function unhighlightAi(){for(var e=document.querySelectorAll("a.ai"),t=0;t<e.length;t++){var n=e[t].firstElementChild.src,a=n.split(/[\/\\\.\_]/),i=a[a.length-3],r=i.match(/(\d+)/),l=r[0];l==curImageNum&&e[t].firstElementChild.setAttribute("class","not-selected")}}function highlightAi(e){unhighlightAi(),e.setAttribute("class","selected")}function loadNumOfImages(){for(numberOfImages=1;null!==t;){numberOfImages++;var e="image"+numberOfImages,t=document.getElementById(e)}numberOfImages--}function loadHammer(){var e=document.getElementById("reload-eq-outer"),t=new Hammer(e);t.on("swipeleft swiperight",function(e){var t=0;"swipeleft"===e.type&&curImageNum>1?(t=curImageNum-1,textBack(curImageNum,t),imageBack(curImageNum,t)):"swiperight"===e.type&&curImageNum<numberOfImages&&(t=curImageNum+1,textForward(curImageNum,t),imageForward(curImageNum,t)),curImageNum=t,unhighlight(t),loadArrows()})}function handleZoomPlus(){document.getElementById("text-panel").setAttribute("class","small-12 columns"),document.getElementById("image-panel").setAttribute("class","main-image-panel small-12 columns"),document.getElementById("text-panel-space").setAttribute("class",""),sizeFirstImage(),document.getElementById("zoom-plus").style.display="none",document.getElementById("zoom-minus").style.display="inline"}function handleZoomMinus(){document.getElementById("image-panel").setAttribute("class","main-image-panel medium-8 medium-push-4 small-12 columns"),document.getElementById("text-panel").setAttribute("class","medium-4 medium-pull-8 small-12 columns"),sizeFirstImage(),document.getElementById("zoom-minus").style.display="none",document.getElementById("zoom-plus").style.display="inline"}function swapGif(){var e=document.getElementById("animatedGif");e.src=downloading_loop.src}function loadAnim(){var e=document.getElementById("animatedGif");if("0"!==e.alt)downloading_loop=new Image,downloading_loop.onload=function(){var t=new Image;t.onload=function(){e.src=this.src,window.setTimeout(swapGif,e.alt)},t.src="img/"+vidSizingName+"_anim.gif"},downloading_loop.src="img/"+vidSizingName+"_anim_loop.gif";else{var t=new Image;t.onload=function(){e.src=this.src},t.src="img/"+vidSizingName+"_anim.gif"}}function fbShare(){var e,t="image"+curImageNum,n=document.getElementById(t),a=n.src,i=a.split(/[\/\\\.\_]/),r=i[i.length-5],l=i[i.length-4];e="video"===n.nodeName.toLowerCase()?"http://"+location.hostname+"/"+r+"/"+l+"/"+vidSizingPrefix+vidSizingName+"a_sm."+vidSizingExt:a,FB.ui({method:"share",display:"popup",href:location.protocol+"//"+location.host+location.pathname,picture:e},function(e){})}function twitterShare(){var e,t;e=window.screen.width/2-285,t=window.screen.height/2-220,window.open("https://twitter.com/intent/tweet?text=Please%20look%20at%20this%20fantastic%20art:&url="+location.protocol+"//"+location.host+location.pathname+"&via=aorgallery","","width=550,height=420,resizable=yes,left="+e+",top="+t+",screenX="+e+",screenY="+t+",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no")}var curImageNum=1,numberOfImages=0,vidSizingName="",vidSizingPrefix="vs_",vidSizingExt="jpg",downloading_loop,vidPlaying=!1,firstTime=!0,filenamePrefix;window.onload=function(){loadNumOfImages(),loadArrows(),loadHammer(),sizeFirstImage();var e=document.getElementById("zoom-plus");e.onclick=handleZoomPlus;var t=document.getElementById("zoom-minus");t.onclick=handleZoomMinus;for(var n=document.querySelectorAll("a.fb-icon"),a=0;a<n.length;a++)n[a].onclick=fbShare;for(var i=document.querySelectorAll("a.twitter-icon"),r=0;r<i.length;r++)i[r].onclick=twitterShare;for(var l=document.querySelectorAll("a.arrow"),o=0;o<l.length;o++)l[o].onclick=handleArrow;for(var m=document.querySelectorAll("a.tb"),d=0;d<m.length;d++)m[d].onclick=handleTb;for(var s=document.querySelectorAll("a.ai"),u=0;u<s.length;u++)s[u].onclick=handleAi,s[u].onmouseover=handleAi;forwardSlide()};