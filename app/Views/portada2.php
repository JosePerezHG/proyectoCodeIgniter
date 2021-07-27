  
	 <div id="carousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="d-block w-100" src="<?php echo base_url();?>/resources/img/1.jpg" alt="" width="300" height="200">
               <div class="carousel-caption d-none d-md-block">
			    <h5>Ayuda a Ayudar</h5>
			    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga alias, vel quidem ducimus deleniti beatae accusamus sequi, ratione, atque delectus optio, error saepe dolore a praesentium fugit velit. Nesciunt, sequi!</p>
			  </div>
               
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="<?php echo base_url();?>/resources/img/2.jpg" alt="" width="300" height="200">
            </div>
            <div class="carousel-item">
               <img  class="d-block w-100" src="<?php echo base_url();?>/resources/img/3.jpg" alt="" width="300" height="200">
            </div>
            </div>
            
            <!--Controles NEXT y PREV-->
            <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--Controles de indicadores-->
            <ol class="carousel-indicators">
                <li data-target="#carousel1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel1" data-slide-to="1"></li>
                <li data-target="#carousel1" data-slide-to="2"></li>
            </ol>
            
        </div>
        <br/>
	<section>
	<div class="container">
		<div class="row">
			<div class="col-md-4"><!--Inzq  -->

				<div class="card">
					 <div class="card-header">
    						<h3 class="card-title">LA INFORMACION REAL AYUDA</h3>
  					</div>
					  <img class="card-img-top" src="<?php echo base_url();?>/resources/img/vacuna.jpg" width="20" height="30" alt="Card image cap">
					  <div class="card-body">
    
						     <h3>Presentacion</h3>
									        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									        </p>
									        <p><a href="#" class="btn btn-primary" role="button">Leer mas...</a></p>
						    
									  </div>
				</div>
				
			</div>
		
		
			<div class="col-md-4"><!--Inzq  -->

				<div class="card">
					 <div class="card-header">
    						<h3 class="card-title">LA INFORMACION REAL AYUDA</h3>
  					</div>
					  <img class="card-img-top" src="<?php echo base_url();?>/resources/img/vacuna.jpg" width="20" height="30" alt="Card image cap">
					  <div class="card-body">
    
						     <h3 class="cabecera">Presentacion</h3>
									        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									        </p>
									        <p><a href="#" class="btn btn-primary" role="button">Leer mas...</a></p>
						    
									  </div>
				</div>
				
			</div>
				<div class="col-md-4"><!--Inzq  -->

				<div class="card">
					 <div class="card-header">
    						<h3 class="card-title">REGISTRO DE VOLUNTARIOS</h3>
  					</div>
					  <img class="card-img-top" src="<?php echo base_url();?>/resources/img/vacuna.jpg" width="20" height="30" alt="Card image cap">
					  <div class="card-body">
					  	 <?php $validation = \Config\Services::validation(); ?>

      				<form action="<?php echo base_url();?>/Portada/doSave" id="frmreg" name="frmreg" >
      										               

  <div class="input-group input-group-lg">
   <span class="input-group-addon">
    <span class="glyphicon glyphicon-user"></span>
   
   </span>
    <input type="text" class="form-control" id="dni" name="dni" required title="Solo digitos numericos" placeholder="Ingresar DNI">
      <!-- Error -->
        <?php if($validation->getError('dni')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('dni'); ?>
            </div>
        <?php }?>
    
  </div>              
  <div class="form-group">
    <label for="nombre">* Nombre:</label>
    <input type="text" class="form-control" id="nombre"
     name="nombre" title="Solo alfanumericos" placeholder="Ingresar Nombre" required>
     	<!-- Error -->
        <?php if($validation->getError('nombre')) {?>
            <div class='alert alert-danger mt-2'>
              <?= $error = $validation->getError('nombre'); ?>
            </div>
        <?php }?>

  </div>
  <div class="form-group">
    <label for="apellidos">* Apellidos:</label>
    <input type="text" class="form-control" id="apellidos"
 name="apellidos" title="Solo alfanumericos" placeholder="Ingresar Apellidos" required
    >
  </div>
<div class="form-group">
    <label for="dir">* Direccion:</label>
    <input type="text" class="form-control" id="dir"
 name="dir" title="Solo alfanumericos" placeholder="Ingresar Direccion" required
    >
  </div>
<div class="form-group">
    <label for="tel">Telefono:</label>
    <input type="text" class="form-control" id="tel"
 name="tel" title="Solo digitos" placeholder="Ingresar Telefono" 
    >
  </div>
<div class="form-group">
    <label for="correo">* Correo:</label>
    <input type="email" class="form-control" id="correo"
 name="correo" title="Formato correo" placeholder="Ingresar Correo" required
    >
  </div>
<div class="form-group">
    <label for="fecha">* Fecha Nacimiento:</label>
    <input type="date" class="form-control" id="fecha"
 name="fecha" title="Formato Fecha" placeholder="Ingresar Fecha Nacimiento" required
    >
  </div>  
 <div class="form-group">
    <label for="fecha">* Estado:</label>
    <select class="form-control" id="estado" name="estado">
            <option value="">Selecciona estado..</option>
            <option value="0">Fallecido</option>
            <option value="2">Herido</option>
            <option value="1">Saludable</option>
          </select>
  </div>  

 <button type="submit" class="btn btn-primary">Crear</button>
      
        <button type="button" id="cerrarreg" class="btn btn-default">Cerrar</button>



						    
						</div>
		</form>
				</div>
				
			</div>

		</div>


	</div>
</section>	

		