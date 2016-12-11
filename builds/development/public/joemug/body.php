
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
											<polygon points="0,0,1020,0,0,64,0,0"><!--</polygon>-->
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
			<!--		<li><a href="index.php">Rick Therrio Galleries</a></li> -->
			<!--		<li><a href="intro.html">Intro</a></li> -->
      </ul>
    </div>
 <div class="off-canvas-content" data-off-canvas-content>

<!-- Here is the main content. The resizing of columns is actually tricky because the text and images are loaded dynamically. There are nested equalizers. -->
<div class="row main-row">
<div class="small-12 columns">

<div class="row">
	<div class="small-12 columns ">
		<h4 class="gallery-name aor-font text-right">
			<!--<a href="index.php"> only one gallery in this exhibit so no link to gallery home page-->
				<?php echo ARTIST ?>
			<!--</a> -->
			&#8250; &nbsp;<?php echo GALLERY_NAME ?>
		</h4>
	</div>
</div>



					<?php 
						$art_set = find_all_art_by_gallery_id($art_gallery_id);
					?>
					<?php 
						$video_set = find_all_video_by_gallery_id($video_gallery_id);
					?>


<div class="row" id="reload-eq-outer">
		<!-- Ok, so this is a cludge. If the screen is medium or large, put the text on the right in 4 colums otherwise on a small screen, stack the text below the image. But to implement the zoom screen, I am esencially showing the screen like in the small format all just one big column, even on medium and large screens. So the visitor on a laptop can really see a big image. To do this I change the class names dynamically in the javascript. I just get rid of the "medium-8" -->		
		<div id="image-panel" class="main-image-panel medium-8 medium-push-4 small-12 columns">


 		
	 	 <div class="row main-image">
	 
				
				<div class="small-1 column text-center divarrow" id="divarrowleft" >
					<a class="arrow" id="arrowleft">							
						<i class="fa fa-caret-left fa-3x"></i>
					</a>
				</div>
				<div class="small-10 column text-center">
					<div class="image-wrapper">
					<!-- this first image is actually hidden but it is used to size the screen. It seems like I am duplicating the first image but it is just sizing the page for the first image. I'm using data-interchange to dynamically load the right size image -->
					<div id="si-container">
					<img id="sizing-image" data-interchange="[img/vs_<?php echo FILENAME_PREFIX; ?>1a_sm.jpg, small], [img/vs_<?php echo FILENAME_PREFIX; ?>1a_lg.jpg, medium]" alt="<?php echo ARTIST; ?>, Artwork">
					</div>
										
										
						<!-- Here are where to put all the images. They need to be in the "img" folder. There can be any number of images, the js will count them. they should all have the same main name, i.e. "flower" followed by a number. There should be two versions of each image a large (ends with _lg, 1200px in long direction) and a small (ends with _sm, 600px in long direction). I am using foundations data-interchange to load the small image if on a small screen to speed up the initial download. -->
						<div id="image-overlay-content1" class="video">
							<canvas width="1200" height="675"></canvas>
							<video controls autoplay id="image1" src="img/<?php echo FILENAME_PREFIX; ?>1a_lg.mp4">
       				</video> 
							<!--<video controls autoplay  id="image1" src="img/worlds1_lg.mp4">
       				</video>-->
						</div>
						
						<!-- PHP loop of images -->
							<?php 
								while($art = mysqli_fetch_assoc($art_set)) { ?>
								<?php $img_count = $art["art_order"]; ?>
								
									<div id="image-overlay-content<?php echo $img_count; ?>">
								<img id="image<?php echo $img_count; ?>" data-interchange="[img/<?php echo FILENAME_PREFIX; ?><?php echo $img_count; ?>a_sm.jpg, small], [img/<?php echo FILENAME_PREFIX; ?><?php echo $img_count; ?>a_lg.jpg, medium]" alt="<?php echo ARTIST; ?> <?php echo htmlentities($art["art_title"]); ?>">
						</div>
							
							<?php } ?>
							
							
					<!-- this is a final slide that thanks visitors and asks them to go to the rick home page -->
						<?php $img_count ++; ?>
						<div id="image-overlay-content<?php echo $img_count; ?>">
						<img id="image<?php echo $img_count; ?>" data-interchange="[img/<?php echo FILENAME_PREFIX; ?><?php echo $img_count; ?>a_sm.jpg, small], [img/<?php echo FILENAME_PREFIX; ?><?php echo $img_count; ?>a_lg.jpg, medium]" alt="<?php echo ARTIST; ?>">
						</div>	
							
						
					</div>
					<a href="#" id="zoom-minus"><i class="fa fa-search-minus fa-lg v-space-sm"></i></a>
				</div>

				<div class="small-1 column text-center divarrow animated three-times bounce blue" id="divarrowright">
        	<a class="arrow" id="arrowright">
			    		<i class="fa fa-caret-right fa-3x"></i>
					</a>
				</div>
			</div>
			
		</div>
		
		<div id="text-panel" class="medium-4 medium-pull-8 small-12 columns" >
		<!-- This adds a bit of vertical space to push the text out of the header on medium and large screens -->
		<br id="text-panel-space" class="show-for-small-only">
