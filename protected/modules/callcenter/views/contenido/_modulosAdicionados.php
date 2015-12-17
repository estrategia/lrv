<?php if(count($modulosAdicionados)>0):?>    
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Inicio</th>
                <th>Fín</th>
                <th>Días</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Orden</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php $i=0?>
            <?php foreach($modulosAdicionados as $modulos):?>
                
                <tr>
                    <td><?php echo ++$i;?></td>
                    <td><?php echo Yii::app()->params->callcenter["modulosConfigurados"]["tiposModulos"][$modulos->objModulo->tipo] ?></td>
                    <td><?php echo $modulos->objModulo->inicio ?></td>
                    <td><?php echo $modulos->objModulo->fin ?></td>
                    <td>
                       <?php if (empty($modulos->objModulo->dias)):?>
                                NA
                       <?php else:?>
                            <?php $numDias = explode(",", $modulos->objModulo->dias)?>
                            <?php $cadenaDias = "";

                                foreach ($numDias as $indice => $fila) {
                                    if ($indice > 0) {
                                        $cadenaDias .= ",";
                                    }
                                    $cadenaDias .= Yii::app()->params->callcenter['modulosConfigurados']['diasSemana'][$fila];
                                }
                       ?>
                    <?php echo $cadenaDias?>
                      <?php endif;?>
                    </td>
                    <td><?php echo $modulos->objModulo->titulo ?></td>
                    <td><?php echo $modulos->objModulo->descripcion ?></td>
                    <td><?php echo CHtml::textField('orden',$modulos->orden, array('id' => 'orden_'.$modulos->idModulo)) ?></td>
                    <td><?php echo CHtml::link("Actualizar", '#', array("data-role" => "agregar-modulo-grupo","data-idModulo" => $modulos->idModulo, 'data-accion' => '2'));?></td>
                    <td><?php echo CHtml::link("Visualizar", '#', array("data-role" => "modulo-visualizar", 'data-modulo' =>$modulos->idModulo));?></td>
                    <td><?php echo CHtml::link("Eliminar", '#', array("data-role" => "agregar-modulo-grupo","data-idModulo" => $modulos->idModulo, 'data-accion' => '3'));?></td>
                </tr>
            <?php endforeach; ?>
                
        </tbody>
    </table>
<?php else:?>
    No se han añadido ciudades/sectores a el modulo configurado.
<?php endif;?>

<?php foreach($modulosAdicionados as $modulos):?>



<?php endforeach; ?>
