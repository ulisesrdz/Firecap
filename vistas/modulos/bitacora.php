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

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" id="idVendedor" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

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
                ENTRADA DEL Observacion
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

<!--=====================================
          Agregar Clientes Ventana  Modal
======================================-->
 
<div id="modalAgregarCliente" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <!--Formulario-->
      <form role="form" method="post" >

      <!--=====================================
                  CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Cliente</h4>
        </div>

        <!--=====================================
                  CUERPO DEL MODAL
        ======================================-->
        
        <div class="modal-body">
          <div class="box-body">
            
              

              <!-- Entrada Nombre-->
            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar Nombre" required>
              </div>
            </div>

            
          <!-- Entrada Email-->

            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar Email" required>
              </div>
            </div>

             <!-- Entrada Telefono-->

            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Telefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
              </div>
            </div>

             <!-- Entrada Direccion-->

            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoDireccion" placeholder="Ingresar Direccion" required>
              </div>
            </div>

           

          </div>
        </div>

         <!--=====================================
        PIE DEL MODAL
        ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Cliente</button>

          </div>
       
        
      
      </form>
        <?php

            $crearCliente = new ControladorClientes();
            $crearCliente -> ctrCrearCliente();
        ?>

    </div>
  </div>
</div>