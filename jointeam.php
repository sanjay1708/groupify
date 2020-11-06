<?php
    session_start();
    require_once "pdo.php";
    // checking login
    if (!isset($_SESSION["roll_number"])) {
		header("Location: login.php");
        }
     if (isset($_GET["team_id"])) {
          $_SESSION['temp']=$_GET["team_id"];
         }

        $stmt = $pdo->prepare('SELECT member1, member2, member3, member4 FROM team WHERE team_id = :rn');
        $stmt->execute(array(':rn' => $_SESSION['temp']));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (strlen($row['member1'])>1 && strlen($row['member2'])>1 && strlen($row['member3'])>1 && strlen($row['member4'])>1)        
	    {
            $_SESSION['error'] = 'Team is Full';
            header("Location:home.php");
            return;
        }
 
        if(strlen($row['member1'])<1)
        {
            $flag=1;
        }elseif(strlen($row['member2'])<1)
        {
            $flag=2;
        }elseif(strlen($row['member3'])<1)
        {
            $flag=3;
        }elseif(strlen($row['member4'])<1)
        {
            $flag=4;
        }
       if (isset($_POST['member_name'])){
	        if($flag==1){
           	 $stmt1 = $pdo->prepare('UPDATE team SET member1 = :ps WHERE team_id = :rn');
            	$stmt1->execute(array(':ps' => $_POST['member_name'],
                                  	':rn' => $_SESSION['temp']
           	));
                               unset($_SESSION['temp']);
                               $_SESSION['success']= "Joined the Team";
           	}
       		if($flag==2){ 
            	$stmt1 = $pdo->prepare('UPDATE team SET member2 = :ps WHERE team_id = :rn');
            	$stmt1->execute(array(':ps' => $_POST['member_name'],
                                  	':rn' => $_SESSION['temp']
           	));
                                unset($_SESSION['temp']);
                                $_SESSION['success']= "Joined the Team";
           	}
        	if($flag==3){
            	$stmt1 = $pdo->prepare('UPDATE team SET member3 = :ps WHERE team_id = :rn');
            	$stmt1->execute(array(':ps' => $_POST['member_name'],
                                  	':rn' => $_SESSION['temp']
           	));
                                unset($_SESSION['temp']);
                                $_SESSION['success']= "Joined the Team";
           	}
        	if($flag==4){
            	$stmt1 = $pdo->prepare('UPDATE team SET member4 = :ps WHERE team_id = :rn');
            	$stmt1->execute(array(':ps' => $_POST['member_name'],
                                  	':rn' => $_SESSION['temp']
           	));
                                unset($_SESSION['temp']);
                                $_SESSION['success']= "Joined the Team";
                }
                
           }


         

              
         	
                
           

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if (isset($_SESSION['success']))
      {
          echo('<p style="color: red;">' . htmlentities($_SESSION['success']) . "</p>\n");
          unset($_SESSION['success']);
      }
?>
    <div class="col-sm-9">
      <h4><small>JOIN TEAM</small></h4>
      <hr>


      <form method="POST" action="jointeam.php">
                        <label><h3>Enter Your Name</label>
                        <input type="text" name="member_name" id="member_name">
                        <input type="submit" value="submit">
                        <a href="home.php" class="button">Back</a>          
                        </h3>
        </form>
        
       

      
    </div>
  </div>
</div>
</body>
</html>