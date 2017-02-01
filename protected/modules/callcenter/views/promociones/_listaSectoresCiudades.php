<?php if(count($sectores)>0):?>    
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <th>Ciudad</th>
                <th>Sector</th>
                <th></th>
            </tr>
            <?php foreach ($sectores as $dato): ?>
                <tr>
                    <td><?php echo $dato->objCiudad->nombreCiudad ?></td>
                    <td><?php echo $dato->objSector->nombreSector ?></td>
                    <td>
                        <?php echo CHtml::link('Eliminar', '#', array('data-promocion-sector' => $dato->codigoSector,'data-promocion-ciudad' => $dato->codigoCiudad, 'data-promocion' => $dato->idPromocion , 'data-role' => "eliminar-sector-promocion", 'class' => 'btn btn-primary')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else:?>
    No se han añadido ciudades/sectores a el modulo configurado.
<?php endif;?>