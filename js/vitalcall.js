$(document).on('click', 'button[data-role="ubicacion-georeferencia"]', function() {
	$('#modal-georeferencia').modal('show');
	return false;
});

$(document).on('click', 'button[data-role="ubicacion-geodireccion"]', function() {
	var ciudad = $('#select-georeferencia-ciudad').val();
	
	$.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/admin/geodireccion',
        data: {ciudad: ciudad, direccion: $('#input-georeferencia-direccion').val()},
        beforeSend: function () {
            $('#georeferencia-seleccion-text').html('');
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#georeferencia-seleccion-text').html(data.response);
                $('#georeferencia-seleccion-ciudad').val(data.ciudad);
                $('#georeferencia-seleccion-sector').val(data.sector);
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
	return false;
});

$(document).on('click', 'button[data-role="ubicacion-geobarrio"]', function() {
	var ciudad = $('#select-georeferencia-ciudad').val();
	
	$.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/admin/geobarrio',
        data: {ciudad: ciudad, barrio: $('#input-georeferencia-barrio').val()},
        beforeSend: function () {
            $('#georeferencia-seleccion-text').html('');
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#georeferencia-seleccion-text').html(data.response);
                $('#georeferencia-seleccion-ciudad').val(data.ciudad);
                $('#georeferencia-seleccion-sector').val(data.sector);
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
	return false;
});

$(document).on('click', 'button[data-role="ubicacion-seleccion-georeferencia"]', function() {
    Loading.show();
    $('#ubicacion-seleccion-ciudad').val($('#georeferencia-seleccion-ciudad').val());
    $('#ubicacion-seleccion-sector').val($('#georeferencia-seleccion-sector').val());
    //$('#div-ubicacion-tipoubicacion > button').removeClass('activo').addClass('inactivo');
    //$('#div-ubicacion-tipoubicacion > button[data-role="ubicacion-mapa"]').removeClass('inactivo').addClass('activo');
    ubicacionSeleccion();
});

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
        url: requestUrl + '/callcenter/telefarma/sitio/ubicacionSeleccion',
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
        url: requestUrl + '/callcenter/telefarma/cotizar/filtrar',
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
        url: requestUrl + '/callcenter/telefarma/cotizar/filtrar',
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


//carro de compra - agregar producto
$(document).on('click', "button[data-role='cargar-vitalcall']", function() {
	var tipo = $(this).attr('data-tipo');
	
	if(tipo==1){
		agregarProductoVC($(this).attr('data-formula'),$(this).attr('data-producto'));
	}else if(tipo==2){
		agregarProductoNormal($(this).attr('data-producto'));
	}
    
    return false;
});

function agregarProductoVC(formula, producto){
    var cantidadU = $('#cantidad-producto-unidad-' + formula + "-" + producto).val();

    cantidadU = parseInt(cantidadU);
    if (isNaN(cantidadU)) {
        cantidadU = -1;
    }

    var cantidadF = parseInt($('#cantidad-producto-fraccion-' + formula + "-" + producto).val());
    cantidadF = parseInt(cantidadF);
    if (isNaN(cantidadF)) {
        cantidadF = -1;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/carro/agregar',
        data: {tipo:1, formula: formula, producto: producto, cantidadU: cantidadU, cantidadF: cantidadF},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
            	if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                    //$('#icono-producto-agregado-' + producto).addClass('active');
                    //$("#cantidad-productos").html(data.response.objetosCarro);
                }
                $('#div-carro-canasta').html(data.response.canastaHTML);
                $('#div-carro-canasta').trigger("create");
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
}

function agregarProductoNormal(producto){
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
        url: requestUrl + '/callcenter/vitalcall/carro/agregar',
        data: {tipo:2, producto: producto, cantidadU: cantidadU, cantidadF: cantidadF},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
            	if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                    //$('#icono-producto-agregado-' + producto).addClass('active');
                    //$("#cantidad-productos").html(data.response.objetosCarro);
                }
                $('#div-carro-canasta').html(data.response.canastaHTML);
                $('#div-carro-canasta').trigger("create");
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
}


$("#busqueda-buscar-vitalcall").keypress(function (event) {
	if (event.which == 13) {
        var text = $.trim($('#busqueda-buscar-vitalcall').val());
        if (!text) {
            bootbox.alert('Búsqueda no puede estar vacío');
        } else {
        	buscarProductosVitalCall(text, this, requestUrl);
        }
        return false;
    }
});


$(document).on('click', "button[data-role='busquedaproducto-vitalcall']", function () {
    var text = $.trim($('#busqueda-buscar-vitalcall').val());
    if (!text) {
        bootbox.alert('Búsqueda no puede estar vacío');
    } else {
        buscarProductosVitalCall(text, this, requestUrl);
    }
});

function buscarProductosVitalCall(text, obj, request) {
	$.ajax({
        type: 'POST',
        async: true,
        url: request + '/callcenter/vitalcall/pedido/buscar',
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
        "FormaPagoVitalCallForm[indicePuntoVenta]": $('input[name="FormaPagoVitalCallForm[indicePuntoVenta]"]').val(),
        "FormaPagoVitalCallForm[tipoEntrega]": $('input[name="FormaPagoVitalCallForm[tipoEntrega]"]').val()
    };

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-pago-comentario').serialize() + '&' + $('#form-pago-entrega').serialize() + '&' + $('#form-pago-pago').serialize(),
        beforeSend: function() {
            boton.prop('disabled', true);
            $('div[id^="FormaPagoVitalCallForm_"].text-danger').html('');
            $('div[id^="FormaPagoVitalCallForm_"].text-danger').css('display', 'none');
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
        url: requestUrl + '/callcenter/vitalcall/carro/pagar/paso/' + actual + '/post/true',
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
 * pasos compra - tipo entrega
 */
$(document).on('click', 'div[data-role="tipoentrega"]', function() {
    var tipo = $(this).attr('data-tipo');
    var _tipo = tipo == tipoEntrega.presencial ? tipoEntrega.domicilio : tipoEntrega.presencial;

    if (tipo == tipoEntrega.presencial) {
    	$.ajax({
            type: 'POST',
            dataType: 'json',
            async: true,
            url: requestUrl + '/callcenter/vitalcall/carro/pasoporel',
            data: {opcion: 'modal'},
            beforeSend: function() {
                $("#modal-pasoporel-seleccionar").remove();
                Loading.show();
            },
            success: function(data) {
                if (data.result == "ok") {
                    $('body').append(data.response);
                    $("#modal-pasoporel-seleccionar").modal("show");
                } else {
                    alert(data.response);
                }
                Loading.hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Loading.hide();
                alert('Error: ' + errorThrown);
            }
        });
    	
    } else {
    	seleccionTipoEntrega(tipo, _tipo);
    }

});

$(document).on('click', 'button[data-role="pasoporel-seleccion-pdv"]', function() {
    seleccionTipoEntrega(tipoEntrega.presencial, tipoEntrega.domicilio);
    $('#pasoporel-seleccion-pdv-nombre').html($(this).attr('data-nombre'));
    $('#pasoporel-seleccion-pdv-direccion').html($(this).attr('data-direccion'));
    $("#modal-pasoporel-seleccionar").modal("hide");
    $('input[name="FormaPagoVitalCallForm[indicePuntoVenta]"]').val($(this).attr('data-idx'));
});

function seleccionTipoEntrega(tipo, _tipo) {
    $('div[data-role="tipoentrega"]').removeClass('activo');
    $('div[data-role="tipoentrega"]div[data-tipo="' + tipo + '"]').addClass('activo');
    $('div[data-role="tipoentrega"]').addClass('inactivo');
    $('div[data-role="tipoentrega"]div[data-tipo="' + tipo + '"]').removeClass('inactivo');

    $('#pasoporel-seleccion-pdv-nombre').html("");
    $('#pasoporel-seleccion-pdv-direccion').html("");
    $('#FormaPagoVitalCallForm_tipoEntrega').val(tipo);
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + tipo + '"]').removeClass('display-none');
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + tipo + '"] input').removeAttr('disabled');
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + _tipo + '"]').addClass('display-none');
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + _tipo + '"] input[type="text"]').val('');
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + _tipo + '"] input[type="radio"]').prop('checked', false);
    $('div[data-role="tipoentrega-habilitar"]div[data-habilitar="' + _tipo + '"] input').attr('disabled', 'disabled');
}

