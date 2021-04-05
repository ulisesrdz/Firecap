<?php

require_once "../controladores/precios.controlador.php";
require_once "../modelos/precios.modelo.php";

class TablaPrecioProveedor{

    /*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

    public $idProducto;
	public function mostrarTablaPreciosProveedor(){

		$item = null;
		$valor = $this->idProducto;
    	$orden = "pp.id";

  		$respuesta = ControladorPrecioProveedor::ctrMostrarPreciosProveedores($item, $valor, $orden);	
		
		echo json_decode($respuesta);
	  
	}

	public $idPrecio;

	 public function ajaxEditarPrecio(){

	 	$item = "idPrecio";
	 	$valor = $this->idPrecio;
		
	 	$respuesta = ControladorPrecioProveedor::ctrMostrarPreciosProveedores($item, $valor);

	 	echo json_encode($respuesta);
	 }
    


}
/* =============================
  	Mostrar Precios Productos
  ============================== */
if(isset($_POST["id_producto"])){
	$mostrarPrecioProveedor = new TablaPrecioProveedor();
	$mostrarPrecioProveedor -> idProducto = $_POST["id_producto"];
	$mostrarPrecioProveedor -> mostrarTablaPreciosProveedor();
}

/* =============================
  	Editat Precios Productos
  ============================== */
if(isset($_POST["id_Precio"])){

	$idPrecio = new TablaPrecioProveedor();
	$idPrecio -> idPrecio = $_POST["id_Precio"];
	$idPrecio -> ajaxEditarPrecio();

}
