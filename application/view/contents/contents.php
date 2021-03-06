<!doctype html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
	<head>
		
		<!-- META -->
		<title>正方圆工艺品-<?php echo $this->values["title"]; ?></title>
		<meta charset="utf-8" />	
		<meta name="description" content=" add description  ... " />
		<meta name="keywords"    content=" add keywords     ... " />	
		
		<!-- FAVICON  -->
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />					
			
		<!-- STYLESHEETS -->
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/prettyPhoto.css" />
		<link rel="stylesheet" href="css/jquery.validity.css" />
		
		<!-- SCRIPTS -->
		<script src="js/jquery-1.5.1.min.js" type="text/javascript"></script>
		<script src="js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
		<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
		<script src="js/jquery.validity.js" type="text/javascript"></script>
		<script src="js/cufon-yui.js" type="text/javascript"></script>

		<script src="js/script.js" type="text/javascript"></script>	
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-23137036-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>		
				
	</head>
	<body>
		<!-- HEADER -->
		<div id="header" class="container">
			<div class="fixed">
				<div id="logo">
					<a href="/"><img src="images/logo10-444x100.png"></a>
				</div>
				<ul class="social">
					<li><a href="#"><img src="images/twitterbig2.png"></a></li>
					<li><a href="#"><img src="images/facebookbig2.png"></a></li>
					<li><a href="#"><img src="images/rssbig2.png"></a></li>
				</ul>
			</div>
			<!-- Navigation -->
			<div id="navigation"> 
				<?php echo $this->values["nav"]; ?>
			</div>	<!-- end Navigation --> 			
		</div>	<!-- end HEADER --> 	
		
		<!-- MAIN -->		
		<div id="main" class="container">
			<!-- Content -->				
			<div id="content">
				<h1><?php echo $this->values["title"]; ?> </h1>
				<img src="<?php echo $this->values["img"]; ?>"/>
				<p>
				<?php echo $this->values["content"]; ?>   
				</p>
			</div>	<!-- end Content -->
			
			<!-- Sidebar -->
			<div id="sidebar">
					
			</div>	<!-- end Sidebar -->	
		
		</div>	<!-- end MAIN -->		

		<!-- FOOTER -->
		<div id="footer" class="container">
			<?php echo $this->values["footer"]; ?>
			
		</div>	<!-- end FOOTER -->
		<script type="text/javascript"> Cufon.now(); </script>
	</body>
</html>		
