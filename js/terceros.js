$(document).on('click', 'button[data-role=actualizar-inventario]', function () {
    var codigoProducto = $(this).attr('data-codigo-producto');
    var cantidad = $('input[data-role="cantidad-producto"]').val();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/terceros/productoTercero/actualizarInventario',
        data: {codigoProducto: codigoProducto, cantidad: cantidad},
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            bootbox.alert(data.response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', 'button[data-role=actualizar-estado-producto-tercero]', function () {
    var idCompraItem = $(this).attr('data-codigo-producto-tercero');
    var idEstado = $('select[name="estado-producto-tercero"]').val();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/terceros/comprasItems/actualizarEstado',
        data: {idCompraItem: idCompraItem, idEstado: idEstado},
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            if (data.result = 'ok') {
                bootbox.alert('Se ha actualizado el estado del producto correctamente');
            } else {
                bootbox.alert('Hubo un problema al actualizar el estado del producto');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', 'button[data-role=actualizar-numero-guia-producto-tercero]', function () {
    var idCompraItem = $(this).attr('data-codigo-producto-tercero');
    var numeroGuia = $('input[name="numero-guia-producto-tercero"]').val();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/terceros/comprasItems/actualizarNumeroGuia',
        data: {idCompraItem: idCompraItem, numeroGuia: numeroGuia},
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            if (data.result = 'ok') {
                bootbox.alert('Se ha actualizado el estado del producto correctamente');
            } else {
                bootbox.alert('Hubo un problema al actualizar el estado del producto');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', 'button[data-role=actualizar-operador-logistico-producto-tercero]', function () {
    var idCompraItem = $(this).attr('data-codigo-producto-tercero');
    var operadorLogistico = $('input[name="operador-logistico-producto-tercero"]').val();
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/terceros/comprasItems/actualizarOperadorLogistico',
        data: {idCompraItem: idCompraItem, operadorLogistico: operadorLogistico},
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            if (data.result = 'ok') {
                bootbox.alert('Se ha actualizado el estado del producto correctamente');
            } else {
                bootbox.alert('Hubo un problema al actualizar el estado del producto');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});