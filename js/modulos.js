$(document).on('change', "select[data-role='modulo-ciudad']", function() {

    var codigoCiudad = $('#select-ciudad-modulo').val();
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/contenido/comprobarciudad',
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
                    $("#div-sector-modulo").html(data.htmlResponse);
                    $("#div-sector-modulo").css('display', 'block');
                    $("#sector-select").val(1);
                } else if (data.code == 2) {
                    $("#div-sector-modulo").css('display', 'none');
                    $("#sector-select").val(0);
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "button[data-role='add-sector-ciudad']", function() {

    var codigoCiudad = $('#select-ciudad-modulo').val();
    var codigoSector = $('#sector-modulo').val();
    var idModulo = $(this).attr('data-modulo');

    if ($("#sector-select").val() == 0) {
        codigoSector = 0;
    }
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/guardarCiudadSector',
        data: {codigoCiudad: codigoCiudad, codigoSector: codigoSector, idModulo: idModulo},
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == "ok") {
                bootbox.alert("Ciudad/Sector adicionado con éxito");
                $("#lista-sectores").html(data.response);
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='eliminar-sector-modulo']", function() {
    var idSectorCiudad = $(this).attr("data-modulo-sector");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/eliminarCiudadSector',
        data: {idModuloSectorCiudad: idSectorCiudad},
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == "ok") {
                bootbox.alert("Ciudad/Sector eliminado con éxito");
                $("#lista-sectores").html(data.response);
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('change', "select[data-role='ubicacion-modulo']", function() {

    var ubicacion = $('#UbicacionModulos_ubicacion').val();
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/contenido/formUbicacionCategoria',
        data: {ubicacion: ubicacion},
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#ubicacion-categoria").html(data.response);
                $("#ubicacion-categoria").css('display', 'block');
            } else {
                $("#ubicacion-categoria").css('display', 'none');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='eliminar-modulo-ubicacion']", function() {

    var idUbicacion = $(this).attr("data-modulo-ubicacion");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/eliminarUbicacion',
        data: {ubicacion: idUbicacion},
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                bootbox.alert("Ubicación eliminada con éxito");
                $("#lista-ubicaciones").html(data.response);
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('change', "select[data-role='validar-contenido']", function() {
    var tipoContenido = $('#ImagenBanner_tipoContenido').val();
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/contenido/formContenidoImagen',
        data: {tipoContenido: tipoContenido},
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                if (data.response === 1) {
                    $("#div-contenido-imagen").css('display', 'block');
                } else {
                    $("#div-contenido-imagen").css('display', 'none');
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('change', "select[data-role='validar-editar-contenido']", function() {
    var tipoContenido = $(this).val();
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/contenido/formContenidoImagen',
        data: {tipoContenido: tipoContenido},
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                if (data.response === 1) {
                    $("#div-contenido-imagen-editar").css('display', 'block');
                } else {
                    $("#div-contenido-imagen-editar").css('display', 'none');
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='modal-contenido']", function() {
    var content = $(this).attr('data-contenido-modal');
    $("#pre-contenido-modal").html(content);
    $('#modal-contenido-visual').modal('show');
});

$(document).on('click', "a[data-role='eliminar-modulo-imagen']", function() {

    var idImagen = $(this).attr("data-modulo-imagen");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/eliminarImagen',
        data: {idBanner: idImagen},
        beforeSend: function() {

        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                bootbox.alert("Imagen eliminada con éxito");
                $("#lista-imagenes").html(data.response);
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        complete: function() {

        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='eliminar-item-menu']", function() {

    var idItem = $(this).attr("data-item");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/eliminarItemMenu',
        data: {idItem: idItem},
        beforeSend: function() {

        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                bootbox.alert("Elemento eliminado con éxito");
                $("#lista-imagenes").html(data.response);
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        complete: function() {

        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});



$(document).on('click', "a[data-role='modal-editar-imagen']", function() {
    var idImagen = $(this).attr('data-modulo-imagen');
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/contenido/editarImagen',
        data: {idBanner: idImagen},
        beforeSend: function() {
            Loading.show();
            $("#modal-editar-imagen").remove();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {

                $("#container").append(data.response);
                $("#modal-editar-imagen").modal('show');
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });


});

$(document).on('click', "a[data-role='guardar-editar-imagen']", function() {

    var idImagen = $(this).attr("data-banner");
    var form = $("#form-editar-imagen");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/guardarEditarImagen',
        data: form.serialize() + "&idBanner=" + idImagen,
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                bootbox.alert("Contenido actualizado");
                $("#lista-imagenes").html(data.responseHtml);
                $("#modal-editar-imagen").modal('hide');
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            } else {
                $.each(data, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='agregar-modulo-grupo']", function() {

    var idModuloGrupo = $("#idGrupoModulo").val();
    var idModulo = $(this).attr("data-idModulo");
    var accion = $(this).attr("data-accion");
    var orden = $("#orden_" + idModulo).val();
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/configurarModuloGrupo',
        data: {idModuloGrupo: idModuloGrupo, idModulo: idModulo, accion: accion, orden: orden},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                $.fn.yiiGridView.update('grid-modulos');
                $("#grid-modulos-adicionados").html(data.response)
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});


$(document).on('click', "a[data-role='modulo-visualizar']", function() {

    var idModulo = $(this).attr("data-modulo");
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/contenido/visualizarModulo',
        data: {idModulo: idModulo},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                $("#modal-previsualizar").remove();
                $("#container").append(data.response);
                $(".slide-productos").owlCarousel({
                    items: 4,
                    lazyLoad: true,
                    navigation: true,
                    pagination: false,
                    navigationText: [
                        "<i class='glyphicon glyphicon-chevron-left'></i>",
                        "<i class='glyphicon glyphicon-chevron-right'></i>"
                    ]
                });
                $("#modal-previsualizar").modal('show');

            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

/******************/
/*  CATEGORIAS    */
/******************/

$(document).on('click', "a[data-role='crear-categoria']", function() {

    var dispositivo = $(this).attr('data-dispositivo');
    var nivel = $(this).attr('data-nivel');
    var idCategoriaRaiz = $(this).attr('data-categoria-raiz');
    var idCategoriaPadre = $(this).attr('data-categoria-padre');

    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/categoria/crearCategoria',
        data: {dispositivo: dispositivo, nivel: nivel, idCategoriaRaiz: idCategoriaRaiz, idCategoriaPadre: idCategoriaPadre},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                $("#modal-categoria").remove();
                $("#content").append(data.response);
                $('#modal-categoria').modal('show');
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});


$(document).on('click', "a[data-role='guardar-categoria']", function() {
    //  var form = $("#form-categoria");
    var dispositivo = $(this).attr('data-dispositivo');
    var idCategoriaRaiz = $(this).attr('data-categoria-raiz');
    var idCategoriaPadre = $(this).attr('data-categoria-padre');
    //  var formulario =  new FormData($('#form-categoria')[0] );
    var formulario = document.getElementById("form-categoria");

    var campo1 = document.createElement("input");
    campo1.type = 'hidden';
    campo1.value = dispositivo;
    campo1.name = "dispositivo";
    campo1.id = "dispositivo";
    formulario.appendChild(campo1);

    var campo2 = document.createElement("input");
    campo2.type = 'hidden';
    campo2.value = idCategoriaRaiz;
    campo2.name = "idCategoriaRaiz";
    campo2.id = "idCategoriaRaiz";
    formulario.appendChild(campo2);

    var campo3 = document.createElement("input");
    campo3.type = 'hidden';
    campo3.value = idCategoriaPadre;
    campo3.name = "idCategoriaPadre";
    campo3.id = "idCategoriaPadre";
    formulario.appendChild(campo3);

    var campo4 = document.createElement("input");
    campo4.type = 'hidden';
    campo4.value = 'crear';
    campo4.name = "scenario";
    campo4.id = "scenario";
    formulario.appendChild(campo4);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/categoria/guardarCategoria',
        data: new FormData(formulario),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                $("#div-categorias-tienda").html(data.response);
                $('#modal-categoria').modal('hide');
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            } else {
                $.each(data, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});


$(document).on('click', "a[data-role='editar-categoria']", function() {
    var dispositivo = $(this).attr('data-dispositivo');
    var idCategoria = $(this).attr('data-categoria');
    var idCategoriaRaiz = $(this).attr('data-categoria-raiz');
    var idCategoriaPadre = $(this).attr('data-categoria-padre');
    var nivel = $(this).attr('data-nivel');
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/categoria/editarCategoria',
        data: {dispositivo: dispositivo, nivel: nivel, idCategoriaRaiz: idCategoriaRaiz, idCategoriaPadre: idCategoriaPadre, idCategoria: idCategoria},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                $("#modal-categoria").remove();
                $("#content").append(data.response);
                $('#modal-categoria').modal('show');
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='actualizar-categoria']", function() {
    var form = $("#form-categoria");
    var dispositivo = $(this).attr('data-dispositivo');
    var idCategoriaRaiz = $(this).attr('data-categoria-raiz');
    var idCategoriaPadre = $(this).attr('data-categoria-padre');
    var idCategoria = $(this).attr('data-categoria');
    var formulario = new FormData(document.getElementById('form-categoria'));

    var formulario = document.getElementById("form-categoria");

    var campo1 = document.createElement("input");
    campo1.type = 'hidden';
    campo1.value = dispositivo;
    campo1.name = "dispositivo";
    campo1.id = "dispositivo";
    formulario.appendChild(campo1);

    var campo2 = document.createElement("input");
    campo2.type = 'hidden';
    campo2.value = idCategoriaRaiz;
    campo2.name = "idCategoriaRaiz";
    campo2.id = "idCategoriaRaiz";
    formulario.appendChild(campo2);

    var campo3 = document.createElement("input");
    campo3.type = 'hidden';
    campo3.value = idCategoriaPadre;
    campo3.name = "idCategoriaPadre";
    campo3.id = "idCategoriaPadre";
    formulario.appendChild(campo3);

    var campo4 = document.createElement("input");
    campo4.type = 'hidden';
    campo4.value = 'actualizar';
    campo4.name = "scenario";
    campo4.id = "scenario";
    formulario.appendChild(campo4);

    var campo5 = document.createElement("input");
    campo5.type = 'hidden';
    campo5.value = idCategoria;
    campo5.name = "idCategoria";
    campo5.id = "idCategoria";
    formulario.appendChild(campo5);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/categoria/guardarCategoria',
        data: new FormData(formulario),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                $("#div-categorias-tienda").html(data.response);
                $('#modal-categoria').modal('hide');
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            } else {
                $.each(data, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='asociar-categorias']", function() {

    var idCategoria = $(this).attr('data-categoria');
    var dispositivo = $(this).attr('data-dispositivo');

    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/categoria/asociarCategorias',
        data: {idCategoria: idCategoria, tipoDispositivo: dispositivo},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                $("#modal-categoria-asociacion").remove();
                $("#content").append(data.response);
                $('#modal-categoria-asociacion').modal('show');
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='add-categoria-bi']", function() {

    var idCategoria = $(this).attr('data-categoria');
    var idCategoriaBi = $(this).attr('data-categoria-bi');
    var dispositivo = $(this).attr('data-dispositivo');
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/categoria/agregarAsociacionCategoria',
        data: {idCategoria: idCategoria, idCategoriaBi: idCategoriaBi, tipoDispositivo: dispositivo},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                //  bootbox.alert(data.response);
                $("#btn-" + idCategoriaBi).html("Añadido");
                $("#div-categorias-tienda").html(data.responseHtml);
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='eliminar-categoria-bi']", function() {

    var idCategoria = $(this).attr('data-categoria');
    var idCategoriaBi = $(this).attr('data-categoria-bi');
    var dispositivo = $(this).attr('data-dispositivo');
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/categoria/eliminarAsociacionCategoria',
        data: {idCategoria: idCategoria, idCategoriaBi: idCategoriaBi, tipoDispositivo: dispositivo},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result == "ok") {
                //  bootbox.alert(data.response);
                $("#visible-categoria-bi-" + idCategoriaBi).css('display', 'none');
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});


$(document).on('click', "button[data-role='busqueda-producto-combo']", function() {

    var valorBusqueda = $.trim($("#combo-busqueda-buscar").val());
    if (!valorBusqueda)
    {
        bootbox.alert('Búsqueda no puede estar vacío');
    }
    else
    {
        var idCombo = $(this).attr('data-combo');
        $.ajax({
            type: 'POST',
            async: true,
            url: requestUrl + '/callcenter/combo/buscarproductos',
            data: {busqueda: valorBusqueda, idCombo: idCombo},
            beforeSend: function() {
                $('#modal-productos-busqueda-combo').remove();
                Loading.show();
            },
            success: function(data) {
                $('#container').append(data);
                $('#modal-productos-busqueda-combo').modal('show');
            },
            complete: function() {
                Loading.hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Loading.hide();
                bootbox.alert('Error: ' + jqXHR.responseText);
            }
        });
    }
});

$(document).on('click', "a[data-role='agregar-producto-combo']", function() {
    var producto = $(this).attr("data-producto");
    var idModulo = $(this).attr("data-combo");
    var precio = $("#precio_" + producto).val();
    var self = $(this);
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/agregarproductocombo',
        data: {producto: producto, idCombo: idModulo, precio: precio},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#contenido-productos-lista").html(data.response.htmlProductosAgregados);
                self.attr("disabled", true);
                self.html("Agregado");
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
        }
    });
});


$(document).on('click', "a[data-role='eliminar-producto-combo']", function() {

    var idComboProducto = $(this).attr("data-combo-producto");
    var idCombo = $(this).attr("data-combo");

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/eliminarproductocombo',
        data: {idComboProducto: idComboProducto, idCombo: idCombo},
        beforeSend: function() {
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#contenido-productos-lista").html(data.response.htmlProductosAgregados);
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
        }
    });

});


$(document).on('click', "button[data-role='add-sector-ciudad-combo']", function() {

    var codigoCiudad = $('#select-ciudad-modulo').val();
    var codigoSector = $('#sector-modulo').val();
    var saldo = $('#cantidades-combo').val();
    var idCombo = $(this).attr('data-combo');

    if ($("#sector-select").val() == 0) {
        codigoSector = 0;
    }
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/guardarCiudadSector',
        data: {codigoCiudad: codigoCiudad, codigoSector: codigoSector, idCombo: idCombo, saldo: saldo},
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == "ok") {
                bootbox.alert("Ciudad/Sector adicionado con éxito");
                $("#lista-sectores").html(data.response);
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='eliminar-combo-sector']", function() {
    var idCombo = $(this).attr("data-combo");
    var codigoSector = $(this).attr("data-sector");
    var codigoCiudad = $(this).attr("data-ciudad");

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/eliminarCiudadSector',
        data: {idCombo: idCombo, codigoSector: codigoSector, codigoCiudad: codigoCiudad},
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == "ok") {
                bootbox.alert("Ciudad/Sector eliminado con éxito");
                $("#lista-sectores").html(data.response);
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='eliminar-imagen-combo']", function() {

    var imagenCombo = $(this).attr('data-imagen-combo');

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/eliminarImagenCombo',
        data: {imagenCombo: imagenCombo},
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == "ok") {
                bootbox.alert("Imagen Eliminada con éxito");
                $("#lista-imagenes").html(data.response);
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='estado-imagen-combo']", function() {

    var imagenCombo = $(this).attr('data-imagen-combo');

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/combo/estadoImagenCombo',
        data: {imagenCombo: imagenCombo},
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == "ok") {
                bootbox.alert("El cambio se efectuó con éxito");
                $("#lista-imagenes").html(data.response);
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});
$(document).on('change', "select[data-role='aleatorio']", function() {
    var valor = $(this).val();

    if (valor == 0) {
        $("#lineas").val("")
        $("#lineas").prop("disabled", true);
    } else {
        $("#lineas").prop("disabled", false);
    }
});

$(document).on('change', "select[data-role='validar-tipo-combo']", function() {
    var val = $(this).val();

    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/combo/validarComboBeneficio',
        data: {valor: val},
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == "ok") {
                if (data.response == 'true') {
                    $("#Combo_fechaInicio").prop("disabled", true);
                    $("#Combo_fechaFin").prop("disabled", true);
                    $("#beneficio-combo").css("display", "block");
                } else {
                    $("#Combo_fechaInicio").prop("disabled", false);
                    $("#Combo_fechaFin").prop("disabled", false);
                    $("#beneficio-combo").css("display", "none");
                }
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='activar-bono']", function() {
    var identificacion = $(this).attr('data-identificacion');
    var valor = $(this).attr('data-valor');
    var comentario = $("#comentario").val();
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/admin/actualizarBono',
        data: {identificacion: identificacion, comentario: comentario, valor: valor},
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == "ok") {
                $("#result_bono").html(data.response);
            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }else{
                var errores="";
                 $.each(data, function(element, error) {
                    errores+=error+"\n";
                });
                bootbox.alert(errores);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
});

