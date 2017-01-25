
 <div class="off-canvas-content" data-off-canvas-content>

	
	<div class="row" data-equalizer data-equalize-on="medium" id="test-eq">
	
		<div  class="aorhome_left_panel medium-8  small-12 columns" data-equalizer-watch>
		
			<div class="row margin-zero">
			
			
			<div class="row margin-zero main-image-more contact-main">
				<div class="contact small-offset-1 small-10 end column">
<h3 class="aor-font">Subscribe</h3>
<p>Let's keep in touch. We'll send you an email when we add new content to Art-O-Rama, once or twice a month. <br />&nbsp;<br />
You can unsuscribe anytime you want. Your information won't be shared or sold.
</p>
<!--<p><a href="mailto:info@aor.gallery?Subject=Message%20from%20AOR%20visitor" target="_top"><i class="fa fa-envelope fa-lg"></i></a>&nbsp;&nbsp;info@aor.gallery</p>-->
<?php

// THE BELOW LINE STATES THAT IF THE SUBMIT BUTTON
// WAS PUSHED, EXECUTE THE PHP CODE BELOW TO SEND THE 
// MAIL. IF THE BUTTON WAS NOT PRESSED, SKIP TO THE CODE
// BELOW THE "else" STATEMENT (WHICH SHOWS THE FORM INSTEAD).
if (isset($_POST['submit'])) {
	// Validation
$required_fields = array("Name", "Email");
validate_presences($required_fields);

if (empty($errors)) {
	// REPLACE THE LINE BELOW WITH YOUR E-MAIL ADDRESS.
	$to = 'joecrosetto987@gmail.com' ;
	$subject = 'From AOR contact page' ;
	
	// NOT SUGGESTED TO CHANGE THESE VALUES
	$message = 'Name: ' . $_POST ["Name"] . "\n";
	$message .= 'Email: ' . $_POST ["Email"] . "\n";
	$message .= 'Phone: ' . $_POST ["Phone"] . "\n";
	$message .= 'Message: ' . $_POST ["form-message"] . "\n";
	$headers = 'From: ' . $_POST["Email"] . PHP_EOL ;
	mail ( $to, $subject, $message, $headers ) ;
	
	// THE TEXT IN QUOTES BELOW IS WHAT WILL BE 
	// DISPLAYED TO USERS AFTER SUBMITTING THE FORM.
	$success = "Your message has been sent! You should receive a reply within 24 hours!" ;
	// set form fields to blank
	$_POST["Name"] = "";
	$_POST["Email"] = "";
	$_POST["Phone"] = "";
	$_POST["form-message"];
	
		} // end of if empty errors
 } // end of if submit
?>
	<div class="select-box text-left">
	<?php	if (!empty($success)) {
			echo "<div class=\"message\">" . htmlentities($success) . "</div>";
		};
		?>
		<?php echo  form_errors($errors) ; ?>

				
		<form action="<?php echo $_SERVER [ 'PHP_SELF' ] ; ?>" method="post"> 
			<p>* Name:<br>
				<input type="text" name="Name"  value="<?php if (isset($_POST["Name"])) {echo htmlentities($_POST["Name"]); };?>" />
				</label></p>
			<p>* Email:<br>
				<input type="text" name="Email"  value="<?php if (isset($_POST["Email"])) {echo htmlentities($_POST["Email"]); };?>" />
				</label></p>
			<p>Phone:<br>
				<input type="text" name="Phone"  value="<?php if (isset($_POST["Phone"])) {echo htmlentities($_POST["Phone"]); };?>" />
				</label></p>
			
			<p>Message:
			<textarea name="form-message" class="textbox"><?php if (isset($_POST["form-message"])) {echo htmlentities($_POST["form-message"]); };?></textarea></p>
			
			<div class="center_me"><input  name="submit" type="submit" value="Submit" /></div>
		
		</form>
</div>
<br>


<!--<p><a href="https://www.facebook.com/joecrosettoart" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;Post comments and Like me on my Facebook Page</p>
<p><a href="https://twitter.com/intent/follow?screen_name=@JosephCrosetto" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>&nbsp;&nbsp;Follow me on Twitter</p>--><br>
			</div>

</div>

			
			
			
<!--				<div class="small-12 columns padding-zero">
					<a href="rick/index.php"><img src="img/aorhome_rick.jpg"></a>
					<div class="exhibit-name rick-font text-center small-6 small-offset-6 columns">
						<a href="rick/index.php">Rick Therrio</a>
						<a href="rick/index.php"><img src="img/aorhome_existence.png"></a>
					</div>
				</div>-->
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
				<div class="contact-options small-12 columns">
					<p class="show-for-medium"><br>&nbsp;<br>&nbsp;<br></p>
					<h5 class="aor-font">Other Options</h5>
					<p class="v-space-lg"><a href="tel:815-474-0629" target="_top"><i class="fa fa-phone fa-lg"></i><span class="phone">&nbsp;&nbsp; 815-474-0629</span></a></p>
					<p><a href="mailto:info@aor.gallery?Subject=Message%20from%20AOR%20visitor" target="_top"><i class="fa fa-envelope fa-lg"></i><span class="phone">&nbsp;&nbsp;info@aor.gallery</span></a></p>
					<p class="phone"><img src="img/snail.png" width="30" height="21">&nbsp;&nbsp;Art-O-Rama<br>
						126 Francisco Terrace<br>Oak Park, IL 60302</p>
		
		<br>&nbsp;<br>
					
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
					Group exhibit featuring 10 infamous Chicago artists still cranking out fantastic art.<br>&nbsp;<br></p>
					
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
