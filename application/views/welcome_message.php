<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>UPC | Encuesta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="./assets/img/logo_upc.png"/>
	<link href="assets/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link href="assets/css/select2.min.css" rel="stylesheet" media="all">
	<link href="assets/css/daterangepicker.css" rel="stylesheet" media="all">
	<!--iop-->
	<link rel="stylesheet" type="text/css" href="assets/css/preload.css">
	<link rel="stylesheet" type="text/css" href="assets/css/css.css">
	<link rel="stylesheet" type="text/css" href="assets/css/image-picker.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jcarousel.responsive.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">

	<!--iop-->

	<link href="assets/css/main.css" rel="stylesheet" media="all">
	<style type="text/css">
	</style>
</head>
<body>
	<div class="page-wrapper p-t-100 p-b-100 font-robo">
		<div class="wrapper wrapper--w680">
			<div id="container" class="card card-1">
				<div class="card-heading">
					<span class="contact100-form-title">
						<img src="https://www.upc.edu.pe/static/img/logo_upc_red.png" alt="">
					</span>
					<span class="contact100-form-title">
						Evento de Carreras UPC
					</span>
				</div>
				<div class="card-body">
					<form id="form_reg" method="POST">
						<div class="input-group">
							<input class="input--style-1" type="text" placeholder="NOMBRES" name="nombres">
						</div>
						<div class="input-group">
							<input class="input--style-1" type="text" placeholder="APELLIDOS" name="apellidos">
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1 js-datepicker" type="text" placeholder="FECHA DE NACIMIENTO" name="fecha_nacimiento">
									<i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<div class="rs-select2 js-select-simple select--no-search">
										<select name="genero">
											<option disabled="disabled" selected="selected">GENERO</option>
											<option value="1">Masculino</option>
											<option value="2">Femenino</option>
										</select>
										<div class="select-dropdown"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<div class="rs-select2 js-select-simple select--no-search">
										<select name="colegio">
											<option disabled="disabled" selected="selected">COLEGIO</option>
											<option></option>
											<option value="1">Innova Ate</option>
											<option value="2">Innova Santa Clara</option>
										</select>
										<div class="select-dropdown"></div>
									</div>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<div class="rs-select2 js-select-simple select--no-search">
										<select name="distrito_col">
											<option disabled="disabled" selected="selected">DISTRITO COLEGIO</option>
											<option value="0">Ate</option>
											<option value="1">Santa Anita</option>
											<option value="2">La Molina</option>
										</select>
										<div class="select-dropdown"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<div class="rs-select2 js-select-simple select--no-search">
										<select name="egreso">
											<option disabled="disabled" selected="selected">AÑO DE EGRESO</option>
											<option value="0">2019</option>
											<option value="1">2018</option>
											<option value="2">2017</option>
										</select>
										<div class="select-dropdown"></div>
									</div>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1" type="number" placeholder="DNI" name="dni">
								</div>
							</div>
						</div>
						<div class="input-group">
							<input class="input--style-1" type="text" placeholder="DOMICILIO" name="domicilio">
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1" type="number" placeholder="CELULAR" name="celular">
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1" type="number" placeholder="CELULAR DEL APODERADO" name="cel_apoderado">
								</div>
							</div>
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1" type="email" placeholder="EMAIL" name="email">
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1" type="number" placeholder="TELEFONO FIJO" name="tel_fijo">
								</div>
							</div>
						</div>
						<div class="p-t-20">
							<a href="index.php/welcome/validar" id="registro" class="btn btn--radius btn--green" ">Iniciar test</a>
						</div>
						<img id="load" class="oculto" src="assets/img/ajax-loader.gif" alt="Loading..." />
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/daterangepicker.js"></script>
	<!--ijn nin-->

	<script src="assets/js/global.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $("#registro").click(function(ev){
                $("#load").show();
                var page = $(this).attr('href');
                $.ajax({
                    type: "POST",
                    url: page,
	                data: $('#form_reg').serialize(),
                    success: function(a) {
                        $("#load").hide();
                        var res = JSON.parse(a);
                        url_next = "<?php echo base_url()."index.php/welcome/test/";?>";
                        console.log('odlir', res.id);
                        if (res.result > 0){
                            window.location.href = url_next + res.id;
                        }
                    }
                });

                return false;
            });
        });

	</script>
</body>
</html>
