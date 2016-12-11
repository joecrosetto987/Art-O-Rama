
<script src="../js/fb_init.js"></script>




<!-- wrapper for menu that slides in from the left on mobile size -->
<div class="off-canvas-wrapper">
  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
<!-- even though I am not using a sticky menu because it takes up too much room on a phone, this "sticky" class resolves a bug in foundation where the header divs wouldn't stack correctly -->

 <div class="small-12 sticky"  data-margin-top="0">

<!-- using a big or small header image depending on the size of the window -->
          <div class="row">
            <div class="small-12 columns head-container">
						
							<div class="detail-head-large head-svg-container">
							 	<svg  width="100%" viewBox="0 0 1440 167">
									<g>
											<clippath  id="shape-head-lg">
													<polygon points="0,0,1440,0,1440,47,0,167,0,0"></polygon>
											</clippath>
									</g>
        					<image   clip-path="url(#shape-head-lg)" width="1440" height="764" xlink:href="img/texture_blue.png" preserveAspectRatio="xMidYMin slice"></image>
    						</svg>
							</div>


            </div>
          </div>
	<header class="row">

			 <!-- header text floats on top of header image. It has to be divided up in columns the same as the main image and text so it shrinks and flows with them --> 
  		<div class="small-6 columns"><a href="index.php">
			<img class="head-logo-lg" src="img/aor_logo_grey_lg.png" ></a>
			</div>
			<div class="detail-head-menu small-6 columns">
				<ul class="head-menu hide-for-small-only ">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<!--<li><a href="rick/index.php">Exhibit</a></li>-->
					<!--<li><a href="bio.html">Joe's Bio</a></li>
					<li><a href="intro.html">Intro</a></li>-->
				</ul>
				<a href="#"><i class="show-for-small-only fa fa-bars" data-open="offCanvasLeft"></i></a>
			</div> 
  

    </header> <!-- end of header row -->

</div>
<!--The Menu that slides in from the left on a phone	-->								

	 <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas>
      <ul class="vertical dropdown menu" data-dropdown-menu>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="rick/index.php">Current Exhibit</a></li>
					<!--<li><a href="bio.html">Joe's Bio</a></li>
					<li><a href="intro.html">Intro</a></li> -->
      </ul>
    </div>
 <div class="off-canvas-content" data-off-canvas-content>

	
	<div class="row" data-equalizer data-equalize-on="medium" id="test-eq">
	
		<div  class="aorhome_left_panel medium-8  small-12 columns" data-equalizer-watch>
			<div class="row margin-zero">
				<div class="small-12 columns padding-zero">
					<a href="rick/index.php"><img src="img/aorhome_rick.jpg"></a>
					<div class="exhibit-name rick-font text-center small-5 small-offset-7 columns">
						<a href="rick/index.php">Rick Therrio</a>
						<a href="rick/index.php"><img src="img/aorhome_existence.gif"></a>
					</div>
				</div>
			</div>


				<!-- divider row LARGE above footer-->
<!--		<div class="row ">
       <div class="small-12 columns divide-container-lg">-->
			<div class="row footer-wedge show-for-medium">
				<div class="small-12 columns aorhome-neg-space ">
					<svg  width="100%"  viewBox="0 0 1440 115">
						<g>
							<clippath  id="shape-divide3">
									<polygon points="0,0,1440,115,0,115,0,0"></polygon>
							</clippath>
						</g>
						<image   clip-path="url(#shape-divide3)" width="1440" height="764" xlink:href="img/texture_blue.png" preserveAspectRatio="xMidYMin slice"></image>
					</svg>
				</div>
			</div>
<!--<div class="row">-->
<div class="blue-footer show-for-medium">
	<div class="row">
		<div class="small-12 medium-6 medium-push-3 columns">
			<div class="row text-center">
				<div class="small-12 columns"><a href="index.php"><img src="img/aor_logo_blue_sm.png" class="logo-footer"></a></div>
				<div class="small-4 columns">
					<p><a href="index.php">Home</a></p>
				</div>
				<div class="small-4 columns">
					<p><a href="about.php">About</a></p>
				</div>
				<div class="small-4 columns">
					<p><a href="contact.php">Contact</a></p>
				</div>
			</div>
		
		</div>
		<div class="small-6 medium-3 medium-pull-6 columns text-center">
			<h5 class="aor-font">Share</h5>
				<a class="fb-icon" href="#"><i class="fa fa-facebook fa-lg "></i></a>
				<a class="twitter-icon" href="#"><i class="fa fa-twitter fa-lg h-space"></i></a>
		</div>
		<div class="small-6 medium-3 columns text-center">
			<h5 class="aor-font">Current Exhibits</h5>
			<a href="rick/index.php">Rick Therrio</a><br>
			<a href="joemug/index.php">Mug a Joe</a>
		</div>
	</div>	

		
	<footer class="row">
		<div class="small-12 columns text-center">
			<p class="copyright"><br> © 2016 Art-O-Rama - All Rights Reserved</p>
		</div>
	</footer>

