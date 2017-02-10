function setFilenamePrefix(e){filenamePrefix=e}function loadArrows(){var e=document.getElementById("arrowleft");1==curImageNum?(e.style.visibility="hidden",e.onclick=""):(e.style.visibility="visible",e.onclick=handleArrow);var t=document.getElementById("arrowright"),n=document.getElementById("divarrowright");0==firstTime&&n.setAttribute("class","small-1 column text-center divarrow"),firstTime=!1,curImageNum===numberOfImages?(t.style.visibility="hidden",t.onclick=""):(t.style.visibility="visible",t.onclick=handleArrow)}function sizeFirstImage(){var e;e=Foundation.MediaQuery.atLeast("medium")?"_lg":"_sm";var t="image"+curImageNum,n=document.getElementById(t),i=n.src,a=i.split(/[\/\\\.\_]/),l=a[a.length-4],r=a[a.length-1];"video"===n.nodeName.toLowerCase()&&(vidPlaying=!0),vidSizingName=filenamePrefix+curImageNum+"a";var o;o="video"===n.nodeName.toLowerCase()?l+"/"+vidSizingPrefix+vidSizingName+e+"."+vidSizingExt:l+"/"+filenamePrefix+curImageNum+"a"+e+"."+r;var m=document.getElementById("sizing-image");m.src=o;var d=document.getElementById("si-container");n.height>n.width?d.style.padding="0 15%":d.style.padding="0",new Foundation.Equalizer($("#reload-eq-outer")).applyHeight()}function imageForward(e,t){var n;if(n=Foundation.MediaQuery.atLeast("medium")?"_lg":"_sm",vidPlaying===!0){var i="image"+e,a=document.getElementById(i);a.pause(),vidPlaying=!1}var l="image-overlay-content"+e,r=document.getElementById(l);r.style.transition="all 0.4s ease-in-out",r.style.transform="translateX(105%)",r.style.webkitTransform="translateX(105%)";var o,m="image"+t,d=document.getElementById(m),s=d.src,u=s.split(/[\/\\\.\_]/),g=u[u.length-4],c=u[u.length-1];"video"===d.nodeName.toLowerCase()?(o=g+"/"+vidSizingPrefix+vidSizingName+n+"."+vidSizingExt,d.load(),vidPlaying=!0):o=g+"/"+filenamePrefix+t+"a"+n+"."+c;var y=document.getElementById("sizing-image");y.src=o;var h=document.getElementById("si-container");d.height>d.width?h.style.padding="0 15%":h.style.padding="0",new Foundation.Equalizer($("#reload-eq-outer")).applyHeight(),l="image-overlay-content"+t;var f=document.getElementById(l);d.height>d.width?f.style.padding="0 15%":f.style.padding="0",f.style.transition="all 0.4s ease-in-out",f.style.transform="translateX(0px)",f.style.webkitTransform="translateX(0px)"}function imageBack(e,t){var n;if(n=Foundation.MediaQuery.atLeast("medium")?"_lg":"_sm",vidPlaying===!0){var i="image"+e,a=document.getElementById(i);a.pause(),vidPlaying=!1}var l="image-overlay-content"+e,r=document.getElementById(l);r.style.transition="all 0.4s ease-in-out",r.style.transform="translateX(-105%)",r.style.webkitTransform="translateX(-105%)";var o,m="image"+t,d=document.getElementById(m),s=d.src,u=s.split(/[\/\\\.\_]/),g=u[u.length-4],c=u[u.length-1];"video"===d.nodeName.toLowerCase()?(o=g+"/"+vidSizingPrefix+vidSizingName+n+"."+vidSizingExt,d.load(),vidPlaying=!0):o=g+"/"+filenamePrefix+t+"a"+n+"."+c;var y=document.getElementById("sizing-image");y.src=o;var h=document.getElementById("si-container");d.height>d.width?h.style.padding="0 15%":h.style.padding="0",new Foundation.Equalizer($("#reload-eq-outer")).applyHeight(),l="image-overlay-content"+t;var f=document.getElementById(l);f.style.transition="all 0.4s ease-in-out",f.style.transform="translateX(0px)",f.style.webkitTransform="translateX(0px)"}function textForward(e,t){var n="text-overlay-content"+e,i=document.getElementById(n);i.style.transition="all 0.4s ease-in-out",i.style.transform="translateX(105%)",i.style.webkitTransform="translateX(105%)";var a="overlay-head"+t,l=document.getElementById(a).innerHTML;document.getElementById("sizing-head").innerHTML=l;var r="overlay-body"+t,o=document.getElementById(r).innerHTML;document.getElementById("sizing-body").innerHTML=o,new Foundation.Equalizer($("#reload-eq-outer")).applyHeight(),n="text-overlay-content"+t;var m=document.getElementById(n);m.style.transition="all 0.4s ease-in-out",m.style.transform="translateX(0px)",m.style.webkitTransform="translateX(0px)"}function textBack(e,t){o="text-overlay-content"+e;var n=document.getElementById(o);n.style.transition="all 0.4s ease-in-out",n.style.transform="translateX(-105%)",n.style.webkitTransform="translateX(-105%)";var i="overlay-head"+t,a=document.getElementById(i).innerHTML;document.getElementById("sizing-head").innerHTML=a;var l="overlay-body"+t,r=document.getElementById(l).innerHTML;document.getElementById("sizing-body").innerHTML=r,new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();var o="text-overlay-content"+t,m=document.getElementById(o);m.style.transition="all 0.4s ease-in-out",m.style.transform="translateX(0px)",m.style.webkitTransform="translateX(0px)"}function handleArrow(e){switchToMainImage();var t=(e.target.getAttribute("id"),0);"arrowleft"===this.id?(t=curImageNum-1,textBack(curImageNum,t),imageBack(curImageNum,t)):(t=curImageNum+1,textForward(curImageNum,t),imageForward(curImageNum,t)),curImageNum=t,unhighlight(t),loadArrows()}function handleTb(e){switchToMainImage();var t=(e.target.getAttribute("id"),this.id.split(/[tb]/)),n=Number(t[t.length-1]),i=0,a=0;if(n>curImageNum)for(i=curImageNum;i<n;i++)a=i+1,imageForward(i,a),textForward(i,a);else if(n<curImageNum)for(i=curImageNum;i>n;i--)a=i-1,imageBack(i,a),textBack(i,a);curImageNum=n,unhighlight(n),loadArrows()}function handleAi(e){var t;t=Foundation.MediaQuery.atLeast("medium")?"_lg":"_sm";var n="image"+curImageNum,i=document.getElementById(n),a=e.currentTarget.firstElementChild.src,l=a.split(/[\/\\\.\_]/),r=l[l.length-4],o=l[l.length-3],m=l[l.length-1],d=r+"/"+o+t+"."+m,s=document.getElementById("sizing-image");s.src=d;var u=document.getElementById("si-container");i.height>i.width?u.style.padding="0 15%":u.style.padding="0",new Foundation.Equalizer($("#reload-eq-outer")).applyHeight();var g="image-overlay-content"+curImageNum,c=document.getElementById(g);i.height>i.width?c.style.padding="0 15%":c.style.padding="0",i.src=d}function switchToMainImage(){var e;e=Foundation.MediaQuery.atLeast("medium")?"_lg":"_sm";var t="image"+curImageNum,n=document.getElementById(t),i=n.src,a=i.split(/[\/\\\.\_]/),l=a[a.length-4],r=a[a.length-1],o=l+"/"+filenamePrefix+curImageNum+"a"+e+"."+r;n.src=o,resetHighlightAi()}function unhighlight(e){var t=document.getElementById("tb"+e);t.firstElementChild.setAttribute("class","viewed")}function resetHighlightAi(){for(var e=document.querySelectorAll("a.ai"),t=0;t<e.length;t++){var n=e[t].firstElementChild.src,i=n.split(/[\/\\\.\_]/),a=i[i.length-3],l=a.charAt(a.length-1),r=a.match(/(\d+)/),o=r[0];o==curImageNum&&("a"==l?e[t].firstElementChild.setAttribute("class","selected"):e[t].firstElementChild.setAttribute("class","not-selected"))}}function unhighlightAi(){for(var e=document.querySelectorAll("a.ai"),t=0;t<e.length;t++){var n=e[t].firstElementChild.src,i=n.split(/[\/\\\.\_]/),a=i[i.length-3],l=a.match(/(\d+)/),r=l[0];r==curImageNum&&e[t].firstElementChild.setAttribute("class","not-selected")}}function highlightAi(e){unhighlightAi(),e.setAttribute("class","selected")}function loadNumOfImages(){for(numberOfImages=1;null!==t;){numberOfImages++;var e="image"+numberOfImages,t=document.getElementById(e)}numberOfImages--}function loadHammer(){var e=document.getElementById("reload-eq-outer"),t=new Hammer(e);t.on("swipeleft swiperight",function(e){var t=0;"swipeleft"===e.type&&curImageNum>1?(t=curImageNum-1,textBack(curImageNum,t),imageBack(curImageNum,t)):"swiperight"===e.type&&curImageNum<numberOfImages&&(t=curImageNum+1,textForward(curImageNum,t),imageForward(curImageNum,t)),curImageNum=t,unhighlight(t),loadArrows()})}function handleZoomPlus(){document.getElementById("text-panel").setAttribute("class","small-12 columns"),document.getElementById("image-panel").setAttribute("class","main-image-panel small-12 columns"),document.getElementById("text-panel-space").setAttribute("class",""),sizeFirstImage(),document.getElementById("zoom-plus").style.display="none",document.getElementById("zoom-minus").style.display="inline"}function handleZoomMinus(){document.getElementById("image-panel").setAttribute("class","main-image-panel medium-8 medium-push-4 small-12 columns"),document.getElementById("text-panel").setAttribute("class","medium-4 medium-pull-8 small-12 columns"),sizeFirstImage(),document.getElementById("zoom-minus").style.display="none",document.getElementById("zoom-plus").style.display="inline"}function swapGif(){var e=document.getElementById("animatedGif");e.src=downloading_loop.src}function loadAnim(){var e=document.getElementById("animatedGif");if("0"!==e.alt)downloading_loop=new Image,downloading_loop.onload=function(){var t=new Image;t.onload=function(){e.src=this.src,window.setTimeout(swapGif,e.alt)},t.src="img/"+vidSizingName+"_anim.gif"},downloading_loop.src="img/"+vidSizingName+"_anim_loop.gif";else{var t=new Image;t.onload=function(){e.src=this.src},t.src="img/"+vidSizingName+"_anim.gif"}}function fbShare(){var e,t="image"+curImageNum,n=document.getElementById(t),i=n.src,a=i.split(/[\/\\\.\_]/),l=a[a.length-5],r=a[a.length-4];e="video"===n.nodeName.toLowerCase()?"http://"+location.hostname+"/"+l+"/"+r+"/"+vidSizingPrefix+vidSizingName+"a_sm."+vidSizingExt:i,FB.ui({method:"share",display:"popup",href:location.protocol+"//"+location.host+location.pathname,picture:e},function(e){})}function twitterShare(){var e,t;e=window.screen.width/2-285,t=window.screen.height/2-220,window.open("https://twitter.com/intent/tweet?text=Please%20look%20at%20this%20fantastic%20art:&url="+location.protocol+"//"+location.host+location.pathname+"&via=JosephCrosetto","","width=550,height=420,resizable=yes,left="+e+",top="+t+",screenX="+e+",screenY="+t+",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no")}var curImageNum=1,numberOfImages=0,vidSizingName="",vidSizingPrefix="vs_",vidSizingExt="jpg",downloading_loop,vidPlaying=!1,firstTime=!0,filenamePrefix;window.onload=function(){loadNumOfImages(),loadArrows(),loadHammer(),sizeFirstImage();var e=document.getElementById("zoom-plus");e.onclick=handleZoomPlus;var t=document.getElementById("zoom-minus");t.onclick=handleZoomMinus;for(var n=document.querySelectorAll("a.fb-icon"),i=0;i<n.length;i++)n[i].onclick=fbShare;for(var a=document.querySelectorAll("a.twitter-icon"),l=0;l<a.length;l++)a[l].onclick=twitterShare;for(var r=document.querySelectorAll("a.arrow"),o=0;o<r.length;o++)r[o].onclick=handleArrow;for(var m=document.querySelectorAll("a.tb"),d=0;d<m.length;d++)m[d].onclick=handleTb;for(var s=document.querySelectorAll("a.ai"),u=0;u<s.length;u++)s[u].onclick=handleAi,s[u].onmouseover=handleAi};