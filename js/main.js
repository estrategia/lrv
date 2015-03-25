function ubicacionGPS() {
    if (navigator.geolocation) {
        $.mobile.loading('show');
        navigator.geolocation.getCurrentPosition(obtenerPosicion, errorPosicion, {'enableHighAccuracy': true, 'timeout': 60000, 'maximumAge': 0});
    } else {
        alert("Servicio no soportado por este navegador.");
    }
}

function obtenerPosicion(pos) {
    var lat = 0;
    var lon = 0;
    if (pos) {
        lat = pos.coords.latitude;
        lon = pos.coords.longitude;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/sitio/gps',
        data: {lat: lat, lon: lon},
        success: function(data) {
            if (data.result == 'ok') {
                $("#popup-ubicacion-gps [data-role='content'] h2").html(data.response.ubicacion);
                $("#popup-ubicacion-gps [data-role='content'] a").attr('href', data.response.url);
                $("#popup-ubicacion-gps").popup("open");
                //$('[data-role= \"main\"]').html(data.response);
                //window.location.href = data.response;
            } else {
                alert(data.response);
            }
            $.mobile.loading('hide');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
}

function errorPosicion(error) {
    $.mobile.loading('hide');
    var mensaje = 'NA';

    switch (error.code) {
        case error.PERMISSION_DENIED:
            mensaje = "Por favor activar/habilitar servicio de ubicación de tu dispositivo.";//"User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            mensaje = "Posición no disponible.";
            break;
        case error.TIMEOUT:
            mensaje = "Expiró el tiempo de espera.";
            break;
        case error.UNKNOWN_ERROR:
            mensaje = "Error desconocido: " + erro.message;
            break;
    }

    alert(mensaje);
}

function subtotalUnidadProducto(codigo) {
    var cantidad = $('#cantidad-producto-unidad-' + codigo).val();
    cantidad = parseInt(cantidad);

    if (isNaN(cantidad)) {
        cantidad = 1;
    }

    if (cantidad <= 1) {
        cantidad = 1;
    }

    $('#cantidad-producto-unidad-' + codigo).val(cantidad);

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/catalogo/subtotalUnidad',
        data: {codigo: codigo, cantidad: cantidad},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result == 'ok') {
                $('#subtotal-producto-unidad-' + codigo).html(data.response.valorFormato);
            } else {
                alert(data.response);
            }
            //$.mobile.loading('hide');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //$.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
}

function subtotalParcialProductoFraccion(codigo, numeroFracciones, unidadFraccionamiento) {
    var cantidad = parseInt($('#cantidad-producto-fraccion-' + codigo).val());

    if (isNaN(cantidad)) {
        cantidad = 0;
    }

    if (cantidad < 0) {
        cantidad = 0;
    }

    $('#cantidad-producto-fraccion-' + codigo).val(cantidad);
    var fraccionesMaximas = Math.floor(numeroFracciones / unidadFraccionamiento);

    var cantidadUnidad = $('#cantidad-producto-unidad-' + codigo).val();
    cantidadUnidad = parseInt(cantidadUnidad);
    if (isNaN(cantidadUnidad)) {
        cantidadUnidad = 0;
    }

    if (cantidadUnidad < 0) {
        cantidadUnidad = 0;
    }

    if (cantidad >= fraccionesMaximas) {
        var unidades = Math.floor(cantidad / fraccionesMaximas);
        var fracciones = cantidad % fraccionesMaximas;
        cantidadUnidad += unidades;
        cantidad = fracciones;
    }

    $('#cantidad-producto-unidad-' + codigo).val(cantidadUnidad);
    $('#cantidad-producto-fraccion-' + codigo).val(cantidad);

    //$.mobile.loading('show');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/catalogo/subtotalFraccion',
        data: {codigo: codigo, cantidadUnidad: cantidadUnidad, cantidadFraccion: cantidad},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            //$.mobile.loading('hide');
            if (data.result == 'ok') {
                $('#subtotal-producto-unidad-' + codigo).html(data.response.valorUnidadFormato);
                $('#subtotal-producto-fraccion-' + codigo).html(data.response.valorFraccionFormato);
                $('#total-producto-' + codigo).html(data.response.valorTotalFormato);
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //$.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
}

function subtotalProductoCarro(id) {
    var cantidad = $('#cantidad-producto-' + id).val();
    cantidad = parseInt(cantidad);

    if (isNaN(cantidad)) {
        cantidad = 1;
    }

    if (cantidad <= 1) {
        cantidad = 1;
    }

    $('#cantidad-producto-' + id).val(cantidad);

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/modificar',
        data: {id: id, cantidad: cantidad},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result == 'ok') {
                $('#div-carro').html(data.carro);
                $('#div-carro').trigger("create");
                $('#panel-carro-canasta').html(data.canasta);
                $('#panel-carro-canasta').trigger("create");
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
}

function eliminarProductoCarro(id) {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/eliminar',
        data: {id: id},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result == 'ok') {
                $('#div-carro').html(data.carro);
                $('#div-carro').trigger("create");
                $('#panel-carro-canasta').html(data.canasta);
                $('#panel-carro-canasta').trigger("create");
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
}

$(document).on("pagecreate", function(event) {
    $(function() {
        //Se activa cuando el scroll supera los 100px
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('a.scroll-top').fadeIn();
            } else {
                $('a.scroll-top').fadeOut();
            }
        });
        //Crea la animacion al dar clic sobre el boton
        $('a.scroll-top').click(function() {
            $("html, body").animate({scrollTop: 0}, 600);
            return false;
        });
    });

    $("[data-role='raty']").raty({
        starOn: requestUrl + '/libs/raty/images/star-on.png',
        starOff: requestUrl + '/libs/raty/images/star-off.png',
        starHalf: requestUrl + '/libs/raty/images/star-half.png',
        cancelOn: requestUrl + '/libs/raty/images/cancel-on.png',
        cancelOff: requestUrl + '/libs/raty/images/cancel-off.png',
        readOnly: function() {
            return $(this).attr('data-readonly') === "true";
        },
        click: function(score, evt) {
            if ($(this).attr('data-callback')) {
                var funcion = $(this).attr('data-callback');
                window[funcion](score, evt);
            }
        },
        score: function() {
            return $(this).attr('data-score');
        }
    });
    $("[id^='owl-productodetalle-']").owlCarousel({
        navigation: false,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: 3000
    });
    $("#popup-carro-especial").bind({
        popupafterclose: function(event, ui) {
            $("#popup-carro-especial [data-role='content']").html("");
        }
    });
    //$('[data-role=main]:visible').css('margin-top',($(window).height() - $('[data-role=header]:visible').height() - $('[data-role=footer]:visible').height() - $('[data-role=main]:visible').outerHeight())/2);

});

