<?php require_once("../../includes/session.php"); ?>
<?php require_once("../../includes/db_connection.php"); ?>
<?php require_once("../../includes/functions.php"); ?>

<?php
	define("GALLERY_NAME", "Rick & Pete");
	define("ARTIST", "Rick Therrio");
	$gallery = find_gallery_by_name(GALLERY_NAME);
	define("FILENAME_PREFIX", $gallery["gallery_filename_prefix"]);
	$art_gallery_id = $gallery["gallery_id"];
	$video_gallery_id = $gallery["gallery_id"];
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Art-O-Rama Gallery - Rick Therrio">
<meta name="keywords" content="Art,Art-O-Rama Gallery,Art-O-Rama,Rick Therrio,painting,watercolor,oil,chicago">
<meta name="author" content="Art-O-Rama">
<meta property="og:title" content="Art-O-Rama Gallery - Rick Therrio" />
<meta property="og:description" content="Fantastic Art of Rick Therrio at Art-O-Rama Gallery" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://aor.gallery/rick/rp.php" />
<meta property="og:image" content="http://aor.gallery/rick/img/rp2a_lg.jpg" />
<meta property="og:video" content="http://aor.gallery/rick/img/rp1a_lg.mp4" />
<meta property="fb:app_id" content="1632020133762008" />
<meta name="viewport" content="width=device-width" />
<title>Art-O-Rama - Rick Therrio</title>
<link rel="shortcut icon" type="image/ico" href="http://aor.gallery/aor.ico"/>
<link rel="stylesheet" href="../css/foundation.min.css" /> 
<link rel="stylesheet" href="../css/exhibit.css" />
<link href="https://fonts.googleapis.com/css?family=Merriweather:bold|Palanquin+Dark:semibold" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
<?php require_once("body.php"); ?>
		<script src="../js/exhibit.js"></script>
		
		<script>
		 setFilenamePrefix("<?php echo FILENAME_PREFIX; ?>");
		</script>
		
    <script src="../js/vendor/jquery.min.js"></script>
    <script src="../js/vendor/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
		<script src="../js/vendor/hammer.min.js"></script>
<!--		<script src="js/shopify-buy.polyfilled.globals.js"></script>
		<script src="js/joecart.js"></script>-->
		
		<!-- uncomment this later
		<script async defer src="//assets.pinterest.com/js/pinit.js"></script>-->
		
</body>
</html>
<?php include("../../includes/db_close_connection.php"); ?>