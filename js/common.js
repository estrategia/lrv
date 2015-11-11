function dialogoAnimado(texto) {
    var id = 'dialogo-carro-' + uniqueId();
    $("<div class='dialogo-animado' id='" + id + "'>" + texto + "</div>").appendTo('body');

    $("#" + id).animate({
        opacity: 1,
        bottom: '+=2%'
    }, 400, function() {
        setTimeout(function() {
            $("#" + id).animate({
                opacity: 0,
                bottom: '-=2%'
            }, 400, function() {
                $("#" + id).remove();
            });
        }, 3000);
    });
}

function uniqueId() {
    var time = new Date().getTime();
    while (time == new Date().getTime())
        ;
    return new Date().getTime();
}

function countChar(element, idContador) {
    $('#' + idContador).text(element.val().length);
}

$(document).on('keyup', "textarea[data-countchar]", function() {
    countChar($(this), $(this).attr('data-countchar'));
});