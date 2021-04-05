<?php

require_once "../modelos/productos.modelo.php";
require_once "../controladores/productos.controlador.php";

class AjaxProductos{
 /* =============================
  	Genera Codigo Productos
  ============================== */
	public $idCategoria;
	public function ajaxCrearCodigoProducto(){

		$item = "idCategoria";
		$valor = $this->idCategoria;
		$orden = "id";

		$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

		echo json_encode($respuesta);
	}

	public $id_Categoria;
	public function ajaxMostrarProductosPorCategoria(){

		$item = "id_Categoria";
		$valor = $this->id_Categoria;
		
		$orden = "id";

		$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

		echo json_encode($productos);
		
	
	}

	public $idProducto;
	public $traerProductos;
	public $nombreProductos;

	public function ajaxEditarProducto(){

		if($this->traerProductos == "ok"){

			$item = null;
			$valor = null;
			$orden = "id";

			$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

			

			echo json_encode($respuesta);

		}if($this->traerProductos == "false"){

			$item = 'ok';
			$valor = null;
			$orden = "id";

			$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

			

			echo json_encode($respuesta);

		}
		else if($this->nombreProductos != ""){

			$item = "descripcion";
			$valor = $this->nombreProductos;
			$orden = "id";

			$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

			echo json_encode($respueta);

		}else{
			$item = "id";
			$valor = $this->idProducto;
			$orden = "id";

			$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

			echo json_encode($respuesta);
		}

		
	}
}
/* =============================
  	Genera Codigo Productos
  ============================== */
if(isset($_POST["idCategoria"])){
	$codigoProducto = new AjaxProductos();
	$codigoProducto -> idCategoria = $_POST["idCategoria"];
	$codigoProducto -> ajaxCrearCodigoProducto();
}

if(isset($_POST["Categoria"])){
	$cat = new AjaxProductos();
	$cat -> id_Categoria = $_POST["Categoria"];
	$cat -> ajaxMostrarProductosPorCategoria();
}

/* =============================
  	Editar Productos
  ============================== */
if(isset($_POST["idProducto"])){
	$editarProducto = new AjaxProductos();
	$editarProducto -> idProducto = $_POST["idProducto"];
	$editarProducto -> ajaxEditarProducto();
}

/* =============================
  	Traer Productos
  ============================== */
if(isset($_POST["traerProductos"])){
	$traerProductos = new AjaxProductos();
	$traerProductos -> traerProductos = $_POST["traerProductos"];
	$traerProductos -> ajaxEditarProducto();
}

/* =============================
  	Traer nombre Productos
  ============================== */
if(isset($_POST["nombreProductos"])){
	$nombreProductos = new AjaxProductos();
	$nombreProductos -> nombreProductos = $_POST["nombreProductos"];
	$nombreProductos -> ajaxEditarProducto();
}