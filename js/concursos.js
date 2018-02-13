$( document ).ready(function() {

  $( 'div[data-role="boton-ganadores"]' ).click(function() {
    var boton = $(this);
    var idTabla = boton.attr('data-id');
    $( 'div[data-role="boton-ganadores"]' ).removeClass('active');
    boton.addClass('active');
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
