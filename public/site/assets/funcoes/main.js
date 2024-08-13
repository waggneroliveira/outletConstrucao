function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function mtel(v) {
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}

function refreshAmountProduct(elem) {
    var route = $(elem).attr('data-route');
    var stock = $(elem).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: route,
        type: 'POST',
        beforeSend: function() {
            $(elem).parents('#refreshAmount').addClass('loadingSize');
        },
        success: function(data) {
            PagSeguroDirectPayment.getInstallments({
                amount: data.total,
                maxInstallmentNoInterest: 4,
                brand: 'visa',
                success: function(response) {
                    // console.log(response);
                    var quantity = response.installments.visa[3].quantity
                    var installmentAmount = response.installments.visa[3].installmentAmount
                    var amount = installmentAmount.toLocaleString('pt-br', { minimumFractionDigits: 2 })

                    $(elem).parents('#refreshAmount').removeClass('loadingSize');
                    $('#quantidade-total').val('1');
                    $('[data-stock]').attr('data-stock', stock);

                    if (data.status == 'success') {
                        $('#appendAmount').fadeOut('slow', function() {
                            $(this).remove();
                            $('#getAmounts').html(data.getAmounts);
                            $('#total').html('R$ ' + data.total);
                            $('#totalAmount').val(data.total);
                            $('#parcel option').remove()
                            $('#parcel').append('<option disabled selected>Selecione a bandeira do cartão</option>')
                            $('#CardData .cardsFlags input').prop('checked', false)
                            $('#recebeParcelas i').remove()
                            $('#recebeParcelas').append('<i>ou ' + quantity + 'X de R$ ' + amount + ' sem juros</i>');
                        })
                    }
                },
                error: function(response) {
                    console.log(response);
                },
                complete: function(response) {

                }
            });
        }
    });
}

function getColorStock(route, elem) {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: route,
        type: 'POST',
        beforeSend: function() {
            $(elem).addClass('loadingColor');
        },
        success: function(data) {
            $(elem).removeClass('loadingColor');
            if (data.status == 'success') {

                if (data.html != '') {
                    $(`${elem} .content>.titulo`).show()
                } else {
                    $(`${elem} .content>.titulo`).hide()
                }

                $(`${elem} ul`).fadeOut('fast', function() {
                    $(`${elem} ul li`).remove()
                    $(`${elem} ul`).append(data.html)
                    $(`${elem} ul`).fadeIn('fast')
                })
            }
        }
    });
}

function getCepContent($zipCode, $state, $city, $region, $publicPlace) {

    $cep = $($zipCode).val();

    if ($cep != '') {

        $.ajax({
            url: `https://viacep.com.br/ws/${$cep}/json/`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {

                if (!data.erro) {

                    $($publicPlace).val(data.logradouro);

                    $($region).val(data.bairro);

                    $($city).val(data.localidade);

                    $($state).find(`option[value=${data.uf}]`).attr('selected', 'selected')

                    // $($state).val(data.uf);

                } else {
                    swal({
                        title: "Ops! :(",
                        text: "CEP Inválido.",
                        type: "error",
                        confirmButtonClass: "btn btn-confirm mt-2"
                    });
                    $($zipCode).val("");
                }
            },
            error: function() {
                swal({
                    title: "Ops! :(",
                    text: "CEP Inválido.",
                    type: "error",
                    confirmButtonClass: "btn btn-confirm mt-2"
                });
                $($zipCode).val("");
            }
        });

    }
}

function setDelivery($this) {

    var route = $($this).attr('href');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: route,
        type: 'POST',
        beforeSend() {
            $($this).parent().append('<span id="loadingGetFreight">Calculando Frete</span>');
        },
        success: function(data) {
            if (data.status == 'success') {
                $('#loadingGetFreight').fadeOut('fast', function() {
                    $(this).remove();
                })
                $('.box-locarion').removeClass('active');
                $($this).parents('.box-locarion').addClass('active');

                $('html, body').animate({
                    scrollTop: $('#confirmacao_final_pedido').offset().top - 100
                });
                $('#recebeFrete #inputOpcaoFrete').remove();
                $('#recebeFrete').append(data.html).addClass('animateScale');

                setTimeout(() => {
                    $('#recebeFrete').removeClass('animateScale');
                }, 800);
            }
        }
    });
}

