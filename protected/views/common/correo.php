<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es" />
        <meta content="es" http-equiv="content-language">
        <meta charset="utf-8">
    </head>
    <body>
        <table cellspacing="0" cellpadding="0" border="0" width="690" align="center">
            <tbody style="text-align:justify;font-size:10.5pt;font-family:Helvetica,sans-serif;color:rgb(51,51,51)">
                <tr>
                    <td>
                        <img style="display: block;" src="<?php echo CController::createAbsoluteUrl('/')?>/images/mailing_header.png"> 
                   <!--     <img style="display: block; width: 100%;height: 30%;" src="http://m.larebajavirtual.com/images/mailing_header.png"> -->
                    </td>
                </tr>
                <tr>
                    <td style="padding-left: 5%; padding-right: 5%">
                        <?= $contenido ?>
                        <div style="height: 20px;"></div>
                        <p style="font-size:13.5pt;color:rgb(102,102,102)">
                            <strong>Cordialmente</strong>
                            <br/>
                            <span style="color: #888888;"><strong>La Rebaja Virtual</strong></span>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="height: 20px;"></div>
                        <img style="display: block;" src="<?php echo CController::createAbsoluteUrl('/')?>/images/mailing_footer.png"> 
                       <!-- <img style="display: block; width: 100%;height: auto;" src="http://m.larebajavirtual.com/images/mailing_footer.png"> -->
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>