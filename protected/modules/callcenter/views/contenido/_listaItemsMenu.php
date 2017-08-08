<?php if(count($listaItems)>0):?>   
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
                <th>T&iacute;tulo</th>
                <th>Icono Desktop</th>
                <th>Icono Móvil</th>
                <th>Enlace</th>
                <th>Enlace Móvil</th>
                <th></th>
            </tr>
            
            <?php foreach ($listaItems as $dato): ?>
                <?php /*$dato->contenido= str_replace("<", "&lt;", $dato->contenido) ?>
                <?php $dato->contenido= str_replace(">", "&gt;", $dato->contenido) */?>
                <tr>
                    <td><?php echo $dato->titulo?> </td>
                    
                    <td><img class="img-responsive" width='200px' src="<?php echo Yii::app()->request->baseUrl . $dato->iconoDesktop ?>" /></td>
                    <td><?php if(!empty($dato->iconoMovil)):?><img class="img-responsive" width='200px' src="<?php echo Yii::app()->request->baseUrl . $dato->iconoMovil ?>" /><?php endif;?></td>
                    <td><?php echo $dato->enlace ?></td>
                    <td><?php echo $dato->enlaceMovil ?></td>
                    <td>
                        <?php echo CHtml::link('Eliminar', '#', array('data-item' => $dato->idItem, 'data-role' => "eliminar-item-menu", 'class' => 'btn btn-primary')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else:?>
    No se han añadido ubicaciones a el modulo configurado.
<?php endif;?>