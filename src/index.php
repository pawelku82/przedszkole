<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Projekt TAI">
    <title>Projekt TAI </title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
	<script src="js/indexj.js"></script>
  </head>
  <body>
   <div id="menu1"></div>
  <div class="container">
	<div class="row">
			<div class="col-md-12">
			<div class="alert alert-danger" role="alert" style="text-align: center;  display: none;" id="alertboxc"></div>
			<div class="alert alert-success" role="alert" style="text-align: center;  display: none;" id="alertboxz"></div>
			</div>
	</div>
	</div>
	
		<div id="tresc">
		<?php
			include_once('/wew/indexp.php');
			
		?>
		
		</div> 
	  </body>
</html>