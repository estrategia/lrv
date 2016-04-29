<?php if (empty($model->listDetalle)): ?>
    <p>Lista vacía</p>
<?php else: ?>
    <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
        <?php foreach ($model->listDetalle as $objDetalle): ?>
            <?php if ($objDetalle->idCombo != null): ?>
                <li class="c_list_prod">
                    <div class="ui-field-contain clst_prod_cont">
                        <?php
                        $this->renderPartial('/catalogo/_comboElemento', array(
                            'objCombo' => $objDetalle->objCombo,
                            'objPrecio' => new PrecioCombo($objDetalle->objCombo),
                            'vista' => 'listaPersonal',
                        ));
                        ?>
                        <table class="ui-responsive ctable_list_prod">
                            <tbody>
                                <tr>
                                    <td class="ctd_01">
                                        <input type="number" placeholder="0" class="cbtn_cant" data-mini="true" data-role="actualizarlistadetalle" data-detalle="<?php echo $objDetalle->idListaDetalle ?>" value="<?php echo $objDetalle->unidades ?>" disabled="true">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
            <?php elseif ($objDetalle->codigoProducto != null): ?>
                <li class="c_list_prod">
                    <div class="ui-field-contain clst_prod_cont">
                        <?php
                        $this->renderPartial('/catalogo/_productoElemento', array(
                            'objProducto' => $objDetalle->objProducto,
                            'objPrecio' => new PrecioProducto($objDetalle->objProducto, Yii::app()->shoppingCart->getSectorCiudad(), Yii::app()->shoppingCart->getCodigoPerfil(), true),
                            'vista' => 'listaPersonal',
                        ));
                        ?>
                        <table class="ui-responsive ctable_list_prod">
                            <tbody>
                                <tr>
                                    <td class="ctd_01">
                                        <input type="number" placeholder="0" class="cbtn_cant" data-mini="true" data-role="actualizarlistadetalle" data-detalle="<?php echo $objDetalle->idListaDetalle ?>" value="<?php echo $objDetalle->unidades ?>" disabled="true">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>