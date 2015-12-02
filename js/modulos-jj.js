$(document).on('change', "select[data-role='modulo-ciudad']", function(){

    var codigoCiudad=$('#select-ciudad-modulo').val();
     $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/contenido/comprobarciudad',
        data: {codigoCiudad : codigoCiudad},
        beforeSend: function(){

        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                if(data.code == 1){
                    $("#div-sector-modulo").html(data.htmlResponse);
                    $("#div-sector-modulo").css('display','block');
                    $("#sector-select").val(1);
                }else if(data.code == 2){
                    $("#div-sector-modulo").css('display','none');
                    $("#sector-select").val(0);
                }
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('click', "button[data-role='add-sector-ciudad']", function(){

    var codigoCiudad=$('#select-ciudad-modulo').val();
    var codigoSector=$('#sector-modulo').val();
    var idModulo = $(this).attr('data-modulo');
    
    if($("#sector-select").val() == 0){
        codigoSector = 0;
    }
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/guardarCiudadSector',
        data: {codigoCiudad : codigoCiudad,codigoSector: codigoSector, idModulo: idModulo},
        dataType: 'json',
        beforeSend: function(data){
           
        },
        success: function(data){
            if (data.result == "ok") {
                bootbox.alert("Ciudad/Sector adicionado con éxito");
                $("#lista-sectores").html(data.response);
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('click', "a[data-role='eliminar-sector-modulo']", function(){
    var idSectorCiudad = $(this).attr("data-modulo-sector");
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/eliminarCiudadSector',
        data: {idModuloSectorCiudad : idSectorCiudad},
        dataType: 'json',
        beforeSend: function(data){
           
        },
        success: function(data){
            if (data.result == "ok") {
                bootbox.alert("Ciudad/Sector eliminado con éxito");
                $("#lista-sectores").html(data.response);
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('change', "select[data-role='ubicacion-modulo']", function(){

    var ubicacion=$('#UbicacionModulos_ubicacion').val();
     $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/contenido/formUbicacionCategoria',
        data: {ubicacion : ubicacion},
        beforeSend: function(){

        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                    $("#ubicacion-categoria").html(data.response);
                    $("#ubicacion-categoria").css('display','block');
            }else{
                    $("#ubicacion-categoria").css('display','none');
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('click', "a[data-role='eliminar-modulo-ubicacion']", function(){

    var idUbicacion = $(this).attr("data-modulo-ubicacion");
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/eliminarUbicacion',
        data: {ubicacion : idUbicacion},
        beforeSend: function(){

        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                bootbox.alert("Ubicación eliminada con éxito");
                $("#lista-ubicaciones").html(data.response);
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('change', "select[data-role='validar-contenido']", function(){ 
    var tipoContenido=$('#ImagenBanner_tipoContenido').val();
     $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/contenido/formContenidoImagen',
        data: {tipoContenido : tipoContenido},
        beforeSend: function(){

        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                if(data.response === 1){
                    $("#div-contenido-imagen").css('display','block');
                }else{
                    $("#div-contenido-imagen").css('display','none');
                }
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});
$(document).on('click', "a[data-role='modal-contenido']", function(){
    var content=$(this).attr('data-contenido-modal');
    $("#pre-contenido-modal").html(content);
    $('#modal-contenido-visual').modal('show');
});



$(document).on('click', "a[data-role='eliminar-modulo-imagen']", function(){

    var idImagen = $(this).attr("data-modulo-imagen");
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/eliminarImagen',
        data: {idBanner : idImagen},
        beforeSend: function(){

        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                bootbox.alert("Imagen eliminada con éxito");
                $("#lista-imagenes").html(data.response);
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('click', "a[data-role='agregar-modulo-grupo']", function(){

    var idModuloGrupo = $("#idGrupoModulo").val();
    var idModulo = $(this).attr("data-idModulo");
    var accion = $(this).attr("data-accion");
    var orden = $("#orden_"+idModulo).val();
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/configurarModuloGrupo',
        data: {idModuloGrupo : idModuloGrupo, idModulo:idModulo, accion:accion, orden:orden},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result == "ok") {
               $.fn.yiiGridView.update('grid-modulos');
               $("#grid-modulos-adicionados").html(data.response)
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});


$(document).on('click', "a[data-role='modulo-visualizar']", function(){

    var idModulo = $(this).attr("data-modulo");
     $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/contenido/visualizarModulo',
        data: { idModulo:idModulo},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                $("#modal-previsualizar").remove();
                $("#container").append(data.response);
                $(".slide-productos").owlCarousel({
                    items: 4,
                    lazyLoad: true,
                    navigation: true,
                    pagination:false,
                    navigationText: [
                        "<i class='glyphicon glyphicon-chevron-left'></i>",
                        "<i class='glyphicon glyphicon-chevron-right'></i>"
                    ]
                });
                $("#modal-previsualizar").modal('show');
                
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

/******************/
/*  CATEGORIAS    */
/******************/

$(document).on('click', "a[data-role='crear-categoria']", function(){

    var dispositivo = $(this).attr('data-dispositivo');
    var nivel = $(this).attr('data-nivel');
    var idCategoriaRaiz = $(this).attr('data-categoria-raiz');
    var idCategoriaPadre = $(this).attr('data-categoria-padre');
    
     $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/categoria/crearCategoria',
        data: {dispositivo: dispositivo, nivel:nivel, idCategoriaRaiz:idCategoriaRaiz, idCategoriaPadre: idCategoriaPadre},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result == "ok") {
               $("#modal-categoria").remove();
               $("#content").append(data.response);
               $('#modal-categoria').modal('show');
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});


$(document).on('click', "a[data-role='guardar-categoria']", function(){
   //  var form = $("#form-categoria");
     var dispositivo = $(this).attr('data-dispositivo');
     var idCategoriaRaiz = $(this).attr('data-categoria-raiz');
     var idCategoriaPadre = $(this).attr('data-categoria-padre');
   //  var formulario =  new FormData($('#form-categoria')[0] );
     var formulario = document.getElementById("form-categoria");
     
     var campo1 = document.createElement("input");
     campo1.type = 'hidden';
     campo1.value = dispositivo;
     campo1.name = "dispositivo";
     campo1.id = "dispositivo";
     formulario.appendChild(campo1);
     
     var campo2 = document.createElement("input");
     campo2.type = 'hidden';
     campo2.value = idCategoriaRaiz;
     campo2.name = "idCategoriaRaiz";
     campo2.id = "idCategoriaRaiz";
     formulario.appendChild(campo2);
     
     var campo3 = document.createElement("input");
     campo3.type = 'hidden';
     campo3.value = idCategoriaPadre;
     campo3.name = "idCategoriaPadre";
     campo3.id = "idCategoriaPadre";
     formulario.appendChild(campo3);
     
     var campo4 = document.createElement("input");
     campo4.type = 'hidden';
     campo4.value = 'crear';
     campo4.name = "scenario";
     campo4.id = "scenario";
     formulario.appendChild(campo4);
     
     /*form.serialize()+"&dispositivo="+dispositivo+"&idCategoriaRaiz="+idCategoriaRaiz+"&idCategoriaPadre="+idCategoriaPadre+"&scenario=crear"*/
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/categoria/guardarCategoria',
        data:  new FormData(formulario),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
         //   Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result == "ok") {
               $("#div-categorias-tienda").html(data.response);
               $('#modal-categoria').modal('hide');
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }else{
                 $.each(data, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        complete: function(){
         //   Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});


$(document).on('click', "a[data-role='editar-categoria']", function(){
     var dispositivo = $(this).attr('data-dispositivo');
     var idCategoria = $(this).attr('data-categoria');
     var idCategoriaRaiz = $(this).attr('data-categoria-raiz');
     var idCategoriaPadre = $(this).attr('data-categoria-padre');
     var nivel = $(this).attr('data-nivel');
     $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/categoria/editarCategoria',
         data: {dispositivo: dispositivo, nivel:nivel, idCategoriaRaiz:idCategoriaRaiz, idCategoriaPadre: idCategoriaPadre, idCategoria: idCategoria},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result == "ok") {
               $("#modal-categoria").remove();
               $("#content").append(data.response);
               $('#modal-categoria').modal('show');
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('click', "a[data-role='actualizar-categoria']", function(){
     var form = $("#form-categoria");
     var dispositivo = $(this).attr('data-dispositivo');
     var idCategoriaRaiz = $(this).attr('data-categoria-raiz');
     var idCategoriaPadre = $(this).attr('data-categoria-padre');
     var idCategoria = $(this).attr('data-categoria');
     var formulario =  new FormData( document.getElementById('form-categoria') );
    
     var formulario = document.getElementById("form-categoria");
     
     var campo1 = document.createElement("input");
     campo1.type = 'hidden';
     campo1.value = dispositivo;
     campo1.name = "dispositivo";
     campo1.id = "dispositivo";
     formulario.appendChild(campo1);
     
     var campo2 = document.createElement("input");
     campo2.type = 'hidden';
     campo2.value = idCategoriaRaiz;
     campo2.name = "idCategoriaRaiz";
     campo2.id = "idCategoriaRaiz";
     formulario.appendChild(campo2);
     
     var campo3 = document.createElement("input");
     campo3.type = 'hidden';
     campo3.value = idCategoriaPadre;
     campo3.name = "idCategoriaPadre";
     campo3.id = "idCategoriaPadre";
     formulario.appendChild(campo3);
     
     var campo4 = document.createElement("input");
     campo4.type = 'hidden';
     campo4.value = 'actualizar';
     campo4.name = "scenario";
     campo4.id = "scenario";
     formulario.appendChild(campo4);
     
     var campo5= document.createElement("input");
     campo5.type = 'hidden';
     campo5.value = idCategoria;
     campo5.name = "idCategoria";
     campo5.id = "idCategoria";
     formulario.appendChild(campo5);
     
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/categoria/guardarCategoria',
         data:  new FormData(formulario),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result == "ok") {
               $("#div-categorias-tienda").html(data.response);
               $('#modal-categoria').modal('hide');
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }else{
                 $.each(data, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('click', "a[data-role='asociar-categorias']", function(){
 
     var idCategoria = $(this).attr('data-categoria');
     var dispositivo = $(this).attr('data-dispositivo');
     
     $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/categoria/asociarCategorias',
         data: {idCategoria: idCategoria, tipoDispositivo: dispositivo},
        beforeSend: function(){
          //  Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result == "ok") {
               $("#modal-categoria-asociacion").remove();
               $("#content").append(data.response);
               $('#modal-categoria-asociacion').modal('show');
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){
         //   Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('click', "a[data-role='add-categoria-bi']", function(){
 
     var idCategoria = $(this).attr('data-categoria');
     var idCategoriaBi = $(this).attr('data-categoria-bi');
     var dispositivo = $(this).attr('data-dispositivo');
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/categoria/agregarAsociacionCategoria',
         data: {idCategoria: idCategoria, idCategoriaBi:idCategoriaBi, tipoDispositivo:dispositivo },
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result == "ok") {
              //  bootbox.alert(data.response);
                $("#btn-"+idCategoriaBi).html("Añadido");
                $("#div-categorias-tienda").html(data.responseHtml);
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('click', "a[data-role='eliminar-categoria-bi']", function(){
 
     var idCategoria = $(this).attr('data-categoria');
     var idCategoriaBi = $(this).attr('data-categoria-bi');
     var dispositivo = $(this).attr('data-dispositivo');
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/categoria/eliminarAsociacionCategoria',
        data: {idCategoria: idCategoria, idCategoriaBi:idCategoriaBi, tipoDispositivo:dispositivo},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result == "ok") {
              //  bootbox.alert(data.response);
                $("#visible-categoria-bi-"+idCategoriaBi).css('display','none');
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});


$(document).on('click', "button[data-role='busqueda-producto-combo']", function(){
    
    var valorBusqueda = $.trim($("#combo-busqueda-buscar").val());
    if(!valorBusqueda)
    {
        bootbox.alert('Búsqueda no puede estar vacío');
    }
    else
    {
        var idCombo = $(this).attr('data-combo');
        $.ajax({
            type: 'POST',
            async: true,
            url: requestUrl + '/callcenter/combo/buscarproductos',
            data: {busqueda: valorBusqueda, idCombo: idCombo},
            beforeSend: function() {
                $('#modal-productos-busqueda-combo').remove();
                Loading.show();
            },
            success: function(data) {
                $('#container').append(data);
                $('#modal-productos-busqueda-combo').modal('show');
            },
            complete: function() {
                Loading.hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Loading.hide();
                bootbox.alert('Error: ' + jqXHR.responseText);
            }
        });
    }
});

$(document).on('click', "a[data-role='agregar-producto-combo']", function(){
    var producto = $(this).attr("data-producto");
    var idModulo = $(this).attr("data-combo");
    var precio = $("#precio_"+producto).val();
    var self = $(this);
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/agregarproductocombo',
        data: {producto : producto, idCombo : idModulo, precio:precio},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#contenido-productos-lista").html(data.response.htmlProductosAgregados);
                self.attr("disabled", true);
                self.html("Agregado");
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){
            Loading.hide();
        }
    });
});


$(document).on('click', "a[data-role='eliminar-producto-combo']", function(){
    
    var idComboProducto = $(this).attr("data-combo-producto");
    var idCombo =  $(this).attr("data-combo");

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/eliminarproductocombo',
        data: {idComboProducto : idComboProducto, idCombo:idCombo },
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#contenido-productos-lista").html(data.response.htmlProductosAgregados);
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){
            Loading.hide();
        }
    });

});


$(document).on('click', "button[data-role='add-sector-ciudad-combo']", function(){

    var codigoCiudad=$('#select-ciudad-modulo').val();
    var codigoSector=$('#sector-modulo').val();
    var saldo=$('#cantidades-combo').val();
    var idCombo = $(this).attr('data-combo');
    
    if($("#sector-select").val() == 0){
        codigoSector = 0;
    }
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/guardarCiudadSector',
        data: {codigoCiudad : codigoCiudad,codigoSector: codigoSector, idCombo: idCombo, saldo:saldo},
        dataType: 'json',
        beforeSend: function(data){
           
        },
        success: function(data){
            if (data.result == "ok") {
                bootbox.alert("Ciudad/Sector adicionado con éxito");
                $("#lista-sectores").html(data.response);
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('click', "a[data-role='eliminar-combo-sector']", function(){
    var idCombo = $(this).attr("data-combo");
    var codigoSector = $(this).attr("data-sector");
    var codigoCiudad = $(this).attr("data-ciudad");
    
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/eliminarCiudadSector',
        data: {idCombo : idCombo, codigoSector:codigoSector, codigoCiudad:codigoCiudad},
        dataType: 'json',
        beforeSend: function(data){
           
        },
        success: function(data){
            if (data.result == "ok") {
                bootbox.alert("Ciudad/Sector eliminado con éxito");
                $("#lista-sectores").html(data.response);
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});
   
$(document).on('click', "a[data-role='eliminar-imagen-combo']", function(){

    var imagenCombo=$(this).attr('data-imagen-combo');
     
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/eliminarImagenCombo',
        data: {imagenCombo : imagenCombo},
        dataType: 'json',
        beforeSend: function(data){
           
        },
        success: function(data){
            if (data.result == "ok") {
                bootbox.alert("Imagen Eliminada con éxito");
                $("#lista-imagenes").html(data.response);
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('click', "a[data-role='estado-imagen-combo']", function(){

    var imagenCombo=$(this).attr('data-imagen-combo');
    
     $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/estadoImagenCombo',
        data: {imagenCombo : imagenCombo},
        dataType: 'json',
        beforeSend: function(data){
           
        },
        success: function(data){
            if (data.result == "ok") {
                bootbox.alert("El cambio se efectuó con éxito");
                $("#lista-imagenes").html(data.response);
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('change', "select[data-role='validar-tipo-combo']", function(){
    var val=$(this).val();
    
     $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/combo/validarComboBeneficio',
        data: {valor : val},
        dataType: 'json',
        beforeSend: function(data){
           
        },
        success: function(data){
            if (data.result == "ok") {
                if(data.response == 'true'){
                   $("#Combo_fechaInicio").prop("disabled",true);
                   $("#Combo_fechaFin").prop("disabled",true);
                   $("#beneficio-combo").css("display","block");
                }else{
                   $("#Combo_fechaInicio").prop("disabled",false);
                   $("#Combo_fechaFin").prop("disabled",false);
                   $("#beneficio-combo").css("display","none");
                }
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
});

$(document).on('click', "a[data-role='add-beneficio']", function(){
    var val=$(this).attr('data-beneficio');
    var tipo=$(this).attr('data-tipo');
     $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/combo/informacioBeneficio',
        data: {idBeneficio : val},
        dataType: 'json',
        beforeSend: function(data){
           
        },
        success: function(data){
            if (data.result == "ok") {
                  $("#descripcion-combo").html(data.descripcion);
                  $("#Combo_fechaInicio").val(data.fechaInicio);
                  $("#Combo_fechaFin").val(data.fechaFin);
                  $("#Combo_tipoBeneficio").val(tipo);
                  $("#Combo_idBeneficio").val(val);
                  $("#modal-beneficios-combo").modal('hide');
                  
            }else if(data.result == "error"){
                bootbox.alert(data.response);
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });
    return false;
});