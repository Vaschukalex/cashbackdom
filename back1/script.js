$(document).ready(function() {

    $("form").submit(function() {
        var th = $(this);
        $.ajax({
            type: "POST",
            url: "../back1/mail.php",
            data: th.serialize()
        }).done(function() {
            alert("Спасибо! Мы обработаем ваши данные");
            setTimeout(function() {
                th.trigger("reset");
            }, 1000);
        });
        return false;
    });

});