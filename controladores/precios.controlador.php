<?php


class ControladorPrecioProveedor{

    	/*=============================
		Mostrar de Productos
		==============================*/
	static public function ctrMostrarPreciosProveedores($item, $valor){
		
		$respuesta = ModeloPreciosProveedor::mdlMostrarPreciosProveedor($item, $valor);

		return $respuesta;
        
	}

	/*=============================
	Asignar Precios de Productos
	==============================*/
	static public function ctrAsignarPrecioProveedor(){
		
		if(isset($_POST["idProducto"])){
			
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProveedor"]) &&
				preg_match('/^[0-9]+$/', $_POST["nuevoPrecio"])){
				
					$tabla = "preciosProductos"; 

					$datos = array("id_proveedor" => $_POST["nuevoProveedor"],
					           	  "precio" => $_POST["nuevoPrecio"],
					           	  "id_usuario" => $_SESSION["id"],
									 "id_producto" => $_POST["idProducto"]			              
					           );
					
							  
					$respuesta = ModeloPreciosProveedor::MdlAsignarPrecioProveedor($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "El precio-producto se guardo correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "index.php?ruta=precios-productos&id_producto='.$_POST["idProducto"].'";

								}

							});
				

							</script>';
					}
				}
				else{
					echo '<script>

							swal({

								type: "error",
								title: "El producto no puede ir Vacio o llevar caracteres especiales!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "index.php?ruta=precios-productos&id_producto='.$_POST["idProducto"].'";

								}

							});
				

					</script>';
			}

		}

		
	}

	/*=============================
		Editar Precio
	==============================*/

		static public function ctrEditarPrecioProveedor(){

			if(isset($_POST["editarIdPrecio"])){
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarProveedor"]) && 
					preg_match('/^[0-9]+$/', $_POST["editarPrecio"])) {

						$tabla = "preciosProductos";
						
						$datos = array("id_proveedor"=>$_POST["editarProveedor"],
									"precio"=>$_POST["editarPrecio"],
									"id_usuario"=>$_SESSION["id"],
									"id_producto"=>$_POST["editarIdProducto"],
									"id"=>$_POST["editarIdPrecio"]
									);

						$respuesta = ModeloPreciosProveedor::MdlEditarPrecioProveedor($tabla, $datos);
						
						if($respuesta == "ok"){

								echo '<script>

									swal({

										type: "success",
										title: "El precio se modifico correctamente!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar"
										

									}).then((result)=>{

										if(result.value){
										
											window.location = "index.php?ruta=precios-productos&id_producto='.$_POST["editarIdProducto"].'";

										}

									});
						

									</script>';
							}

					}
					else{

								echo '<script>

									swal({

										type: "error",
										title: "La precio no puede ir Vacio o llevar caracteres especiales!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false

									}).then((result)=>{

										if(result.value){
										
											window.location = "index.php?ruta=precios-productos&id_producto='.$_POST["editarIdProducto"].'";

										}

									});
						

							</script>';
						

						
						}

				
			}
		}

		static public function mdlBorrarPrecioProveedor(){
		
			if(isset($_GET["idPrecio"])){

				$tabla = "preciosProductos";
				$datos = $_GET["idPrecio"];
				
				$respuesta = ModeloPreciosProveedor::mdlBorrarPrecioProveedor($tabla, $datos);

				if($respuesta == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "El precio se borro correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "index.php?ruta=precios-productos&id_producto='.$_GET["id_producto"].'";

								}

							});
				

					</script>';
				}
			}
	}
}