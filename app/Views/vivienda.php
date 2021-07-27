  <script src="<?= base_url()?>/resources/js/jsVivienda.js"></script>
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
                    <h3 class="card-title">REGISTRO DE VIVIENDAS</h3>
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
                        <input type="text" class="form-control" id="direccion" name="direccion" required title="Solo digitos numericos" placeholder="Ingresar direccion">
                          <!-- Error -->
                            <?php if($validation->getError('direccion')) {?>
                                <div class='alert alert-danger mt-2'>
                                  <?= $error = $validation->getError('direccion'); ?>
                                </div>
                            <?php }?>
                        
                      </div>              
                      <div class="form-group">
                        <label for="referencia">* Referencia:</label>
                        <textarea name="referencia" id="referencia" class="form-control" 
                  placeholder="Ingresar referencia" required
                  rows="3"
                        ></textarea>                      
                      </div>
                         <div class="form-group">
                        <label for="zona">* Zona:</label>
                        <textarea name="zona" id="zona" class="form-control" 
                  placeholder="Ingresar zona" required
                  rows="3"
                        ></textarea>                      
                      </div>
                      <div class="form-group">
                        <label for="coorx">* CoordenadaUTM X:</label>
                        <input type="number" class="form-control" id="coorx"
                     name="coorx" title="Solo alfanumericos" placeholder="Ingresar CoordenadaUTM X" required step="0.0001" 
                        >
                      </div>
                      <div class="form-group">
                        <label for="coory">* CoordenadaUTM Y:</label>
                        <input type="number" class="form-control" id="coory"
                     name="coory" title="Solo alfanumericos" placeholder="Ingresar CoordenadaUTM Y" required step="0.5" 
                        >
                      </div>
                       <div class="form-group">
                        <label for="foto">* Foto:</label>
                        <div class="custom-file">
                       <input type="file" class="custom-file-input" id="foto" lang="es" name="foto" required>
                        <label class="custom-file-label" for="foto">Seleccionar Archivo</label>
                        </div>
                      </div>  
                    <div class="form-group">
                        <label for="estadov">* Estado Vivienda:</label>
                          <?php 
    echo form_dropdown('estadov', $comboestado,'#', 'class=" selectpicker form-control" id="estadov" data-live-search="true" required title="Seleccionar estado"' );                  
                   ?>                      
                   </div>
                    <div>
                     <button type="submit" class="btn btn-primary">Crear</button>                         
                            <button type="button" id="cerrarreg" class="btn btn-default">Cerrar</button>
                        <?= form_close(); ?>       
                                    
                    </div>
                      
                  </div>
            
      </div>
    </div>
      <div class="col-md-8">
          <h3 class="card-title">Listado</h3>
           <button class="btn btn-primary" id="btn_mostrar">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>                 
                Mostrar</button>   
                  <div id="reporte" class="row">   
                 
                  </div>                 
                
          
        
      </div>
    

    </div>


  </div>
  </section>  

		