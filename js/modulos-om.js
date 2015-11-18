/*********** Configuracion Modulos ************/

$(document).on('click', "button[data-role='busqueda-contenido']", function(){
    
    var valorBusqueda = $.trim($("#contenido-busqueda-buscar").val());
    if(!valorBusqueda)
    {
        bootbox.alert('Búsqueda no puede estar vacío');
    }
    else
    {
        var idModulo = $(this).attr('data-modulo');
        $.ajax({
            type: 'POST',
            async: true,
            url: requestUrl + '/callcenter/contenido/buscarproductos',
            data: {busqueda: valorBusqueda, idModulo: idModulo},
            beforeSend: function() {
                $('#modal-productos-busqueda').remove();
                Loading.show();
            },
            success: function(data) {
                $('#container').append(data);
                //alert(data);
                $('#modal-productos-busqueda').modal('show');
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

$(document).on('keypress', "#contenido-busqueda-buscar", function(e){
    if(e.keyCode == 13)
    {
        $("button[data-role='busqueda-contenido']").trigger('click');
        e.preventDefault();
    }
});

$(document).on('click', "a[data-role='agregar-producto-contenido']", function(){
    var producto = $(this).attr("data-producto");
    var idModulo = $(this).attr("data-modulo");
    var self = $(this);
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/agregarproductomodulo',
        data: {producto : producto, idModulo : idModulo},
        beforeSend: function(){

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

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });

});


$(document).on('click', "a[data-role='eliminar-producto-contenido']", function(){
    
    var idProductoModulo = $(this).attr("data-producto");

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/eliminarproductomodulo',
        data: {idProductoModulo : idProductoModulo},
        beforeSend: function(){

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

        },
        error: function(jqXHR, textStatus, errorThrown){

        }
    });

});


$(document).on('click', 'input[name="marcas-contenido[]"]:checkbox', function(){
    cargarCategoriasSeleccionadas($(this).attr('data-modulo'));
});


function cargarCategoriasSeleccionadas(attrIdModulo)
{
    idMarcas = "";

    $('input[name="marcas-contenido[]"]:checked').each(function(index){
        if(index != 0)
        {
            idMarcas += ",";
        }
        idMarcas += $(this).val();
    });
    
    idModulo = attrIdModulo;
    if(idMarcas != "")
    {
        $.ajax({
            type: 'POST',
            async: true,
            url: requestUrl + '/callcenter/contenido/obtenerlistacategorias',
            data: {idMarcas : idMarcas, idModulo : idModulo},
            beforeSend: function(){

            },
            success: function(data){
                var data = $.parseJSON(data);
                if (data.result === "ok") {
                    $("#categorias-marcas-seleccionadas").html(data.response.htmlCategorias);
                } else if (data.result === 'error') {
                    bootbox.alert(data.response);
                }
            },
            complete: function(){

            },
            error: function(jqXHR, textStatus, errorThrown){

            }
        });
    }
    else
    {
        $("#categorias-marcas-seleccionadas").html('');
    }
}

/*********** Fin Configuracion Modulos ************/
