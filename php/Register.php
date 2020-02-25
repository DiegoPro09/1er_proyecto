<?php

	require('Conexion.php');

	$Nombre = $_POST['nombre'];
	$Apellido = $_POST['apellido'];
	$Email = $_POST['email'];
	$Contrasenia = $_POST['contrasena'];
	$Con_Verif = $_POST['verif_cont'];
	$Num_Verificacion = $_POST['num_verif'];

		if ($Contrasenia == $Con_Verif) {
			$Contrasena = sha1($Contrasenia);
			$sql = "INSERT INTO registro_usuario (Email, Nombre, Apellido, Num_Verificar, Contrasena)
			VALUES ('$Email', '$Nombre', '$Apellido', '$Num_Verificacion', '$Contrasena')";
			echo $result=mysqli_query($conn,$sql);
		}

	$conn->close();
?>
