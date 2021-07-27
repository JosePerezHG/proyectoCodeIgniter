<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../../../favicon.ico">

		<title>Control de Familias Afectadas por Covit-19</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
		<link rel="stylesheet" href="<?php echo base_url();?>/resources/css/estilo.css">

		<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.css">

		
		<!-- Custom styles for this template -->
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    	<script src="../../assets/js/vendor/holder.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
		<script src="https://unpkg.com/bootstrap-table@1.18.0/dist/bootstrap-table.min.js"></script>

		
	</head>

	<body>
		    <header>
		<nav class="navbar navbar-expand-md navbar-dark  bg-dark">
			<a class="navbar-brand" href="#">SOS Peru</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url();?>/">Inicio <span class="sr-only">(current)</span></a>
					</li>
					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Corporativo</a>
						<div class="dropdown-menu" aria-labelledby="dropdown01">
							<a class="dropdown-item" href="#">Quienes Somos</a>
							<a class="dropdown-item" href="#">Trayectoria</a>
							
						</div>
					</li>
						<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>
						<div class="dropdown-menu" aria-labelledby="dropdown01">
							<a class="dropdown-item" href="#">Reportes</a>
							<a class="dropdown-item" href="#">Estadisticos</a>
							<a class="dropdown-item" href="#">Busquedas</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url();?>/Blog/index">Blog</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contactenos</a>
					</li>
						  <?php
						  $session = \Config\Services::session(); 
						   if($session->has('usuario')){
							 	echo $session->get('desuser');
							 	?>
							 <a href="<?php echo base_url();?>/login/cerrarsesion" class="btn btn-outline-success my-2 my-sm-0">Cerrar</a>	 		
						 <?php
						  }	else{
						  	?>
						  	<a href="<?php echo base_url();?>/login/index" class="btn btn-outline-success my-2 my-sm-0">Acceso</a>	
						  <?php
						  } 	
						  ?>
						 	
					
				
			
			</div>
		</nav>
	</header>
