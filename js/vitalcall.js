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


//carro de compra - agregar producto
$(document).on('click', "button[data-role='cargar-vitalcall']", function() {
	var tipo = $(this).attr('data-tipo');
	
	if(tipo==1){
		agregarProductoVC($(this).attr('data-formula'),$(this).attr('data-producto'));
	}else if(tipo==2){
		agregarProducto()
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
        url: requestUrl + '/callcenter/vitalcall/pedido/agregar',
        data: {tipo:1, formula: formula, producto: producto, cantidadU: cantidadU, cantidadF: cantidadF},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
                /*$('#div-carro-canasta').html(data.response.canastaHTML);
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
                }*/
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
	
	
	
	
}


$(document).on('click', "a[data-role='agregar-producto-formula']", function () {
	
	var component = $(this).attr('data-component');
	var idFormula = $(this).attr('data-formula');
	var idProducto = $(this).attr('data-producto');
	
	var cantidad = $("#cantidad_"+component).val();
	var dosis = $("#dosis_"+component).val();
	var intervalo = $("#intervalo_"+component).val() ;
	$.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/formula/agregarProductoFormula/',
        data: {idFormula : idFormula, idProductoVitalCall: idProducto, cantidad: cantidad, dosis: dosis, intervalo: intervalo},
        beforeSend: function () {
        	
            Loading.show();
        },
        complete: function () {
        	
            Loading.hide();
        },
        success: function (data) {
            var data = $.parseJSON(data);

            if (data.result == 'ok') {
            	$("#contenido-productos-lista").html(data.response);
            	$("#producto_"+component).css("display","none");
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                   // $('#' + element + '_em_').html(error);
                   // $('#' + element + '_em_').css('display', 'block');
                });
            }
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='editar-producto-formula']", function () {
	
	var component = $(this).attr('data-component');
	var idFormula = $(this).attr('data-formula');
	var idProducto = $(this).attr('data-producto');
	
	var cantidad = $("#cantidadEditar_"+idProducto).val();
	var dosis = $("#dosisEditar_"+idProducto).val();
	var intervalo = $("#intervaloEditar_"+idProducto).val() ;
	$.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/formula/editarProductoFormula/',
        data: {idFormula : idFormula, idProductoVitalCall: idProducto, cantidad: cantidad, dosis: dosis, intervalo: intervalo},
        beforeSend: function () {
         
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            var data = $.parseJSON(data);

            if (data.result == 'ok') {
            	$("#contenido-productos-lista").html(data.response);
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                   // $('#' + element + '_em_').html(error);
                   // $('#' + element + '_em_').css('display', 'block');
                });
            }
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='eliminar-producto-formula']", function () {
	
	var component = $(this).attr('data-component');
	var idFormula = $(this).attr('data-formula');
	var idProducto = $(this).attr('data-producto');
	

	$.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/formula/eliminarProductoFormula/',
        data: {idFormula : idFormula, idProductoVitalCall: idProducto},
        beforeSend: function () {
         
            Loading.show();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            var data = $.parseJSON(data);

            if (data.result == 'ok') {
              $("#contenido-productos-lista").html(data.response);
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                   // $('#' + element + '_em_').html(error);
                   // $('#' + element + '_em_').css('display', 'block');
                });
            }
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "a[data-role='nueva-direccion-vital']", function () {
	

	var cliente = $(this).attr('data-cliente');
	

	$.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cliente/agregarDireccion/',
        data: {identificacionUsuario : cliente},
        beforeSend: function () { 
            Loading.show();
            $("#modal-direccion").remove();
        },
        complete: function () {
            Loading.hide();
        },
        success: function (data) {
            var data = $.parseJSON(data);

            if (data.result == 'ok') {
            	$('#container').append(data.response);
            	$("#modal-direccion").modal('show');
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                   // $('#' + element + '_em_').html(error);
                   // $('#' + element + '_em_').css('display', 'block');
                });
            }
            Loading.hide();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('change', "#DireccionesDespachoVitalCall_codigoCiudad", function() {

    var codigoCiudad = $('#DireccionesDespachoVitalCall_codigoCiudad').val();
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cliente/comprobarciudad',
        data: {codigoCiudad: codigoCiudad},
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                if (data.code == 1) {
                    $("#div-sector").html(data.htmlResponse);
                    $("#div-sector").css('display', 'block');
               
                } else if (data.code == 2) {
                   
                }
            } 
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "input[data-role='guardar-direccion']", function() {

    var form = $('#direcciones-form');
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cliente/guardarDireccion',
        data: form.serialize(),
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
            	 $("#modal-direccion").modal('hide');
            	 $.fn.yiiGridView.update('direcciones-grid');
            }else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});


