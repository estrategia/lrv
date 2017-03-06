<?php $this->pageTitle = Yii::app()->name . " - " . $objProducto->descripcionProducto; ?>

<div class="ui-content c_cont_detail_prod">
    <h1><?php echo $objProducto->descripcionProducto ?></h1>
    <h2><?php echo $objProducto->presentacionProducto ?></h2>
    <h2 class="cdt_prod_spc">Código: <?php echo $objProducto->codigoProducto ?></h2>

    <div class="cdt_line_spc"><span></span></div>

    <div id="owl-productodetalle-<?php echo $objProducto->codigoProducto ?>" class="owl-carousel owl-theme owl-productodetalle">
        <?php $listImagenes = $objProducto->listImagenesGrandes() ?>
        <?php if (empty($listImagenes)): ?>
            <div class="item"><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['grande']; ?>" alt="<?php echo $objProducto->descripcionProducto ?>" title="<?php echo $objProducto->descripcionProducto ?>"></div>
        <?php else: ?>
            <?php foreach ($listImagenes as $imagen): ?>
                <div class="item"><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['grande']] . $imagen->rutaImagen; ?>" alt="<?php echo $imagen->nombreImagen ?>" title="<?php echo $imagen->tituloImagen ?>"></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="cdt_line_spc"><span></span></div>

    <div id="raty-lectura-producto-<?php echo $objProducto->codigoProducto ?>" data-role="raty" data-readonly="true" data-score="<?php echo $objProducto->getCalificacion() ?>" class="clst_cal_str"></div>
   <!--  <p>Cantidad agregada al carro: <?php echo $cantidadCarro ?></p> -->

	<?php if($unidadesDisponibles > 0):?>
	    <table  class="ui-responsive ctbl_prod_frc">
	        <thead class="ctbl_head">
	            <tr>
	                <th>
	        <div class="ctbl_presentacion">
	            <label data-icon="false" class="ctbl_chk_lb">Entrega en condiciones normales <a href='#' onclick='alerta("Los productos agregados ser&aacute;n entregados seg&uacute;n la programaci&oacute;n que realices al momento de finalizar la compra.");'>?</a></label>
	        </div>
	        </th>
	        <th  align="right">
	        <div class="frc_btn_cant">
	            <input type="number" placeholder="0" value="<?php echo $cantidadUbicacion ?>" id="cantidad-producto-ubicacion-<?php echo $objProducto->codigoProducto ?>" onchange="subtotalProductoBodega(<?php echo $objProducto->codigoProducto ?>);" class="dtl_cant_prod_01">
	        </div>
	        </th>
	        <th>
	        <div class="ctbl_subtotal">
	            <span class="txt_sub">Subtotal</span> <span id="subtotal-producto-ubicacion-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * $cantidadUbicacion, Yii::app()->params->formatoMoneda['moneda']); ?></span>
	        </div>
	        </th>
	        </tr>
	        </thead>
	        <tbody>
	            <tr class="ctbl_tl">
	                <td style="text-align:left;">Precio regular</td>
	                <td>Ahorro</td>
	                <td style="text-align:right;"><span>Precio</span></td>
	            </tr>
	            <tr>
	                <td class="txt_pre_lst"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></td>
	                <td class="txt_ahor"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
	                <td class="txt_pre"  align="right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
	            </tr>
	        </tbody>
	    </table>
	<?php endif;?>
    <table class="ui-responsive ctbl_prod_frc ctbl_color_prod_frc">
        <thead class="ctbl_head_g2">
            <tr>
                <th>
        <div class="ctbl_presentacion">
            <label data-icon="false" class="ctbl_chk_lb">Entrega en <?php echo Yii::app()->shoppingCart->getDeliveryStored() ?> horas <a href='#' onclick='alerta("Los productos agregados ser&aacute;n entregados en el tiempo estipulado y tendr&aacute;n un cobro adicional de env&iacute;o que ser&aacute; calculado al final de la compra.");'><span>?</span></a> </label>
        </div>
        </th>
        <th  align="right">
        <div class="frc_btn_cant">
            <input type="number" placeholder="0" value="<?php echo $cantidadBodega ?>" id="cantidad-producto-bodega-<?php echo $objProducto->codigoProducto ?>" onchange="subtotalProductoBodega(<?php echo $objProducto->codigoProducto ?>);">
        </div>
        </th>
        <th>
        <div class="ctbl_subtotal">
            <span class="txt_sub">Subtotal</span> <span id="subtotal-producto-bodega-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * $cantidadBodega, Yii::app()->params->formatoMoneda['moneda']); ?></span>
        </div>
        </th>
        </tr>
        </thead>
        <tbody>
            <tr class="ctbl_tl">
                <td style="text-align:left;">Precio regular</td>
                <td>Ahorro</td>
                <td style="text-align:right;"><span>Precio</span></td>
            </tr>
            <tr>
                <td class="txt_pre_lst"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                <td class="txt_ahor"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getAhorro(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                <td class="txt_pre"  align="right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?></td>
            </tr>
        </tbody>
    </table>

    <div class="cprod_frc_total">Total: <span id="total-producto-<?php echo $objProducto->codigoProducto ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * ($cantidadBodega + $cantidadUbicacion), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
    <?php echo CHtml::link('Añadir al carro', '#', array('data-producto' => $objProducto->codigoProducto, 'data-cargar' => 3, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r btn_frc_add_car')); ?>
    <div class="cdtl_div_ln"></div>

    <?php if ($objProducto->codigoEspecial !== null && $objProducto->codigoEspecial != 0): ?>
        <div class="cdt_line_spc"><span></span></div>
        <p class="cdtl_prod_txt_ley">
            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['codigoEspecial'] . $objProducto->objCodigoEspecial->rutaIcono; ?>" >
            <?php echo $objProducto->objCodigoEspecial->descripcion ?>
        </p>
    <?php endif; ?>
</div>

<div class="ui-content ">
	<div data-role='collapsible' data-iconpos='right' data-collapsed-icon='carat-d' data-expanded-icon='carat-u' class='c_cont_dtl_prod ui-nodisc-icon ui-alt-icon'>
	      <h3>POL&Iacute;TICAS DE CAMBIOS Y DEVOLUCIONES.</h3>
	      <p>
	      	<h4>RETRACTO (PRODUCTO RECIBIDO PERO NO LO QUIERO)</h4>
						<p>El costo de env&iacute;o del PRODUCTO al vendedor lo asume: COMPRADOR <br/>
						Tiempo solicitud retracto: 5 d&iacute;as<br/>
						Tiempo de respuesta: 5 d&iacute;as<br/>
						</p>

					<h4>DEVOLUCI&Oacute;N (NO RECIB&Iacute; EL PRODUCTO/RECIB&Iacute; PRODUCTO MALO)</h4>
						<p>El costo de env&iacute;o del PRODUCTO al vendedor lo asume: Vendedor <br/>
						Costo de env&iacute;o al cliente lo asume: Vendedor <br/>
						Tiempo solicitud devoluci&oacute;n: 5 d&iacute;as <br/>
						Tiempo de respuesta: 5 d&iacute;as <br/>
						</p>
					<h4> GARANT&Iacute;A (EL PRODUCTO SE AVERI&Oacute;)</h4>
						<p>El costo de env&iacute;o del PRODUCTO al vendedor lo asume: Vendedor<br/>
						El costo de env&iacute;o del PRODUCTO al cliente lo asume: Vendedor<br/>
						Solicitud garant&iacute;a, por producto<br/>
						Tiempo de respuesta: 30 d&iacute;as despu&eacute;s de recibido el PRODUCTO<br/>
						<p/>
	      </p>
	</div>
</div>
