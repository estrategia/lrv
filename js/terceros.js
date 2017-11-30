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