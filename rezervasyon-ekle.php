<?php

session_start();

include("config.php");

$userID = $_SESSION["user"];

$seyehatID = $_GET["seyehatID"];

$result = mysqli_query($open, "INSERT INTO `rezervasyon` (`userID`, `seyehatID`) VALUES ('".$userID."', '".$seyehatID."') ");
if ($result == FALSE) {
    exit(json_encode(["result" => NULL, "error" => ["code" => NULL, "message" => "An error occurred while inserting data to database"]]));
}

header("Location: index.php");



?>
