<?php 

$idProducto = "0";

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Precios Proveedor
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Precios Proveedor</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

    <div class="box-header with-border">
  
        <button class="btn btn-primary btnRegresarOrden" >
           <i class="fa fa-arrow-left"></i>
            Regresar

        </button>

        <?php 
          echo '<button class="btn btn-primary btnAgregarPrecio" idProducto= "'.$_GET["id_producto"].'" data-toggle="modal" data-target="#modalAgregarPrecioProveedor">
          <i class="fa fa-plus"></i>
          Asignar Precio

        </button> ';        
        ?>
      </div>  

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Descripcion</th>
           <th>Proveedor</th>
           <th>Precio</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = "id_producto";
          $valor = $_GET["id_producto"];

          $precioProv = ControladorPrecioProveedor::ctrMostrarPreciosProveedores($item, $valor);

          foreach ($precioProv as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["descripcion"].'</td>
                    <td class="text-uppercase">'.$value["nombre"].'</td>
                    <td class="text-uppercase">'.$value["precio"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarPrecio" id_Precio="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarPrecios"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarPrecio" idPrecio="'.$value["id"].'" idProducto="'.$_GET["id_producto"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PRECIO
======================================-->

<div id="modalAgregarPrecioProveedor" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Precio Proveedor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL Proveedor -->
            
            <div class="form-group">
              
              <div class="input-group">              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevoProveedor"  name="nuevoProveedor" required>

                  <option value="">Seleccione el Proveedor</option>

                  <?php

                     $item = null;
                     $valor = null;

                     $periodo = ControladorProveedores::ctrMostrarProveedor($item,$valor);
                     
                     foreach ($periodo as $key => $value) {

                       echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                     }

                  ?>
                  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL Precio -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoPrecio" placeholder="Ingresar Precio" required>
                <input type="hidden" id="idProducto" name="idProducto">

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Precio</button>

        </div>

        <?php

          $crearPrecio = new ControladorPrecioProveedor();
          $crearPrecio -> ctrAsignarPrecioProveedor();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarPrecios" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

    <form role="form" method="post">

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Actualizar Precio Proveedor</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL Proveedor -->
              
              <div class="form-group">
                
                <div class="input-group">              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg" id="editarProveedor"  name="editarProveedor" required>

                    <option value="">Seleccione el Proveedor</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $periodo = ControladorProveedores::ctrMostrarProveedor($item,$valor);
                      
                      foreach ($periodo as $key => $value) {

                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                      }

                    ?>
                    
                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA EL Precio -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <input type="number" class="form-control input-lg" name="editarPrecio" id="editarPrecio" placeholder="Ingresar Precio" required>
                  <input type="hidden" id="editarIdProducto" name="editarIdProducto">
                  <input type="hidden" id="editarIdPrecio" name="editarIdPrecio">

                </div>

              </div>

            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Precio</button>

          </div>

          <?php

            $editarPrecio = new ControladorPrecioProveedor();
            $editarPrecio -> ctrEditarPrecioProveedor();

          ?>

          </form>

    </div>

  </div>

</div>

<?php

  $borrarPrecio = new ControladorPrecioProveedor();
  $borrarPrecio -> mdlBorrarPrecioProveedor();

?>


