<?php foreach ($carreras as $car){ ?>
<li>
	<img class="galeria" src="<?php echo base_url();?>assets/img/talentos/fac/<?php echo $car->imagen?>" alt="<?php echo $car->descripcion?>"/>
</li>
<?php } ?>
