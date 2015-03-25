<div data-role="panel" id="panel-ordenamiento" data-display="overlay" data-position="left" data-position-fixed="true" class="no-padding"> 
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'enableClientValidation' => true,
        'htmlOptions' => array(
            'id' => "form-ordenamiento", 'class' => "ui-bar ui-bar-a", 'data-ajax'=>"false"
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

    <fieldset data-role="controlgroup" class="ccnt_orden" data-mini="true">
        <legend></legend>
        <?php foreach ($formOrdenamiento->getOpciones($objSectorCiudad == null ? OrdenamientoForm::NO_PRECIO : OrdenamientoForm::SI_PRECIO) as $valor => $nombre): ?>
            <input type="radio" name="OrdenamientoForm[orden]" data-mini="true" id="OrdenamientoForm_orden_<?php echo $valor ?>" value="<?php echo $valor ?>" <?php echo ($formOrdenamiento->orden == $valor ? "checked='checked'" : "") ?> />
            <label for="OrdenamientoForm_orden_<?php echo $valor ?>" class="clst_radio"><?php echo $nombre ?></label>
        <?php endforeach; ?>
    </fieldset>


    <?php echo CHtml::submitButton('Ordenar', array('data-mini'=>true, 'class' => 'cfil_btn')); ?>
    <?php $this->endWidget(); ?>
</div>