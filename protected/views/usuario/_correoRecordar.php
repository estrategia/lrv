<div style="height: 20px;"></div>
<p>
    <span style="font-size:15pt; color:#b10000;text-align:left;">¡Hola!</span>
    <br/>
    <span style="font-size:15pt;color:#b10000;"><?php echo "$objUsuario->nombre $objUsuario->apellido" ?></span>
</p>
<div style="height: 20px;"></div>
<p>Restablece tu contraseña dando clic en el siguiente enlace:<br><?php echo CHtml::link($this->createAbsoluteUrl('usuario/restablecer'), $this->createAbsoluteUrl('usuario/restablecer', array('codigo' => $objUsuario->objUsuarioExtendida->recuperacionCodigo)), array('target' => '_blank', 'style' => "color:#f9a33d;font-family:Helvetica,sans-serif;font-size:13px;color:#f9a33d;")); ?></p>
<p>
    Ten en cuenta que este vínculo solo estará activo durante 24 horas desde el momento de su creación. 
    Una vez que este límite de tiempo finalice, el enlace caducará y deberás volver a enviar la solicitud de cambio de contraseña desde 
    <?php echo CHtml::link(Yii::app()->params->urlSitio, $this->createAbsoluteUrl('/'), array('target' => '_blank', 'style' => "font-size:13px; color:#BDBDBD")); ?>.
</p>
<p>
    También puedes escribirnos directamente a <?php echo CHtml::link(Yii::app()->params->clienteFiel['correo'], "mailto:" . Yii::app()->params->clienteFiel['correo'], array('target' => '_blank', 'style' => "font-size:13px; color:#BDBDBD")); ?> 
    o llamarnos a la línea de atención al cliente 
    <span style="font-size:13px; color:#BDBDBD;"><?php echo Yii::app()->params->clienteFiel['telefono'] ?></span>.
</p>