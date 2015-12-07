function alerta(mensaje) {
    $('<div>').mdialog({
        content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + mensaje + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
    });
}

intervalRelacionados = null;

function animarRelacionado() {
    $("html, body").animate({scrollTop: 0}, 600);
    $("#link-relacionados-agregar").css("opacity", "");
    intervalRelacionados = setInterval(function() {
        $("#link-relacionados-agregar").animate({opacity: '0.5'}, 400, function() {
            $("#link-relacionados-agregar").animate({opacity: '1'}, 400);
        });
    }, 1000);
    $("#link-relacionados-agregar").css("display", "");
    setTimeout(function() {
        if (intervalRelacionados != null) {
            clearInterval(intervalRelacionados);
            intervalRelacionados = null;
        }
        $("#link-relacionados-agregar").css("opacity", "");
    }, 10000);
}

function quitarRelacionado() {
    if (intervalRelacionados != null) {
        clearInterval(intervalRelacionados);
        intervalRelacionados = null;
    }
    $("#link-relacionados-agregar").css("display", "none");
    $("#link-relacionados-agregar").css("opacity", "");
    $("#link-relacionados-agregar").attr("href", "#");
}


function ubicacionGPS() {
    if (navigator.geolocation) {
        $.mobile.loading('show');
        navigator.geolocation.getCurrentPosition(obtenerPosicion, errorPosicion, {'enableHighAccuracy': true, 'timeout': 30000, 'maximumAge': 0});
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
                $("#popup-ubicacion-gps [data-role='content']").html(data.response);
                $("#popup-ubicacion-gps").popup("open");

                /*$("#popup-ubicacion-gps [data-role='content'] div").html(data.response.ubicacion);
                 $("#popup-ubicacion-gps [data-role='content'] a").attr('href', data.response.url);
                 $("#popup-ubicacion-gps").popup("open");*/

                //$('[data-role= \"main\"]').html(data.response);
                //window.location.href = data.response;
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
            $.mobile.loading('hide');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
}

$(document).on('click', 'a[data-role="ubicacion-gps-seleccion"]', function() {
    $('#ubicacion-seleccion-ciudad').val($(this).attr('data-ciudad'));
    $('#ubicacion-seleccion-sector').val($(this).attr('data-sector'));
    $('#ubicacion-seleccion-direccion').val('');
    $("#popup-ubicacion-gps").popup("close");
    $("#popup-ubicacion-gps [data-role='content']").html("");
});

$(document).on('click', 'a[data-role="ubicacion-seleccion-mapa"]', function() {
    //$.mobile.loading('show');
    var lat = 0;
    var lon = 0;
    if (map) {
        lat = map.getCenter().lat();
        lon = map.getCenter().lng();
    }
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/sitio/gps',
        data: {lat: lat, lon: lon},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        success: function(data) {
            if (data.result == 'ok') {
                $( "#page-ubicacion-map" ).dialog( "close" ); 
                $('#ubicacion-seleccion-ciudad').val(data.response.ciudad);
                $('#ubicacion-seleccion-sector').val(data.response.sector);
                $('#ubicacion-seleccion-direccion').val('');
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
            $.mobile.loading('hide');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert(errorThrown);
        }
    });
});

$(document).on('click', 'a[data-role="ubicacion-seleccion"]', function() {
    var form = $(this).parents("form");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/sitio/ubicacionSeleccion',
        data: form.serialize(),
        dataType: 'json',
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function(data) {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result == 'ok') {
                dialogoAnimado(data.response);
                if (data.urlAnterior) {
                    location.href = data.urlAnterior;
                } else {
                    location.href = requestUrl + '/sitio/inicio';
                }
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // boton.button('enable');
            $.mobile.loading('hide');
            alert(errorThrown);
        }
    });
    return false;
});

