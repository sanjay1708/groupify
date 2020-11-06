<?php
session_start();
require_once "pdo.php";

if (isset($_POST['cancel'])){
    //Redirect to index page
    header("Location:index.html");
    return;
}

if (isset($_POST['roll_number']) && isset($_POST['pass_word'])) {
    
    $stmt = $pdo->prepare('SELECT roll_number, user_name, pass_word FROM user WHERE roll_number = :rn');
    $stmt->execute(array(':rn' => $_POST['roll_number']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //password verification
    $flag = password_verify($_POST['pass_word'], $row['pass_word']);
    

    if (($row !== false) && ($flag !== false)){
        

        $_SESSION['name'] = $row['user_name'];
        $_SESSION['roll_number'] = $row['roll_number'];
        header("Location:home.php");
        return;
}

}

?>




<html>
<head>
<title>GROUPIFY</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="card-header">
        <h1 class="text-center"><a href="index.html">GROUPIFY</a></h1>
        <a class="signup-btn" href="Signup.php">SIGN UP</a>
    </div>

<div class="newfrm">    
    <div id="container">
        <div class="card-header"><h3 class="text-center">LOGIN</h3></div>
            <div class="card-body" >
                <form action="login.php" method="POST">
                    <p>
                    <label>Roll Number:</label>
                    <input type="text" name="roll_number" id="uname">
                    </p>
                    <p>
                    <label>Password:</label>
                    <input type="password" name="pass_word" id="roll">
                    </p>
                    <input type="submit" value="Log In">
                    <input type="submit" name="cancel" value="Cancel"> 
                </form>
            </div>
    </div>
</div>
</body>
</html>


