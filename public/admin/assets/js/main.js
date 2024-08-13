function submitForm(id) {
    $(id).submit();
}

function previewImageUpload(input, contentImage) {

    if (input.files) {
        $('.thumbPrev.preview').remove();
        var quantImagens = input.files.length;
        for (i = 0; i < quantImagens; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
                // var content = '<div class="opcaoImage btn-secondary"><div class="custom-checkbox form-check"><input type="checkbox" name="cover" value="1" class="custom-control-input" id="capa-'+event.timeStamp+'"><label class="custom-control-label" for="capa-'+event.timeStamp+'">Capa</label></div></div>';
                $(contentImage).append('<div class="thumbPrev preview col-12 col-md-4"><div style="background-image: url(' + event.target.result + ')"></div></div>');
            }

            reader.readAsDataURL(input.files[i]);
        }
    }

}

function getCepContent($zipCode, $state, $city, $region, $publicPlace) {
    $stateBrasilian = new Array();
    $stateBrasilian['AC'] = 'Acre';
    $stateBrasilian['AL'] = 'Alagoas';
    $stateBrasilian['AP'] = 'Amapá';
    $stateBrasilian['AM'] = 'Amazonas';
    $stateBrasilian['BA'] = 'Bahia';
    $stateBrasilian['CE'] = 'Ceará';
    $stateBrasilian['DF'] = 'Distrito Federal';
    $stateBrasilian['ES'] = 'Espírito Santo';
    $stateBrasilian['GO'] = 'Goiás';
    $stateBrasilian['MA'] = 'Maranhão';
    $stateBrasilian['MT'] = 'Mato Grosso';
    $stateBrasilian['MS'] = 'Mato Grosso do Sul';
    $stateBrasilian['MG'] = 'Minas Gerais';
    $stateBrasilian['PA'] = 'Pará';
    $stateBrasilian['PB'] = 'Paraíba';
    $stateBrasilian['PR'] = 'Paraná';
    $stateBrasilian['PE'] = 'Pernambuco';
    $stateBrasilian['PI'] = 'Piauí';
    $stateBrasilian['RJ'] = 'Rio de Janeiro';
    $stateBrasilian['RN'] = 'Rio Grande do Norte';
    $stateBrasilian['RS'] = 'Rio Grande do Sul';
    $stateBrasilian['RO'] = 'Rondônia';
    $stateBrasilian['RR'] = 'Roraima';
    $stateBrasilian['SC'] = 'Santa Catarina';
    $stateBrasilian['SP'] = 'São Paulo';
    $stateBrasilian['SE'] = 'Sergipe';
    $stateBrasilian['TO'] = 'Tocantins';

    $cep = $($zipCode).val();

    $.ajax({
        url: 'http://cep.republicavirtual.com.br/web_cep.php?formato=json',
        type: 'GET',
        dataType: 'json',
        data: { cep: $cep },
        success: function(data) {
            if (data.resultado == 1) {
                $($publicPlace).val(data.tipo_logradouro + ' ' + data.logradouro);
                $($region).val(data.bairro);
                $($city).val(data.cidade);
                $($state).val($stateBrasilian[data.uf]);
            } else {
                $.NotificationApp.send("Erro!", "CEP Inválido", "top-right", "#bf441d", "error");
            }
        }
    });
}

function orderRecord($route, $id = null, $element) {

    console.log($route)

    var value = $($element).val()

    $.ajax({
        url: $route,
        type: 'POST',
        dataType: 'json',
        data: { order: value, id: $id },
        success: function(data) {
            if (data.status == 'error') {
                $.NotificationApp.send("Erro!", "Erro ao ordenar o registro", "top-right", "#bf441d", "error");
            }
        }
    });
}

$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $('.orderProdutct').on('change', function() {
    //     var id = $(this).data('id')
    //     orderRecord(`${$url}/orderProducts/${id}`, this)
    // })


    $('.money').mask('00.000,00', { reverse: true });
    $('.percent').mask('##0,00%', { reverse: true });
    //CONFIRMAÇÃO DE DELETE
    $('body').on('click', '.delete_btn', function(event) {
        event.preventDefault();
        $this = $(this);

        swal({
            title: "Tem certeza?",
            text: "Esta ação é irreversivel!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-confirm mt-2",
            cancelButtonClass: "btn btn-cancel ml-2 mt-2",
            confirmButtonText: "Sim, Deletar!"
        }).then(function(isConfirm) {
            if (!isConfirm['dismiss']) {
                $this.parent().submit();
            } else {
                return false;
            }
        })

    });

    $('.checkbox-ajax').change(function() {

        var action = $(this).parents('form').attr('action');

        $.ajax({
            url: action,
            type: 'PUT',
            data: $(this).parents('form').serialize(),
            success: function(data) {
                if (data.response == 'success') {
                    $.NotificationApp.send("Sucesso!", data.mensagem, "top-right", "#5ba035", "success");
                } else {
                    $.NotificationApp.send("Erro!", data.mensagem, "top-right", "#bf441d", "error");
                }
            }
        });
    });

    $('#promotion').on('click', function() {
        if ($(this).is(':checked')) {
            $('input[name="promotinal_value"]').attr('required', 'required');
            $('input[name="promotinal_value"]').parent().find('label').append('<span class="text-danger">*</span>');
        } else {
            $('input[name="promotinal_value"]').removeAttr('required');
            $('input[name="promotinal_value"]').parent().find('label .text-danger').remove();
        }
    });

    $('input[name="promotinal_value"]').on('change', function() {
        if ($(this).val() != '') {
            $('#promotion').attr('checked', 'checked');
        } else {
            $('#promotion').removeAttr('checked');
        }
    });

    $('#solicitationPermissionaToken').on('click', function() {

        if ($('#client_id_me').val() == '' || $('#client_secret_me').val() == '') {
            swal({
                title: "Ops!",
                text: "Cliente ID e Cliente Secret Inexistente, favor preencher os campos antes de gerar o token",
                type: "warning",
            })

            return false
        }

        if (!$('#formGenerateTokenME input:checked').length) {
            swal({
                title: "Ops!",
                text: "Selecione pelo menos uma opção de permissão para continuar",
                type: "warning",
            })

            return false
        }

        var permission = '',
            urlME = $('#formGenerateTokenME').attr('action')
        $('#formGenerateTokenME input:checked').each(function() {
            permission += `${$(this).val()} `
        })

        var redirectUrl = urlME + permission

        window.open(redirectUrl)

        console.log(redirectUrl)
    })
});