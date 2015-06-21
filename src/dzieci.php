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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="js/dziecij.js"></script>
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
      
	<div class="row>">
				<div class="modal fade" id="paneldod" tabindex="-1" role="dialog" aria-labelledby="Panel" aria-hidden="true">
				  <div class="modal-dialog static">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Dodawanie Dziecka</h4>
					  </div>
					  <div class="modal-body">
					  <div class="alert alert-danger" role="alert" style="text-align: center;  display: none;" id="alertboxp"></div>
						<form class="form-horizontal" id="formoprac" method="post" action="#" role="form">
						  <div class="form-group">
							<label for="imiep" class="col-sm-4 control-label">Imię:</label>
							<div class="col-sm-6">
							<input type="text" class="form-control" id="imiep" placeholder="Podaj Imię">
						 </div></div>
						 <div class="form-group">
							<label for="nazwiskop" class="col-sm-4 control-label">Nazwisko:</label>
							<div class="col-sm-6">
							<input type="text" class="form-control" id="nazwiskop" placeholder="Podaj Nazwisko">
						 </div></div>
						 <div class="form-group">
							<label for="opiekun1" class="col-sm-4 control-label">Opiekun:</label>
							<div class="col-sm-6">
							<select id="opiekun1" class="form-control">
							<option value="0"></option>
							
							</select>
						 </div></div>
						 
						  <div class="form-group">
							<label for="opiekun2" class="col-sm-4 control-label">Opiekun:</label>
							<div class="col-sm-6">
							<select id="opiekun2" class="form-control">
							<option value="0"></option>
							
							</select>
						 </div></div>
						
						 <div class="form-group">
							<label for="grupa1" class="col-sm-4 control-label">Grupa:</label>
							<div class="col-sm-6">
							<select id="grupa1" class="form-control">
							<option value="0"></option>
							
							</select>
						 </div></div>
						 
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" id="cancel1"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;&nbsp;Zamknij</button>
						<button type="button" class="btn btn-primary" id="zapiszp">&nbsp;<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp;&nbsp;Dodaj&nbsp;</button>
					  </div>
					  </form>
					</div>
				  </div>
				</div>
	</div>
	<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6" id="knefeldod"></div>
	<div class="col-md-3"></div>
	</div>
	<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6" id="tabelaprac"></div>
	<div class="col-md-3"></div>
	</div>
	</div>
	
  </body>
</html>