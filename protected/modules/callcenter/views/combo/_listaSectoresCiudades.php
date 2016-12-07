<?php if(count($model->listComboSectorCiudad)>0):?>    
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <th>Ciudad</th>
                <th>Sector</th>
                <th>Saldos</th>
                <th></th>
            </tr>
            <?php foreach ($model->listComboSectorCiudad as $dato): ?>
                <tr>
                    <td><?php echo $dato->objCiudad->nombreCiudad ?></td>
                    <td><?php echo $dato->objSector->nombreSector ?></td>
                    <td><?php echo $dato->saldo ?></td>
                    <td>
                        <?php echo CHtml::link('Eliminar', '#', array('data-sector' => $dato->codigoSector, 'data-ciudad' => $dato->codigoCiudad,'data-combo' => $dato->idCombo,  'data-role' => "eliminar-combo-sector", 'class' => 'btn btn-primary')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else:?>
    No se han añadido ciudades/sectores a el modulo configurado.
<?php endif;?>