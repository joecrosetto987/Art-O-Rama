function fbShare(){var o="http://"+location.hostname+"/img/aorhome_rick.jpg";FB.ui({method:"share",display:"popup",href:location.protocol+"//"+location.host+location.pathname,picture:o},function(o){})}function twitterShare(){var o,t;o=window.screen.width/2-285,t=window.screen.height/2-220,window.open("https://twitter.com/intent/tweet?text=View%20some%20amazing%20art%20that%20will%20bend%20your%20mind%20into%20a%20pretzel%20at%20Art-O-Rama%20Gallery:&url="+location.protocol+"//"+location.host+location.pathname+"&via=JosephCrosetto","","width=550,height=420,resizable=yes,left="+o+",top="+t+",screenX="+o+",screenY="+t+",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no")}window.onload=function(){for(var o=document.querySelectorAll("a.fb-icon"),t=0;t<o.length;t++)o[t].onclick=fbShare;for(var e=document.querySelectorAll("a.twitter-icon"),n=0;n<e.length;n++)e[n].onclick=twitterShare};