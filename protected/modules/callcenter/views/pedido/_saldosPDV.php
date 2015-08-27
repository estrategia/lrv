<?php
    $encabezado=$respuesta[0];
    $cuerpo=$respuesta[1];

    if(count($cuerpo)>0): ?>
    <br/>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <?php for($i=0;$i<count($encabezado);$i++): ?>
            <th> <?php echo $encabezado[$i]; ?></th> 
            <?php endfor; ?>
        </tr>
        <?php for($i=0;$i<count($cuerpo);$i++): ?>
            <tr>
                <td><?php echo $cuerpo[$i]->CODIGO; ?></td> 
                <td><?php echo $cuerpo[$i]->DESCRIPCION; ?></td> 
                <td>(<?php echo $cuerpo[$i]->CANTIDAD_PEDIDA.") ";if($cuerpo[$i]->SALDO_3>=$cuerpo[$i]->CANTIDAD_PEDIDA){?><i class="glyphicon glyphicon-ok"></i><?php }else{?><i class="glyphicon glyphicon-remove"></i><?php }; ?> (<?php echo $cuerpo[$i]->SALDO_3; ?>)</td> 
                <td>(<?php echo $cuerpo[$i]->CANTIDAD_PEDIDA.") ";if($cuerpo[$i]->SALDO_4>=$cuerpo[$i]->CANTIDAD_PEDIDA){?><i class="glyphicon glyphicon-ok"></i><?php }else{?><i class="glyphicon glyphicon-remove"></i><?php }; ?> (<?php echo $cuerpo[$i]->SALDO_4; ?>)</td> 
                <td>(<?php echo $cuerpo[$i]->CANTIDAD_PEDIDA.") ";if($cuerpo[$i]->SALDO_5>=$cuerpo[$i]->CANTIDAD_PEDIDA){?><i class="glyphicon glyphicon-ok"></i><?php }else{?><i class="glyphicon glyphicon-remove"></i><?php }; ?> (<?php echo $cuerpo[$i]->SALDO_5; ?>)</td> 
                <td>(<?php echo $cuerpo[$i]->CANTIDAD_PEDIDA.") ";if($cuerpo[$i]->SALDO_6>=$cuerpo[$i]->CANTIDAD_PEDIDA){?><i class="glyphicon glyphicon-ok"></i><?php }else{?><i class="glyphicon glyphicon-remove"></i><?php }; ?> (<?php echo $cuerpo[$i]->SALDO_6; ?>)</td> 
                <td>(<?php echo $cuerpo[$i]->CANTIDAD_PEDIDA.") ";if($cuerpo[$i]->SALDO_7>=$cuerpo[$i]->CANTIDAD_PEDIDA){?><i class="glyphicon glyphicon-ok"></i><?php }else{?><i class="glyphicon glyphicon-remove"></i><?php }; ?> (<?php echo $cuerpo[$i]->SALDO_7; ?>)</td> 
                <td>(<?php echo $cuerpo[$i]->CANTIDAD_PEDIDA.") ";if($cuerpo[$i]->SALDO_8>=$cuerpo[$i]->CANTIDAD_PEDIDA){?><i class="glyphicon glyphicon-ok"></i><?php }else{?><i class="glyphicon glyphicon-remove"></i><?php }; ?> (<?php echo $cuerpo[$i]->SALDO_8; ?>)</td>
            </tr>
        <?php endfor; ?>
    </table>
     <?php else: 
         echo "SU BUSQUEDA NO GENERÓ RESULTADOS";
     endif; ?>