function ratyclic(score, evt) {
    alert('ID ratyclik: ' + this.id + "\nscore: " + score + "\nevent: " + evt.type);
}

function calificarProducto(codigo) {
    var titulo = $('#calificacion-titulo-' + codigo);
    var comentario = $('#calificacion-comentario-' + codigo);
    var calificacion = $('#calificacion-raty-' + codigo).raty('score');

    calificacion = parseInt(calificacion);

    if (isNaN(calificacion)) {
        calificacion = 0;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/catalogo/calificar',
        data: {codigo: codigo.trim(), titulo: titulo.val().trim(), comentario: comentario.val().trim(), calificacion: calificacion},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === 'ok') {
                $("[data-role='calificacion']").remove();
                $('#calificacion-raty-' + codigo).raty('readOnly', true);
                alert(data.response);
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
}

function carroPopupEspecial(codigoProducto, codigoEspecial) {
    $("#popup-carro-especial [data-cargar='1']").attr('data-producto', codigoProducto);
    $("#popup-carro-especial [data-role='content']").html($("#popup-especial-" + codigoEspecial + " [data-role='content']").html());
    $("#popup-carro-especial").popup("open");
}

$(document).on('change', "input[id^='FiltroForm_listMarcas_'], input[id^='FiltroForm_listAtributos_']", function() {
    var marcas = [];
    $("input[id^='FiltroForm_listMarcas_']").each(function() {
        if ($(this).is(":checked")) {
            marcas.push($(this).val());
        }
    });
    var atributos = [];
    $("input[id^='FiltroForm_listAtributos_']").each(function() {
        if ($(this).is(":checked")) {
            atributos.push($(this).val());
        }
    });

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/catalogo/filtro',
        data: {marcas: marcas, atributos: atributos},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            $('#div-filtro-marcas').html(data.marcas);
            $('#div-filtro-marcas').trigger("create");
            $('#div-filtro-atributos').html(data.atributos);
            $('#div-filtro-atributos').trigger("create");
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

});

function verUbicacion() {
    if ($('#ubicacion-info').attr('data-active') == '0') {
        $('#ubicacion-info').removeClass("hide");
        $('#ubicacion-info').addClass("display");
        $('#ubicacion-info').attr('data-active', "1");
    } else {
        $('#ubicacion-info').removeClass("display");
        $('#ubicacion-info').addClass("hide");
        $('#ubicacion-info').attr('data-active', "0");
    }
}

$(document).on('click', "a[data-cargar='1']", function() {
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

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/agregar',
        data: {producto: producto, cantidadU: cantidadU, cantidadF: cantidadF},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $("#popup-carro-especial").popup("close");
                $('#panel-carro-canasta').html(data.canasta);
                $('#panel-carro-canasta').trigger("create");
                alert(data.response);
            } else {
                alert("Error: " + data.response);
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "input[id^='btn-direccion-actualizar-']", function() {
    var form = $(this).parents("form");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/direccionActualizar',
        data: form.serialize(),
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
            } else if (obj.result === 'error') {
                alert(obj.response);
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

$(document).on('click', "input[id='btn-direccion-crear']", function() {
    var form = $(this).parents("form");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/direccionCrear',
        data: form.serialize(),
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                location.reload();
            } else if (obj.result === 'error') {
                alert(obj.response);
            } else {
                $.each(obj, function(element, error) {
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

$(document).on('click', "input[id^='btn-direccion-eliminar-']", function() {
    var direccion = $(this).attr('data-direccion');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/direccionEliminar',
        data: {direccion: direccion},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === 'ok') {
                console.log('eliminando: ' + '#collapsible-direccion-' + direccion);
                $('#collapsible-direccion-' + direccion).remove();
                $('#collapsibleset-direcciones').collapsibleset("refresh");
            } else if (data.result === 'error') {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

    return false;
});

function pasoDespacho(actual, siguiente) {
    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/carro/pagar/paso/' + actual + '/ajax/true',
        data: {
            siguiente: siguiente,
            direccion: $('input[name="FormaPagoForm[idDireccionDespacho]"]:checked').val()
        },
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var obj = $.parseJSON(data);
            
            if (obj.result === 'ok') {
                window.location.replace(obj.redirect);
            }else if (data.result === 'error') {
                alert(data.response);
            } else {
                $.each(obj, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
}


$(document).on('click', "input[id='btn-carropagar-siguiente']", function() {
    var actual = $(this).attr('data-origin');
    var siguiente = $(this).attr('data-redirect');

    if (actual === 'despacho') {
        pasoDespacho(actual, siguiente);
    } else if (actual === 'entrega') {

    } else if (actual === 'pago') {

    } else if (actual === 'confirmacion') {

    }

    return false;
});


/*
 $(window).on("navigate", function(event, data) {
 console.log(data.state.info);
 console.log(data.state.direction);
 console.log(data.state.url);
 console.log(data.state.hash);
 });*/
