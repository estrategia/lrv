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

$(document).on('click', 'a[data-action="asignar-pdv-direccion"]', function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/puntoventa/entreganacional/pedido/asignarpdv',
        data: {pdv: $(this).attr('data-pdv'),idPedido: $(this).attr('data-pedido')},
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
    var max = $(this).attr('data-max');
    var data = {tipo: tipo, compra: pedido};

    data['maximo'] = max;
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
        url: requestUrl + '/puntoventa/entreganacional/pedido/geoDireccion',
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
   var valorUnidad = $(this).attr('data-precio');
    var nro = $("#cantidad-producto-unidad-" + codigoProducto ).val();
    nro--;
    if (nro < 0) {
        nro = 0;
    }
    $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nro * valorUnidad));
    $("#cantidad-producto-unidad-" + codigoProducto ).val(nro);
});

$(document).on('change', "input[data-role='validar-cantidad-unidad']", function() {
    var codigoProducto = $(this).attr('data-producto');
    var valorUnidad = $(this).attr('data-precio');
    var nro = $(this).val();

    if (nro < 0) {
        nro = 0;
    }
    $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nro * valorUnidad));
    $("#cantidad-producto-unidad-" + codigoProducto).val(nro);
});

$(document).on('click', "button[data-role='aumentar-cantidad']", function() {
    var codigoProducto = $(this).attr('data-producto');
    var valorUnidad = $(this).attr('data-precio');
    var nro = $("#cantidad-producto-unidad-" + codigoProducto).val();
    nro++;
    if (nro < 0) {
        nro = 0;
    }
    $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nro * valorUnidad));
    $("#cantidad-producto-unidad-" + codigoProducto ).val(nro);
});


/*************************/

$(document).on('change', "input[data-role='modificarcarro']", function() {
    var cantidad = parseInt($(this).val());
    var position = $(this).attr('data-position');
    var maximo = $(this).attr('data-max');
    var modificar = $(this).attr('data-modificar');

    if (isNaN(cantidad) || cantidad < 1) {
        cantidad = 1;
    }
    $(this).val(cantidad);
    modificarCarro(position, modificar,maximo);
});

$(document).on('click', "button[data-role='modificarcarro']", function() {
    var position = $(this).attr('data-position');
    var modificar = $(this).attr('data-modificar');
    var operacion = $(this).attr('data-operation');
    var maximo = $(this).attr('data-max');
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
    modificarCarro(position, modificar, maximo);
    
});


//ordenamiento
$(document).on('change', "select[data-role='orden-listaproductos']", function() {
  $.ajax({
      type: 'POST',
      dataType: 'json',
      async: true,
      url: requestUrl + '/puntoventa/entreganacional/catalogo/filtrar',
      data: {'OrdenamientoForm[orden]': $('#OrdenamientoForm_orden').val()},
      beforeSend: function() {
          Loading.show();
      },
      complete: function() {
          Loading.hide();
      },
      success: function(data) {
          if (data.result === 'ok') {
              //$.fn.yiiListView.update('id-productos-list');
              ListViewProductsUpdate();
          } else {
              alert(data.response);
          }
      },
      error: function(jqXHR, textStatus, errorThrown) {
          Loading.hide();
          alert('Error: ' + errorThrown);
      }
  });
});


function filtrarListaProductos() {
	$.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/puntoventa/entreganacional/catalogo/filtrar',
        data: $('#form-filtro-listaproductos').serialize(),
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            if (data.result === 'ok') {
                //$.fn.yiiListView.update('id-productos-list');
                ListViewProductsUpdate();
            } else {
                Loading.hide();
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + errorThrown);
        }
    });
}

function ListViewProductsUpdate() {
    var href = $.fn.yiiListView.getUrl('id-productos-list');

    if (href) {
        var url = href.split('?');
        var params = $.deparam.querystring('?' + (url[1] || ''));

        if (params.categoriasBuscador) {
            if (jQuery.type(params.categoriasBuscador) == "array") {
                var text = "";
                $.each(params.categoriasBuscador, function(index, value) {
                    if (value) {
                        if (text.length > 0)
                            text += "_" + value;
                        else
                            text = "" + value;
                    }
                });
                params.categoriasBuscador = text;
            }
        }

        $.fn.yiiListView.update('id-productos-list', {data: params});
    } else {
        $.fn.yiiListView.update('id-productos-list');
    }
}


//Panel de filtros telefarma
$('.menu-bar').on('click', function(){
	
});

$(document).on('click', "div[data-role='filtros']", function() {
	$('.sidebar').addClass('mostrar');	
});

$(document).on('click', "p[data-role='cerrar']", function() {
	$('.sidebar').removeClass('mostrar');
});



