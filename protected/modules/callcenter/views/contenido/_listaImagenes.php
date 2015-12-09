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
                <th>Tipo de Contenido</th>
                <th>Orden</th>
                <th>Contenido</th>
                <th>Contenido Móvil</th>
                <th>Editar Contenido</th>
                <th></th>
            </tr>
            
            <?php foreach ($listaImagenes as $dato): ?>
                <?php /*$dato->contenido= str_replace("<", "&lt;", $dato->contenido) ?>
                <?php $dato->contenido= str_replace(">", "&gt;", $dato->contenido) */?>
                <tr>
                    <td><?php echo $dato->nombre?> </td>
                    
                    <td><img class="img-responsive" width='200px' src="<?php echo Yii::app()->request->baseUrl . $dato->rutaImagen ?>" /></td>
                    <td><?php echo Yii::app()->params->callcenter['modulosConfigurados']['tiposContenidos'][$dato->tipoContenido] ?></td>
                    <td><?php echo $dato->orden ?></td>
                    <td><?php echo CHtml::link('Visualizar Contenido', '#', array('data-contenido-modal' =>  $dato->contenido , 'data-role' => "modal-contenido", 'class' => 'btn btn-primary', ($dato->contenido == null || empty($dato->contenido))? 'disabled':'' => 'true')); ?></td>
                    <td><?php echo CHtml::link('Visualizar Contenido Móvil', '#', array('data-contenido-modal' =>  $dato->contenidoMovil , 'data-role' => "modal-contenido", 'class' => 'btn btn-primary',($dato->contenidoMovil == null || empty($dato->contenidoMovil))? 'disabled':'' => 'true')); ?></td>
                    <td><?php echo CHtml::link('Editar Contenido', '#', array('data-modulo-imagen' =>  $dato->idBanner , 'data-role' => "modal-editar-imagen", 'class' => 'btn btn-success')); ?></td>
                    <td>
                        <?php echo CHtml::link('Eliminar', '#', array('data-modulo-imagen' => $dato->idBanner, 'data-role' => "eliminar-modulo-imagen", 'class' => 'btn btn-primary')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else:?>
    No se han añadido ubicaciones a el modulo configurado.
<?php endif;?>