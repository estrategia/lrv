<html>
    <head>
        <title>Recordatorio de contraseña</title>
    </head>
    <body>
        <div style="width: 60%; margin: 0 auto; padding: 10px; border: 0px solid transparent;">
            <table align="center" style="width:700px">
                <tbody style="text-align:justify;font-size:10.5pt;font-family:Helvetica,sans-serif;color:rgb(51,51,51)">
                    <tr>
                        <td style="border-bottom:1pt dashed #ededed">
                            <span style="color:rgb(153,153,153);font-size:12px;">Este es un mensaje de correo electrónico automático, no lo respondas.</span>
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img style="float:right" src="https://ci5.googleusercontent.com/proxy/kLOgxNxc_XFgu1O1WMAWLPBwb3hSzCrsjNBovXHL0UXfa8pSVFLp8AKo5UxGRDK-RGlMI1ThtN6owVQrSrd7R83wTEreXYA=s0-d-e1-ft#http://www.larebajavirtual.com/images/logotop.png">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <span style="font-size:15pt; color:rgb(153,153,153);text-align:left;">
                                    ¡Hola!
                                </span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h1 style="font-size:15pt;color:rgb(153,153,153);">
                                Sr(a). <?php echo "$usuario->nombre $usuario->apellido" ?>
                            </h1>
                            <p>
                                Restablece tu contraseña dando clic en el siguiente enlace:
                            </p>
                            <p style="text-align:center">
                                <?php echo CHtml::link($this->createAbsoluteUrl('usuario/restablecer'), $this->createAbsoluteUrl('usuario/restablecer', array('codigo' => $usuario->objUsuarioExtendida->recuperacionCodigo)), array('target' => '_blank', 'style' => "color:rgb(17,85,204);font-family:Helvetica,sans-serif;font-size:13px;color:rgb(0,176,240);")); ?>
                            </p>
                            <p>
                                Ten en cuenta que este vínculo solo estará activo durante 24 horas desde el momento de su creación. 
                                Una vez que este límite de tiempo finalice, el enlace caducara  y deberás volver a enviar la solicitud de cambio de contraseña desde 
                                <?php echo CHtml::link(Yii::app()->params->urlSitio, $this->createAbsoluteUrl('/'), array('target' => '_blank', 'style' => "font-size:13px; color:rgb(0,176,240)")); ?>.
                                <br/>
                                También puedes escribirnos directamente a 
                                <?php echo CHtml::link(Yii::app()->params->clienteFiel['correo'], "mailto:" .Yii::app()->params->clienteFiel['correo'], array('target' => '_blank', 'style' => "font-size:13px; color:rgb(0,176,240)")); ?> 
                                
                                o llamarnos a la línea de atención al cliente 
                                <a style="font-size:13px; color:rgb(0,176,240)" href="#"><?php echo Yii::app()->params->clienteFiel['telefono'] ?></a>.
                            </p>
                            <br/>
                            <br/>
                            <p style="font-size:13.5pt;color:rgb(102,102,102)">
                                <strong>Cordialmente</strong>
                                <br/>
                                <span style="color: #888888;"><strong>La Rebaja Virtual</strong></span>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>