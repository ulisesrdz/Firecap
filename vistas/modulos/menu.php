<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-dashboard"></i>
					<span>Inicio</span>

				</a>

			</li>';

		}

		// if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

		// 	echo '<li>

		// 		<a href="categorias">

		// 			<i class="fa fa-th"></i>
		// 			<span>Categorías</span>

		// 		</a>

		// 	</li>

		// 	<li>

		// 		<a href="productos">

		// 			<i class="fa fa-product-hunt"></i>
		// 			<span>Productos</span>

		// 		</a>

		// 	</li>';

		// }

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-database"></i>
					
					<span>Catalogos</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="productos">
							
							<i class="fa fa-circle-o"></i>
							<span>Productos</span>

						</a>

					</li>

					<li>

						<a href="categorias">
							
							<i class="fa fa-circle-o""></i>
							<span>Categorias</span>

						</a>

					</li>
					<li>

						<a href="clientes">
							
							<i class="fa fa-circle-o""></i>
							<span>Clientes</span>

						</a>

					</li>
					<li>

						<a href="proveedores">
							
							<i class="fa fa-circle-o""></i>
							<span>Proveedores</span>

						</a>

					</li>
					';

				echo '</ul>

			</li>';

		}

		// if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

		// 	echo '<li>

		// 		<a href="clientes">

		// 			<i class="fa fa-users"></i>
		// 			<span>Clientes</span>

		// 		</a>

		// 	</li>';

		// }

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li>

				<a href="ListaBitacora">

					<i class="fa fa-users"></i>
					<span>Bitacora de Venta</span>

				</a>

			</li>';

		}


		// if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

		// 	echo '<li>

		// 		<a href="proveedores">

		// 			<i class="fa fa-users"></i>
		// 			<span>Proveedores</span>

		// 		</a>

		// 	</li>';

		// }

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-cart-plus"></i>
					
					<span>Ventas</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="ventas">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar ventas</span>

						</a>

					</li>
					
					<li>

						<a href="crear-cotizacion">
							
							<i class="fa fa-circle-o"></i>
							<span>Crear Cotizacion</span>

						</a>

					</li>

					<li>

						<a href="crear-ventas">
							
							<i class="fa fa-circle-o"></i>
							<span>Crear venta</span>

						</a>

					</li>';

					if($_SESSION["perfil"] == "Administrador"){

					echo '<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de ventas</span>

						</a>

					</li>';

					}

				

				echo '</ul>

			</li>';

		}
		
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-institution"></i>
					
					<span>Servicios</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="servicios">
							
							<i class="fa fa-circle-o"></i>
							<span>Visualizar Servicios</span>

						</a>

					</li>
				</ul>
			</li>';

		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-pie-chart"></i>
					
					<span>Compras</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="compras">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar Compras</span>

						</a>

					</li>
					<li>

						<a href="crear-ordencompra">
							
							<i class="fa fa-circle-o"></i>
							<span>Crear Ordern Compra</span>

						</a>

					</li>
					<li>

						<a href="crear-compras">
							
							<i class="fa fa-circle-o"></i>
							<span>Crear Compra</span>

						</a>

					</li>';

					if($_SESSION["perfil"] == "Administrador"){

					echo '<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de Compras</span>

						</a>

					</li>';

					}

				

				echo '</ul>

			</li>';

		}
		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-area-chart"></i>
					
					<span>Inventarios</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="compras">
							
							<i class="fa fa-circle-o"></i>
							<span>Inventario Global</span>

						</a>

					</li>
					<li>

						<a href="crear-ordencompra">
							
							<i class="fa fa-circle-o"></i>
							<span>Inventario P/Categoria</span>

						</a>

					</li>
					<li>

						<a href="abastecerInventario">
							
							<i class="fa fa-circle-o"></i>
							<span>Abastecer</span>

						</a>

					</li>
				</ul>

			</li>';

					

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-gear"></i>
					
					<span>Administracion</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="usuarios">
							
							<i class="fa fa-circle-o"></i>
							<span>Usuarios</span>

						</a>

					</li>
					<li>

						<a href="crear-ordencompra">
							
							<i class="fa fa-circle-o"></i>
							<span>Configuracion</span>

						</a>

					</li>
					
				</ul>

			</li>';

					

		}	

				
	
		?>

		</ul>

	 </section>

</aside>