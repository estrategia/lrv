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
                <?php $this->renderPartial('//catalogo/_formFiltroMarcas', array('formFiltro' => $formFiltro)) ?>
            </div>
            <div id="div-filtro-atributos">
                <?php $this->renderPartial('//catalogo/_formFiltroAtributos', array('formFiltro' => $formFiltro)) ?>
            </div>
        </fieldset>
        
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-n ui-mini">
            Filtrar
            <input type="submit" data-enhanced="true" value="Filtrar">
        </div>
    
        <?php $this->endWidget(); ?>
    <?php endif; ?>
    <?php if ($tipoBusqueda == Yii::app()->params->busqueda['tipo']['buscador']): ?>
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
            <div id="div-filtro-categorias">
                <?php $this->renderPartial('//catalogo/_formFiltroCategorias', array('formFiltro' => $formFiltro)) ?>
            </div>
        </fieldset>
        
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-n ui-mini">
            Filtrar
            <input type="submit" data-enhanced="true" value="Filtrar">
        </div>
        <?php $this->endWidget(); ?>
    <?php endif; ?>
</div>