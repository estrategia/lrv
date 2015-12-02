/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('#items-page').select2();

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
        listaProductoLineal();
    } else if (tipo === 'cuadricula') {
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
    widht = $('.main_menu .categorias').width() - 4;
    widhtDocument = ($(window).width() - widht) - 4;
    $('.categorias .category > li').width(widht);
    $('.categorias .category > li .right-nav').width(widhtDocument);
    $('.categorias .category > li .right-nav .submenu').width(widhtDocument);
});
$(".categorias .cuidado-personal").hover(function() {
    $('.submenu').isotope({
        layoutMode: 'masonryHorizontal',
        itemSelector: '.section-submenu'
    });

});
