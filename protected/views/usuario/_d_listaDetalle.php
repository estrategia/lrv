<?php if (empty($model->listDetalle)): ?>
    <p>Lista vacía</p>
<?php else: ?>
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'pager' => array(
            'header' => '',
            'firstPageLabel' => '&lt;&lt;',
            'prevPageLabel' => 'Anterior',
            'nextPageLabel' => 'Siguiente',
            'lastPageLabel' => '&gt;&gt;',
            'maxButtonCount' => 8,
        ),
        'itemsCssClass' => 'items',
        'id' => 'gridview-listadetalle',
        'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
    'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide();}"),
    'ajaxUpdateError' => new CJavaScriptExpression("function() { Loading.hide(); alert('Error, intente de nuevo');}"),
        'dataProvider' => new CArrayDataProvider($model->listDetalle, array(
            'keyField' => 'idListaDetalle',
        )),
        'columns' => array(
            array(
                'header' => 'N°',
                'value' => '$data->idCombo != null ? $data->idCombo : $data->codigoProducto',
            ),
            array(
                'header' => 'Producto/Combo',
                'type' => 'raw',
                'value' => function ($data){
                    $params = array();
                    $urlImagen = "";
                    $controlador = "";
                    $descripcion = "";
                    $presentacion = "";
                    $estaEnCarro = false;
                    $icono = "";
                    $fraccionado = "";
                    $calificacion = "";

                    if($data->idCombo != null)
                    {
                        $objCombo = $data->objCombo;
                        $params['combo'] = $objCombo->idCombo;
                        $params['description'] = $objCombo->getCadenaUrl();
                        $controlador = "/catalogo/combo";
                        $urlImagen = $objCombo->rutaImagen();
                        $descripcion = $objCombo->descripcionCombo;
                        $estaEnCarro = Yii::app()->shoppingCart->contains($objCombo->getCodigo()) ? "Agregado al carro" : "";
                        $icono = 'icono-combo-agregado-'.$objCombo->idCombo;
                    }
                    else
                    {
                        $objProducto = $data->objProducto;
                        $params['producto'] = $objProducto->codigoProducto;
                        $params['descripcion'] = $objProducto->getCadenaUrl();
                        $controlador = "/catalogo/producto";
                        $urlImagen = $objProducto->rutaImagen();
                        $descripcion = $objProducto->descripcionProducto;
                        $presentacion = $objProducto->presentacionProducto;
                        $estaEnCarro = Yii::app()->shoppingCart->contains($objProducto->codigoProducto) ? "Agregado al carro" : "";
                        $icono = 'icono-producto-agregado-'.$objProducto->codigoProducto;
                        $fraccionado = $objProducto->fraccionado == 1 ? "Producto fraccionado" : "";
                        if(!in_array($objProducto->idUnidadNegocioBI, Yii::app()->params->calificacion['categoriasNoCalificacion']))
                        {
                            //$calificacion = '<div id="raty-lectura-producto-'.$objProducto->codigoProducto.'" data-role="raty" data-readonly="true" data-score="'.$objProducto->getCalificacion().'" class="clst_cal_str"></div>';

                            $calificacion = $objProducto->getCalificacion();
                        }

                    }

                    return '
                      <div class="info-producto">
                        <div class="img-producto-lista">
                          <a href="'.CController::createUrl($controlador, $params).'">
                            <img src="'.Yii::app()->request->baseUrl . $urlImagen.'" title="'.$descripcion.'" >
                          </a>
                        </div>
                        <div class="descripcion-producto-lista">
                          <p class="descripcion">'.$descripcion.'</p>
                          <p class="presentacion">'.$presentacion.'</p>
                          <p class="in-car">'.$estaEnCarro.'</p>
                          <p class="fraccionado">'.$fraccionado.'</p>
                        </div>

                      </div>
                    ';
                },
            ),
            array(
                'header' => 'Antes',
                'htmlOptions'=> array('class'=>'p-antes'),
                'type' => 'raw',
                'value' => function ($data){
                    if($data->idCombo != null)
                    {
                        return "<strike>".Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], 0, Yii::app()->params->formatoMoneda['moneda'])."</strike>";
                    }
                    else
                    {
                        $objProducto = $data->objProducto;

                        $objPrecio = new PrecioProducto($objProducto, Yii::app()->shoppingCart->getSectorCiudad(), Yii::app()->shoppingCart->getCodigoPerfil(), true);

                        $resultado = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], 0, Yii::app()->params->formatoMoneda['moneda']);

                        if($objPrecio->inicializado())
                        {
                            if($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0)
                            {
                                $resultado = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']);
                            }
                        }

                        return "Antes: " . "<span class='negrilla'>" . $resultado . "</span>";
                    }
                },
            ),
            array(
                'header' => 'Ahorro',
                'htmlOptions'=> array('class'=>'ahorro'),
                'type' => 'raw',
                'value' => function ($data){
                    if($data->idCombo != null)
                    {
                        return Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], 0, Yii::app()->params->formatoMoneda['moneda']);
                    }
                    else
                    {
                        $objProducto = $data->objProducto;
                        $objPrecio = new PrecioProducto($objProducto, Yii::app()->shoppingCart->getSectorCiudad(), Yii::app()->shoppingCart->getCodigoPerfil(), true);

                        $resultado = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], 0, Yii::app()->params->formatoMoneda['moneda']);

                        if($objPrecio->inicializado())
                        {
                            if($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0)
                            {
                                $resultado = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']);
                            }
                        }

                        return "Ahorro: " . "<span class='negrilla'>" . $resultado . "</span>";
                    }
                },
            ),
            array(
                'header' => 'Ahora',
                'htmlOptions'=> array('class'=>'ahora'),
                'type' => 'raw',
                'value' => function ($data){
                    if($data->idCombo != null)
                    {
                        $objPrecio = new PrecioCombo($data->objCombo);
                        Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']);
                    }
                    else
                    {
                        $objProducto = $data->objProducto;
                        $objPrecio = new PrecioProducto($objProducto, Yii::app()->shoppingCart->getSectorCiudad(), Yii::app()->shoppingCart->getCodigoPerfil(), true);

                        $resultado = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], 0, Yii::app()->params->formatoMoneda['moneda']);

                        if($objPrecio->inicializado())
                        {
                            if($objProducto->mostrarAhorroVirtual == 1 && $objPrecio->getAhorro(Precio::PRECIO_UNIDAD) > 0)
                            {
                                $resultado = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']);
                            }
                        }

                        return "Ahora: " . "<span>" . $resultado . "</span>" ;
                    }
                },
            ),

            array(
                'header' => 'Cantidad',
                'type' => 'raw',
                'value' => function ($data){
                        return CHtml::textField('unidades', $data->unidades, array('maxlength'=>50, 'class' => 'form-control center-div center', 'id' => 'campo-producto-'.$data->idListaDetalle));
                },
                'htmlOptions'=> array('width'=>'100px')
            ),
            array(
                'header' => 'Actualizar ',
                'htmlOptions'=> array('class'=>'text-center'),
                'type' => 'raw',
                'value' => ' \'<a href="#" class="btn btn-primary" data-role="actualizarlistadetalle" data-detalle="\' . $data->idListaDetalle  . \'">Actualizar</a>\''
            ),
            array(
                'header' => 'Eliminar',
                'htmlOptions'=> array('class'=>'text-center'),
                'type' => 'raw',
                'value' => ' \'<a href="#" class="center" data-role="eliminarlistadetalle" data-detalle="\' . $data->idListaDetalle  . \'"> <span>Eliminar</span> <span class="glyphicon glyphicon-remove-circle icono-eliminar" style="position: relative;" aria-hidden="true"></span></a>\''
            ),

        ),
    )); ?>
<?php endif; ?>
