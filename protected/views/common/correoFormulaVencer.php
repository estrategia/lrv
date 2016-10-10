<div style="height: 20px;"></div>

<h1 style="text-align:left;color:#FB1818;font-family:Arial;font-size:22px">Hola <?php echo utf8_decode($objFormula['objUsuario']->nombre." ".$objFormula['objUsuario']->apellido) ?></h1>
<br/>

<div>
    Es para nosotros un gran placer informarte que hay productos de tu f&oacute;rmula m&eacute;dica est&aacute;n por vencer:
</div>
<div style="height: 20px;"></div>

  <table style="width:100%;border-radius:4px 4px 4px 4px;margin-bottom:20px;border-spacing:0;font-size:14px;border:1px #dddddd solid;color:#666666">
        <tbody>
            <tr>
                <th style="background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center">Producto</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Cantidad del M&eacute;dico</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Dosis</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Intervalo</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">D&iacute;as restantes</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Fecha de vencimiento</th>
            </tr>
<?php foreach($objFormula['listProductos'] as $producto):?>
	<tr>
	    <td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px" >
	        <p>
	           <img class="CToWUd" width="70" height="70" align="left" src="<?php echo "http://www.larebajavirtual.com" . $producto['objProducto']->rutaImagen(); ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
	        </p>
	        <p style="margin:0">
	                <b><?php echo $producto['objProducto']->descripcionProducto ?></b>
	            
	        </p>
	        <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">Codigo: <?php echo $producto['objProducto']->codigoProducto ?></p>
	        <p style="color:#666666;font-size:12px;line-height:16px"></p>
    	</td>
    	<td><?= $producto['objFormulaProducto']->cantidad?></td>
    	<td><?= $producto['objFormulaProducto']->dosis?></td>
    	<td><?= $producto['objFormulaProducto']->intervalo?></td>
    	<td><?= $producto['objFormulaProducto']->getDiasRestantes()?></td>
    	<td><?= $producto['objFormulaProducto']->getDiaVencimiento()?></td>
    </tr>
<?php endforeach;?>
<div>
    Si deseas realizar el pedido recuerda contactar a cualquier agente para realizar tu pedido.
</div>