//filtros
$(document).on('click', "input[id^='FiltroForm_listCategoriasTienda_']", function() {
	filtrarListaProductos();
});

$(document).on('click', "a[data-role='filtro-listaproductos-reset']", function() {
    //$('#form-filtro-listaproductos').clearForm();
    var value = [parseInt($('#FiltroForm_precio').attr('data-slider-min')), parseInt($('#FiltroForm_precio').attr('data-slider-max'))];
    setPrecioFiltroForm(value,false);
    $('#FiltroForm_precio').slider('setValue', value);
    $('#calificacion-filtro-listaproductos').raty('score', 0);
    $('#calificacion-filtro-listaproductos').attr('data-score', -1);

    filtrarListaProductos();

});

$(document).on('change', '#FiltroForm_precio_0_text', function() {
    var value = $(this).val();
    value = parseInt(value);
    if (isNaN(value)) {
        value = parseInt($("#FiltroForm_precio").attr("data-slider-min"));
    }
    $('#FiltroForm_precio').slider('setValue', [value, $('#FiltroForm_precio').slider('getValue')[1]]);
    $('#FiltroForm_precio_0').val(value);
    $('#FiltroForm_precio_0_text').val("$" + format(value));
    filtrarListaProductos();
});

$(document).on('change', '#FiltroForm_precio_1_text', function() {
    var value = $(this).val();
    value = parseInt(value);
    if (isNaN(value)) {
        value = parseInt($("#FiltroForm_precio").attr("data-slider-max"));
    }
    $('#FiltroForm_precio').slider('setValue', [$('#FiltroForm_precio').slider('getValue')[0], value]);
    $('#FiltroForm_precio_1').val(value);
    $('#FiltroForm_precio_1_text').val("$" + format(value));
    filtrarListaProductos();
});

$(document).on('slide', '#FiltroForm_precio', function() {
    var value = $('#FiltroForm_precio').slider('getValue');
    setPrecioFiltroForm(value,false);
});

$(document).on('slideStop', '#FiltroForm_precio', function() {
    var value = $('#FiltroForm_precio').slider('getValue');
    setPrecioFiltroForm(value,true);
});

function capturarfiltrocalificacion(score, evt) {
    var calificacion = score;
    calificacion = parseInt(calificacion);
    if (isNaN(calificacion)) {
        calificacion = -1;
    }
    $('#FiltroForm_calificacion').val(calificacion);
    $('#calificacion-filtro-listaproductos').attr('data-score', calificacion);
    filtrarListaProductos();
}

function setPrecioFiltroForm(value,filtrar) {
    $('#FiltroForm_precio_0_text').val("$" + format(value[0]));
    $('#FiltroForm_precio_1_text').val("$" + format(value[1]));
    $('#FiltroForm_precio_0').val(value[0]);
    $('#FiltroForm_precio_1').val(value[1]);
    if(filtrar)
        filtrarListaProductos();
}


function actualizarNumerosPagina() {
    var items = $('#items-page').val();
    $.fn.yiiListView.update('id-productos-list', {data: {pageSize: items}});
}

function modificarCarro(position, modificar, maximo) {
    var data = {
        modificar: modificar,
        position: position,
        maximo:maximo
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
                if(data.response.maximoUnidades){
                	$('#cantidad-producto-unidad-' + position).val(data.response.maximoUnidades)
                	$('#cantidad-producto-fraccion-' + position).val(data.response.maximoFracciones)
                }
                bootbox.alert(data.response.message);
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


function disminuirCantidadFraccionado(codigoProducto, numeroFracciones, unidadFraccionamiento, valorFraccionado, valorUnidad, idUnico) {
    var nro = $("#cantidad-producto-fraccion-" + codigoProducto ).val();
    nro--;
    if (nro < 0) {
        var nro = $("#cantidad-producto-unidad-" + codigoProducto ).val();
        nro--;
        if (nro < 0) {
            nro = 0;
        }
        $("#cantidad-producto-unidad-" + codigoProducto).val(nro);
        $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nro * valorUnidad));
        nro = (numeroFracciones / unidadFraccionamiento - 1);
    }
    $("#subtotal-producto-fraccion-" + codigoProducto).html("$" + format(nro * valorFraccionado));
    $("#cantidad-producto-fraccion-" + codigoProducto).val(nro);
}

function aumentarCantidadFraccionado(codigoProducto, numeroFracciones, unidadFraccionamiento, valorFraccionado, valorUnidad, idUnico) {
    var nro = $("#cantidad-producto-fraccion-" + codigoProducto).val();
    nro++;
    if ((nro * unidadFraccionamiento) == numeroFracciones) {
        var nro = $("#cantidad-producto-unidad-" + codigoProducto).val();
        nro++;
        $("#cantidad-producto-unidad-" + codigoProducto ).val(nro);
        $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nro * valorUnidad));
        nro = 0;
    }
    $("#subtotal-producto-fraccion-" + codigoProducto).html("$" + format(nro * valorFraccionado));
    $("#cantidad-producto-fraccion-" + codigoProducto).val(nro);
}

