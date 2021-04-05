<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Servicios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Servicios</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        
        <a href="crear-servicio">

          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarServicio">
          
            Crear Servicio

          </button>

        </a>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Numero Orden</th>
           <th>Cliente</th>
           <th>Estado Pago</th>
           <th>Fecha</th>
           <th>Total</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $categorias = ControladorServicios::ctrMostrarServicios($item, $valor);

          foreach ($categorias as $key => $value) {
           
            $status ="";
            if($value["statusPago"]==0){
                $status = "<button class='btn btn-warning btnStatusPago' idServicio='".$value["id"]."' data-toggle='modal' data-target='#modalStatus'>Proceso</button>";
            }
            if($value["statusPago"]==1){
              $status = "<button class='btn btn-success btnStatusPago' idServicio='".$value["id"]."' data-toggle='modal' data-target='#modalStatus'>Completado</button>";
            }
            if($value["statusPago"]==2){
              $status = "<button class='btn btn-danger btnStatusPago' idServicio='".$value["id"]."' data-toggle='modal' data-target='#modalStatus'>Cancelado</button>";
            }
            

            echo ' <tr>

                    <td>'.($key+1).'</td>
                    
                    <td>'.$value["codigo"].'</td>';

                      $itemCliente = "id";
                      $valorCliente = $value["id_cliente"];

                      $respuestaCliente = ControladorClientes::ctrMostrarCliente($itemCliente,$valorCliente);

                      echo '<td>'.$respuestaCliente["nombre"].'</td>';

                      echo '<td> 
                        <div class="btn-group">
                          '.$status.'
                          </div> 
                          </td> ';
                          echo '<td>'.$value["fecha"].'</td>';
                          echo '<td>'.$value["total"].'</td>';
                   echo ' <td>

                      <div class="btn-group">

                        <button class="btn btn-info btnImprimirServicio" NoServicio="'.$value["id"].'"><i class="fa fa-print"></i></button>
                        
                        <button class="btn btn-danger btnEliminarServicio" EliminarServicio="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

       <?php
        $eliminarServicio = new ControladorVentas();
        $eliminarServicio -> ctrEliminarServicio();
      ?>

      </div>

    </div>

  </section>

</div>

 <!--=====================================
            Editar Status
  ======================================-->

  <div id="modalStatus" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

  <!--Formulario-->
  <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
                  CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Estado de Pago</h4>
        </div>

        <!--=====================================
                  CUERPO DEL MODAL
        ======================================-->
        <div class="modal-body">
          <div class="box-body">
            <!-- Entrada Perfil-->
              <div class="form-group">
              
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                  <select class="form-control input-lg" name="editarStatus" id="editarStatus">
                    
                    <option value="Selecciona Opcion" id="editarPerfil"></option>

                    <option value="0">Proceso</option>

                    <option value="1">Completada</option>
                    
                    <option value="2">Cancelada</option>

                  </select>
                  <input type="hidden" id="editarIdServicio" name="editarIdServicio">

                </div>

              </div>
              </div>

          </div>
            

          

       <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Actualizar Estado</button>

        </div>

            <?php

              $editarEstado = new ControladorVentas();
              $editarEstado -> ctrEditarEstado();

            ?>

    </form>
    </div>
  </div>
</div>