$(document).on('click', "a[data-role='add-beneficio']", function() {
    var val = $(this).attr('data-beneficio');
    var tipo = $(this).attr('data-tipo');
    $.ajax({
        type: 'GET',
        async: true,
        url: requestUrl + '/callcenter/combo/informacioBeneficio',
        data: {idBeneficio: val},
        dataType: 'json',
        beforeSend: function() {
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == "ok") {
                $("#descripcion-combo").html(data.descripcion);
                $("#Combo_fechaInicio").val(data.fechaInicio);
                $("#Combo_fechaFin").val(data.fechaFin);
                $("#Combo_tipoBeneficio").val(tipo);
                $("#Combo_idBeneficio").val(val);
                $("#modal-beneficios-combo").modal('hide');

            } else if (data.result == "error") {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
    return false;
});

$(document).on('click', "a[data-role='eliminar-todos-productos']", function() {
    var idModulo = $(this).attr('data-modulo');

    bootbox.dialog({
        message: "¿Está seguro de eliminar todos los productos?",
        title: "Eliminar todo",
        buttons: {
            success: {
                label: "Aceptar",
                className: "btn-primary",
                callback: function() {
                    $.ajax({
                        type: 'POST',
                        async: true,
                        url: requestUrl + '/callcenter/contenido/eliminartodosProductos',
                        data: {idModulo: idModulo},
                        dataType: 'json',
                        beforeSend: function() {
                            Loading.show();
                        },
                        complete: function(data) {
                            Loading.hide();
                        },
                        success: function(data) {
                            if (data.result === "ok") {
                                $("#contenido-productos-lista").html(data.response.htmlProductosAgregados);
                            } else if (data.result === 'error') {
                                bootbox.alert(data.response);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Loading.hide();
                        }
                    });
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


    return false;
});

$(document).on('click', 'a[data-role="modulo-eliminar"]', function() {

    var idModulo = $(this).attr("data-modulo");

    bootbox.dialog({
        message: "Está seguro de eliminar el módulo",
        title: "Eliminar Módulo",
        buttons: {
            success: {
                label: "Aceptar",
                className: "btn-primary",
                callback: function() {
                    $.ajax({
                        type: 'POST',
                        async: true,
                        url: requestUrl + '/callcenter/contenido/eliminarmodulo',
                        data: {idModulo: idModulo},
                        beforeSend: function() {
                            Loading.show();
                        },
                        complete: function() {
                            Loading.hide();
                        },
                        success: function(data) {
                            var data = $.parseJSON(data);
                            if (data.result === "ok") {
                                $.fn.yiiGridView.update('grid-modulos');
                            } else if (data.result === 'error') {
                                bootbox.alert(data.response);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Loading.hide();
                            bootbox.alert('Error: ' + errorThrown);
                        }
                    });
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
});

$(document).on('click', "button[data-role='busqueda-contenido']", function(){
    
    var valorBusqueda = $.trim($("#contenido-busqueda-buscar").val());
    if(!valorBusqueda)
    {
        bootbox.alert('Búsqueda no puede estar vacío');
    }
    else
    {
        var idModulo = $(this).attr('data-modulo');
        $.ajax({
            type: 'POST',
            async: true,
            url: requestUrl + '/callcenter/contenido/buscarproductos',
            data: {busqueda: valorBusqueda, idModulo: idModulo},
            beforeSend: function() {
                $('#modal-productos-busqueda').remove();
                Loading.show();
            },
            success: function(data) {
                $('#container').append(data);
                //alert(data);
                $('#modal-productos-busqueda').modal('show');
            },
            complete: function() {
                Loading.hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Loading.hide();
                bootbox.alert('Error: ' + jqXHR.responseText);
            }
        });
    }

});

$(document).on('keypress', "#contenido-busqueda-buscar", function(e){
    if(e.keyCode == 13)
    {
        $("button[data-role='busqueda-contenido']").trigger('click');
        e.preventDefault();
    }
});

$(document).on('click', "a[data-role='agregar-producto-contenido']", function(){
    var producto = $(this).attr("data-producto");
    var idModulo = $(this).attr("data-modulo");
    var self = $(this);
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/agregarproductomodulo',
        data: {producto : producto, idModulo : idModulo},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#contenido-productos-lista").html(data.response.htmlProductosAgregados);
                self.attr("disabled", true);
                self.html("Agregado");
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){
            Loading.hide();
        }
    });

});


$(document).on('click', "a[data-role='eliminar-producto-contenido']", function(){
    
    var idProductoModulo = $(this).attr("data-producto");

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/eliminarproductomodulo',
        data: {idProductoModulo : idProductoModulo},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#contenido-productos-lista").html(data.response.htmlProductosAgregados);
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){
            Loading.hide();
        }
    });

});


$(document).on('click', 'input[name="marcas-contenido[]"]:checkbox', function(evento){
    cargarCategoriasSeleccionadas($(this).attr('data-modulo'));
});


function cargarCategoriasSeleccionadas(attrIdModulo)
{
    var idMarcas = "";

    $('input[name="marcas-contenido[]"]:checked').each(function(index){
        if(index != 0)
        {
            idMarcas += ",";
        }
        idMarcas += $(this).val();
    });

    idModulo = attrIdModulo;
    //if(idMarcas != "")
    //{
        $.ajax({
            type: 'POST',
            async: true,
            url: requestUrl + '/callcenter/contenido/obtenerlistacategorias',
            data: {idMarcas : idMarcas, idModulo : idModulo},
            beforeSend: function(){
                    Loading.show();
            },
            success: function(data){
                var data = $.parseJSON(data);
                if (data.result === "ok") {
                    $("#categorias-marcas-seleccionadas").html(data.response.htmlCategorias);
                } else if (data.result === 'error') {
                    bootbox.alert(data.response);
                }
            },
            complete: function(){
                    Loading.hide();
                
            },
            error: function(jqXHR, textStatus, errorThrown){
                    Loading.hide();
                
            }
        });
    //}
    //else
    //{
    //    $("#categorias-marcas-seleccionadas").html('');
    //}
}

$(document).on('click', "input[data-role='almacenar-html-producto-marcas']", function(){

    var idModulo = $(this).attr('data-modulo');
    var htmlModulo = "";
    var url = "agregarmarcascategorias";
    var idMarcas = "";
    var idCategorias = "";

    if($("#ModulosConfigurados_contenido").length)
    {
        htmlModulo = $("#ModulosConfigurados_contenido").val();
        url = "contenidohtmlproductos";
    }

    $('input[name="marcas-contenido[]"]:checked').each(function(index){
        if(index != 0)
        {
            idMarcas += ",";
        }
        idMarcas += $(this).val();
    });

    $('input[name="categorias-contenido[]"]:checked').each(function(index){
        if(index != 0)
        {
            idCategorias += ",";
        }
        idCategorias += $(this).val();
    });


    //console.log("idModulo " + idModulo + " -- html " + htmlModulo + " -- marcas " + idMarcas + " -- categorias " + idCategorias);

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/'+url,
        data: {idModulo : idModulo, htmlModulo : htmlModulo, idMarcas : idMarcas, idCategorias : idCategorias},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                window.location.reload();
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


$(document).on('click', "button[data-role='cargar-productos-contenido']", function(){
    //var form = $(this).parents("form");
    var formulario = document.getElementById("cargarproducto");
    var campo = document.createElement("input");
    campo.type = 'hidden';
    campo.value = $(this).attr("data-modulo");
    campo.name = "idModulo";
    campo.id = "idModulo";
    
    formulario.appendChild(campo);

    var form = new FormData(formulario);
    //console.log(form);
    //var idModulo = ;
    if($("#contenido-cargar-producto").val() != "")
    {
        $.ajax({
            type: 'POST',
            async: true,
            url: requestUrl + '/callcenter/contenido/cargarplanoproductos',
            data: form,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                Loading.show();
            },
            complete: function() {
                formulario.removeChild(campo);
                Loading.hide();
            },
            success: function(data) {
                //console.log(data);
                var data = $.parseJSON(data);
                if (data.result === "ok") {
                    $("#contenido-productos-lista").html(data.response.htmlProductosAgregados); 
                    //dialogoAnimado();
                    $("#contenido-cargar-producto").val('');
                } else if (data.result === 'error') {
                    bootbox.alert(data.response);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Loading.hide();
                bootbox.alert('Error: ' + errorThrown);
            }
        });
    }
    else
    {
        bootbox.alert("Debe seleccionar un archivo en formato txt");
    }

    return false;
});


$(document).on('click', 'a[data-role="modulo-inactivar"]', function(){
    var idModulo = $(this).attr("data-modulo");


    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/contenido/activardesactivarmodulo',
        data: {idModulo : idModulo},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $.fn.yiiGridView.update('grid-modulos');
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });
});


//administradcion productos relacionados 

$(document).on('click', "button[data-role='busqueda-relacionados']", function(){
    
    var valorBusqueda = $.trim($("#relacionados-busqueda-buscar").val());
    if(!valorBusqueda)
    {
        bootbox.alert('Búsqueda no puede estar vacío');
    }
    else
    {
        var codigoProducto = $(this).attr('data-producto');
        $.ajax({
            type: 'POST',
            async: true,
            url: requestUrl + '/callcenter/productosRelacionados/buscarproductos',
            data: {busqueda: valorBusqueda, codigoProducto: codigoProducto},
            beforeSend: function() {
                $('#modal-productos-busqueda').remove();
                Loading.show();
            },
            success: function(data) {
                $('#container').append(data);
                $('#modal-productos-busqueda').modal('show');
            },
            complete: function() {
                Loading.hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Loading.hide();
                bootbox.alert('Error: ' + jqXHR.responseText);
            }
        });
    }

});

$(document).on('keypress', "#relacionados-busqueda-buscar", function(e){
    if(e.keyCode == 13)
    {
        $("button[data-role='busqueda-relacionados']").trigger('click');
        e.preventDefault();
    }
});


$(document).on('click', "a[data-role='agregar-producto-relacionado']", function(){
    var productoRelacionado = $(this).attr("data-relacionado");
    var producto = $(this).attr("data-producto");
    var self = $(this);
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/productosRelacionados/agregarproductorelacionado',
        data: {producto : producto, productoRelacionado : productoRelacionado},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#productos-relacionados-lista").html(data.response.htmlProductosAgregados);
                self.attr("disabled", true);
                self.html("Relacionado");
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){
            Loading.hide();
        }
    });

});


$(document).on('click', "a[data-role='eliminar-producto-relacionado']", function(){
    
    var idRelacionado = $(this).attr("data-relacion");

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/productosRelacionados/eliminarproductorelacionado',
        data: {idRelacionado : idRelacionado},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#productos-relacionados-lista").html(data.response.htmlProductosAgregados);
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){
            Loading.hide();
        }
    });

});

$(document).on('click', "a[data-role='actualizar-producto-relacionado']", function(){
    
    var idRelacionado = $(this).attr("data-relacion");
    var orden = $("#orden_"+idRelacionado).val();

    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/productosRelacionados/actualizarproductorelacionado',
        data: {idRelacionado : idRelacionado, orden : orden},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                $("#productos-relacionados-lista").html(data.response.htmlProductosAgregados);
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){
            Loading.hide();
        }
    });

});

