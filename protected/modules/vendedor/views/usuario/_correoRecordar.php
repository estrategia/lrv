<div style="height: 20px;"></div>
<p>
    <span style="font-size:15pt; color:#b10000;text-align:left;">¡Hola!</span>
    <br/>
    <span style="font-size:15pt;color:#b10000;"><?php echo "$objUsuario->nombre" ?></span>
</p>
<div style="height: 20px;"></div>
<p>Estos son tus datos para volver a ingresar:</p>
<p>
    Usuario: <?php echo $objUsuario->usuario?><br/>
    Clave: <?php echo $password?>
</p>
<p>
    Para ingresar al programa de venta asistida haz click <a href='<?php echo $this->createAbsoluteUrl('/vendedor')?>'>Aqu&iacute;</a>
</p>