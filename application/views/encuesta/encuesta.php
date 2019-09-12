<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>UPC | IEV</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/logo_upc.png"/>
	<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<style>
	</style>
</head>
<body>
	<div class="container">
		<h1 style="font-size:20pt">Instrumento de Exploración Vocacional UPC</h1>
		<h3>Evaluacion UPC</h3>
		<br />
		<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
		<br />
		<br />
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
			<tr>
				<th>nombre</th>
				<th>apellido</th>
				<th>dni</th>
				<th>celular</th>
				<th>email</th>
				<th>year_egreso</th>
			</tr>
			</thead>
			<tfoot>
			<tr>
				<th>nombre</th>
				<th>apellido</th>
				<th>dni</th>
				<th>celular</th>
				<th>email</th>
				<th>year_egreso</th>
			</tr>
			</tfoot>
		</table>
	</div>
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js')?>"></script>
	<script>
        $(document).ready(function() {
            $('#example').DataTable({
                "processing": true,
                "serverSide": true,
                "columns": [
                    {'data':'id',"visible": false},
                    {'data':'nombre','orderable': true},
                    {'data':'apellido','orderable': true},
                    {'data':'dni','orderable': true },
                    {'data':'celular','orderable': true},
                    {'data':'year_egreso','orderable': true}
                ],
                "ajax": "<?php echo base_url()."index.php/evaluados/getAlumnos";?>"
            });
        } );

        function reload_table()
        {
            table.ajax.reload(null,false);
        }
	</script>
</body>
</html>
