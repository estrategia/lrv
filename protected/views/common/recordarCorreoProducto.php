
    <td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;border-right:1px solid #dddddd;vertical-align:top;padding:8px" >
        <p>
            <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>">
                <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . $position->objProducto->rutaImagen(); ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
            </a>
        </p>
        <p style="margin:0">
            <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>" style="color:#0088cc;text-decoration:none">
                <b><?php echo $position->objProducto->descripcionProducto ?></b>
            </a>
        </p>
        <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">Codigo: <?php echo $position->objProducto->codigoProducto ?></p>
        <p style="color:#666666;font-size:12px;line-height:16px"></p>
    </td>
   