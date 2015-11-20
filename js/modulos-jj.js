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
