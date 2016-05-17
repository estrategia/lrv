/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).on('click', "#form-autenticar input[data-vendedor='autenticar']", function () {
    var form = $(this).parents("form");//"#form-autenticar"
    var boton = $(this);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/vendedor/usuario/ingresar',
        data: form.serialize(),
        beforeSend: function () {
            boton.button('disable');
            $.mobile.loading('show');
        },
        complete: function () {
            $.mobile.loading('hide');
        },
        success: function (data) {
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
                $.each(obj, function (element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            boton.button('enable');
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});

$(document).on('click', "input[data-role='buscar-cliente']", function () {
    var form = $(this).parents("form");//"#form-autenticar"
    var boton = $(this);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/vendedor/cliente/buscarCliente',
        data: form.serialize(),
        beforeSend: function () {
            boton.button('disable');
            $.mobile.loading('show');
        },
        complete: function () {
            $.mobile.loading('hide');
        },
        success: function (data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                // window.location.replace(obj.response.redirect);
                $("#identificacionCliente").val(obj.response.identificacion);
                $("#informacionCliente").html("<div data-role='main'><div class='ui-content' data-role='content' role='main'>" +
                        "Identificación cliente: " + obj.response.identificacion + "<br/>" +
                        "Nombre cliente: " + obj.response.nombre + " " + obj.response.apellido +
                        "<a href='#' class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-role='autenticar-cliente' >Aceptar</a></div></div>");
                boton.button('enable');
            } else if (obj.result === 'error') {
                boton.button('enable');
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + obj.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            } else {
                boton.button('enable');
                $.each(obj, function (element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            boton.button('enable');
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});


$(document).on('click', "input[data-role='cliente-invitado']", function () {
    var boton = $(this);
   
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/vendedor/cliente/invitado',
       
        beforeSend: function () {
              boton.button('disable');
            $.mobile.loading('show');
        },
        complete: function () {
            $.mobile.loading('hide');
        },
        success: function (data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                window.location.replace(obj.urlRefer);
            } else if (obj.result === 'error') {
                //   boton.button('enable');
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + obj.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            } else {
                //   boton.button('enable');
                $.each(obj, function (element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
             boton.button('enable');
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});

$(document).on('click', "a[data-role='autenticar-cliente']", function () {
    var boton = $(this);
    var identificacion = $("#Usuario_identificacionUsuario").val();
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/vendedor/cliente/autenticarCliente',
        data: {identificacion: identificacion},
        beforeSend: function () {
          //    boton.button('disable');
            $.mobile.loading('show');
        },
        complete: function () {
            $.mobile.loading('hide');
        },
        success: function (data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                window.location.replace(obj.urlRefer);
            } else if (obj.result === 'error') {
                //   boton.button('enable');
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + obj.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            } else {
                //   boton.button('enable');
                $.each(obj, function (element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
             boton.button('enable');
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});


$(document).on('click', "#form-recordar input[data-vendedor='recordar']", function () {
    var form = $(this).parents("form");//"#form-recordar"
    var boton = $(this);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/vendedor/usuario/recordar',
        data: form.serialize(),
        beforeSend: function () {
            boton.button('disable');
            $.mobile.loading('show');
        },
        complete: function () {
            $.mobile.loading('hide');
        },
        success: function (data) {
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
                $.each(obj, function (element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            boton.button('enable');
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});



$(document).on('click', "a[data-role='cambioubicacionvendedor']", function () {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/vendedor/carro/vacio', // dirección del carro
        data: $('#form-listaguardar').serialize(),
        beforeSend: function () {
            $.mobile.loading('show');
        },
        complete: function () {
            $.mobile.loading('hide');
        },
        success: function (data) {
            if (data.result == "ok") {
                if (data.response) {
                    window.location.replace(requestUrl + '/vendedor/sitio/ubicacion');
                } else {
                    $("#popup-cambioubicacion").popup("open");
                }
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
});

function ubicacionGPSVendedor() {
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
        beforeSend: function () {
            $('#popup-ubicacion-gps').remove();
        },
        success: function (data) {
            if (data.result == 'ok') {
                $('<div>').mdialog({
                    id: "popup-ubicacion-gps",
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response.mensaje + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-role='ubicacion-gps-seleccion-vendedor' data-ciudad='" + data.response.ciudad + "' data-sector='" + data.response.sector + "' data-mensaje='" + data.response.mensaje + "' href='#'>Aceptar</a><a class='ui-btn ui-btn-n ui-corner-all ui-shadow btn-y' data-rel='back' href='#'>Cancelar</a></div></div>"
                });
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
            $.mobile.loading('hide');
        },
        error: function (jqXHR, textStatus, errorThrown) {
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

function ubicacionSeleccion(ciudad, sector, direccion) {

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/vendedor/sitio/ubicacionSeleccion',
        data: {ciudad: ciudad, sector: sector, direccion: direccion},
        dataType: 'json',
        beforeSend: function () {
            $.mobile.loading('show');
        },
        complete: function (data) {
            $.mobile.loading('hide');
        },
        success: function (data) {
            if (data.result == 'ok') {
                dialogoAnimado(data.response);
                if (data.urlAnterior) {
                    location.href = data.urlAnterior;
                } else {
                    location.href = requestUrl + '/vendedor/';
                }
            } else {
                $('<div>').mdialog({
                    content: "<div data-role='main'><div class='ui-content' data-role='content' role='main'>" + data.response + "<a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Aceptar</a></div></div>"
                });
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert(errorThrown);
        }
    });
}

$(document).on('click', 'a[data-role="ubicacion-gps-seleccion-vendedor"]', function () {
    var ciudad = $(this).attr('data-ciudad');
    var sector = $(this).attr('data-sector');
    $('#ubicacion-seleccion-direccion').val('');
    /*$("#popup-ubicacion-gps").popup("close");*/
    /*$("#popup-ubicacion-gps").remove();*/

    ubicacionSeleccion(ciudad, sector, "");

});


function verUbicacionVendedor() {
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


$(document).on('click', 'button[data-role="ubicacion-direccion-cliente"]', function () {
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/vendedor/cliente/direccionesUbicacion',
        dataType: 'html',
        beforeSend: function () {
            $("div[id='page-direccionesubicacion']").remove();
            $.mobile.loading('show');
        },
        complete: function (data) {
            $.mobile.loading('hide');
        },
        success: function (data) {
            $('body').append(data);
            $.mobile.changePage('#page-direccionesubicacion', {transition: "pop", role: "dialog", reverse: false});
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
    return false;
});


$(document).on('click', 'button[data-role="ubicacion-seleccion-direccion-cliente"]', function () {

    var direccion = $(this).attr('data-direccion');

    $('#div-ubicacion-tipoubicacion > button').removeClass('activo').addClass('inactivo');
    $('#div-ubicacion-tipoubicacion > button[data-role="ubicacion-direccion"]').removeClass('inactivo').addClass('activo');

    ubicacionSeleccion("", "", direccion);
});


$(document).on("pagecreate", function (event) {
    $("div[id^='collapsible-direccion-ciudad-']").on("collapsiblecollapse", function (event, ui) {
        $("div[id^='div-direccion-form-']").css('display', 'none');
        $("input[id^='DireccionesDespacho_idDireccionDespacho_']").removeAttr("checked");
        $("input[id^='DireccionesDespacho_idDireccionDespacho_']").checkboxradio("refresh");
    });

//    $(function () {
//        //Se activa cuando el scroll supera los 100px
//        $(window).scroll(function () {
//            if ($(this).scrollTop() > 100) {
//                $('a.scroll-top').fadeIn();
//            } else {
//                $('a.scroll-top').fadeOut();
//            }
//        });
//        //Crea la animacion al dar clic sobre el boton
//        $('a.scroll-top').click(function () {
//            $("html, body").animate({scrollTop: 0}, 600);
//            return false;
//        });
//    });

//    $("[data-role='raty']").raty({
//        starOn: requestUrl + '/libs/raty/images/star-on.png',
//        starOff: requestUrl + '/libs/raty/images/star-off.png',
//        starHalf: requestUrl + '/libs/raty/images/star-half.png',
//        cancelOn: requestUrl + '/libs/raty/images/cancel-on.png',
//        cancelOff: requestUrl + '/libs/raty/images/cancel-off.png',
//        hints: ['mala', 'deficiente', 'regular', 'buena', 'excelente'],
//        noRatedMsg: 'Sin calificación',
//        /*round: { down: 0.25, full: 0.6, up: 0.76 },*/
//        readOnly: function () {
//            return $(this).attr('data-readonly') === "true";
//        },
//        click: function (score, evt) {
//            if ($(this).attr('data-callback')) {
//                var funcion = $(this).attr('data-callback');
//                window[funcion](score, evt);
//            }
//        },
//        score: function () {
//            return $(this).attr('data-score');
//        }
//    });
    $("[id^='owl-productodetalle-']").owlCarousel({
        navigation: false,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: 10000
    });
//
//    $("[id^='slide-relacionados']").owlCarousel({
//        slideSpeed: 300,
//        paginationSpeed: 400,
//        autoPlay: 3000,
//        items: 4, //10 items above 1000px browser width
//        itemsDesktop: [1000, 5], //5 items between 1000px and 901px
//        itemsDesktopSmall: [900, 3], // betweem 900px and 601px
//        itemsTablet: [600, 2], //2 items between 600 and 0
//        itemsMobile: [300, 2] // itemsMobile disabled - inherit from itemsTablet option
//    });
//
//    $("[id^='slide-imagenes']").owlCarousel({
//        autoPlay: 3000, //Set AutoPlay to 3 seconds
//        items: 2,
//        itemsDesktop: [1199, 3],
//        itemsDesktopSmall: [979, 3]
//
//    });
//
//    //  colapseDireccion();
//    //$('[data-role=main]:visible').css('margin-top',($(window).height() - $('[data-role=header]:visible').height() - $('[data-role=footer]:visible').height() - $('[data-role=main]:visible').outerHeight())/2);
//
//    $(function () {
//        var elementArea = $("textarea[data-countchar]");
//        if (elementArea.length) {
//            countChar(elementArea, elementArea.attr('data-countchar'));
//        }
//    });


});

$(document).on('change', 'input[name="DireccionesDespacho[idDireccionDespacho]"]:radio', function(e) {
    var direccion = $('input[name="DireccionesDespacho[idDireccionDespacho]"]:checked').val();
    $("div[id^='div-direccion-form-']").css('display', 'none');
    $('#div-direccion-form-' + direccion).css('display', 'block');
    $('html,body').animate({
        scrollTop: $('#div-direccion-form-' + direccion).offset().top
    }, 200);
});

$(document).ready(function () {
    $('.lst_ub_cdd .ui-collapsible-heading-toggle').click(function () {
        $('li a.c_btn_sel').removeClass('ui-btn-active2');
        $('.list_ciud.ui-listview li').removeClass('active2');
    });
    $('a.c_btn_sel').click(function () {
        $('li a.c_btn_sel').removeClass('ui-btn-active2');
        $('.list_ciud.ui-listview li').removeClass('active2');
        $(this).addClass('ui-btn-active2');
        $(this).parent('li').addClass('active2');

    });
});


$(document).on('click', 'button[data-role="ubicacion-mapa"]', function() {
    if ($('#page-ubicacion-map').length > 0) {
        $.mobile.changePage('#page-ubicacion-map', {transition: "pop", role: "dialog", reverse: false});
        resizeMap();
    } else {
        $.ajax({
            type: 'POST',
            dataType: 'html',
            async: true,
            url: requestUrl + '/vendedor/sitio/mapa',
            beforeSend: function() {
                $.mobile.loading('show');
            },
            success: function(data) {
                $.getScript("https://maps.googleapis.com/maps/api/js?client="+gmapKey).done(function(script, textStatus) {
                    $.getScript(requestUrl + "/js/ubicacion.min.js").done(function(script, textStatus) {
                        $('body').append(data);
                        inicializarMapa();
                        $.mobile.changePage('#page-ubicacion-map', {transition: "pop", role: "dialog", reverse: false});
                        resizeMap();
                        $.mobile.loading('hide');
                    }).fail(function(jqxhr, settings, exception) {
                        $.mobile.loading('hide');
                        alert("Error al inicializar mapa: " + exception);
                    });
                }).fail(function(jqxhr, settings, exception) {
                    $.mobile.loading('hide');
                    alert("Error al cargar mapa: " + exception);
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $.mobile.loading('hide');
                alert('Error: ' + errorThrown);
            }
        });
    }
    return false;
});



$(document).on('change', 'select[data-role="ciudad-despacho-map"]', function() {
    var val = $(this).val().trim();
    if (val.length > 0) {
        var option = $('select[data-role="ciudad-despacho-map"] option[value="' + val + '"]').attr('selected', 'selected');

        if (map) {
            map.setCenter(new google.maps.LatLng(parseFloat(option.attr('data-latitud')), parseFloat(option.attr('data-longitud'))));
            map.setZoom(13);
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

$(document).on('change', 'select[data-role="sector-despacho-map"]', function() {
    var val = $(this).val().trim();
    if (val.length > 0) {
        var option = $('select[data-role="sector-despacho-map"] option[value="' + val + '"]').attr('selected', 'selected');

        if (map) {
            map.setCenter(new google.maps.LatLng(parseFloat(option.attr('data-latitud')), parseFloat(option.attr('data-longitud'))));
            map.setZoom(14);
        }
    }
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
        url: requestUrl + '/vendedor/sitio/gps',
        data: {lat: lat, lon: lon},
        beforeSend: function() {
            $.mobile.loading('show');
        },
        success: function(data) {
            if (data.result == 'ok') {
                /*$( "#page-ubicacion-map" ).dialog( "close" ); */
                ubicacionSeleccion(data.response.ciudad,data.response.sector,"");
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


$(document).on('click', "input[data-role='direccion-adicionar']", function() {
    var form = $(this).parents("form");
    var modal = $(this).attr("data-modal");
    var data = {modal: modal};

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/vendedor/cliente/direccionCrear',
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


$(document).on('click', "a[data-role='direccion-adicionar-modal']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/vendedor/cliente/direccionCrear',
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
        url: requestUrl + '/vendedor/carro/agregar',
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
        url: requestUrl + '/vendedor/carro/agregarCombo',
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
        url: requestUrl + '/vendedor/carro/agregarBodega',
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

$(document).on('click', "a[data-role='carrovaciar']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/vendedor/carro/vaciar',
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


function pasoDespacho(actual, siguiente, boton) {
    var data = {
        siguiente: siguiente,
        direccion: $('input[name="FormaPagoVendedorForm[idDireccionDespacho]"]:checked').val()
    };

    $.ajax({
        type: 'POST',
        //dataType: 'json',
        async: true,
        url: requestUrl + '/vendedor/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-direccion-pagoinvitado').serialize(),
        beforeSend: function() {
            boton.button('disable');
            $('div[id^="FormaPagoVendedorForm_"].has-error').html('');
            $('div[id^="FormaPagoVendedorForm_"].has-error').css('display', 'none');
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
        url: requestUrl + '/vendedor/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-entrega').serialize(),
        beforeSend: function() {
            boton.button('disable');
            $('div[id^="FormaPagoVendedorForm_"].has-error').html('');
            $('div[id^="FormaPagoVendedorForm_"].has-error').css('display', 'none');
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
        url: requestUrl + '/vendedor/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-pago').serialize(),
        beforeSend: function() {
            boton.button('disable');
            $('div[id^="FormaPagoVendedorForm_"].has-error').html('');
            $('div[id^="FormaPagoVendedorForm_"].has-error').css('display', 'none');
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
        url: requestUrl + '/vendedor/carro/pagar/paso/' + actual + '/post/true',
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


$(document).on('click', "a[data-role='listapersonal']", function () {
    var lista = $(this).attr('data-lista');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/vendedor/carro/agregarlista',
        data: {lista: lista},
        beforeSend: function () {
            $.mobile.loading('show');
        },
        complete: function () {
            $.mobile.loading('hide');
        },
        success: function (data) {
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
        error: function (jqXHR, textStatus, errorThrown) {
            $.mobile.loading('hide');
            alert('Error: ' + errorThrown);
        }
    });
});
