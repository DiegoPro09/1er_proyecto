<!DOCTYPE html>

<html>
	<head>
		<title>LOGIN</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/Estilo.css">
		<link rel="stylesheet" type="text/css" href="css/alertify.css">
		<link rel="stylesheet" type="text/css" href="css/default.css">
		<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/alertify.js"></script>
	</head>
	<body class="Fondo_Princ">
		<div class="Form_Posic">
			<div class="card" style="width: 18rem;">
			  <div class="card-body Fondo_Form">
					<h3>INGRESO</h3>
				  	<div class="form-group">
						<label>Introducir Email</label>
						<input type="email" class="form-control" id="Email" placeholder="Introducir Email" >
						<small id="emailHelp" class="form-text text-muted">nombre@ejemplo.com</small>
				  	</div>
				  	<div class="form-group">
						<label>Contraseña</label>
						<input type="password" class="form-control" id="Contrasena" placeholder="Contraseña" >
				  	</div>
					<div>
						<h5>
							<small class="form-text text-muted">Si no tiene un usuario <a href="enlaces/Registrar_U.php">Regístrese</a></small>
						</h5>
					</div>
					<div>
						<span class="Trans btn btn-primary" id="Enviar">Ingresar</span>
					</div>
			  	</div>
			</div>
		</div>





		<script>
			$(document).ready(function(){
				$('#Enviar').click(function(){
					if ($('#Email').val()=="") {
						alertify.alert("Debe ingresar el Email");
						return false;
					}
					else if ($('#Contrasena').val()=="") {
						alertify.alert("Debe ingresar la Contraseña");
						return false;
					}

					cadena="email=" + $('#Email').val() +
							"&contrasena=" + $('#Contrasena').val();

						$.ajax({
							type:"POST",
							url:"php/Login.php",
							data:cadena,
							success:function(r){
								if(r==1){
									window.location="enlaces/Ingresos.php";
								}else{
									alertify.error("Email o Contraseña incorrectos");
								}
							}
						});
				});
			});
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
	</body>
</html>
