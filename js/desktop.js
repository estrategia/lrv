function alert(message) {
    bootbox.alert({message: message, callback: function() {
        }, buttons: {ok: {label: 'Aceptar', className: 'btn-danger'}}});
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).on('click', 'button[data-role="tipovista-listaproductos"]', function() {
    listaProductoVista($(this).attr('data-type'));
    $('button[data-role="tipovista-listaproductos"]').attr('data-active', 'false');
    $(this).attr('data-active', 'true');
});

function listaProductoVistaActualizar() {
    listaProductoVista($('button[data-role="tipovista-listaproductos"]button[data-active="true"]').attr('data-type'));
}

function listaProductoVista(tipo) {
    if (tipo === 'lineal') {
        $(".descripcion-grid").css('display', 'none');
        $(".descripcion-lineal").css('display', 'block');
        listaProductoLineal();
    } else if (tipo === 'cuadricula') {
        $(".descripcion-grid").css('display', 'block');
        $(".descripcion-lineal").css('display', 'none');
        listaProductoCuadricula();
    }
}

function listaProductoLineal() {
    $('#lista-productos').removeClass('list_cuadricula');
    $('#lista-productos').addClass('list_lineal');
    $('#lista-productos.list_lineal .listaProductos li .content-txt2').addClass('row');
    $('#lista-productos.list_lineal .listaProductos li .content-txt2 .img-list-products').addClass('col-sm-3');
    $('#lista-productos.list_lineal .listaProductos li .content-txt2 .content_product').addClass('col-sm-5');
    $('#lista-productos.list_lineal .listaProductos li .content-txt2 .botones-list').addClass('col-sm-4');
}

function listaProductoCuadricula() {
    $('#lista-productos').removeClass('list_lineal');
    $('#lista-productos').addClass('list_cuadricula');
    $('#lista-productos.list_cuadricula .listaProductos li .content-txt2').removeClass('row');
    $('#lista-productos.list_cuadricula .listaProductos li .content-txt2 .img-list-products').removeClass('col-sm-3');
    $('#lista-productos.list_cuadricula .listaProductos li .content-txt2 .content_product').removeClass('col-sm-5');
    $('#lista-productos.list_cuadricula .listaProductos li .content-txt2 .botones-list').removeClass('col-sm-4');
}


$(document).ready(function() {
    $('.main_menu .categorias').click(function() {
        ajuesmenu();
    });
    ajuesmenu();
    ajustebuscador()
});
$(window).resize(function() {
    ajuesmenu();
    ajustebuscador()
});
function ajustebuscador() {
    widhtControl = $('.content-category .controls').width();
    widhtBoton = $('.content-category .controls #btn-buscador-productos').width();
    widhtDrop = $('.content-category .controls .float-right').width();
    width = widhtControl - (widhtBoton + widhtDrop);
    $('.content-category .controls >span').width(width + 6);
}
function ajuesmenu() {
    widhtNav = $('nav.main_menu').width();
    widtCat = widhtNav * 0.25;
    $('.main_menu .categorias').width(widtCat);
    widht = $('.main_menu .categorias').width();
    widhtDocument = (widhtNav - widht);
    $('.categorias .category > li').width(widht);
    $('.categorias .category > li .right-nav').width(widhtDocument);
    total = $('.main_menu .modulo-menu').length;
    itemswidth = widhtDocument / total;
    $('.main_menu .modulo-menu').width(itemswidth);
}
$(".main_menu .cuidado-personal > a").click(function() {
    $(".main_menu .cuidado-personal .right-nav").hide();
    $(this).next('.right-nav').show();
    return false;
});
/*
 $(".categorias .cuidado-personal").hover(function() {
 $('.submenu').isotope({
 layoutMode: 'masonryHorizontal',
 itemSelector: '.section-submenu'
 });
 
 });*/


/*
 * JSOM-INI
 */
$(document).on('change', 'input[name="DireccionesDespacho[idDireccionDespacho]"]:radio', function(e) {
    var direccion = $('input[name="DireccionesDespacho[idDireccionDespacho]"]:checked').val();
    $("div[id^='div-direccion-form-']").css('display', 'none');
    $('#div-direccion-form-' + direccion).css('display', 'block');
    $('html,body').animate({
        scrollTop: $('#div-direccion-form-' + direccion).offset().top
    }, 200);
});