</div>
<!--</div>--> <!-- end of blue footer section -->
			
			
		</div> <!-- end of row with left panel -->
		

		
		<div class="aorhome_right_panel medium-4 small-12 columns" data-equalizer-watch>
		
		<div class="row show-for-small-only">
			<div class="small-12 columns aorhome-neg-space ">
	 			<svg  width="100%"  viewBox="0 0 1440 115">
        	<g>
            <clippath  id="shape-divide4">
                <polygon points="0,0,1440,115,0,115,0,0"></polygon>
            </clippath>
        	</g>
        	<image   clip-path="url(#shape-divide4)" width="1440" height="764" xlink:href="img/grey_background.jpg" preserveAspectRatio="xMidYMin slice"></image>
    		</svg>
			</div>
	</div>

			<div class="row">
				<div class="aorhome-welcome small-12 columns">
					<p class="show-for-medium"><br>&nbsp;<br>&nbsp;<br></p>
					<h5><a class="rick-font" href="rick/index.php">Rick Therrio – Existence is Absurd</a></h5>

					<p class="dotted-line">I hope you are stoked to see the first exhibit at Art-O-Rama online gallery. You will laugh. You will cry. You will shake your head in disbelief at Rick’s stunning work.<br>&nbsp;<br></p>

<a href="joemug/index.php"><img src=img/aorhome_mugajoe.jpg></a><br>
<h5><a class="aor-font" href="joemug/index.php">Mug a Joe</a></h5>
<p class="dotted-line">Looking for the perfect gift for a pesky in-law? Check out these one-of-a kind, handmade mugs!<br>&nbsp;<br></p>

<h5><a class="aor-font" href="about.php">Art-O-Rama</a></h5>
<p>Art-O-Rama was an edgy gallery in the 90s and is now reborn as an online behemoth promoting the world’s greatest artists. This is the place to buy stupendous, one-of-a-kind art. And more!
<br>&nbsp;<br>&nbsp;<br></p>
		

				</div>
			

			</div>
			<div class="row hide-for-small-only"> <!-- slant down -->
				<div class="aorhome-neg-space  small-12 columns">
					<svg  width="100%"  viewBox="0 0 1440 115">
						<g>
							<clippath  id="shape-divide5">
									<polygon points="0,0,1440,115,0,115,0,0"></polygon>
							</clippath>
						</g>
						<image   clip-path="url(#shape-divide5)" width="1440" height="764" xlink:href="img/texture_brown.png" preserveAspectRatio="xMidYMin slice"></image>
					</svg>
				</div>
			</div>
			<div class="row show-for-small-only"> <!-- slant up -->
				<div class="aorhome-neg-space2  small-12 columns">
					<svg  width="100%"  viewBox="0 0 1440 115">
						<g>
							<clippath  id="shape-divide6">
									<polygon points="0,115,1440,0,1440,115,0,115"></polygon>
							</clippath>
						</g>
						<image   clip-path="url(#shape-divide6)" width="1440" height="764" xlink:href="img/texture_brown.png" preserveAspectRatio="xMidYMin slice"></image>
					</svg>
				</div>
			</div>

			<div class="row">
				<div class="small-12 columns brown-panel upcoming">
					<h5 class="aor-font">Upcoming Exhibit:</h5>
					<img src="img/aorhome_ctg.jpg">
					<p><strong>Colson Truck Group</strong><br>
					Group exhibit featuring 10 infamous Chicago artists still cranking out fantastic art.<br>&nbsp;<br>&nbsp;<br></p>
					
				</div>
			</div>
			
			
		<div class="row show-for-small-only">
			<div class="small-12 columns aorhome-neg-space ">
	 			<svg  width="100%"  viewBox="0 0 1440 115">
        	<g>
            <clippath  id="shape-divide7">
                <polygon points="0,0,1440,115,0,115,0,0"></polygon>
            </clippath>
        	</g>
        	<image   clip-path="url(#shape-divide7)" width="1440" height="764" xlink:href="img/texture_blue.png" preserveAspectRatio="xMidYMin slice"></image>
    		</svg>
			</div>
	</div>
	
<div class="row show-for-small-only">

<div class="small-12 columns blue-footer">
	<div class="row">
		<div class="small-12 medium-6 medium-push-3 columns">
			<div class="row text-center">
				<div class="small-12 columns"><a href="index.php"><img src="img/aor_logo_blue_sm.png" class="logo-footer"></a></div>
				<div class="small-4 columns">
					<p><a href="index.php">Home</a></p>
				</div>
				<div class="small-4 columns">
					<p><a href="about.php">About</a></p>
				</div>
				<div class="small-4 columns">
					<p><a href="contact.php">Contact</a></p>
				</div>
			</div>
		
		</div>
		<div class="small-6 medium-3 medium-pull-6 columns text-center">
			<h5 class="aor-font">Share</h5>
				<a class="fb-icon" href="#"><i class="fa fa-facebook fa-lg "></i></a>
				<a class="twitter-icon" href="#"><i class="fa fa-twitter fa-lg h-space"></i></a>
		</div>
		<div class="small-6 medium-3 columns text-center">
			<h5 class="aor-font">Current Exhibits</h5>
			<a href="rick/index.php">Rick Therrio</a><br>
			<a href="joemug/index.php">Mug a Joe</a>
		</div>
	</div>	

		
	<footer class="row">
		<div class="small-12 columns text-center">
			<p class="copyright"><br> © 2016 Art-O-Rama - All Rights Reserved</p>
		</div>
	</footer>

</div> 
</div><!-- end of blue footer section -->
			
			
			
		</div> <!-- end of right panel column -->

	</div>

	


	 </div>
</div>
</div>
