<?php

require_once "conexion.php";

class ModeloBitacoraVenta{

    /*====================================
		Mostrar Productos
	 =====================================*/
	 static public function mdlMostrarBitacora($item, $valor){

        if($item != null)
        {
                $stmt = Conexion::conectar()->prepare("SELECT bi.id, id_cliente, nombre, bi.status, bi.fecha,folio,observaciones,contacto,numero_contacto FROM bitacora bi JOIN clientes cl on cl.id = bi.id_cliente WHERE bi.id = :id ORDER BY bi.id ASC " );
        
                $stmt -> bindParam(":id",$valor, PDO::PARAM_STR);

                $stmt -> execute();

                return $stmt -> fetch();
            
        }
        else{
            $stmt = Conexion::conectar()->prepare("SELECT bi.id, id_cliente, nombre, bi.status, bi.fecha,folio,observaciones,contacto,numero_contacto FROM bitacora bi JOIN clientes cl on cl.id = bi.id_cliente ORDER BY id ASC ");		 	

            $stmt -> execute();

            return $stmt -> fetchAll();
        }

        $stmt -> close();

        $stmt = null;
    }
    static public function mdlMostrarUltimoFolio(){
       
        $stmt = Conexion::conectar()->prepare("SELECT folio FROM bitacora ORDER BY id DESC LIMIT 1;");		 	

        $stmt -> execute();

        return $stmt -> fetch();        

        $stmt -> close();

        $stmt = null;
    }
    

      /*====================================
				Crear Bitacora
	 =====================================*/
	 static public function MdlInsertarBitacora($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_cliente, contacto, numero_contacto, observaciones, status, id_usuario, folio) VALUES (:id_cliente, :contacto, :telefono_contacto, :observaciones, :status, :id_usuario, :folio) ");

       $stmt -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
       $stmt -> bindParam(":contacto", $datos["contacto"], PDO::PARAM_STR);
       $stmt -> bindParam(":telefono_contacto", $datos["telefono_contacto"], PDO::PARAM_STR);
       $stmt -> bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
       $stmt -> bindParam(":status", $datos["status"], PDO::PARAM_STR);
       $stmt -> bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
       $stmt -> bindParam(":folio", $datos["folio"], PDO::PARAM_STR);
           
       if( $stmt -> execute() ){

           return "ok";	

       }else{

           return "error";
       
       }

       $stmt->close();
       
       $stmt = null;

    }

     /*====================================
		    Editar Bitacora
	 =====================================*/

    static public function MdlEditarBitacora($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_cliente = :id_cliente, contacto = :contacto, telefono_contacto = :telefono_contacto, observaciones = :observaciones, status = :status, id_usuario = :id_usuario, folio = :folio  WHERE id = :id");

        $stmt -> bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_STR);
        $stmt -> bindParam(":contacto", $datos["contacto"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono_contacto", $datos["telefono_contacto"], PDO::PARAM_STR);
        $stmt -> bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
        $stmt -> bindParam(":status", $datos["status"], PDO::PARAM_STR);
        $stmt -> bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":folio", $datos["folio"], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
        
           
        if( $stmt -> execute() ){

            return "ok";	

        }else{

            return "error";
        
        }

        $stmt->close();
        
        $stmt = null;

    }

    static public function MdlEditarStatusBitacora($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  status = :status  WHERE id = :id");

        $stmt -> bindParam(":status", $datos["status"], PDO::PARAM_STR);
        
        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
        
           
        if( $stmt -> execute() ){

            return "ok";	

        }else{

            return "error";
        
        }

        $stmt->close();
        
        $stmt = null;

    }

    static public function MdlEditarObservacionBitacora($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  observaciones = :observaciones  WHERE id = :id");

        $stmt -> bindParam(":observaciones", $datos["observaciones"], PDO::PARAM_STR);
        
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
		Borrar Bitacora
	 =====================================*/
	 static public function mdlBorrarBitacora($tabla, $datos){
	 	
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