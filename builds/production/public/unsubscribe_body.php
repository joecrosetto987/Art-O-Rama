


 <div class="off-canvas-content" data-off-canvas-content>

	
	<div class="row" data-equalizer data-equalize-on="medium" id="test-eq">
	
		<div  class="aorhome_left_panel medium-8  small-12 columns" data-equalizer-watch>
		
			<div class="row margin-zero">
			
			
			<div class="row margin-zero main-image-more contact-main">
				<div class="contact subscribe small-offset-1 small-10 end column">
<h3 class="aor-font">UnSubscribe</h3>
<p>We're sorry to see you go. </p>
<p>Just enter you your email address and click UnSubscribe.
</p>
<p>If you just want to change your subscription options, you can do this on the <a href="subscribe.php">Subscribe</a> page.
<!--<p><a href="mailto:info@aor.gallery?Subject=Message%20from%20AOR%20visitor" target="_top"><i class="fa fa-envelope fa-lg"></i></a>&nbsp;&nbsp;info@aor.gallery</p>-->

	<div class="select-box text-left">
	<?php	if (!empty($success)) {
			echo "<div class=\"message\">" . htmlentities($success) . "</div>";
		};
		?>
		<?php echo  form_errors($errors) ; ?>

				
		<form action="unsubscribe.php" method="post"> 
			
			<p>* Email:<br>
				<input type="text" name="email"  value="<?php if (isset($_POST["email"])) {echo htmlentities($_POST["email"]); };?>" />
			</p>
			<!--<p>* Password:<br>
				<input type="password" name="contact_password"  value="" />
			</p> -->
			
			
			
			
			<div class="center_me"><input  name="submit" type="submit" value="UnSubscribe" /></div>
		
		</form>
</div>
<br>



			</div>

</div>

			
			
			

			</div>


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
	<?php require("aor_foot.php"); ?>

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
        	<image   clip-path="url(#shape-divide4)" width="1440" height="764" xlink:href="img/texture_grey.png" preserveAspectRatio="xMidYMin slice"></image>
    		</svg>
			</div>
	</div>

			<div class="row">
				<div class="subscribe-options small-12 columns">
					<p class="show-for-medium"><br>&nbsp;<br>&nbsp;<br></p>
					<h5 class="aor-font">Subscribe and join the Art-O-Rama family!</h5>
					<a href="rick/index.php"><img src="img/lynn_portrait1_sm.jpg"></a>
					<p>Portrait of Lynn True by <a href="rick/index.php">Rick Therrio</a>
		
		<br>&nbsp;<br>&nbsp;<br>
					
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
					<?php require("aor_other_shows.php"); ?>
										
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
	<?php require("aor_foot.php"); ?>

</div> 
</div><!-- end of blue footer section -->
			
			
			
		</div> <!-- end of right panel column -->

	</div>

	


	 </div>
</div>
</div>
