    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'enableClientValidation' => true,
        'htmlOptions' => array(
            'id' => "form-filtro-listaproductos",
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

    <div id="div-filtro-categorias">
        <?php $this->renderPartial('_formFiltroCategorias', array('formFiltro' => $formFiltro)) ?>
    </div>

    <?php if ($formFiltro->isRangoPrecioValido()): ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading-precio">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion-filtros" href="#collapse-precio" aria-expanded="true" aria-controls="collapse-precio" style="background:none;" >
                        Precio
                    </a>
                </h4>
            </div>
            <div id="collapse-precio-" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-precio">
                <div class="panel-body">	
                    <input id="FiltroForm_precio" class="span2" value="" data-role="bootstrap-slider" data-slider-min="<?php echo $formFiltro->precioRango["min"] ?>" data-slider-max="<?php echo $formFiltro->precioRango["max"] ?>" data-slider-step="50" data-slider-min="<?php echo $formFiltro->precioRango["min"] ?>" data-slider-max="<?php echo $formFiltro->precioRango["max"] ?>" data-slider-value="[<?php echo $formFiltro->precioRango["min"] ?>,<?php echo $formFiltro->precioRango["max"] ?>]"/>
                    <input id="FiltroForm_precio_0_text" class="search-priced" value="<?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $formFiltro->precioRango["min"], Yii::app()->params->formatoMoneda['moneda']) ?>" />
                    <span>-</span>
                    <input id="FiltroForm_precio_1_text" class="search-priced" value="<?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $formFiltro->precioRango["max"], Yii::app()->params->formatoMoneda['moneda']) ?>" />
                    <input id="FiltroForm_precio_0" name="FiltroForm[precio][0]" value="<?php echo $formFiltro->precioRango["min"] ?>" type="hidden"/>
                    <input id="FiltroForm_precio_1" name="FiltroForm[precio][1]" value="<?php echo $formFiltro->precioRango["max"] ?>" type="hidden"/>
                </div>
            </div>
        </div>
    <?php endif; ?>
   
    <div class="space-1"></div>
    <div class="text-center">
        <a href="#" data-role="filtro-listaproductos-reset" data-tipo="2"><div class="btn btn-primary btn-block">Limpiar filtros</div></a>
    </div>
    <?php $this->endWidget(); ?>
