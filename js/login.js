$(document).ready(function () {
    $("div[class=\"login\"] form").submit(function (event) {
        event.preventDefault();
        $.ajaxSetup({dataType : "json"});
        var post = $.post($(this).attr("action"), $(this).serialize());
        post.done(function (data) {
            console.log(data);
            if (data["error"] !== null) {
                document.getElementById('lgnAlert').innerHTML = ("<p>" + data["error"]["message"] + "</p>");
            }else{
                window.location.href = "../web_odev/index.php";
            }
        });
    });
});