function ajaxPayment($this, formdata, route, type) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: route,
        type: 'POST',
        data: formdata,
        processData: false,
        contentType: false,
        beforeSend: function() {
            $this.addClass('processingPayment');
            $this.attr('disabled', 'disabled');
        },
        success: function(data) {
            switch (data.status) {
                case 'success':

                    formdata.append('installmentCount', data.installmentCount[0]);
                    formdata.append('codigoTransacao', data.codigoTrasacao[0]);
                    formdata.append('payment_integration_id', data.payment_integration_id[0]);
                    formdata.append('reference', data.reference[0]);
                    formdata.append('paymentMethodType', data.paymentMethodType[0]);
                    formdata.append('paymentStatus', data.paymentStatus[0]);
                    if (data.paymentLink != null) formdata.append('paymentLink', data.paymentLink[0]);
                    formdata.append('typePayment', type);

                    setTimeout(() => {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'POST',
                            url: $url + '/saveSaleOrderPayment',
                            data: formdata,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                if (response.status == 'success') {
                                    $this.removeAttr('disabled');
                                    $this.removeClass('processingPayment');

                                    window.location.href = "pedido-finalizado"
                                } else {
                                    $this.removeAttr('disabled');
                                    $this.removeClass('processingPayment');

                                    swal({
                                        title: "Ops! :(",
                                        text: response.message,
                                        type: "error",
                                        confirmButtonClass: "btn btn-confirm mt-2",
                                    });

                                }

                            }
                        })
                    }, 5000);
                    break;
                case 'error':
                    $this.removeAttr('disabled');
                    $this.removeClass('processingPayment');

                    if (data.type == 'Endereco') {
                        swal({
                            title: "Ops! :(",
                            text: data.mensagem,
                            type: "error",
                            confirmButtonClass: "btn btn-confirm mt-2",
                            confirmButtonText: 'Entendi',
                        }).then((result) => {
                            var offsetTopAncora = $('#find-compra').offset().top;
                            $('html, body').animate({
                                scrollTop: offsetTopAncora
                            }, 800)
                        });
                    } else if (data.type == 'Frete') {
                        swal({
                            title: "Ops! :(",
                            text: data.mensagem,
                            type: "error",
                            confirmButtonClass: "btn btn-confirm mt-2",
                            confirmButtonText: 'Entendi',
                        }).then((result) => {
                            var offsetTopAncora = $('#recebeFrete').offset().top;
                            $('html, body').animate({
                                scrollTop: offsetTopAncora - 50
                            }, 800)
                        });
                    } else {
                        swal({
                            title: ":/",
                            text: data.mensagem,
                            type: "error",
                            confirmButtonClass: "btn btn-confirm mt-2"
                        });
                    }

                    break;
                case 'stockError':
                    $this.removeAttr('disabled');
                    $this.removeClass('processingPayment');
                    swal({
                        title: "Ops! :(",
                        text: data.mensagem,
                        type: "error",
                        confirmButtonClass: "btn btn-confirm mt-2"
                    });
                    break;
                default:
                    $this.removeAttr('disabled');
                    $this.removeClass('processingPayment');
                    swal({
                        title: "Ops! :(",
                        text: 'Algo deu errado ao finalizar sua compra, Tente novamente mais tarde.',
                        type: "error",
                        confirmButtonClass: "btn btn-confirm mt-2"
                    });
                    break;
            }
        },
        error: function(request, status, error) {

            var arquivo = request.responseJSON.file;
            var linha = request.responseJSON.line;
            var excessao = request.responseJSON.exception;
            var mensagem = request.responseJSON.message;

            $this.removeAttr('disabled');
            $this.removeClass('processingPayment');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: $url + '/logError',
                data: {
                    arquivo: arquivo,
                    linha: linha,
                    excessao: excessao,
                    mensagem: mensagem,
                },
                success: function(data) {
                    swal({
                        title: "Ops! :(",
                        text: 'Algo deu errado ao finalizar sua compra, Tente novamente mais tarde.',
                        type: "error",
                        confirmButtonClass: "btn btn-confirm mt-2"
                    });
                }
            })
        }
    });
}

