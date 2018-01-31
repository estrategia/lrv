<!-- producto fraccionado -->
<?php if ($position->objProducto->fraccionado == 1): ?>
<div class="row-producto-carrito-compras p-fraccionado">
    <div class="column-img">
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>">
        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl . $position->objProducto->rutaImagen() ?>" title="<?php echo $position->objProducto->descripcionProducto ?>">
      </a>
    </div>

    <div class="column-descripcion">

      <div class="fila-sup">

        <div class="nombre">
          <span style="color:#ED1C24;"><?php echo $position->objProducto->descripcionProducto ?></span>
          <span>Código: <?php echo $position->objProducto->codigoProducto ?></span>
        </div>

        <div class="presentacion">
          <span><?php echo $position->objProducto->presentacionProducto ?></span>
        </div>

        <div class="linea-acciones">
          <div class="precios">
            <span class="antes">
              <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo "Antes: " . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, false), Yii::app()->params->formatoMoneda['moneda']); ?>
              <?php else: ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?>
              <?php endif; ?>

              <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
                <br>
                Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> IVA
              <?php endif; ?>
            </span>
            <span class="ahorro">
              <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo "Ahorro: " . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>
              <?php else: ?>
                NA
              <?php endif; ?>
            </span>
            <span class="precio-total">
              <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?>
            </span>
          </div>

          <div class="cantidad">
            <?php if ($lectura): ?>
              <?php echo $position->getQuantityUnit() ?>
              <?php else: ?>
                <div class="group-botones-cantidad">
                  <button style="width:50px;" class="btn btn-default btn-xs" data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="-"><span class="glyphicon glyphicon-minus"></span></button>
                  <input style="width:50px;" class="increment btn-xs" data-role="modificarcarro" data-modificar="1" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantityUnit() ?>" id="cantidad-producto-unidad-<?php echo $position->getId() ?>" placeholder="0"/>
                  <button style="width:50px;" class="btn btn-default btn-xs" data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="+"><span class="glyphicon glyphicon-plus"></span></button>
                </div>
            <?php endif; ?>
          </div>

          <div class="accion-aliminar">
            <?php if (!$lectura): ?>
              <?php echo CHtml::link('Eliminar', '#', array('data-eliminar' => 1, 'data-position' => $position->getId(), 'class' => 'btn btn-primary btn-xs')); ?>
            <?php endif; ?>
          </div>
        </div>


      </div>

      <div class="fila-inf" style="border-top:2px solid red;">
        <span style="font-size: 10px; "> U.M.V</span>
        <?php if ($position->objProducto->objMedidaFraccion !== null): ?>
          <br>
          <span style="font-size: 10px; "><?php echo $position->objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $position->objProducto->unidadFraccionamiento ?></span>
        <?php endif; ?>
          <br>
        <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
          <?php echo "antes: " . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true, false), Yii::app()->params->formatoMoneda['moneda']); ?>
          <?php else: ?>
          <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true), Yii::app()->params->formatoMoneda['moneda']); ?>
        <?php endif; ?>
        <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
          <br>
          Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> IVA
        <?php endif; ?>
        <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
          <?php echo "Ahorro: " . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']); ?>
          <?php else: ?>
          NA
        <?php endif; ?>
        <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true), Yii::app()->params->formatoMoneda['moneda']); ?>
        <?php if ($lectura): ?>
          <div style="text-align:center;vertical-align:top;">
            <?php echo $position->getQuantity(true) ?>
          </div>
        <?php else: ?>
        <div class="group-botones-cantidad">
          <button class="btn btn-default btn-xs" data-role="modificarcarro" data-modificar="1" data-fraction="1" data-position="<?php echo $position->getId(); ?>" data-operation="-"><span class="glyphicon glyphicon-minus"></span></button>
            <div class="ressete">
              <input class="increment btn-xs" data-role="modificarcarro" data-modificar="1" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantity(true) ?>" id="cantidad-producto-fraccion-<?php echo $position->getId() ?>" data-nfracciones="<?php echo $position->objProducto->numeroFracciones ?>" data-ufraccionamiento="<?php echo $position->objProducto->unidadFraccionamiento ?>" placeholder="0"/>
            </div>
            <button class="btn btn-default btn-xs" data-role="modificarcarro" data-modificar="1" data-fraction="1" data-position="<?php echo $position->getId(); ?>" data-operation="+"><span class="glyphicon glyphicon-plus"></span></button>
        </div>
        <?php endif; ?>
        <?php if (!$lectura): ?>
          <?php echo CHtml::link('Eliminar', '#', array('data-eliminar' => 2, 'data-position' => $position->getId(), 'class' => 'btn btn-primary btn-xs')); ?>
        <?php endif; ?>
      </div>


    </div>



    <div class="column-subtotal" >
      <?php echo "subtotal: " . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?>
    </div>

</div>


<?php else: ?>


<!-- producto normal -->

<!-- <div class="row-producto-carrito-compras p-unidad" style="margin-top:40px;border-top:2px solid red;">
        <div align="center">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>">
                <img class="img-responsive img-table" src="<?php echo Yii::app()->request->baseUrl . $position->objProducto->rutaImagen() ?>" title="<?php echo $position->objProducto->descripcionProducto ?>">
            </a>
            <div style="color:#ED1C24;"><?php echo $position->objProducto->descripcionProducto ?></div>
            <div><?php echo $position->objProducto->presentacionProducto ?></div>
            <div>Código: <?php echo $position->objProducto->codigoProducto ?></div>

            <?php if ($position->getShipping() > 0): ?>
                <div>Flete: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?>]</div>
            <?php endif; ?>

            <?php if ($position->hasDelivery()): ?>
                <div>Entrega: Entre <?php echo $position->getDelivery('start', 'number') ?> y <?php echo $position->getDelivery('end', 'number') ?>  d&iacute;as</div>
            <?php endif; ?>
        </div>
        <div  class="btn-pagar" align="center">
            <?php if ($lectura): ?>
                <div style="text-align:center;vertical-align:top;">
                    <?php echo $position->getQuantityUnit() ?>
                </div>
            <?php else: ?>
                <div class="group-botones-cantidad">
                    <button class="btn btn-default btn-xs" data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="-"><span class="glyphicon glyphicon-minus"></span></button>
                    <div class="ressete">
                        <input class="increment btn-xs" data-role="modificarcarro" data-modificar="1" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantityUnit() ?>" id="cantidad-producto-unidad-<?php echo $position->getId() ?>" placeholder="0"/>
                    </div>
                    <button class="btn btn-default btn-xs"  data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="+"><span class="glyphicon glyphicon-plus"></span></button>
                </div>
            <?php endif; ?>

            <?php if (!$lectura): ?>
                <?php echo CHtml::link('Eliminar', '#', array('data-eliminar' => 1, 'data-position' => $position->getId(), 'class' => 'btn btn-primary btn-xs')); ?>
            <?php endif; ?>
        </div>
        <div class="text-right">
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, false), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php else: ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php endif; ?>

            <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
                <br>
                Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> IVA
            <?php endif; ?>
        </div>
        <div class="text-right">
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php else: ?>
                NA
            <?php endif; ?>
        </div>
        <div class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></div>
        <div class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?></div>
    </div> -->



<?php endif; ?>
