function doaction(){ 

	$("#error").hide();
  $("#succ").hide();
  	$("#paneltabla2").hide();

  $('#frmreg').submit(function() {
  	$("#error").hide();
	  $("#succ").hide();
 var formData= new FormData($('#frmreg')[0]);
  	$.ajax({
  		url:  ruta+"/Vivienda/doSave",
  		type: 'post',
  		dataType: 'json',
  		data: formData,
  		cache: false,
        contentType: false,
        processData: false,      
  		success: function(e){  			
  			if(e.error==""){
  				$("#succ").show();
				$("#mensaje_ok").html(e.ok);   
				 $('#frmreg')[0].reset();
				 $("#succ").hide(6000);
				$("#reporte").html("");  

  			}else{
  				$("#error").show();
  				$("#mensaje_error").html(e.error);
  			}
  		}
  	})
  	.done(function() {
  		console.log("success");
  	})
  	.fail(function() {
  		console.log("error");
  	})
  	.always(function() {
  		console.log("complete");
  	});
  	  return false;
  	/* Act on the event */
  });

$("#btn_mostrar").click(function() {
	 $("#reporte").html("");
	$.ajax({
		url: ruta+"/Vivienda/doList",
		type: 'post',
		dataType: 'json',
		data: {},
		success: function(e){  
			$("#paneltabla2").show();
			$("#reporte").html(e.data);
		}
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
});


}