function alteraQuantidade(elem, op, input, route, ref) {
    $('.loadingQtdAlter').remove()
    var stock = $(elem).attr('data-stock');
    var val = $(`#${input}`).val();

    switch (op) {
        case 'incrementa':
            val++
            break;
        case 'decrementa':
            if (val > 1) {
                val--
            }
            break;
        case 'change':
            val = $(elem).val();
            break;
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: route,
        type: 'POST',
        data: { quantity: val, stock: stock },
        dataType: 'JSON',
        beforeSend: function() {
            $(`#quant_form${input} label`).append(`
                <svg id="loadingQtdAlter" class="loadingQtdAlter" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="80px" height="80px" viewBox="0 0 128 128" xml:space="preserve">
                    <g>
                        <circle cx="16" cy="64" r="16" fill="#f58533" fill-opacity="1"/>
                        <circle cx="16" cy="64" r="14.344" fill="#f58533" fill-opacity="1" transform="rotate(45 64 64)"/>
                        <circle cx="16" cy="64" r="12.531" fill="#f58533" fill-opacity="1" transform="rotate(90 64 64)"/>
                        <circle cx="16" cy="64" r="10.75" fill="#f58533" fill-opacity="1" transform="rotate(135 64 64)"/>
                        <circle cx="16" cy="64" r="10.063" fill="#f58533" fill-opacity="1" transform="rotate(180 64 64)"/>
                        <circle cx="16" cy="64" r="8.063" fill="#f58533" fill-opacity="1" transform="rotate(225 64 64)"/>
                        <circle cx="16" cy="64" r="6.438" fill="#f58533" fill-opacity="1" transform="rotate(270 64 64)"/>
                        <circle cx="16" cy="64" r="5.375" fill="#f58533" fill-opacity="1" transform="rotate(315 64 64)"/>
                        <animateTransform attributeName="transform" type="rotate" values="0 64 64;315 64 64;270 64 64;225 64 64;180 64 64;135 64 64;90 64 64;45 64 64" calcMode="discrete" dur="640ms" repeatCount="indefinite"></animateTransform>
                    </g>
                </svg>
            `)
        },
        success: function(data) {
            if (data.status == 'success') {
                $(`#${input}`).val(val);


                if (ref == 'cart') {
                    $.ajax({
                        url: $(`#quant_form${input}`).attr('action'),
                        type: 'PUT',
                        data: $(`#quant_form${input}`).serialize(),
                        success: function(data) {

                            if (val < 1) {
                                $(`#quant_form${input}`).parents('li').remove();
                            }

                            if (data.status == 'success') {

                                $('#subtotal').html('R$ ' + data.subtotal);
                                $('#desconto').html('R$ ' + data.desconto);
                                $('#total').html('R$ ' + data.total);

                                // if (data.html != '') {
                                //     $('html, body').animate({
                                //         scrollTop: $('#confirmacao_final_pedido').offset().top - 100
                                //     });
                                // }

                                $('#totalAmount').val(data.total);
                                $('#parcel option').remove()
                                $('#parcel').append('<option disabled selected>Selecione a bandeira do cartão</option>')
                                $('#CardData .cardsFlags input').prop('checked', false)

                                $('#loadingQtdAlter').fadeOut('fast', function() {
                                    $('#loadingQtdAlter').remove();
                                })
                            }
                        }
                    });
                }

            } else {
                swal({
                    title: "Ops! :(",
                    text: `Infelizmente só temos, nessas opções, a quantidade de ${data.quantity} unidades deste produto em nossos estoques.`,
                    type: "error",
                    confirmButtonClass: "btn btn-confirm mt-2"
                });

                $('#loadingQtdAlter').fadeOut('fast', function() {
                    $('#loadingQtdAlter').remove();
                })

                $(`#${input}`).val(data.quantity);

                if (ref == 'cart') {
                    $.ajax({
                        url: $(`#quant_form${input}`).attr('action'),
                        type: 'PUT',
                        data: $(`#quant_form${input}`).serialize(),
                        success: function(data) {

                            if (val < 1) {
                                $(`#quant_form${input}`).parents('li').remove();
                            }

                            if (data.status == 'success') {

                                $('#subtotal').html('R$ ' + data.subtotal);
                                $('#desconto').html('R$ ' + data.desconto);
                                $('#total').html('R$ ' + data.total);
                                $('#totalAmount').val(data.total);
                                $('#parcel option').remove()
                                $('#parcel').append('<option disabled selected>Selecione a bandeira do cartão</option>')
                                $('#CardData .cardsFlags input').prop('checked', false)
                            }
                        }
                    });
                }
            }
        }
    });

};

