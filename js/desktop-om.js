$(document).on('change', 'input[name="DireccionesDespacho[idDireccionDespacho]"]:radio', function(e) {
    var direccion = $('input[name="DireccionesDespacho[idDireccionDespacho]"]:checked').val();
    $("div[id^='div-direccion-form-']").css('display', 'none');
    $('#div-direccion-form-' + direccion).css('display', 'block');
    $('html,body').animate({
        scrollTop: $('#div-direccion-form-' + direccion).offset().top
    }, 200);
});

$(document).on('click', "input[id^='btn-direccion-actualizar-']", function() {
    var form = $(this).parents("form");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/direccionActualizar',
        data: form.serialize(),
        beforeSend: function() {
            //$.mobile.loading('show');
        },
        complete: function() {
            //$.mobile.loading('hide');
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                dialogoAnimado(obj.response);
            } else if (obj.result === 'error') {
                bootbox.alert(obj.response);
            } else {
                $.each(obj, function(element, error) {
                    //$('#' + element + '_em_').html(error);
                    //$('#' + element + '_em_').css('display', 'block');
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

    return false;

});


$(document).on('click', "a[data-role='direccion-adicionar-modal']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/direccionCrear',
        data: {render: true},
        beforeSend: function() {
            //$.mobile.loading('show');
        },
        complete: function() {
            //$.mobile.loading('hide');
        },
        success: function(data) {
            var id = "page-direccion-crear-" + uniqueId();
            if(!$("#modal-nueva-direccion").length)
            {
                $('body').append(data.response.dialogoHTML);
            }
            $("#modal-nueva-direccion").modal("show");
        },
        error: function(jqXHR, textStatus, errorThrown) {
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "input[data-role='direccion-adicionar']", function() {
    //var form = $(this).parents("form");
    var form = $("#form-direccion");
    var modal = $(this).attr("data-modal");
    var pagoExpress = $("[data-role='direccion-adicionar-modal']").attr("data-pagoexpress");
    var data = {modal: modal, pagoExpress: pagoExpress};
    //console.log(form);
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/direccionCrear',
        data: $.param(data) + '&' + form.serialize(),
        beforeSend: function() {
            //$.mobile.loading('show');
        },
        complete: function() {
            //$.mobile.loading('hide');
        },
        success: function(data) {
            //console.log(data);
            var data = $.parseJSON(data);
            if (data.result === 'ok') {
                if (modal == 1) {

                    if(data.response.pagoExpress == "no")
                    {
                        $('#div-direcciones-lista').html(data.response.direccionesHTML);
                        $('#div-direcciones-lista').trigger("create");
                    }
                    else
                    {
                        location.reload();
                    }
                    $("#modal-nueva-direccion").modal("hide");
                    $("#form-direccion")[0].reset();
                    //$("#modal-nueva-direccion").remove();
                    //$(".modal-backdrop").remove();
                    dialogoAnimado(data.response.mensaje);
                    //$("div[id^='page-direccion-crear-']").dialog("close");
                    //dialogoAnimado(data.response.mensaje);
                } else {
                    location.reload();
                }
            } else if (data.result === 'error') {
                //$('<div>').mdialog({
                //    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                //});
                bootbox.alert(data.response);
            } else {
                $.each(data, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //alert('Error: ' + errorThrown);
            bootbox.alert('Error: ' + errorThrown);
        }
    });

    return false;

});

$(document).on('click', "input[id^='btn-direccion-eliminar-']", function() {
    var direccion = $(this).attr('data-direccion');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/direccionEliminar',
        data: {direccion: direccion},
        beforeSend: function() {
            //$.mobile.loading('show');
        },
        complete: function() {
            //$.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === 'ok') {
                $('#div-direccion-radio-' + direccion).remove();
                dialogoAnimado(data.response);
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

    return false;
});


$(document).on('click', "a[data-role='pedidogridestado']", function() {
    bootbox.alert({
        message: $(this).attr('data-estado'),
        buttons: {
            ok: {
                label : "Aceptar",
            }
        }
    });
});


$(document).on('click', "a[data-role='pedidodetalle']", function() {
    var compra = $(this).attr('data-compra');

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/agregarcompra',
        data: {compra: compra},
        beforeSend: function() {
        },
        complete: function() {
        },
        success: function(data) {
            if (data.result === "ok") {
                
                $('#div-carro-canasta').html(data.response.canastaHTML);
                $('#div-carro-canasta').trigger("create");
                
                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                    //bootbox.alert(data.response.mensajeHTML);
                }
            } else {
                /*$('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });*/
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //$.mobile.loading('hide');
            bootbox.alert('Error: ' + errorThrown);
            //alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "a[data-role='pedidolistaocultar']", function() {
    var compra = $(this).attr('data-compra');

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/ocultarpedido',
        data: {compra: compra},
        beforeSend: function() {

        },
        success: function(data) {
            if (data.result === "ok") {
                $.fn.yiiGridView.update('grid-cuenta-listapedidos');
                dialogoAnimado(data.response);
            } else {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='cotizaciondetalle']", function() {
    var cotizacion = $(this).attr('data-cotizacion');

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/agregarcotizacion',
        data: {cotizacion: cotizacion},
        beforeSend: function() {
            
        },
        complete: function() {
            
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#div-carro-canasta').html(data.response.canastaHTML);
                $('#div-carro-canasta').trigger("create");
                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                }
            } else {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "[id^='enlace-pago-direccion-express-']", function(){
    var campoCheckbox = $(this).children("input");
    campoCheckbox.prop("checked", true);
});


$(document).on('change', "#form-listapersonal input[id='ListasPersonales_estadoLista']", function() {
    if ($(this).is(":checked")) {
        $('#div-lista-config-recordacion').removeClass('hide');
    }else{
        $('#div-lista-config-recordacion').addClass('hide');
    }
});


$(document).on('click', "input[data-role='lstpersonalform']", function() {
    var data = {};
    var lista = $(this).attr('data-lista');
    if (lista !== undefined) {
        data['lista'] = lista;
    }
    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/listapersonal/lista/post',
        data: $.param(data) + '&' + $('#form-listapersonal').serialize(),
        beforeSend: function() {
            $('div[id^="ListasPersonales_"].has-error').html('');
            $('div[id^="ListasPersonales_"].has-error').css('display', 'none');
            $('#form-listapersonal input[type=button]').attr('disabled', 'disabled');
            //$.mobile.loading('show');
        },
        complete: function() {
            //$.mobile.loading('hide');
            $('#form-listapersonal input[type=button]').removeAttr('disabled');
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                if ($('#ListaGuardarForm_idLista').length) {
                    $("#ListaGuardarForm_idLista").append(data.response.optionHtml);
                }
                
                if ($('#gridview-listapersonal').length) {
                    $('#form-listapersonal')[0].reset();
                    $.fn.yiiGridView.update('gridview-listapersonal');
                }
                $("#modal-lista-personal").modal('hide');
                dialogoAnimado(data.response.mensajeHtml);
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //$.mobile.loading('hide');
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='listapersonaleliminar']", function() {
    var lista = $(this).attr('data-lista');

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/listapersonaleliminar',
        data: {lista: lista},
        beforeSend: function() {

        },
        success: function(data) {
            if (data.result === "ok") {
                $.fn.yiiGridView.update('gridview-listapersonal');
                dialogoAnimado(data.response);
            } else {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='listapersonal']", function() {
    var lista = $(this).attr('data-lista');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/agregarlista',
        data: {lista: lista},
        beforeSend: function() {
            //$.mobile.loading('show');
        },
        complete: function() {
            //$.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#div-carro-canasta').html(data.response.canastaHTML);
                $('#div-carro-canasta').trigger("create");
                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                }
            } else {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //$.mobile.loading('hide');
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='eliminarlistadetalle']", function() {
    var detalle = $(this).attr('data-detalle');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/listadetalle/accion/eliminar',
        data: {detalle: detalle},
        beforeSend: function() {
            
        },
        complete: function() {
            
        },
        success: function(data) {
            if (data.result === "ok") {
                dialogoAnimado(data.response.mensajeHTML);
                $.fn.yiiGridView.update('gridview-listadetalle');
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='actualizarlistadetalle']", function() {
    var detalle = $(this).attr('data-detalle');
    var unidades = $("#campo-producto-"+detalle).val();
    unidades = parseInt(unidades);

    if (isNaN(unidades)) {
        unidades = 0;
    }
    if (unidades <= 0) {
        unidades = 0;
    }
    $("#campo-producto-"+detalle).val(unidades);

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/listadetalle/accion/actualizar',
        data: {detalle: detalle, unidades: unidades},
        beforeSend: function() {
        },
        complete: function() {
        },
        success: function(data) {
            if (data.result === "ok") {
                dialogoAnimado(data.response.mensajeHTML);
            } else if (data.result === 'error') {
                bootbox.alert(data.response);                
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});

//para que funcionen los tool tips

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})