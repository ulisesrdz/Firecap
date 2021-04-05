<?php


class ControladorServicios{


	/*=============================
		Crear Servicio
	==============================*/

	static public function ctrCrearServiciox(){

		if(isset($_POST["nuevoServicio"])){

				/*=============================
					Actializar las compras del cliente y reducir el STOCK, aumenta Ventas
				  ==============================*/

				  $listaProductos = json_decode($_POST["listaProductos"], true);


				  $totalProductosComprados = array();

				  //var_dump($listaProductos);
				  foreach ($listaProductos as $key => $value) {

				  	array_push($totalProductosComprados, $value["cantidad"]);
				  	
				  	$tablaProductos = "productos";

				  	$item = "id";
				  	$valor = $value["id"];
				  	$orden = "id";

				  	$traerProductos = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor,$orden);

				  	//var_dump($traerProductos);

				  	$item1a = "ventas";
				  	$valor1a = $value["cantidad"] +  $traerProductos["ventas"];

				  	$nuevasVentas = ModeloProductos::mdlActualizarProductos($tablaProductos, $item1a, $valor1a, $valor);

				  	$item1b = "stock";
				  	$valor1b = $value["stock"];

				  	$nuevoStock = ModeloProductos::mdlActualizarProductos($tablaProductos, $item1b, $valor1b, $valor);
				  }


				  $tablaClientes = "clientes";

				  $item = "id";
				  $valor = $_POST["seleccionarCliente"];

				  $traerCliente = ModeloClientes::mdlMostrarClientes($tablaClientes, $item , $valor);

				  $item1 = "compras";
				  $valor1 = array_sum($totalProductosComprados) + $traerCliente["compras"];

				  $comprasCliente = ModeloClientes::mdlActualizarClientes($tablaClientes, $item1, $valor1, $valor);

				  $item1b = "ultima_compra";

				  $fecha = date('Y-m-d');
				  $hora = date('H:i:s');

				  $valor1b = $fecha.' '.$hora;

				    $comprasCliente = ModeloClientes::mdlActualizarClientes($tablaClientes, $item1b, $valor1b, $valor);

				  	/*=============================
							Guardar la Compra
					==============================*/

					$tabla = "ventas";

					$datos = array("id_cliente" => $_POST["seleccionarCliente"],
									"id_vendedor" => $_POST["idVendedor"],
									"codigo" => $_POST["nuevoServicio"],
									"productos" => $_POST["listaProductos"],
									"impuesto" => $_POST["nuevoPrecioImpuesto"],
									"neto" => $_POST["nuevoPrecioNeto"],
									"total" => $_POST["totalVenta"],
									"observaciones" => $_POST["nuevaObservacion"],
									"metodo_pago" => $_POST["listaMetodoPago"]);

								

					$respuesta = ModeloServicios::mdlIngresarServicio($tabla, $datos);

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

	}


	/*=============================
		Mostrar Servicio
	==============================*/
	static public function ctrMostrarServicios($item,$valor){

		$tabla = "ventas";

		$respuesta = ModeloServicios::mdlMostrarServicios($tabla,$item,$valor);

		return $respuesta;

	}

	static public function ctrMostrarUltimoFolio(){
		
		$respuesta = ModeloServicios::mdlMostrarUltimoFolio();

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
		Borrar Servicios
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