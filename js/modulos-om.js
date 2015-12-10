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


$(document).on('click', "a[data-role='eliminar-producto-contenido']", function(){
    
    var idProductoModulo = $(this).attr("data-producto");

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/eliminarproductomodulo',
        data: {idProductoModulo : idProductoModulo},
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


$(document).on('click', 'input[name="marcas-contenido[]"]:checkbox', function(evento){
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
                    Loading.show();
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
                    Loading.hide();
                
            },
            error: function(jqXHR, textStatus, errorThrown){
                    Loading.hide();
                
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
            Loading.show();
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
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){
            Loading.hide();
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
                Loading.show();
            },
            complete: function() {
                formulario.removeChild(campo);
                Loading.hide();
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
                Loading.hide();
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


$(document).on('click', 'a[data-role="modulo-inactivar"]', function(){
    var idModulo = $(this).attr("data-modulo");


    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/activardesactivarmodulo',
        data: {idModulo : idModulo},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $.fn.yiiGridView.update('grid-modulos');
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


//administradcion productos relacionados 

$(document).on('click', "button[data-role='busqueda-relacionados']", function(){
    
    var valorBusqueda = $.trim($("#relacionados-busqueda-buscar").val());
    if(!valorBusqueda)
    {
        bootbox.alert('Búsqueda no puede estar vacío');
    }
    else
    {
        var codigoProducto = $(this).attr('data-producto');
        $.ajax({
            type: 'POST',
            async: true,
            url: requestUrl + '/callcenter/productosRelacionados/buscarproductos',
            data: {busqueda: valorBusqueda, codigoProducto: codigoProducto},
            beforeSend: function() {
                $('#modal-productos-busqueda').remove();
                Loading.show();
            },
            success: function(data) {
                $('#container').append(data);
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

$(document).on('keypress', "#relacionados-busqueda-buscar", function(e){
    if(e.keyCode == 13)
    {
        $("button[data-role='busqueda-relacionados']").trigger('click');
        e.preventDefault();
    }
});


$(document).on('click', "a[data-role='agregar-producto-relacionado']", function(){
    var productoRelacionado = $(this).attr("data-relacionado");
    var producto = $(this).attr("data-producto");
    var self = $(this);
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/productosRelacionados/agregarproductorelacionado',
        data: {producto : producto, productoRelacionado : productoRelacionado},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#productos-relacionados-lista").html(data.response.htmlProductosAgregados);
                self.attr("disabled", true);
                self.html("Relacionado");
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


$(document).on('click', "a[data-role='eliminar-producto-relacionado']", function(){
    
    var idRelacionado = $(this).attr("data-relacion");

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/productosRelacionados/eliminarproductorelacionado',
        data: {idRelacionado : idRelacionado},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#productos-relacionados-lista").html(data.response.htmlProductosAgregados);
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

$(document).on('click', "a[data-role='actualizar-producto-relacionado']", function(){
    
    var idRelacionado = $(this).attr("data-relacion");
    var orden = $("#orden_"+idRelacionado).val();

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/productosRelacionados/actualizarproductorelacionado',
        data: {idRelacionado : idRelacionado, orden : orden},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#productos-relacionados-lista").html(data.response.htmlProductosAgregados);
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

//administracion tarifa domicilio

$(document).on('click', "a[data-role='tarifa-domicilio']", function(){
    
    var idDomicilio = $(this).attr("data-tarifa");
    
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/tarifaDomicilio/tarifadomicilio',
        data: {idDomicilio : idDomicilio},
        beforeSend: function() {
            $('#modal-tarifas-domicilio').remove();
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            $('#container').append(data.response.htmlTarifa);
            $('#modal-tarifas-domicilio').modal('show');
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + jqXHR.responseText);
        }
    });

});


$(document).on('change', "select[data-role='select-ciudades-domicilio']", function(){

    var codigoCiudad = $(this).val();
    //alert(codigoCiudad);
    
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/tarifaDomicilio/comprobarciudad',
        data: {codigoCiudad : codigoCiudad},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                /*if(data.code == 1){
                    $("#div-sector-modulo").html(data.htmlResponse);
                    $("#div-sector-modulo").css('display','block');
                    $("#sector-select").val(1);
                }else if(data.code == 2){
                    $("#div-sector-modulo").css('display','none');
                    $("#sector-select").val(0);
                }*/
                $("#listaSectoresTarifas").html(data.response.htmlSector);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){
            Loading.hide();
            bootbox.alert('Error: ' + jqXHR.responseText);
        }
    });

});

$(document).on('click', "button[data-role='guardar-tarifa-domicilio']", function(){
    var form = $("#tarifa-domicilio-form");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/tarifaDomicilio/agregartarifadomicilio',
        data: form.serialize(),
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === 'ok') {
                $("#modal-tarifas-domicilio").modal("hide");
                $.fn.yiiGridView.update('grid-tarifas-domicilios');
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });

    //return false;
});

$(document).on('click', "a[data-role='eliminar-tarifa-domicilio']", function(){
    var idDomicilio = $(this).attr("data-tarifa");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/tarifaDomicilio/eliminartarifadomicilio',
        data: {idDomicilio : idDomicilio},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === 'ok') {
                $.fn.yiiGridView.update('grid-tarifas-domicilios');
            } else{
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });

    //return false;
});