var refresh = null;

function buscarProductos(text, obj, request) {
    $.ajax({
        type: 'POST',
        async: true,
        url: request + '/puntoventa/entreganacional/pedido/buscarProducto',
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



$(document).on('click', 'button[data-action="asignar-pdv-entrega"]', function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/puntoventa/entreganacional/pedido/asignarpdv',
        data: {pdv: $('#select-pdv-asignar').val()},
        beforeSend: function () {
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            if (data.result == 'ok') {
                dialogoAnimado(data.response);
                window.location.replace(data.redirect);
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

/*
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
*/

$(document).on('click', "a[data-cargar-nacional='1'], a[data-cargar-nacional='2']", function () {
    var tipo = $(this).attr('data-cargar-nacional');
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
        url: requestUrl + '/puntoventa/entreganacional/carro/agregar',
        data: data,
        beforeSend: function () {
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
            	dialogoAnimado(data.response.mensajeHTML);
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

function dialogoAnimado(texto) {
    var id = 'dialogo-carro-' + uniqueId();
    $("<div class='dialogo-animado' id='" + id + "'>" + texto + "</div>").appendTo('body');

    $("#" + id).animate({
        opacity: 1,
        bottom: '+=2%'
    }, 400, function () {
        setTimeout(function () {
            $("#" + id).animate({
                opacity: 0,
                bottom: '-=2%'
            }, 400, function () {
                $("#" + id).remove();
            });
        }, 3000);
    });
}

$(document).on('click', "button[data-role='pdvgeodireccion']", function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/entreganacional/pedido/geoDireccion',
        data: {ciudad: $('#select-ciudad-direccion').val(), direccion: $('#input-pedido-direccion').val()},
        beforeSend: function () {
            $('#div-pedido-georeferencia-direcion').html('');
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#div-pedido-georeferencia-direcion').html(data.response);
                $("#select-pdv-asignar").val(data.pdv).trigger("change");
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

$(document).on('click', "button[data-role='disminuir-cantidad']", function() {
    var codigoProducto = $(this).attr('data-producto');
    var id = $(this).attr('data-id');
    var valorUnidad = $(this).attr('data-precio');
    var nro = $("#cantidad-producto-unidad-" + codigoProducto + "-" + id).val();
    nro--;
    if (nro < 0) {
        nro = 0;
    }
    $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nro * valorUnidad));
    $("#cantidad-producto-unidad-" + codigoProducto + "-" + id).val(nro);
});

$(document).on('change', "input[data-role='validar-cantidad-unidad']", function() {
    var codigoProducto = $(this).attr('data-producto');
    var valorUnidad = $(this).attr('data-precio');
    var id = $(this).attr('data-id');
    var nro = $(this).val();

    if (nro < 0) {
        nro = 0;
    }
    $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nro * valorUnidad));
    $("#cantidad-producto-unidad-" + codigoProducto + "-" + id).val(nro);
});

$(document).on('click', "button[data-role='aumentar-cantidad']", function() {
    var codigoProducto = $(this).attr('data-producto');
    var valorUnidad = $(this).attr('data-precio');
    var id = $(this).attr('data-id');
    var nro = $("#cantidad-producto-unidad-" + codigoProducto + "-" + id).val();
    nro++;
    if (nro < 0) {
        nro = 0;
    }
    $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nro * valorUnidad));
    $("#cantidad-producto-unidad-" + codigoProducto + "-" + id).val(nro);
});


/*************************/

$(document).on('change', "input[data-role='modificarcarro']", function() {
    var cantidad = parseInt($(this).val());
    var position = $(this).attr('data-position');
    var modificar = $(this).attr('data-modificar');

    if (isNaN(cantidad) || cantidad < 1) {
        cantidad = 1;
    }
    $(this).val(cantidad);
    modificarCarro(position, modificar);
});

$(document).on('click', "button[data-role='modificarcarro']", function() {
    var position = $(this).attr('data-position');
    var modificar = $(this).attr('data-modificar');
    var operacion = $(this).attr('data-operation');
    var cantidad = 0;
    var id = "";

    if (modificar == 1) {
        var esFraccion = $(this).attr('data-fraction') == 1;
        if (esFraccion) {
            id = '#cantidad-producto-fraccion-' + position;
        } else {
            id = '#cantidad-producto-unidad-' + position;
        }
    } else if (modificar == 2) {
        id = '#cantidad-producto-' + position;
    } else if (modificar == 3) {
        id = '#cantidad-producto-bodega-' + position;
    }

    cantidad = parseInt($(id).val());

    if (isNaN(cantidad) || cantidad < 1) {
        cantidad = 1;
    } else {
        if (operacion == "+") {
            cantidad++;
            if (cantidad < 1) {
                cantidad = 1;
            }
        } else if (operacion == "-" && cantidad > 0) {
            cantidad--;
            if (cantidad < 1) {
                cantidad = 1;
            }
        }
    }

    $(id).val(cantidad);
    modificarCarro(position, modificar);
});


function modificarCarro(position, modificar) {
    var data = {
        modificar: modificar,
        position: position
    };

    if (modificar == 1) {
        var cantidadF = parseInt($('#cantidad-producto-fraccion-' + position).val());
        if (isNaN(cantidadF)) {
            cantidadF = -1;
        } else if (cantidadF < 1) {
            cantidadF = 1;
        }

        var cantidadU = parseInt($('#cantidad-producto-unidad-' + position).val());

        if (isNaN(cantidadU) || cantidadU < 1) {
            cantidadU = 1;
        }

        if (cantidadF > 0) {
            var numeroFracciones = parseInt($('#cantidad-producto-fraccion-' + position).attr('data-nfracciones'));
            var unidadFraccionamiento = parseInt($('#cantidad-producto-fraccion-' + position).attr('data-ufraccionamiento'));
            var fraccionesMaximas = Math.floor(numeroFracciones / unidadFraccionamiento);

            if (cantidadF >= fraccionesMaximas) {
                var unidades = Math.floor(cantidadF / fraccionesMaximas);
                var fracciones = cantidadF % fraccionesMaximas;
                cantidadU += unidades;
                cantidadF = fracciones;
            }
        }

        data['cantidadU'] = cantidadU;
        data['cantidadF'] = cantidadF;
    } else if (modificar == 2) {
        var cantidad = parseInt($('#cantidad-producto-' + position).val());
        if (isNaN(cantidad) || cantidad < 1) {
            cantidad = 1;
        }
        data['cantidad'] = cantidad;
    } else if (modificar == 3) {
        var cantidad = parseInt($('#cantidad-producto-bodega-' + position).val());
        if (isNaN(cantidad) || cantidad < 1) {
            cantidad = 1;
        }
        data['cantidad'] = cantidad;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/puntoventa/entreganacional/carro/modificar',
        data: data,
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
            	$('#div-carro-canasta').html(data.response.canasta);
                $('#div-carro-canasta').trigger("create");

                if (data.response.canastaHTML) {
                    $('#div-carro-vitalcall').html(data.response.canastaHTML);
                    $('#div-carro-vitalcall').trigger("create");
                }

                if (data.response.dialogoHTML) {
                   // alert(data.response.dialogoHTML);//modal
                }
            } else {
                $('#div-carro').html(data.response.carroHTML);
                $('#div-carro').trigger("create");
                alert(data.response.message);
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
}

$(document).on('click', "a[data-eliminar='1'], a[data-eliminar='2'], a[data-eliminar='3']", function() {
    var position = $(this).attr('data-position');
    var eliminar = $(this).attr('data-eliminar');

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/puntoventa/entreganacional/carro/eliminar',
        data: {id: position, eliminar: eliminar},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == 'ok') {
            	// carro de compras
                $('#div-carro-canasta').html(data.canasta);
                $('#div-carro-canasta').trigger("create");
                
                $('#div-carro-vitalcall').html(data.canastaHTML);
                $('#div-carro-vitalcall').trigger("create");
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

});

$(document).on('click', "a[data-role='carrovaciar-entrega']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/puntoventa/entreganacional/carro/vaciar',
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == 'ok') {
            	$('#div-carro-canasta').html(data.canasta);
                $('#div-carro-canasta').trigger("create");
                $('#div-carro-vitalcall').html(data.carro);
                $('#div-carro-vitalcall').trigger("create");
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});

/***********************/


function uniqueId() {
    var time = new Date().getTime();
    while (time == new Date().getTime())
        ;
    return new Date().getTime();
}

function format(input)
{
    input = input + "";
    var num = input.replace(/\./g, '');
    if (!isNaN(num)) {
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/, '');
        return num;
    }
    else {
        return "";
    }
}