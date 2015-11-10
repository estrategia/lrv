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
            'maxButtonCount' => 8
        ),
        'id' => 'gridview-listadetalle',
        'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
    'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide();}"),
    'ajaxUpdateError' => new CJavaScriptExpression("function() { Loading.hide(); bootbox.alert('Error, intente de nuevo');}"),
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

                    return '<a href="'.CController::createUrl($controlador, $params).'" data-ajax="false">
                                <img src="'.Yii::app()->request->baseUrl . $urlImagen.'" class="">
                            </a>
                            <p>
                                <a href="'.CController::createUrl($controlador, $params).'" data-ajax="false">
                                    '.$descripcion.'
                                </a>
                            </p>
                            <p>'.$presentacion.'</p>
                            <p>'.$estaEnCarro.'</p>
                            <p>'.$fraccionado.'</p>
                            <p>Calificación: '.$calificacion.'</p>';
                },
            ),
            array(
                'header' => 'Antes',
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

                        return "<strike>".$resultado."</strike>";
                    }
                },
            ),
            array(
                'header' => 'Ahorro',
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

                        return $resultado;
                    }
                },
            ),
            array(
                'header' => 'Ahora',
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

                        return $resultado;
                    }
                },
            ),

            array(
                'header' => 'Cantidad',
                'type' => 'raw',
                'value' => function ($data){
                        return CHtml::textField('unidades', $data->unidades, array('maxlength'=>50, 'class' => 'form-control', 'id' => 'campo-producto-'.$data->idListaDetalle));
                },
            ),
            array(
                'header' => 'Actualizar ',
                'type' => 'raw',
                'value' => ' \'<a href="#" class="" data-role="actualizarlistadetalle" data-detalle="\' . $data->idListaDetalle  . \'">Actualizar</a>\''
            ),
            array(
                'header' => 'Cantidad',
                'type' => 'raw',
                'value' => ' \'<a href="#" class="" data-role="eliminarlistadetalle" data-detalle="\' . $data->idListaDetalle  . \'">Eliminar</a>\''
            ),
            
        ),
    )); ?>
<?php endif; ?>