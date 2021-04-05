<?php

require_once "conexion.php";

class ModeloProductos{

	 /*====================================
		Mostrar Productos
	 =====================================*/
	 static public function mdlMostrarProductos($tabla, $item, $valor, $orden){

		if($item == 'ok'){
			$stmt = Conexion::conectar()->prepare("SELECT pr.* FROM productos pr JOIN categorias c on c.id=pr.id_categoria WHERE nombre='Servicios' ORDER BY pr.id ASC");		 	

			$stmt -> execute();

			return $stmt -> fetchAll();
		}
		else if($item == 'id_Categoria')
	 	{
	 		$stmt = Conexion::conectar()->prepare("SELECT id,codigo,descripcion,stock,precio_venta FROM  $tabla where $item = :$item order by $orden ASC" );
	 	
	 		$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);

	 		$stmt -> execute();

	 		return $stmt -> fetchAll();
	 	}
	 	else if($item == 'id')
	 	{
	 		$stmt = Conexion::conectar()->prepare("SELECT * FROM  $tabla where $item = $valor order by $orden ASC" );
	 	
	 		$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);

	 		$stmt -> execute();

	 		return $stmt -> fetch();
	 	}
		else if($item != null)
	 	{
	 		$stmt = Conexion::conectar()->prepare("SELECT * FROM  $tabla where id_Categoria = :$item order by $orden ASC" );
	 	
	 		$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);

	 		$stmt -> execute();

	 		return $stmt -> fetch();
	 	}
	 	else{
	 		$stmt = Conexion::conectar()->prepare("SELECT * FROM  $tabla ORDER BY $orden ASC");		 	

		 	$stmt -> execute();

		 	return $stmt -> fetchAll();
	 	}

	 	$stmt -> close();

	 	$stmt = null;
	 }

	 static public function mdlMostrarServicios($tabla, $item, $valor, $orden){

		if($item != null)
		{
			$stmt = Conexion::conectar()->prepare("Select pr.id, codigo, descripcion, stock, nombre FROM productos pr JOIN categorias c on c.id=pr.id_categoria WHERE nombre='Servicios' AND id=:id ORDER BY pr.id ASC;" );
		
			$stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
		}
		else{
			$stmt = Conexion::conectar()->prepare("Select pr.id,codigo,descripcion,stock,nombre FROM productos pr JOIN categorias c on c.id=pr.id_categoria WHERE nombre='Servicios' ORDER BY pr.id ASC;");		 	

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;
	}

	  /*====================================
				Crear Productos
	 =====================================*/
	 static public function mdlIngresarProductos($tabla, $datos){
	 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_Categoria, codigo, descripcion, stock, precio_venta, precio_compra, imagen) VALUES (:id_Categoria, :codigo, :descripcion, :stock, :precio_venta, :precio_compra, :imagen) ");

		$stmt -> bindParam(":id_Categoria", $datos["id_Categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt -> bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
		$stmt -> bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		
			
		if( $stmt -> execute() ){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	 }

	 /*====================================
				Editar Productos
	 =====================================*/
	 static public function MdlEditarProductos($tabla, $datos){
	 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion, stock = :stock, precio_venta = :precio_venta, precio_compra = :precio_compra, imagen = :imagen WHERE codigo = :codigo");

		
		$stmt -> bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt -> bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt -> bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
		$stmt -> bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
		$stmt -> bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt -> bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		
			
		if( $stmt -> execute() ){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	 }

	 static public function MdlAbastecerProductos($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  stock = :stock, precio_venta = :precio_venta, id_usuario = :id_usuario WHERE id = :id");

	   $stmt -> bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
	   $stmt -> bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);  
	   $stmt -> bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
	   $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
	   
	      
	   if( $stmt -> execute() ){

		   return "ok";	

	   }else{

		   return "error";
	   
	   }

	   $stmt->close();
	   
	   $stmt = null;

	}
	 /*====================================
		Borrar PRoductos
	 =====================================*/
	 static public function mdlBorrarProducto($tabla, $datos){
	 	
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

	  /*====================================
		Actualizar Productos
	 =====================================*/

	 static public  function mdlActualizarProductos($tabla, $item1, $valor1, $valor){

	 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);
		

		if( $stmt -> execute() ){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	 }

	 static public function mdlMostrarSumaVentas($tabla){

	 	$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla ");

	 	$stmt -> execute();

	 	return $stmt -> fetch();

	 	$stmt -> close();

	 	$stmt = null;

	 }

	 static public function mdlAuditarMovto($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_producto, id_usuario,cantidad, precio_venta) VALUES (:id_producto, :id_usuario, :cantidad, :precio_venta) ");

	   $stmt -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
	   $stmt -> bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
	   $stmt -> bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
	   $stmt -> bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
	   
	   
		   
	   if( $stmt -> execute() ){

		   return "ok";	

	   }else{

		   return "error";
	   
	   }

	   $stmt->close();
	   
	   $stmt = null;

	}


}