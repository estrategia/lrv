<div class="modal animated bounceIn" id="modal-ubicacion-barrios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
              <div class="container">
                <div class="space-2"></div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <select id="selector-ciudad"style="width: 100%;" required>
                          <option value="">Seleccione ciudad ...</option>
                          <?php foreach ($ciudades as $ciudad): ?>
                              <option value="<?php echo $ciudad->codigoCiudad ?>"><?php echo $ciudad->nombreCiudad ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    
                    <div class="form-group col-md-6">
                      <input type="text" class="form-control input-sm" name="barrio" placeholder="Escribe el nombre del barrio">
                    </div>
                  </div>
                <div class="space-1"></div>
                <button class="btn" data-role="ubicacion-barrio">Aceptar</button>
                <button class="btn" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
        </div>
    </div>
</div>


<script>
  $('#selector-ciudad').select2();
</script>