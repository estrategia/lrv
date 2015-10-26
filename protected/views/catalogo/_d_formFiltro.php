<div class="col-md-2 menu-categorias cat-collapsables">
    <div class="panel-group" id="accordion-filtros" role="tablist" aria-multiselectable="true">
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
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion-filtros" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background:none;" >
                            Precio <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">	
                        <input id="rango-precios" class="span2" value="" data-slider-min="100" data-slider-max="1000" data-slider-step="5" data-slider-value="[950,450]"/>
                        <input class="search-priced" value="$950"/>
                        <span>-</span>
                        <input class="search-priced" value="$950"/>
                        <a href="#"><img src="<?php echo Yii::app()->baseUrl ?>/images/desktop/ico-lupa.png"></a>
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


            <a href="#" data-role="filtro-listaproductos" ><div class="button">Filtrar</div></a>
            <?php $this->endWidget(); ?>
        <?php endif; ?>
    </div>
</div>