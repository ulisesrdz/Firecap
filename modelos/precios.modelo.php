<?php

require_once "conexion.php";

class ModeloPreciosProveedor{

    /*====================================
		Mostrar Productos
	 =====================================*/
	 static public function mdlMostrarPreciosProveedor($item, $valor){

        if($item != null)
        {
            if($item == 'idPrecio'){
                
                $stmt = Conexion::conectar()->prepare("SELECT id, id_producto, id_proveedor, precio, id_usuario, fecha FROM preciosProductos WHERE id = :id ORDER BY id DESC " );
        
                $stmt -> bindParam(":id",$valor, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetch();

            }else{

                $stmt = Conexion::conectar()->prepare("SELECT pp.id, p.codigo, descripcion, precio, pr.nombre FROM preciosProductos pp JOIN productos p on p.id = pp.id_producto JOIN proveedores pr on pr.id=id_proveedor WHERE pp.id_producto = :id ORDER BY pp.id DESC " );
        
                $stmt -> bindParam(":id",$valor, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetchAll();

            }
            
        }
        else{
            $stmt = Conexion::conectar()->prepare("SELECT pp.id, p.codigo, descripcion, precio, pr.nombre FROM preciosProductos pp JOIN productos p on p.id = pp.id_producto JOIN proveedores pr on pr.id=id_proveedor ORDER BY pp.id DESC");		 	

            $stmt -> execute();

            return $stmt -> fetchAll();
        }

        $stmt -> close();

        $stmt = null;
    }

      /*====================================
				Crear Precio/Productos
	 =====================================*/
	 static public function MdlAsignarPrecioProveedor($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_producto, id_proveedor, precio, id_usuario) VALUES (:id_producto, :id_proveedor, :precio, :id_usuario) ");

       $stmt -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
       $stmt -> bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_STR);
       $stmt -> bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
       $stmt -> bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
           
       if( $stmt -> execute() ){

           return "ok";	

       }else{

           return "error";
       
       }

       $stmt->close();
       
       $stmt = null;

    }

     /*====================================
		    Editar Precio/Productos
	 =====================================*/

    static public function MdlEditarPrecioProveedor($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_producto = :id_producto, id_proveedor = :id_proveedor, precio = :precio, id_usuario = :id_usuario WHERE id = :id_precio");

        $stmt -> bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
        $stmt -> bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_STR);
        $stmt -> bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
        $stmt -> bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":id_precio", $datos["id"], PDO::PARAM_STR);
        
           
       if( $stmt -> execute() ){

           return "ok";	

       }else{

           return "error";
       
       }

       $stmt->close();
       
       $stmt = null;

    }

     /*====================================
		Borrar precio
	 =====================================*/
	 static public function mdlBorrarPrecioProveedor($tabla, $datos){
	 	
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