$(document).on('click', "button[data-role='direccion-editar']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/direccionActualizar',
        data: {render: true, direccion: $(this).attr('data-direccion'), radio: $(this).attr('data-radio')},
        beforeSend: function() {
            $("#modal-nueva-direccion").remove();
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == 'ok') {
                $('body').append(data.response.dialogoHTML);
                $("#modal-nueva-direccion").modal("show");
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

$(document).on('click', "div[data-role='direccion-editar']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/direccionActualizar',
        data: {render: true, direccion: $(this).attr('data-direccion'), radio: $(this).attr('data-vista')},
        beforeSend: function() {
            $("#modal-nueva-direccion").remove();
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == 'ok') {
                $('body').append(data.response.dialogoHTML);
                $("#modal-nueva-direccion").modal("show");
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

$(document).on('click', "input[data-role='direccion-actualizar']", function() {
    var form = $(this).parents("form");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/direccionActualizar',
        data: $.param({radio: $(this).attr('data-radio')}) + '&' + form.serialize(),
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);

            if (data.result === 'ok') {
                $("#modal-nueva-direccion").modal("hide");
                dialogoAnimado(data.response.mensaje);
                if (data.response.direccionHTML) {
                    $('#div-direccion-interior-' + data.response.direccion).html(data.response.direccionHTML);
                }
            } else if (data.result === 'error') {
                alert(data.response);
            } else {
                $.each(data, function(element, error) {
                    //$('#' + element + '_em_').html(error);
                    //$('#' + element + '_em_').css('display', 'block');
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
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
            Loading.show();
            $("#modal-nueva-direccion").remove();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            $('body').append(data.response.dialogoHTML);
            $("#modal-nueva-direccion").modal("show");
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + errorThrown);
        }
    });
});

$(document).on('click', "input[data-role='direccion-adicionar']", function() {
    var form = $("#form-direccion");
    var vista = $("[data-role='direccion-adicionar-modal']").attr("data-vista");
    var data = {vista: vista};

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/direccionCrear',
        data: $.param(data) + '&' + form.serialize(),
        beforeSend: function() {
            $('div[id^="DireccionesDespacho_"].text-danger').html('');
            $('div[id^="DireccionesDespacho_"].text-danger').css('display', 'none');
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === 'ok') {
                $("#modal-nueva-direccion").modal("hide");
                dialogoAnimado(data.response.mensaje);

                if ($('#div-direcciones-pasoscompra').length) {
                    $('#div-direcciones-pasoscompra').html(data.response.direccionesHTML);
                    $('#div-direcciones-pasoscompra').trigger("create");
                } else {
                    $('#div-direcciones-lista').html(data.response.direccionesHTML);
                    $('#div-direcciones-lista').trigger("create");
                }

            } else if (data.result === 'error') {
                alert(data.response);
            } else {
                $.each(data, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + errorThrown);
        }
    });

    return false;

});

$(document).on('click', "button[data-role='direccion-eliminar']", function() {
    var direccion = $(this).attr('data-direccion');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/direccionEliminar',
        data: {direccion: direccion},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === 'ok') {
                $('#div-direccion-exterior-' + direccion).remove();
                dialogoAnimado(data.response);
            } else if (data.result === 'error') {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + errorThrown);
        }
    });

    return false;
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
                }
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

$(document).on('click', "a[data-role='pedidolistaocultar']", function() {
    var compra = $(this).attr('data-compra');

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/ocultarpedido',
        data: {compra: compra},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
                $.fn.yiiGridView.update('grid-cuenta-listapedidos');
                dialogoAnimado(data.response);
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
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
                }
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "[id^='enlace-pago-direccion-express-']", function() {
    var campoCheckbox = $(this).children("input");
    campoCheckbox.prop("checked", true);
});

$(document).on('click', "a[data-role='usuario-pagoexpress-formapago']", function() {
    console.log("asdff");
    var campoCheckbox = $(this).children("input");
    campoCheckbox.prop("checked", true);
});

$(document).on('change', "#form-listapersonal input[id='ListasPersonales_estadoLista']", function() {
    if ($(this).is(":checked")) {
        $('#div-lista-config-recordacion').removeClass('hide');
    } else {
        $('#div-lista-config-recordacion').addClass('hide');
    }
});


