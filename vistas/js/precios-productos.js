
/* =============================
       Regresar a productos
  ============================== */
  $(".btnRegresarOrden").click(function(){
	//$(document).on("click", ".btnRegresar", function(){
		console.log("respuesta","productos");
		window.location = "productos";
	
	});

/* =============================
  	Mostrar Precios Productos
  ============================== */
$(document).on("click", ".btnPrecios", function(){
	var id_producto = $(this).attr("id_producto");
   //console.log("respuesta",id_producto);
	window.location = "index.php?ruta=precios-productos&id_producto="+id_producto;

	
});


/* =============================
       btnAgregarPrecio
  ============================== */
  $(".btnAgregarPrecio").click(function(){

	var idProducto= $(this).attr("idProducto");
  
  	console.log("respuesta",idProducto);
	
	$("#idProducto").val(idProducto);

});


//$(".btnEditarPrecio").click(function(){
$(document).on("click", ".btnEditarPrecio", function(){	
	  
	var id_Precio = $(this).attr("id_Precio");
	  //console.log("idCliente",id_Precio);
  
	  var datos = new FormData();
	  datos.append("id_Precio", id_Precio);
  
	   $.ajax({
  
		url:"ajax/datatable-precios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){
  
		   //console.log("respuesta",respuesta);
		   $("#editarIdPrecio").val(respuesta["id"]);
		   $("#editarIdProducto").val(respuesta["id_producto"]);
		   $("#editarProveedor").val(respuesta["id_proveedor"]);
		   $("#editarPrecio").val(respuesta["precio"]);
		   
  
		}
	 });
  })

  /* =============================
         Eliminar Cliente
  ============================== */

 //$(".btnEliminarPrecio").click(function(){
$(document).on("click", ".btnEliminarPrecio", function(){	
	var idPrecio = $(this).attr("idPrecio");
	var idProducto = $(this).attr("idProducto");
	//console.log("respuesta",idPrecio);
	
	swal({
	  title: '¿Esta seguro de eliminar al Precio?',
	  text:  "¡Si no lo está, puede cancelar la accion", 
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  cancelButtonText: 'Cancelar',
	  confirmButtonText: 'Si, borrar precio!'
	}).then((result)=>{
		
		//console.log("respuesta",idPrecio);
	  if(result.value){
		window.location = "index.php?ruta=precios-productos&idPrecio="+idPrecio+"&id_producto="+idProducto;;
	  }
	})
   });


