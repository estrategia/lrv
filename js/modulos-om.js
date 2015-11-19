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
    var idMarcas = "";

    $('input[name="marcas-contenido[]"]:checked').each(function(index){
        if(index != 0)
        {
            idMarcas += ",";
        }
        idMarcas += $(this).val();
    });
    
    idModulo = attrIdModulo;
    //if(idMarcas != "")
    //{
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
    //}
    //else
    //{
    //    $("#categorias-marcas-seleccionadas").html('');
    //}
}

$(document).on('click', "input[data-role='almacenar-html-producto-marcas']", function(){

    var idModulo = $(this).attr('data-modulo');
    var htmlModulo = "";
    var url = "agregarmarcascategorias";
    var idMarcas = "";
    var idCategorias = "";

    if($("#ModulosConfigurados_contenido").length)
    {
        htmlModulo = $("#ModulosConfigurados_contenido").val();
        url = "contenidohtmlproductos";
    }

    $('input[name="marcas-contenido[]"]:checked').each(function(index){
        if(index != 0)
        {
            idMarcas += ",";
        }
        idMarcas += $(this).val();
    });

    $('input[name="categorias-contenido[]"]:checked').each(function(index){
        if(index != 0)
        {
            idCategorias += ",";
        }
        idCategorias += $(this).val();
    });


    //console.log("idModulo " + idModulo + " -- html " + htmlModulo + " -- marcas " + idMarcas + " -- categorias " + idCategorias);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/'+url,
        data: {idModulo : idModulo, htmlModulo : htmlModulo, idMarcas : idMarcas, idCategorias : idCategorias},
        beforeSend: function(){

        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                window.location.reload();
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        complete: function(){

        },
        error: function(jqXHR, textStatus, errorThrown){
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "button[data-role='cargar-productos-contenido']", function(){
    //var form = $(this).parents("form");
    var formulario = document.getElementById("cargarproducto");
    var campo = document.createElement("input");
    campo.type = 'hidden';
    campo.value = $(this).attr("data-modulo");
    campo.name = "idModulo";
    campo.id = "idModulo";
    
    formulario.appendChild(campo);

    var form = new FormData(formulario);
    //console.log(form);
    //var idModulo = ;
    if($("#contenido-cargar-producto").val() != "")
    {
        $.ajax({
            type: 'POST',
            async: true,
            url: requestUrl + '/callcenter/contenido/cargarplanoproductos',
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
            },
            complete: function() {
                formulario.removeChild(campo);
            },
            success: function(data) {
                //console.log(data);
                var data = $.parseJSON(data);
                if (data.result === "ok") {
                    $("#contenido-productos-lista").html(data.response.htmlProductosAgregados); 
                    //dialogoAnimado();
                    $("#contenido-cargar-producto").val('');
                } else if (data.result === 'error') {
                    bootbox.alert(data.response);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                bootbox.alert('Error: ' + errorThrown);
            }
        });
    }
    else
    {
        bootbox.alert("Debe seleccionar un archivo en formato txt");
    }

    return false;
});