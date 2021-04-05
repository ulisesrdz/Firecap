/* =============================
       Regresar a productos
  ============================== */
  $(".btnAgregarBitacora").click(function(){
	//$(document).on("click", ".btnRegresar", function(){
		//console.log("respuesta","productos");
		window.location = "bitacora";
	
	});

    $(".btnRegresarLista").click(function(){
        //$(document).on("click", ".btnRegresar", function(){
            //console.log("respuesta","productos");
            window.location = "ListaBitacora";
        
    });
      
        /* =============================
       btnAgregarPrecio
  ============================== */
  $(".btnStatus").click(function(){

	var idBitacora= $(this).attr("idBitacora");
  
  	console.log("respuesta",idBitacora);
	
	$("#editarIdBitacora").val(idBitacora);

});


/* =============================
         Editar Observacion
============================== */

  $(".btnEditarObservacion").click(function(){

  	var idBitacora= $(this).attr("id_Bitacora");
    //console.log("respuesta",idBitacora);
  	var datos = new FormData();
  	datos.append("idBitacora",idBitacora);

  	$.ajax({
  		url:"ajax/bitacora.ajax.php",
		method: "POST", 
		data: 	datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log("respuesta",respuesta);

			$("#editarObservacion").val(respuesta["observaciones"]);
      $("#editarNombreContacto").val(respuesta["contacto"]);
      $("#editarTelefonoContacto").val(respuesta["numero_contacto"]);
			$("#editarBitacora").val(respuesta["id"]);
		}
  	})

  });

  /* =============================
         Eliminar Categoria
  ============================== */

 $(".btnEliminarObservacion").click(function(){

  var idBitacora = $(this).attr("id_bitacora");

  swal({
    title: '¿Esta seguro de eliminar la bitacora?',
    text:  "¡Si no lo está, puede cancelar la accion", 
    type: 'warning',
    showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   cancelButtonText: 'Cancelar',
   confirmButtonText: 'Si, borrar bitacora!'
  }).then((result)=>{

    if(result.value){
      window.location = "index.php?ruta=ListaBitacora&idBitacora="+idBitacora;
    }
  })
});