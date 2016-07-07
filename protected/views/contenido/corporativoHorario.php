<div class="container">                
    <p class="center"> 
        <span style="font-size: 16pt"><b><span style="font-family: Arial,Helvetica,sans-serif;">ATENDEMOS LAS 24 HORAS DEL DIA</span></b></span> 
    </p>
    <br>


    <p class="center"> 
        <span style="font-size: 14pt"><b><span style="font-family: Arial,Helvetica,sans-serif;">Horario de Entrega <?php echo $objHorarioCiudadSector === null ? "" : $objHorarioCiudadSector->objCiudad->nombreCiudad ?> </span></b></span> 
    </p>
    <br>

    <?php if ($objHorarioCiudadSector === null): ?>
        <p align="justify"> 
            <span style="font-size: 12pt">
                <span style="font-family: Arial,Helvetica,sans-serif">
                    No contamos con horarios de atenci&oacute;n
                </span>
            </span>
        </p>
    <?php elseif ($objHorarioCiudadSector->sadCiudadSector == 0): ?>
        <p align="justify"> 
            <span style="font-size: 12pt">
                <span style="font-family: Arial,Helvetica,sans-serif">
                    En tu ciudad no contamos con Servicio a Domicilio, por lo que los pedidos realizados a traves de esta p&aacute;gina deben ser recogidos en uno de nuestros Puntos de Venta. 
                    El Punto de Venta a donde debes pasar a recoger tu pedido ser&aacute; notificado por nuestro Centro de Contactos despu&eacute;s de realizado tu compra. 
                    <br> <br> 
                    El horario de Entrega es de 
                    Lunes a Sabado de 
                    <span style="color: #E10019; font-weight: bold;"> 
                        <?php echo $objHorarioCiudadSector->horaInicioLunesASabado ?> a <?php echo $objHorarioCiudadSector->horaFinLunesASabado ?>
                    </span> 
                    <?php if(!empty($objHorarioCiudadSector->horaInicioAdicionalLunesASabado) && !empty($objHorarioCiudadSector->horaFinAdicionalLunesASabado)): ?>
                     y de 
                     <span style="color: #E10019; font-weight: bold;"> 
                        <?php echo $objHorarioCiudadSector->horaInicioAdicionalLunesASabado ?> a <?php echo $objHorarioCiudadSector->horaFinAdicionalLunesASabado ?>
                    </span> 
                    <?php endif;?>
                    y Domingos/festivos de 
                    <span style="color: #E10019; font-weight: bold;"> 
                        <?php echo $objHorarioCiudadSector->horaInicioDomingoFestivo ?> a <?php echo $objHorarioCiudadSector->horaFinDomingoFestivo ?>
                    </span> 
                    <?php if(!empty($objHorarioCiudadSector->horaInicioAdicionalDomingoFestivo) && !empty($objHorarioCiudadSector->horaFinAdicionalDomingoFestivo)): ?>
                     y de 
                     <span style="color: #E10019; font-weight: bold;"> 
                        <?php echo $objHorarioCiudadSector->horaInicioAdicionalDomingoFestivo ?> a <?php echo $objHorarioCiudadSector->horaFinAdicionalDomingoFestivo ?>
                    </span> 
                    <?php endif;?>
                </span>

            </span>
        </p>
    <?php elseif ($objHorarioCiudadSector->sadCiudadSector == 1): ?>
        <p class="center"> 
            <span style="font-size: 12pt">
                <span style="font-family: Arial,Helvetica,sans-serif">
                    El horario de despacho para tu ciudad es de 
                    Lunes a Sabado de 
                    <span style="color: #E10019; font-weight: bold;"> 
                        <?php echo $objHorarioCiudadSector->horaInicioLunesASabado ?> a <?php echo $objHorarioCiudadSector->horaFinLunesASabado ?>
                    </span> 
                    <?php if(!empty($objHorarioCiudadSector->horaInicioAdicionalLunesASabado) && !empty($objHorarioCiudadSector->horaFinAdicionalLunesASabado)): ?>
                     y de 
                     <span style="color: #E10019; font-weight: bold;"> 
                        <?php echo $objHorarioCiudadSector->horaInicioAdicionalLunesASabado ?> a <?php echo $objHorarioCiudadSector->horaFinAdicionalLunesASabado ?>
                    </span> 
                    <?php endif;?>
                    y Domingos/festivos de 
                    <span style="color: #E10019; font-weight: bold;"> 
                        <?php echo $objHorarioCiudadSector->horaInicioDomingoFestivo ?> a <?php echo $objHorarioCiudadSector->horaFinDomingoFestivo ?>
                    </span> 
                    <?php if(!empty($objHorarioCiudadSector->horaInicioAdicionalDomingoFestivo) && !empty($objHorarioCiudadSector->horaFinAdicionalDomingoFestivo)): ?>
                     y de 
                     <span style="color: #E10019; font-weight: bold;"> 
                        <?php echo $objHorarioCiudadSector->horaInicioAdicionalDomingoFestivo ?> a <?php echo $objHorarioCiudadSector->horaFinAdicionalDomingoFestivo ?>
                    </span> 
                    <?php endif;?>
                </span>

            </span>
        </p>
    <?php endif; ?>


    <div class="space-3"></div>
    <span style="font-size: 12pt">
        <span style="font-family: Arial,Helvetica,sans-serif">
            <p align="justify"> 
                <b>Para tener en cuenta</b>: 
            </p> 
            <ol> 
                <li>El tiempo de entrega de su pedido se puede ver afectado por la disponibilidad de productos.</li>
                <li>El pedido se puede ver afectado por el movimiento de inventario de nuestros puntos de venta.</li>
                <li>Los pedidos se despachan solo en el territorio Colombiano, donde tengamos presencia con puntos de venta La Rebaja Droguer&iacute;as.</li>
                <li>Los pagos solo se pueden realizar En Efectivo - Contra Entrega, Con Tarjeta CrediRebaja, a trav&eacute;s de datafono (Tarjeta Visa D&eacute;bito y Cr&eacute;dito, Tarjeta MarterCard Cr&eacute;dito y Tarjeta D&eacute;bito Maestro.).</li>
                <li>No se Reciben Pagos con Tarjetas Internacionales.</li>
            </ol>

        </span>
    </span>
</div>