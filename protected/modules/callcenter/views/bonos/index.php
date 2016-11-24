
<?php if (in_array(Yii::app()->controller->module->user->profile, array(2, 3))): ?>
    <div class="well" align="center">
        <?php echo CHtml::button('Crear bono', array('class' => 'btn btn-primary btn-sm', 'submit' => CController::createUrl('/callcenter/bonos/index', array('opcion' => 'crear')))); ?>
        <?php echo CHtml::button('Cargar bonos', array('class' => 'btn btn-primary btn-sm', 'submit' => CController::createUrl('/callcenter/bonos/index', array('opcion' => 'cargar')))); ?>
        <?php if ($opcion == 'admin'): ?>
            <?php echo CHtml::button('Exportar excel', array('class' => 'btn btn-primary btn-sm', 'submit' => CController::createUrl('exportar', array('excel' => true)))); ?>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php $this->renderPartial($vista, $params); ?>