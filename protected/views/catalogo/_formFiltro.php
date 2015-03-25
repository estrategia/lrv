<div data-role="panel" id="panel-filtro" data-display="overlay" data-position="left" data-position-fixed="true" class="cont_filtbusq no-padding">
    <?php if ($tipoBusqueda == Yii::app()->params->busqueda['tipo']['categoria']): ?>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            'htmlOptions' => array(
                'id' => "form-filtro", 'class' => "ui-bar ui-bar-a", 'data-ajax'=>"false"
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

        <fieldset data-role="controlgroup" class="ccnt_filtro">
            <div class="ui-field-container">
                <?php echo $form->labelEx($formFiltro, 'nombre', array('class' => 'ui-hidden-accessible')); ?>
                <?php echo $form->textField($formFiltro, 'nombre', array('data-mini' => true, 'placeholder' => $formFiltro->getAttributeLabel('nombre'))); ?>
            </div>
            <div id="div-filtro-marcas">
                <?php $this->renderPartial('_formFiltroMarcas', array('formFiltro' => $formFiltro)) ?>
            </div>
            <div id="div-filtro-atributos">
                <?php $this->renderPartial('_formFiltroAtributos', array('formFiltro' => $formFiltro)) ?>
            </div>
        </fieldset>
        <!--
        <?php echo CHtml::submitButton('Filtrar', array('data-mini' => true, 'class' => 'cfil_btn')); ?>
        -->
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-n ui-mini">
            Filtrar
            <input type="submit" data-enhanced="true" value="Filtrar">
        </div>
    
        <?php $this->endWidget(); ?>
    <?php endif; ?>
    <?php if ($tipoBusqueda == Yii::app()->params->busqueda['tipo']['buscador']): ?>
        <ul data-role="listview" data-inset="false" data-theme="a" class="lst_filtxbusq">
            <li data-role="list-divider" class="tlo_filxbusq">Categorias</li>
            <?php foreach ($formFiltro->listCategoriasTienda as $objCategoriaTienda): ?>
                <li class="lst_fltxbq_opt">
                    <a href="<?php echo CController::createUrl('/catalogo/categoria', array('categoria' => $objCategoriaTienda->idCategoriaTienda)) ?>" class="cbtn_filt_prod_02 ui-nodisc-icon ui-alt-icon" ><?php echo $objCategoriaTienda->nombreCategoriaTienda ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>