<!DOCTYPE html>
<html>
<head>
<title> Upload File</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">
	</script>
	<script src="API/dropzone.js">
	</script><!-- Style and Library links  -->
	<meta charset="utf-8">
	<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js">
	</script>
	<link href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css" rel="stylesheet">

	<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

	<link href="Drag_and_Drop.css" rel="stylesheet" type="text/css">
	
  <link href="ie-locator-html5-2-4-3-demo/map.css" rel="stylesheet">
  <script src="ie-locator-html5-2-4-3-demo/raphael.min.js"></script>
  <script src="ie-locator-html5-2-4-3-demo/settings.js"></script>
  <script src="ie-locator-html5-2-4-3-demo/map.js"></script>

			<?php include('Menu-bar.php'); ?>



</head>
<body>

</body>
</html>






<h3>Upload your files to the database here to pepper Database </h3>
	<form action="Pepper-file-upload.php" class="dropzone" id="MyZone" name="MyZone">
		<div class="dz-message" data-dz-message="">
			<span></span>
		</div><img class="my_image">
	</form>
<br>






<div id = "Data_uploaded"></div>	
