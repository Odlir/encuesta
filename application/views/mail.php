<html>
<head>
	<title>Instrumento de Exploración Vocacional (IEV)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<div class="row">
							<div class="col-md-8 offset-md-2 justify-content-center">
								<img style="text-align: center" class="mx-auto d-block pb-3" src="<?php echo base_url() . 'assets/img/talentos/fac/' . $carrera[0]->imagen; ?>" alt="<?php echo $carrera[0]->descripcion; ?>">
								<p class="desc pb-3"><?php echo $carrera[0]->totaltexto; ?></p>
								<span class="pt-3 pb-3">Para mayor información de esta carrera, ingresa a:</span>	<br>
								<span class="pt-3"><a class="desc text-dark bkc" target="_blank" href="<?php echo $carrera[0]->url; ?>"><?php echo $carrera[0]->url; ?></a></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<div class="row">
							<div class="col-md-8 offset-md-2 justify-content-center">
								<img style="text-align: center" class="mx-auto d-block pb-3" src="<?php echo base_url() . 'assets/img/talentos/fac/' . $carrera1[0]->imagen; ?>" alt="<?php echo $carrera1[0]->descripcion; ?>">
								<p class="desc pb-3"><?php echo $carrera1[0]->totaltexto; ?></p>
								<span class="pt-3 pb-3">Para mayor información de esta carrera, ingresa a:</span>	<br>
								<span class="pt-3"><a class="pt-3 text-dark bkc" target="_blank" href="<?php echo $carrera1[0]->url; ?>"><?php echo $carrera1[0]->url; ?></a></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<div class="row">
							<div class="col-md-8 offset-md-2 justify-content-center">
								<img style="text-align: center" class="mx-auto d-block pb-3" src="<?php echo base_url() . 'assets/img/talentos/fac/' . $carrera2[0]->imagen; ?>" alt="<?php echo $carrera2[0]->descripcion; ?>">
								<p class="desc pb-3"><?php echo $carrera2[0]->totaltexto; ?></p>
								<span class="pt-3 pb-3">Para mayor información de esta carrera, ingresa a:</span>	<br>
								<span class="pt-3 pb-3"><a class="pt-3 pb-3 desc text-dark bkc" target="_blank" href="<?php echo $carrera2[0]->url; ?>"><?php echo $carrera2[0]->url; ?></a></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div style="font-weight:bold;" class="col-md-2 offset-md-1">
						<p>
							Prospección Pre Grado <br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UPC
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
