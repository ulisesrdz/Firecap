<?php


class ControladorBitacoraVentas{

    	/*=============================
		Mostrar de Productos
		==============================*/
	static public function ctrMostrarBitacora($item, $valor){
		
		$respuesta = ModeloBitacoraVenta::mdlMostrarBitacora($item, $valor);

		return $respuesta;
        
	}

	static public function ctrMostrarUltimoFolio(){
		
		$respuesta = ModeloBitacoraVenta::mdlMostrarUltimoFolio();

		return $respuesta;
        
	}

	/*=============================
	    Asignar Bitacora
	==============================*/
	static public function ctrInsertarBitacora(){
		
		if(isset($_POST["seleccionarCliente"])){
			
			if(preg_match('/^[0-9]+$/', $_POST["idVendedor"])){
				
					$tabla = "bitacora"; 
					
					/*=============================
						Obtener Ultimo Folio
					==============================*/
					$folio = null;
					
					$objBit = ModeloBitacoraVenta::mdlMostrarUltimoFolio();
					if($objBit){
						$codigo = str_replace ( 'FIRE-', '', $objBit["folio"]);
                   
						$resultado = intval($codigo) + 1;
						$folio = "FIRE-".$resultado; 
					}
					else{

						$folio = $_POST["nuevaFolio"];

					}

					$datos = array("id_cliente" => $_POST["seleccionarCliente"],
									"contacto" => $_POST["nuevoContacto"],
									"id_usuario" => $_SESSION["id"],
									"telefono_contacto" => $_POST["nuevoContactoTel"],
									"observaciones" => $_POST["nuevaObservacion"],
									"status" => "1",
									"folio" => $folio											              
					           );
							   
					$respuesta = ModeloBitacoraVenta::MdlInsertarBitacora($tabla, $datos);

					if($respuesta == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "La bitacora se guardo correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "bitacora";

								}

							});
				

							</script>';
					}
				}
				else{
					echo '<script>

							swal({

								type: "error",
								title: "La bitacora no puede ir Vacio o llevar caracteres especiales!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "bitacora";

								}

							});
				

					</script>';
			}

		}

		
	}

	/*=============================
		Editar Bitacora
	==============================*/

		static public function ctrEditarEstadoBitacora(){

			if(isset($_POST["editarIdBitacora"])){
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarStatus"]) && 
					preg_match('/^[0-9]+$/', $_POST["editarIdBitacora"])) {

						$tabla = "bitacora"; 
					
						$datos = array("status" => $_POST["editarStatus"],										
										"id" => $_POST["editarIdBitacora"]			              
								);
						
								
						$respuesta = ModeloBitacoraVenta::MdlEditarStatusBitacora($tabla, $datos);

						
						if($respuesta == "ok"){

								echo '<script>

									swal({

										type: "success",
										title: "La Bitacora se modifico correctamente!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar"
										

									}).then((result)=>{

										if(result.value){
										
											window.location = "ListaBitacora";

										}

									});
						

									</script>';
							}

					}
					else{

								echo '<script>

									swal({

										type: "error",
										title: "La bitacora no puede ir Vacio o llevar caracteres especiales!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false

									}).then((result)=>{

										if(result.value){
										
											window.location = "ListaBitacora";

										}

									});
						

							</script>';
						

						
						}

				
			}
		}

		static public function ctrEditarPrecioProveedor(){

			if(isset($_POST["id_cliente"])){
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["observaciones"]) && 
					preg_match('/^[0-9]+$/', $_POST["id_usuario"])) {

						$tabla = "bitacora"; 
					
						$datos = array("id_cliente" => $_POST["id_cliente"],
										"contacto" => $_POST["contacto"],
										"id_usuario" => $_SESSION["id"],
										"telefono_contacto" => $_POST["telefono_contacto"],
										"observaciones" => $_POST["observaciones"],
										"status" => $_POST["status"],
										"folio" => $_POST["folio"],
										"id" => $_POST["id"]			              
								);
						
								
						$respuesta = ModeloBitacoraVenta::MdlEditarBitacora($tabla, $datos);

						
						if($respuesta == "ok"){

								echo '<script>

									swal({

										type: "success",
										title: "La Bitacora se modifico correctamente!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar"
										

									}).then((result)=>{

										if(result.value){
										
											window.location = "mail";

										}

									});
						

									</script>';
							}

					}
					else{

								echo '<script>

									swal({

										type: "error",
										title: "La bitacora no puede ir Vacio o llevar caracteres especiales!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false

									}).then((result)=>{

										if(result.value){
										
											window.location = "mail";

										}

									});
						

							</script>';
						

						
						}

				
			}
		}


		static public function ctrEditarObservacionesBitacora(){

		
			if(isset($_POST["editarBitacora"])){
				if(preg_match('/^[0-9]+$/', $_POST["editarBitacora"])) {

						$tabla = "bitacora"; 
						
				
						$datos = array("observaciones" => $_POST["editarObservacion"],										
										"id" => $_POST["editarBitacora"]			              
								);
						
								
						$respuesta = ModeloBitacoraVenta::MdlEditarObservacionBitacora($tabla, $datos);

						
						if($respuesta == "ok"){

								echo '<script>

									swal({

										type: "success",
										title: "La Bitacora se modifico correctamente!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar"
										

									}).then((result)=>{

										if(result.value){
										
											window.location = "ListaBitacora";

										}

									});
						

									</script>';
							}

					}
					else{

								echo '<script>

									swal({

										type: "error",
										title: "La bitacora no puede ir Vacio o llevar caracteres especiales!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false

									}).then((result)=>{

										if(result.value){
										
											window.location = "ListaBitacora";

										}

									});
						

							</script>';
						

						
						}

				
			}
		}

    /*=============================
		Borrar Bitacora
	==============================*/
		static public function ctrBorrarBitacora(){
		
			if(isset($_GET["idBitacora"])){

				$tabla = "bitacora";
				$datos = $_GET["idBitacora"];
				
				$respuesta = ModeloBitacoraVenta::mdlBorrarBitacora($tabla, $datos);

				if($respuesta == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "La bitacora se borro correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "mail";

								}

							});
				

					</script>';
				}
			}
	}
}