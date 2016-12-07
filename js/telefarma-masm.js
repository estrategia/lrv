/*
 * pasos de compra
 */
$(document).on('click', "button[id='btn-carropagar-siguiente'], button[id='btn-carropagar-anterior']", function() {
    var actual = $(this).attr('data-origin');
    var siguiente = $(this).attr('data-redirect');

    if (actual === 'informacion') {
        pasoInformacion(actual, siguiente, $(this));
    } else if (actual === 'confirmacion') {
        pasoConfirmacion(actual, siguiente, $(this));
    }

    return false;
});

function pasoInformacion(actual, siguiente, boton) {
    var data = {
        siguiente: siguiente,
        "FormaPagoTelefarmaForm[indicePuntoVenta]": $('input[name="FormaPagoTelefarmaForm[indicePuntoVenta]"]').val(),
        "FormaPagoTelefarmaForm[tipoEntrega]": $('input[name="FormaPagoTelefarmaForm[tipoEntrega]"]').val()
    };
    
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/telefarma/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-comentario').serialize() + '&' + $('#form-direccion-pagoinvitado').serialize() + '&' + $('#form-datosmedico').serialize() + '&' +$('#form-pago-entrega').serialize() + '&' + $('#form-pago-pago').serialize(),
        beforeSend: function() {
            boton.prop('disabled', true);
            $('div[id^="FormaPagoTelefarmaForm_"].text-danger').html('');
            $('div[id^="FormaPagoTelefarmaForm_"].text-danger').css('display', 'none');
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                boton.prop('disabled', false);
                window.location.replace(obj.redirect);
            } else if (obj.result === 'error') {
                Loading.hide();
                alert(obj.response);
                boton.prop('disabled', false);
            } else {
                $.each(obj, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
                boton.prop('disabled', false);
                Loading.hide();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + errorThrown);
            boton.prop('disabled', false);
        }
    });
}

function pasoConfirmacion(actual, siguiente, boton) {
    var data = {siguiente: siguiente};

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/telefarma/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-confirmacion').serialize(),
        beforeSend: function() {
            boton.prop('disabled', true);
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                window.location.replace(obj.redirect);
            } else if (obj.result === 'error') {
                alert(obj.response);
                boton.prop('disabled', false);
            } else {
                $.each(obj, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
                boton.prop('disabled', false);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
            boton.prop('disabled', false);
        }
    });
}

/*
 * pasos compra - tipo entrega
 */
$(document).on('click', 'div[data-role="tipoentrega"]', function() {
    var tipo = $(this).attr('data-tipo');
    var _tipo = tipo == tipoEntrega.presencial ? tipoEntrega.domicilio : tipoEntrega.presencial;

    if (tipo == tipoEntrega.presencial) {
    	$.ajax({
            type: 'POST',
            dataType: 'json',
            async: true,
            url: requestUrl + '/callcenter/telefarma/carro/pasoporel',
            data: {opcion: 'modal'},
            beforeSend: function() {
                $("#modal-pasoporel-seleccionar").remove();
                Loading.show();
            },
            success: function(data) {
                if (data.result == "ok") {
                    $('body').append(data.response);
                    $("#modal-pasoporel-seleccionar").modal("show");
                } else {
                    alert(data.response);
                }
                Loading.hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Loading.hide();
                alert('Error: ' + errorThrown);
            }
        });
    	
    } else {
    	seleccionTipoEntrega(tipo, _tipo);
    }

});

$(document).on('click', 'button[data-role="pasoporel-seleccion-pdv"]', function() {
    seleccionTipoEntrega(tipoEntrega.presencial, tipoEntrega.domicilio);
    $('#pasoporel-seleccion-pdv-nombre').html($(this).attr('data-nombre'));
    $('#pasoporel-seleccion-pdv-direccion').html($(this).attr('data-direccion'));
    $("#modal-pasoporel-seleccionar").modal("hide");
    $('input[name="FormaPagoTelefarmaForm[indicePuntoVenta]"]').val($(this).attr('data-idx'));
});

function seleccionTipoEntrega(tipo, _tipo) {
    $('div[data-role="tipoentrega"]').removeClass('activo');
    $('div[data-role="tipoentrega"]div[data-tipo="' + tipo + '"]').addClass('activo');
    $('div[data-role="tipoentrega"]').addClass('inactivo');
    $('div[data-role="tipoentrega"]div[data-tipo="' + tipo + '"]').removeClass('inactivo');

    $('#pasoporel-seleccion-pdv-nombre').html("");
    $('#pasoporel-seleccion-pdv-direccion').html("");
    $('#FormaPagoTelefarmaForm_tipoEntrega').val(tipo);
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + tipo + '"]').removeClass('display-none');
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + tipo + '"] input').removeAttr('disabled');
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + _tipo + '"]').addClass('display-none');
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + _tipo + '"] input[type="text"]').val('');
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + _tipo + '"] input[type="radio"]').prop('checked', false);
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + _tipo + '"] input').attr('disabled', 'disabled');
}

/*
 * pasos compra - forma pago 
 */
$(document).on('click', "div[data-role='formapago']", function() {
    var tipo = $(this).attr('data-tipo');
    if (tipo == "datafono") {
        $("#modal-formapago input[type='radio']").removeAttr('checked');
        $("#modal-formapago #idFormaPago_" + $("#FormaPagoTelefarmaForm_idFormaPago_datafono").val()).prop('checked', true);
        $("div[data-role^='formapago-logo-']").addClass('display-none');
        $("div[data-role='formapago-logo-" + $("#FormaPagoTelefarmaForm_idFormaPago_datafono").val() + "']").removeClass('display-none');
        $("#modal-formapago").modal("show");
        return false;
    } else {
        var descripcion = $("div[data-role='formapago-descripcion']div[data-tipo='" + tipo + "']");
        $("div[data-role='formapago-descripcion']").addClass('display-none');

        if (descripcion.length > 0) {
            descripcion.removeClass('display-none');
        }
    }
});

$(document).on('click', "#modal-formapago input[type='radio']", function() {
    if ($(this).is(':checked')) {
        //$("div[data-role='formapago']").removeClass('activo');
        //$('div[data-tipo="datafono"]').addClass('activo');
        //$('#div-formapago-vacio').remove();
        $('input[id="FormaPagoTelefarmaForm_idFormaPago_datafono"]').prop('checked', true);
        $('input[id="FormaPagoTelefarmaForm_idFormaPago_datafono"]').val($(this).val());

        $("div[data-role^='formapago-logo-']").addClass('display-none');
        $("div[data-role='formapago-logo-" + $(this).val() + "']").removeClass('display-none');
        $("div[data-role='formapago-logo-pagoenlinea']").addClass('display-none');
        $("div[data-role='formapago-descripcion']").addClass('display-none');
    }
});