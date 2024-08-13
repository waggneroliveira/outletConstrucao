$(document).ready(function(){
    /* slider banner */
    $('#banner ul li').not('#banner ul li:first').hide().css('z-index','0');
    /* transicao */
    var speed = $('#banner').attr('data-speed-trans');
    rotate = setInterval(auto, speed);
    $('#banner ul li').each(function(){
        var indice = $('#banner ul li').index(this);
        $(this).append('<a href="#" class="nave-slide"> ' + indice + ' </a>');
        $(this).addClass('pos' + +indice + '');
    });
    $('#pagination').append($('.nave-slide'));
    $('#pagination').find('span').hide();
    $('.nave-slide').click(function () {
        $('#pagination').find('span').show();
        setTimeout(function () {
            $('#pagination').find('span').hide();
        }, 1000);
    });
    $('.btn').find('.desativa').hide();
    $('.btn span').click(function () {
        $('.btn').find('.desativa').show();
        setTimeout(function () {
            $('.btn').find('.desativa').hide();
        }, 1000);
    });
    $('.nave-slide').click(function () {
        clearInterval(rotate);
    });
    $('#slide-next span').click(function(){
        $('#banner ul li:first').next().show();
        $('#banner ul li:first').fadeOut(300);
        setTimeout(function(){
            $('#banner ul li').last().after($('#banner ul li').first());
            $('#banner ul li').not('#banner ul li:first').hide().css('z-index','0');
            $('#banner ul li:first').css('z-index','1');
        }, 500);
    });
    $('#slide-prev span').click(function(){
        $('#banner ul li:last').show();
        $('#banner ul li').first().before($('#banner ul li').last());
        $('#banner ul li:first').next().fadeOut(300);
        setTimeout(function(){
            $('#banner ul li').not('#banner ul li:first').hide().css('z-index','0');
            $('#banner ul li:first').css('z-index','1');
        }, 500);
    });
    // animacao usando a paginacao
    $('.nave-slide').click(function(e) {
        e.preventDefault();
        var naveIndice = $('.nave-slide').index(this);
        $('.nave-slide').removeClass('active');
        $(this).addClass('active');
        $('#banner ul li.pos'+naveIndice+'').show();
        $('#banner ul li').not('#banner ul li.pos'+naveIndice+'').fadeOut(300);
        setTimeout(function(){
          $('#banner ul li.pos'+naveIndice+'').css('z-index','1');
          $('#banner ul li').not('#banner ul li.pos'+naveIndice+'').css('z-index','0');
       }, 500);
    });
    $('#banner').each(function () {
        $('.nave-slide:first').addClass('active');
        $('#slide-next span').click(function () {
            if ($('.nave-slide:last').hasClass('active')) {
                $('.nave-slide:first').addClass('active');
                $('.nave-slide:last').removeClass('active');
            }
            else{
                $('.nave-slide.active:first').next().addClass('active');
                $('.nave-slide.active:first').removeClass('active');
            }
        });
    });
    // Funcao automatico
    function auto() {
        var quantLi = $('#banner ul li').length;
        if(quantLi > 1){
            $('#slide-next span').click();
        }        
     }
    $('#pagination').each(function(){
            var largNav = $(this).outerWidth() / 2;
            $(this).css({
               'margin-left': - largNav 
            });
    });
    /* fim slide */
});