$(document).on('change', 'select[data-role="ciudad-despacho-map"]', function() {
    var val = $(this).val().trim();
    if (val.length > 0) {
        var option = $('select[data-role="ciudad-despacho-map"] option[value="' + val + '"]').attr('selected', 'selected');

        if (map) {
            map.setCenter(new google.maps.LatLng(parseFloat(option.attr('data-latitud')), parseFloat(option.attr('data-longitud'))));
            $('#select-ubicacion-preferencia').remove();
            $('#select-ubicacion-psubsector').removeClass('div-center').addClass('float-left');
            $.ajax({
                type: 'POST',
                async: true,
                url: requestUrl + '/sitio/ubicacionSeleccion',
                data: {ciudad: val},
                dataType: 'html',
                beforeSend: function() {
                    $.mobile.loading('show');
                },
                complete: function() {
                    $.mobile.loading('hide');
                },
                success: function(data) {
                    if (data.length > 0) {
                        $('#select-ubicacion-content').append(data);
                        $('#select-ubicacion-content').trigger("create");
                    } else {
                        $('#select-ubicacion-psubsector').removeClass('float-left').addClass('div-center');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $.mobile.loading('hide');
                    alert('Error: ' + errorThrown);
                }
            });
        }
    }
});

$(document).on('click', 'button[data-role="ubicacion-mapa"]', function() {
    $.mobile.changePage('#page-ubicacion-map', {transition: "pop", role: "dialog", reverse: false});
    resizeMap();
});

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

$(document).on('click', 'button[data-role="ubicacion-direccion"]', function() {
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/usuario/direccionesUbicacion',
        dataType: 'html',
        beforeSend: function() {
            $("div[id='page-direccionesubicacion']").remove();
            $.mobile.loading('show');
        },
        complete: function(data) {
            $.mobile.loading('hide');
        },
        success: function(data) {
            $('body').append(data);
            $.mobile.changePage('#page-direccionesubicacion', {transition: "pop", role: "dialog", reverse: false});
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
    return false;
});

$(document).on('click', "a[data-ubicacion='verificacion-domicilio']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/sitio/ubicacionVerificacion',
        data: {ciudad: $(this).attr('data-ciudad'), sector: $(this).attr('data-sector')},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result == "ok") {
                if (data.response.domicilio) {
                    window.location.replace(data.response.url);
                } else {
                    $("#popup-ubicacion-gps [data-role='content'] div").html(data.response.mensaje);
                    $("#popup-ubicacion-gps [data-role='content'] a").attr('href', data.response.url);
                    $("#popup-ubicacion-gps").popup("open");
                }
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
});

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
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
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
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            //$.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
}

function subtotalProductoBodega(codigo) {
    var cantidadUbicacion = parseInt($('#cantidad-producto-ubicacion-' + codigo).val());

    if (isNaN(cantidadUbicacion)) {
        cantidadUbicacion = 0;
    }

    if (cantidadUbicacion < 0) {
        cantidadUbicacion = 0;
    }

    var cantidadBodega = $('#cantidad-producto-bodega-' + codigo).val();
    cantidadBodega = parseInt(cantidadBodega);
    if (isNaN(cantidadBodega)) {
        cantidadBodega = 0;
    }

    if (cantidadBodega < 0) {
        cantidadBodega = 0;
    }

    $('#cantidad-producto-ubicacion-' + codigo).val(cantidadUbicacion);
    $('#cantidad-producto-bodega-' + codigo).val(cantidadBodega);

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/catalogo/subtotalBodega',
        data: {codigo: codigo, bodega: cantidadBodega, ubicacion: cantidadUbicacion},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result == 'ok') {
                $('#subtotal-producto-bodega-' + codigo).html(data.response.valorBodegaFormato);
                $('#subtotal-producto-ubicacion-' + codigo).html(data.response.valorUbicacionFormato);
                $('#total-producto-' + codigo).html(data.response.valorTotalFormato);
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
}

function subtotalCombo(codigo) {
    var cantidad = $('#cantidad-combo-' + codigo).val();
    cantidad = parseInt(cantidad);

    if (isNaN(cantidad)) {
        cantidad = 1;
    }

    if (cantidad <= 1) {
        cantidad = 1;
    }

    $('#cantidad-combo-' + codigo).val(cantidad);

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/catalogo/subtotalCombo',
        data: {codigo: codigo, cantidad: cantidad},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result == 'ok') {
                $('#subtotal-combo-' + codigo).html(data.response.valorFormato);
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
            //$.mobile.loading('hide');
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
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
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
        url: requestUrl + '/carro/eliminar',
        data: {id: position, eliminar: eliminar},
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
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

});

