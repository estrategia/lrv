<?php if ($tipoBusqueda == Yii::app()->params->busqueda['tipo']['categoria']): ?>
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


    <div id="div-filtro-marcas">
        <?php $this->renderPartial('_d_formFiltroMarcas', array('formFiltro' => $formFiltro)) ?>
    </div>

    <div id="div-filtro-atributos">
        <?php $this->renderPartial('_d_formFiltroAtributos', array('formFiltro' => $formFiltro)) ?>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading-precio">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-filtros" href="#collapse-precio" aria-expanded="false" aria-controls="collapse-precio" style="background:none;" >
                    Precio <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </h4>
        </div>
        <div id="collapse-precio" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-precio">
            <div class="panel-body">	
                <input id="FiltroForm_precio" class="span2" value="" data-role="bootstrap-slider" data-slider-min="0" data-slider-max="200000" data-slider-step="50" data-slider-value="[0,200000]"/>
                <input id="FiltroForm_precio_0_text" class="search-priced" value="$0" />
                <span>-</span>
                <input id="FiltroForm_precio_1_text" class="search-priced" value="$200.000" />
                <input id="FiltroForm_precio_0" name="FiltroForm[precio][0]" class="search-priced" value="-1" type="hidden"/>
                <input id="FiltroForm_precio_1" name="FiltroForm[precio][1]" class="search-priced" value="-1" type="hidden"/>
                <!-- <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/images/desktop/ico-lupa.png"></a> -->
            </div>
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingFour">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-filtros" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" style="background:none;" >
                    Calificaci&oacute;n <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
            </div>
        </div>
    </div>

    <a href="#" data-role="filtro-listaproductos" ><div class="button">Filtrar</div></a>

    <?php $this->endWidget(); ?>
<?php endif; ?>
<?php if ($tipoBusqueda == Yii::app()->params->busqueda['tipo']['buscador']): ?>
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
        <?php $this->renderPartial('_d_formFiltroCategorias', array('formFiltro' => $formFiltro)) ?>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading-precio">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-filtros" href="#collapse-precio" aria-expanded="false" aria-controls="collapse-precio" style="background:none;" >
                    Precio <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </h4>
        </div>
        <div id="collapse-precio" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-precio">
            <div class="panel-body">	
                <input id="FiltroForm_precio" class="span2" value="" data-role="bootstrap-slider" data-slider-min="0" data-slider-max="200000" data-slider-step="50" data-slider-value="[0,200000]"/>
                <input id="FiltroForm_precio_0_text" class="search-priced" value="$0" />
                <span>-</span>
                <input id="FiltroForm_precio_1_text" class="search-priced" value="$200.000" />
                <input id="FiltroForm_precio_0" name="FiltroForm[precio][0]" class="search-priced" value="-1" type="hidden"/>
                <input id="FiltroForm_precio_1" name="FiltroForm[precio][1]" class="search-priced" value="-1" type="hidden"/>
                <!-- <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/images/desktop/ico-lupa.png"></a> -->
            </div>
        </div>
    </div>


    <a href="#" data-role="filtro-listaproductos" ><div class="button">Filtrar</div></a>
    <?php $this->endWidget(); ?>
<?php endif; ?>
