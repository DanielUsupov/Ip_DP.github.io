<?php

	require_once("../session.php");

	require_once("../user.php");
	$entr_user = new USER();


	$user_id = $_SESSION['user_session'];

	$stmt = $entr_user->runQuery("SELECT * FROM patients WHERE id=:uid");
	$stmt->execute(array(":uid"=>$user_id));

	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>welcome - <?php print($userRow['emails']); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>


.navbar {
      margin-bottom: 0;
      background-color: #00a1cb;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
      box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #1a237e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }



  body{
    margin-top: 100px;
  }

  .profile-sidebar{
    height: 1000px;
  }
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}

    .row{
      margin-top: 20px;
    }

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    .img-responsive{
      height: 150px;
      width: 150px;
      margin-left: 100px;
    }
    .col-sm-9{
      margin-top: 5px;
    }
    .col-sm-4{
      margin-top: 75px;
      text-decoration: none;
    }
    /* Set black background color, white text and some padding */
    footer {
      background-color: #00bfff;
      padding: 75px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
    .row.content {height: 850px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    .button:hover{
background-color: #42A5F5;

    }

  </style>
</head>
<body>

<div class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Stat Toggle Nav Link For Mobiles -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- End Toggle Nav Link For Mobiles -->
                        <a class="navbar-brand" href="home.php"><?php echo $userRow['first_name']." ". $userRow['middle_name']; ?></a>
                    </div>
                    <div class="navbar-collapse collapse">

                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="../logout.php?logout=true">Log out</a>
                            </li>

                        </ul>
                        <!-- End Navigation List -->
                    </div>
                </div>
            </div>


 <!--Left bar-->

<div>
<div class="col-md-3">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->

        <!-- END SIDEBAR USER TITLE -->

        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav">
          <li class="active">
              <a href="home.php">
              <i class="glyphicon glyphicon-home"></i>
              Home </a>
            </li>
            <li class="active">
              <a href="med_history.php">
              <i class="glyphicon glyphicon-list-alt"></i>
              Medical History </a>
            </li>
            <li class="active">
              <a href="doctors.php" target="_blank">
              <i class="glyphicon glyphicon-user"></i>
              Doctors</a>
            </li>
            <li class="active">
              <a href="services.php">
              <i class="glyphicon glyphicon-wrench"></i>
              Services </a>
            </li>

            <li class="active">
              <a href="results.php">
              <i class="glyphicon glyphicon-tasks"></i>
              Results </a>
            </li>
          </ul>
        </div>
        </div>
</div>

<div class="container-fluid">
   <h2>Blood tests</h2>
   <div class="col-sm-9 text-left">
   <div class="row">
   <div class="col-sm-5"><img src="8.jpg" class="img-circle" alt="Cinque Terre" width="250" height="250"></div>
 <div class="col-sm-7">
 <h4>General (clinical) blood test<br>
General (clinical) blood test deployed<br>
Evaluation of hematocrit<br>
Study of the level of reticulocytes in the blood<br>
Sugar of capillary blood<br>
Investigation of the coagulation time of unstabilized blood <br>
Study of bleeding time<br>
Research on plasmodium malaria<br>
The study of osmotic resistance of erythrocytes<br>
Blood oxygen level study</h4><br>
</div>
</div>

<h2>Services</h2>
<div class="row">
<div class="col-sm-4 text-center">
  <h3>Ultrasound diagnostic</h3>
    <img src="5.1.jpg" class="img-circle" alt="Cinque Terre" width="150" height="150">
</div>
<div class="col-sm-4 text-center">
  <h3>Electrocardiogram</h3>
    <img src="6.jpg" class="img-circle" alt="Cinque Terre" width="150" height="150">
</div>
<div class="col-sm-4 text-center">
  <h3>Vaccinations</h3>
    <img src="7.jpg" class="img-circle" alt="Cinque Terre" width="150" height="150">
</div>
</div>


 </div>

</div>

<footer class="container-fluid text-center">
  <p>Copyright <span>&copy</span> 2017</a></p>
</footer>

</body>
</html>
