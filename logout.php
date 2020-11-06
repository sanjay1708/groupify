<?php // line 1 added to enable color highlight

session_start();
unset($_SESSION['roll_number']);
unset($_SESSION['user_name']);
header('Location: index.php');