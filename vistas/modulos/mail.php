<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bitacora de Vendedores        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Bitacora</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      	<div class="box">
			
			<div class="box-header with-border">
			
				<button class="btn btn-primary btnRegresarLista" >                
					Regresar              
				</button>          
			
			</div>
		
			
			<div class="container">

					<body>

						<div class="container">
							<div class="page-header">
								<h1>Crear Bitacora de cliente</h1>      
							</div>

							<div class="form"> 
								
								<form class="form-horizontal" action="" method="post">
								
								<!--=====================================
									ENTRADA DEL CODIGO
									======================================--> 

									<div class="form-group">
									
										<div class="col-sm-10">
											
											<div class="input-group">
												
												<span class="input-group-addon"><i class="fa fa-key"></i></span>

												<?php

												$item = null;
												$valor = null;

												//$ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
												$bitacora = ControladorBitacoraVentas::ctrMostrarBitacora($item, $valor);

												if(!$bitacora){

												echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="FIRE-10001" readonly>';
											

												}else{

												foreach ($bitacora as $key => $value) {
													
													
												
												}

												$codigo = 'FIRE' + $value["codigo"] + 1;



												echo '<input type="text" class="form-control" id="nuevaFolio" name="nuevaFolio" value="'.$codigo.'" readonly>';
											

												}



												?>
												
											
											
											</div>

										</div>		

									</div>

									<!--=====================================
									ENTRADA DEL CLIENTE
									======================================--> 

									<div class="form-group">
										
										<div class="col-sm-10">

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
												
												<span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarClientes" data-dismiss="modal">Agregar cliente</button></span>
											</div>
										</div>
									
									</div>

									<!--=====================================
									ENTRADA DEL VENDEDOR
									======================================-->
								
									<div class="form-group">
										
										<div class="col-sm-10">
											
											<div class="input-group">
												
												<span class="input-group-addon"><i class="fa fa-user"></i></span> 

												<input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

												<input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

											</div>
										
										</div>
									
									</div> 

									<!--=====================================
									ENTRADA CONTACTO
									======================================-->
								
									<div class="form-group">
										
										<div class="col-sm-10">
											
											<div class="input-group">
												
												<span class="input-group-addon"><i class="fa fa-user"></i></span> 

												<input type="text" class="form-control" id="nuevoVendedor" placeholder="Nombre de Contacto">							

											</div>
										
										</div>
									
									</div> 

									<!--=====================================
									ENTRADA TELEFONO CONTACTO
									======================================-->
								
									<div class="form-group">
										
										<div class="col-sm-10">
											
											<div class="input-group">
												
												<span class="input-group-addon"><i class="fa fa-user"></i></span> 

												<input type="text" class="form-control" id="nuevoVendedor" placeholder="Telefono de Contacto">							

											</div>
										
										</div>
									
									</div> 

									<!--=====================================
									ENTRADA DEL CODIGO
									======================================--> 

									<div class="form-group">

										<div class="col-sm-10">
										
											<div class="input-group">
												
												<span class="input-group-addon"><i class="fa fa-list"></i></span>

												<!-- <input type="text" class="form-control" id="nuevaObservacion" name="nuevaObservacion" placeholder="Observaciones"> -->
												<textarea id="nuevaObservacion" class="form-control" name="nuevaObservacion" rows="10" style="resize:none" placeholder="Observaciones"></textarea>

											</div>

										</div>
									
									</div>

									<div class="form-group">        
										
										<div class="col-sm-offset-9 col-sm-10">
											<button type="submit" class="btn btn-success">Guardar</button>
											<!-- <button type="submit" class="btn btn-primary">Guardar Cliente</button> -->
										</div>
									
									</div>
								
								</form>

								<?php

									$crearBitacora = new ControladorBitacoraVentas();
									$crearBitacora -> ctrInsertarBitacora();
								?>

							</div>

							

						</div>

						
					</body>
					
			</div>

		</div>

    </section>
    
  </div>

  
<!--=====================================
          Agregar Clientes Ventana  Modal
======================================-->
 
<div id="modalAgregarClientes" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
	<div class="modal-content">

			<!--Formulario-->
			<form role="form" method="post" >

				<!--=====================================
							CABEZA DEL MODAL
					======================================-->
					<div class="modal-header" style="background:#3c8dbc; color:white">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Agregar Clientes</h4>
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
				$crearCliente -> ctrCrearClienteBitacora();
			?>

    </div>

  </div>

</div>

