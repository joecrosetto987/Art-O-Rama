
<script src="../js/fb_init.js"></script>




<!-- wrapper for menu that slides in from the left on mobile size -->
<div class="off-canvas-wrapper">
  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
<!-- even though I am not using a sticky menu because it takes up too much room on a phone, this "sticky" class resolves a bug in foundation where the header divs wouldn't stack correctly -->

 <div class="small-12 sticky"  data-margin-top="0">

<!-- using a big or small header image depending on the size of the window -->
          <div class="row">
			       <div class="small-12 columns head-container">
						
							<div class="detail-head-large ">
							 	<svg  width="1020" height="64" viewBox="0 0 1020 64">
									<defs>
										<clipPath id="joe">
												<polygon points="0,0,1020,0,0,64,0,0">
										</clipPath>
									</defs>
        					<image   clip-path="url(#joe)" width="1020" height="834" xlink:href="../img/texture_blue.png" preserveAspectRatio="xMidYMin slice"></image>
    						</svg>
							</div>

            </div>
          </div>
	<header class="row">

			 <!-- header text floats on top of header image. It has to be divided up in columns the same as the main image and text so it shrinks and flows with them --> 
  		<div class="small-6 columns"><a href="../index.php">
			<img class="head-logo" src="../img/aor_logo_grey_sm.png"></a>
			</div>
			<div class="detail-head-menu small-6 columns">
	<!--				<ul class="head-menu hide-for-small-only">
					<li><a href="index.html">More Art</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="bio.html">Joe's Bio</a></li>
					<li><a href="intro.html">Intro</a></li>
				</ul>-->
				<!--<br class="show-for-medium-only cart-br-space">-->
        <a href="#"><i class="show-for-small-only fa fa-bars" data-open="offCanvasLeft"></i></a>
			</div> 
  

    </header> <!-- end of header row -->

</div>
<!--The Menu that slides in from the left on a phone	-->								

	 <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas>
      <ul class="vertical dropdown menu" data-dropdown-menu>
					<li><a href="../index.php">Home</a></li>
					<li><a href="../about.php">About</a></li>
					<li><a href="../contact.php">Contact</a></li>
					<li><a href="../subscribe.php">Subscribe</a></li>
					<li><a href="index.php">Rick Therrio Galleries</a></li>
			<!--		<li><a href="intro.html">Intro</a></li> -->
      </ul>
    </div>
 <div class="off-canvas-content" data-off-canvas-content>

<!-- Here is the main content. The resizing of columns is actually tricky because the text and images are loaded dynamically. There are nested equalizers. -->
<div class="row main-row">
<div class="small-12 columns">







<div class="row" id="reload-eq-outer">
		<!-- Ok, so this is a cludge. If the screen is medium or large, put the text on the right in 4 colums otherwise on a small screen, stack the text below the image. But to implement the zoom screen, I am esencially showing the screen like in the small format all just one big column, even on medium and large screens. So the visitor on a laptop can really see a big image. To do this I change the class names dynamically in the javascript. I just get rid of the "medium-8" -->		
		<div  class="rickhome-left-panel medium-5 medium-push-7 small-12 columns">
			<div class="row">
				<div id="gallery_name" class="small-12 columns ">
					<div class="show-for-small-only"><br></div>
					<h4 class="rick-font text-right">Rick Therrio Galleries</h4>
				</div>
			</div>
			<div class="row">
			
				<div id="worlds2" class="hide-for-medium small-12 columns text-center">
					<a href="worlds.php">
						<div class="rickhome_gallery small-12 columns">
							<img src="img/rickhome_worlds.jpg">
							<div class="rickhome_gallery_black"></div>
							<h5 class="rickhome_gallery_names">Micro Worlds</h5>
						</div>
					</a>
				</div>

			
			
				<div id="random" class="hide-for-small-only small-12 columns text-center">
					<a href="random.php">
						<div class="rickhome_gallery small-12 columns">
							<img src="img/rickhome_random.jpg">
							<div class="rickhome_gallery_black"></div>
							<h5 class="rickhome_gallery_names">Random</h5>
						</div>
					</a>
				</div>
			</div>
			<div class="row">
				<div id="bombs" class="small-6 columns text-center">
					<a href="bombs.php">
						<div class="rickhome_gallery small-12 columns">
							<img src="img/rickhome_bombs.jpg">
							<div class="rickhome_gallery_black"></div>
							<h5 class="rickhome_gallery_names">Atom<br>Bombs</h5>
						</div>
					</a>
				</div>
				<div id="self" class="small-6 columns text-center">
					<a href="self.php">
						<div class="rickhome_gallery small-12 columns">
							<img src="img/rickhome_self.jpg">
							<div class="rickhome_gallery_black"></div>
							<h5 class="rickhome_gallery_names">Self-<br>Portraits</h5>
						</div>
					</a>
				</div>
			</div>
			
		</div>
		

		
		<div class="rickhome-left-panel medium-7 medium-pull-5 small-12 columns" >
			<div class="row">
			<div class="show-for-small-only"><br>&nbsp;<br></div>
				<div  id="random2" class="show-for-small-only small-7 columns text-center">
					<a href="random.php">
						<div class="rickhome_gallery small-12 columns">
							<img src="img/rickhome_random.jpg">
							<div class="rickhome_gallery_black"></div>
							<h5 class="rickhome_gallery_names">Random</h5>
						</div>
					</a>
				</div>

			
			
				<div id="worlds" class="show-for-medium small-7 columns text-center">
					<a href="worlds.php">
						<div class="rickhome_gallery small-12 columns">
							<img src="img/rickhome_worlds.jpg">
							<div class="rickhome_gallery_black"></div>
							<h5 class="rickhome_gallery_names">Micro Worlds</h5>
						</div>
					</a>
				</div>
				<div id="dogs"class="small-5 columns text-center">
					<a href="dogs.php">
						<div class="rickhome_gallery small-12 columns">
							<img src="img/rickhome_dogs.jpg">
							<div class="rickhome_gallery_black"></div>
							<h5 class="rickhome_gallery_names">Dogs</h5>
						</div>
					</a>
				</div>
			</div>
			<div class="row">
				<div id="rp"class="small-7 columns text-center">
					<a href="rp.php">
						<div class="rickhome_gallery small-12 columns">
							<img src="img/rickhome_rp.jpg">
							<div class="rickhome_gallery_black"></div>
							<h5 class="rickhome_gallery_names">Rick &amp; Pete</h5>
						</div>
					</a>
				</div>
				<div id="lamp"class="small-5 columns text-center">
					<a href="lamps.php">
						<div class="rickhome_gallery small-12 columns">
							<img src="img/rickhome_lamp.png">
							<div class="rickhome_gallery_black"></div>
							<h5 class="rickhome_gallery_names">Lamps</h5>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<!-- divider row  above footer-->

			<div class="row"> <!-- slant down -->
				<div class="wedge-neg-space  foot-container small-12 columns">
				
					<svg  width="105%"  viewBox="0 0 1440 115">
						<g>
							<clippath  id="shape-divide5">
									<polygon points="0,0,1440,115,0,115,0,0"></polygon>
							</clippath>
						</g>
						<image   clip-path="url(#shape-divide5)" width="1440" height="764" xlink:href="../img/texture_brown.png" preserveAspectRatio="xMidYMin slice"></image>
					</svg>
				</div>
			</div>

