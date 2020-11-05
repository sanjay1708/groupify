<?php
require_once "pdo.php";
?>

<html>
<head>
<title>GROUPIFY</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="card-header">
        <h1 class="text-center">GROUPIFY</h1>
        <a class="login-btn" href="Login.php">LOGIN</a>
</div>

<div class="newfrm">    
    <div id="container">
        <div class="card-header"><h3 class="text-center">SIGN UP</h3></div>
            <div class="card-body" >
                <form action=" " method="POST">
                    <p>
                    <label>Your Username:</label>
                    <input type="text" name="uname" id="uname">
                    </p>
                    <p>
                    <label>Your Email-id:</label>
                    <input type="text" name="emid" id="emid">
                    </p>
                    <p>
                    <label>Your Phone Number:</label>
                    <input type="number" name="pno" id="po">
                    </p>
                    <p>
                    <label>Your Password:</label>
                    <input type="password" name="pname" id="pname">
                    </p>
                    <a class="btn" href="Process.php">SIGN UP</a>
                </form>
            </div>
    </div>
</div>
</body>
</html>
