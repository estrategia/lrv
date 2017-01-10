var refresh = null;

function alert(message) {
    bootbox.alert({message: message, callback: function() {
        }, buttons: {ok: {label: 'Aceptar', className: 'btn-danger'}}});
}

$(document).on('change', 'input[id=check-pedido-seguimiento]', function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/pedido/seguimiento',
        data: {seguimiento: $('input[id=check-pedido-seguimiento]:checked').is(':checked') ? 1 : 0, compra: $(this).attr('data-compra')},
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            if (data.result == 'error') {
                bootbox.alert(data.response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('change', 'select[id=tipo_bono]', function () {
    if($(this).val() == 1){
        $("#tipo_1").css("display","block");
        $("#tipo_2").css("display","none");
    }else if($(this).val() == 2){
        $("#tipo_1").css("display","none");
        $("#tipo_2").css("display","block");
    }
});


/*
 $(document).on('change', 'input[data-role="adminpedido"]', function() {
 var accion = $(this).attr('data-action');
 
 if (accion === 'pedido-pdv') {
 gestionPedido('/callcenter/admin/pedidopdv', {compra: $(this).attr('data-compra')});
 } else if (accion === 'pedido-pedido') {
 gestionPedido('/callcenter/admin/pedidoadmin', {compra: $(this).attr('data-compra')});
 } else if (accion === 'pedido-cliente') {
 gestionPedido('/callcenter/admin/clientedespacho', {compra: $(this).attr('data-compra'), usuario: $(this).attr('data-usuario')});
 } else if (accion === 'pedido-observaciones') {
 gestionPedido('/callcenter/admin/observacionpedido', {compra: $(this).attr('data-compra'), render: true});
 }
 });
 */

function gestionPedido(url, data) {
    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + url,
        data: data,
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            $('#div-detalle-pedido').html(data);
            /*if (data.result == 'ok') {
             bootbox.alert(data.response);
             }else {
             bootbox.alert(data.response);
             }*/
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
}


function buscarProductos(text, obj, request) {
    $.ajax({
        type: 'POST',
        async: true,
        url: request + '/callcenter/pedido/buscar',
        data: {busqueda: text, compra: $(obj).attr('data-pedido')},
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


$(document).on('click', 'a[data-role="completitud-pdv"]', function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/puntoventa/subasta/admin/completitudPdv',
        data: {compra: $(this).attr('data-compra')},
        beforeSend: function () {
            $('#modalSubasta').remove();
            // detener refresh
            clearTimeout(refresh);
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            if (data.result == 'ok') {
                $('#container').append(data.response);
                $("#modalSubasta").modal({keyboard: false, backdrop: 'static'});
            } else {
                bootbox.alert(data.response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', 'a[data-role="activar-usuario"]', function () {
	btn = $(this);
	bootbox.dialog({
        message: "¿Está seguro de activar este usuario en la tienda virtual?",
        title: "Confirmación",
        buttons: {
            success: {
                label: "Aceptar",
                className: "btn-primary",
                callback: function() {
                	  $.ajax({
                	        type: 'POST',
                	        dataType: 'json',
                	        async: true,
                	        url: requestUrl + '/callcenter/cuentasInactivas/activarCuenta',
                	        data: {identificacion: btn.attr('data-identificacion')},
                	        beforeSend: function () {
                	            // detener refresh
                	            clearTimeout(refresh);
                	            Loading.show();
                	        },
                	        complete: function () {
                	            Loading.hide();
                	        },
                	        success: function (data) {
                	            if (data.result == 'ok') {
                	            	$.fn.yiiGridView.update('grid-bloqueos-usuarios');
                	                dialogoAnimado(data.response);
                	            } else {
                	                bootbox.alert(data.response);
                	            }
                	        },
                	        error: function (jqXHR, textStatus, errorThrown) {
                	            Loading.hide();
                	            bootbox.alert('Error: ' + errorThrown);
                	        }
                	    });
                }
            },
            close: {
                label: "Cancelar",
                className: "btn-default",
                callback: function() {
                }
            }
        }
    });
	
	
  
});


$(document).on('click', "a[data-action='modal']", function () {

    var tiempoRefresh = $("#recargar-pagina").val();
    $.fn.yiiGridView.update('pedidos-grid');
    $("#modalSubasta").modal('hide');
    refresh = setTimeout(function () {
        location.reload();
    }, tiempoRefresh);

});

$(document).on('click', "a[data-role='asignar-pedido-pdv']", function () {

    var dataPedido = $(this).attr('data-pedido');
    var tiempoRefresh = $("#recargar-pagina").val();
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/puntoventa/subasta/admin/asignarPdv',
        data: {dataPedido: dataPedido},
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();

        },
        success: function (data) {
            var data = $.parseJSON(data);
            if (data.result == 'ok') {
                bootbox.alert(data.response);
                $.fn.yiiGridView.update('pedidos-grid');
                $("#modalSubasta").modal('hide');
                refresh = setTimeout(function () {
                    location.reload();
                }, tiempoRefresh);
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            }
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
            //     refresh = setTimeout(function(){ location.reload(); }, tiempoRefresh);
        }
    });
});


$(document).on('click', 'button[data-action="asignar-pdv"]', function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/pedido/asignarpdv',
        data: {compra: $(this).attr('data-compra'), pdv: $('#select-pdv-asignar').val()},
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            if (data.result == 'ok') {
                $('#div-encabezado-pedido').html(data.response.htmlEncabezado);
            } else {
                bootbox.alert(data.response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });

});

$(document).on('click', 'button[data-action="saldo-pdv"]', function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/pedido/buscarsaldo',
        data: {idCompra: $(this).attr('data-compra'), pdv: $('#select-pdv-saldo').val()},
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            if (data.result == '1') {
                $('#div-saldos-pdv').html(data.response.htmlSaldo);
            } else {
                bootbox.alert(data.response.descripcion);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });

});

$(document).on('click', 'button[data-action="remitir"]', function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/pedido/remitir',
        data: {idCompra: $(this).attr('data-compra')},
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            if (data.result == 1) {
                $('#div-encabezado-pedido').html(data.encabezado);
                $('#div-pedido-observaciones').html(data.htmlObservaciones);
            }
            bootbox.alert(data.response);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', 'button[data-action="remitirborrar"]', function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/pedido/remitirBorrar',
        data: {idCompra: $(this).attr('data-compra')},
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            if (data.result == 1) {
                $('#div-encabezado-pedido').html(data.encabezado);
                $('#div-pedido-observaciones').html(data.htmlObservaciones);
            }
            bootbox.alert(data.response);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });

});