$(document).on('click', "a[data-role='carrovaciar']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/vaciar',
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
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});

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
        hints: ['mala', 'deficiente', 'regular', 'buena', 'excelente'],
        noRatedMsg: 'Sin calificación',
        /*round: { down: 0.25, full: 0.6, up: 0.76 },*/
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
        autoPlay: 10000
    });

    $("[id^='slide-relacionados']").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        autoPlay: 3000,
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 5], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: [300, 2] // itemsMobile disabled - inherit from itemsTablet option
    });

    $("[id^='slide-imagenes']").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        items: 4,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3]

    });

    pagoCredirebaja('#form-pago-pago', 'FormaPagoForm');
    pagoCredirebaja('#form-pagoexpess', 'PagoExpress');
    colapseDireccion();
    //$('[data-role=main]:visible').css('margin-top',($(window).height() - $('[data-role=header]:visible').height() - $('[data-role=footer]:visible').height() - $('[data-role=main]:visible').outerHeight())/2);

    $(function() {
        var elementArea = $("textarea[data-countchar]");
        if (elementArea.length) {
            countChar(elementArea, elementArea.attr('data-countchar'));
        }
    });

    $("div[id^='collapsible-direccion-ciudad-']").on("collapsiblecollapse", function(event, ui) {
        $("div[id^='div-direccion-form-']").css('display', 'none');
        $("input[id^='DireccionesDespacho_idDireccionDespacho_']").removeAttr("checked");
        $("input[id^='DireccionesDespacho_idDireccionDespacho_']").checkboxradio("refresh");
    });
});


function ratyclic(score, evt) {
    alert('ID ratyclik: ' + this.id + "\nscore: " + score + "\nevent: " + evt.type);
}


$(document).on('click', "button[data-role='calificacion']", function() {
    var codigo = $(this).attr('data-producto');
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
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

    return false;
});

$(document).on('change', "input[id^='FiltroForm_listMarcas_']", function() {
    recalcularFiltros(1);
});

$(document).on('change', "input[id^='FiltroForm_listFiltros_']", function() {
    recalcularFiltros(2);
});