//administracion tarifa domicilio

$(document).on('click', "a[data-role='tarifa-domicilio']", function(){
    
    var idDomicilio = $(this).attr("data-tarifa");
    
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/tarifaDomicilio/tarifadomicilio',
        data: {idDomicilio : idDomicilio},
        beforeSend: function() {
            $('#modal-tarifas-domicilio').remove();
            Loading.show();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            $('#container').append(data.response.htmlTarifa);
            $('#modal-tarifas-domicilio').modal('show');
        },
        complete: function() {
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + jqXHR.responseText);
        }
    });

});


$(document).on('change', "select[data-role='select-ciudades-domicilio']", function(){

    var codigoCiudad = $(this).val();
    //alert(codigoCiudad);
    
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/tarifaDomicilio/comprobarciudad',
        data: {codigoCiudad : codigoCiudad},
        beforeSend: function(){
            Loading.show();
        },
        success: function(data){
            var data = $.parseJSON(data);
            if (data.result === "ok") {
                /*if(data.code == 1){
                    $("#div-sector-modulo").html(data.htmlResponse);
                    $("#div-sector-modulo").css('display','block');
                    $("#sector-select").val(1);
                }else if(data.code == 2){
                    $("#div-sector-modulo").css('display','none');
                    $("#sector-select").val(0);
                }*/
                $("#listaSectoresTarifas").html(data.response.htmlSector);
            }
        },
        complete: function(){
            Loading.hide();
        },
        error: function(jqXHR, textStatus, errorThrown){
            Loading.hide();
            bootbox.alert('Error: ' + jqXHR.responseText);
        }
    });

});

