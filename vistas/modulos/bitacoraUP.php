<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Crear Bitacora
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Crear Bitacora</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-12 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioVenta">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="editarVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" id="editarIdVendedor" name="editarIdVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div> 

                <!--=====================================
                ENTRADA DEL CODIGO
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <?php

                    

                    $bitacora = ControladorBitacoraVentas::ctrMostrarUltimoFolio();

                    if(!$bitacora){

                    echo '<input type="text" class="form-control" id="nuevaFolio" name="nuevaFolio" value="FIRE-10001" readonly>';
                

                    }else{

                    
                    $codigo = str_replace ( 'FIRE-', '', $bitacora["folio"]);
                    $resultado = intval($codigo) + 1;
                    //var_dump($resultado +1);
                    $resultado = "FIRE-".$resultado; 
                    echo '<input type="text" class="form-control" id="nuevaFolio" name="nuevaFolio" value="'.$resultado.'" readonly>';
                

                    }
                    ?>
                    
                   
                  
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Seleccionar cliente</option>

                     <?php

                        $item = null;
                        $valor = null;

                        $categorias = ControladorClientes::ctrMostrarCliente($item, $valor);

                        foreach ($categorias as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                        }

                     ?>

                    </select>
                    
                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>
                  
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA CONTACTO
                ======================================-->
            
                <div class="form-group">
                        
                    <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control" id="nuevoContacto" name="nuevoContacto" placeholder="Nombre de Contacto">							

                    </div>
                
                </div> 

                <!--=====================================
                ENTRADA TELEFONO CONTACTO
                ======================================-->
            
                <div class="form-group">
                    
                    <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                        <input type="text" class="form-control" id="nuevoContactoTel" name="nuevoContactoTel" placeholder="Telefono de Contacto">							

                    </div>
                    
                </div> 

                <!--=====================================
                ENTRADA DEL CODIGO
                ======================================--> 

                <div class="form-group">
                   
                    <div class="input-group">
                        
                        <span class="input-group-addon"><i class="fa fa-list"></i></span>

                        <!-- <input type="text" class="form-control" id="nuevaObservacion" name="nuevaObservacion" placeholder="Observaciones"> -->
                        <textarea id="nuevaObservacion" class="form-control" name="nuevaObservacion" rows="10" style="resize:none" placeholder="Observaciones"></textarea>

                    </div>                  
                
                </div>

                <br>
      
              </div>

          </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-success pull-right">Guardar</button>
            <button class="btn btn-primary btnRegresarLista pull-left" >Regresar</button>  
          </div>

        </form>

        <?php

            $crearBitacora = new ControladorBitacoraVentas();
            $crearBitacora -> ctrInsertarBitacora();
          
        ?>


        </div>
            
      </div>

     
    </div>
   
  </section>

</div>