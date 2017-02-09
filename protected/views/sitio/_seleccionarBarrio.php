<div data-role='page' id='page-ubicacion-barrio'>
    <div data-role='main' class='ui-content'>
        <div class="page-header center">
            <h3 class="page-title center">Selecciona la ciudad y el barrio donde deseas que entreguemos el pedido</h3>
            <select id="selector-ciudad"style="width: 100%;" required>
                <option value="">Seleccione ciudad ...</option>
                <?php foreach ($ciudades as $ciudad): ?>
                    <option value="<?php echo $ciudad->codigoCiudad ?>"><?php echo $ciudad->nombreCiudad ?></option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="barrio" placeholder="Escribe el nombre del barrio">
            <div id="ubicacion-barrios-respuesta">
            </div>
        </div>
        <div class="page-footer center">
          <button class="ui-btn ui-btn-r ui-corner-all ui-shadow" data-role="ubicacion-barrio">Buscar</button>
          <a href="" class="ui-btn ui-btn-n ui-corner-all ui-shadow" data-rel="back">Cancelar</a>
        </div>
    </div>
</div>
