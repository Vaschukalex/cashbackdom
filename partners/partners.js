$(document).ready(function () {
    $("form").submit(function () {
        var th = $(this);
        $.ajax({
            type: "POST",
            url: "partners/mail.php",
            data: th.serialize()
        }).done(function () {
            toastr.info('Спасибо за заявку! Мы свяжемся с вами в течение суток')
        });
        return false;
    });
});