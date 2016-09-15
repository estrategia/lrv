$(document).on('click', 'button[data-role="ubicacion-mapa"]', function() {
    if ($('#modal-ubicacion-map').length > 0) {
        $('#modal-ubicacion-map').modal('show');
        resizeMap();
    } else {
        $.ajax({
            type: 'POST',
            dataType: 'html',
            async: true,
            url: requestUrl + '/sitio/mapa',
            beforeSend: function() {
                Loading.show();
            },
            success: function(data) {
                $.getScript("https://maps.googleapis.com/maps/api/js?client=" + gmapKey).done(function(script, textStatus) {
                    $.getScript(requestUrl + "/js/ubicacion.min.js").done(function(script, textStatus) {
                        $('#container').append(data);
                        $('#select-ubicacion-psubsector .ciudades').select2();
                        inicializarMapa();
                        $('#modal-ubicacion-map').modal('show');
                        resizeMap();
                        Loading.hide();
                    }).fail(function(jqxhr, settings, exception) {
                        Loading.hide();
                        alert("Error al inicializar mapa: " + exception);
                    });
                }).fail(function(jqxhr, settings, exception) {
                    Loading.hide();
                    alert("Error al cargar mapa: " + exception);
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Loading.hide();
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
                    Loading.show();
                },
                complete: function() {
                    Loading.hide();
                },
                success: function(data) {
                    if (data.length > 0) {
                        $('#select-ubicacion-content').append(data);
                        $('#select-ubicacion-preferencia .ciudades').select2();
                    } else {
                        $('#select-ubicacion-psubsector').removeClass('float-left').addClass('div-center');
                        map.setZoom(15);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Loading.hide();
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

$(document).on('click', 'button[data-role="ubicacion-seleccion-mapa"]', function() {
    Loading.show();
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
            $("#modal-no-serviciodomicilio").remove();
            Loading.show();
        },
        success: function(data) {
            if (data.result == 'ok') {
                //$('#modal-ubicacion-map').modal('hide');
                $('#ubicacion-seleccion-ciudad').val(data.response.ciudad);
                $('#ubicacion-seleccion-sector').val(data.response.sector);
                $('#div-ubicacion-tipoubicacion > button').removeClass('activo').addClass('inactivo');
                $('#div-ubicacion-tipoubicacion > button[data-role="ubicacion-mapa"]').removeClass('inactivo').addClass('activo');
                ubicacionSeleccion();
            } else {
                if (data.responseModal) {
                    $('body').append(data.responseModal);
                    $("#modal-no-serviciodomicilio").modal("show");
                } else {
                    alert(data.response);
                }
            }
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});

function ubicacionSeleccion() {
    var form = $("#form-ubicacion");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cotizar/ubicacionSeleccion',
        data: form.serialize(),
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == 'ok') {
                dialogoAnimado(data.response);
            	window.location.replace(data.urlAnterior);
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // boton.button('enable');
            Loading.hide();
            alert('Error: ' + errorThrown);
        }
    });
}


//ordenamiento
$(document).on('change', "select[data-role='orden-listaproductos']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cotizar/filtrar',
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


function filtrarListaProductos() {
	$.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cotizar/filtrar',
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

function actualizarNumerosPagina() {
    var items = $('#items-page').val();
    $.fn.yiiListView.update('id-productos-list', {data: {pageSize: items}});
}


//inicializar librerias
function raty() {
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
}

raty();

$("input[data-role='bootstrap-slider']").slider();