function addFavorite(elem, route, product) {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: route,
        type: 'POST',
        data: { product_id: product },
        dataType: 'JSON',
        success: function(data) {
            if (data.status == 'error') {
                swal({
                    title: "Ops! :(",
                    text: data.msg,
                    type: "error",
                    confirmButtonClass: "btn btn-confirm mt-2"
                });
            } else if (data.status == 'success') {

                if (data.op == 'add') {
                    $(elem).find('i').text('Remover dos favoritos');
                    swal({
                        title: "Ótimo",
                        text: data.msg,
                        type: "success",
                        confirmButtonClass: "btn btn-confirm mt-2"
                    });
                } else {
                    $(elem).find('i').text('Adicionar aos favoritos');
                    swal({
                        title: "OK",
                        text: data.msg,
                        type: "success",
                        confirmButtonClass: "btn btn-confirm mt-2"
                    });
                }

            }
        }
    });

};

function ajaxFinishPayment($this) {

    $this = $($this);

    var route = $this.parents('form').attr('action');

    if (!$('#PaymentCard').is(':checked') && !$('#PaymentBillet').is(':checked')) {
        swal({
            title: ":/",
            text: "Favor selecione o tipo de pagamento.",
            type: "error",
            confirmButtonClass: "btn btn-confirm mt-2"
        });
    }

    var error = 0;
    if ($('#PaymentCard').is(':checked')) {
        $this.parent().find('[required]').each(function() {
            if ($(this).val() == '') {
                error++;
            }
        })

        if (error > 0) {
            swal({
                title: ":/",
                text: "Favor preencher todos as informações do cartão",
                type: "error",
                confirmButtonClass: "btn btn-confirm mt-2"
            });
        }



        if ($('#senderHash').val() == 'error') {
            swal({
                title: ":/",
                text: "Algo deu errado ao processar o pagamento",
                type: "error",
                confirmButtonClass: "btn btn-confirm mt-2"
            });
            error = 1;
        }
    }

    if (error == 0) {

        var formdata = new FormData($this.parents('form')[0]);

        if ($('#PaymentCard').is(':checked')) {
            var card_number = $('#card_number').val();
            var ccv = $('#ccv').val();
            var expiration_date = $('#expiration_date').val();
            var expiration = expiration_date.split("/");

            PagSeguroDirectPayment.createCardToken({
                cardNumber: card_number,
                cvv: ccv,
                expirationMonth: expiration[0],
                expirationYear: expiration[1],
                success: function(response) {
                    $response = Object.values(response);
                    formdata.append('cardCredToken', $response[0]['token']);

                    if ($SenderHash = PagSeguroDirectPayment.getSenderHash()) {
                        formdata.append('senderHash', $SenderHash);
                        setTimeout(() => {
                            ajaxPayment($this, formdata, route, 'cardCredit');
                        }, 300);
                    }
                },
                error: function(response) {

                    $.each(response.errors, function(index, value) {
                        erroPS(index)
                        swal({
                            title: ":/",
                            text: erroPS(index),
                            type: "error",
                            confirmButtonClass: "btn btn-confirm mt-2"
                        });
                    })

                    $('#senderHash').val('error')

                },
                complete: function(response) {
                    //tratamento comum para todas chamadas
                }
            })
        }
        if ($('#PaymentBillet').is(':checked')) {
            if ($SenderHash = PagSeguroDirectPayment.getSenderHash()) {
                formdata.append('senderHash', $SenderHash);
                setTimeout(() => {
                    ajaxPayment($this, formdata, route, 'billet')
                }, 300);
            }
        }
    }
};


