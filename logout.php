<?php

session_start();

unset($_SESSION['user_email']);
unset($_SESSION['user_adhaar']);

session_destroy();

header("location:index.php");

?>