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
              <a href="doctors.php">
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
  <div class="row content">
    <!--Center-->
    <div class="col-sm-9 text-left">
<form action="booking.php" method="post">
<div class="panel-group" id="accordion1">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse1" name="specialization">Cardiology
                        </a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-md-9">
                        <div class="panel-group" id="accordion2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse1_1" name="doctor">Artyom Shaidenko
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse1_1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img1.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Artyom Shaidenko</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p>In 1988 he graduated from the SM Kirov Military Medical Academy. He served in the Navy as a specialist in underwater medicine. He completed graduate studies at the Military Medical Academy, while engaged in teaching and medical work. PhD in Cardiology.  </p>
                                            </div>
                                        </div>
                                        <div class="col-md-offset-6 col-md-4">
                                       <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                      </div>
                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapse1_2" name="doctor">Andrey Prikhodko
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse1_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                      <div class="col-md-9">
                                          <div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img2.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Andrey Prikhodko</h3>
                                            </div>
                                         </div>

                                        <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p>In 1988 he graduated from the SM Kirov Military Medical Academy. He served in the Navy as a specialist in underwater medicine. He completed graduate studies at the Military Medical Academy, while engaged in teaching and medical work. PhD in Cardiology.  </p>
                                            </div>
                                        </div>
                                        <div class="col-md-offset-4 col-md-4">
                                            <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>








           <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse2" name="specialization">Dermatology
                        </a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-md-9">
                        <div class="panel-group" id="accordion3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion3" href="#collapse2_1" name="doctor">Shavkat Nourmatov
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse2_1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img3.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Shavkat Nourmatov</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p>Working at the clinic since 2003. Came to Euromed on the recommendation of fellow students from the SM Kirov Military Medical Academy after long service in the military hospital. Highly motivated towards professional-development and self-education but does not seek academic degrees. Refresher courses in MAPS. Of recent interest is development of ambulatory surgery at the clinic, and as such, plastic surgery and endoscopy.  </p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                             <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>




            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse3" name="specialization">Endokrinology
                        </a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-md-9">
                        <div class="panel-group" id="accordion4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#collapse3_1">Alla Kuznetsova
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse3_1" class="panel-collapse collapse in">
                                    <div class="panel-body"><div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img4.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Alla Kuznetsova</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p>Graduated from the Perm Medical Institute with the specialty of "Medical Treatment Business." In 1998 she finished her traineeship and then her postgraduate at SPB MAPO. In 2003 she defended her dissertation with the theme "Tactics for treatment of nodular goiter patients." In 2008 she was an Associate Professor at the I.I.Mechnikova, VG Baranova Endocrinological Institute of the North West Medical University. She has been with Euromed since 2012.  </p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                             <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#collapse3_2">Natalia Melnikova
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse3_2" class="panel-collapse collapse">
                                    <div class="panel-body"><div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img5.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Natalia Melnikova</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p>She studied at the IP Pavlov St. Petersburg State Medical University and received a diploma in 1981. Took courses in Obstetrics and Gynecology at the Hospital of Lyon in France, refresher courses in SPbGPMA, then in MMA. A great professional in her field, Dr. Melnikova is an absolute authority for patients and a leading specialist in gynecology in the city. Patients come to her from other cities and countries and visit her for years, and appointments are booked a week ahead.</p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                            <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>










           <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse4" name="specialization">Neurology
                        </a>
                    </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-md-9">
                        <div class="panel-group" id="accordion5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion5" href="#collapse4_1">Yury Yaroshenko
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse4_1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img6.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Yury Yaroshenko</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p> Born in Ukraine in Kharkiv region. He graduated from Bohodukhivsky medical school in 1989, immediately after school enrolled in MMA.After graduation he served two years as Chief Medical Officer at the Research Institute, then he enrolled in a postgraduate course at the Department of Neurology. Refresher courses in MAPS.</p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                             <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>




 <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse5" name="specialization">Ophthalmology
                        </a>
                    </h4>
                </div>
                <div id="collapse5" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-md-9">
                        <div class="panel-group" id="accordion6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion6" href="#collapse5_1">Irina Kovalevskaya
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse5_1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img7.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Irina Kovalevskaya</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p>  Graduated from Leningrad Pediatric Medical Institute in 1986, received specialization in the Regional Hospital. Conducts reception with Euromed Clinic since 2005. In addition to working in the clinic operates and teaches at the Naval Academy. Loves work, good optics and beautiful frames more than anything. Regularly participates in international ophthalmology congresses. Maintains close professional contacts with foreign and domestic colleagues. Is a recognized authority in the field of strabismus and child opthalmooncology.</p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                            <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>







