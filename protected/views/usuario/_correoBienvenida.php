<div style="height: 20px;"></div>
<p>
    <span style="font-size:15pt; color:#b10000;text-align:left;">Bienvenido</span>
    <br/>
    <span style="font-size:15pt;color:#b10000;"><?php echo "$objUsuario->nombre $objUsuario->apellido" ?></span>
</p>
<div style="height: 20px;"></div>
<?= $objUsuario->objPerfil->mensajeBienvenida ?>