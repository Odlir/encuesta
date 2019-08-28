<style type="text/css">
	.image_picker_image{
		width: 200px;
		height: 169px;
	}
</style>
<div class="page-wrapper">
	<section class="intro" id="zen-intro">
		<header role="banner">
			<h1>
				<div class="cabecera">
					<?php echo 'Bienvenido';?>
				</div>
			</h1>
			<div class="derecha">
				<img src="<?php echo base_url();?>assets/img/banner_upc.PNG" style="height:auto; max-width:980px;" alt="logo">
			</div>
			<h2></h2>
		</header>

	</section>
	<div id="popup" style="display: none" title="Test de Talentos"></div>
	<div class="main supporting" id="zen-supporting" role="main">
		<div class="doble">
			<p>Seleccionando <span class="rojo">mis carreras</span></p>
		</div>

		<div class="form" id="zen-form" role="article">
			<p class="aclaracion">Selecciona las tarjetas que mas te identifiquen.</p>

			<div class="continuar container">
				<div class="row">
					<button onclick="continuar1()" id="continuar" type="button" class="derecha btn btn-secondary" disabled="disabled">Continuar &rsaquo;&rsaquo;</button>
				</div>
			</div>

			<form id="formulario" method="post" accept-charset="utf-8" >
				<input type="hidden" name="pagina" value="desarrollados_mas" />
				<input type="hidden" name="mas" value="" />
				<input type="submit" value="Continuar" />
			</form>

			<div id="loading">
				<img id="loading-image" src="<?php echo base_url();?>assets/img/ajax-loader.gif" alt="Loading..." />
			</div>
			<div class="container">
				<select multiple="multiple" class="image-picker show-html" data-limit=<?php echo $total;?>>
					<?php foreach ($carreras as $row => $value): ?>
						<option data-img-src="<?php echo base_url();?>assets/img/talentos/fac/<?php echo $value->imagen; ?>" value="<?php echo $value->id; ?>" ></option>
					<?php endforeach ?>
				</select>
			</div>
			<div id="resumen">
				<div class="izquierda"><input id="cantidad" readonly="readonly"/> Seleccionado de <?php echo $total; ?></div>
				<div class="derecha">Total: <?php echo count($carreras); ?></div>
			</div>
		</div>

	</div>

</div>
<script type="text/javascript">

    $(document).ready(function() {
        // definiendo las propiedades del popup
        $("#popup").dialog({
            autoOpen: false,
            //height: 550,
            width: 650,
            modal: true,
            resizable: false,
            dialogClass: 'referencias-dialog',
            buttons : {
                "Ok" : function() {
                    $(this).dialog("close");
                }
            }
        });
    });

    $('#continuar').click(function() {
        $("#formulario").submit();
        return false;
    });


    $("select").imagepicker({
        hide_select : true,
        show_label  : true,
        show_image  : false
    })

    $( "select" ).change(function() {
        var count = $("select option:selected").length;
        $("#cantidad").val(count);
        if (count == <?php echo $total; ?>) {
            $.post('<?php echo site_url()."formulario/mostrar_ventana/"; ?>', {ventana:"modal",msg:'Has terminado de elegir tus <?php echo $total; ?> talentos m\u00E1s desarrollados. Si est\u00E1s seguro de tus respuestas, haz click en CONTINUAR.'},
                function(data){
                    $("#popup").html(data);
                    $("#popup").dialog( "open" );
                });
            $('.continuar').show();
        } else {
            $('.continuar').hide();
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

</script>