$(document).on('click', "input[data-role='lstpersonalform']", function() {
    var data = {};
    var lista = $(this).attr('data-lista');
    if (lista !== undefined) {
        data['lista'] = lista;
    }
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/listapersonal/lista/post',
        data: $.param(data) + '&' + $('#form-listapersonal').serialize(),
        beforeSend: function() {
            $('div[id^="ListasPersonales_"].has-error').html('');
            $('div[id^="ListasPersonales_"].has-error').css('display', 'none');
            $('#form-listapersonal input[type=button]').attr('disabled', 'disabled');
            Loading.show();
        },
        complete: function() {
            Loading.hide();
            $('#form-listapersonal input[type=button]').removeAttr('disabled');
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                if ($('#ListaGuardarForm_idLista').length) {
                    $("#ListaGuardarForm_idLista").append(data.response.optionHtml);
                }

                if ($('#gridview-listapersonal').length) {
                    $.fn.yiiGridView.update('gridview-listapersonal');
                }
                $('#form-listapersonal')[0].reset();
                $("#modal-lista-personal").modal('hide');
                dialogoAnimado(data.response.mensajeHtml);
            } else if (data.result === 'error') {
                alert(data.response);
            } else {
                $.each(data, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='listapersonaleliminar']", function() {
    var lista = $(this).attr('data-lista');

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/listapersonaleliminar',
        data: {lista: lista},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
                $.fn.yiiGridView.update('gridview-listapersonal');
                dialogoAnimado(data.response);
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
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
                }
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


$(document).on('click', "a[data-role='eliminarlistadetalle']", function() {
    var detalle = $(this).attr('data-detalle');
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/listadetalle/accion/eliminar',
        data: {detalle: detalle},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
                dialogoAnimado(data.response.mensajeHTML);
                //$.fn.yiiGridView.update('gridview-listadetalle');
                $('#div-listadetalle').html(data.response.detalleHTML);
                $('#div-listadetalle').trigger("create");
            } else if (data.result === 'error') {
                alert(data.response);
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='actualizarlistadetalle']", function() {
    var detalle = $(this).attr('data-detalle');
    var unidades = $("#campo-producto-" + detalle).val();
    unidades = parseInt(unidades);

    if (isNaN(unidades)) {
        unidades = 0;
    }
    if (unidades <= 0) {
        unidades = 0;
    }
    $("#campo-producto-" + detalle).val(unidades);

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/usuario/listadetalle/accion/actualizar',
        data: {detalle: detalle, unidades: unidades},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
                dialogoAnimado(data.response.mensajeHTML);
            } else if (data.result === 'error') {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "a[data-role='lstpersonalguardar']", function() {
    var tipo = $(this).attr('data-tipo');
    var idUnico = $(this).attr('data-id');
    tipo = parseInt(tipo);
    if (isNaN(tipo)) {
        tipo = -1;
    }
    var codigo = $(this).attr('data-codigo');
    var unidades = 0;

    if (tipo === 1) {
        unidades = $('#cantidad-producto-unidad-' + codigo + '-' + idUnico).val();
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
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === 'ok') {
                if (!$("#modal-lista-guardar").length)
                {
                    $('body').append('<div id="div-modal-agregar-lista"></div>');
                    $('#div-modal-agregar-lista').append(data.response.dialogoHTML);
                }
                else
                {
                    $('#div-modal-agregar-lista').html(data.response.dialogoHTML);
                }
                $("#modal-lista-guardar").modal("show");
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

$(document).on('click', "input[data-role='lstpersonalguardar']", function() {
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/listapersonal/lista/guardar',
        data: $('#form-listaguardar').serialize(),
        beforeSend: function() {
            $('div[id^="ListaGuardarForm_"].has-error').html('');
            $('div[id^="ListaGuardarForm_"].has-error').css('display', 'none');
            $('#form-listaguardar input[type=button]').attr('disabled', 'disabled');
            Loading.show();
        },
        complete: function() {
            $('#form-listaguardar input[type=button]').removeAttr('disabled');
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                //$('#form-listaguardar')[0].reset();
                //$("div[id^=popup-listaguardar-]").popup("close");
                $("#modal-lista-guardar").modal("hide");
                dialogoAnimado(data.response);
            } else if (data.result === 'error') {
                alert(data.response);
            } else {
                $.each(data, function(element, error) {
                    $('#' + element + '_em_').html(error);
                    $('#' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});


//para que funcionen los tool tips

$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
/*
 * JSOM-FIN
 */

/*
 * JSMS-INI
 */
function isEmptyStr(str) {
    return (!str || 0 === str.length);
}

$.fn.clearForm = function() {
    return this.each(function() {
        var type = this.type, tag = this.tagName.toLowerCase();
        if (tag == 'form')
            return $(':input', this).clearForm();
        if (type == 'text' || type == 'password' || tag == 'textarea')
            this.value = '';
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            this.selectedIndex = -1;
    });
};


/*
 * cotizaciones
 */

$(document).on('click', "a[data-role='crearcotizacion']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/crearcotizacion',
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            dialogoAnimado(data.response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});

/*
 * carro de compras
 */

$(document).on('click', "a[data-role='carrovaciar']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/vaciar',
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == 'ok') {
                $('#div-carro').html(data.carro);
                $('#div-carro').trigger("create");
                $('#div-carro-canasta').html(data.canasta);
                $('#div-carro-canasta').trigger("create");
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
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
        url: requestUrl + '/carro/modificar',
        data: data,
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
                $('#div-carro').html(data.response.carroHTML);
                $('#div-carro').trigger("create");

                if (data.response.canastaHTML) {
                    $('#div-carro-canasta').html(data.response.canastaHTML);
                    $('#div-carro-canasta').trigger("create");
                }

                if (data.response.dialogoHTML) {
                    alert(data.response.dialogoHTML);//modal
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
        url: requestUrl + '/carro/eliminar',
        data: {id: position, eliminar: eliminar},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == 'ok') {
                $('#div-carro').html(data.carro);
                $('#div-carro').trigger("create");
                $('#div-carro-canasta').html(data.canasta);
                $('#div-carro-canasta').trigger("create");
            } else {
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });

});

/*
 * pasos de compra
 */

$(document).on('click', "button[id='btn-carropagar-siguiente'], button[id='btn-carropagar-anterior']", function() {
    var actual = $(this).attr('data-origin');
    var siguiente = $(this).attr('data-redirect');

    /*if (actual === 'despacho') {
     pasoDespacho(actual, siguiente, $(this));
     } else if (actual === 'entrega') {
     pasoEntrega(actual, siguiente, $(this));
     } else if (actual === 'pago') {
     pasoPago(actual, siguiente, $(this));
     } else if (actual === 'confirmacion') {
     pasoConfirmacion(actual, siguiente, $(this));
     }*/

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
        direccion: $('input[name="FormaPagoForm[idDireccionDespacho]"]:checked').val()
    };

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/carro/pagar/paso/' + actual + '/post/true',
        data: $.param(data) + '&' + $('#form-direccion-pagoinvitado').serialize() + '&' + $('#form-pago-entrega').serialize() + '&' + $('#form-pago-pago').serialize() + '&' + $('#form-pago-bono').serialize() + '&' + $('#form-pago-comentario').serialize(),
        beforeSend: function() {
            boton.prop('disabled', true);
            $('div[id^="FormaPagoForm_"].text-danger').html('');
            $('div[id^="FormaPagoForm_"].text-danger').css('display', 'none');
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
        url: requestUrl + '/carro/pagar/paso/' + actual + '/post/true',
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
 * pasarela de pago
 */

$(document).on('click', "button[data-role='pagopasarela']", function() {
    var boton = $(this);
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/carro/pagopasarela',
        beforeSend: function() {
            boton.prop('disabled', true);
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == 'ok') {
                $('#div-pasarela-info form').remove();
                $('#div-pasarela-info').append(data.response);
                $('form[id="form-pasarela"]').submit();
            } else {
                boton.prop('disabled', false);
                ;
                alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            boton.prop('disabled', false);
            ;
            alert('Error: ' + errorThrown);
        }
    });
});

/*
 * FILTROS
 */

$(document).on('change', "input[id^='FiltroForm_listMarcas_']", function() {
    recalcularFiltros(1);
});

$(document).on('change', "input[id^='FiltroForm_listFiltros_']", function() {
    recalcularFiltros(2);
});

$(document).on('click', "input[id^='FiltroForm_listCategoriasTienda_']", function() {
    filtrarListaProductos();
});


$(document).on('click', "a[data-role='filtro-listaproductos-reset']", function() {
    $('#form-filtro-listaproductos').clearForm();
    var value = [parseInt($('#FiltroForm_precio').attr('data-slider-min')), parseInt($('#FiltroForm_precio').attr('data-slider-max'))];
    setPrecioFiltroForm(value);
    $('#FiltroForm_precio').slider('setValue', value);
    $('#calificacion-filtro-listaproductos').raty('score', 0);
    $('#calificacion-filtro-listaproductos').attr('data-score', -1);

    if ($(this).attr('data-tipo') == '1') {
        recalcularFiltros(2);
    }
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
            Loading.show();
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

            filtrarListaProductos();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + errorThrown);
        }
    });
}

function filtrarListaProductos() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/catalogo/filtrar',
        data: $('#form-filtro-listaproductos').serialize(),
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            if (data.result === 'ok') {
                $.fn.yiiListView.update('id-productos-list');
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

$(document).on('change', "select[data-role='orden-listaproductos']", function() {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/catalogo/filtrar',
        data: {'OrdenamientoForm[orden]': $('#OrdenamientoForm_orden').val()},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === 'ok') {
                //alert(data.response);
                $.fn.yiiListView.update('id-productos-list');
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

$(document).on('change', '#FiltroForm_precio', function() {
    var value = $('#FiltroForm_precio').slider('getValue');
    setPrecioFiltroForm(value);
});

function setPrecioFiltroForm(value) {
    $('#FiltroForm_precio_0_text').val("$" + format(value[0]));
    $('#FiltroForm_precio_1_text').val("$" + format(value[1]));
    $('#FiltroForm_precio_0').val(value[0]);
    $('#FiltroForm_precio_1').val(value[1]);
    filtrarListaProductos();
}

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

$(document).on('click', "a[id='btn-buscador-productos']", function() {
    var form = $(this).parents("form");
    var text = $("input[id='busqueda']").val().trim();
    if (!isEmptyStr(text)) {
        form.submit();
    }
});

$(document).on('click', "div[data-role='formapago']", function() {
    var tipo = $(this).attr('data-tipo');
    if (tipo == "datafono") {
        $("#modal-formapago input[type='radio']").removeAttr('checked');
        $("#modal-formapago #idFormaPago_" + $("#FormaPagoForm_idFormaPago_datafono").val()).prop('checked', true);
        $("div[data-role^='formapago-logo-']").addClass('display-none');
        $("div[data-role='formapago-logo-" + $("#FormaPagoForm_idFormaPago_datafono").val() + "']").removeClass('display-none');
        $("#modal-formapago").modal("show");
        return false;
    } else {
        /*$("div[data-role='formapago']").removeClass('activo');
         $(this).addClass('activo');
         $('input[id="FormaPagoForm_idFormaPago"]').val(tipo);*/
        //$('#div-formapago-vacio').remove();
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
        $('input[id="FormaPagoForm_idFormaPago_datafono"]').prop('checked', true);
        $('input[id="FormaPagoForm_idFormaPago_datafono"]').val($(this).val());

        $("div[data-role^='formapago-logo-']").addClass('display-none');
        $("div[data-role='formapago-logo-" + $(this).val() + "']").removeClass('display-none');
        $("div[data-role='formapago-logo-pagoenlinea']").addClass('display-none');
        $("div[data-role='formapago-descripcion']").addClass('display-none');
    }
});


/*
 * contador de caracteres para textarea
 */

$(document).ready(function() {
    $(function() {
        var elementArea = $("textarea[data-countchar]");
        if (elementArea.length) {
            countChar(elementArea, elementArea.attr('data-countchar'));
        }
    });
    raty();
});

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

/*
 * JSMS-FIN
 */

/*
 * JSJJ-INI
 */
function actualizarNumerosPagina() {
    var items = $('#items-page').val();
    $.fn.yiiListView.update('id-productos-list', {data: {pageSize: items}});
}

function disminuirCantidadFraccionado(codigoProducto, numeroFracciones, unidadFraccionamiento, valorFraccionado, valorUnidad, idUnico) {
    var nro = $("#cantidad-producto-fraccion-" + codigoProducto + "-" + idUnico).val();
    nro--;
    if (nro < 0) {
        var nro = $("#cantidad-producto-unidad-" + codigoProducto + "-" + idUnico).val();
        nro--;
        if (nro < 0) {
            nro = 0;
        }
        $("#cantidad-producto-unidad-" + codigoProducto + "-" + idUnico).val(nro);
        $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nro * valorUnidad));
        nro = (numeroFracciones / unidadFraccionamiento - 1);
    }
    $("#subtotal-producto-fraccion-" + codigoProducto).html("$" + format(nro * valorFraccionado));
    $("#cantidad-producto-fraccion-" + codigoProducto + "-" + idUnico).val(nro);
}

function aumentarCantidadFraccionado(codigoProducto, numeroFracciones, unidadFraccionamiento, valorFraccionado, valorUnidad, idUnico) {
    var nro = $("#cantidad-producto-fraccion-" + codigoProducto + "-" + idUnico).val();
    nro++;
    if ((nro * unidadFraccionamiento) == numeroFracciones) {
        var nro = $("#cantidad-producto-unidad-" + codigoProducto + "-" + idUnico).val();
        nro++;
        $("#cantidad-producto-unidad-" + codigoProducto + "-" + idUnico).val(nro);
        $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nro * valorUnidad));
        nro = 0;
    }
    $("#subtotal-producto-fraccion-" + codigoProducto).html("$" + format(nro * valorFraccionado));
    $("#cantidad-producto-fraccion-" + codigoProducto + "-" + idUnico).val(nro);
}

function validarCantidadFraccionado(codigoProducto, numeroFracciones, unidadFraccionamiento, valorFraccionado, valorUnidad, idUnico) {
    var nroFracciones = $("#cantidad-producto-fraccion-" + codigoProducto + "-" + idUnico).val();
    var nroUnidades = $("#cantidad-producto-unidad-" + codigoProducto + "-" + idUnico).val();


    if (nroFracciones < 0) {
        nroFracciones = 0;
    }
    if ((nroFracciones * unidadFraccionamiento) >= numeroFracciones) {
        var nroUnidadesAdicionales = Math.floor((nroFracciones * unidadFraccionamiento) / numeroFracciones);
        nroUnidades = nroUnidades * 1 + nroUnidadesAdicionales;
        $("#cantidad-producto-unidad-" + codigoProducto + "-" + idUnico).val(nroUnidades);
        $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nroUnidades * valorUnidad));
        nroFracciones = (nroFracciones * unidadFraccionamiento) % numeroFracciones;
    }
    $("#subtotal-producto-fraccion-" + codigoProducto).html("$" + format(nroFracciones * valorFraccionado));
    $("#cantidad-producto-fraccion-" + codigoProducto + "-" + idUnico).val(nroFracciones);
}

function aumentarCantidadUnidad(codigoProducto, valorUnidad) {
    var nro = $("#cantidad-producto-unidad-" + codigoProducto).val();
    if (nro < 0) {
        nro = 0;
    }
    $("#subtotal-producto-unidad-" + codigoProducto).html("$" + format(nro * valorUnidad));
    $("#cantidad-producto-unidad-" + codigoProducto).val(nro);
}


function disminuirCantidadCombo(codigoCombo, valorCombo) {
    var nro = $("#cantidad-combo-" + codigoCombo).val();
    nro--;
    if (nro < 0) {
        nro = 0;
    }
    $("#subtotal-producto-combo-" + codigoCombo).html("$" + format(nro * valorCombo));
    $("#cantidad-combo-" + codigoCombo).val(nro);
}

function aumentarCantidadCombo(codigoCombo, valorCombo) {
    var nro = $("#cantidad-combo-" + codigoCombo).val();
    nro++;
    if (nro < 0) {
        nro = 0;
    }
    $("#subtotal-producto-combo-" + codigoCombo).html("$" + format(nro * valorCombo));
    $("#cantidad-combo-" + codigoCombo).val(nro);
}

function validarCantidadCombo(codigoCombo, valorCombo) {
    var nro = $("#cantidad-producto-combo-" + codigoCombo).val();
    if (nro < 0) {
        nro = 0;
    }
    $("#subtotal-producto-combo-" + codigoCombo).html("$" + format(nro * valorCombo));
    $("#cantidad-producto-combo-" + codigoCombo).val(nro);
}

function guardarCalificacion(codigoProducto, objCalificacion, url) {

    var titulo = $('#calificacion-titulo-' + codigoProducto).val();
    var comentario = $('#calificacion-comentario-' + codigoProducto).val();
    var calificacion = $(objCalificacion).val();
    var form = $("#form-calificacion");
    $.ajax({
        type: 'POST',
        url: url,
        data: 'codigo=' + codigoProducto + '&titulo=' + titulo + '&calificacion=' + calificacion + "&comentario=" + comentario + "&" + form.serialize(),
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            if (data.result === 'ok') {
                $("[data-role='calificacion']").remove();
                $("#calificacion-producto").html("<div class='col-md-6'>TU COMENTARIO HA SIDO PUBLICADO, ESTE SERÁ APROBADO POR UN MODERADOR EN LAS PRÓXIMAS HORAS</div>");
            } else if (data.result === 'error') {
                $("#dialog").html(data.response);
                $("#dialog").dialog("open");
            } else {
                $.each(data, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + errorThrown);
        },
        complete: function(data) {
            Loading.hide();
        },
    });
}

$(document).on('keypress', "#form-autenticar", function(e) {
    if (e.keyCode == 13)
    {
        $("#form-autenticar input[data-registro-desktop='autenticar']").trigger('click');
        e.preventDefault();
    }
});

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

/*
 function habilitarPopCodigo(id){
 $('#'+id).popover();
 }*/
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
    $("input[data-role='bootstrap-slider']").slider();
    $(".slide-productos").owlCarousel({
        items: 5,
        lazyLoad: true,
        navigation: true,
        pagination: false,
        navigationText: [
            "<i class='glyphicon glyphicon-chevron-left'></i>",
            "<i class='glyphicon glyphicon-chevron-right'></i>"
        ]
    });
    /*$("#owl-combos").owlCarousel({
     items: 4,
     lazyLoad: true,
     navigation: true
     });*/
    /*$("#slide-combos").owlCarousel({
     items: 4,
     lazyLoad: true,
     navigation: true
     });*/

    /*$("#carrousel-img-productos").owlCarousel({
     items: 4,
     lazyLoad: true,
     navigation: true
     });*/
    $('.ad-gallery').adGallery({
        loader_image: '../images/libs/ad-gallery/loader.gif',
        update_window_hash: false,
        width: 400,
        height: 300,
        thumb_opacity: 0.7
    });
});

