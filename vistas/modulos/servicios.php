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
           <th>Tipo Servicio</th>
           <th>Estado</th>
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
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["idCliente"].'</td>
                    <td class="text-uppercase">'.$value["nOrden"].'</td>
                    <td class="text-uppercase">'.$value["status"].'</td>
                    <td class="text-uppercase">'.$value["fecha"].'</td>
                    <td class="text-uppercase">'.$value["total"].'</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-info btnImprimirServicio" NoServicio="'.$value["nOrden"].'"><i class="fa fa-print"></i></button>
                          
                        <button class="btn btn-warning btnEditarServicio" idServicio="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarServicio"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarServicio" idServicio="'.$value["id"].'"><i class="fa fa-times"></i></button>

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

