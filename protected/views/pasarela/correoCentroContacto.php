<!DOCTYPE html>
<head>
    <meta charset="utf-8">
</head>
<body style="background: #FFFFFF url(http://www.larebajavirtual.com/pasarela/html/img/fondohome.jpg) repeat-x center top; font: 0.81em/150% Arial, Helvetica, sans-serif; color: #333333;">
    <div id="pagewrap">
        <header style="position: relative; height: 65px; text-align: center;">
            <a href="http://www.larebajavirtual.com"><img src="http://www.larebajavirtual.com/pasarela/html/img/logotop.png" alt="logo" border="0" id="logo"  ></a>
        </header>
        <div style="background: #fff; margin: 30px auto; padding: 20px 35px; width: 600px; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px; -webkit-box-shadow: 0 1px 3px rgba(0,0,0,.4); -moz-box-shadow: 0 1px 3px rgba(0,0,0,.4); box-shadow: 0 1px 3px rgba(0,0,0,.4);">
            <article style="display: inline-block;">	
                <h2 style="background: #FB1818; border-radius: 5px; padding: 5px 5px; border-top: 1px solid #B10F0F; border-bottom: 1px solid #B10F0F; text-align: center; color: #FFFFFF; margin-bottom: 20px;">Pasarela de Pagos: Transacción con Problemas</h2>	
                <figure style="float: left; margin: 5px; max-width: 260px;"> 
                    <img src="http://www.larebajavirtual.com/pasarela/html/img/revision.png"> 
                </figure>
                <p style="margin: 0 0 1.2em; padding: 0; text-align: justify;">
                    Tu compra <strong>No. <?=$numeroPedido?></strong> realizada en <strong>La Rebaja Virtual</strong> y pagada a través de la pasarela de pagos PayuLatam por valor de <strong><?=Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $valorCompra, Yii::app()->params->formatoMoneda['moneda']);?></strong> ha sido <?=$estado?>.<br>
                    <br>
                    Se ha presentado un problema en la actualización de la base de datos, por tal motivo la transacción debe ser verificada en el módulo de administración.
                </p>        
            </article>
        </div>
    </div>
</body>
</html>