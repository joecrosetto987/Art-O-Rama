
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
					<li class="<?php echo(load_selected("aorhome"));?>"><a href="index.php">Home</a></li>
					<li class="<?php echo(load_selected("about"));?>"><a href="about.php">About</a></li>
					<li class="<?php echo(load_selected("contact"));?>"><a href="contact.php">Contact</a></li>
					
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
					<li><a href="subscribe.php">Subscribe</a></li>
					<li><a href="rick/index.php">Current Exhibit</a></li>
					<!--<li><a href="bio.html">Joe's Bio</a></li>
					<li><a href="intro.html">Intro</a></li> -->
      </ul>
    </div>