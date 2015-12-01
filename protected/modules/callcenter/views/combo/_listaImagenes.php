<?php if(count($listaImagenes)>0):?>   
    <div class="modal fade" id="modal-contenido-visual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Contenido previo</h4>
          </div>
          <div class="modal-body" id='pre-contenido-modal'>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Orden</th>
                <th>Estado</th>
                <th></th>
                <th></th>
            </tr>
            
            <?php foreach ($listaImagenes as $dato): ?>
                <?php /*$dato->contenido= str_replace("<", "&lt;", $dato->contenido) ?>
                <?php $dato->contenido= str_replace(">", "&gt;", $dato->contenido) */?>
                <tr>
                    <td><?php echo $dato->nombreImagen ?> </td>
                    
                    <td><img class="img-responsive" width='200px' src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['combos'][$dato->tipoImagen] . $dato->rutaImagen ?>" /></td>
                    <td><?php echo Yii::app()->params->producto['tipoImagenSelect'][$dato->tipoImagen] ?></td>
                    <td><?php echo $dato->tituloImagen ?></td>
                    <td><?php echo $dato->descripcionImagen ?></td>
                    <td><?php echo $dato->ordenImagen ?></td>
                    <td><?php echo ($dato->estadoImagen == 0)?'Inactiva':'Activa'?></td>
                    <?php if($dato->estadoImagen == 1):?>
                    <td><?php echo CHtml::link('Inactivar', '#', array('data-imagen-combo' =>  $dato->idImagenCombo, 'data-role' => "estado-imagen-combo", 'class' => 'btn btn-primary')); ?></td>
                    <?php else:?>
                    <td><?php echo CHtml::link('Activar', '#', array('data-imagen-combo' =>  $dato->idImagenCombo, 'data-role' => "estado-imagen-combo", 'class' => 'btn btn-primary')); ?></td>
                    <?php endif;?>
                     <td>
                        <?php echo CHtml::link('Eliminar', '#', array('data-imagen-combo' => $dato->idImagenCombo, 'data-role' => "eliminar-imagen-combo", 'class' => 'btn btn-primary')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else:?>
    No se han añadido ubicaciones a el modulo configurado.
<?php endif;?>