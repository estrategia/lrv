
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
        url: requestUrl + '/callcenter/vitalcall/carro/modificar',
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
        url: requestUrl + '/callcenter/vitalcall/carro/eliminar',
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

$(document).on('click', "a[data-role='carrovaciar-vitalcall']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/callcenter/vitalcall/carro/vaciar',
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


$(document).on('click', "#btn-adicionar-formula", function() {

    var form = document.getElementById("form-pago-confirmacion");
    
 //   var form = $("#form-pago-confirmacion");

    $.ajax({
        type: 'POST',
        url: requestUrl + "/callcenter/vitalcall/carro/adicionarFormula/",
        data: new FormData(form),
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === 'ok') {
                $("#FormulasMedicas_nombreMedico").val("");
                $("#FormulasMedicas_institucion").val("");
                $("#FormulasMedicas_registroMedico").val("");
                $("#FormulasMedicas_descripcion").val("");
                $("#FormulasMedicas_formulaMedica").val("");
				$("#FormulasMedicas_telefono").val("");
				$("#FormulasMedicas_correoElectronico").val("");
                $("#formulasAdicionadas").html(data.response);
            } else if (data.result === 'error') {
            
            } else {
                $.each(data, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        }
    });
    return false;
});


function mostrarTipoFormula(val){
    if(val == 1){
        $("#describir-formula").removeClass('display-none');
        $("#anexar-formula").addClass('display-none');
    }else if(val == 2){
        $("#describir-formula").addClass('display-none');
        $("#anexar-formula").removeClass('display-none');
    }
}


function visualizarFormulaMedica(){
    if( $('#FormaPagoVitalCallForm_confirmacion').prop('checked') ) {
        $("#form-formula-medica").removeClass('display-none');
    }else{
        $("#form-formula-medica").addClass('display-none');
    }
}