$(document).ready(function() {

    // if ($(window).outerWidth() <= 700) {
    $(document).on("vclick", "#finalizarCompra", function() {
            // ajaxFinishPayment(this)
            alert('Teste')
        })
        // }

    $('.click-pergunta').on("click", function() {
        $(this).parent('div.resposta-oculto').Toggle("slow");

    })

    $('.active_anima').on("click", function() {
        $(this).find('div.engloba-sub-menu').slideToggle('slow');
    });

    $('.click-dado').on("click", function() {
        if ($(this).parent().find().hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });

    $('#recaptcha .ativa-captch').click(function(e) {
        e.preventDefault();
        $(this).addClass('verif');
        $(this).parent().find('input').val('virificado_form');
    });


    $('.carousel-novidade').owlCarousel({
        loop: false,
        margin: 5,
        nav: false,
        dots: true,
        autoplay: false,
        responsiveClass: false,
        responsive: {
            0: {
                items: 1
            },
            550: {
                items: 1
            },
            650: {
                items: 3
            }

        }
    }); // FIM $('.owl-carousel').owlCarousel({


    if ($(window).outerWidth() <= 600) {
        $('.carousel-combo').css('width', $(window).outerWidth() - 40)
    }
    $(window).resize(function() {
        if ($(window).outerWidth() <= 600) {
            $('.carousel-combo').css('width', $(window).outerWidth() - 40)
        }
    });
    if ($(window).outerWidth() <= 600) {
        $('.carousel-combo').css('width', $(window).outerWidth() - 40);
    }

    $('.carousel-combo').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        dots: false,
        autoplay: true,
        responsiveClass: false,
        responsive: {
            0: {
                items: 1
            },
            550: {
                items: 1
            },
            650: {
                items: 4
            }

        }
    }); // FIM $('.owl-carousel').owlCarousel({

    //MINI SACOLA TOPO
    $('#mega-menu').hover(function() {
            if ($('#mega-menu .back').hasClass('ativo')) {
                $('#mega-menu .back').removeClass('ativo');
            } else {
                $('#mega-menu .back').addClass('ativo');
            }
            if (!$('.dropdown').is(":visible"))
                $('.dropdown').slideDown(300);
        },
        function() {
            $('.dropdown').slideUp(300);
        }
    );

    $('body').on('click', '.btnGaleryProduct', function(e) {
        e.preventDefault()
        var imgClick = $(this).attr('href')
        $('#imageProductActual').animate({
            'opacity': 0
        }, function() {
            $('#imageProductActual').parent().find('a').attr('href', imgClick)
            $('#imageProductActual').attr('src', imgClick);
            $('#imageProductActual').animate({ 'opacity': 1 })
            $('#imageZoom').zoom();
        });
    })

    $('body').on('click', '#btnAddCart', function() {
        var $this = $(this);
        var product_color = 1;
        var product_size = 1;
        if (!$('input[name=product_size]').is(':checked')) {
            swal({
                title: ":/",
                text: "Favor escolha o tamanho do produto",
                type: "error",
                confirmButtonClass: "btn btn-confirm mt-2"
            });
            var product_size = 0;
        }
        if (!$('input[name=product_color]').is(':checked')) {
            swal({
                title: ":/",
                text: "Favor escolha a cor do produto",
                type: "error",
                confirmButtonClass: "btn btn-confirm mt-2"
            });
            var product_color = 0;
        }

        if (product_color > 0 && product_size > 0) {

            var action = $(this).parents('form').attr('action');
            var formdata = new FormData($(this).parents('form')[0]);
            var stockId = $(this).parents('form').find('.refStockId:checked').data('stock');

            formdata.append('stock_id', stockId);

            $.ajax({
                url: action,
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $this.addClass('addedCart')
                },
                success: function(data) {
                    $this.removeClass('addedCart')
                    if (data.response == 'success') {
                        $('.cart_count').text(data.qtdCart)
                        swal({
                            title: "Ótimo",
                            text: "Produto adicionado ao carrinho com sucesso.",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonClass: "btn btn-confirm mt-2",
                            confirmButtonColor: '#f58533',
                            confirmButtonText: 'Continuar Comprando',
                            cancelButtonColor: '#8e8e8e',
                            cancelButtonText: 'Ver Carrinho'
                        }).then((result) => {
                            // console.log(result);
                            if (result.dismiss == 'cancel') {
                                window.location.href = $url + "/carrinho"
                            }
                        });
                    } else {
                        swal({
                            title: ":/",
                            text: "Houve um problema ao adicionar seu produto ao carrinho, tente novamente, se o erro persistir contacte o administrador",
                            type: "error",
                            confirmButtonClass: "btn btn-confirm mt-2"
                        });
                    }
                }
            });
        }
    });

    $('#btnCalculaFrete').on('click', function(e) {
        e.preventDefault();
        $this = $(this).parents('form');
        var route = $this.attr('action');

        $.ajax({
            url: route,
            type: 'POST',
            data: $this.serialize(),
            // beforeSend: function() {
            //     $this.append('<div class="caluloFreteLoad"><p>Buscando opções...</p></div>');
            // },
            success: function(data) {
                $this.find('.caluloFreteLoad').fadeOut('fast', function() {
                    $(this).remove();
                })

                if (data.status == 'success') {
                    $this.parent().find('#opcoes-frete').find('#inputOpcaoFrete').remove();
                    $this.parent().find('#opcoes-frete').append(data.html)
                    $('#fretePreco').text('-');
                }
            }
        });
    })

    $('body').on('click', '.opcoes-frete input', function() {
        if ($(this).is(':checked')) {
            $this = $(this);

            var route = $this.parents('form').attr('action');
            var value = $this.val();
            var type = $this.attr('data-type');
            var deadline = $this.attr('data-prazo');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                type: 'POST',
                data: { freight: value, type: type, deadline: deadline, _method: 'PUT' },
                success: function(data) {
                    if (data.status == 'success') {
                        $('#fretePreco').html(data.frete);
                        $('#total').html('R$ ' + data.total);
                        $('#totalAmount').val(data.total);
                        $('#parcel option').remove()
                        $('#parcel').append('<option disabled selected>Selecione a bandeira do cartão</option>')
                        $('#CardData .cardsFlags input').prop('checked', false)
                    }
                }
            });
        }
    })

    $('body').on('click', '.paymentMethod .selectPayment', function() {
        if ($(this).val() == 'cardCredit') {
            $('#CardData').fadeIn('fast')
        } else [
            $('#CardData').fadeOut('fast')
        ]
    })

    $('body').on('click', 'input[name=flag_card]', function() {
        var brand = $(this).val().toLowerCase();
        var maxParcel = $('#maxParcel').val();
        var totalAmount = $('#totalAmount').val().replace(",", ".");

        getInstallments(totalAmount, brand, maxParcel);
    })

    $('#retira_loja').on('click', function() {
        var setInStore = false;
        if ($(this).is(':checked')) {
            var setInStore = true;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $url + '/setInStore',
            type: 'POST',
            data: { setInStore: setInStore },
            success: function(data) {
                if (data.status == 'success') {
                    $('#fretePreco').html('-');
                    $('#frete').fadeOut('fast');
                }
            }
        });
    })

    $('body').on('change', '.validateExpireCart', function() {
        validateQtdInput(this, 'Data de validade do cartão inválida Ex.: 03/2029', 7)
    })

    $('body').on('change', '.validateCCV', function() {
        validateQtdInput(this, 'CCV inválido, mínimo de 3 caracteres', 3)
    })

    $('body').on('change', '.validateDataNascimento', function() {
        validateQtdInput(this, 'Data de nascimento inválido Ex.: 20/12/1989', 10)
    })

});

