<?php

	require('Conexion.php');

	session_start();
	if(!$_SESSION){
		header("location: ../index.html");
	}

	$Foto = $_FILES["imagen"]["name"];
	$Ruta = $_FILES["imagen"]["tmp_name"];
	$Destino = "../img/".$Foto;
	copy($Ruta, $Destino);

  //Datos basicos del residente
	$Nombre_R = $_POST['nombre'];
	$Apellido_R = $_POST['apellido'];
	$Doc = $_POST['tipo_doc'];
	$Num_Doc = $_POST['num_doc'];
	$Fecha_H = $_POST['fecha_h'];
	$Cert_Reinc = $_POST['cert_reinc'];
	$Venc_R = $_POST["venc_r"];
  	$Cert_B = $_POST['cert_b'];
	$Vencimieto_C = $_POST['venci_c'];
	$Hora_I = $_POST['hora_i'];
	$Hora_E = $_POST['hora_e'];
	$Sector = $_POST['sector'];
	$Motivo = $_POST['motivo'];
 	$Fecha_A = $_POST['fecha_a'];
	$Fecha_B = $_POST['fecha_b'];
    
    //Datos del Vehiculo
    $Model_V= $_POST['modelo_v'];
    $Dominio_V = $_POST['dominio'];
    $Licencia = $_POST['licencia'];
    $Venc_L = $_POST['venc_l'];
    $Seguro = $_POST['seguro'];
    $Poliza = $_POST['poliza'];
    $Venci_P = $_POST['venci_p'];
    $Tipo_V = $_POST['tipo'];
    $Op_V = $_POST['opcion'];

    //Autorizacion
	$Aut_Perm = $_POST['aut_perm'];

    //Novedades
	$Tipo_N = $_POST['tipo_n'];
	$Causa = $_POST['causa'];
	$Desde = $_POST['desde'];
	$Hasta = $_POST['hasta'];
	$Descripcion = $_POST['descripcion'];

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
			echo 1;
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}


	$conn->close();
?>
