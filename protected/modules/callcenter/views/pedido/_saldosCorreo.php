<?php

    if($respuesta!=null):
        

        $encabezado=$respuesta[0];
        $cuerpo=$respuesta[1];

        if(count($cuerpo)>0): ?>
                            <br/>
                            <table cellpadding="7" border="0" style="border-left:1px solid #cccccc;border-right:1px solid #cccccc;border-top:1px solid #cccccc;border-bottom: 1px solid #cccccc;color:#666666;margin-top:20px;width:100%; font-size: 14px">
                                <tr style="text-align: center;vertical-align:middle; background-color:#f9f9f9;color:#ff0000">
                                    <?php for($i=0;$i<count($encabezado);$i++): ?>
                                    <th> <?php echo $encabezado[$i]; ?></th> 
                                    <?php endfor; ?>
                                </tr>
                                <?php for($i=0;$i<count($cuerpo);$i++): ?>
                                    <tr style="vertical-align:middle; <?php echo ($i % 2 != 0 ? "background-color:#f9f9f9;" : "")?>">
                                        <td><?php echo $cuerpo[$i]['CODIGO']; ?></td> 
                                        <td><?php echo $cuerpo[$i]['DESCRIPCION']; ?></td> 
                                        <td>(<?php echo $cuerpo[$i]['CANTIDAD_PEDIDA'].") ";if($cuerpo[$i]['SALDO_3']>=$cuerpo[$i]['CANTIDAD_PEDIDA']){?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/checkmark.png'/><?php }else{?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/mistake.png'/><?php }; ?> (<?php echo $cuerpo[$i]['SALDO_3']; ?>)</td> 
                                        <td>(<?php echo $cuerpo[$i]['CANTIDAD_PEDIDA'].") ";if($cuerpo[$i]['SALDO_4']>=$cuerpo[$i]['CANTIDAD_PEDIDA']){?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/checkmark.png'/><?php }else{?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/mistake.png'/><?php }; ?> (<?php echo $cuerpo[$i]['SALDO_4']; ?>)</td> 
                                        <td>(<?php echo $cuerpo[$i]['CANTIDAD_PEDIDA'].") ";if($cuerpo[$i]['SALDO_5']>=$cuerpo[$i]['CANTIDAD_PEDIDA']){?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/checkmark.png'/><?php }else{?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/mistake.png'/><?php }; ?> (<?php echo $cuerpo[$i]['SALDO_5']; ?>)</td> 
                                        <td>(<?php echo $cuerpo[$i]['CANTIDAD_PEDIDA'].") ";if($cuerpo[$i]['SALDO_6']>=$cuerpo[$i]['CANTIDAD_PEDIDA']){?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/checkmark.png'/><?php }else{?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/mistake.png'/><?php }; ?> (<?php echo $cuerpo[$i]['SALDO_6']; ?>)</td> 
                                        <td>(<?php echo $cuerpo[$i]['CANTIDAD_PEDIDA'].") ";if($cuerpo[$i]['SALDO_7']>=$cuerpo[$i]['CANTIDAD_PEDIDA']){?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/checkmark.png'/><?php }else{?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/mistake.png'/><?php }; ?> (<?php echo $cuerpo[$i]['SALDO_7']; ?>)</td> 
                                        <td>(<?php echo $cuerpo[$i]['CANTIDAD_PEDIDA'].") ";if($cuerpo[$i]['SALDO_8']>=$cuerpo[$i]['CANTIDAD_PEDIDA']){?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/checkmark.png'/><?php }else{?><img src='<?php echo CController::createAbsoluteUrl('/')?>/images/iconos/mistake.png'/><?php }; ?> (<?php echo $cuerpo[$i]['SALDO_8']; ?>)</td>
                                    </tr>
                                <?php endfor; ?>
                            </table>
            <?php else: 
                    echo "SU BUSQUEDA NO GENERÓ RESULTADOS";
                endif; ?>
     <?php endif; 