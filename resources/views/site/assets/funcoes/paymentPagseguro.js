function getInstallments(amount, brand, maxInstallmentNoInterest){

    PagSeguroDirectPayment.getInstallments({
        amount: amount,
        maxInstallmentNoInterest: maxInstallmentNoInterest,
        brand: brand,
        success: function(response){

            var installments = response.installments;
            var options = `<option selected value="0">Quantidade de parcelas</option>`;
            $.each(installments,function(index,obj){
                $.each(obj,function(i,objB){
                    var juros = "com juros";
                    if(objB.interestFree==true){
                        juros = "sem juros";
                    }
                    options += `<option value="${objB.quantity}/${objB.installmentAmount}">${objB.quantity} Parcela(s) ${juros} de R$ ${objB.installmentAmount} (R$ ${objB.installmentAmount})</option>`;
                });
            });

            $('#parcel option').remove();
            $('#parcel').append(options);

        },
        error: function(response) {
            console.log(response);
        },
        complete: function(response){

        }
    });
}

function cardCredToken(cardNumber, cvv, expirationMonth, expirationYear)
{
    PagSeguroDirectPayment.createCardToken({
        cardNumber: cardNumber,
        cvv: cvv,
        expirationMonth: expirationMonth,
        expirationYear: expirationYear,
        success: function(response) {
            $response = Object.values(response)
            $('#cardCredToken').val($response[0]['token']);
            $('#senderHash').val(PagSeguroDirectPayment.getSenderHash());
            $return = true;
        },
        error: function(response) {
            $('#senderHash').val('error');
        },
        complete: function(response) {
            //tratamento comum para todas chamadas
        }
    })
}
