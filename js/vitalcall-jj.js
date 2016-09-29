
$(document).on('click', "button[data-role='busquedaproducto-vitalcall']", function () {
    var text = $.trim($('#busqueda-buscar-vitalcall').val());
    if (!text) {
        bootbox.alert('Búsqueda no puede estar vacío');
    } else {
        buscarProductosVitalCall(text, this, requestUrl);
    }
});

function buscarProductosVitalCall(text, obj, request) {
	$.ajax({
        type: 'POST',
        async: true,
        url: request + '/callcenter/vitalcall/pedido/buscar',
        data: {busqueda: text},
        beforeSend: function () {
            $('#modal-productos-busqueda').remove();
            Loading.show();
        },
        success: function (data) {
            $('#container').append(data);
            $('#modal-productos-busqueda').modal('show');
        },
        complete: function () {
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + jqXHR.responseText);
        }
    });
}

$(document).on('click', "a[data-role='agregar-producto-formula']", function () {
	
	var component = $(this).attr('data-component');
	var idFormula = $(this).attr('data-formula');
	var idProducto = $(this).attr('data-producto');
	
	var cantidad = $("#cantidad_"+component).val();
	var dosis = $("#dosis_"+component).val();
	var intervalo = $("#intervalo_"+component).val() ;
	$.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/formula/agregarProductoFormula/',
        data: {idFormula : idFormula, idProductoVitalCall: idProducto, cantidad: cantidad, dosis: dosis, intervalo: intervalo},
        beforeSend: function () {
        	
            Loading.show();
        },
        complete: function () {
        	
            Loading.hide();
        },
        success: function (data) {
            var data = $.parseJSON(data);

            if (data.result == 'ok') {
            	$("#contenido-productos-lista").html(data.response);
            	$("#producto_"+component).css("display","none");
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                   // $('#' + element + '_em_').html(error);
                   // $('#' + element + '_em_').css('display', 'block');
                });
            }
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='editar-producto-formula']", function () {
	
	var component = $(this).attr('data-component');
	var idFormula = $(this).attr('data-formula');
	var idProducto = $(this).attr('data-producto');
	
	var cantidad = $("#cantidadEditar_"+idProducto).val();
	var dosis = $("#dosisEditar_"+idProducto).val();
	var intervalo = $("#intervaloEditar_"+idProducto).val() ;
	$.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/formula/editarProductoFormula/',
        data: {idFormula : idFormula, idProductoVitalCall: idProducto, cantidad: cantidad, dosis: dosis, intervalo: intervalo},
        beforeSend: function () {
         
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            var data = $.parseJSON(data);

            if (data.result == 'ok') {
            	$("#contenido-productos-lista").html(data.response);
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                   // $('#' + element + '_em_').html(error);
                   // $('#' + element + '_em_').css('display', 'block');
                });
            }
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='eliminar-producto-formula']", function () {
	
	var component = $(this).attr('data-component');
	var idFormula = $(this).attr('data-formula');
	var idProducto = $(this).attr('data-producto');
	

	$.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/formula/eliminarProductoFormula/',
        data: {idFormula : idFormula, idProductoVitalCall: idProducto},
        beforeSend: function () {
         
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            var data = $.parseJSON(data);

            if (data.result == 'ok') {
              $("#contenido-productos-lista").html(data.response);
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                   // $('#' + element + '_em_').html(error);
                   // $('#' + element + '_em_').css('display', 'block');
                });
            }
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "a[data-role='nueva-direccion-vital']", function () {
	

	var cliente = $(this).attr('data-cliente');
	

	$.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cliente/agregarDireccion/',
        data: {identificacionUsuario : cliente},
        beforeSend: function () { 
            Loading.show();
            $("#modal-direccion").remove();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            var data = $.parseJSON(data);

            if (data.result == 'ok') {
            	$('#container').append(data.response);
            	$("#modal-direccion").modal('show');
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                   // $('#' + element + '_em_').html(error);
                   // $('#' + element + '_em_').css('display', 'block');
                });
            }
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('change', "#DireccionesDespachoVitalCall_codigoCiudad", function() {

    var codigoCiudad = $('#DireccionesDespachoVitalCall_codigoCiudad').val();
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cliente/comprobarciudad',
        data: {codigoCiudad: codigoCiudad},
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                if (data.code == 1) {
                    $("#div-sector").html(data.htmlResponse);
                    $("#div-sector").css('display', 'block');
               
                } else if (data.code == 2) {
                   
                }
            } 
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "input[data-role='guardar-direccion']", function() {

    var form = $('#direcciones-form');
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cliente/guardarDireccion',
        data: form.serialize(),
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
            	 $("#modal-direccion").modal('hide');
            	 $.fn.yiiGridView.update('direcciones-grid');
            }else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});


