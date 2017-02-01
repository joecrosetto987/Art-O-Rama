<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Art-O-Rama Gallery">
<meta name="keywords" content="Art,Art-O-Rama Gallery,Art-O-Rama,painting,watercolor,oil,chicago">
<meta name="author" content="Art-O-Rama">
<meta property="og:title" content="Art-O-Rama Gallery" />
<meta property="og:description" content="Amazing art that will bend your mind into a pretzel at Art-O-Rama Gallery" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://aor.gallery/subscribe.php" />
<meta property="og:image" content="http://aor.gallery/img/aorhome_rick.jpg" />
<!--<meta property="og:video" content="http://aor.gallery/rick/img/lamps1_lg.mp4" />-->
<meta property="fb:app_id" content="1632020133762008" />
<meta name="viewport" content="width=device-width" />
<title>Art-O-Rama</title>
<link rel="shortcut icon" type="image/ico" href="http://aor.gallery/aor.ico"/>
<link rel="stylesheet" href="css/foundation.min.css" /> 
<link rel="stylesheet" href="css/aor.css" />
<link href="https://fonts.googleapis.com/css?family=Merriweather:bold|Palanquin+Dark:semibold|Palanquin:regular" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="js/vendor/modernizr.js"></script>


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
<?php require_once("subscribe_sql.php"); ?>
<?php $selected_table = array ("table" => ""); ?>
<?php require_once("aor_head.php"); ?>
<?php require_once("subscribe_body.php"); ?>
	<script src="js/aor.js"></script>
		
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/vendor/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
		<script src="js/vendor/hammer.min.js"></script>
<!--		<script src="js/shopify-buy.polyfilled.globals.js"></script>
		<script src="js/joecart.js"></script>-->
		
		<!-- uncomment this later
		<script async defer src="//assets.pinterest.com/js/pinit.js"></script>-->
		
</body>
</html>
