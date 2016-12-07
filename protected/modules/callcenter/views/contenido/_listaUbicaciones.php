<?php if(count($ubicaciones)>0):?>    
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <th>Ubicación</th>
                <th>División/Categoria</th>
                <th>Orden</th>
                <th></th>
            </tr>
            <?php foreach ($ubicaciones as $dato): ?>
                <tr>
                    <td><?php echo Yii::app()->params->callcenter['modulosConfigurados']['ubicacionModulos'][$dato->ubicacion] ?></td>
                    <td><?php foreach($dato->objUbicacionCategorias as $ubicacionCategoria):?>
                                  <?php echo $ubicacionCategoria->objCategoriaTienda->nombreCategoriaTienda ?>
                        <?php endforeach;?>
                    </td>
                    <td><?php echo $dato->orden ?></td>
                    <td>
                        <?php echo CHtml::link('Eliminar', '#', array('data-modulo-ubicacion' => $dato->idUbicacion, 'data-role' => "eliminar-modulo-ubicacion", 'class' => 'btn btn-primary')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else:?>
    No se han añadido ubicaciones a el modulo configurado.
<?php endif;?>