<!-- Here is where the text goes. The first block of text is duplicated. The sizing text is actually hidden. It is just used to size the column height dynamically. Just plug your text in. The number after content, head and body should be incremented with each entry -->	

<!-- there should be only one video and I am just getting the title and description -->
			<?php $video = mysqli_fetch_assoc($video_set);  ?>

  	<div class="image-wrapper">
			<h5 id="sizing-head" class="aor-font"><?php echo htmlentities($video["video_title"]); ?></h5>
			<div id="sizing-body" class="detail-text">
				<?php echo nl2br(htmlentities($video["video_desc"])); ?><br>
			
				<cite><?php echo htmlentities($video["video_credit"]); ?></cite>
			</div>
		

<!-- put space in for animation on the last slide. It will be display = none unitl then and then switched to display = inline block. this is done in the load arrows in the js. 
<img src="img/anim_empty.png" alt="0" id="sizing-anim">		-->


<div id="text-overlay-content1">
		<h5 id="overlay-head1" class="aor-font"><?php echo htmlentities($video["video_title"]); ?></h5>
		<div id="overlay-body1" class="detail-text"><?php 
			// break up text into separate lines. There mau be an easier way to do this.
			$array = preg_split ('/\R/', $video["video_desc"]);?>
			<?php foreach ($array as $key => $value) {
   			echo htmlentities($array[$key]); ?><br>
			<?php } ?>
			<cite><?php echo htmlentities($video["video_credit"]); ?></cite>
		</div>
</div>


					<?php //getting the art_set again to
						mysqli_data_seek($art_set, 0);	
					?>

<?php while($art = mysqli_fetch_assoc($art_set)) { ?>
<?php  $text_count = $art["art_order"]; ?>
<div id="text-overlay-content<?php echo $text_count; ?>">
					<h5 id="overlay-head<?php echo $text_count; ?>" class="aor-font"><?php echo htmlentities($art["art_title"]); ?></h5>
			    <div id="overlay-body<?php echo $text_count; ?>" class="detail-text">
					
						<?php echo htmlentities($art["art_created_year"]); ?><br>
					<?php 
						if (empty($art["art_media_additional_info"])) {
							$media = find_media_by_id($art["art_media_id"]);
							echo htmlentities($media["media_name"]);
						} else {
							echo htmlentities($art["art_media_additional_info"]); 
						} ?><br>
					<?php echo htmlentities($art["art_size"]); ?><br>
					<?php 
						if ($art["art_framed"]) { 
							if (empty($art["art_framed_desc"])) {
								echo "Framed" . "<br>"; 
							} else {
								echo htmlentities($art["art_framed_desc"]) . "<br>";
							}
						}
					?>
					<?php // art_status 1=for sale, 2=not for sale, 3=sold, 4=other (leave blank)
						if ($art["art_status_id"] == 1) {
							echo "$" . htmlentities($art["art_price"]) . "<br>";
							echo $art["art_shopify_id"]; }
						elseif ($art["art_status_id"] == 2) {
							echo "Not for sale";}
						elseif ($art["art_status_id"] == 3) {
							echo "Sold";}
						elseif ($art["art_status_id"] == 4) {
							echo "";}
							 ?><br>
						
						
						<?php echo nl2br(htmlentities($art["art_desc"])); ?>
						<?php 
	// if art num pics is > 1, list the images
							if ($art["art_num_pics"] > 1) {
								echo "<div class=\"alt-images\">";
								for ($c = 1; $c <= $art["art_num_pics"]; ++$c) {
   							//	echo "   <a class=\"ai\" id=\"jj" . $text_count . number_to_letter($c). "\">";
									echo "   <a class=\"ai\" \>";
									echo "<img src=\"img/" . FILENAME_PREFIX . $text_count . number_to_letter($c) . "_tb.jpg\" width=\"50\" height=\"50\"";
									if ($c == 1) { 
										echo " class=\"selected\" "; 
									} else {
										echo " class=\"not-selected\" ";
									}
									echo " onmouseover=\"highlightAi(this)\" ";
									echo ">";
									echo "</a>";
									}
								echo "</div>";
							}
							?>
							
							
					</div>
			
</div>
<?php } ?>