$('.ciudades').select2();


function cambioUnidadesUbicacion(codigoProducto, valorUnidad, op) {

    var cantidadProductoUbicacion = $("#cantidad-producto-ubicacion-" + codigoProducto).val();
    var cantidadProductoBodega = $("#cantidad-producto-bodega-" + codigoProducto).val();
    if (op == 0) {
        cantidadProductoUbicacion--;
    } else {
        cantidadProductoUbicacion++;
    }
    if (cantidadProductoUbicacion < 0) {
        cantidadProductoUbicacion = 0;
    }
    $("#cantidad-producto-ubicacion-" + codigoProducto).val(cantidadProductoUbicacion);

    var subtotal = valorUnidad * cantidadProductoUbicacion;
    // colocar el subtotal
    $("#subtotal-producto-ubicacion-" + codigoProducto).html("$" + format(subtotal));

    var total = subtotal + cantidadProductoBodega * valorUnidad;
    // colocar el total
    $("#total-producto-" + codigoProducto).html("$" + format(total));
}

function cambioUnidadesBodega(codigoProducto, valorUnidad, op) {
    var cantidadProductoBodega = $("#cantidad-producto-bodega-" + codigoProducto).val();
    var cantidadProductoUbicacion = $("#cantidad-producto-ubicacion-" + codigoProducto).val();
    if (op == 0) {
        cantidadProductoBodega--;
    } else {
        cantidadProductoBodega++;
    }
    if (cantidadProductoBodega < 0) {
        cantidadProductoBodega = 0;
    }
    $("#cantidad-producto-bodega-" + codigoProducto).val(cantidadProductoBodega);

    var subtotal = valorUnidad * cantidadProductoBodega;
    // colocar el subtotal
    $("#subtotal-producto-bodega-" + codigoProducto).html("$" + format(subtotal));

    var total = subtotal + cantidadProductoUbicacion * valorUnidad;
    // colocar el total
    $("#total-producto-" + codigoProducto).html("$" + format(total));
}


