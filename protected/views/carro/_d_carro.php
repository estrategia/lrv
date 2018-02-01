<?php $listPositionBodega = array(); ?>
<?php $listPositionDelivery = array(); ?>
<?php $listPositionSuscription = array(); ?>

<!-- Vista Carro -->
<div class="row">
  <div class="col-md-9">
    <div class="bg-gr">
      <div class="<?= Yii::app()->shoppingCart->isUnit() > 0 ? '':'display-none'?>">
          <?php foreach (Yii::app()->shoppingCart->getPositions() as $position): ?>
          <?php if (!$position->hasDelivery() && $position->getShipping() == 0): ?>
          <?php
            if ($position->isProduct()):
              if ($position->getQuantitySuscription() > 0) {
              $listPositionSuscription[] = $position;
              }
              if ($position->getQuantityStored() > 0)
              $listPositionBodega[] = $position;
              if($position->getQuantityUnit()> 0 || $position->getQuantity(true)>0):
                  $this->renderPartial('/carro/_d_carroElementoProducto', array(
                      'position' => $position,
                      'lectura' => $lectura
                  ));
            endif;
            elseif ($position->isCombo()):
              $this->renderPartial('/carro/_d_carroElementoCombo', array(
                'position' => $position,
                'lectura' => $lectura
              ));
            endif;
          ?>
          <?php else: $listPositionDelivery[] = $position ?>
          <?php endif; ?>
          <?php endforeach; ?>
    </div>

      <!-- Productos con suscripcion -->
      <?php if (!empty($listPositionSuscription)): ?>
        <h3>Productos con suscripción</h3>
        <table class="table table-bordered table-hover table-striped">
          <thead class="cabecera-tabla">
            <tr>
              <th style="width: 27%;">Producto</th>
              <th style="width: 25%;">Cantidad</th>
              <th style="width: 15%;">Antes</th>
              <th>Ahorro</th>
              <th>Ahora</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listPositionSuscription as $position): ?>
            <?php
              $this->renderPartial('/carro/_d_carroElementoSuscripcion', array(
                'position' => $position,
                'lectura' => $lectura
              ));
            ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif ?>
      <!-- Productos con otras condiciones de entrega -->
      <?php if (!empty($listPositionBodega) || !empty($listPositionDelivery)): ?>
        <h3>Productos con otras condiciones de entrega</h3>
        <table class="table table-bordered table-hover table-striped">
          <thead class="cabecera-tabla">
            <tr>
              <th style="width: 27%;">Producto</th>
              <th style="width: 25%;">Cantidad</th>
              <th style="width: 15%;">Antes</th>
              <th>Ahorro</th>
              <th>Ahora</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($listPositionBodega as $position): ?>
            <?php
              $this->renderPartial('/carro/_d_carroElementoBodega', array(
                'position' => $position,
                'lectura' => $lectura
              ));
            ?>
          <?php endforeach; ?>
          <?php foreach ($listPositionDelivery as $position): ?>
            <?php
              if ($position->isProduct()):
                $this->renderPartial('/carro/_d_carroElementoProducto', array(
                  'position' => $position,
                  'lectura' => $lectura
                ));
              elseif ($position->isCombo()):
                $this->renderPartial('/carro/_d_carroElementoCombo', array(
                  'position' => $position,
                  'lectura' => $lectura
                ));
              endif;
            ?>
          <?php endforeach; ?>
        </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>

  <div class="col-md-3 detalles">
    <?php if (!$lectura) : ?>
      <div style="margin-bottom:30px;">
        <?php echo CHtml::link('Vaciar carrito', '#', array('data-role' => 'carrovaciar', 'class' => 'btn btn-default txt-rojo btn-lg', 'role' => "button")); ?>
        <?php if (!isset($opcion) || !$opcion == 1): ?>
          <?php echo CHtml::link('Guardar en la lista personal', '#', array('data-role' => 'lstpersonalguardar', 'data-tipo' => 3, 'data-codigo' => 0, 'class' => 'btn btn-default txt-rojo', 'role' => "button")); ?>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <h4>Detalles de la compra</h4>

    <div class="sec-detalles">
      <div class="item">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></div>
      <div class="item negrilla">Servicio <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></div>

      <?php if (Yii::app()->shoppingCart->getExtraShipping() > 0): ?>
        <div class="item">Flete adicional <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></div>
      <?php endif; ?>

      <?php if (Yii::app()->shoppingCart->getBono() > 0): ?>
        <div class="item">Bono <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getBono(), Yii::app()->params->formatoMoneda['moneda']); ?></div>
      <?php endif; ?>

      <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && Yii::app()->shoppingCart->getTaxPrice() > 0): ?>
        <div class="item">Impuestos incluidos <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></div>
      <?php endif; ?>

      <?php if (Yii::app()->shoppingCart->getDiscountPrice(true) > 0): ?>
        <div class="item negrilla">Su ahorro  <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></div>
      <?php endif; ?>

    </div>

    <h4>Valor a pagar <br>
      <p class="valor-pagar"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTotalCostClient(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
    </h4>

    <!--  Formas de pago -->
    <?php if(isset($objCompra)):?>
      <?php foreach($objCompra->listFormaPagoCompra as $formaPago):?>
        <span><?php echo (isset( $formaPago->objFormaPago->formaPago )?$formaPago->objFormaPago->formaPago:"").": "?> <?= Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $formaPago->valor, Yii::app()->params->formatoMoneda['moneda']); ?></span><br/>
      <?php endforeach;?>
    <?php endif;?>

    <?php if (!$lectura) : ?>
      <?php echo CHtml::link('Pagar', $this->createUrl('/carro/pagar'), array('class' => 'btn btn-primary btn-lg', 'role' => "button")); ?>
    <?php endif; ?>
  </div>

</div>