<!-- end of divider -->
<!--</div>  end of thumbnail gallery. Note, start of brown section below inside-->
<div class="rickhome-neg-space2 brown-footer">
	<div class="row">
	<!--<div class="show-for-small-only"><br>&nbsp;<br>&nbsp;<br></div>-->
		<div class="rickhome-neg-space small-12 medium-7 medium-push-2 columns">
			<div class="row">
				<h5 class="rick-font text-center"><a href="index.php">Rick Therrio Galleries</a></h5>
				<div class="small-5   medium-5  large-offset-1 large-4 columns">
					<p><a href="worlds.php">Micro Worlds</a><br>
						 <a href="rp.php">Rick & Pete</a><br>
						 <a href="self.php">Self-Portraits</a><br></p>
				</div>
				<div class="small-3 medium-3 large-3 columns">
					<p><a href="dogs.php">Dogs</a><br>
						 <a href="lamps.php">Lamps</a><br></p>
				</div>
				<div class="small-4 medium-4 large-4 columns">
					<p><a href="random.php">Random</a><br>
						 <a href="bombs.php">Atom Bombs</a><br></p>
				</div>
			</div>
		
		</div>
		<!--<div class="show-for-small-only"><br>&nbsp;<br>&nbsp;<br>&nbsp;<br></div>-->
		<div class="rickhome-neg-space small-6 medium-2 medium-pull-7 columns text-center">
			<h5 class="aor-font">Share</h5>
				<a class="fb-icon" href="#"><i class="fa fa-facebook fa-lg "></i></a>
				<a class="twitter-icon" href="#"><i class="fa fa-twitter fa-lg h-space"></i></a>
		</div>
		<div class="rickhome-neg-space small-6 medium-3 columns text-center">
			<a href="../index.php"><img src="../img/aor_logo_brown_sm.png" class="logo-footer"></a><br>
			<a href="../index.php">Home</a><br>
			<a href="../contact.php">Contact</a><br>
			<a href="../about.php">About</a><br>
			<a href="../subscribe.php">Subscribe </a>/
			<a href="../unsubscribe.php">UnSubscribe</a>
		</div>
	</div>	
	<footer class="row">
		<div class="small-12 columns text-center">
			<br> Website Designed by &nbsp;&nbsp; 
				<a href="http://3rdeyesite.com/cd/" target="_blank">
					<svg class="cd-logo" viewBox="0 0 109 156" width="36" height="50">
      						<use xlink:href="#logo_graphic3"/>
    				</svg>
    				Crosetto Design</a>
		</div>
	</footer>

		
	<footer class="row">
		<div class="small-12 columns text-center">
			<p><br> © 2016 Art-O-Rama - All Rights Reserved</p>
		</div>
	</footer>

	<svg xmlns="http://www.w3.org/2000/svg" class="defs-only">
 		<symbol id="logo_graphic3" >
		  <g>
		    <polygon id="logo4" class="cd_red_f" points="39 63 24 139 71 126 83 74 39 63"/>
		    <polygon id="logo3" class="cd_dk_brown_f" points="100 65 56 46 44 46 46 69 79 77 75 92 95 93 93 105 73 103 69 123 28 134 38 89 34 46 20 46 0 156 66 150 103 108 100 65"/>
		    <polygon id="logo2" class="cd_blue_f" points="80 0 24 38 25 51 47 51 46 45 82 21 105 25 109 5 80 0"/>
		    <polygon id="logo1" class="cd_green_f" points="101 86 50 87 46 46 25 46 30 104 103 108 101 86"/>
		  </g>
		</symbol>
	</svg>

</div> <!-- end of brown footer section -->

</div> <!-- end of main row and column -->
</div>		 
	
<!--	for off canvas which im not using-->
	 </div>
</div>
</div>
