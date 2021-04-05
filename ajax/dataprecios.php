<?php

require_once "../controladores/precios.controlador.php";
require_once "../modelos/precios.modelo.php";

class TablaPrecioProveedor{

    /*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

   
	public function mostrarTablaPreciosProveedor(){

		$item = null;
		$valor = null;
    	$orden = "pp.id";

  		$precios = ControladorPrecioProveedor::ctrMostrarPreciosProveedores($item, $valor, $orden);	
		  echo '{"data": []}';
	    
		if(count($precios) == 0){

			echo '{"data": []}';

			return;
		}
	  
		$datosJson = '{
		"data": [';

		for($i = 0; $i < count($precios); $i++){

			

			/*=============================================
			TRAEMOS LAS ACCIONES
			=============================================*/ 

			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$precios[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button></div>"; 

			}else{

				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarProducto' idProducto='".$precios[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>"; 

			}

	   // "'.$precios[$i]["codigo"].'",
			$datosJson .='[
				"'.($i+1).'",				
				
				"'.$precios[$i]["descripcion"].'",
				"'.$precios["nombre"].'",				
				"'.$botones.'"
			  ],';

		}

		$datosJson = substr($datosJson, 0, -1);

	   $datosJson .=   '] 
	   }';
	  
	  echo $datosJson;


       
	}


    


}

$mostrarPrecioProveedor = new TablaPrecioProveedor();
	$mostrarPrecioProveedor -> mostrarTablaPreciosProveedor();