/*
 * pasos compra - forma pago 
 */
$(document).on('click', "div[data-role='formapago']", function() {
    var tipo = $(this).attr('data-tipo');
    if (tipo == "datafono") {
        $("#modal-formapago input[type='radio']").removeAttr('checked');
        $("#modal-formapago #idFormaPago_" + $("#FormaPagoVitalCallForm_idFormaPago_datafono").val()).prop('checked', true);
        $("div[data-role^='formapago-logo-']").addClass('display-none');
        $("div[data-role='formapago-logo-" + $("#FormaPagoVitalCallForm_idFormaPago_datafono").val() + "']").removeClass('display-none');
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

$(document).on('click', "#modal-formapago input[type='radio']", function() {
    if ($(this).is(':checked')) {
        //$("div[data-role='formapago']").removeClass('activo');
        //$('div[data-tipo="datafono"]').addClass('activo');
        //$('#div-formapago-vacio').remove();
        $('input[id="FormaPagoVitalCallForm_idFormaPago_datafono"]').prop('checked', true);
        $('input[id="FormaPagoVitalCallForm_idFormaPago_datafono"]').val($(this).val());

        $("div[data-role^='formapago-logo-']").addClass('display-none');
        $("div[data-role='formapago-logo-" + $(this).val() + "']").removeClass('display-none');
        $("div[data-role='formapago-logo-pagoenlinea']").addClass('display-none');
        $("div[data-role='formapago-descripcion']").addClass('display-none');
    }
});

/*
 * inicializar librerias
 */
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

$(document).ready(function() {
    $(function() {
        var elementArea = $("textarea[data-countchar]");
        if (elementArea.length) {
            countChar(elementArea, elementArea.attr('data-countchar'));
        }
    });
    raty();
    $("input[data-role='bootstrap-slider']").slider();
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


$(document).on('click', "a[data-cargar-telefarma='2']", function() {
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
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#div-carro-canasta').html(data.response.canastaHTML);
                $('#div-carro-canasta').trigger("create");

                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                    $("#cantidad-productos").html(data.response.objetosCarro);
                    //$('#icono-combo-agregado-' + combo).addClass('active');
                }

                if (data.response.dialogoHTML) {
                    alert(data.response.dialogoHTML);
                }
            } else {
                alert(data.response);
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

    return false;
});


$(document).on('click', "a[data-cargar-telefarma='1']", function() {

    var producto = $(this).attr('data-producto');
    var unique = $(this).attr('data-id');
    var cantidadU = $('#cantidad-producto-unidad-' + producto + "-" + unique).val();

    cantidadU = parseInt(cantidadU);
    if (isNaN(cantidadU)) {
        cantidadU = -1;
    }

    var cantidadF = parseInt($('#cantidad-producto-fraccion-' + producto + "-" + unique).val());
    cantidadF = parseInt(cantidadF);
    if (isNaN(cantidadF)) {
        cantidadF = -1;
    }

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/telefarma/carro/agregar',
        data: {producto: producto, cantidadU: cantidadU, cantidadF: cantidadF},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#div-carro-canasta').html(data.response.canastaHTML);
                $('#div-carro-canasta').trigger("create");

                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                    $('#icono-producto-agregado-' + producto).addClass('active');
                    $("#cantidad-productos").html(data.response.objetosCarro);
                }

                if (data.response.dialogoHTML) {
                    $("#modalBodegas").remove();
                    $("body").append(data.response.dialogoHTML);
                    $("#modalBodegas").modal('show');
                }
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});

$(document).on('click', "a[data-cargar-telefarma='3']", function() {
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
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#div-carro-canasta').html(data.response.canastaHTML);
                $('#div-carro-canasta').trigger("create");

                if (data.response.mensajeHTML) {
                    dialogoAnimado(data.response.mensajeHTML);
                    $("#cantidad-productos").html(data.response.objetosCarro);
                }
                if (data.response.dialogoHTML) {
                    alert(data.response.dialogoHTML);
                }
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

    return false;
});