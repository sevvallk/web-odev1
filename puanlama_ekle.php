<?php

session_start();

include("config.php");

$userID = $_SESSION["user"];
$seyehatID = $_GET["seyehatID"];
$rate = $_POST["rate"];


$result = mysqli_query($open, "INSERT INTO `star` (`userID`, `seyehatID`,`star`) VALUES ('".$userID."', '".$seyehatID."','".$rate."')");
if ($result == false) {
    exit(json_encode(["result" => null, "error" => ["code" => null, "message" => "insert error"]]));
}

echo json_encode(["result" => true, "error" => null]);

?>