$(document).on('click', "input[data-role='actualizar-direccion']", function() {

    var form = $('#direcciones-form');
    var idDireccion = $(this).attr('data-direccion');
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cliente/actualizarDireccion',
        data: form.serialize()+"&idDireccion="+idDireccion,
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
            	 $("#modal-direccion").modal('hide');
            	 $.fn.yiiGridView.update('direcciones-grid');
            }else if (data.result == 'error') {
                  bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});


$(document).on('click', "a[data-role='editar-direccion']", function() {

	var direccion = $(this).attr('data-direccion');
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/cliente/editarDireccion',
        data: {direccion: direccion},
        beforeSend: function() {
        	$("#modal-direccion").remove();
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
            	$('#container').append(data.response);
                $("#modal-direccion").modal('show');
            }else if (data.result == 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function (element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='eliminar-direccion']", function() {

    var direccion = $(this).attr('data-direccion');
    
    bootbox.dialog({
        message: "¿ Está seguro de eliminar esta dirección ?",
        title: "Eliminar dirección",
        buttons: {
            success: {
                label: "Aceptar",
                className: "btn-primary",
                callback: function () {
                    $.ajax({
                        type: 'POST',
                        async: true,
                        url: requestUrl + '/callcenter/vitalcall/cliente/eliminarDireccion',
                        data:  {direccion: direccion},
                        beforeSend: function() {
                            Loading.show();
                        },
                        complete: function(data) {
                            Loading.hide();
                        },
                        success: function(data) {
                            var data = $.parseJSON(data);
                            if (data.result === "ok") {
                            	 $("#modal-direccion").modal('hide');
                            	 $.fn.yiiGridView.update('direcciones-grid');
                            }else if (data.result == 'error') {
                                bootbox.alert(data.response);
                            } else {
                                $.each(data, function (element, error) {
                                    $('#' + element + '_em_').html(error);
                                    $('#' + element + '_em_').css('display', 'block');
                                });
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {

                        }
                    });
                }
            },
            close: {
                label: "Cancelar",
                className: "btn-default",
                callback: function () {
                }
            }
        }
    });



});

$(document).on('click', 'input[data-role="buscar-direccion"]', function() {
	var ciudad = $('#DireccionesDespachoVitalCall_codigoCiudad').val();
	
	$.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/admin/geodireccion',
        data: {ciudad: ciudad, direccion: $('#DireccionesDespachoVitalCall_direccion').val()},
        beforeSend: function () {
            $('#georeferencia').html('');
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#georeferencia').html(data.response);
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

$(document).on('click', 'input[data-role="buscar-barrio"]', function() {
	var ciudad = $('#DireccionesDespachoVitalCall_codigoCiudad').val();
	
	$.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/admin/geobarrio',
        data: {ciudad: ciudad, barrio: $('#DireccionesDespachoVitalCall_barrio').val()},
        beforeSend: function () {
            $('#georeferencia').html('');
            Loading.show();
        },
        success: function (data) {
            if (data.result === "ok") {
                $('#georeferencia').html(data.response);
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
