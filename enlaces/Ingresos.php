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
		<link rel="stylesheet" type="text/css" href="../css/alertify.css">
		<link rel="stylesheet" type="text/css" href="../css/default.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<script language="javascript" src="../js/jquery-3.4.1.min.js"></script>
		<script src="../js/alertify.js"></script>
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

		<div class="Form_Posic3">
			<div class="card" style="width: 50rem;">
				<div class="card-body Fondo_Form">
				  	<h3>REGISTRO DE DATOS</h3>
					  <form enctype="multipart/form-data">
						<p>
							<div class="form-row">
							    <div class="col-md-12">
									<label>Inserte Imagen</label>
									<input type="file" id="Imag" class="form-control">
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
							    <div class="col-md-6">
						     	  	<label>Nombre/s</label>
							      	<input type="text" id="Nombre_R" class="form-control" placeholder="Nombre/s" required>
								  	<div class="invalid-feedback">
							      		Debe ingresar el Nombre
								  	</div>
								</div>
								<div class="col-md-6">
									<label>Apellido/s</label>
								    <input type="text" id="Apellido_R" class="form-control"  placeholder="Apellido/s" required>
								    <div class="invalid-feedback">
								    	Debe ingresar el Apellido
								    </div>
								</div>
							</div>
						</p>

						<div class="form-row">
						  	<div class="col-md-4">
								<label>Documento: Tipo</label>
							    <select id="Tipo_Doc" class="form-control" required>
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
							  	<label>Numero</label>
						      	<input type="text" id="Numero_Doc" class="form-control" required placeholder="Numero">
						      	<div class="invalid-feedback">
							    	Debe ingresar el numero de documento
								</div>
						    </div>
						    <div class="col-md-4">
							  	<label>Fecha</label>
						      	<input type="date" id="Fecha_H" class="form-control" required>
						      	<div class="invalid-feedback">
							    	Debe ingresar la fecha
								</div>
						  	</div>
						</div>

						<p>
							<div class="form-row">
								<div class="col-md-6">
								  	<label>Certificado de Reincidencia</label>
							      	<input type="date" id="Cert_R" class="form-control" required>
							      	<div class="invalid-feedback">
							    		Debe ingresar la fecha
									</div>
								</div>
								<div class="col-md-6">
									<label>Vencimiento</label>
								    <input type="date" id="Venci_C_R" class="form-control" required>
								    <div class="invalid-feedback">
							    		Debe ingresar la fecha de vencimiento
									</div>
								</div>
							</div>
						</p>
							<div class="form-row">
								<div class="col-md-6">
								  	<label>Certificado de Buena Conducta</label>
							     	<input type="date" id="Cert_B_C" class="form-control" required>
							     	<div class="invalid-feedback">
							    		Debe ingresar la fecha
									</div>
							  	</div>
							  	<div class="col-md-6">
									<label>Vencimiento</label>
								    <input type="date" id="Venci_C" class="form-control" required>
								    <div class="invalid-feedback">
							    		Debe ingresar la fecha de vencimiento
									</div>
								</div>
							</div>

						<p>
							<div class="form-row">
								<div class="col-md-2">
									<label>Hora de ingreso</label>
									<input type="time" id="Hora_I" class="form-control" required>
									<div class="invalid-feedback">
							    		Debe ingresar la hora de ingreso
									</div>
								</div>
								<div class="col-md-2">
									<label>Hora de Egreso</label>
									<input type="time" id="Hora_E" class="form-control" required>
									<div class="invalid-feedback">
							    		Debe ingresar la hora de egreso
									</div>
								</div>
								<div class="col-md-2">
									<label>Sector</label>
									<input type="text" id="Sector" class="form-control" placeholder="Sector" required>
									<div class="invalid-feedback">
							    		Debe ingresar el sector
									</div>
								</div>
								<div class="col-md-6">
									<label>Motivo</label>
									<input type="text" id="Motivo" class="form-control" placeholder="Motivo" required>
									<div class="invalid-feedback">
							    		Debe ingresar el motivo
									</div>
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="col-md-6">
									<label>Fecha de Alta</label>
									<input type="date" id="Fecha_A" class="form-control" required>
									<div class="invalid-feedback">
							    		Debe ingresar la fecha de alta
									</div>
								</div>
								<div class="col-md-6">
									<label>Fecha de Baja</label>
									<input type="date" id="Fecha_B" class="form-control" required>
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
						     	  	<label>Modelo</label>
							      	<input type="text" id="Modelo_V" class="form-control" placeholder="Modelo" required>
							      	<div class="invalid-feedback">
							    		Debe ingresar el modelo del vehiculo
									</div>
							    </div>
							    <div class="col-md-6">
								  	<label>Dominio</label>
							      	<input type="text" id="Dominio_V" class="form-control" placeholder="Dominio" required>
							      	<div class="invalid-feedback">
							    		Debe ingresar el dominio/patente del vehiculo
									</div>
							    </div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="col-md-6">
									<label>Licencia de Conducir</label>
							      	<input type="text" id="Lic_Cond" class="form-control" placeholder="Licencia de Conducir" required>
							      	<div class="invalid-feedback">
							    		Debe ingresar si tiene licencia de conducir
									</div>
							  	</div>
								<div class="col-md-6">
									<label>Vencimiento</label>
								    <input type="date" id="Vencimiento_C" class="form-control" required>
								    <div class="invalid-feedback">
							    		Debe ingresar el vencimiento de la licencia
									</div>
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="col-md-4">
							    	<label>Seguro</label>
									<input type="text" id="Seguro_V" class="form-control" placeholder="Seguro" required>
									<div class="invalid-feedback">
							    		Debe ingresar el seguro
									</div>
								</div>
								<div class="col-md-4">
									<label>Poliza</label>
								    <input type="text" id="Poliza_V" class="form-control" placeholder="Poliza" required>
								    <div class="invalid-feedback">
							    		Debe ingresar la poliza
									</div>
								</div>
								<div class="col-md-4">
									<label>Vencimiento</label>
									<input type="date" id="Vencimiento_P" class="form-control" required>
									<div class="invalid-feedback">
							    		Debe ingresar el vencimiento
									</div>
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="form-group col-md-6">
								  <label>Tipo de vehiculo</label>
					              <select id="Tipo" class="form-control">
					                <option selected value="0"></option>
					                <?php while($row = $resultado->fetch_assoc()) { ?>
					                  <option value="<?php echo $row['idTipo']; ?>"><?php echo $row['Tipo_N']; ?></option>
					                <?php } ?>
					              </select>
					            </div>
					            <div class="form-group col-md-6">
					            <label>Opcion</label>
					              <select id="Opcion" class="form-control"></select>
					            </div>
							</div>
						</p>

						<div class="form-row">
							<div class="col-md-4">
								<label>Autorizacion Permanente:</label>
							</div>
							<div class="custom-control custom-radio col-md-4">
								<input type="radio" class="custom-control-input" name="A_P" value="SI" id="Aut_Permanente" checked required>
    							<label class="custom-control-label"> SI </label>
							</div>
							<div class="custom-control custom-radio col-md-4">
								<input type="radio" class="custom-control-input" name="A_P" value="No" id="Aut_Permanente" required>
    							<label class="custom-control-label"> NO </label>
							</div>
						</div>

						<h3>NOVEDADES</h3>

						<p>
							<div class="form-row">
								<div class="col-md-6">
									<label>Tipo</label>
									<select id="Tipo_Novedad" class="form-control" required>
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
									<label>Causa</label>
									<input type="text" id="Causa_S" class="form-control" placeholder="Causa">
									<div class="invalid-feedback">
							    		Debe ingresar la causa
									</div>
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="col-md-6">
									<label>Desde</label>
								    <input type="date" id="Desde_S" class="form-control">
								    <div class="invalid-feedback">
							    		Debe ingresar desde cuando
									</div>
								</div>
								<div class="col-md-6">
									<label>Hasta</label>
								    <input type="date" id="Hasta_S" class="form-control">
								    <div class="invalid-feedback">
							    		Debe ingresar hasta cuando
									</div>
								</div>
							</div>
						</p>

						<p>
							<div class="form-row">
								<div class="col-md-12">
									<label>Descripcion:</label>
								    <textarea rows="4" cols="50" id="Descripcion_N" class="form-control">
									</textarea>
									<div class="invalid-feedback">
							    		Debe ingresar una descripcion
									</div>
								</div>
							</div>
						</p>

						<div class="form-row">
							<div class="col-md-6">
								<span class="btn btn-outline-light" id="Cargar">Cargar</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>



		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	    <script src="../js/bootstrap.min.js"></script>
	    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
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


		   $(document).ready(function(){
				$('#Cargar').click(function(){
					cadena= "imagen=" + $('#Imag').val() +  
							"&nombre=" + $('#Nombre_R').val() +
							"&apellido=" + $('#Apellido_R').val() +
							"&tipo_doc=" + $('#Tipo_Doc').val() + 
							"&num_doc=" + $('#Numero_Doc').val() + 
							"&fecha_h=" + $('#Fecha_H').val() + 
							"&cert_reinc=" + $('#Cert_R').val() +
							"&venc_r=" + $('#Venci_C_R').val() +
							"&cert_b=" + $('#Cert_B_C').val() +
							"&venci_c=" + $('#Venci_C').val() + 
							"&hora_i=" + $('#Hora_I').val() + 
							"&hora_e=" + $('#Hora_E').val() + 
							"&sector=" + $('#Sector').val() +
							"&motivo=" + $('#Motivo').val() +
							"&fecha_a=" + $('#Fecha_A').val() +
							"&fecha_b=" + $('#Fecha_B').val() + 
							//Datos del Vehiculo
							"&modelo_v=" + $('#Modelo_V').val() + 
							"&dominio=" + $('#Dominio_V').val() + 
							"&licencia=" + $('#Lic_Cond').val() +
							"&venc_l=" + $('#Vencimiento_C').val() +
							"&seguro=" + $('#Seguro_V').val() +
							"&poliza=" + $('#Poliza_V').val() + 
							"&venci_p=" + $('#Vencimiento_P').val() + 
							"&tipo=" + $('#Tipo').val() + 
							"&opcion=" + $('#Opcion').val() +
							//Autorizacion
							"&aut_perm=" + $('#Aut_Permanente').val() +
							//Novedades
							"&tipo_n=" + $('#Tipo_Novedad').val() +
							"&causa=" + $('#Causa_S').val() + 
							"&desde=" + $('#Desde_S').val() + 
							"&hasta=" + $('#Hasta_S').val() + 
							"&descripcion=" + $('#Descripcion_N').val(); 

					$.ajax({
						type:"POST",
						url:"../php/Registrar_U.php",
						data:cadena,
						success:function(r){
							if (r==2) {
								alertify.success("Usuario ya registrado");
							}
							else if(r==1){
								alertify.success("Datos cargados con exito");
							}else{
								alertify.error("Error al cargar: Se ha ingresado mal un campo..");
							}
						}
					});
					
				});
			});
	    </script>
	</body>
</html>
