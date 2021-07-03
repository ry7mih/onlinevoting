<?php

session_start();

unset($_SESSION['admin_name']);
unset($_SESSION['admin_password']);
unset($_SESSION['admin_ss']);

session_destroy();

header("location:adminverification.php");

?>