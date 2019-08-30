<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>UPC | Encuesta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/logo_upc.png"/>
	<link href="<?php echo base_url();?>assets/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/select2.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url();?>assets/css/daterangepicker.css" rel="stylesheet" media="all">
	<!--iop-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/preload.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/css.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/image-picker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jcarousel.responsive.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery-ui.css">

	<!--iop-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slick.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slick-theme.css"/>

	<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" media="all">
	<style type="text/css">
		.intro{
			height: 120px;
		}
	</style>
</head>
<body>
<div class="page-wrapper p-t-100 p-b-100 font-robo" style="padding-top: 0">
	<div class="wrapper wrapper--w680">
		<div id="container" class="card card-1">
			<div class="page-wrapper">
				<section class="intro" id="zen-intro">
					<header role="banner">
						<h1>
							<div class="cabecera">
								<?php echo 'Bienvenido '.$alumno;?>
							</div>
						</h1>
						<div class="derecha">
							<img src="<?php echo base_url();?>assets/img/banner_upc.jpg" style="height:auto; max-width:780px;" alt="logo">
						</div>
						<h2></h2>
					</header>

				</section>
				<form id="respuestas">
				<div class="main supporting carreras_final" id="zen-supporting" role="main">
					<?php foreach ($carreras as $i => $value): ?>
						<div class="container">
							<div class="doble">
								<p><?php echo $value->descripcion; ?></p>
								<input type="hidden" id="<?php echo $i; ?>" value="<?php echo $value->descripcion . '_' . $value->carrera_id; ?>">
							</div>
							<div class="form" id="carreras_final" role="article">
								<div class="container pb-2">
									<div class="row">
										<div class="col-md-3">
											<img src="<?php echo base_url();?>assets/img/talentos/fac/<?php echo $value->imagen; ?>" alt="<?php echo $value->descripcion; ?>">
										</div>
										<div class="col-md-9">
											<p><?php echo $value->texto; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<p>A Continuación, responde estas preguntas en relación a la carreta que figura arriba.</p>
										</div>
										<div class="col-md-12 pb-2">
											<p>Puntúa del 1 al 5:</p>
										</div>
									</div>
									<?php foreach ($preguntas as $j => $val): ?>
									<div class="row pb-3 question">
										<div class="col-md-12 pb-2">
											<p><?php echo $val->descripcion?></p>
										</div>
										<?php for ($x = 0; $x <= 4; $x++):?>
											<div class="col-md-1">
												<div class="custom-control custom-radio">
													<input value="<?php echo $x+1; ?>" type="radio" id="<?php echo 'customRadio_'.$i.'_'.$j.'_'.$x; ?>" name="<?php echo 'customRadio_'.$i.'_'.$j; ?>" class="custom-control-input">
													<label class="custom-control-label" for="<?php echo 'customRadio_'.$i.'_'.$j.'_'.$x; ?>"><?php echo $x+1; ?></label>
												</div>
											</div>
										<?php endfor;?>
									</div>
									<?php endforeach; ?>
									<div class="row">
										<div class="col-md-3 offset-md-9">
											<button onclick="next()" id="continuar" type="button" class="derecha btn btn-secondary">Continuar &rsaquo;&rsaquo;</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
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
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/image-picker.js"></script>
<!--ijn nin-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/slick.min.js"></script>

<script src="<?php echo base_url();?>assets/js/global.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
    });
    $('#zen-supporting').slick({
        slidesToShow: 1,
    });
    function next() {
        if(checkRadios()){
			var values = getValues();
			var con = 0;
            var sum = [];
            var sumTot = 0;
			values.forEach((a, i)=>{
			    if(i == 4){
                    con++;
                    sumTot = 0;
			    }else if(i == 8){
					con++;
                    sumTot = 0;
			    }
                sumTot += Number(a.value);
                sum[con] = sumTot;
			});
			carrerasValues = [];
			sum.forEach((a,ind) => {
			    d = {'carrera':$('#'+ind).val(), 'val':a};
                carrerasValues[ind] = d;
			});

	        const max = carrerasValues.reduce(function(prev, current) {
                return (prev.val > current.val) ? prev : current
            });
	        console.log('final', max);
            url = "<?php echo base_url()."index.php/welcome/stepThree";?>";
            $.post(url, max, function(resp){
                $('#zen-supporting').html(resp);
            });
        }
        $('#zen-supporting').slick('slickNext');
    }

    function checkRadios(){
        var check = true;
        $("input:radio").each(function(){
            var name = $(this).attr("name");
            if($("input:radio[name="+name+"]:checked").length == 0){
                check = false;
            }
        });
        return check;
    }

    function getValues(){
        return $("#respuestas").serializeArray();
    }
</script>
</body>
</html>

