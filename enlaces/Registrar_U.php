<!DOCTYPE html>
<html>
	<head>
		<title>REGISTER</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/Estilo.css">
		<link rel="stylesheet" type="text/css" href="../css/alertify.css">
		<link rel="stylesheet" type="text/css" href="../css/default.css">
		<link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="../js/alertify.js"></script>

	</head>
	<body class="Fondo_Reg">
		<div class="Form_Posic2">
			<div class="card" style="width: 40rem;">
			  	<div class="card-body Fondo_Form">
					<h3>Registro</h3>
					<p>
						<div class="form-row">
							<div class="col">
								<label>Nombre/s</label>
								<input type="text" class="form-control input-sm" id="Nombre_RU" name="">
							</div>
							<div class="col">
								<label>Apellido</label>
								<input type="text" class="form-control input-sm" id="Apellido_RU" name="">
							</div>
						</div>
					</p>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control input-sm" id="Email_RU" name="">
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Contraseña</label>
							<input type="password" class="form-control input-sm" id="Contrasena_RU" name="">
						</div>
						<div class="form-group col-md-6">
							<label>Verificar Contraseña</label>
							<input type="password" class="form-control input-sm" id="Verif_Cont_RU" name="">
						</div>
					</div>
					<div class="form-group">
						<label>Numero de verificacion</label>
						<input type="password" class="form-control input-sm" id="Num_Ver_RU" name="">
					</div>
					<span class="Trans btn btn-primary" id="Registrar_N">Registrar</span>
					<a href="../Index.php">
						<button type="button" class="Trans btn btn-primary">Volver atrás</button>
					</a>
			  	</div>
			</div>
		</div>





		<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(
				function()
				{
				  'use strict';
				  window.addEventListener
				  (
				  	'load', function()
					  {
					    // Fetch all the forms we want to apply custom Bootstrap validation styles to
					    var forms = document.getElementsByClassName('needs-validation');
					    // Loop over them and prevent submission
					    var validation = Array.prototype.filter.call
					    (
					    	forms, function(form)
						    {
						      form.addEventListener
						      (
						      	'submit', function(event)
							      {
							        if (form.checkValidity() === false)
							        {
							          event.preventDefault();
							          event.stopPropagation();
							        }
							        form.classList.add('was-validated');
							      },
							      false
						      );
						    }
					    );
					  },
					  false
				  );
				}
			)
			();
		</script>

		<script>
			$(document).ready(function(){
				$('#Registrar_N').click(function(){
					if ($('#Nombre_RU').val()=="") {
						alertify.alert("Campo vacio");
						return false;
					}
					else{
						cadena="nombre=" + $('#Nombre_RU').val() +
								"&apellido=" + $('#Apellido_RU').val() +
								"&email=" + $('#Email_RU').val() + 
								"&verif_cont=" + $('#Verif_Cont_RU').val() + 
								"&num_verif=" + $('#Num_Ver_RU').val() + 
								"&contrasena=" + $('#Contrasena_RU').val();

						$.ajax({
							type:"POST",
							url:"../php/Register.php",
							data:cadena,
							success:function(r){
								if(r==1){
									alertify.success("Usuario registrado con exito");
								}else{
									alertify.error("Usuario ya registrado");
								}
							}
						});
					}
				});
			});
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
