
function inicio(){ 
$("#_datos").hide();
$("#_menu").show();
$("#btn_regresar").hide();

}
function ejecutar(){ 

 $("#reporte1").click(function() {
	
	$.ajax({
        data: {},
        url: ruta+'/Reportes/rep1',
        type: 'post',
        dataType: 'json',
        success: function(e) {

      if (e.data.length>0){
        $("#_datos").show();   
        $("#_menu").hide();
        $("#t_titulo").html(e.titulorep);
             $("#btn_regresar").show();   	            	
          
          $(function () {
			     $('#table').bootstrapTable({
			        data: e.data
			      });

			});

         
			var chart = new CanvasJS.Chart("repchar1",
	{

		title:{
			text: e.titulorep
		},
                animationEnabled: true,
       axisY: {
        title: "Cantidad"
      },
		legend:{
			verticalAlign: "bottom",
			horizontalAlign: "center"
		},		
		data: [
		{        
			
			// type: "column",
			// showInLegend: true,						
			// legendMarkerColor: "grey",
   			//legendText: "Cantidad",
   			//dataPoints: e.datagrafico
				type: "pie",
				startAngle: 240,
				yValueFormatString: "##0.00\"%\"",
				indexLabel: "{label} {y}",
				dataPoints: e.datagrafico


			
		}
		]
	});
	chart.render();
	}
			else{
			$("#t_mensaje2").html("No hay datos para mostrar");	
				
			}
            }
       
    });	

    });	
     

$("#btn_regresar").click(function() {
	window.location.href = ruta+'/Reportes/index'; 
	} 
 ); 
 
 }   
 