function validarCantidadFraccionado(codigoProducto, numeroFracciones, unidadFraccionamiento, valorFraccionado, valorUnidad, idUnico) {
    var nroFracciones = $("#cantidad-producto-fraccion-" + codigoProducto ).val();
    var nroUnidades = $("#cantidad-producto-unidad-" + codigoProducto ).val();


    if (nroFracciones < 0) {
        nroFracciones = 0;
    }
    if ((nroFracciones * unidadFraccionamiento) >= numeroFracciones) {
        var nroUnidadesAdicionales = Math.floor((nroFracciones * unidadFraccionamiento) / numeroFracciones);
        nroUnidades = nroUnidades * 1 + nroUnidadesAdicionales;
        $("#cantidad-producto-unidad-" + codigoProducto ).val(nroUnidades);
        $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nroUnidades * valorUnidad));
        nroFracciones = (nroFracciones * unidadFraccionamiento) % numeroFracciones;
    }
    $("#subtotal-producto-fraccion-" + codigoProducto).html("$" + format(nroFracciones * valorFraccionado));
    $("#cantidad-producto-fraccion-" + codigoProducto).val(nroFracciones);
}



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

/************** PASOS DE COMPRA *************/


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
        "FormaPagoEntregaNacionalForm[indicePuntoVenta]": $('input[name="FormaPagoEntregaNacionalForm[indicePuntoVenta]"]').val(),
        "FormaPagoEntregaNacionalForm[tipoEntrega]": $('input[name="FormaPagoEntregaNacionalForm[tipoEntrega]"]').val()
    };
    
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/puntoventa/entreganacional/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-comentario').serialize() + '&' + $('#form-direccion-pagoinvitado').serialize() + '&' + $('#form-remitente').serialize() + '&' +$('#form-pago-entrega').serialize() + '&' + $('#form-pago').serialize(),
        beforeSend: function() {
            boton.prop('disabled', true);
            $('div[id^="FormaPagoEntregaNacionalForm_"].text-danger').html('');
            $('div[id^="FormaPagoEntregaNacionalForm_"].text-danger').css('display', 'none');
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
        url: requestUrl + '/puntoventa/entreganacional/carro/pagar/paso/' + actual + '/post/true',
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
 * pasos compra - forma pago 
 */
$(document).on('click', "div[data-role='formapago']", function() {
    var tipo = $(this).attr('data-tipo');
    if (tipo == "datafono") {
        $("#modal-formapago input[type='radio']").removeAttr('checked');
        $("#modal-formapago #idFormaPago_" + $("#FormaPagoEntregaNacionalForm_idFormaPago_datafono").val()).prop('checked', true);
        $("div[data-role^='formapago-logo-']").addClass('display-none');
        $("div[data-role='formapago-logo-" + $("#FormaPagoEntregaNacionalForm_idFormaPago_datafono").val() + "']").removeClass('display-none');
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

$(document).on('click', "input[name='FormaPagoEntregaNacionalForm[recogida]']", function() {
    var tipo = $(this).val();
    if (tipo == 1) {
    	$("#recogida").removeClass('display-none');
    } else {
    	$("#recogida").addClass('display-none');
    }
});
$(document).ready(function() {
	$('.ad-gallery').adGallery({
	    loader_image: requestUrl + '/libs/ad-gallery/loader.gif',
	    update_window_hash: false,
	    width: 400,
	    height: 300,
	    thumb_opacity: 0.7,
	    hooks: {
	        displayDescription: function(image) {}
	    }
	});
});

$(document).on('click', "#modal-formapago input[type='radio']", function() {
    if ($(this).is(':checked')) {
        //$("div[data-role='formapago']").removeClass('activo');
        //$('div[data-tipo="datafono"]').addClass('activo');
        //$('#div-formapago-vacio').remove();
        $('input[id="FormaPagoEntregaNacionalForm_idFormaPago_datafono"]').prop('checked', true);
        $('input[id="FormaPagoEntregaNacionalForm_idFormaPago_datafono"]').val($(this).val());

        $("div[data-role^='formapago-logo-']").addClass('display-none');
        $("div[data-role='formapago-logo-" + $(this).val() + "']").removeClass('display-none');
        $("div[data-role='formapago-logo-pagoenlinea']").addClass('display-none');
        $("div[data-role='formapago-descripcion']").addClass('display-none');
    }
});