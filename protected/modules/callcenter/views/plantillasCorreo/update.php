<?php 
  $this->breadcrumbs = array(
    'Plantillas de correo' => array('/callcenter/plantillasCorreo'),
    'Actualizar',
    $modelo->nombrePlantilla,
);
?>
<div class="row">
  <h3><?php echo $modelo->nombrePlantilla ?></h3>
</div>
<?php 
  $this->renderPartial('_form', array('modelo' => $modelo));
?>