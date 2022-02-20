<?php

session_start();

include("config.php");

$userID = $_SESSION["user"];
$seyehatID = $_GET["seyehatID"];

$result = mysqli_query($open, "SELECT `seyehatID` FROM `star` WHERE `userID` = '".$userID."'");
if ($result == FALSE) {
    exit(json_encode(["result" => NULL, "error" => ["code" => NULL, "message" => "An error occurred while selecting data on database"]]));
}

/*$n = mysqli_affected_rows($open);
if ($n !== 0) {    
    header("Location: index.php");
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <title>Puanlama</title>
    <link rel="stylesheet" href="./style_puan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>
<body>
    <div class="container">
        <form action="" method="POST">
        <div class="star-widget">
            <input type="radio" name="rate" id="rate-5" value="5">
            <label for="rate-5" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-4" value="4">
            <label for="rate-4" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-3" value="3">
            <label for="rate-3" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-2" value="2">
            <label for="rate-2" class="fas fa-star"></label>
            <input type="radio" name="rate" id="rate-1" value="1">
            <label for="rate-1" class="fas fa-star"></label>
           
        </div>
        <div>
             <br>
            <br>
            <input type="submit" name="puanla" value="puanla">
        </div>
     
    </div>
</body>
</html>
<?php 

if(isset($_POST["puanla"])){
    $rate = $_POST["rate"];
    $userID = $_SESSION["user"];
    $seyehatID = $_GET["seyehatID"];

    $result = mysqli_query($open, "INSERT INTO `star` (`userID`, `seyehatID`,`star`) VALUES ('".$userID."', '".$seyehatID."','".$rate."')");
    if ($result == false) {
        exit(json_encode(["result" => null, "error" => ["code" => null, "message" => "insert error"]]));
    }
    echo json_encode(["result" => true, "error" => null]);
    header("Location: index.php");
}



?>


