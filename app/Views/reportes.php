<script src="<?= base_url('/resources/js/jquery.canvasjs.min.js') ?>"></script>
<script src="<?= base_url('/resources/js/jsReportes.js') ?>"></script>

<section class="main container">		
		<script>
			 	ruta='<?= base_url()?>';
			$(document).ready(function(){       
     		inicio();
      		ejecutar();
    	});
</script>
<div class="container"> 
			<div class="row">					
					<ol class="breadcrumb">
			  <li><a href="#">Inicio</a></li>
			  <li><a href="#">Perfil</a></li>
			  <li class="active">Cliente</li>
			</ol>
			</div>
			<div class="row">					
	   			<div class="col-md-3 ">
					
					<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">Descripcion</h3>
						  </div>
						  <div class="panel-body">
						   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						  </div>
					</div>
	   			</div>
	   			<div class="col-md-9">	
	   				<div class="row">	
	   						<div class="form-group">
	   							<input  type="button" value="Regresar" class="btn btn-primary" id="btn_regresar" /> 
	   						</div>
	   				</div>
	   				<div class="row">
	   				<div class="form-group">
	   					<legend class="fieldcont">Reportes</legend>
				   			<div  id="_menu">
				   			 Listado de Personas por Foto<img src="<?= base_url('resources/img/icono_buscar.png') ?>" class='imagenes' id="reporte1"/><br />	
				   			 Reporte Total Terrenos Asignados<img src="<?= base_url('resources/img/icono_buscar.png') ?>" class='imagenes' id="reporte2"/><br />				   			
				   			 
				   		   </div>	
				   		   
				   		</div>
				   	</div>	
	   				<div class="row">					
	   					<div class="form-group">
	   							<div  id="_datos">
	   								<p  class="lead" id="t_mensaje2"></p>
	   								<p  class="lead" id="t_titulo"></p>
	   								<table id="table"  class="table table-striped"
								                               
								                                >
								        <thead>
								            <tr>                
								                <th data-field="v1">Tipo</th>
								                <th data-field="v2">Valores</th>
								                
								            </tr>
								        </thead>
								    </table>

	   							</div>	
	   					</div>
	   				</div>
	   				<div class="row">	

	   					<div id="repchar1" style="height: 300px; width: 100%;"></div>
					       </div>
	   				</div>



	   					
				</div>			
			
				</div>
</div>	
	</section>
	