function ubicacionGPS() {
    if (navigator.geolocation) {
        Loading.show();
        navigator.geolocation.getCurrentPosition(obtenerPosicion, errorPosicion, {'enableHighAccuracy': true, 'timeout': 30000, 'maximumAge': 0});
    } else {
        alert("Servicio no soportado por este navegador.");
    }
}

$(document).on('click', 'button[data-role="ubicacion-gps"]', function() {
    ubicacionGPS();
});

function errorPosicion(error) {
    Loading.hide();
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
            mensaje = "Error desconocido: " + error.message;
            break;
    }

    alert(mensaje);
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
        data: {entrega: $('input[id="ubicacion-seleccion-entrega"]').val().trim(), lat: lat, lon: lon},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            if (data.result == 'ok') {
                bootbox.dialog({
                    message: data.response.mensaje,
                    title: "Ubicaci&oacute;n encontrada",
                    buttons: {
                        success: {
                            label: "Usar esta ubicación",
                            className: "btn-primary",
                            callback: function() {
                                $('#ubicacion-seleccion-ciudad').val(data.response.ciudad);
                                $('#ubicacion-seleccion-sector').val(data.response.sector);
                                $('#ubicacion-seleccion-direccion').val('');
                                $('#div-ubicacion-tipoubicacion > button').removeClass('activo').addClass('inactivo');
                                $('#div-ubicacion-tipoubicacion > button[data-role="ubicacion-gps"]').removeClass('inactivo').addClass('activo');
                                $('button[data-role="ubicacion-seleccion"]').removeClass('display-none');
                                ubicacionSeleccion();
                            }
                        },
                        close: {
                            label: "Cancelar",
                            className: "btn-default",
                            callback: function() {
                            }
                        }
                    }
                });

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
}

