<!-- logout.php is a file to log the user out -->

<?php
 session_start();
 session_destroy();
 header("Location: ../html/login.html");
 exit();
 ?>
