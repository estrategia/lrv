/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 $('#items-page').select2();
 $('.viewsList .btn').click(function(){
 	atribu=$(this).attr('data-type');
 	if (atribu=='lineal') {
 		$('#lista-productos').removeClass('list_cuadricula');
 		$('#lista-productos').addClass('list_lineal')
 		$('#lista-productos.list_lineal .listaProductos li .content-txt2').addClass('row');
 		$('#lista-productos.list_lineal .listaProductos li .content-txt2 .img-list-products').addClass('col-sm-3');
 		$('#lista-productos.list_lineal .listaProductos li .content-txt2 .content_product').addClass('col-sm-5');
 		$('#lista-productos.list_lineal .listaProductos li .content-txt2 .botones-list').addClass('col-sm-4');
 	}
 });