$(document).on('click', "button[data-role='modificarpedido']", function () {
    var action = $(this).attr('data-action');
    var data = {accion: action};

    if (action == 11) {
        var item = $(this).attr('data-item');
        var cantidadU = parseInt($('#cantidad-item-unidad-' + item).val());
        if (isNaN(cantidadU)) {
            cantidadU = -1;
        } else if (cantidadU < 0) {
            // cantidadU = 0;
        }
        data['cantidad'] = cantidadU;
        data['item'] = item;
    } else if (action == 12) {
        var item = $(this).attr('data-item');
        var cantidadF = parseInt($('#cantidad-item-fraccion-' + item).val());
        if (isNaN(cantidadF)) {
            cantidadF = -1;
        } else if (cantidadF < 0) {
            //   cantidadF = 0;
        }
        data['cantidad'] = cantidadF;
        data['item'] = item;
    } else if (action == 13) {
        var item = $(this).attr('data-item');
        var cantidadB = parseInt($('#cantidad-item-bodega-' + item).val());
        if (isNaN(cantidadB)) {
            cantidadB = -1;
        } else if (cantidadB < 0) {
            cantidadB = 0;
        }
        data['cantidad'] = cantidadB;
        data['item'] = item;
    } else if (action == 2) {
        var compra = $(this).attr('data-compra');
        var combo = $(this).attr('data-combo');
        var cantidad = parseInt($('#cantidad-item-unidad-' + compra).val());
        if (isNaN(cantidad)) {
            cantidad = -1;
        } else if (cantidad < 0) {
            cantidad = 0;
        }
        data['compra'] = compra;
        data['combo'] = combo;
        data['cantidad'] = cantidad;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/pedido/modificar',
        data: data,
        beforeSend: function () {
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#div-detalle-pedido').html(data.response.htmlDetalle);
                $('#div-encabezado-pedido').html(data.response.htmlEncabezado);
                Loading.hide();
            } else {
                Loading.hide();
                bootbox.alert(data.response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('change', "#notificacion-form #NotificacionForm_tipoObservacion", function () {
    var tipo = $(this).val();

    if (tipo) {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            async: true,
            url: requestUrl + '/callcenter/admin/observacionmensaje',
            data: {tipo: tipo, compra: $(this).attr('data-compra')},
            beforeSend: function () {
                Loading.show();
            },
            success: function (data) {
                if (data.result === "ok") {
                    $('#notificacion-form #NotificacionForm_observacion').val(data.response);
                    Loading.hide();
                } else {
                    Loading.hide();
                    bootbox.alert(data.response);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Loading.hide();
                bootbox.alert('Error: ' + errorThrown);
            }
        });
    } else {
        $('#notificacion-form #NotificacionForm_observacion').val("");
    }
});

$("#busqueda-buscar").keypress(function (event) {
    if (event.which == 13) {

        var text = $.trim($('#busqueda-buscar').val());
        if (!text) {
            bootbox.alert('Búsqueda no puede estar vacío');
        } else {
            buscarProductos(text, this, requestUrl);

        }
        return false;
    }
});




$(document).on('click', "button[data-role='busquedapedido']", function () {
    var text = $.trim($('#busqueda-buscar').val());
    if (!text) {
        bootbox.alert('Búsqueda no puede estar vacío');
    } else {
        buscarProductos(text, this, requestUrl);
    }
});

$(document).on('click', "a[data-role='beneficiositem']", function () {
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/pedido/beneficios',
        data: {item: $(this).attr('data-item')},
        beforeSend: function () {
            $('#modal-beneficios-compra').remove();
            Loading.show();
        },
        success: function (data) {
            $('#container').append(data);
            $('#modal-beneficios-compra').modal('show');
        },
        complete: function () {
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + jqXHR.responseText);
        }
    });
});

$(document).on('click', "button[data-role='disponibilidaditem']", function () {
    var data = {};
    if ($(this).attr('data-item')) {
        data['item'] = $(this).attr('data-item');
    } else if ($(this).attr('data-combo')) {
        data['combo'] = $(this).attr('data-combo');
        data['compra'] = $(this).attr('data-compra');
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/pedido/disponibilidad',
        data: data,
        beforeSend: function () {
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#div-detalle-pedido').html(data.response.htmlDetalle);
                Loading.hide();
            } else {
                Loading.hide();
                alert(data.response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + jqXHR.responseText);
        }
    });
});

