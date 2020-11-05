<?php
session_start();
require_once "pdo.php";
if (isset($_POST['uname']) && isset($_POST['emid']) && isset($_POST['rnum']) && isset($_POST['pno']) && isset($_POST['pwd']) )
{ 
    if (strlen($_POST['uname']) < 1 || strlen($_POST['emid']) < 1 || strlen($_POST['rnum']) < 1 || strlen($_POST['pno']) < 1 || strlen($_POST['pwd']) < 1)
    { 
          $_SESSION['error'] = 'All fields are required';
          header("Location: signup.php");
          return;
    }
    elseif (strpos($_POST['emid'], '@') === false)  
    {
        $_SESSION['error'] = 'Bad Email';
    }
    else
      {   $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
          $stmt = $pdo->prepare('INSERT INTO User (user_name, email_id, roll_number,phone_number, pass_word) VALUES ( :us, :em, :rn, :pn, :pd)');
          $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
          $stmt->execute(array(
                  ':us' => $_POST['uname'],
                  ':em' => $_POST['emid'],
                  ':rn' => $_POST['rnum'],
                  ':pn' => $_POST['pno'],
                  ':pd' => $_POST['pwd'],
          ));
          $_SESSION['success']= "Signed Up Successfully";
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
        <h1 class="text-center">GROUPIFY</h1>
        <a class="login-btn" href="Login.php">LOGIN</a>
</div>
<?php
    if (isset($_SESSION['error']))
      {
          echo('<p style="color: white;">' . htmlentities($_SESSION['error']) . "</p>\n");
          unset($_SESSION['error']);
      }
      if (isset($_SESSION['success']))
      {
          echo('<p style="color: white;">' . htmlentities($_SESSION['success']) . "</p>\n");
          unset($_SESSION['success']);
      }
    ?>
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
                    <input type="email" name="emid" id="emid">
                    </p>
                    <p>
                    <label>Your Roll Number:</label>
                    <input type="text" name="rnum" id="roll">
                    </p>
                    <label>Your Phone Number:</label>
                    <input type="tel" name="pno" id="po">
                    </p>
                    <p>
                    <label>Your Password:</label>
                    <input type="password" name="pwd" id="pname">
                    </p>
                    <input type="submit" value="SIGN UP">
                </form>
            </div>
    </div>
</div>
</body>
</html>