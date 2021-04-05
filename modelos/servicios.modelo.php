<?php

require_once "conexion.php";

class ModeloServicios{

	/*====================================
		Registro Servicios
	 =====================================*/
	 static public function mdlCrearServicios($tabla, $datos){
	 	
	 	
	 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:categoria) ");

		$stmt -> bindParam(":categoria", $datos, PDO::PARAM_STR);
		
		
			
		if( $stmt -> execute() ){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	 }


	 static public function mdlIngresarServicio($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo,id_cliente,id_vendedor, productos, impuesto,neto,total,metodo_pago,observaciones,tipoDocumento) VALUES (:codigo, :id_cliente, :id_vendedor, :productos, :impuesto,:neto,:total,:metodo_pago,:observaciones,'S')");

		$stmt ->bindParam(":codigo" , $datos["codigo"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_cliente" , $datos["id_cliente"], PDO::PARAM_INT);
		$stmt ->bindParam(":id_vendedor" , $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt ->bindParam(":productos" , $datos["productos"], PDO::PARAM_STR);
		$stmt ->bindParam(":impuesto" , $datos["impuesto"], PDO::PARAM_STR);
		$stmt ->bindParam(":neto" , $datos["neto"], PDO::PARAM_STR);
		$stmt ->bindParam(":total" , $datos["total"], PDO::PARAM_STR);
		$stmt ->bindParam(":metodo_pago" , $datos["metodo_pago"], PDO::PARAM_STR);
		$stmt ->bindParam(":observaciones" , $datos["observaciones"], PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		$stmt = null;

	}
	
	 /*====================================
		Mostrar Servicios
	 =====================================*/
	 static public function mdlMostrarServicios($tabla, $item , $valor){

	 	if($item != null){

	 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND tipoDocumento='S'");

	 		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

	 		$stmt -> execute();

	 		return $stmt ->fetch();
	 	}
	 	else{
	 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tipoDocumento='S' ");

	 		$stmt -> execute();

	 		return $stmt -> fetchALL();
	 	}

	 	$stmt -> close();
	 	$stmt = null;
	 }

	 static public function mdlMostrarUltimoFolio(){
       
        $stmt = Conexion::conectar()->prepare("SELECT codigo FROM ventas ORDER BY id DESC LIMIT 1;");		 	

        $stmt -> execute();

        return $stmt -> fetch();        

        $stmt -> close();

        $stmt = null;
    }

	 /*====================================
		Editar Servicios
	 =====================================*/
	 static public function mdlEditarServicios($tabla, $datos){

	 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :categoria WHERE id = :id");

		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
		
			
		if( $stmt -> execute() ){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	 }

	  /*====================================
		Borrar Categoria
	 =====================================*/
	 static public function ctrBorrarServicio($tabla, $datos){
	 	
	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

	 	if( $stmt -> execute() ){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	 }
}