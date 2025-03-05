/**
 * record payment
 */

$('#record_payment_invoice').click(function(){
    var amount = $('#amount_invoice_record').val();
    var payment_methods = $('#payment_methods_invoice_record').val();
    var ref_invoice = $('#ref_invoice').val();
    var total_service_included = $('#total_service_included').val();
    var url = $('#record_payment_invoice').attr('url');
    var token = $('#record_payment_invoice').attr('token');

    //console.log('Montant : ' + amount + '\nSolde restant : ' + remainingBalance);

    if(payment_methods != "")
    {
        $('#payment_methods_invoice_record-error').text("");
        $('#payment_methods_invoice_record').removeClass('is-invalid');

        if(amount != "" && amount != 0)
        {
            $('#amount_invoice_record-error').text("");
            $('#amount_invoice_record').removeClass('is-invalid');

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    '_token': token,
                    'amount': amount,
                    'ref_invoice': ref_invoice,
                    'total_service_included': total_service_included,
                },
                success:function(response){

                    console.log(response);

                    if(response.result == "success"){
                        $('#amount_invoice_record-error').text("");
                        $('#amount_invoice_record').removeClass('is-invalid');

                        $('#record_payment_invoice_form').submit();
                    }
                    else{
                        $('#amount_invoice_record-error').text($('#amount_invoice_record-error-message').val());
                        $('#amount_invoice_record').addClass('is-invalid');
                    }
                }
            });
        }
        else
        {
            $('#amount_invoice_record-error').text($('#amount_invoice_record-error-message-empty').val());
            $('#amount_invoice_record').addClass('is-invalid');
        }
    }
    else{

        $('#payment_methods_invoice_record-error').text($('#payment_methods_invoice_record-error-message').val());
        $('#payment_methods_invoice_record').addClass('is-invalid');
    }
});
