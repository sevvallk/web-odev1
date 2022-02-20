$(document).ready(function () {
    $("div[class=\"register\"] form").submit(function (event) {
        event.preventDefault();
        $.ajaxSetup({dataType : "json"});
        var post = $.post($(this).attr("action"), $(this).serialize());
        post.done(function (data) {
            console.log(data);
            if (data["error"] !== null) {
                document.getElementById('alert').innerHTML = ("<p>" + data["error"]["message"] + "</p>");
            } else {
                document.getElementById('alert').remove();
                document.getElementById('success').innerHTML = ("<p>Kayıt Olma Başarılı</p>");
            }
        });
    });
});
