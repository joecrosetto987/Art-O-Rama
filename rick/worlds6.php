<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Art-O-Rama Gallery - Rick Therrio">
<meta name="keywords" content="Art,Art-O-Rama Gallery,Art-O-Rama,Rick Therrio,painting,watercolor,oil,chicago">
<meta name="author" content="Art-O-Rama">
<meta property="og:title" content="Art-O-Rama Gallery - Rick Therrio" />
<meta property="og:description" content="Art-O-Rama Gallery - Art of Rick Therrio" />
<meta property="og:type" content="video.movie" />
<meta property="og:url" content="http://aor.gallery/rick/img/world1_lg.mp4" />
<meta property="og:image" content="http://aor.gallery/rick/img/world2_lg.jpg" />
<meta property="og:video" content="http://aor.gallery/rick/img/world1_lg.mp4" />
<meta property="fb:app_id" content="1588011841497331" />
<meta name="viewport" content="width=device-width" />
<title>Art-O-Rama - Rick Therrio</title>
<link rel="shortcut icon" type="image/ico" href="http://aor.gallery/aor.ico"/>
<link rel="stylesheet" href="../css/foundation.css" /> 
<link rel="stylesheet" href="css/rick.css" />
<link href="https://fonts.googleapis.com/css?family=Merriweather:bold|Palanquin+Dark:semibold" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="../css/animate.css" rel="stylesheet" type="text/css">
<script src="../js/vendor/modernizr.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73917665-3', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body>
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
							
							
							 <svg  width="1440px" height="64px" viewBox="0 0 1440 64">
        <g>
            <clippath  id="shape-head-lg">
                <polygon points="0,0,1020,0,0,64,0,0"></polygon>
            </clippath>
        </g>
        <image   clip-path="url(#shape-head-lg)" width="1020" height="834" xlink:href="../img/texture_blue.png" preserveAspectRatio="xMidYMin slice"></image>
    </svg>
							</div>


            </div>
          </div>
	<header class="row">

			 <!-- header text floats on top of header image. It has to be divided up in columns the same as the main image and text so it shrinks and flows with them --> 
  		<div class="small-6 columns"><a href="../index.html">
			<img class="head-logo" src="../img/aor_logo_grey_sm.png"></a>
			</div>
			<div class="detail-head-menu small-6 columns">
	<!--				<ul class="head-menu hide-for-small-only">
					<li><a href="index.html">More Art</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="bio.html">Joe's Bio</a></li>
					<li><a href="intro.html">Intro</a></li>
				</ul>-->
				<!--<br class="show-for-medium-only cart-br-space">
        <a href="#" class="highlight"><i class="fa fa-shopping-cart cart-v-space"></i> checkout</a>-->
			</div> 
  

    </header> <!-- end of header row -->

</div>
<!--The Menu that slides in from the left on a phone	-->								

	 <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas>
      <ul class="vertical dropdown menu" data-dropdown-menu>
					<li><a href="index.html">More Art</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="bio.html">Joe's Bio</a></li>
			<!--		<li><a href="intro.html">Intro</a></li> -->
      </ul>
    </div>
 <div class="off-canvas-content" data-off-canvas-content>

<!-- Here is the main content. The resizing of columns is actually tricky because the text and images are loaded dynamically. There are nested equalizers. -->
<div class="row main-row">
<div class="small-12 columns">

<div class="row">
	<div class="small-12 columns ">
		<h4 class="rick-font text-right"><a href="index.html"><span class="highlight">Rick Therrio</span></a> &#8250; Micro Worlds</h4>
	</div>
