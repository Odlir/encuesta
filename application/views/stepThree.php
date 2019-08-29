<style>
	.desc {
		font-size: 14px;
	}
	.bord{
		border: red 1px solid;
		border-radius: 15px;
		border-width: 1px;
	}
	h3{
		text-align: center;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<h2>Carrera Recomendada:</h2>
			<div class="row pt-5">
				<div class="col-md-8 offset-md-2 bord">
					<h3><?php echo $carrera[0]->descripcion; ?></h3>
					<img class="mx-auto d-block" src="<?php echo base_url() . 'assets/img/talentos/fac/' . $carrera[0]->imagen; ?>" alt="<?php echo $carrera[0]->descripcion; ?>">
					<p class="desc"><?php echo $carrera[0]->texto; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>

