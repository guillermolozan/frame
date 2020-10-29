<?php
        $sql="SELECT s.*, e.* FROM sucursal s INNER JOIN empresa e ON s.idempresa=e.idempresa WHERE s.idSucursal='$_SESSION[idSucursal]'";
        $result=consulta($sql);
        $rs=leer_registro($result);
	    $idEmpresa=$rs['idempresa'];
?>
<div>
	<span class="preload1"></span>
	<span class="preload2"></span>
 	<?php if($_SESSION['idRol']=='1')
	{
	$sql = "SELECT esTienda FROM sucursal WHERE idSucursal = '$_SESSION[idSucursal]'";
	$result = consulta($sql);
	$rs=leer_registro($result);
	$esTienda=$rs['esTienda'];
		if($esTienda=='1')
		{
	?>
    
    <ul id="nav">
    		<li class="top"><a href="main.php" class="top_link"><span>Inicio</span></a></li>
			<li class="top"><a href="#nogo53" id="contacts" class="top_link"><span class="down">Movimientos</span></a>
				<ul class="sub">
					<li><a href="entradas_alm/index.php">Entradas Traslado</a></li>
	  	    		<li><a href="salidas_alm/index.php">Salida Traslado</a></li>
				</ul>
			</li>
            <li class="top"><a href="despachos/index.php" class="top_link"><span>Guia Remision</span></a></li>
    <?php
		}
		elseif($esTienda=='0')
		{
	?>
    	<ul id="nav">
			<li class="top"><a href="main.php" class="top_link"><span>Inicio</span></a></li>
			<li class="top"><a href="#nogo53" id="products" class="top_link"><span class="down">Productos</span></a>
				<ul class="sub">
					<li><a href="productos/index.php">Articulos</a></li>
					<li><a href="tipos/index.php">Tipo</a></li>
					<li><a href="modelos/index.php">Modelo</a></li>
					<li><a href="marcas/index.php">Marca</a></li>
				</ul>
			</li>
  			<li class="top"><a href="proveedores/index.php" id="services" class="top_link"><span>Proveedores</span></a></li>
			<li class="top"><a href="#nogo53" id="contacts" class="top_link"><span class="down">Movimientos</span></a>
				<ul class="sub">
					<li><a href="entradas_alm/index.php">Entradas Traslado</a></li>
	  	    		<li><a href="salidas_alm/index.php">Salida Traslado</a></li>
				</ul>
			</li>
            <li class="top"><a href="despachos/index.php" class="top_link"><span>Despachos</span></a></li>
			<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">Compras</span></a>
				<ul class="sub">
					<li><a href="entradas_compra/index.php">Entradas por Compra</a></li>
				</ul>
			</li>
            <li class="top"><a href="facturas_prov/index.php" id="services" class="top_link"><span>Facturas Prov</span></a></li>
		</ul>
         <?php
		}
		?>
	<?php 
	}
	elseif($_SESSION['idRol']=='2')
	{
	?>
		<ul id="nav">
			<li class="top"><a href="main.php" class="top_link"><span>Inicio</span></a></li>
			<li class="top"><a href="#nogo53" id="products" class="top_link"><span class="down">Productos</span></a>
				<ul class="sub">
					<li><a href="productos/index.php">Articulos</a></li>
					<li><a href="tipos/index.php">Tipo</a></li>
					<li><a href="modelos/index.php">Modelo</a></li>
					<li><a href="marcas/index.php">Marca</a></li>
				</ul>
			</li>
			<li class="top"><a href="proveedores/index.php" id="services" class="top_link"><span>Proveedores</span></a></li>
			<li class="top"><a href="#nogo53" id="contacts" class="top_link"><span class="down">Movimientos</span></a>
				<ul class="sub">
					<li><a href="entradas_alm_total/index.php">Entradas Traslado</a></li>
	  	    		<li><a href="salidas_alm_total/index.php">Salida Traslado</a></li>
					<!--<li><a href="inventario/index.php" style="display:none">Inventario</a></li> -->
				</ul>
			</li>
			<li class="top"><a href="guia_rem_total/index.php" class="top_link"><span>Guia Remision</span></a></li>
			<li class="top"><a href="#nogo53" id="shop" class="top_link"><span class="down">Compras</span></a>
				<ul class="sub">
					<li><a href="entradas_compra_total/index.php">Entradas por Compra</a></li>
			   		<li><a href="ordenes_comp/index.php">Ordenes de Compra</a></li>
				</ul>
			</li>
            <li class="top"><a href="facturas_prov/index.php" id="services" class="top_link"><span>Facturas Prov</span></a></li>
		</ul>
	<?php 
	}
	elseif($_SESSION['idRol']=='3')
	{
	?>
	<ul id="nav">
		<li class="top"><a href="main.php" class="top_link"><span>Inicio</span></a></li>
		<li class="top"><a href="/ventas/cotizacion/index.php" id="contacts" class="top_link"><span>Cotizaciones</span></a>
		</li>
		<li class="top"><a href="ventas/kardexvalorizado.php?idEmpresa=<?php echo $idEmpresa;?>" id="products" class="top_link"><span>Productos</span></a>
		</li>
		<li class="top"><a href="clientes/index.php" id="services" class="top_link"><span>Clientes</span></a></li>
		<li class="top"><a href="cotizacion/index.php" id="contacts" class="top_link"><span>Cotizaciones</span></a></li>
		<li class="top"><a href="#" id="reporteventas" class="top_link"><span class="down">Reporte Ventas</span></a>
			<ul class="sub">
				<li><a href="ventas/cuentasporcobrarporvendedor.php">Cuentas por Cobrar</a></li>
				<li><a href="ventas/ventasporcadavendedor.php?fechaIni=<?php echo date('Y-m-d');?>&fechaFin=<?php echo date('Y-m-d');?>&BVenta=1">Ventas por Vendedor</a></li>
				<li><a href="ventas/movimientoventas.php">Movimiento de Ventas</a></li>
			</ul>
		</li>
	</ul>
	<?php 
	}
	elseif($_SESSION['idRol']=='9')
	{
		header("Location: admin/index.php");
	}
	elseif($_SESSION['idRol']=='5')
	{
	?>
	<ul id="nav">
		<li class="top"><a href="/intranet/main.php" class="top_link"><span>Inicio</span></a></li>
			<li class="top"><a href="#nogo53" id="products" class="top_link"><span class="down">Tablas</span></a>
				<ul class="sub">
					<li><a href="/intranet/clientes/index.php">Clientes</a></li>
					<li><a href="/intranet/productos/index.php">Productos</a></li>
					<li><a href="/intranet/equivalencias/index.php">Equivalencias</a></li>
					<li><a href="/intranet/modelos/index.php">Modelo</a></li>
					<li><a href="/intranet/marcas/index.php">Marca</a></li>
      		        <li><a href="/intranet/tablas/unimed_index.php">Unidades de Medida</a></li>
					<li><a href="/intranet/tiporegistro/index.php">Tipo Registro Caja</a></li>
      		        <li><a href="/intranet/tablas/tipodocumentos_index.php">Tipo de Documentos</a></li>
    		        <li><a href="/intranet/tablas/vehiculos_index.php">Vehiculos</a></li>
    		        <li><a href="/intranet/tablas/choferes_index.php">Choferes</a></li>
				</ul>
			</li>
		<li class="top"><a href="/intranet/compras/index.php" id="shop" class="top_link"><span>Compras</span></a>
		</li>
		<li class="top"><a href="/intranet/ordenservicio/index.php" id="shop" class="top_link"><span>Orden de Servicio</span></a>
		</li>
		<li class="top"><a href="/intranet/inventario/index.php" id="products" class="top_link"><span>Kardex</span></a>
		</li>
        
		<li class="top"><a href="#" id="caja" class="top_link"><span class="down">Ventas</span></a>
			<ul class="sub">
				<li><a href="/intranet/ventas/index.php">Ventas</a></li>
				<li><a href="/intranet/guia_rem/index.php?fechaIni=<?php echo date('Y-m-d');?>&fechaFin=<?php echo date('Y-m-d');?>">Guia de Remision</a></li>
				<li><a href="/intranet/guiatrans/index.php?fechaIni=<?php echo date('Y-m-d');?>&fechaFin=<?php echo date('Y-m-d');?>">Guia de Transportista</a></li>
			</ul>
		</li>
        
		<li class="top"><a href="#" id="caja" class="top_link"><span class="down">Caja</span></a>
			<ul class="sub">
				<li><a href="/intranet/caja/index.php?fechaIni=<?php echo date('Y-m-d');?>&fechaFin=<?php echo date('Y-m-d');?>&BCaja=1">Caja</a></li>
				<li><a href="/intranet/cuentasxcobrar/index.php?fechaIni=<?php echo date('Y-m-d');?>&fechaFin=<?php echo date('Y-m-d');?>&BCaja=1">Cuentas por Cobrar</a></li>
				<li><a href="/intranet/cuentasxpagar/index.php?fechaIni=<?php echo date('Y-m-d');?>&fechaFin=<?php echo date('Y-m-d');?>&BCaja=1">Cuentas por Pagar</a></li>                
			</ul>
		</li>
	</ul>
	<?php 
	}
	else
	{
		session_destroy();
		header("Location: index.php?alter=3");
	}
	?>
</div>