function recalcularFiltros(tipo) {
    var marcas = {};
    $("input[id^='FiltroForm_listMarcas_']").each(function() {
        if ($(this).is(":checked")) {
            marcas[$(this).val()] = parseInt($(this).val());
        }
    });
    var atributos = {};
    $("input[id^='FiltroForm_listFiltros_']").each(function() {
        if ($(this).is(":checked")) {
            atributos[$(this).val()] = parseInt($(this).attr('data-filtro'));
        }
    });

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/catalogo/filtro',
        data: {marcas: marcas, atributos: atributos, tipo: tipo},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.hasOwnProperty('marcas')) {
                $('#div-filtro-marcas').html(data.marcas);
                $('#div-filtro-marcas').trigger("create");
            }
            if (data.hasOwnProperty('atributos')) {
                $('#div-filtro-atributos').html(data.atributos);
                $('#div-filtro-atributos').trigger("create");
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

}

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
            quitarRelacionado();
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#panel-carro-canasta').html(data.response.canastaHTML);
                $('#panel-carro-canasta').trigger("create");

                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                    $('#icono-producto-agregado-' + producto).addClass('active');
                }

                if (data.response.dialogoHTML) {
                    $('<div>').mdialog({
                        content: data.response.dialogoHTML
                    });
                }

                if (data.response.relacionados && $("#link-relacionados-agregar").length > 0) {
                    $("#link-relacionados-agregar").attr("href", requestUrl + "/catalogo/relacionados/producto/" + producto);
                    animarRelacionado();
                }
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "a[data-cargar='2']", function() {
    var combo = $(this).attr('data-combo');

    var cantidad = $('#cantidad-combo-' + combo).val();
    cantidad = parseInt(cantidad);
    if (isNaN(cantidad)) {
        cantidad = 0;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/agregarCombo',
        data: {combo: combo, cantidad: cantidad},
        beforeSend: function() {
            $.mobile.loading('show');
            quitarRelacionado();
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#panel-carro-canasta').html(data.response.canastaHTML);
                $('#panel-carro-canasta').trigger("create");

                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                    $('#icono-combo-agregado-' + combo).addClass('active');
                }

                if (data.response.dialogoHTML) {
                    $('<div>').mdialog({
                        content: data.response.dialogoHTML
                    });
                }
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "a[data-cargar='3']", function() {
    var producto = $(this).attr('data-producto');

    var cantidadUbicacion = $('#cantidad-producto-ubicacion-' + producto).val();
    cantidadUbicacion = parseInt(cantidadUbicacion);
    if (isNaN(cantidadUbicacion)) {
        cantidadUbicacion = 0;
    }

    var cantidadBodega = parseInt($('#cantidad-producto-bodega-' + producto).val());
    cantidadBodega = parseInt(cantidadBodega);
    if (isNaN(cantidadBodega)) {
        cantidadBodega = 0;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/agregarBodega',
        data: {producto: producto, cantidadU: cantidadUbicacion, cantidadB: cantidadBodega},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#panel-carro-canasta').html(data.response.canastaHTML);
                $('#panel-carro-canasta').trigger("create");
                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                }

                if (data.response.dialogoHTML) {
                    $('<div>').mdialog({
                        content: data.response.dialogoHTML
                    });
                }
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('change', "input[data-modificar='1'], input[data-modificar='2'], input[data-modificar='3']", function() {
    var position = $(this).attr('data-position');
    var modificar = $(this).attr('data-modificar');
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
            //if(cantidadF==-1){
            cantidadU = 1;
            //}else{
            //cantidadU = 0;
            //}
        }

        if (cantidadF > 0) {
            var numeroFracciones = parseInt($(this).attr('data-nfracciones'));
            var unidadFraccionamiento = parseInt($(this).attr('data-ufraccionamiento'));
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

    //console.log(data);

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/modificar',
        data: data,
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#div-carro').html(data.response.carroHTML);
                $('#div-carro').trigger("create");

                if (data.response.canastaHTML) {
                    $('#panel-carro-canasta').html(data.response.canastaHTML);
                    $('#panel-carro-canasta').trigger("create");
                }

                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                }

                if (data.response.dialogoHTML) {
                    $('<div>').mdialog({
                        content: data.response.dialogoHTML
                    });
                }
            } else {
                $('#div-carro').html(data.response.carroHTML);
                $('#div-carro').trigger("create");
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response.message + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('change', 'input[name="DireccionesDespacho[idDireccionDespacho]"]:radio', function(e) {
    var direccion = $('input[name="DireccionesDespacho[idDireccionDespacho]"]:checked').val();
    $("div[id^='div-direccion-form-']").css('display', 'none');
    $('#div-direccion-form-' + direccion).css('display', 'block');
    $('html,body').animate({
        scrollTop: $('#div-direccion-form-' + direccion).offset().top
    }, 200);

    if ($('form[id="form-ubicacion"]').length > 0) {
        $('#ubicacion-seleccion-ciudad').val('');
        $('#ubicacion-seleccion-sector').val('');
        $('#ubicacion-seleccion-direccion').val($(this).val());
    }
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


$(document).on('click', "a[data-role='direccion-adicionar-modal']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/direccionCrear',
        data: {render: true},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var id = "page-direccion-crear-" + uniqueId();
            var page = "<div data-role='page' id='" + id + "'><div data-role='main' class='ui-content'>" + data.response.dialogoHTML + "<a href='#' class='ui-btn ui-btn-n ui-corner-all ui-shadow' data-rel='back'>Cerrar</a></div></div>";
            $('body').append(page);
            $.mobile.changePage('#' + id, {transition: "pop", role: "dialog", reverse: false});
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "input[data-role='direccion-adicionar']", function() {
    var form = $(this).parents("form");
    var modal = $(this).attr("data-modal");
    var data = {modal: modal};

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/direccionCrear',
        data: $.param(data) + '&' + form.serialize(),
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === 'ok') {
                if (modal == 1) {
                    $('#div-direcciones-lista').html(data.response.direccionesHTML);
                    $('#div-direcciones-lista').trigger("create");
                    $("div[id^='page-direccion-crear-']").dialog("close");
                    dialogoAnimado(data.response.mensaje);
                } else {
                    location.reload();
                }
            } else if (data.result === 'error') {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            } else {
                $.each(data, function(element, error) {
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
                $('#div-direccion-radio-' + direccion).remove();
            } else if (data.result === 'error') {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

    return false;
});

function pasoDespacho(actual, siguiente, boton) {
    var data = {
        siguiente: siguiente,
        direccion: $('input[name="FormaPagoForm[idDireccionDespacho]"]:checked').val()
    };

    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-direccion-pagoinvitado').serialize(),
        beforeSend: function() {
            boton.button('disable');
            $('div[id^="FormaPagoForm_"].has-error').html('');
            $('div[id^="FormaPagoForm_"].has-error').css('display', 'none');
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                window.location.replace(obj.redirect);
            } else if (obj.result === 'error') {
                alerta(obj.response);
                boton.button('enable');
            } else {
                $.each(obj, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
                boton.button('enable');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
            boton.button('enable');
        }
    });
}

function pasoEntrega(actual, siguiente, boton) {
    var data = {siguiente: siguiente};

    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-entrega').serialize(),
        beforeSend: function() {
            boton.button('disable');
            $('div[id^="FormaPagoForm_"].has-error').html('');
            $('div[id^="FormaPagoForm_"].has-error').css('display', 'none');
            $('#form-pago-entrega').trigger("create");
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                window.location.replace(obj.redirect);
            } else if (obj.result === 'error') {
                alerta(obj.response);
                boton.button('enable');
            } else {
                $.each(obj, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
                boton.button('enable');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
            boton.button('enable');
        }
    });
}

function pasoPago(actual, siguiente, boton) {
    var data = {siguiente: siguiente};

    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-pago').serialize(),
        beforeSend: function() {
            boton.button('disable');
            $('div[id^="FormaPagoForm_"].has-error').html('');
            $('div[id^="FormaPagoForm_"].has-error').css('display', 'none');
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                window.location.replace(obj.redirect);
            } else if (obj.result === 'error') {
                alerta(obj.response);
                boton.button('enable');
            } else {
                $.each(obj, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
                boton.button('enable');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
            boton.button('enable');
        }
    });
}

function pasoConfirmacion(actual, siguiente, boton) {
    var data = {siguiente: siguiente};

    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-confirmacion').serialize(),
        beforeSend: function() {
            boton.button('disable');
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                window.location.replace(obj.redirect);
            } else if (obj.result === 'error') {
                alerta(obj.response);
                boton.button('enable');
            } else {
                $.each(obj, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
                boton.button('enable');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
            boton.button('enable');
        }
    });
}


$(document).on('click', "input[id='btn-carropagar-siguiente'], input[id='btn-carropagar-anterior']", function() {
    var actual = $(this).attr('data-origin');
    var siguiente = $(this).attr('data-redirect');

    if (actual === 'despacho') {
        pasoDespacho(actual, siguiente, $(this));
    } else if (actual === 'entrega') {
        pasoEntrega(actual, siguiente, $(this));
    } else if (actual === 'pago') {
        pasoPago(actual, siguiente, $(this));
    } else if (actual === 'confirmacion') {
        pasoConfirmacion(actual, siguiente, $(this));
    }

    return false;
});

$(document).on('change', 'input[name="FormaPagoForm[idFormaPago]"]:radio', function(e) {
    pagoCredirebaja('#form-pago-pago', 'FormaPagoForm');
});

$(document).on('change', 'input[name="PagoExpress[idFormaPago]"]:radio', function(e) {
    pagoCredirebaja('#form-pagoexpess', 'PagoExpress');
    $('#PagoExpress_idFormaPago_em_').html('');
});

function pagoCredirebaja(form, name) {
    if ($(form).length) {
        //$('[id="div-credirebaja"] input').val('');
        var formaPago = $('input[name="' + name + '[idFormaPago]"]:checked').val();
        if (formaPago == undefined || $('#' + name + '_idFormaPago_' + formaPago).attr('data-credirebaja') == 0) {
            $('[id="div-credirebaja"] input').attr('disabled', 'disabled');
            $('[id="div-credirebaja"] select').attr('disabled', 'disabled');
            $('#div-credirebaja').css('display', 'none');
        } else {
            $('[id="div-credirebaja"] input').removeAttr('disabled');
            $('[id="div-credirebaja"] select').removeAttr('disabled');
            $('#div-credirebaja').css('display', 'block');
        }
    }
}

$(document).on('change', 'input[name="PagoExpress[idDireccionDespacho]"]:radio', function(e) {
    colapseDireccion();
    $('#PagoExpress_idDireccionDespacho_em_').html('');
});

function colapseDireccion() {
    if ($("#form-pagoexpess").length) {
        var direccion = $('input[name="PagoExpress[idDireccionDespacho]"]:checked').val();
        $("div[id^=div-infodireccion-]").css('display', 'none');
        if (direccion !== undefined) {
            $("#div-infodireccion-" + direccion).css('display', 'block');
        }
    }
}

$(document).on('change', "#FormaPagoForm_numeroTarjeta", function() {
    var cantidad = $(this).val();
    cantidad = parseInt(cantidad);
    if (isNaN(cantidad)) {
        $(this).val('');
    }
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
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#panel-carro-canasta').html(data.response.canastaHTML);
                $('#panel-carro-canasta').trigger("create");
                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                }

                if (data.response.dialogoHTML) {
                    $('<div>').mdialog({
                        content: data.response.dialogoHTML
                    });
                }
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
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
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#panel-carro-canasta').html(data.response.canastaHTML);
                $('#panel-carro-canasta').trigger("create");
                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                }

                if (data.response.dialogoHTML) {
                    $('<div>').mdialog({
                        content: data.response.dialogoHTML
                    });
                }
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
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
            $.mobile.loading('show');
        },
        success: function(data) {
            if (data.result === "ok") {
                $.fn.yiiGridView.update('grid-cuenta-listapedidos');
                $.mobile.loading('hide');
            } else {
                $.mobile.loading('hide');
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "a[data-role='pedidogridestado']", function() {
    $('<div>').mdialog({
        content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + $(this).attr('data-estado') + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
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
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#panel-carro-canasta').html(data.response.canastaHTML);
                $('#panel-carro-canasta').trigger("create");
                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                }

                if (data.response.dialogoHTML) {
                    $('<div>').mdialog({
                        content: data.response.dialogoHTML
                    });
                }
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
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
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
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
                $('.ui-collapsible').collapsible('collapse');
                dialogoAnimado(data.response.mensajeHtml);
            } else if (data.result === 'error') {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            } else {
                $.each(data, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('change', "input[data-role='actualizarlistadetalle']", function() {
    var detalle = $(this).attr('data-detalle');
    var unidades = $(this).val();
    unidades = parseInt(unidades);

    if (isNaN(unidades)) {
        unidades = 0;
    }
    if (unidades <= 0) {
        unidades = 0;
    }
    $(this).val(unidades);

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/listadetalle/accion/actualizar',
        data: {detalle: detalle, unidades: unidades},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#div-listadetalle').html(data.response.detalleHTML);
                $('#div-listadetalle').trigger("create");
                dialogoAnimado(data.response.mensajeHTML);
            } else if (data.result === 'error') {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
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
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#div-listadetalle').html(data.response.detalleHTML);
                $('#div-listadetalle').trigger("create");
                dialogoAnimado(data.response.mensajeHTML);
            } else if (data.result === 'error') {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "a[data-role='lstpersonalguardar']", function() {
    var tipo = $(this).attr('data-tipo');
    tipo = parseInt(tipo);
    if (isNaN(tipo)) {
        tipo = -1;
    }
    var codigo = $(this).attr('data-codigo');
    var unidades = 0;

    if (tipo === 1) {
        unidades = $('#cantidad-producto-unidad-' + codigo).val();
        unidades = parseInt(unidades);
        if (isNaN(unidades)) {
            unidades = 0;
        }
    } else if (tipo === 2) {
        unidades = $('#cantidad-combo-' + codigo).val();
        unidades = parseInt(unidades);
        if (isNaN(unidades)) {
            unidades = 0;
        }
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/listapersonal/lista/guardar',
        data: {codigo: codigo, tipo: tipo, unidades: unidades, render: true},
        beforeSend: function() {
            $("div[id^='page-listaguardar-']").remove();
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === 'ok') {
                var id = "page-listaguardar-" + uniqueId();
                var page = "<div data-role='page' id='" + id + "'><div data-role='main' class='ui-content'>" + data.response.dialogoHTML + "<a href='#' class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back'>Cerrar</a></div></div>";
                $('body').append(page);
                $.mobile.changePage('#' + id, {transition: "pop", role: "dialog", reverse: false});
            } else if (data.result === 'error') {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "input[data-role='lstpersonalguardar']", function() {
    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/listapersonal/lista/guardar',
        data: $('#form-listaguardar').serialize(),
        beforeSend: function() {
            $('div[id^="ListaGuardarForm_"].has-error').html('');
            $('div[id^="ListaGuardarForm_"].has-error').css('display', 'none');
            $('#form-listaguardar input[type=button]').attr('disabled', 'disabled');
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
            $('#form-listaguardar input[type=button]').removeAttr('disabled');
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                //$('#form-listaguardar')[0].reset();
                //$("div[id^=popup-listaguardar-]").popup("close");
                $("div[id^='page-listaguardar-']").dialog("close");
                dialogoAnimado(data.response);
            } else if (data.result === 'error') {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            } else {
                $.each(data, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "a[data-role='cambioubicacion']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/vacio',
        data: $('#form-listaguardar').serialize(),
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result == "ok") {
                if (data.response) {
                    window.location.replace(requestUrl + '/sitio/ubicacion');
                } else {
                    $("#popup-cambioubicacion").popup("open");
                }
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('keyup', "input[type='number']", function() {
    var max = -1;
    if ($(this).attr('maxlength')) {
        max = parseInt($(this).attr('maxlength'));
        if (isNaN(max)) {
            max = -1;
        }
    }

    if ($(this).val().length > 0) {
        if (max > 0 && $(this).val().length > max) {
            $(this).val($(this).val().substr(0, max));
        }
    } else {
        $(this).val('');
    }
});

$(document).on('click', "input[data-role='pagopasarela']", function() {
    var boton = $(this);
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/pagopasarela',
        beforeSend: function() {
            boton.button('disable');
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result == 'ok') {
                $('#div-pasarela-info form').remove();
                $('#div-pasarela-info').append(data.response);
                dataLayer.push(data.analytics);
                $('form[id="form-pasarela"]').submit();
            } else {
                boton.button('enable');
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            boton.button('enable');
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "a[data-role='crearcotizacion']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/crearcotizacion',
        beforeSend: function() {
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            $('<div>').mdialog({
                content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "#form-registro input[data-registro='registro']", function() {
    var form = $(this).parents("form");//"#form-registro"
    var boton = $(this);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/registro',
        data: form.serialize(),
        beforeSend: function() {
            boton.button('disable');
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                $("#main-page").html(obj.response.bienvenidaHTML);
                $("#main-page").trigger("create");
            } else if (obj.result === 'error') {
                boton.button('enable');
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + obj.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            } else {
                boton.button('enable');
                $.each(obj, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            boton.button('enable');
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});

$(document).on('click', "#form-autenticar input[data-registro='autenticar']", function() {
    var form = $(this).parents("form");//"#form-autenticar"
    var boton = $(this);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/ingresar',
        data: form.serialize(),
        beforeSend: function() {
            boton.button('disable');
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                window.location.replace(obj.response.redirect);
            } else if (obj.result === 'error') {
                boton.button('enable');
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + obj.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            } else {
                boton.button('enable');
                $.each(obj, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            boton.button('enable');
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});

$(document).on('click', "#form-recordar input[data-registro='recordar']", function() {
    var form = $(this).parents("form");//"#form-recordar"
    var boton = $(this);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/recordar',
        data: form.serialize(),
        beforeSend: function() {
            boton.button('disable');
            $.mobile.loading('show');
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                boton.button('enable');
                form.trigger("reset");
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + obj.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            } else if (obj.result === 'error') {
                boton.button('enable');
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + obj.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            } else {
                boton.button('enable');
                $.each(obj, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            boton.button('enable');
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});

$(document).on('change', "#form-listapersonal input[id='ListasPersonales_estadoLista']", function() {
    if ($(this).is(":checked")) {
        $('#div-lista-config-recordacion').removeClass('hide');
    } else {
        $('#div-lista-config-recordacion').addClass('hide');
    }
});

$(document).on('click', "a[data-role='tooltip']", function() {
    var id = 'autotooltip-' + uniqueId();
    var arrow = $(this).attr('data-arrow') ? $(this).attr('data-arrow') : "t";
    var html = "<div data-role='popup' id='" + id + "' class='ui-content' data-arrow='" + arrow + "' data-theme='a'><p>" + $(this).attr('data-msg') + "</p></div>";
    $('body').append(html);
    $("#" + id).popup({
        positionTo: $(this),
        afterclose: function(event, ui) {
            $("#" + id).remove();
        }
    });
    $("#" + id).popup("open");
});

$(document).ready(function() {
    $('.lst_ub_cdd .ui-collapsible-heading-toggle').click(function() {
        $('li a.c_btn_sel').removeClass('ui-btn-active2');
        $('.list_ciud.ui-listview li').removeClass('active2');
    });
    $('a.c_btn_sel').click(function() {
        $('li a.c_btn_sel').removeClass('ui-btn-active2');
        $('.list_ciud.ui-listview li').removeClass('active2');
        $(this).addClass('ui-btn-active2');
        $(this).parent('li').addClass('active2');

    });
});
/*
 $(window).on("navigate", function(event, data) {
 console.log(data.state.info);
 console.log(data.state.direction);
 console.log(data.state.url);
 console.log(data.state.hash);
 });*/
