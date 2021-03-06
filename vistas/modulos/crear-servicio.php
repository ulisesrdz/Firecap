<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Crear Servicio
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Crear Servicio</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <!--=====================================
      EL FORMULARIO
      ======================================-->
      
      <div class="col-lg-5 col-xs-12">
        
        <div class="box box-success">
          
          <div class="box-header with-border"></div>

          <form role="form" method="post" class="formularioServicio">

            <div class="box-body">
  
              <div class="box">

                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div> 

                <!--=====================================
                ENTRADA DEL CODIGO
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <?php
                    
                      $folio = ControladorServicios::ctrMostrarUltimoFolio();

                      if(!$folio){

                        echo '<input type="text" class="form-control" id="nuevoServicio" name="nuevoServicio" value="CAP-10001" readonly>';
                    

                      }else{

                        $codigo = str_replace ( 'CAP-', '', $folio["codigo"]);
                        $resultado = intval($codigo) + 1;
                        $resultado = "CAP-".$resultado; 
                        echo '<input type="text" class="form-control" id="nuevoServicio" name="nuevoServicio" value="'.$resultado.'" readonly>';

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
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 

                <div class="form-group row nuevoProducto">

                    
                 </div>

                
                <input type="hidden" id="listaProductos" name="listaProductos">              


                <!--=====================================
                BOT??N PARA AGREGAR PRODUCTO
                ======================================-->

                <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>

                <hr>

                <div class="row">

                  
                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->
                  
                  <div class="col-xs-8 pull-right">
                    
                    <table class="table">

                      <thead>

                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>      
                        </tr>

                      </thead>

                      <tbody>
                      
                        <tr>
                          
                          <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>

                               <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                               <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                        
                            </div>

                          </td>

                           <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>
                              
                              <input type="hidden" name="totalVenta" id="totalVenta">
                        
                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>

                <hr>

                <!--=====================================
                ENTRADA M??TODO DE PAGO
                ======================================-->

                <div class="form-group row">
                  
                  <div class="col-xs-6" style="padding-right:0px">
                    
                     <div class="input-group">
                  
                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Seleccione m??todo de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="TC">Tarjeta Cr??dito</option>
                        <option value="TD">Tarjeta D??bito</option>                  
                      </select>    

                    </div>

                  </div>

                  <div class="cajasMetodoPago"></div>

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">
                 
                </div>

                <!--=====================================
                ENTRADA DEL Obsercacion
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-list"></i></span>

                    <!-- <input type="text" class="form-control" id="nuevaObservacion" name="nuevaObservacion" placeholder="Observaciones"> -->
                    <textarea id="nuevaObservacion" name="nuevaObservacion" cols="60" rows="3" style="resize:none"></textarea>

                  </div>
                
                </div>

                <!-- <br> -->
      
              </div>

          </div>

          <div class="box-footer">

            <button type="submit" class="btn btn-primary pull-right">Guardar Servicio</button>

          </div>

        </form>

        <?php

          $guardarServicio = new ControladorServicios();
          $guardarServicio -> ctrCrearServiciox();
          
        ?>


        </div>
            
      </div>

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        
        <div class="box box-warning">

          <div class="box-header with-border"></div>

          <div class="box-body">
            
            <table class="table table-bordered table-striped dt-responsive tablasServicios">
              
               <thead>

                 <tr>
                  <th style="width: 10px">#</th>
                  
                  <th>C??digo</th>
                  <th>Descripcion</th>
                  <th>Stock</th>
                  <th>Acciones</th>
                </tr>

              </thead>

              

            </table>

          </div>

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

            <!-- Entrada Documento ID-->

            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Entrada Docmento" required>
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

             <!-- Entrada Fecha Nacimiento-->

            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
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
