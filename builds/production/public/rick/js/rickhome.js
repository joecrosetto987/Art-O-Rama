function handleRhOver(e){for(var o=e.currentTarget,t=null,l=null,r=0;r<o.childNodes.length;r++)"rickhome_gallery_black"==o.childNodes[r].className?t=o.childNodes[r]:"rickhome_gallery_names"==o.childNodes[r].className&&(l=o.childNodes[r]);t.style.opacity="0",l.style.bottom="30%",l.style.backgroundColor="#0f6cdf"}function handleRhOut(e){for(var o=e.currentTarget,t=null,l=null,r=0;r<o.childNodes.length;r++)"rickhome_gallery_black"==o.childNodes[r].className?t=o.childNodes[r]:"rickhome_gallery_names"==o.childNodes[r].className&&(l=o.childNodes[r]);t.style.opacity="0.15",l.style.bottom="5%",l.style.backgroundColor="transparent"}function fbShare(){var e="http://"+location.hostname+"/rick/img/rickhome_fb.jpg";FB.ui({method:"share",display:"popup",href:location.protocol+"//"+location.host+location.pathname,picture:e},function(e){})}function twitterShare(){var e,o;e=window.screen.width/2-285,o=window.screen.height/2-220,window.open("https://twitter.com/intent/tweet?text=Please%20look%20at%20Rick%20Therrio's%20fantastic%20art:&url="+location.protocol+"//"+location.host+location.pathname+"&via=JosephCrosetto","","width=550,height=420,resizable=yes,left="+e+",top="+o+",screenX="+e+",screenY="+o+",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no")}window.onload=function(){for(var e=document.querySelectorAll("div.rickhome_gallery"),o=0;o<e.length;o++)e[o].onmouseover=handleRhOver,e[o].onmouseout=handleRhOut;for(var t=document.querySelectorAll("a.fb-icon"),l=0;l<t.length;l++)t[l].onclick=fbShare;for(var r=document.querySelectorAll("a.twitter-icon"),n=0;n<r.length;n++)r[n].onclick=twitterShare};