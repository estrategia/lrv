function alert(message){
    bootbox.alert({ message:message,callback: function(){}, buttons: {ok : {label:'Aceptar', className:'btn-danger'} } });
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('body #items-page').select2();

$(document).on('click', 'button[data-role="tipovista-listaproductos"]', function() {
    listaProductoVista($(this).attr('data-type'));
    $('button[data-role="tipovista-listaproductos"]').attr('data-active','false');
    $(this).attr('data-active','true');
});

function listaProductoVistaActualizar(){
    listaProductoVista($('button[data-role="tipovista-listaproductos"]button[data-active="true"]').attr('data-type'));
}

function listaProductoVista(tipo){
    if (tipo === 'lineal') {
        $(".descripcion-grid").css('display','none');
        $(".descripcion-lineal").css('display','block');
        listaProductoLineal();
    } else if (tipo === 'cuadricula') {
        $(".descripcion-grid").css('display','block');
        $(".descripcion-lineal").css('display','none');
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
    $('.main_menu .categorias').click(function(){
        ajuesmenu();
    });
    ajuesmenu();
    ajustebuscador()
});
$( window ).resize(function() {
  ajuesmenu();
  ajustebuscador()
});
function ajustebuscador(){
    widhtControl = $('.content-category .controls').width();
    widhtBoton = $('.content-category .controls #btn-buscador-productos').width();
    widhtDrop = $('.content-category .controls .float-right').width();
    width=widhtControl-(widhtBoton+widhtDrop);
    $('.content-category .controls >span').width(width+6);
}
function ajuesmenu(){
    widht = $('.main_menu .categorias').width();
    widhtDocument = ($(window).width() - widht);
    $('.categorias .category > li').width(widht);
    $('.categorias .category > li .right-nav').width(widhtDocument);
    total=$('.main_menu .modulo-menu').length;
   // alert(total);
    itemswidth=widhtDocument/total;
    $('.main_menu .modulo-menu').width(itemswidth);
}
$(".main_menu .cuidado-personal > a").click(function() {
    //alert($(this).next().attr('class'));
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
