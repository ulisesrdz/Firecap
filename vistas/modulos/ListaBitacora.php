<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Lista de Bitacora de Vendedors
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Crear Bitacora</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

    <div class="box-header with-border">
  
        <button class="btn btn-primary btnAgregarBitacora" >
           
            Crear Bitacora

        </button>

      </div>  

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Cliente</th>
           <th>Status</th>
           <th>Fecha</th>
           <th>Acciones</th>
         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $bitacora = ControladorBitacoraVentas::ctrMostrarBitacora($item, $valor);

          foreach ($bitacora as $key => $value) {
           
            $status ="";
            if($value["status"]==0){
                $status = "<button class='btn btn-danger btnStatus' idBitacora='".$value["id"]."' data-toggle='modal' data-target='#modalStatus'>Inactivo</button>";
            }
            if($value["status"]==1){
              $status = "<button class='btn btn-warning btnStatus' idBitacora='".$value["id"]."' data-toggle='modal' data-target='#modalStatus'>Proceso</button>";
            }
            if($value["status"]==2){
              $status = "<button class='btn btn-success btnStatus' idBitacora='".$value["id"]."' data-toggle='modal' data-target='#modalStatus'>Completado</button>";
            }
            if($value["status"]==3){
              $status = "<button class='btn btn-danger btnStatus' idBitacora='".$value["id"]."' data-toggle='modal' data-target='#modalStatus'>Cancelado</button>";
            }
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["folio"].'</td>
                    <td class="text-uppercase">'.$value["nombre"].'</td>
                    <td> 
                      <div class="btn-group">
                      '.$status.'
                      </div> 
                    </td> 
                    <td class="text-uppercase">'.$value["fecha"].'</td>
                    <td>
                    
                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarObservacion" id_Bitacora="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarObservacion"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarObservacion" id_bitacora="'.$value["id"].'"><i class="fa fa-times"></i></button>

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
          <h4 class="modal-title">Modificar Estado de la Bitacora</h4>
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
                    
                    <option value="" id="editarPerfil"></option>

                    <option value="0">Inactivo</option>

                    <option value="1">Proceso</option>

                    <option value="2">Completada</option>
                    
                    <option value="3">Cancelada</option>

                  </select>
                  <input type="hidden" id="editarIdBitacora" name="editarIdBitacora">

                </div>

              </div>
              </div>

          </div>
            

          

       <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Actualizar Estado</button>

        </div>

            <?php

              $editarEstadoBitacora = new ControladorBitacoraVentas();
              $editarEstadoBitacora -> ctrEditarEstadoBitacora();

            ?>

    </form>
    </div>
  </div>
</div>
   <!--=====================================
            Editar Observacion
  ======================================-->

<div id="modalEditarObservacion" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

  <!--Formulario-->
  <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
                  CABEZA DEL MODAL
        ======================================-->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Observacion</h4>
        </div>

        <!--=====================================
                  CUERPO DEL MODAL
        ======================================-->
         <!-- Entrada Nombre-->
        <div class="modal-body">
          <div class="box-body">
            
            <!-- Entrada Nombre Contacto-->

            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <input class="form-control"  id = "editarNombreContacto" name = "editarNombreContacto" rows="10" style="resize:none" placeholder="Nombre Contacto" readonly></textarea> 
                 
              </div>
            </div>

            <!-- Entrada Telefono Contacto-->

            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <input class="form-control"  id = "editarTelefonoContacto" name = "editarTelefonoContacto" rows="10" style="resize:none" placeholder="Telefono Contacto" readonly></textarea> 
                 
              </div>
            </div>

            <!-- Entrada Observacion-->

            <div class="form-group"> 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                <textarea class="form-control"  id = "editarObservacion" name = "editarObservacion" rows="10" style="resize:none" placeholder="Observaciones"></textarea> 
                 <input type="hidden" id="editarBitacora" name="editarBitacora">
              </div>
            </div>
          
            
          </div>

        </div>

       <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Observacion</button>

        </div>

            <?php

              $editarObservacionBitacora = new ControladorBitacoraVentas();
              $editarObservacionBitacora -> ctrEditarObservacionesBitacora();

            ?>

    </form>
    </div>
  </div>
</div>

<?php

      $borrarBitacora = new ControladorBitacoraVentas();
      $borrarBitacora -> ctrBorrarBitacora();

  ?>

  