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
<div class="container pb-4">
	<div class="row">
		<div class="col-md-12 text-right ctn">
			<button onclick="descarga()" type="button" class="btn btn-danger">Descargar</button>
			<button onclick="terminar()" type="button" class="btn btn-danger">Terminar</button>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="alert alert-info" role="alert">
			Se ha enviado un reporte de este Test a tú correo electrónico registrado.
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<h2>Carreras recomendadas:</h2>
			<div class="row pt-5">
				<div class="col-md-8 offset-md-2 bord pb-4">
					<!--<h3 class="pb-3"><?php /*echo $carrera[0]->descripcion; */?></h3>-->
					<img class="mx-auto d-block pb-3" src="<?php echo base_url() . 'assets/img/talentos/fac/' . $carrera[0]->imagen; ?>" alt="<?php echo $carrera[0]->descripcion; ?>">
					<p class="desc pb-3"><?php echo $carrera[0]->totaltexto; ?></p>
					<span class="pt-3 pb-3"><a class="pt-3 pb-3 desc text-dark bkc" target="_blank" href="<?php echo $carrera[0]->url; ?>"><?php echo $carrera[0]->url; ?></a></span>
				</div>
				<div>
					<form id="formulario_pdf" action="<?php echo base_url(); ?>index.php/welcome/createpdf/<?php echo $alu_id; ?>">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container pb-4">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="row pt-5">
				<div class="col-md-8 offset-md-2 bord pb-4">
					<!--<h3 class="pb-3"><?php /*echo $carrera1[0]->descripcion; */?></h3>-->
					<img class="mx-auto d-block pb-3" src="<?php echo base_url() . 'assets/img/talentos/fac/' . $carrera1[0]->imagen; ?>" alt="<?php echo $carrera1[0]->descripcion; ?>">
					<p class="desc pb-3"><?php echo $carrera1[0]->totaltexto; ?></p>
					<span class="pt-3 pb-3"><a class="pt-3 pb-3 desc text-dark bkc" target="_blank" href="<?php echo $carrera1[0]->url; ?>"><?php echo $carrera1[0]->url; ?></a></span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="row pt-5">
				<div class="col-md-8 offset-md-2 bord pb-4">
					<!--<h3 class="pb-3"><?php /*echo $carrera2[0]->descripcion; */?></h3>-->
					<img class="mx-auto d-block pb-3" src="<?php echo base_url() . 'assets/img/talentos/fac/' . $carrera2[0]->imagen; ?>" alt="<?php echo $carrera2[0]->descripcion; ?>">
					<p class="desc pb-3"><?php echo $carrera2[0]->totaltexto; ?></p>
					<span class="pt-3 pb-3"><a class="pt-3 pb-3 desc text-dark bkc" target="_blank" href="<?php echo $carrera2[0]->url; ?>"><?php echo $carrera2[0]->url; ?></a></span>
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