$(document).on('click', "a[data-role='aprobar-calificacion']", function () {
    var calificacion = $(this).attr('data-calificacion');

    bootbox.dialog({
        message: "¿ Está seguro de aprobar este comentario ?",
        title: "Aprobar comentario",
        buttons: {
            success: {
                label: "Aceptar",
                className: "btn-primary",
                callback: function () {
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        async: true,
                        url: requestUrl + '/callcenter/admin/aprobarCalificacion',
                        data: {calificacion: calificacion},
                        beforeSend: function () {
                            Loading.show();
                        },
                        success: function (data) {
                            if (data.result === "ok") {
                                $.fn.yiiGridView.update('grid-calificaciones');
                                Loading.hide();
                            } else {
                                Loading.hide();
                                bootbox.alert(data.response);
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            Loading.hide();
                            alert('Error: ' + jqXHR.responseText);
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


$(document).on('click', "a[data-cargar='1'], a[data-cargar='2']", function () {
    var tipo = $(this).attr('data-cargar');
    var pedido = $('#btn-pedido-buscar').attr('data-pedido');
    var data = {tipo: tipo, compra: pedido};

    if (tipo == 1) {
        var producto = $(this).attr('data-producto');
        var cantidadU = $('#cantidad-producto-unidad-' + producto).val();
        cantidadU = parseInt(cantidadU);
        if (isNaN(cantidadU)) {
            cantidadU = -1;
        }
        var cantidadF = parseInt($('#cantidad-producto-fraccion-' + producto).val());
        cantidadF = parseInt(cantidadF);
        if (isNaN(cantidadF)) {
            cantidadF = -1;
        }
        data['producto'] = producto;
        data['cantidadU'] = cantidadU;
        data['cantidadF'] = cantidadF;
    } else if (tipo == 2) {
        var combo = $(this).attr('data-combo');
        var cantidad = $('#cantidad-combo-' + combo).val();
        cantidad = parseInt(cantidad);
        if (isNaN(cantidad)) {
            cantidad = 0;
        }
        data['combo'] = combo;
        data['cantidad'] = cantidad;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/pedido/agregar',
        data: data,
        beforeSend: function () {
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#div-detalle-pedido').html(data.response.htmlDetalle);
                $('#div-encabezado-pedido').html(data.response.htmlEncabezado);
                Loading.hide();
            } else {
                Loading.hide();
                bootbox.alert(data.response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "button[data-role='pdvgeodireccion']", function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/admin/geodireccion',
        data: {ciudad: $('#select-ciudad-direccion').val(), direccion: $('#input-pedido-direccion').val()},
        beforeSend: function () {
            $('#div-pedido-georeferencia-direcion').html('');
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#div-pedido-georeferencia-direcion').html(data.response);
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
});


$(document).on('change', "#Operador_perfil", function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/operador/verificarPerfil',
        data: {perfil: $(this).val()},
        beforeSend: function () {

            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                if (data.response == 2) {
                    $("#form-pdv-vendedor").css('display', 'block');
                } else {
                    $("#form-pdv-vendedor").css('display', 'none');
                }
                if (data.response == 3) {
                    $("#form-pdv-mensajero").css('display', 'block');
                } else {
                    $("#form-pdv-mensajero").css('display', 'none');
                }
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
});

$(document).on('click', "button[data-role='pdvgeobarrio']", function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/admin/geobarrio',
        data: {ciudad: $('#select-ciudad-barrio').val(), barrio: $('#input-pedido-barrio').val()},
        beforeSend: function () {
            $('#div-pedido-georeferencia-barrio').html('');
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#div-pedido-georeferencia-barrio').html(data.response);
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
});

$(document).on('click', "button[data-role='trazapasarela']", function () {
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/pedido/trazapasarela',
        data: {compra: $(this).attr('data-pedido')},
        beforeSend: function () {
            $('#modal-trazapasarela').remove();
            Loading.show();
        },
        success: function (data) {
            $('#container').append(data);
            $('#modal-trazapasarela').modal('show');
        },
        complete: function () {
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + jqXHR.responseText);
        }
    });
});

$(document).on('click', "a[data-role='contenido-inicio-visualizar']", function() {

    var idContenido = $(this).attr("data-contenido");
    var vista = $(this).attr("data-vista");
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/inicio/visualizarContenido',
        data: {idContenido: idContenido, vista : vista},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                $("#modal-previsualizar").remove();
                $("#container").append(data.response);
              
                $("#modal-previsualizar").modal('show');

            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});


$(document).on('click', "button[data-role='modificar-ahorro']", function () {
    $('#modal-modificar-ahorro-label > span').html($(this).attr('data-opcion') == 1 ? 'unidades' : 'fracciones');
    $('#modal-modificar-ahorro-label > div').html($(this).attr('data-descripcion'));
    $('#ModificarAhorroForm_descuento').val($(this).attr('data-ahorro'));
    $('#ModificarAhorroForm_idCompraItem').val($(this).attr('data-item'));
    $('#ModificarAhorroForm_opcion').val($(this).attr('data-opcion'));
    $('#modal-modificar-ahorro').modal('show');
});

$(document).on('click', "button[data-role='modificar-ahorro-guardar']", function () {
    var form = $("#form-modificar-ahorro");
    var boton = $(this);

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/pedido/modificarahorro',
        data: form.serialize(),
        beforeSend: function () {
            boton.prop('disabled', true);
            $('div[id^="ModificarAhorroForm_"].has-error').html('');
            $('div[id^="ModificarAhorroForm_"].has-error').css('display', 'none');
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#modal-modificar-ahorro').modal('hide');
                $('#div-detalle-pedido').html(data.response.htmlDetalle);
                $('#div-encabezado-pedido').html(data.response.htmlEncabezado);
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }

            boton.prop('disabled', false);
            Loading.hide();

        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            boton.prop('disabled', false);
            bootbox.alert('Error: ' + jqXHR.responseText);
        }
    });
});

$(document).on('click', "a[data-role='bonotienda-reactivar']", function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: $(this).attr('href'),
        data: {render: true},
        beforeSend: function () {
            $("#modal-reactivar-bono").remove();
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            if (data.result == 'ok') {
                $('body').append(data.response);
                $("#modal-reactivar-bono").modal("show");
            } else {
                alert(data.response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});

$(document).on('click', "input[data-role='bonotienda-reactivar']", function () {
    var form = $(this).parents("form");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/bonos/reactivar/id/' + $(this).attr('data-bono'),
        data: form.serialize(),
        beforeSend: function () {
            $('div[id^="ReactivarBonoTiendaForm_"].text-danger').html('');
            $('div[id^="ReactivarBonoTiendaForm_"].text-danger').css('display', 'none');
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            var data = $.parseJSON(data);

            if (data.result == 'ok') {
                $.fn.yiiGridView.update('bonos-tienda-grid');
                $("#modal-reactivar-bono").modal("hide");
                dialogoAnimado(data.response);
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
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


$(document).on('click', "input[data-role='bonotienda-desactivar']", function () {
    var form = $(this).parents("form");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/bonos/desactivar/id/' + $(this).attr('data-bono'),
        data: form.serialize(),
        beforeSend: function () {
            $('div[id^="ReactivarBonoTiendaForm_"].text-danger').html('');
            $('div[id^="ReactivarBonoTiendaForm_"].text-danger').css('display', 'none');
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            var data = $.parseJSON(data);

            if (data.result == 'ok') {
                $.fn.yiiGridView.update('bonos-tienda-grid');
                $("#modal-reactivar-bono").modal("hide");
                dialogoAnimado(data.response);
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
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

function uniqueId() {
    var time = new Date().getTime();
    while (time == new Date().getTime())
        ;
    return new Date().getTime();
}
