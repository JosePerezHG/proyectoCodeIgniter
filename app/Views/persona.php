  <script src="<?= base_url()?>/resources/js/jsPersona.js"></script>
<script>
  ruta='<?= base_url()?>';  
  $(document).ready(function() {
    doaction();
  });
</script>

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
                    <h3 class="card-title">REGISTRO DE VOLUNTARIOS</h3>
                </div>
                <img class="card-img-top" src="<?php echo base_url();?>/resources/img/vacuna.jpg" width="20" height="30" alt="Card image cap">
                <div class="card-body">

                  <div class="alert alert-danger"  id="error" >
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
              <p id="mensaje_error"></p>
            </div>        
            <div class="alert alert-success"  id="succ" >
                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                    <span class="sr-only">Correcto:</span>
              <p id="mensaje_ok"></p>
            </div>        
                   <?php $validation = \Config\Services::validation(); ?>

                  <?= form_open_multipart('#', array('id' => 'frmreg','name' => 'frmreg')) ?>
                               

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
                        <input type="number" class="form-control" id="tel"
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
                           <div class="form-group">
                        <label for="foto">* Foto:</label>
                        <div class="custom-file">
                       <input type="file" class="custom-file-input" id="foto" lang="es" name="foto" required>
                        <label class="custom-file-label" for="foto">Seleccionar Archivo</label>
                        </div>
                      </div> 



                     <button type="submit" class="btn btn-primary">Crear</button>
                          
                            <button type="button" id="cerrarreg" class="btn btn-default">Cerrar</button>


                        <?= form_close(); ?>       
                                    
                        </div>
                      
                  </div>
            
      </div>
    
      <div class="col-md-8"><!--Inzq  -->

        <div class="card">
           <div class="card-header">
                <h3 class="card-title">Listado</h3>
            </div>
        
            <div class="card-body">
                    <button class="btn btn-primary" id="btn_mostrar">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                Mostrar</button>   
                  <div class="table-responsive" id="paneltabla2">   
                    <table id="table"  class="table table-striped"   
                    data-sort-name="v4"
                    data-sort-order="desc"
                     data-show-toggle="true" 
                       data-show-columns="true" 
                         data-click-to-select="true"
                   
                    >
                        <thead>
            <tr>
                <th data-field="state" data-radio="true"></th>
                <th data-field="v1"></th>
                <th data-field="v2">DNI</th>
                <th data-field="v3" data-sortable="true">Nombres</th>
                <th data-field="v4" data-sortable="true">Apellidos</th>
                <th data-field="v5">Telefono</th>
                <th data-field="v6" data-sortable="true">Correo</th>
                <th data-field="v7">Direccion</th>
                <th data-field="v8">Fecha</th>
                <th data-field="v10">Estado</th>
            </tr>
        </thead>

                    </table>
                  </div>
                   
                
            </div>
        </div>
        
      </div>
    

    </div>


  </div>
  </section>  

		