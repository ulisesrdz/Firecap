<?php


require_once "../controladores/bitacora.controlador.php";
require_once "../modelos/bitacora.modelo.php";
/**
 * 
 */
class AjaxBitacoras{

	/*====================================
		Editar Bitacora
	 =====================================*/
	 public $idBitacora;

	 public function ajaxEditarBitacora(){

	 	$item = "id";
	 	$valor = $this->idBitacora;
		
	 	$respuesta = ControladorBitacoraVentas::ctrMostrarBitacora($item, $valor);

	 	echo json_encode($respuesta);
	 }

}


	/*====================================
		Editar Bitacora
	 =====================================*/

	 if(isset($_POST["idBitacora"])){

	 	$bitacora = new AjaxBitacoras();
	 	$bitacora -> idBitacora = $_POST["idBitacora"];
	 	$bitacora -> ajaxEditarBitacora();

	 }

	
