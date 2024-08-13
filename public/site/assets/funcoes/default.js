function accordion(objeto) {
    if(!$(objeto).hasClass('active')) {
        $(objeto).parent().find('.aba_accordion').stop().slideDown(400);
        $(objeto).addClass('active');
    }else {
        $(objeto).parent().find('.aba_accordion').stop().slideUp(400);
        $(objeto).removeClass('active');
    }
}
function ancora(){
    $('.ancora').click(function(e){
        e.preventDefault();
        var alvo = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(alvo).offset().top -30
        }, 800);
    });
}// Fim Funcoes soltas
function addClassActive(element){
    $('body').on('click', element, function(){
            $(element).removeClass('active');
            $(this).addClass('active');
    });
}
function carrosselMultItem(element, quantItem, quantLamina, auto, nav, dots){
    var quantItemAppend = $(element).find('>*').length;
    var refFor = quantItemAppend / quantItem;

    for(var i=1; i <= refFor; i++){
            
        $(element).append('<div class="contItemAppend'+i+'"></div>');

        $(element).find('> *:lt('+quantItem+')').addClass('appendItem'+i);
        $(element).find('.appendItem'+i).appendTo('.contItemAppend'+i+'');
    }
    
    $(element).owlCarousel({
        loop: false,
        margin:5,
        nav: nav,
        dots: dots,
        autoplay: auto,
        responsiveClass:true,
        responsive:{
            0:{
                items:1
            },
            400:{
                items:2
            },
            650:{
                items:3
            },
            840:{
                items: quantLamina
            }
        }
    });// FIM $('.owl-carousel').owlCarousel({
}