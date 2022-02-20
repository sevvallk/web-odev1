<?php

   session_start();
   unset($_SESSION["user"]);
   unset($_SESSION["e-mail"]);

   echo 'Logging Out, Please Wait';
   header('Refresh: 1; URL = giris.php');
?>