$(document).on('click', "button[data-role='guardar-tarifa-domicilio']", function(){
    var form = $("#tarifa-domicilio-form");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/tarifaDomicilio/agregartarifadomicilio',
        data: form.serialize(),
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === 'ok') {
                $("#modal-tarifas-domicilio").modal("hide");
                $.fn.yiiGridView.update('grid-tarifas-domicilios');
            } else if (data.result === 'error') {
                bootbox.alert(data.response);
            } else {
                $.each(data, function(element, error) {
                    $('#' + form.attr('id') + ' #' + element + '_em_').html(error);
                    $('#' + form.attr('id') + ' #' + element + '_em_').css('display', 'block');
                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });

    //return false;
});

$(document).on('click', "a[data-role='eliminar-tarifa-domicilio']", function(){
    var idDomicilio = $(this).attr("data-tarifa");
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/tarifaDomicilio/eliminartarifadomicilio',
        data: {idDomicilio : idDomicilio},
        beforeSend: function() {
            Loading.show();
        },
        complete: function() {
            Loading.hide();
        },
        success: function(data) {
            var data = $.parseJSON(data);
            if (data.result === 'ok') {
                $.fn.yiiGridView.update('grid-tarifas-domicilios');
            } else{
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Loading.hide();
            bootbox.alert('Error: ' + errorThrown);
        }
    });

    //return false;
});
