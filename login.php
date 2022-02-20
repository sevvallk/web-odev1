<?php
    require 'config.php';

    if (session_start() === false) {
        exit(json_encode(["result" => null, "error" => ["code" => null, "message" => "An error occurred while selecting data on database."]]));
    }

    $email = $_POST["lgnMail"];
    $password = $_POST["lgnPassword"];

    $result = mysqli_query($open, "SELECT  `id`, `e-mail`, `password` FROM `users` WHERE `e-mail` = '".$email."'" );
    if ($result === false) {
        exit(json_encode(["result" => null, "error" => ["code" => null, "message" => "An error occurred while selecting data on database."]]));
    }

    $accountInfo = mysqli_fetch_array($result);
  

    if (password_verify($_POST["lgnPassword"], $accountInfo["password"]) === false) {
        exit(json_encode(["result" => null, "error"=> ["code" => null, "message" => "Wrong Password !."]]));
    }

    $_SESSION["user"] = $accountInfo["id"];
    $_SESSION["e-mail"] = $email;

    echo json_encode(["result" => true, "error" => null]);

 ?>
