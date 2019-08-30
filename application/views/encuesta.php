<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>UPC | Encuesta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../assets/img/logo_upc.png"/>
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
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

	<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" media="all">
	<style type="text/css">
		.list-group-item.active{
			background-color: #FC2D2D !important;
			border-color: #FC2D2D !important;
		}
		.list-group-item {
			background-color: #8C9090;
			font-weight: normal !important;
		}
		.list-group-item:hover {
			background-color: #FC2D2D !important;
			color: black !important;
		}
		.jcarousel li.active {
			width: 250px;
		}
		.galeria{
			margin: 0 auto;
		}
		.intro{
			height: 120px;
		}
		#nombre_carrera {
			border: none;
			background: none;
			width: 200px;
			font-weight: bold;
			font-size: 16px;
			text-align: center;
		}
		.jcarousel {
			width: 250px !important;
		}
		.jcarousel img {
			max-width: 240px !important;
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
								<span><?php echo 'Bienvenido '. $alumno;?></span>
							</div>
						</h1>
						<div class="derecha">
							<img src="<?php echo base_url();?>assets/img/banner_upc.jpg" style="height:auto; max-width:780px;" alt="logo">
						</div>
						<h2></h2>
					</header>
				</section>
				<div id="popup" style="display: none" title="Test de Talentos"></div>

				<div class="main supporting" id="zen-supporting" role="main">
					<div class="doble">
						<p>Agrupando <span class="rojo">mis carreras</span></p>
					</div>

					<div id="loading">
						<img id="loading-image" src="<?php echo base_url();?>assets/img/ajax-loader.gif" alt="Loading..." />
					</div>

					<div class="form" id="zen-form" role="article">
						<p class="aclaracion">Arrastra las tarjetas a los buzones de abajo seleccionando las carreras seg&uacute;n te identifiquen.</p>
						<div class="container mt-3">
							<div class="row">
								<div class="col-md-6">
									<div class="list-group">
										<a data-value="1" href="#" class="list-group-item list-group-item-action active">Administración en Hotelería y Turismo</a>
										<a data-value="3" href="#" class="list-group-item list-group-item-action">Artes Contemporáneas</a>
										<a data-value="5" href="#" class="list-group-item list-group-item-action">Ciencias Humanas</a>
										<a data-value="7" href="#" class="list-group-item list-group-item-action">Derecho</a>
										<a data-value="9" href="#" class="list-group-item list-group-item-action">Economía</a>
										<a data-value="11" href="#" class="list-group-item list-group-item-action">Ingeniería</a>
										<a data-value="13" href="#" class="list-group-item list-group-item-action">Psicología</a>
									</div>
								</div>
								<div class="col-md-6">
									<div class="list-group">
										<a data-value="2" href="#" class="list-group-item list-group-item-action">Arquitectura</a>
										<a data-value="4" href="#" class="list-group-item list-group-item-action">Ciencias de la Salud</a>
										<a data-value="6" href="#" class="list-group-item list-group-item-action">Comunicaciones</a>
										<a data-value="8" href="#" class="list-group-item list-group-item-action">Diseño</a>
										<a data-value="10" href="#" class="list-group-item list-group-item-action">Educación</a>
										<a data-value="12" href="#" class="list-group-item list-group-item-action">Negocios</a>
									</div>
								</div>
							</div>
						</div>
						<div class="continuar">
							<button onclick="continuar()" id="continuar" type="button" class="derecha btn btn-secondary" disabled="disabled">Continuar &rsaquo;&rsaquo;</button>
						</div>

						<div id="wrapper" class="jcarousel-wrapper">
							<div id="resumen">
								<input id="cantidad" readonly="readonly"/> Carreras por seleccionar
							</div>
							<div id="carousel" class="jcarousel">
								<ul id="galeria">

								</ul>
							</div>

							<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
							<a href="#" class="jcarousel-control-next">&rsaquo;</a>

						</div>

						<form id="formulario" method="post" accept-charset="utf-8" >
							<input type="hidden" name="id_alumno" value="<?php echo $id;?>"/>
							<input type="hidden" name="pagina" value="general" />
							<input type="hidden" name="mas" value="" />
							<input type="hidden" name="intermedio" value="" />
							<input type="hidden" name="menos" value="" />
							<input type="submit" value="Continuar" />
						</form>

						<div>
							<div id="mas" class="ui-widget-content ui-state-default buzones">
								<h4 class="buzones-header">(+) Carreras con mas Interes</h4>
								<div class="ui-widget-content">
									<ol id="max" class="connectedSortable">

									</ol>
								</div>
							</div>

							<div id="intermedio" class="ui-widget-content ui-state-default buzones">
								<h4 class="buzones-header">Carreras con Interes Intermedio</h4>
								<div class="ui-widget-content">
									<ol id="mid" class="connectedSortable">

									</ol>
								</div>

							</div>

							<div id="menos" class="ui-widget-content ui-state-default buzones">
								<h4 class="buzones-header">(-) Carrera con menos Interes</h4>
								<div class="ui-widget-content">
									<ol id="min" class="connectedSortable">

									</ol>
								</div>
							</div>
						</div>
					</div>
				</div>
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
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

	<script src="<?php echo base_url();?>assets/js/global.js"></script>
	<script type="text/javascript">

        $(function() {
            $('.list-group').on('click', 'a', function() {
                var i = $(this).data("value");
                $('.list-group-item.active').removeClass('active');
                $(this).addClass('active');
                getCarreras(i);
            });

            var jcarousel = $('.jcarousel');

            jcarousel
            // Bind _before_ carousel initialization
                .on('jcarousel:targetin', 'li', function() {
                    $(this).addClass('active');
                })
                .on('jcarousel:targetout', 'li', function() {
                    $(this).removeClass('active');
                })
                .jcarousel({
                    // center: true,
                    wrap: 'circular'
                });

            $('.jcarousel-control-prev')
                .jcarouselControl({
                    target: '-=1'
                });

            $('.jcarousel-control-next')
                .jcarouselControl({
                    target: '+=1'
                });

            $('.jcarousel-pagination')
                .on('jcarouselpagination:active', 'a', function() {
                    $(this).addClass('active');
                })
                .on('jcarouselpagination:inactive', 'a', function() {
                    $(this).removeClass('active');
                })
                .on('click', function(e) {
                    e.preventDefault();
                })
                .jcarouselPagination({
                    perPage: 1,
                    item: function(page) {
                        return '<a href="#' + page + '">' + page + '</a>';
                    }
                });

            $("#loading").hide();

			dragable();
			dropable();
            sortable();

            /*$('#continuar').click(function() {
                $("#formulario").submit();
                return false;
            });*/

            $('input[type="submit"]').hide();
            /*$('.continuar').hide();*/

        });

        function deleteImage( ) {
            var item = $('.jcarousel').jcarousel('target');
            item.remove();
            $('.jcarousel').jcarousel('reload');
            conteo();
        }

        function conteo() {
            count = $("#galeria li").length;
            $('#cantidad').val(count);
            if(conteoTotal() == 6){
                $('#continuar').attr('disabled', false);
            }else if(conteoTotal() == 10){
                Swal.fire(
                    '¡Buen Trabajo!',
                    '¡Has seleccionado la cantidad maxima de carreras!',
                    'success'
                ).then((res)=>{
                    $("#continuar").trigger("click");
                })
            }
        }
        
        function continuar() {
            var num = conteoTotal();
            url = "<?php echo base_url()."index.php/welcome/stepOne";?>";

            var talentosMas = [];
            var talentosIntermedio = [];
            var talentosMenos = [];
            $("#mas ol li").each(function() { talentosMas.push($(this).text()) });
            $("#intermedio ol li").each(function() { talentosIntermedio.push($(this).text()) });
            $("#menos ol li").each(function() { talentosMenos.push($(this).text()) });

            $( "input[name='mas']" ).val( talentosMas.join(','));
            $( "input[name='intermedio']" ).val( talentosIntermedio.join(','));
            $( "input[name='menos']" ).val( talentosMenos.join(','));
            var formData = $("#formulario").serializeArray();
            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                success: function(a) {
                    $('#container').html(a);
                }
            });

        }

        function conteoTotal() {
            count1 = $("#max li").length;
            count2 = $("#mid li").length;
            count3 = $("#min li").length;
            total = count1 + count2 + count3;
            return total;
        }

        function getCarreras(i) {
            $("#galeria").empty();
            url = "<?php echo base_url()."index.php/welcome/getCarreras/";?>"+i;
            $.ajax({
                type: "GET",
                url: url,
                success: function(a) {
                    $('.jcarousel ul').append(a);
                    var count = $("#galeria li").length;
                    $('#cantidad').val(count);
                    $('.jcarousel').jcarousel('reload');
                    dragable();
                    dropable();
                    sortable();
                }
            });
        }

        function dragable(){
            $( ".galeria" ).draggable({
                revert: "invalid", // when not dropped, the item will revert back to its initial position
                opacity:'0.5',
                helper: function(event, ui) {
                    return $(this).clone().appendTo('body').addClass('miniatura').show();
                },
                cursor: "move",
                start: function (event, ui) {
                    contents = $(this).attr('alt');
                },
                drag: function(event,ui){
                    ui.position.top += $(this).parent().scrollTop() + ($(this).parent().height()*0.30);
                    ui.position.left += $(this).parent().scrollLeft() + ($(this).parent().width()*0.20);
                }
            });
        }

        function dropable(){
            $( "#mas ol, #intermedio ol, #menos ol" ).droppable({
                accept: "img",
                hoverClass: "ui-state-hover",
                tolerance: "pointer",
                drop: function( event, ui ) {
                    $( "<li></li>" ).text( contents ).appendTo( this );
                    deleteImage();
                    deleteDuplicates();
                }
            });
        }

        function deleteDuplicates() {
            var seen = {};
            $('#mas li').each(function(){
                var txt = $(this).text();
                if (seen[txt])
                    $(this).remove();
                else
                    seen[txt] = true;
            });

            $('#intermedio li').each(function(){
                var txt = $(this).text();
                if (seen[txt])
                    $(this).remove();
                else
                    seen[txt] = true;
            });

            $('#menos li').each(function(){
                var txt = $(this).text();
                if (seen[txt])
                    $(this).remove();
                else
                    seen[txt] = true;
            });
        }

        function sortable(){
            $( "#mas ol, #intermedio ol, #menos ol" ).sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();
        }

        getCarreras(1);

	</script>
</body>
</html>
