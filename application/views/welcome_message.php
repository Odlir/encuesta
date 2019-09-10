<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>UPC | Encuesta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/logo_upc.png"/>
	<link href="<?php echo base_url();?>assets/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url();?>assets/css/daterangepicker.css" rel="stylesheet" media="all">
	<!--iop-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<!--iop-->
	<link href="<?php echo base_url();?>assets/css/main.css?v1.0.0" rel="stylesheet" media="all">
	<style>
		.bot{
			display: flex;
			justify-content: center;
			text-align: center;
		}
		#registro {
			width: 13em;
		}
	</style>
</head>
<body>
	<div class="page-wrapper p-b-100 font-robo">
		<div class="wrapper wrapper--w680">
			<div id="container" class="card card-1">
				<div class="card-heading">
					<span class="contact100-form-title">
						<img src="https://www.upc.edu.pe/static/img/logo_upc_red.png" alt="">
					</span>
					<span class="contact100-form-title">
						Instrumento de Exploración Vocacional (IEV)
					</span>
				</div>
				<div class="card-body">
					<form id="form_reg" method="POST">
						<div class="input-group">
							<input class="input--style-1 required" type="text" maxlength="50" placeholder="NOMBRES*" name="nombres" required>
						</div>
						<div class="input-group">
							<input class="input--style-1 required" type="text" maxlength="50" placeholder="APELLIDOS*" name="apellidos" required>
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1 js-datepicker required" type="text" placeholder="FECHA DE NACIMIENTO*" name="fecha_nacimiento" readonly>
									<i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<div class="rs-select2 js-select-simple select--no-search">
										<select name="genero" class="required" required>
											<option value="0" disabled="disabled" selected="selected">GENERO*</option>
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
									<input maxlength="50" class="input--style-1 required" type="text" placeholder="COLEGIO*" name="colegio" required>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<div class="rs-select2 js-select-simple1 select--no-search">
										<select name="distrito_col" id="distrito_col" class="required" required>
											<option value="">SELECCIONAR DISTRITO</option>
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
										<select name="egreso" class="required" required>
											<option disabled="disabled" selected="selected">AÑO DE EGRESO*</option>
											<?php foreach ($years as $y):?>
												<option value="<?php echo $y;?>"><?php echo $y;?></option>
											<?php endforeach; ?>
										</select>
										<div class="select-dropdown"></div>
									</div>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1 numero required" type="number" placeholder="DNI*" name="dni" required>
								</div>
							</div>
						</div>
						<div class="input-group">
							<input class="input--style-1 required" maxlength="80" type="text" placeholder="DOMICILIO*" name="domicilio" required>
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1 numero required" type="number" placeholder="CELULAR*" name="celular" required>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1 numero required" type="number" placeholder="CELULAR DEL APODERADO*" name="cel_apoderado" required>
								</div>
							</div>
						</div>
						<div class="row row-space">
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1 required" maxlength="50" type="email" placeholder="EMAIL*" name="email" required>
								</div>
							</div>
							<div class="col-2">
								<div class="input-group">
									<input class="input--style-1 numero required" type="number" placeholder="TELEFONO FIJO*" name="tel_fijo" required>
								</div>
							</div>
						</div>
						<div class="p-t-20 bot">
							<a href="<?php echo base_url();?>index.php/welcome/validar" id="registro" class="btn btn--radius btn--green">Iniciar test</a>
						</div>
						<img id="load" class="oculto" src="<?php echo base_url();?>assets/img/ajax-loader.gif" alt="Loading..." />
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/daterangepicker.js"></script>
	<!--ijn nin-->

	<script src="<?php echo base_url();?>assets/js/global.js"></script>
	<script>
        $(document).ready(function() {
            getUbigeo();
            $("#registro").click(function(ev){
	            if (!check_required_inputs()){
                    Swal.fire(
                        '',
                        '¡Por favor, completar todos los campos!'
                    );
	                return false;
	            }
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

            $('.numero').keydown(function(event){
                /*if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
                    event.preventDefault();
                }*/
            });
        });
        
        function check_required_inputs() {
            var res = true;
            $('.required').each(function(){
                if( $(this).val() == "" ){
                    res = false;
                }
            });
            return res;
        }

        function getUbigeo() {
            $.ajax({
                type: "GET",
                url: '<?php echo base_url() . "index.php/welcome/getUbigeo";?>',
                success: (data) => {
                    var data = JSON.parse(data);
                    data.forEach((value) => {
                        $('#distrito_col')
                            .append($("<option></option>")
                                .attr("value", value.id)
                                .text(value.text));
                    });
                }
            });
            $("#distrito_col").select2();
        }
	</script>
</body>
</html>
