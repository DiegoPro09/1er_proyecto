<?php

  require ('../php/Conexion.php');

  session_start();
  if(!$_SESSION){
	  header("location: ../index.php");
  }

  $Query = "SELECT idTipo, Tipo_N FROM servicios ORDER BY idTipo ASC";
  $resultado = mysqli_query($conn, $Query);



?>


<!DOCTYPE html>
<html>
	<head>
		<title>INGRESOS</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/Estilo.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<script language="javascript" src="../js/jquery-3.4.1.min.js"></script>
		<script language="javascript">
	      $(document).ready(function(){
	        $("#Tipo").change(function () {

	          $('#Opcion').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

	          $("#Tipo option:selected").each(function () {
	            idTipo = $(this).val();
	            $.post("../php/getOpcion.php", { idTipo: idTipo }, function(data){
	              $("#Opcion").html(data);
	            });
	          });
	        })
	      });
	    </script>
	</head>
	<body class="Fondo_Ing">

		<!-- NAV BAR -->

		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark Menu_Top">
			<a class="navbar-brand" href="#"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="Ver_R.php">
							<button type="button" class="btn btn-outline-light boton">
								Ver Datos
							</button>
						</a>
					</li>
					<li class="nav-item dropdown">
						<div class="dropleft">
							<button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown" >
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="../php/User.php">Modificar Usuario</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="../php/Cerrar_Sesion.php">Cerrar Sesion</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</nav>

		<!-- Termina Nav -->
		<!-- Formulario Ingreso de Datos -->
		<!-- action="enviar()" method="post"-->

		<div class="Form_Posic3">
			<div class="card" style="width: 50rem;">
				<div class="card-body Fondo_Form">
				  	<h3>REGISTRO DE DATOS</h3>
				    <form action="../php/Registrar_U.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
						<p>
							<div class="form-row">
							    <div class="col-md-12">
									<label for="Ingrese_F">Inserte Imagen</label>
									<input type="file" name="Imagen" class="form-control">
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
							    <div class="col-md-6">
						     	  	<label for="validationCustom02">Nombre/s</label>
							      	<input type="text" name="Nombre_R" class="form-control" id="validationCustom01" placeholder="Nombre/s" required>
								  	<div class="invalid-feedback">
							      		Debe ingresar el Nombre
								  	</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustom03">Apellido/s</label>
								    <input type="text" name="Apellido_R" class="form-control" id="validationCustom02" placeholder="Apellido/s" required>
								    <div class="invalid-feedback">
								    	Debe ingresar el Apellido
								    </div>
								</div>
							</div>
						</p>

						<div class="form-row">
						  	<div class="col-md-4">
								<label for="validationCustom04">Documento: Tipo</label>
							    <select name="Tipo_Doc" class="form-control" id="validationCustom02" required>
								    <option></option>
							    	<option>DNI</option>
								    <option>CI</option>
								    <option>LE</option>
								    <option>LC</option>
							    </select>
							    <div class="invalid-feedback">
							    	Debe ingresar el tipo de documento
								</div>
							</div>
						  	<div class="col-md-4">
							  	<label for="validationCustom05">Numero</label>
						      	<input type="text" name="Numero_Doc" class="form-control" id="validationCustom05" required placeholder="Numero">
						      	<div class="invalid-feedback">
							    	Debe ingresar el numero de documento
								</div>
						    </div>
						    <div class="col-md-4">
							  	<label for="validationCustom06">Fecha</label>
						      	<input type="date" name="Fecha_H" class="form-control" id="validationCustom06" required>
						      	<div class="invalid-feedback">
							    	Debe ingresar la fecha
								</div>
						  	</div>
						</div>

						<p>
							<div class="form-row">
								<div class="col-md-6">
								  	<label for="validationCustom07">Certificado de Reincidencia</label>
							      	<input type="date" name="Cert_R" class="form-control" id="validationCustom07" required>
							      	<div class="invalid-feedback">
							    		Debe ingresar la fecha
									</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustom09">Vencimiento</label>
								    <input type="date" name="Venci_C_R" class="form-control" id="validationCustom09" required>
								    <div class="invalid-feedback">
							    		Debe ingresar la fecha de vencimiento
									</div>
								</div>
							</div>
						</p>
							<div class="form-row">
								<div class="col-md-6">
								  	<label for="validationCustom08">Certificado de Buena Conducta</label>
							     	<input type="date" name="Cert_B_C" class="form-control" id="validationCustom08" required>
							     	<div class="invalid-feedback">
							    		Debe ingresar la fecha
									</div>
							  	</div>
							  	<div class="col-md-6">
									<label for="validationCustom09">Vencimiento</label>
								    <input type="date" name="Venci_C" class="form-control" id="validationCustom09" required>
								    <div class="invalid-feedback">
							    		Debe ingresar la fecha de vencimiento
									</div>
								</div>
							</div>

						<p>
							<div class="form-row">
								<div class="col-md-2">
									<label for="validationCustom10">Hora de ingreso</label>
									<input type="time" name="Hora_I" class="form-control" id="validationCustom10" required>
									<div class="invalid-feedback">
							    		Debe ingresar la hora de ingreso
									</div>
								</div>
								<div class="col-md-2">
									<label for="validationCustom11">Hora de Egreso</label>
									<input type="time" name="Hora_E" class="form-control" id="validationCustom11" required>
									<div class="invalid-feedback">
							    		Debe ingresar la hora de egreso
									</div>
								</div>
								<div class="col-md-2">
									<label for="validationCustom12">Sector</label>
									<input type="text" name="Sector" class="form-control" id="validationCustom12" placeholder="Sector" required>
									<div class="invalid-feedback">
							    		Debe ingresar el sector
									</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustom13">Motivo</label>
									<input type="text" name="Motivo" class="form-control" id="validationCustom13" placeholder="Motivo" required>
									<div class="invalid-feedback">
							    		Debe ingresar el motivo
									</div>
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="col-md-6">
									<label for="validationCustom14">Fecha de Alta</label>
									<input type="date" name="Fecha_A" class="form-control" id="validationCustom14"required>
									<div class="invalid-feedback">
							    		Debe ingresar la fecha de alta
									</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustom15">Fecha de Baja</label>
									<input type="date" name="Fecha_B" class="form-control" id="validationCustom15" required>
									<div class="invalid-feedback">
							    		Debe ingresar la fecha de baja
									</div>
								</div>
							</div>
						</p>

						<h3>VEHICULO</h3>

					    <p>
							<div class="form-row">
							    <div class="col-md-6">
						     	  	<label for="validationCustom16">Modelo</label>
							      	<input type="text" name="Modelo_V" class="form-control" id="validationCustom16" placeholder="Modelo" required>
							      	<div class="invalid-feedback">
							    		Debe ingresar el modelo del vehiculo
									</div>
							    </div>
							    <div class="col-md-6">
								  	<label for="validationCustom17">Dominio</label>
							      	<input type="text" name="Dominio_V" class="form-control" id="validationCustom17" placeholder="Dominio" required>
							      	<div class="invalid-feedback">
							    		Debe ingresar el dominio/patente del vehiculo
									</div>
							    </div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="col-md-6">
									<label for="validationCustom18">Licencia de Conducir</label>
							      	<input type="text" name="Lic_Cond" class="form-control" id="validationCustom18" placeholder="Licencia de Conducir" required>
							      	<div class="invalid-feedback">
							    		Debe ingresar si tiene licencia de conducir
									</div>
							  	</div>
								<div class="col-md-6">
									<label for="validationCustom19">Vencimiento</label>
								    <input type="date" name="Vencimiento_C" class="form-control" id="validationCustom19" required>
								    <div class="invalid-feedback">
							    		Debe ingresar el vencimiento de la licencia
									</div>
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="col-md-4">
							    	<label for="validationCustom20">Seguro</label>
									<input type="text" name="Seguro_V" class="form-control" id="validationCustom20" placeholder="Seguro" required>
									<div class="invalid-feedback">
							    		Debe ingresar el seguro
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustom21">Poliza</label>
								    <input type="text" name="Poliza_V" class="form-control" id="validationCustom21" placeholder="Poliza" required>
								    <div class="invalid-feedback">
							    		Debe ingresar la poliza
									</div>
								</div>
								<div class="col-md-4">
									<label for="validationCustom22">Vencimiento</label>
									<input type="date" name="Vencimiento_P" class="form-control" id="validationCustom22" required>
									<div class="invalid-feedback">
							    		Debe ingresar el vencimiento
									</div>
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="form-group col-md-6">
								  <label for="validationCustom22">Tipo de vehiculo</label>
					              <select name="Tipo_V" id="Tipo" class="form-control">
					                <option selected value="0"></option>
					                <?php while($row = $resultado->fetch_assoc()) { ?>
					                  <option value="<?php echo $row['idTipo']; ?>"><?php echo $row['Tipo_N']; ?></option>
					                <?php } ?>
					              </select>
					            </div>
					            <div class="form-group col-md-6">
					            <label for="validationCustom22">Opcion</label>
					              <select name="Op_Tipo_V" id="Opcion" class="form-control"></select>
					            </div>
							</div>
						</p>

						<div class="form-row">
							<div class="col-md-4">
								<label>Autorizacion Permanente:</label>
							</div>
							<div class="custom-control custom-radio col-md-4">
								<input type="radio" class="custom-control-input" id="customControlValidation2" value="Si" name="Aut_Permanente" checked>
    							<label class="custom-control-label" for="customControlValidation2"> SI </label>
							</div>
							<div class="custom-control custom-radio col-md-4">
								<input type="radio" class="custom-control-input" id="customControlValidation3" value="No" name="Aut_Permanente" required>
    							<label class="custom-control-label" for="customControlValidation3"> NO </label>
							</div>
						</div>

						<h3>NOVEDADES</h3>

						<p>
							<div class="form-row">
								<div class="col-md-6">
									<label for="validationCustom26">Tipo</label>
									<select name="Tipo_Novedad" class="form-control" id="validationCustom26" required>
										<option></option>
										<option>Sancion</option>
										<option>Perimetral</option>
										<option>Interno</option>
										<option>No hay novedad</option>
									</select>
									<div class="invalid-feedback">
							    		Debe ingresar el tipo de novedad
									</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustom27">Causa</label>
									<input type="text" name="Causa_S" class="form-control" id="validationCustom27"placeholder="Causa">
									<div class="invalid-feedback">
							    		Debe ingresar la causa
									</div>
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="col-md-6">
									<label for="validationCustom28">Desde</label>
								    <input type="date" name="Desde_S" class="form-control" id="validationCustom28">
								    <div class="invalid-feedback">
							    		Debe ingresar desde cuando
									</div>
								</div>
								<div class="col-md-6">
									<label for="validationCustom29">Hasta</label>
								    <input type="date" name="Hasta_S" class="form-control" id="validationCustom29">
								    <div class="invalid-feedback">
							    		Debe ingresar hasta cuando
									</div>
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="col-md-12">
									<label for="validationCustom30">Descripcion:</label>
								    <textarea rows="4" cols="50" name="Descripcion_N" class="form-control" id="validationCustom30" placeholder="Agregue una descripcion">
									</textarea>
									<div class="invalid-feedback">
							    		Debe ingresar una descripcion
									</div>
								</div>
							</div>
						</p>

						<div class="form-row">
							<div class="col-md-6">
								<input value="Cargar" type="submit" class="btn btn-outline-light">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>



		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
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
	        $(window).scroll(function(){
	          if($(window).scrollTop()>200){
	            $('.navbar').addClass('navbar-scroll');
	          }
	          else{
	            $('.navbar').removeClass('navbar-scroll');
	          }
	        });
	       });

	      $(document).ready(function(){
	        $(window).scroll(function(){
	          if($(window).scrollTop()<250){
	            $('.navbar').addClass('navbar-scroll-up');
	          }
	          else{
	            $('.navbar').removeClass('navbar-scroll-up');
	          }
	        });
	       });
	    </script>
	</body>
</html>
