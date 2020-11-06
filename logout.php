<?php 

session_start();
unset($_SESSION['roll_number']);
unset($_SESSION['user_name']);
header('Location: login.php');