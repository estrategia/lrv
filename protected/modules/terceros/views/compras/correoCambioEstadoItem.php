<p>El estado del producto <?php echo $item->descripcion; ?> ha cambiado a <?php echo $item->estadoTercero->nombre ?></p>
<?php if ($item->idEstadoItemTercero == 4): ?>
    <p>Operador logistico: <?php echo $item->operadorLogistico ?></p>
    <p>Numero de guía: <?php echo $item->numeroGuia ?></p>
<?php endif ?>