<div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse6" name="specialization">Pediatrics
                        </a>
                    </h4>
                </div>
                <div id="collapse6" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-md-9">
                        <div class="panel-group" id="accordion7">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion7" href="#collapse6_1">Tatyana Maksimova
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse6_1" class="panel-collapse collapse in">
                                    <div class="panel-body"><div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img8.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Tatyana Maksimova</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p>Graduated from Leningrad Pediatric Medical Institute in 1993. During the many years of postgraduate education and clinical practice on the basis of multi-city consultative diagnostic center gained experience in caring for children with different pathologies: somatic, Allergic, gastroenterology and nephrology. Worked at the Scandinavia Clinic and Euromed Kids.  </p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                             <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion7" href="#collapse6_2">Irina Khachaturova
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse6_2" class="panel-collapse collapse">
                                    <div class="panel-body"><div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img9.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Irina Khachaturova</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p> Graduated Stavropol Medical Institute in 1982. Residency in MAPS SPB in the specialty of pediatric surgery. From 1991 to 2011 was head of the ultrasound department at the KA Rauhfusa hospital. Received the title of "Otlichnik Zdravoohranenie" (High achiever of Public Health Service) in 2007. Fully versed in all modern methods of ultrasound diagnosis of child and adulthood. Author of several articles on thyroid, eye and cardiovascular ultrasound research.</p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                             <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion7" href="#collapse6_3">Marina Chitalova
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse6_3" class="panel-collapse collapse">
                                    <div class="panel-body"><div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img10.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Marina Chitalova</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p> High professionalism at work is the main thing for Doctor Chitalova. She is an excellent specialist physician with extensive experience. Worked in SRI Phthisiopneumology at the office of treatment of pulmonary tuberculosis from 1985 as a radiologist. Additionally took refresher courses in "Radiology" and "Computed tomography" at the Department of Radiology at the WMA, as well as a refresher course in "Radiology" at the Department of Radiology at MAPS.</p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                             <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion7" href="#collapse6_4">Natalia Melnikova
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse6_4" class="panel-collapse collapse">
                                    <div class="panel-body"><div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img11.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Natalia Melnikova</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p>She studied at the IP Pavlov St. Petersburg State Medical University and received a diploma in 1981. Took courses in Obstetrics and Gynecology at the Hospital of Lyon in France, refresher courses in SPbGPMA, then in MMA. A great professional in her field, Dr. Melnikova is an absolute authority for patients and a leading specialist in gynecology in the city. Patients come to her from other cities and countries and visit her for years, and appointments are booked a week ahead.</p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                             <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                      </div>
                    </div>
                </div>
            </div>






            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse7" name="specialization">Pulmonary
                        </a>
                    </h4>
                </div>
                <div id="collapse7" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-md-9">
                        <div class="panel-group" id="accordion8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion8" href="#collapse7_1">Arthur Arutunov
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse7_1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img11.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Arthur Arutunov</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p> A graduate of the SM Kirov. Military Medical Academy. Also in VMA he was an intern and resident in "Surgery". He worked as chief resident of the surgical department of the military hospital. Has passed training courses in "Phlebology" in MAPS. Practiced in diagnosis and treatment of diseases of the venous system and methods of postoperative rehabilitation. </p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                            <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>





<div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse8" name="specialization">Rheumatology
                        </a>
                    </h4>
                </div>
                <div id="collapse8" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-md-9">
                        <div class="panel-group" id="accordion9">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion9" href="#collapse8_1">Anna Bykova
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse8_1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img12.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Anna Bykova</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p>  Graduated with honors from St. Petersburg State Medical Academy. II Mechnikov in medicine. Gained a specialization in obstetrics and gynecology with clinical residency and postgraduate at the medical faculty of St. Petersburg State University and the best medical institutions in St. Petersburg. </p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                             <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>



<div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse9" name="specialization">Stoumatology
                        </a>
                    </h4>
                </div>
                <div id="collapse9" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-md-9">
                        <div class="panel-group" id="accordion10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion7" href="#collapse9_1">Yulia Dmitrieva
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse9_1" class="panel-collapse collapse in">
                                    <div class="panel-body"><div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img13.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Yulia Dmitrieva</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p>She graduated from the Pavlov Medical Academy, and later from the Graduate School of Management in "Management in Health Care." Over the past ten years has been a permanent participant of the Russian-Japanese symposia devoted to endoscopy, St. Petersburg and Moscow Gastroforuma Gastronedeli. Is an active member of the Russian Endoscopy Society and the St. Petersburg. Endoscopy Society. Professionally practiced in various methods of diagnostic and therapeutic endoscopy.  </p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                             <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion10" href="#collapse9_2">Nikolay Shatokhin
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse9_2" class="panel-collapse collapse">
                                    <div class="panel-body"><div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img14.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Nikolay Shatokhin</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p> He graduated with honors from IP Pavlova St. Petersburg State Medical University, had internship and clinical residency in Stoumatology at the Department of the University.Trained in the United States. </p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                             <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                              <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion10" href="#collapse9_3">Irina Porembskaya
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse9_3" class="panel-collapse collapse">
                                    <div class="panel-body"><div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img15.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Irina Porembskaya</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p> Born in Baku, but spent her life in beloved Leningrad. She graduated from the Pavlov Medical Academy and devoted herself to surgery. For more than twenty years she practiced in the clinic of Cardiovascular Surgery at the Military Medical Academy. </p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                            <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>





<div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapse10" name="specialization">Traumatology
                        </a>
                    </h4>
                </div>
                <div id="collapse10" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="col-md-9">
                        <div class="panel-group" id="accordion11">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion11" href="#collapse10_1">Marina Chitalova
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse10_1" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-offset-1 col-md-3">
                                                <img style="width: 100px; height: 100px;" src="img/img16.png">
                                            </div>
                                            <div class="col-md-offset-1 col-md-4 text-center">
                                              <h3>Marina Chitalova</h3>
                                            </div>
                                         </div>

                                         <div class="row">
                                            <div class="col-md-offset-1 col-md-10">
                                              <p>   High professionalism at work is the main thing for Doctor Chitalova. She is an excellent specialist physician with extensive experience. Worked in SRI Phthisiopneumology at the office of treatment of pulmonary tuberculosis from 1985 as a radiologist. Additionally took refresher courses in "Radiology" and "Computed tomography" at the Department of Radiology at the WMA, as well as a refresher course in "Radiology" at the Department of Radiology at MAPS.</p>
                                            </div>
                                        </div>
                                      <div class="col-md-offset-4 col-md-4">
                                              <button class="btn btn-default"><a href="booking.php">Book</a></button>
                                         </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>



<footer class="container-fluid text-center">
   <p>Copyright <span>&copy</span> 2017</a></p>
</footer>

</body>
</html>
