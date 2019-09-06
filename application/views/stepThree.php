<style>
	.desc {
		font-size: 14px;
	}
	.bgc{
		background-color: white;
	}
	h3{
		text-align: center;
	}
	a:hover{
		color: black;
		text-decoration: none;
	}
	.ctn{
		text-align: center;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<h2>Carrera Recomendada:</h2>
			<div class="row pt-5">
				<div class="col-md-8 offset-md-2 bord pb-4">
					<h3 class="pb-3"><?php echo $carrera[0]->descripcion; ?></h3>
					<img class="mx-auto d-block pb-3" src="<?php echo base_url() . 'assets/img/talentos/fac/' . $carrera[0]->imagen; ?>" alt="<?php echo $carrera[0]->descripcion; ?>">
					<p class="desc pb-3"><?php echo $carrera[0]->totaltexto; ?></p>
					<span class="pt-3 pb-3"><a class="pt-3 pb-3 desc text-dark bkc" target="_blank" href="<?php echo $carrera[0]->url; ?>"><?php echo $carrera[0]->url; ?></a></span>
					<!--<p class="desc pt-3">Se ha enviado un reporte de este Test a tú correo electrónico registrado.</p>-->
				</div>
				<div>
					<form id="formulario_pdf" action="<?php echo base_url(); ?>index.php/welcome/createpdf/<?php echo $alu_id; ?>">
					</form>
				</div>
				<div class="col-md-12 justify-content-center ctn">
					<button onclick="descarga()" type="button" class="btn btn-danger">Descargar</button>
					<button onclick="terminar()" type="button" class="btn btn-danger">Terminar</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function descarga() {
        $("#formulario_pdf").submit();
    }

    function terminar() {
        window.location.href = '<?php echo base_url(); ?>';
    }
</script>
