$( document ).ready(function() {

  $('.owl-carousel-premios').owlCarousel({
    loop:true,
    items:3,
    pagination : false,
     mouseDrag : false,
    navigationText : ["<span class='glyphicon glyphicon-chevron-left'></span>","<span class='glyphicon glyphicon-chevron-right'></span>"],
     navigation : true
  })


  $( 'div[data-role="boton-ganadores"]' ).click(function() {
    var boton = $(this);
    var idTabla = boton.attr('data-id');
    var selector = 'table[data-role="tabla-ganadores"][data-id="'+idTabla+'"]';
    $('table[data-role="tabla-ganadores"]').addClass('hidden');
    $(selector).removeClass('hidden');
  });

  $( 'div[data-role="boton-concursos"]' ).click(function() {
    var boton = $(this);
    var idTabla = boton.attr('data-id');
    $( 'div[data-role="boton-concursos"]' ).removeClass('active');
    boton.addClass('active');
    var selector = 'div[data-role="reglamento-concurso"][data-id="'+idTabla+'"]';
    $('div[data-role="reglamento-concurso"]').addClass('hidden');
    $(selector).removeClass('hidden');
  });


});
