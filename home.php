<?php
session_start();
require_once "pdo.php";
// checking login
        if (!isset($_SESSION["roll_number"])) {
		header("Location: login.php");
        }
$stmt = $pdo->query("SELECT team_id,team_name,leader_name,max_users,current_uses,domain from team");
$stmt1 = $pdo->query("SELECT user_name, email_id,roll_number from user");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>HOME</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Groupify</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                            </ul>
                            <td colspan="9"><a href="logout.php" class="btn btn-outline-light float-right">Logout</a></td>
                    </ul>
                </div>
            </nav>
        </div>
        
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Dashboard </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                 

                                          <!-- Team Table  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Teams Available</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Team Id</th>
                                                        <th class="border-0">Team Name</th>
                                                        <th class="border-0">Leader Name</th>
                                                        <th class="border-0">Maximum Members</th>
                                                        <th class="border-0">Current Members</th>
                                                        <th class="border-0">Domain</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <?php
                                                        foreach ($rows as $row) {
                                                            echo "<tr><td>";
                                                            echo( $row['team_id'] );
                                                            echo "</td>";
 
                                                            echo "<td>";
                                                            echo( $row['team_name'] );
                                                            echo "</td>";

                                                            echo "<td>";
                                                            echo( $row['leader_name'] );
                                                            echo "</td>";

                                                            echo "<td>";
                                                            echo( $row['max_users'] );
                                                            echo "</td>";

                                                            echo "<td>";
                                                            echo( $row['current_uses'] );
                                                            echo "</td>";

                                                            echo "<td>";
                                                            echo( $row['domain'] );
                                                            echo "</td>";
                                                            echo "</tr>";
							                            }

                                                    ?>

                                                    <tr>
                                                        <td colspan="9"><a href="jointeam.php" class="btn btn-outline-light float-right">Join a Team</a> <a href="createteam.php" class="btn btn-outline-light float-right">Create New Team</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <!-- ============================================================== -->
                                <!-- top perfomimg  -->
                                <!-- ============================================================== -->
                                <div class="card">
                                    <h5 class="card-header">Members Available</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table no-wrap p-table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Name</th>
                                                        <th class="border-0">Email</th>
                                                        <th class="border-0">Roll Number</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                     
                            </div>
                        </div>

                        <div class="row">
     
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Groupify is a teaming and collaboration platforrm.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="aboutus.html">About Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>