</div>


					<?php
						define("GALLERY_NAME", "Micro Worlds");
						define("ARTIST", "Rick Therrio");
						$gallery = find_gallery_by_name(GALLERY_NAME);
						define("FILENAME_PREFIX", $gallery["gallery_filename_prefix"]);
						$art_gallery_id = $gallery["gallery_id"];
						$video_gallery_id = $gallery["gallery_id"];
						
					?>
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
					<img id="sizing-image" data-interchange="[img/vs_<?php echo FILENAME_PREFIX; ?>1_sm.jpg, small], [img/vs_<?php echo FILENAME_PREFIX; ?>1_lg.jpg, medium]" alt="<?php echo ARTIST; ?>, Artwork">
					
										
										
						<!-- Here are where to put all the images. They need to be in the "img" folder. There can be any number of images, the js will count them. they should all have the same main name, i.e. "flower" followed by a number. There should be two versions of each image a large (ends with _lg, 1200px in long direction) and a small (ends with _sm, 600px in long direction). I am using foundations data-interchange to load the small image if on a small screen to speed up the initial download. -->
						<div id="image-overlay-content1" class="video">
							<canvas width="1200" height="675"></canvas>
							<video controls autoplay id="image1" src="img/<?php echo FILENAME_PREFIX; ?>1_lg.mp4">
       				</video> 
							<!--<video controls autoplay  id="image1" src="img/worlds1_lg.mp4">
       				</video>-->
						</div>
						
						<!-- PHP loop of images -->
							<?php 
								while($art = mysqli_fetch_assoc($art_set)) { ?>
								<?php $img_count = $art["art_order"]; ?>
								
									<div id="image-overlay-content<?php echo $img_count; ?>">
								<img id="image<?php echo $img_count; ?>" data-interchange="[img/<?php echo FILENAME_PREFIX; ?><?php echo $img_count; ?>_sm.jpg, small], [img/<?php echo FILENAME_PREFIX; ?><?php echo $img_count; ?>_lg.jpg, medium]" alt="<?php echo ARTIST; ?> <?php echo htmlentities($art["art_title"]); ?>">
						</div>
							
							<?php } ?>
						
					</div>
					<a href="#" id="zoom-minus"><i class="fa fa-search-minus fa-lg v-space-sm"></i></a>
				</div>

				<div class="small-1 column text-center divarrow" id="divarrowright">
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
			<h5 id="sizing-head" class="rick-font"><?php echo htmlentities($video["video_title"]); ?></h5>
			<div id="sizing-body" class="detail-text">
				<?php 
			// break up text into separate lines. There mau be an easier way to do this.
				$array = preg_split ('/\R/', $video["video_desc"]);?>
				<?php foreach ($array as $key => $value) {
					echo htmlentities($array[$key]); ?><br>
				<?php } ?>
				<cite><?php echo htmlentities($video["video_credit"]); ?></cite>
			</div>
		

<!-- put space in for animation on the last slide. It will be display = none unitl then and then switched to display = inline block. this is done in the load arrows in the js. 
<img src="img/anim_empty.png" alt="0" id="sizing-anim">		-->


<div id="text-overlay-content1">
		<h5 id="overlay-head1" class="rick-font"><?php echo htmlentities($video["video_title"]); ?></h5>
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
					<h5 id="overlay-head<?php echo $text_count; ?>" class="rick-font"><?php echo htmlentities($art["art_title"]); ?></h5>
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
					<?php // art_status 1=for sale, 2=not for sale, 3=sold
						if ($art["art_status_id"] == 1) {
							echo "$" . htmlentities($art["art_price"]) . "<br>";
							echo $art["art_shopify_id"]; }
						elseif ($art["art_status_id"] == 2) {
							echo "Not for sale";}
						elseif ($art["art_status_id"] == 3) {
							echo "Sold";}
							 ?><br>
						
						
						<?php echo htmlentities($art["art_desc"]); ?>
					</div>
			
</div>
<?php } ?>

<!--
<div id="text-overlay-content16" class="no-right-pad">
					<h3 id="overlay-head16">Thanks for Visiting</h3>
			    <div id="overlay-body16" class="detail-text"><a href="index.html"><i class="fa fa-th fa-lg"></i></a>&nbsp;&nbsp;See more of Rick's Art! <br>
					<i class="fa fa-share-alt fa-lg v-space-sm"></i>&nbsp;&nbsp;Share on social media<br>
					<span class="social-icons-white">
				<a class="fb-icon" href="#"><i class="fa fa-facebook fa-lg v-space-sm"></i></a>
				<a class="twitter-icon" href="#"><i class="fa fa-twitter fa-lg v-space-sm"></i></a>
				<a class="pinterest-icon" href="#"><i class="fa fa-pinterest-p fa-lg v-space-sm"></i></a> </span><br>		
				</div>		
</div> -->

      </div>
		</div>
	</div>
	
<!-- divider row LARGE-->
		<div class="row hide-for-small-only">
       <div class="small-12 columns divide-container-lg">
					<div class="divide-bkg">
	 <svg  width="1440px" height="115px" viewBox="0 0 1440 115">
        <g>
            <clippath  id="shape-divide1">
             <!--   <polygon points="0,0,1440,115,0,115,0,0px"></polygon>-->
                <polygon points="0,0,1440,115,0,115,0,0"></polygon>
            </clippath>
        </g>
        <image   clip-path="url(#shape-divide1)" width="1440" height="764" xlink:href="../img/texture_blue.png" preserveAspectRatio="xMidYMin slice"></image>
    </svg>
						</div>
						<div class="row divide-row">
								<div  class="small-12 medium-8 columns divide-label-lg">
									<h5 class="rick-font divide-content-lg">Micro Worlds Gallery</h5>
								</div>
									<div class="medium-4  small-12 columns">
										<span class="controls show-for-medium">
										<a id="zoom-plus"><i class="fa fa-search-plus fa-lg"></i></a>
										<!--<a id="zoom-minus"><i class="fa fa-search-minus fa-lg"></i></a>--></span>
									</div>
						</div>
					</div>
				</div>
	<!-- divider row SMALL-->	
		<div class="row show-for-small-only">
       <div class="small-12 columns divide-container-sm">
					<div class="divide-bkg">
	 <svg  width="1440px" height="50px" viewBox="0 0 1440 50">
        <g>
            <clippath  id="shape-divide2">
                <polygon points="0,0,640,50,0,50,0,0"></polygon>
            </clippath>
        </g>
        <image   clip-path="url(#shape-divide2)" width="1440" height="764" xlink:href="../img/texture_blue.png" preserveAspectRatio="xMidYMin slice"></image>
    </svg>
						</div>
						<div class="row divide-row">
								<div  class="small-12 divide-label-sm columns">
									<h5 class="rick-font divide-content-sm">Micro Worlds Gallery</h5>
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
<a href="#" class="tb" id="tb1"><img class="thumbnail" src="img/<?php echo FILENAME_PREFIX; ?>1_tb.jpg"></a>
</div>

