function sidebar(){
    $('[data-sidebar]').each(function(){
        var alvoSidebar = $(this).attr('data-sidebar');
        $(alvoSidebar).addClass('sidebar');
        $(alvoSidebar).prepend('<div class="closeSidebar">X</div>');
        $(this).click(function(){
            $(alvoSidebar).addClass('aberto');
            $('body').addClass('no-scroll');
            if(!$('.fundo-sidebar').length){ // evita que crie mais de 1 fundo-sidebar
                $('body').prepend('<div class="fundo-sidebar closeSidebar"></div>');
            }
        }); // FIM $(this).click(function(){
        $('body').delegate('.closeSidebar','click', function(){
            $(alvoSidebar).removeClass('aberto');
            $('body').removeClass('no-scroll');
            $('.fundo-sidebar').remove();
        });
        $('body').delegate('.sidebar ul li','click', function(){
            setTimeout(function(){
                $(alvoSidebar).removeClass('aberto');
                $('body').removeClass('no-scroll');
                $('.fundo-sidebar').remove();
            },800);
        });
        // ABRIR MENU AO DESLIZAR O DEDO NO MOBILE
        /*$(document).on('vmousedown', function(e){
            //var posClick = e.clientX;
            // se o usuario clicar no canto habilita a função do touch para abrir o menu
            if(e.clientX <= 30 && !$(alvoSidebar).hasClass('aberto')){
               $(document).on('vmousemove', function(event) {
                    var posTouch = event.pageX - e.clientX;
                    
                    if(posTouch > 40){
                        $(alvoSidebar).removeClass('aberto');
                        $('body').removeClass('no-scroll');
                        $('.fundo-sidebar').remove();
                    }
                    if(posTouch < -20){
                        $(alvoSidebar).addClass('aberto');
                        $('body').addClass('no-scroll');
                        if(!$('.fundo-sidebar').length){ // evita que crie mais de 1 fundo-sidebar
                            $('body').prepend('<div class="fundo-sidebar closeSidebar"></div>');
                        }
                    }
               });
            }
            if($(alvoSidebar).hasClass('aberto')){
               $(document).on('vmousemove', function(event) {
                    $(alvoSidebar).removeClass('aberto');
                    $('body').removeClass('no-scroll');
                    $('.fundo-sidebar').remove();
               });
            }
        });
        $(document).on('vmouseup', function(){
               $(document).off('vmousemove');
        });*/
    });// FIM $('[data-sidebar]').each(function(){
}// FIM - function sidebar(){