$(document).on('click', 'div[data-role="tipoentrega"]', function() {
    $('div[data-role="tipoentrega"]').removeClass('activo');
    $(this).addClass('activo');
    $('div[data-role="tipoentrega"]').addClass('inactivo');
    $(this).removeClass('inactivo');

    $('#div-ubicacion-tipoubicacion').removeClass('display-none');
    if ($('#ubicacion-seleccion-entrega').val().length <= 0) {
        $('#div-ubicacion-tipoubicacion').css('opacity', 0);
        $('#div-ubicacion-tipoubicacion').animate({opacity: 1}, 1000);
    }

    $('#ubicacion-seleccion-entrega').val($(this).attr('data-tipo'));

    var divcambiar = $('div[data-role="ubicacion-cambiar"]');
    if (divcambiar.length > 0 && divcambiar.attr('data-cambiar')=='1') {
        var diventrega = $('div[data-role="tipoentrega"]div[data-tipo="' + $(this).attr('data-tipo') + '"]');
        if (diventrega.length > 0) {
            $('#ubicacion-seleccion-cambiar').html(' Cambiar a ' + diventrega.attr('data-descripcion') + divcambiar.attr('data-ubicacion'));
            divcambiar.removeClass('display-none');
        }
        
        if(divcambiar.attr('data-tipo')==$(this).attr('data-tipo')){
            divcambiar.addClass('display-none');
        }
    }
});

