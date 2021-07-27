<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="description" content="Control de Familias Afectadas y Damnificadas">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="author" content="UCV">
        <title>Control de Familias Afectadas por Covit-19</title>
        <link rel="stylesheet" href="<?php echo base_url();?>resources/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>resources/css/estilo.css">
         <script src="<?php echo base_url();?>resources/js/jquery-3.1.0.js"></script>
        <script src="<?php echo base_url();?>resources/js/bootstrap.min.js" crossorigin="anonymous"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> 

</head>
<body>
<div class="container">
<header>


	<nav class="navbar navbar-inverse navbar-static-top navbarcab" role="navigaton">
			<div class="container">
				<div class="navbar-header">					
					<button type="button" class="navbar-toggle collapsed" 
					data-toggle="collapse" data-target="#frm_navegacion">
						<span class="sr-only">Desplegar / Ocultar Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">SOS PIURA</a>
				</div>
				<div class="collapse navbar-collapse" id="frm_navegacion">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Inicio</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
							Corporativo <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Quienes Somos</a></li>
								<li><a href="#">Trayectoria</a></li>
								
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
							Servicios <span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Reportes</a></li>								
								<li><a href="#">Estadisticos</a></li>
								<li><a href="#">Busquedas</a></li>
							</ul>
						</li>
						
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contacto</a></li>	
						<li><a href="<?= base_url() ?>/Login">Acceso</a></li>
											
					</ul>
					 
        
				</div>

			</div>
		</nav>
</header>
	<section class="jumbotron jumbotron1">
		<div class="container">
		<h3>SISTEMA WEB PARA LA RECOLECCION Y REPORTES DE DAMNIFICADOS Y AFECTADOS PIURA</h3>
		<span class="small">Ayuda a Ayudar</span>

				
		</div>
	</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6"><!--Inzq  -->
					<div class="panel panel-primary">
			  		<div class="panel-heading">
			    	<h3 class="panel-title">LA INFORMACION REAL AYUDA</h3>
			  		</div>
			  		<div class="panel-body">
			    
					<div class="col-xs-12 col-md-12">
					<img height="80" width="80" src="<?=base_url()?>resources/img/Ayudas.gif" class="img-circle img-responsive" style="float:right;">								
			        <h3>Presentacion</h3>
			        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			        </p>
			        <p><a href="#" class="btn btn-primary" role="button">Leer mas...</a></p>
			      
					</div>
					
					
			    
				</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6">
    <div class="thumbnail">
      <img src="<?=base_url()?>resources/img/buscarfam.jpg" alt="...">
      <div class="caption">
        <h3>Buscar Familias</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-md-6">
    <div class="thumbnail">
      <img src="<?=base_url()?>resources/img/organizar.jpg" alt="...">
      <div class="caption">
        <h3>Organizar Ayuda</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a></p>
      </div>
    </div>
  </div>

				</div>



			</div>
			<div class="col-xs-12 col-md-6"><!--Centro  -->
					<div id="portadaCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#portadaCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#portadaCarousel" data-slide-to="1"></li>
    <li data-target="#portadaCarousel" data-slide-to="2"></li>    
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo base_url();?>resources/img/dam1.jpg" alt="Emergencia">
    </div>

    <div class="item">
      <img src="<?php echo base_url();?>resources/img/dam2.jpg" alt="Ayuda">
    </div>

    <div class="item">
      <img src="<?php echo base_url();?>resources/img/dam3.jpg" alt="Peligro">
    </div>

    
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#portadaCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Ant</span>
  </a>
  <a class="right carousel-control" href="#portadaCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
	<div class="row">
					<div class="col-xs-12 col-md-12">
    <div class="thumbnail">
      <img src="<?=base_url()?>resources/img/reportes.jpg" alt="...">
      <div class="caption">
        <h3>Reportes Estadisticos</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor </p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>


				</div>

			</div>
			

		</div>
	</div>
</section>	
 <footer>
       <div class="footer1">
          <p class="monocle-copyright">
           @ 2017 <strong>Derechos reservados</strong>
          </p>          
        </div>      
    </footer>
</div>
</body>
</html>