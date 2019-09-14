<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>UPC | IEV</title>
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/logo_upc.png"/>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<style>
		.center-pag{
			justify-content: center;
			display: flex;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 style="font-size:20pt">UPC - IEVocacional</h1>
			</div>
		</div>
		<br />
		<div class="row d-flex">
			<div class="col-6">
				<form method="post" action="<?php echo base_url();?>index.php/evaluados/"">
					<div class="input-group mb-3">
						<input name="search" type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="button-addon2">
						<div class="input-group-append">
							<button class="btn btn-outline-primary" type="submit" id="button-addon2">Buscar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-6 align-self-center">
				<span>Cantidad de Alumnos: <?php echo $total;?></span>
			</div>
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead class="thead-light">
				<tr align="center">
					<th>ID</th>
					<th>Nombres</th>
					<th>DNI</th>
					<th>Celular</th>
					<th>Email</th>
					<th>Estado</th>
					<th>Acciones</th>
					<th>Colegio</th>
					<th>Genero</th>
					<th>Año Egreso</th>
					<th>Fecha Nac</th>
				</tr>
				</thead>
				<?php foreach ($data as $i => $d){ ?>
					<tr>
						<td><?php echo $d->id; ?></td>
						<td><?php echo $d->nombre. ' ' . $d->apellido; ?></td>
						<td><?php echo $d->dni; ?></td>
						<td><?php echo $d->celular; ?></td>
						<td><?php echo $d->email; ?></td>
						<td align="center">
							<img src="<?php echo base_url().'assets/img/' . (($d->sendmail==1)?'active.png':'inactive.png'); ?>" title="<?php echo (($d->sendmail==1)?'enviado':'no enviado');?>" alt="<?php echo (($d->sendmail==1)?'enviado':'no enviado');?>">
						</td>
						<td align="center">
							<a onclick='enviar(<?php echo $d->id;?>)' href="javascript:void(0);" title="Reenviar Correo"><i class="fa fa-envelope-o"></i></a>
							<a onclick='descargar(<?php echo $d->id;?>)' href="javascript:void(0);" title="Descargar PDF"><i class="fa fa-download"></i></a>
						</td>
						<td><?php echo $d->colegio; ?></td>
						<td><?php echo $d->sexo==1?'Masculino':'Femenino'; ?></td>
						<td><?php echo $d->year_egreso; ?></td>
						<td><?php echo date("d/m/Y", strtotime($d->fecha_nacimiento)); ?></td>
					</tr>
				<?php } ?>
			</table>
			<div class="col-12 center-pag"><?php echo $links;?></div>
		</div>
	</div>
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.js')?>"></script>
	<!--<script src="<?php /*echo base_url('assets/js/jquery.dataTables.min.js')*/?>"></script>
	<script src="<?php /*echo base_url('assets/js/dataTables.bootstrap.min.js')*/?>"></script>-->
	<script>
		function enviar(i) {
            var url = '<?php echo base_url(); ?>';
	        var path = url + "index.php/evaluados/reenviar/" + i;
            window.open(path, "_blank","width=1,height=1,menubars=no,resizable=no;");
        }

        function descargar(i) {
            var url = '<?php echo base_url(); ?>';
            var path = url + "index.php/evaluados/createpdf/" + i + '/D';
            window.open(path, "_blank","width=1,height=1,menubars=no,resizable=no;");
        }
	</script>
</body>
</html>
