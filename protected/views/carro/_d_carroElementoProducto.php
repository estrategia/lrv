<!-- PRODUCTO FRACCIONADO -->
<?php if ($position->objProducto->fraccionado == 1): ?>
<div class="row-producto-carrito-compras p-fraccionado">
    <div class="column-img">
      <span class="chispa-productos">-17%</span>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>">
        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl . $position->objProducto->rutaImagen() ?>" title="<?php echo $position->objProducto->descripcionProducto ?>">
      </a>
    </div>
    <div class="column-descripcion">
      <div class="fila-sup">
        <div class="nombre">
          <span class="name"><?php echo $position->objProducto->descripcionProducto ?></span>
          <span class="sku">Código: <?php echo $position->objProducto->codigoProducto ?></span>
        </div>
        <div class="presentacion">
          <span><?php echo $position->objProducto->presentacionProducto ?></span>
        </div>
        <div class="linea-acciones">
          <div class="precios">
            <span class="antes">
              <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo "Antes: " . "<strike>" . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, false), Yii::app()->params->formatoMoneda['moneda']) . "</strike>"; ?>
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
                <p>Cantidad</p>
                <div class="group-buttons">
                  <button class="" data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="-">-</button>
                  <input  style="width:35px;" class="" data-role="modificarcarro" data-modificar="1" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantityUnit() ?>" id="cantidad-producto-unidad-<?php echo $position->getId() ?>" placeholder="0"/>
                  <button class="" data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="+">+</button>
                </div>
            <?php endif; ?>
          </div>
          <div class="accion-eliminar">
            <?php if (!$lectura): ?>
              <?php echo CHtml::link('x', '#', array('data-eliminar' => 1, 'data-position' => $position->getId(), 'class' => '')); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="fila-inf">
        <div class="presentacion">
          <span> U.M.V</span>
          <?php if ($position->objProducto->objMedidaFraccion !== null): ?>
            <br>
            <span><?php echo $position->objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $position->objProducto->unidadFraccionamiento ?></span>
          <?php endif; ?>
        </div>
        <div class="linea-acciones">
          <div class="precios">
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
              <?php echo "<span class='Antes'>Antes: </span> " . "<strike>" . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true, false), Yii::app()->params->formatoMoneda['moneda']) . "</strike>"; ?>
              <?php else: ?>
              <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
              <br>
              Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> IVA
            <?php endif; ?>
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
              <?php echo "<span class='ahorro'>Ahorro: " . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) . "</span>"; ?>
              <?php else: ?>
              NA
            <?php endif; ?>
                    <?php echo "<span class='precio-total'>" . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true), Yii::app()->params->formatoMoneda['moneda']) . "</span>"; ?>
            <?php if ($lectura): ?>
              <div style="text-align:center;vertical-align:top;">
                <?php echo $position->getQuantity(true) ?>
              </div>
            <?php else: ?>
          </div>
          <div class="cantidad">
            <p>Cantidad</p>
            <div class="group-buttons">
              <button class="" data-role="modificarcarro" data-modificar="1" data-fraction="1" data-position="<?php echo $position->getId(); ?>" data-operation="-">-</button>
              <input style="width:35px;" class="" data-role="modificarcarro" data-modificar="1" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantity(true) ?>" id="cantidad-producto-fraccion-<?php echo $position->getId() ?>" data-nfracciones="<?php echo $position->objProducto->numeroFracciones ?>" data-ufraccionamiento="<?php echo $position->objProducto->unidadFraccionamiento ?>" placeholder="0"/>
              <button class="" data-role="modificarcarro" data-modificar="1" data-fraction="1" data-position="<?php echo $position->getId(); ?>" data-operation="+">+</button>
            </div>
          </div>
          <?php endif; ?>
          <div class="accion-eliminar">
            <?php if (!$lectura): ?>
              <?php echo CHtml::link('x', '#', array('data-eliminar' => 2, 'data-position' => $position->getId(), 'class' => '')); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="column-subtotal" >
      <?php echo "<span>Subtotal: </span> " . "<span class='price'>" . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(false, true), Yii::app()->params->formatoMoneda['moneda']) . "</span>"; ?>
    </div>
</div>
<?php else: ?>


<!-- PRODUCTO NORMAL -->
<div class="row-producto-carrito-compras p-unidad">
  <div class="column-img">
    <span class="chispa-productos">-50%</span>
      <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>">
          <img class="img-responsive img-table" src="<?php echo Yii::app()->request->baseUrl . $position->objProducto->rutaImagen() ?>" title="<?php echo $position->objProducto->descripcionProducto ?>">
      </a>
  </div>
  <div class="column-descripcion">
    <div class="fila-sup">
      <div class="nombre">
        <span class="name"><?php echo $position->objProducto->descripcionProducto ?></span>
        <span class="sku">Código: <?php echo $position->objProducto->codigoProducto ?></span>
      </div>
      <div class="presentacion">
        <span><?php echo $position->objProducto->presentacionProducto ?></span>
      </div>
      <div class="linea-acciones">
        <div class="precios">
          <span class="antes">
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo "Antes: " . "<strike>" . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, false), Yii::app()->params->formatoMoneda['moneda']) . "</strike>" ; ?>
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
            <?php if ($position->getShipping() > 0): ?>
              <div>Flete: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?>]</div>
            <?php endif; ?>
            <?php if ($position->hasDelivery()): ?>
              <div>Entrega: Entre <?php echo $position->getDelivery('start', 'number') ?> y <?php echo $position->getDelivery('end', 'number') ?>  d&iacute;as</div>
            <?php endif; ?>
          </span>
          <span class="precio-total">
            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>
          </span>
        </div>
        <div class="cantidad">
          <p>Cantidad</p>
          <div class="group-buttons">
            <?php if ($lectura): ?>
              <div style="text-align:center;vertical-align:top;">
                <?php echo $position->getQuantityUnit() ?>
              </div>
              <?php else: ?>
              <button class="" data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="-">-</button>
              <input style="width:35px;" class="increment btn-xs" data-role="modificarcarro" data-modificar="1" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantityUnit() ?>" id="cantidad-producto-unidad-<?php echo $position->getId() ?>" placeholder="0"/>
              <button class=""  data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="+">+</button>
            <?php endif; ?>
          </div>
        </div>
        <div class="accion-eliminar">
          <?php if (!$lectura): ?>
              <?php echo CHtml::link('x', '#', array('data-eliminar' => 1, 'data-position' => $position->getId(), 'class' => '')); ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="entrega-especial"><span>Producto con entrega especial</span></div>
    </div>
  </div>
  <div class="column-subtotal">
    <span>Subtotal: </span>
    <span class="price"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?></span>
  </div>
</div>
<?php endif; ?>
