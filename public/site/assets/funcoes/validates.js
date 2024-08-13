function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    if (strCPF != '') {
        if (strCPF == "00000000000") return false;

        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) return false;

        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11))) return false;
        return true;
    } else {
        return true;
    }
}

function validateNameComplete(value, elem) {
    if (value.trim().split(' ').length >= 2) {
        return true;
    } else {

        Swal.fire({
            title: "Alerta!",
            text: "Por favor preencher seu nome completo!",
            icon: "warning",
            type: "info",
            allowEscapeKey: true
        })
        elem.val("");
    }
}

function validateQtdInput(elem, mensage, min) {
    var val = $(elem).val()
    if (val.length < min) {
        Swal.fire({
            title: "Alerta!",
            text: mensage,
            icon: "warning",
            type: "info",
            allowEscapeKey: true
        })
        $(elem).val("");
    }
}

function validateForm(botaoEnvia) {
    // CRIA UM ARRAY PARA VERIFICAÇÃO DE CAMPOS
    var arrNameInputs = [];
    $(botaoEnvia).parents('form').find('[required]').each(function() {
        var nameInput = $(this).val();
        arrNameInputs.push(nameInput);
    });

    // VERIFICA SE EXISTE ALGUM CAMPO VAZIL
    var erro = 0;
    for (var i = 0; i < arrNameInputs.length; i++)
        if (arrNameInputs[i] === "" || arrNameInputs[i] === null) erro++;

    if (erro > 0) return false
    return true
}

function validateQuantityCharacters(value, minlength) {
    var qtdValue = value.length;
    if (qtdValue < minlength) return false
    return true
}