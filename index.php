<!doctype html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Share+Tech' rel='stylesheet' type='text/css'>
		
</head>

<body>

	<!-- 1. header -->
	<?php require '/model/common/header.php';?>
	<?php getTopMenu(); ?>

	<!-- 2. caroussel -->
	<?php require '/model/common/carousel.php';?>

	<!-- 3. content -->
	<div class="col-md-7 col--centered" name="content">
		<!-- A. secondary-menu -->
		<?php getSideMenu(); ?>

		<!-- B. bloc-article -->
		<div class="col-md-9 row--content--articles">

			<!-- text area -->
			<div id="textArea"></div>

			<!-- icon area -->
			<?php require '/model/common/iconarea.php';?>			

			<!-- footer -->
			<?php require '/model/common/footer.php';?>					

		</div>
	</div>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <script>
		// Clic sur les lignes
		$(document).ready(function($) {
			$("#textArea").load("/quoala/model/presentation/presentation.php"); 
		});

		$("#goAcceuilFromTopMenu").on( "click", function (e){
			e.preventDefault();
			$("#textArea").load("/quoala/model/presentation/presentation.php"); 
		});

		$("#goPresentationFromTopMenu").on( "click", function (e){
			e.preventDefault();
		$("#textArea").load("/quoala/model/presentation/presentation.php"); 
		});

		$("#goDonneesFromTopMenu").on( "click", function (e){
			e.preventDefault();
			$("#textArea").load("/quoala/model/donnees/donnees.php"); 
		});

		$("#goContactFromTopMenu").on( "click", function (e){
			e.preventDefault();
			$("#textArea").load("/quoala/model/contact/contact.php"); 
		});		    			

		// Clic event sur le side menu
		$("#goAcceuilFromSideMenu").on( "click", function (e){
			e.preventDefault();
			$("#textArea").load("/quoala/model/presentation/presentation.php"); 
		});

		$("#goPresentationFromSideMenu").on( "click", function (e){
			e.preventDefault();
			$("#textArea").load("/quoala/model/presentation/presentation.php"); 
		});

		$("#goDonneesFromSideMenu").on( "click", function (e){
			e.preventDefault();
			$("#textArea").load("/quoala/model/donnees/donnees.php"); 
		});

		$("#goContactFromSideMenu").on( "click", function (e){
			e.preventDefault();
			$("#textArea").load("/quoala/model/contact/contact.php"); 
		});	
	</script>			

	</body>
</html>
