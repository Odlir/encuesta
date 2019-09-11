<style type="text/css">
	.image_picker_image{
		width: 185px;
		height: 169px;
	}
	ul.thumbnails.image_picker_selector {
		max-height: 100% !important;
	}
	.selects{
		display: flex;
		flex-wrap: wrap;
	}
	.page-wrapper{
		width: auto;
	}
	@media all and (min-width: 576px) {
		.image_picker_image {
			width: 120px;
			height: 116px;
		}
	}
	@media all and (max-width: 480px) {
		.image_picker_image {
			width: 110px;
			height: 110px;
		}
	}
</style>
<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12" >
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<section class="intro" id="zen-intro">
								<header class="head" role="banner">
									<h1>
										<div class="cabecera">
											<?php echo 'Bienvenido(a): '.$alumno;?>
										</div>
									</h1>
									<div class="derecha">
										<img src="<?php echo base_url();?>assets/img/banner_upc.jpg" style="height:auto; max-width:100%;" alt="logo">
									</div>
									<h2></h2>
								</header>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="main supporting" id="zen-supporting" role="main">
					<div class="doble">
						<p>Selecciona 5 carreras que más te identifiquen.</p>
					</div>

					<div class="form" id="zen-form" role="article">

						<div class="container pb-2">
							<div class="row">
								<div class="col-md-3 offset-md-9">
									<button onclick="continuar1()" id="continuar" type="button" class="derecha btn btn-secondary" disabled="disabled">Continuar &rsaquo;&rsaquo;</button>
								</div>
							</div>
						</div>

						<form id="formulario" method="post" accept-charset="utf-8" >
							<input type="hidden" name="id_alumno" id="id_alumno" value="<?php echo $id;?>" />
							<input type="hidden" name="pagina" value="desarrollados_mas" />
							<input type="hidden" name="mas" value="" />
							<input type="submit" value="Continuar" />
						</form>
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 selects">
									<select multiple="multiple" class="image-picker show-html" data-limit=<?php echo $total;?>>
										<?php foreach ($carreras as $row => $value): ?>
											<option data-img-src="<?php echo base_url();?>assets/img/talentos/fac/<?php echo $value->imagen; ?>" value="<?php echo $value->id; ?>" ></option>
										<?php endforeach ?>
									</select>
									<div id="resumen" class="container">
										<div class="izquierda"><input id="cantidad" readonly="readonly"/> Seleccionado de 5</div>
										<div class="derecha">Total: <?php echo count($carreras); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    $("select").imagepicker({
        hide_select : true,
        show_label  : true,
        show_image  : false
    });

    $( "select" ).change(function() {
        var count = $("select option:selected").length;
        $("#cantidad").val(count);
        if (count == 5) {
            Swal.fire(
                '¡Bien hecho, has seleccionado 5 carreras que más te identifican!',
                'Ahora presiona el boton Continuar.',
                'success'
            );
            $('#continuar').attr('disabled', false);
        } else {
            $('#continuar').attr('disabled', true);
        }
    })
        .trigger( "change" );

    $(function() {
        $("#loading").hide();
        $("form").submit(function (event ) {

            $("select").data('picker');

            $( "input[name='mas']" ).val( $("select").data('picker').selected_values());

            event.preventDefault();
            $("#loading").show();
            $.post('formulario/revisar',$(this).serialize(),function(resp){
                $("#loading").hide();
                $('#container').html(resp);
            });

        });

        $('input[type="submit"]').hide();

    });

    function continuar1() {
        var data = $("select").data('picker').selected_values();
        var id = $("#id_alumno").val();
        url = "<?php echo base_url()."index.php/welcome/saveOptions";?>";
        $.post(url, {'data[]': data, 'alumno':id}, function(resp){
            url = "<?php echo base_url()."index.php/welcome/stepTwo/";?>"+id;
            window.location.href = url;
        });
    }

</script>
