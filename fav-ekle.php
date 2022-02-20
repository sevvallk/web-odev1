<?php
session_start();

include("config.php");

$seyehatID = $_GET["id"];
$userID = $_SESSION["user"];

$result = mysqli_query($open, "INSERT INTO `favoriler` (`userID`, `seyehatID`) VALUES ('".$userID."', '".$seyehatID."') ");
if ($result == FALSE) {
    exit(json_encode(["result" => NULL, "error" => ["code" => NULL, "message" => "Database bağlantı sağlanamadı"]]));
}

header("Location: index.php");
?>
