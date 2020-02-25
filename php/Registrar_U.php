<?php

	require('Conexion.php');

	session_start();
	if(!$_SESSION){
		header("location: ../index.html");
	}

	$Foto = $_FILES["Imagen"]["name"];
	$Ruta = $_FILES["Imagen"]["tmp_name"];
	$Destino = "../img/".$Foto;
	copy($Ruta, $Destino);

  //Datos basicos del residente
	$Nombre_R = $_POST['Nombre_R'];
	$Apellido_R = $_POST['Apellido_R'];
	$Doc = $_POST['Tipo_Doc'];
	$Num_Doc = $_POST['Numero_Doc'];
	$Fecha_H = $_POST['Fecha_H'];
	$Cert_Reinc = $_POST['Cert_R'];
	$Venc_R = $_POST["Venci_C_R"];
  	$Cert_B = $_POST['Cert_B_C'];
	$Vencimieto_C = $_POST['Venci_C'];
	$Hora_I = $_POST['Hora_I'];
	$Hora_E = $_POST['Hora_E'];
	$Sector = $_POST['Sector'];
	$Motivo = $_POST['Motivo'];
 	$Fecha_A = $_POST['Fecha_A'];
	$Fecha_B = $_POST['Fecha_B'];
    
    //Datos del Vehiculo
    $Model_V= $_POST['Modelo_V'];
    $Dominio_V = $_POST['Dominio_V'];
    $Licencia = $_POST['Lic_Cond'];
    $Venc_L = $_POST['Vencimiento_C'];
    $Seguro = $_POST['Seguro_V'];
    $Poliza = $_POST['Poliza_V'];
    $Venci_P = $_POST['Vencimiento_P'];
    $Tipo_V = $_POST['Tipo_V'];
    $Op_V = $_POST['Op_Tipo_V'];

    //Autorizacion
	$Aut_Perm = $_POST['Aut_Permanente'];

    //Novedades
	$Tipo_N = $_POST['Tipo_Novedad'];
	$Causa = $_POST['Causa_S'];
	$Desde = $_POST['Desde_S'];
	$Hasta = $_POST['Hasta_S'];
	$Descripcion = $_POST['Descripcion_N'];

	$Nombr_u = $_SESSION['Nombre'];

		$sql = "INSERT INTO ingreso_personas(Nombre, Apellido, Tipo, DNI, VencimientoDNI, Cert_Reincidencia, Vencimiento_R, Cert_BuenaConducta, VencimientoCERT, Hora_Ingreso, Hora_Egreso, Sector, Motivo, Fecha_Alta, Fecha_Baja, Foto)
		VALUES ('$Nombre_R', '$Apellido_R', '$Doc', '$Num_Doc', '$Fecha_H', '$Cert_Reinc', '$Venc_R', '$Cert_B', '$Vencimieto_C', '$Hora_I', '$Hora_E', '$Sector', '$Motivo', '$Fecha_A', '$Fecha_B', '$Destino')";

		$sql1 ="INSERT INTO vehiculo (Dueno, Modelo, Dominio, Licencia_Conducir, VencimientoLICENCIA, Seguro, Poliza, VencimientoSEGURO, Tipo_Vehiculo, Opcion_V)
		VALUES ('$Num_Doc', '$Model_V', '$Dominio_V', '$Licencia', '$Venc_L', '$Seguro', '$Poliza', '$Venci_P', '$Tipo_V', '$Op_V')";

		$sql2 ="INSERT INTO autorizacion (AutorizadoDNI, AutorizadoNombre, Autorizado_Permanente, Autorizado_Por)
		VALUES ('$Num_Doc', '$Nombre_R', '$Aut_Perm', '$Nombr_u')";

		$sql3 = "INSERT INTO novedades (Tipo_N, Causa, Desde, Hasta, Descripcion, Residente)
		VALUES ('$Tipo_N', '$Causa', '$Desde', '$Hasta', '$Descripcion', '$Num_Doc')";

		if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
			header("location: ../enlaces/Ingresos.php");
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}


	$conn->close();
?>
