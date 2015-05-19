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

    $("#slide-relacionados").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        autoPlay: 3000,
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 5], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: [300, 2] // itemsMobile disabled - inherit from itemsTablet option
    });

    pagoCredirebaja();
    //$('[data-role=main]:visible').css('margin-top',($(window).height() - $('[data-role=header]:visible').height() - $('[data-role=footer]:visible').height() - $('[data-role=main]:visible').outerHeight())/2);
    $(function() {
        var elementArea = $('#FormaPagoForm_comentario');
        if (elementArea.length) {
            countChar(elementArea, 'div-comentario-contador');
        }
    });
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
                $('#panel-carro-canasta').html(data.response.canastaHTML);
                $('#panel-carro-canasta').trigger("create");
                
                if(data.response.mensajeHTML){
                    dialogoAnimado(data.response.mensajeHTML);
                }
                
                if(data.response.dialogoHTML){
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

function dialogoAnimado(texto) {
    var id = 'dialogo-carro-'+uniqueId();
    $("<div class='carro-agregar' id='"+id+"'>" + texto + "</div>").appendTo('body');

    $("#"+id).animate({
        opacity: 1,
        bottom: '+=8%'
    }, 400, function() {
        setTimeout(function() {
            $("#"+id).animate({
                opacity: 0,
                bottom: '-=8%'
            }, 400, function() {
                $("#"+id).remove();
            });
        }, 800);
    });
}

function uniqueId() {
  var time = new Date().getTime();
  while (time == new Date().getTime());
  return new Date().getTime();
}

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
                
                if(data.response.mensajeHTML){
                    dialogoAnimado(data.response.mensajeHTML);
                }
                
                if(data.response.dialogoHTML){
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
        },
        complete: function() {
            $.mobile.loading('hide');
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#panel-carro-canasta').html(data.response.canastaHTML);
                $('#panel-carro-canasta').trigger("create");
                
                if(data.response.mensajeHTML){
                    dialogoAnimado(data.response.mensajeHTML);
                }
                
                if(data.response.dialogoHTML){
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
                if(data.response.mensajeHTML){
                    dialogoAnimado(data.response.mensajeHTML);
                }
                
                if(data.response.dialogoHTML){
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

$(document).on('click', "input[id^='btn-direccion-crear-']", function() {
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
                $('#collapsible-direccion-' + direccion).remove();
                $('#collapsibleset-direcciones').collapsibleset("refresh");
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

function pasoDespacho(actual, siguiente) {
    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/carro/pagar/paso/' + actual + '/post/true',
        data: {
            siguiente: siguiente,
            direccion: $('input[name="FormaPagoForm[idDireccionDespacho]"]:checked').val()
        },
        beforeSend: function() {
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
                alert(obj.response);
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

function pasoEntrega(actual, siguiente) {
    var data = {siguiente: siguiente};

    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-entrega').serialize(),
        beforeSend: function() {
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
                alert(obj.response);
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

function pasoPago(actual, siguiente) {
    var data = {siguiente: siguiente};

    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-pago').serialize(),
        beforeSend: function() {
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
                alert(obj.response);
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

function pasoConfirmacion(actual, siguiente) {
    var data = {siguiente: siguiente};

    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-confirmacion').serialize(),
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
            } else if (obj.result === 'error') {
                alert(obj.response);
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


$(document).on('click', "input[id='btn-carropagar-siguiente'], input[id='btn-carropagar-anterior']", function() {
    var actual = $(this).attr('data-origin');
    var siguiente = $(this).attr('data-redirect');

    if (actual === 'despacho') {
        pasoDespacho(actual, siguiente);
    } else if (actual === 'entrega') {
        pasoEntrega(actual, siguiente);
    } else if (actual === 'pago') {
        pasoPago(actual, siguiente);
    } else if (actual === 'confirmacion') {
        pasoConfirmacion(actual, siguiente);
    }

    return false;
});

$(document).on('change', 'input[name="FormaPagoForm[idFormaPago]"]:radio', function(e) {
    $('[id="div-credirebaja"] input').val('');
    pagoCredirebaja();
});

function pagoCredirebaja() {
    if ($('#form-pago-pago').length) {
        //$('[id="div-credirebaja"] input').val('');
        var formaPago = $('input[name="FormaPagoForm[idFormaPago]"]:checked').val();
        if (formaPago == undefined || $('#FormaPagoForm_idFormaPago_' + formaPago).attr('data-credirebaja') == 0) {
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

$(document).on('change', "#FormaPagoForm_tarjetaTipo, #FormaPagoForm_tarjetaNumero, #FormaPagoForm_tarjetaVerificacion", function() {
    var cantidad = $(this).val();
    cantidad = parseInt(cantidad);
    if (isNaN(cantidad)) {
        $(this).val('');
    }
});

function countChar(element, idContador) {
    $('#' + idContador).text(element.val().length);
}

/*
 $(window).on("navigate", function(event, data) {
 console.log(data.state.info);
 console.log(data.state.direction);
 console.log(data.state.url);
 console.log(data.state.hash);
 });*/
