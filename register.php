<?php
    require 'config.php';

    if (session_start() === false) {
        exit(json_encode(["result" => null, "error" => ["code" => null, "message" => "An error occurred while starting new or resuming existing session."]]));
    }

    $result = mysqli_query($open, "SELECT `id` FROM `users` WHERE `e-mail` = '".$_POST["e-mail"]."'");
    if ($result === false) {
        exit(json_encode(["result" => null, "error" => ["code" => null, "message" => "An error occurred while performing a query on the database."]]));
    }

    $n = mysqli_affected_rows($open);
    if ($n !== 0) {
        exit(json_encode(["result" => null, "error" => ["code" => null, "message" => "Bu e-posta adresi zaten kullanılıyor"]]));
    }

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["e-mail"];
    $tel = $_POST["tel"];
    


    $result = mysqli_query($open, "INSERT INTO `users` (`name`, `surname`,`e-mail`, `password`, `tel`) VALUES ('".$name."', '".$surname."','".$email."', '".password_hash($_POST["password"], PASSWORD_DEFAULT)."', '".$tel."')");
    if ($result == false) {
        exit(json_encode(["result" => null, "error" => ["code" => null, "message" => "insert error"]]));
    }


     echo json_encode(["result" => true, "error" => null]);
 ?>
