$(document)
.on("submit", "form.js-register", function(event) {
    event.preventDefault();
    var _form = $(this);
    var _error = $(".js-error", _form);

    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };

    if(dataObj.email.length<6) {
        _error
            .text("Vul een geldig email adres in")
            .show();
        return false 
    } else if (dataObj.password.length < 11) {
        _error
            .text("Kies een wachtwoord met meer dan 11 karakters")
            .show();
        return false
    }

    // vanaf hier Ajax processing
    _error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/register.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	}) 
    .done(function ajaxDone(data) {
        //whatever data is 
        if(data.redirect !== undefined) {
            window.location = data.redirect;
        } else if (data.error !== undefined) {
            _error
            .text(data.error)
            .show();
        }
    })
    .fail(function ajaxFailed(e){
        //this failed
    })
    .always(function ajaxAlwaysDoThis(data){
        // Always do w/e
        console.log('Always');

    })

    return false;

})