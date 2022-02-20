<?php
require 'config.php';

if (session_start() === false) {
    exit(json_encode(["result" => null, "error" => ["code" => null, "message" => "An error occurred while starting new or resuming existing session."]]));
}

$userID = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme</title>
    <link rel="stylesheet" href="./style_odeme.css">
</head>
<body>
    <div class="container">
    <form action="" method="POST">
        <h1>Ödeme Sayfası</h1>
        <div class="first-row">
            <div class="owner">
                <h3>Kart sahibi:</h3>
                <div class="input-field">
                    <input type="text" name="name">
                </div>
            </div>
            <div class="cards">
                <img src="./img/vi.png" alt="">
                <img src="./img/mc.png" alt="">
                <img src="./img/pp.png" alt="">
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Card Number</h3>
                <div class="input-field">
                    <input type="text" name="card_no">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Card Number</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                      <select name="years" id="years">
                        <option value="2027">2027</option>
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                      </select>
                </div>
                    <div class="cvv">
                        <h3>CVV</h3>
                        <div class="input-field">
                            <input type="password" name="cvv">
                        </div>
                    </div>
                </div>    
        </div>
        <input style="padding: 15px 32px; font-size: 16px;" type="submit" name="onayla" value="onayla">
    </div>
    
</body>
</html>

<?php 
if(isset($_POST["onayla"])){

    $name = $_POST["name"];
    $card_no = $_POST["card_no"];
    $months = $_POST["months"];
    $years = $_POST["years"];
    $cvv = $_POST["cvv"];

    $result = mysqli_query($open, "INSERT INTO `odeme` (`name`, `card_no`,`months`, `years`, `cvv`) VALUES ('".$name."', '".password_hash($_POST["card_no"], PASSWORD_DEFAULT)."', '".$months."', '".$years."', '".password_hash($_POST["cvv"], PASSWORD_DEFAULT)."')");
    if ($result == false) {
        exit(json_encode(["result" => null, "error" => ["code" => null, "message" => "insert error"]]));
    }

    echo json_encode(["result" => true, "error" => null]);
    header("Location: index.php");
}
?>
