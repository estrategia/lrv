<?php if(count($categorias)>0):?>    
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <th>Categoria</th>
                <th></th>
            </tr>
            <?php foreach ($categorias as $dato): ?>
                <tr>
                    <td><?php echo $dato->objCategoria->nombreCategoriaTienda ?></td>
                    <td>
                        <?php echo CHtml::link('Eliminar', '#', array('data-promocion-categoria' => $dato->idCategoriaTienda,'data-promocion' => $dato->idPromocion , 'data-role' => "eliminar-categoria-promocion", 'class' => 'btn btn-primary')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else:?>
    No se han añadido categorias a el modulo configurado.
<?php endif;?>