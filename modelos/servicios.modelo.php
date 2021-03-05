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

	 /*====================================
		Mostrar Servicios
	 =====================================*/
	 static public function mdlMostrarServicios($tabla, $item , $valor){

	 	if($item != null){

	 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

	 		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

	 		$stmt -> execute();

	 		return $stmt ->fetch();
	 	}
	 	else{
	 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

	 		$stmt -> execute();

	 		return $stmt -> fetchALL();
	 	}

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