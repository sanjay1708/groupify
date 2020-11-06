<?php
session_start();
require_once "pdo.php";
// checking login
        if (!isset($_SESSION["roll_number"])) {
		header("Location: login.php");
        }
$stmt1 = $pdo->query("SELECT user_name, email_id,roll_number from user");
$rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
if(isset($_POST['submit']))
{    
        //sql statements

$stmt2 = $pdo->prepare('INSERT INTO team (team_name, leader_name, max_users, current_uses, domain, member1, member2, member3,member4) VALUES (:tn, :ln, :mu, :cu, :dm, :m1,:m2,:m3,:m4)');
$stmt2->execute(array(
    
    ':tn' => $_POST['team_name'],
    ':ln' => $_POST['leader_name'],
    ':mu' => $_POST['max_users'],
    ':cu' => $_POST['current_uses'],
    ':dm' => $_POST['domain'],
    ':m1' => $_POST['member1'],
    ':m2' => $_POST['member2'],
    ':m3' => $_POST['member3'],
    ':m4' => $_POST['member4'],)
);
header("Location:home.php");
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
  <style>

    .text
    {
        left padding:3px;
    }
    .anewerfrm
    {
        border: solid black 1px;
        border-radius: 5px;
        margin: 100px auto;
        background: #f9f9ff;
        padding: 8px;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #efeff6;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h1>Members Available</h1>
       
      <table style="width:100%">
                                                   <?php
                                                        foreach ($rows1 as $row1) {
                                                            echo "<tr><td>";
                                                            echo( $row1['user_name'] );
                                                            echo "</td>";

                                                            echo "<td>";
                                                            echo( $row1['email_id'] );
                                                            echo "</td>";

                                                            echo "<td>";
                                                            echo( $row1['roll_number'] );
                                                            echo "</td>";

							                            }

                                                    ?>
        </table>
    
    </div>

    <div class="col-sm-9">
      <h4><small>CREATE GROUP</small></h4>
      <hr>
      <h2>Enter the following credentials</h2>
         <form action="" method="POST">
                        <label><h3>Team Name</label>
                        <input type="text" name="team_name" id="team_name">
			</br>
                        <label><h3>Team Leader Name </label>
                        <input type="text" name="leader_name" id="member1_name" size=21px>
                        </br>

			<label><h3>Maximum Users</label>
                        <input type="text" name="max_users" id="member1_name" size=21px>
                        </br>

			<label><h3>Current number of users</label>
                        <input type="text" name="current_uses" id="member1_name" size=21px>
                        </br>

			<label><h3>Domain</label>
                        <input type="text" name="domain" id="member1_name" size=21px>
                        </br>
                        
                   
                    
                        <label><h3>Member 1 Name</label>
                        <input type="text" name="member1" id="member1_name" size=21px>
                        </br>
                        
                    
                    
                   
                        <label><h3>Member 2 Name</label>
                        <input type="text" name="member2" id="member2_name" size=21px>
                        </br>
                        
                   

                  
                        <label><h3>Member 3 Name</label>
                        <input class="text" type="text" name="member3" id="member3_name" size=21px>
                        </br>
                        
                 

                   
                        <label><h3>Member 4 Name</label>
                        <input class="text" type="text" name="member4" id="member4_name" size=21px>
                        </br>
                   
                    
                        <input type="submit" name="submit" value="Add Team">
                      
        </form>

      
    </div>
  </div>
</div>
<footer class="container-fluid">
</footer>


</body>
</html>