<?php
	include ('conexion.php');

$modo = $_POST['modo'];

if ($modo == 1) { //alta de clientes
	$cuit = $_POST['cuit'];
	$telefono = $_POST['telefono'];
	$nombre = $_POST['nombre'];
	$fechanacimiento = $_POST['fe_na'];
	$direccion = $_POST['direccion'];

	$sel = "SELECT count(*) as can FROM perona WHERE cuit = '$cuit'";

	$ejecutar = mysqli_query($conexion , $sel);

	$data = mysqli_fetch_array($ejecutar);
	//$chequear_telefono = mysqli_num_rows($ejecutar);

	if ($data["can"] > 0 ){
		echo "<div class='alert  alert-dismissible alert-warning'><strong>ERROR! El CUIT/DNI ya Existe.</strong><br>Ingrese otro CUIT</div>";
		exit();
	}else {
		$insert = "INSERT INTO 	persona(nombre, cuit, fec_nac,direccion,telefono, id_tipo_persona, baja_logica) VALUES('$nombre','$cuit','$fechanacimiento','$direccion', '$telefono', '2', '1' )"; // tipo persona 2 es cliente
		$ejecutar = mysqli_query($conexion, $insert);
		if($ejecutar){
			echo "<div class='alert alert-dismissible alert-success'><strong>CORRECTO!!</strong><br>El Cliente Fue Registrado</div>";
		}

	}
}
if ($modo == 2) { // alta proveedores
	$cuit = $_POST['cuit'];
	$razon_social = $_POST['razon_social'];
	$telefono = $_POST['telefono'];
	$tipo = $_POST['tipo'];
	$fe_in = $_POST['fe_in'];
	$direccion = $_POST['direccion'];
	$echo= false;
	$sel = "SELECT cuit FROM persona WHERE cuit = '$cuit'";

	$ejecutar = mysqli_query($conexion , $sel);

	$data = mysqli_fetch_array($ejecutar);

	if (sizeof($data) < 1 ){
		// echo "<div class='alert  alert-dismissible alert-warning'><strong>ERROR! El CUIT/DNI ya Existe.</strong><br>Ingrese otro CUIT</div>";
		$insert = "INSERT INTO persona (nombre, cuit, fec_nac,direccion,telefono, id_tipo_persona, baja_logica) VALUES('$razon_social', '$cuit', '$fe_in','$direccion','$telefono','1','1')"; // tipo perosna 1 es proveedor
		$ejecutar = mysqli_query($conexion, $insert);
		$echo = TRUE;

	}
	echo $echo;
}

if($modo == 3){

	$descripcion = $_POST['descripcion'];
	$precio = $_POST['precio'];

	$consulta  = mysqli_query($conexion, "SELECT * FROM productos ORDER BY id_producto DESC");
	$resultado = mysqli_fetch_array($consulta);
	$codProducto = $resultado['id_producto']+1;

	$sql = "INSERT INTO productos (descripcion,precio, baja_logica) VALUES ('$descripcion','$precio','1')";
	$insertar = mysqli_query($conexion,$sql) or die ("No se pudo inserar el registro");

}

if ($modo == 4) {

	$descripcion = $_POST['descripcion'];
	$precio = $_POST['precio'];
	$udm = $_POST['udm'];

	$sql = "INSERT INTO insumos (desc_insumo, udm, precio_compra, baja_logica) VALUES ('$descripcion', '$udm','$precio', '1')";

	$insertar = mysqli_query($conexion,$sql) or die ("No se pudo inserar el registro");
	if($insertar){
		echo "<div class='alert alert-dismissible alert-success'><strong>CORRECTO!!</strong><br>El Proveedor Fue Registrado</div>";
	}
}



?>