<?php while($art = mysqli_fetch_assoc($art_set)) { ?>
								<?php $img_count = $art["art_order"]; ?>

<div class="column gallery">
<a href="#" class="tb" id="tb<?php echo $img_count; ?>"><img class="thumbnail" src="img/<?php echo FILENAME_PREFIX; ?><?php echo $img_count; ?>_tb.jpg"></a>
</div>
<?php } ?>



	<!-- divider row LARGE above footer-->
		<div class="row hide-for-small-only">
       <div class="small-12 columns divide-container-lg">
					<div class="gallery-divide-bkg">
	 <svg  width="1440px" height="115px" viewBox="0 0 1440 115">
        <g>
            <clippath  id="shape-divide3">
                <polygon points="0,115,1440,0,1440,115,0,115"></polygon>
            </clippath>
        </g>
        <image   clip-path="url(#shape-divide3)" width="1440" height="764" xlink:href="../img/texture_brown.png" preserveAspectRatio="xMidYMin slice"></image>
    </svg>
						</div>

					</div>
				</div>
	<!-- divider row SMALL-->	
		<div class="row show-for-small-only">
       <div class="small-12 columns divide-container-sm">
					<div class="gallery-divide-bkg">
	 <svg  width="1440px" height="50px" viewBox="0 0 1440 50">
        <g>
            <clippath  id="shape-divide4">
                <polygon points="0,50,640,0,640,50,0,50"></polygon>
            </clippath>
        </g>
        <image   clip-path="url(#shape-divide4)" width="1440" height="764" xlink:href="../img/texture_brown.png" preserveAspectRatio="xMidYMin slice"></image>
    </svg>
						</div>

				</div>
			</div>
<!-- end of divider -->
</div> <!-- end of thumbnail gallery. Note, start of brown section below inside-->
<div class="brown-footer">
	<div class="row">
		<div class="small-12 medium-6 medium-push-3 columns">
			<div class="row">
				<h5 class="rick-font text-center">Rick Therrio Galleries</h5>
				<div class="small-4  small-offset-1 medium-4 columns">
					<p><a href="worlds.html">Micro Worlds</a><br>
						 <a href="rickpete.html">Rick & Pete</a><br>
						 <a href="self.html">Self-Portraits</a><br></p>
				</div>
				<div class="small-3 medium-3 columns">
					<p><a href="dogs.html">Dogs</a><br>
						 <a href="lamps.html">Lamps</a><br></p>
				</div>
				<div class="small-4 medium-4 columns">
					<p><a href="random.html">Random</a><br>
						 <a href="bombs.html">Atom Bombs</a><br></p>
				</div>
			</div>
		
		</div>
		<div class="small-6 medium-3 medium-pull-6 columns text-center">
			<h5 class="aor-font">Share</h5>
				<a class="fb-icon" href="#"><i class="fa fa-facebook fa-lg h-space"></i></a>
				<a class="twitter-icon" href="#"><i class="fa fa-twitter fa-lg h-space"></i></a>
		</div>
		<div class="small-6 medium-3 columns text-center">
			<a href="../index.html"><img src="../img/aor_logo_brown_sm.png" class="logo-footer"></a><br>
			<a href="../index.html">Art-O-Rama Home</a>
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
	
	
	 </div>
</div>
</div>
		<script src="js/rick.js"></script>
    <script src="../js/vendor/jquery.min.js"></script>
    <script src="../js/vendor/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
		<script src="../js/vendor/hammer.min.js"></script>
		<script src="js/shopify-buy.polyfilled.globals.js"></script>
		<script src="js/joecart.js"></script>
		
		<!-- uncomment this later
		<script async defer src="//assets.pinterest.com/js/pinit.js"></script>-->
		

</body>
</html>
