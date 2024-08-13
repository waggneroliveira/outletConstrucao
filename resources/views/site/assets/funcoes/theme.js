$(document).ready(function() {
    $('.list-view').on('click', function(){
        $(this).parents('#produto').find('#products').addClass('lista')
    });

    $('.view-default').on('click', function(){
        $(this).parents('#produto').find('#products').removeClass('lista')
    });


    $('#banner').css('height', $(window).outerHeight() - 200);

    $('#eng-login-cadastro').css('height', $(window).outerHeight());
    $('#login-cadastro').css('height', $(window).outerHeight());

    $(window).on('load', function() {
        if ($('.freteCarregadoAncora').length) {
            $('html, body').animate({
                scrollTop: $('#inputOpcaoFrete').offset().top - 100
            })
            $('#recebeFrete').addClass('animateScale');
            setTimeout(() => {
                $('#recebeFrete').removeClass('animateScale');
            }, 800);
        }
    })

    var loopCar = false;
    if ($(window).outerWidth() <= 600) {
        $('.carousel-vantagem').css('width', $('.carousel-vantagem').parents('.wrap').outerWidth());
        var loopCar = true;
    }

    $(window).resize(function() {
        if ($(window).outerWidth() <= 600) {
            $('.carousel-vantagem').css('width', $('.carousel-vantagem').parents('.wrap').outerWidth());
        }

    });

    $('.carousel-vantagem').owlCarousel({
        loop: loopCar,
        margin: 25,
        nav: true,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 1
            },
            650: {
                items: 4
            },
            1400: {
                items: 4
            }
        }
    });

    if ($(window).outerWidth() <= 980) {

        $('.engloba-box-aproveita').addClass('owl-carousel');
        $('.engloba-box-aproveita').addClass('carrossel-relacionados');
        $('.engloba-box-aproveita .box-grid').removeClass('col-x4');
        $('.carrossel-relacionados').owlCarousel({
            loop: true,
            nav: false,
            autoplay: true,
            autoplayTimeout: 10000,
            autoplayHoverPause: true,
            dots: true,
            margin: 5,
            responsive: {
                0: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
        $('.carrossel-relacionados .owl-next').html('>');
        $('.carrossel-relacionados .owl-prev').html('<');
        if ($(window).outerWidth() <= 980) {
            $('.carrossel-relacionados').css('width', $(window).outerWidth() - 40);
        }
        $(window).resize(function() {
            if ($(window).outerWidth() <= 980) {
                $('.carrossel-relacionados').css('width', $(window).outerWidth() - 40);
            }
        });
        if ($(window).outerWidth() <= 980) {
            $('.carrossel-relacionados').css('width', $(window).outerWidth() - 40);
        }
    }
    if ($(window).outerWidth() <= 980) {

        $('.engloba-indice .carrossel').addClass('owl-carousel');
        $('.engloba-indice .carrossel').addClass('carrossel-indice');
        $('.box-indice').removeClass('col-x4');

        $('.carrossel-indice').css('width', $('.carrossel-indice').parent().outerWidth());

        $('.carrossel-indice').owlCarousel({
            loop: true,
            nav: false,
            autoplay: true,
            autoplayTimeout: 10000,
            autoplayHoverPause: true,
            dots: true,
            margin: 5,
            responsive: {
                0: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
        $('.carrossel-indice .owl-next').html('>');
        $('.carrossel-indice .owl-prev').html('<');
    }

    if ($(window).outerWidth() <= 980) {
        $('.engloba-box-novidade').addClass('owl-carousel');
        $('.engloba-box-novidade').addClass('carrossel-novidade');
        $('.box-novidade').removeClass('col-x3');
        $('.carrossel-novidade').owlCarousel({
            loop: true,
            nav: false,
            autoplay: true,
            autoplayTimeout: 10000,
            autoplayHoverPause: true,
            dots: true,
            margin: 5,
            responsive: {
                0: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
        $('.carrossel-novidade .owl-next').html('>');
        $('.carrossel-novidade .owl-prev').html('<');
        if ($(window).outerWidth() <= 980) {
            $('.carrossel-novidade').css('width', $(window).outerWidth() - 29);
        }
        $(window).resize(function() {
            if ($(window).outerWidth() <= 980) {
                $('.carrossel-novidade').css('width', $(window).outerWidth() - 29);
            }
        });
        if ($(window).outerWidth() <= 980) {
            $('.carrossel-novidade').css('width', $(window).outerWidth() - 29);
        }

        $('.carrossel-galeria-product').css('width', $('.carrossel-galeria-product').parents('.engloba-produto').outerWidth());

        $('.carrossel-galeria-product').owlCarousel({
            loop: false,
            nav: true,
            autoplay: false,
            dots: false,
            margin: 5,
            responsive: {
                0: {
                    items: 3
                }
            }
        });

        $('.carrossel-galeria-product .owl-next').html('>');
        $('.carrossel-galeria-product .owl-prev').html('<');
    }

    $('.carrossel-galeria-product').css('width', $('.carrossel-galeria-product').parents('.engloba-produto').outerWidth());

    $('.carrossel-galeria-product').owlCarousel({
        loop: false,
        nav: false,
        autoplay: false,
        dots: true,
        margin: 5,
        responsive: {
            0: {
                items: 3
            }
        }
    });

    $('.carrossel-galeria-product .owl-next').html('>');
    $('.carrossel-galeria-product .owl-prev').html('<');



    var loopCar = false;
    if ($(window).outerWidth() <= 600) {
        $('.carousel-storie').css('width', $('.carousel-storie').parents('.wrap').outerWidth());
        var loopCar = true;
    }

    $(window).resize(function() {
        if ($(window).outerWidth() <= 600) {
            $('.carousel-storie').css('width', $('.carousel-storie').parents('.wrap').outerWidth());
        }

    });

    $('.carousel-storie').owlCarousel({
        loop: loopCar,
        margin: 5,
        nav: true,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 1
            },
            650: {
                items: 6
            },
            1400: {
                items: 6
            }
        }
    });
    $('.carousel-galeria-produto').css('width', $('.carousel-galeria-produto').parent().outerWidth() - 20)

    if ($(window).outerWidth() <= 700) {
        $('[data-image-mobile]').each(function() {
            var imageMobile = $(this).attr('data-image-mobile');
            if (imageMobile != '') {
                $(this).css('background-image', `url(${imageMobile})`);
            }
        })
    }

    $('.carousel-galeria-produto').owlCarousel({
        loop: false,
        margin: 5,
        nav: false,
        dots: true,
        autoplay: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            }
        }
    });

    $('[data-fancybox]').fancybox(); // CHAMA A FUNCAO FANCYBOX
    $('#imageZoom').zoom();

    sidebar(); // CHAMA A FUNCAO SIDEBAR
    ancora(); // CHAMA A FUNCAO ANCORA

    // CHAMA A FUNCAO ACCORDION
    $('.btn_accordion_click').click(function() {
        accordion(this);
    });
    $('.btn_accordion_hover').hover(function() {
        accordion(this);
    });

    $('.carousel-banner').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        animateOut: 'fadeOut',
        responsive: {
            0: {
                items: 1
            }

        }
    }); // FIM $('.owl-carousel').owlCarousel({

    $('.click-ajax').on("click", function() {
        $.ajax({
            url: "enderecos.blade.php",
            type: "POST",
            data: {},
            dataType: 'JSON',
            beforeSend: function() {
                $(this).addClass('enviando');
            },
            success: function(response) {
                if (response) {
                    $(this).removeClass('enviando');
                } else {}
            }
        });
    });

    $('body').on('change', '.validateNameComplete', function() {
        var value = $(this).val();
        validateNameComplete(value, $(this));
    });

    $('body').on('change', '#cpf', function() {
        var value = $(this).val();
        if (!TestaCPF(value)) {
            Swal.fire({
                title: "Alerta!",
                text: "CPF inválido, favor digitar um CPF válido!",
                icon: "warning",
                type: "info",
                allowEscapeKey: true
            })
            $(this).val("")
        }
    });

    $('.btnSubmit').on('click', function() {
        if (!validateForm(this)) {
            Swal.fire({
                title: "Alerta!",
                text: "Campos com * são obrigatórios",
                icon: "warning",
                type: "info",
                allowEscapeKey: true
            })
        } else {
            $(this).parents('form').submit();
        }
    })

    $('.inputPassword').on('change', function() {
        var value = $(this).val()
        var minlength = $(this).attr('minlength')
        if (!validateQuantityCharacters(value, minlength)) {
            Swal.fire({
                title: "Alerta!",
                text: "Mínimo de 8 caracteres para senha!",
                icon: "warning",
                type: "info",
                allowEscapeKey: true
            })
            $(this).val("");
        }
    })
    $('.inputConfirmiedPassword').on('change', function() {
        var value = $(this).val()
        var valueConfirmied = $('.inputPassword').val()

        if (value != valueConfirmied) {
            Swal.fire({
                title: "Alerta!",
                text: "As senhas não coincidem.",
                icon: "warning",
                type: "info",
                allowEscapeKey: true
            })
        }
    })
}); // fim $(document).ready(function(){