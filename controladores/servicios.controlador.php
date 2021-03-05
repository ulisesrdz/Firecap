<?php


class ControladorServicios{
/*=============================
Ingreso de Servicio
==============================*/

	static public function ctrCrearServicio()
	{

		if(isset($_POST["nuevaServicio"]))
		{
			if(preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevaServicio"])){

				$tabla = "servicios";

				$datos= $_POST["nuevaCategoria"];

				$respuesta = ModeloCategorias::mdlCrearCategoria($tabla, $datos);

				if($respuesta == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "El servicio se guardo correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "servicios";

								}

							});
				

					</script>';
					}

			}
			else{

						echo '<script>

							swal({

								type: "error",
								title: "El campo no puede ir Vacio o llevar caracteres especiales!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false

							}).then((result)=>{

								if(result.value){
								
									window.location = "servicios";

								}

							});
				

					</script>';
				

				}

		}
	}

	/*=============================
		Mostrar Servicio
	==============================*/
	static public function ctrMostrarServicios($item,$valor){

		$tabla = "servicios";

		$respuesta = ModeloServicios::mdlMostrarServicios($tabla,$item,$valor);

		return $respuesta;

	}

	/*=============================
		Editar Servicio
	==============================*/

	static public function ctrEditarServicio()
	{

		if(isset($_POST["editarServicio"]))
		{
			if(preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarServicio"])){

				$tabla = "servicios";

				$datos= array(
                    "categoria"=>$_POST["editarServicio"],
                    "id"=>$_POST["idServicio"]
                );

				$respuesta = ModeloServicios::mdlEditarServicios($tabla, $datos);

				if($respuesta == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "El servicio se gardo correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "servicios";

								}

							});
				

					</script>';
					}

			}
			else{

						echo '<script>

							swal({

								type: "error",
								title: "El campo no puede ir Vacio o llevar caracteres especiales!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false

							}).then((result)=>{

								if(result.value){
								
									window.location = "servicios";

								}

							});
				

					</script>';
				

				}

		}
	}

	/*=============================
		Editar Servicios
	==============================*/

	static public function ctrBorrarServicio(){
		if(isset($_GET["idServicio"])){

			$tabla = "servicios";
			$datos = $_GET["idServicio"];

			$respuesta = ModeloServicios::mdlBorrarServicio($tabla, $datos);

			if($respuesta == "ok"){

						echo '<script>

							swal({

								type: "success",
								title: "El Servicio se borro correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
								

							}).then((result)=>{

								if(result.value){
								
									window.location = "servicios";

								}

							});
				

					</script>';
					}
		}
	}

}