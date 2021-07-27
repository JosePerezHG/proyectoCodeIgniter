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
    <div class="col-md-12">
          <h3 class="card-title">Listado</h3>
                     
           
                  <div id="reporte" class="row">   
                     <?= $lista ?>
                  </div>                 
               
        
      </div>
    

    </div>


  </div>
  </section>  

		