/*---------------------FUNCAO LGPD-----------------*/

function openNav() {
    document.getElementById("mySidenav").style.width = "480px";
    document.getElementById("mySidenav").style.opacity = "1";
   
    document.getElementById("mySidenav").style.visibility = "visible"; 

  }
  
  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("mySidenav").style.opacity = "0"; 
    document.getElementById("mySidenav").style.visibility = "hidden";
  }
  
  function cookies (functions){
      const container = document.querySelector('.cookies-container');
      const saveAllCookie = document.querySelector('.save_cookie_button');
      const savePrefCookie = document.querySelector('.button_modal_req_cookie');    
  
      if(!container || !saveAllCookie || !savePrefCookie) return null
  
      const localPref = JSON.parse(window.localStorage.getItem('cookies-pref'))
      const localAllCookie = JSON.parse(window.localStorage.getItem('cookies'))
  
      if(localPref) activePrefCookie(localPref)
      if(localAllCookie) activeAllCookie(localAllCookie)
      
  //MARCAR TODOS OS INPUTS CASO USUARIO PERMITA TODOS OS COOKIES
      function getFormSelectedAll(){
         var list, index, result;
         var arr = [] 
        list = document.getElementsByClassName("checkbox");
        for (index = 0; index < list.length;) {
          list[index].setAttribute('checked','checked');        
          result = list[index].getAttribute('data-function')
          ++index   
          arr.push(result)     
        }        
        return arr                                          
      }
      //VERIFICA OS COOKIES PERMITIDOS
      function getFormPref(){
        return [...document.querySelectorAll('[data-function]')].filter((el)=> el.checked
        ).map((el)=>el.getAttribute('data-function'))
        
      }
  
  
    function activeAllCookie(allCookie){
      allCookie.forEach((f) => functions[f]());    
      container.style.display = 'none'
      closeNav()
      window.localStorage.setItem('cookies',JSON.stringify(allCookie))    
    }
  
    function activePrefCookie(prefCookie){
      prefCookie.forEach((f) => functions[f]())
      container.style.display = 'none'
      closeNav()
      window.localStorage.setItem('cookies-pref',JSON.stringify(prefCookie))
    }
  
      //TODOS OS COOKIES ATIVOS
      function handleSaveAll(){
          const allCookie = getFormSelectedAll()
          activeAllCookie(allCookie)        
      }
      //VERIFICA AS OPÇÕES ESCOLHIDAS
      function handlePref(){
          const prefCookie = getFormPref()
          activePrefCookie(prefCookie)        
      }
      //REMOVE TODOS OS COOKIES 
      function removeCookie(){
          const removeCookie = getRemove()
          removeAllCookie(removeCookie)
      }
  
  
      saveAllCookie.addEventListener('click',handleSaveAll)
      savePrefCookie.addEventListener('click',handlePref)
  
  }
  
  function useAnalysis(){
    window.location.href
  }
  function necessarily(){
    window.location.href
  }
  function analytics(){
    //CODIGO DO GOOGLE ANALITYCS
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'AW-687157588');
  }
  function marketing(){
    //QUALQUER TIPO DE CODIGO VOLTATO AO MARKETING. EX: SPORTY FY, FACEBOOK ADS......
  }
  
  
  
  cookies({
    necessarily,
    useAnalysis,
    analytics,
    marketing
  }) 
  /*---------------------FINAL FUNCAO LGPD-----------------*/