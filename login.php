<?php
sessionstart();
require_once "pdo.php"

if (isset($_POST['cancel'])){
    //Redirect to index page
    header("Location:index.php");
    return;
}

if (isset($_POST['user_name']) && isset($_POST['pass_word'])) {

    $isPasswordCorrect = password_verify($_POST['password'], $existingHashFromDb);

    $stmt = $pdo->prepare('SELECT roll_number, user_name, pass_word FROM user WHERE roll_number = :rn');
    $stmt->execute(array(':rn' => $_POST['roll_number']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $flag = password_verify($_POST['pass_word'], $row['password']);
    if ($row !== false) && ($flag !== false){

        $_SESSION['name'] = $row['user_name'];
    
        $_SESSION['roll_number'] = $row['roll_number'];
    }
    header("Location: home.php");
    return;

}

$flag = password_verify ( $_POST['pass_word'] ,  );



if ($row !== false) {

    $_SESSION['name'] = $row['user_name'];

    $_SESSION['roll_number'] = $row['roll_number'];

?>

$flag = password_verify ( string $password , string $hash )



<html>
<head>
<title>GROUPIFY</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="card-header">
        <h1 class="text-center">GROUPIFY</h1>
        <a class="signup-btn" href="Signup.php">SIGN UP</a>
    </div>

<div class="newfrm">    
    <div id="container">
        <div class="card-header"><h3 class="text-center">LOGIN</h3></div>
            <div class="card-body" >
                <form action=" " method="POST">
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