$(document).on('click', "input[data-role='actualizar-direccion']", function() {

    var form = $('#direcciones-form');
    var idDireccion = $(this).attr('data-direccion');
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cliente/actualizarDireccion',
        data: form.serialize()+"&idDireccion="+idDireccion,
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
            	 $("#modal-direccion").modal('hide');
            	 $.fn.yiiGridView.update('direcciones-grid');
            }else if (data.result == 'error') {
                  bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});


$(document).on('click', "a[data-role='editar-direccion']", function() {

	var direccion = $(this).attr('data-direccion');
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cliente/editarDireccion',
        data: {direccion: direccion},
        beforeSend: function() {
        	$("#modal-direccion").remove();
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
            	$('#container').append(data.response);
                $("#modal-direccion").modal('show');
            }else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='eliminar-direccion']", function() {

    var direccion = $(this).attr('data-direccion');
    
    bootbox.dialog({
        message: "¿ Está seguro de eliminar esta dirección ?",
        title: "Eliminar dirección",
        buttons: {
            success: {
                label: "Aceptar",
                className: "btn-primary",
                callback: function () {
                    $.ajax({
                        type: 'POST',
                        async: true,
                        url: requestUrl + '/callcenter/vitalcall/cliente/eliminarDireccion',
                        data:  {direccion: direccion},
                        beforeSend: function() {
                            Loading.show();
                        },
                        complete: function(data) {
                            Loading.hide();
                        },
                        success: function(data) {
                            var data = $.parseJSON(data);
                            if (data.result === "ok") {
                            	 $("#modal-direccion").modal('hide');
                            	 $.fn.yiiGridView.update('direcciones-grid');
                            }else if (data.result == 'error') {
                                bootbox.alert(data.response);
                            } else {
                                $.each(data, function (element, error) {
                                    $('#' + element + '_em_').html(error);
                                    $('#' + element + '_em_').css('display', 'block');
                                });
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {

                        }
                    });
                }
            },
            close: {
                label: "Cancelar",
                className: "btn-default",
                callback: function () {
                }
            }
        }
    });



});

$(document).on('click', 'input[data-role="buscar-direccion"]', function() {
	var ciudad = $('#DireccionesDespachoVitalCall_codigoCiudad').val();
	
	$.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/admin/geodireccion',
        data: {ciudad: ciudad, direccion: $('#DireccionesDespachoVitalCall_direccion').val()},
        beforeSend: function () {
            $('#georeferencia').html('');
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#georeferencia').html(data.response);
                Loading.hide();
            } else {
                Loading.hide();
                bootbox.alert(data.response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + jqXHR.responseText);
        }
    });
	return false;
});

$(document).on('click', 'input[data-role="buscar-barrio"]', function() {
	var ciudad = $('#DireccionesDespachoVitalCall_codigoCiudad').val();
	
	$.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/admin/geobarrio',
        data: {ciudad: ciudad, barrio: $('#DireccionesDespachoVitalCall_barrio').val()},
        beforeSend: function () {
            $('#georeferencia').html('');
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#georeferencia').html(data.response);
                Loading.hide();
            } else {
                Loading.hide();
                bootbox.alert(data.response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + jqXHR.responseText);
        }
    });
	return false;
});