<?php $text_count ++; ?>
<div id="text-overlay-content<?php echo $text_count; ?>" class="text-center">
					<h5 id="overlay-head<?php echo $text_count; ?>" class="aor-font">Thanks for visiting!</h5>
			    <div id="overlay-body<?php echo $text_count; ?>" class="detail-text">
					<div class="detail-more-text">

					
					<i class="fa fa-share-alt fa-lg v-space-sm"></i>&nbsp;&nbsp;Share on social media<br>
					<span class="social-icons-space">
				<a class="fb-icon" href="#"><i class="fa fa-facebook fa-lg v-space-sm"></i></a>
				<a class="twitter-icon" href="#"><i class="fa fa-twitter fa-lg v-space-sm"></i></a>
				<!--<a class="pinterest-icon" href="#"><i class="fa fa-pinterest-p fa-lg v-space-sm"></i></a>--> </span><br>
				</div>
				
			</div>	
</div>





      </div>
		</div>
	</div>
	

		<div class="row">
       <div class="small-12 columns divide-container">
					<div class="wedge">
	 <svg  width="105%"  viewBox="0 0 1440 115">
						<g>
							<clippath  id="shape-divide5">
									<polygon points="0,0,1440,115,0,115,0,0"></polygon>
							</clippath>
						</g>
						<image   clip-path="url(#shape-divide5)" width="1440" height="115" xlink:href="../img/texture_blue.png" preserveAspectRatio="xMidYMin slice"></image>
					</svg>
						</div>
						<h5 class="aor-font divide-content"><?php echo GALLERY_NAME ?> Gallery</h5>
						<div class="row divide-row">
								<div  class="small-12 medium-8 columns divide-label-lg">
								</div>
									<div class="medium-4  small-12 columns">
										<span class="controls show-for-medium">
											<a id="zoom-plus"><i class="fa fa-search-plus fa-lg"></i></a>
										</span>
									</div>
						</div>
					</div>
				</div>
				
				
<!-- end of divider -->
<?php //getting the art_set again to
						mysqli_data_seek($art_set, 0);	
					?>


<div class="row small-up-2 medium-up-3 large-up-5  thumbnail-gallery">
<div class="column gallery">
<a href="#" class="tb" id="tb1"><img class="viewed" src="img/<?php echo FILENAME_PREFIX; ?>1a_tb.jpg"></a>
</div>

<?php while($art = mysqli_fetch_assoc($art_set)) { ?>
								<?php $img_count = $art["art_order"]; ?>

<div class="column gallery">
<a href="#" class="tb" id="tb<?php echo $img_count; ?>"><img class="not-viewed" src="img/<?php echo FILENAME_PREFIX; ?><?php echo $img_count; ?>a_tb.jpg"></a>
</div>
<?php } ?>

<!-- thank You Slide -->
<?php $img_count ++; ?>
<div class="column gallery">
<a href="#" class="tb" id="tb<?php echo $img_count; ?>"><img class="not-viewed" src="img/<?php echo FILENAME_PREFIX; ?><?php echo $img_count; ?>a_tb.jpg"></a>
</div>

			</div> <!-- end of thumbnail gallery. Note, start of brown section below inside-->


	<!-- divider row LARGE above footer-->
			<div class="row gallery-divide-bkg"> <!-- slant up -->
			<div class="small-12 columns divide-container">
				<div class="wedge2 ">
					<svg  width="100%"  viewBox="0 0 1440 115">
						<g>
							<clippath  id="shape-divide6">
									<polygon points="0,115,1440,0,1440,115,0,115"></polygon>
							</clippath>
						</g>
						<image   clip-path="url(#shape-divide6)" width="1440" height="115" xlink:href="../img/texture_brown.png" preserveAspectRatio="xMidYMin slice"></image>
					</svg>
				</div>
			</div>
			</div>




<!-- end of divider -->

<div class="brown-footer">
	<div class="row">
		<!--<div class="small-12 medium-7 medium-push-2 columns">
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
		
		</div> -->
		<div class="small-6  columns text-center">
			<h5 class="aor-font">Share</h5>
				<a class="fb-icon" href="#"><i class="fa fa-facebook fa-lg "></i></a>
				<a class="twitter-icon" href="#"><i class="fa fa-twitter fa-lg h-space"></i></a>
		</div>
		<div class="small-6  columns text-center">
			<a href="../index.php"><img src="../img/aor_logo_brown_sm.png" class="logo-footer"></a><br>
			<a href="../index.php">Home</a>&nbsp;&nbsp;&nbsp;
			<a href="../contact.php">Contact</a>&nbsp;&nbsp;&nbsp;
			<a href="../about.php">About</a>
		</div>
	</div>	

		
	<footer class="row">
		<div class="small-12 columns text-center">
			<p><br> © 2016 Art-O-Rama - All Rights Reserved</p>
		</div>
	</footer>

</div> <!-- end of brown footer section -->

</div> <!-- end of main row and column -->
</div>		 
	
<!--	for off canvas which im not using-->
	 </div>
</div>
</div>