$(document).on('click', 'button[data-role="ubicacion-direccion"]', function() {
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/usuario/direccionesUbicacion',
        dataType: 'html',
        beforeSend: function() {
            $("#modal-ubicacion-direcciones").remove();
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            $('#main-page').append(data);
            $('#modal-ubicacion-direcciones').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});

$(document).on('click', 'button[data-role="ubicacion-seleccion-direccion"]', function() {
    $('#ubicacion-seleccion-ciudad').val('');
    $('#ubicacion-seleccion-sector').val('');
    $('#ubicacion-seleccion-direccion').val($(this).attr('data-direccion'));

    $('#div-ubicacion-tipoubicacion > button').removeClass('activo').addClass('inactivo');
    $('#div-ubicacion-tipoubicacion > button[data-role="ubicacion-direccion"]').removeClass('inactivo').addClass('activo');

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
                        $('#main-page').append(data);
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

$(document).on('click', 'button[data-role="ubicacion-seleccion-mapa"]', function() {
    Loading.show();
    var lat = 0;
    var lon = 0;
    var entrega = "";
    if (map) {
        lat = map.getCenter().lat();
        lon = map.getCenter().lng();
    }
    if($('#ubicacion-seleccion-entrega').length>0){
        entrega = $('#ubicacion-seleccion-entrega').val();
    }
    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/sitio/gps',
        data: {lat: lat, lon: lon, entrega: entrega},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            if (data.result == 'ok') {
                //$('#modal-ubicacion-map').modal('hide');
                $('#ubicacion-seleccion-ciudad').val(data.response.ciudad);
                $('#ubicacion-seleccion-sector').val(data.response.sector);
                $('#ubicacion-seleccion-direccion').val('');

                $('#div-ubicacion-tipoubicacion > button').removeClass('activo').addClass('inactivo');
                $('#div-ubicacion-tipoubicacion > button[data-role="ubicacion-mapa"]').removeClass('inactivo').addClass('activo');
                ubicacionSeleccion();
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
    return false;
});

$(document).on('change', 'select[data-role="ciudad-despacho-map"]', function() {
    var val = $(this).val().trim();
    if (val.length > 0) {
        var option = $('select[data-role="ciudad-despacho-map"] option[value="' + val + '"]').attr('selected', 'selected');

        if (map) {
            map.setCenter(new google.maps.LatLng(parseFloat(option.attr('data-latitud')), parseFloat(option.attr('data-longitud'))));
            map.setZoom(15);
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
            map.setZoom(15);
        }
    }
});


function ubicacionSeleccion() {
    var form = $("#form-ubicacion");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/sitio/ubicacionSeleccion',
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
                if (data.urlAnterior) {
                    location.href = data.urlAnterior;
                } else {
                    location.href = requestUrl;
                }
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


$(document).on('click', "a[data-cargar='1']", function() {

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
        url: requestUrl + '/carro/agregar',
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



$(document).on('click', "#form-autenticar input[data-registro-desktop='autenticar']", function() {
    var form = $(this).parents("form");//"#form-autenticar"
    var boton = $(this);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/ingresar',
        data: form.serialize(),
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var obj = $.parseJSON(data);
            if (obj.result === 'ok') {
                window.location.replace(obj.response.redirect);
            } else if (obj.result === 'error') {
            } else {
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



$(document).on('click', "#form-registro input[data-registro-desktop='registro']", function() {
    var form = $(this).parents("form");//"#form-registro"
    var boton = $(this);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/registro',
        data: form.serialize(),
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                $("#main-content").html(obj.response.bienvenidaHTML);
                $("#main-content").trigger("create");
            } else if (obj.result === 'error') {
            } else {
                $.each(obj, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // boton.button('enable');
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});


$(document).on('click', "#form-registro input[data-registro-desktop='recordar']", function() {
    var form = $(this).parents("form");//"#form-registro"
    var boton = $(this);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/registro',
        data: form.serialize(),
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                $("#main-page").html(obj.response.bienvenidaHTML);
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
            Loading.hide();
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});


$(document).on('click', "#form-recordar input[data-registro-desktop='recordar']", function() {
    var form = $(this).parents("form");//"#form-recordar"
    var boton = $(this);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/usuario/recordar',
        data: form.serialize(),
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var obj = $.parseJSON(data);

            if (obj.result === 'ok') {
                form.trigger("reset");
                alert(obj.response);
            } else if (obj.result === 'error') {
                alert(obj.response);
            } else {
                //    boton.button('enable');
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


$(document).on('click', "a[data-role='comparar']", function() {
    var producto = $(this).attr('data-producto');

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/catalogo/agregarProductoComparar',
        data: {producto: producto},
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
                $("#cantidad-productos-comparar").html(data.productos)
                if (data.productos >= data.maximoComparar) {
                    $(".btnComparar").css("display", "none");
                } else {
                    $(".btnComparar").css("display", "block");
                }
            } else {

            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
    return false;
});

$(document).on('click', "a[data-role='quitarComparar']", function() {
    var producto = $(this).attr('data-producto');

    $.ajax({
        type: 'POST',
        dataType: 'json',
        async: true,
        url: requestUrl + '/catalogo/quitarProductoComparar',
        data: {producto: producto},
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === "ok") {
                $("#cantidad-productos-comparar").html(data.productos)
                $("#comparacion-producto-" + producto).css("display", "none");
                if (data.productos >= data.maximoComparar) {
                    $(".btnComparar").css("display", "none");
                } else {
                    $(".btnComparar").css("display", "block");
                }
            } else {

            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + errorThrown);
        }
    });
});



$(document).on('click', "a[data-registro-desktop='autenticar']", function() {
    var form = $(this).parents("form");//"#form-autenticar"
    var boton = $(this);

});


$(document).on('click', "a[data-role='compararProductos']", function() {
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/catalogo/verProductosComparar',
        beforeSend: function() {
            Loading.show();
            $('#modal-comparar-productos').remove();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            $('#main-page').append(data);
            $('#modal-comparar-productos').modal('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(textStatus + "");
        }
    });
    return false;
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

$(document).on('click', "button[data-role='guardarCalificacion']", function() {

    var codigoProducto = $(this).attr('data-producto');
    var form = $("#form-calificacion");
    $.ajax({
        type: 'POST',
        url: requestUrl + "/catalogo/calificar/",
        data: 'codigo=' + codigoProducto + "&" + form.serialize(),
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result === 'ok') {
                $("[data-role='calificacion']").remove();
                $("#calificacion-producto").html("<div class='col-md-6'>TU COMENTARIO HA SIDO PUBLICADO, ESTE SERÁ APROBADO POR UN MODERADOR EN LAS PRÓXIMAS HORAS</div>");
            } else if (data.result === 'error') {
                $("#dialog").html(data.response);
                $("#dialog").dialog("open");
            } else {
                $.each(data, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        }
    });
});


function capturarcalificacionproducto(score, evt) {
    var calificacion = score;
    calificacion = parseInt(calificacion);
    if (isNaN(calificacion)) {
        calificacion = '';
    }
    $('#CalificacionForm_calificacion').val(calificacion);
    $('#calificacion_form').attr('data-score', calificacion);
}
/*
 * JSJJ-FIN
 */
