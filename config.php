<?php

$open = mysqli_connect("127.0.0.1", "root", "", "blabla", 3306);
if ($open == FALSE) {
    exit(json_encode(["result" => NULL, "error" => ["code" => NULL, "message" => "An error occurred while starting new or resuming existing session."]]));
}

?>
