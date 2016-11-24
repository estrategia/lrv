<div data-role='main'>
    <div class="">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'htmlOptions' => array(
                'id' => "form-listaguardar",
                'class' => "ui-bar ui-bar-a ui-corner-all",
                'data-ajax' => "false"
            ),
            'errorMessageCssClass' => 'has-error',
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'errorCssClass' => 'has-error',
                'successCssClass' => 'has-success',
            ))
        );
        ?>

        <fieldset>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'idLista', array('class' => 'ui-hidden-accessible')); ?>
                <?php echo $form->dropDownList($model, 'idLista', CHtml::listData($model->listData(), 'idLista', 'nombreLista'), array('encode' => false, 'prompt' => 'Seleccione lista', 'data-native-menu' => "true", 'placeholder' => $model->getAttributeLabel('idLista'))); ?>
                <?php echo $form->error($model, 'idLista'); ?>
            </div>
            <div>
                <?php echo $form->hiddenField($model, 'tipo'); ?>
                <?php echo $form->hiddenField($model, 'codigo'); ?>
                <?php echo $form->hiddenField($model, 'unidades'); ?>
            </div>
        </fieldset>

        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
            Guardar
            <input type="button" data-enhanced="true" data-role="lstpersonalguardar" value="Guardar">
        </div>
        <?php $this->endWidget(); ?>
    </div>

    <div data-role="collapsibleset">
        <div data-role="collapsible">
            <h3>Nueva lista personal</h3>
            <?php $this->renderPartial('listaForm', array('model' => new ListasPersonales)); ?>
        </div>
    </div>
</div> 