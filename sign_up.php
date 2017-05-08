<?php
session_start();
require_once('user.php');
$user = new USER();

if(isset($_POST['btn-signup']))
{
  if ($_POST['upass']!=$_POST['confirmation'])
  {
    $error[]="Passwords do not match each other!";
  }
  else
  {
  $adres=$_POST['udistr']. ',' . $_POST['ustreet'];
	$umail = strip_tags($_POST['umail']);
	$upass = strip_tags($_POST['upass']);
	$uname = strip_tags($_POST['uname']);
	$umiddlename = strip_tags($_POST['umiddlename']);
	$usurname = strip_tags($_POST['usurname']);
  $uadress = strip_tags($adres);
	$uzipcode = strip_tags($_POST['uzipcode']);
	$umobnum = strip_tags($_POST['umobnum']);
	$uhomenum = strip_tags($_POST['uhomenum']);
	$ugen = strip_tags($_POST['ugen']);
	$udate = strip_tags($_POST['udate']);

		try
		{
			$stmt = $user->runQuery("SELECT emails, surname FROM patients WHERE emails=:email");
			$stmt->execute(array(':email'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			if($row['emails']==$umail) {
				$error[] = "There is already registered such email!";
			}
			else
			{
				if($user->register($uname,$umiddlename,$usurname,$uadress,$uzipcode,$umobnum,$uhomenum,$umail,$upass,$ugen,$udate)){
					$user->redirect('sign_up.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <script type="text/javascript" scr="js/sign_up.js"></script>

  <style>
    /*style*/
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.modal-content{
  margin-top: 20px;
  margin-bottom: 20px;
  padding-top: 40px;
  padding-bottom: 40px;
  padding-right: 90px;
}
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



.selectDay{
     width: 100%;
    padding-top: 5%;
    padding-bottom: 5%;
    margin-top: 3%;
    margin-bottom: 3%;
}
.selectMoth{
     width: 100%;
    padding-top: 5%;
    padding-bottom: 5%;
    margin-top: 3%;
    margin-bottom: 3%;
}
.selectYear{
     width: 100%;
    padding-top: 5%;
    padding-bottom: 5%;
    margin-top: 3%;
    margin-bottom: 3%;
}
.selectGender{
     width: 100%;
    padding-top: 5%;
    padding-bottom: 5%;
    margin-top: 3%;
    margin-bottom: 3%;
    }
    .selectDistrict {

    width: 100%;
    padding-top: 4%;
    padding-bottom: 4%;
    margin-top: 3%;
    margin-bottom: 3%;
}

.close {
    position: absolute;
    right: 25px;
    top: 100px;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 768px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
h3
{
        margin-top: 40px;
    margin-bottom: 15px;
}
Change styles for cancel button and signup button on extra small screens
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
        width: 100%;
        height: 100px;
    }
}
  </style>




</head>
<body>
 <nav class="navbar navbar-default " data-spy="affix" data-offset-top="575">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="newone.php">E-clinics.Uz</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="newone.php" >Home</a></li>
        <li><a href="newone.php" >About Us</a></li>
        <li><a href="newone.php">Contact Us</a></li>
        <li><a href="sign_up.php">Sign Up</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container-fluid">
 <form class="modal-content animate" method="post">
 <div class="container">
	 <?php
if(isset($error))
{
foreach($error as $error)
{
	?>
						<div class="alert alert-danger">
							 <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
						</div>
						<?php
}
}
else if(isset($_GET['joined']))
{
?>
				<div class="alert alert-info">
						 <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='newone.php'>login</a> here
				</div>
				<?php
}
?>
       <div class="row">
          <div class="col-md-offset-1 col-md-2"><h5>Name: </h5></div>
          <div class="col-md-3"><input type="text" placeholder="First Name" name="uname" required></div>
          <div class="col-md-3"><input type="text" placeholder="Middle Name" name="umiddlename" required></div>
          <div class="col-md-3"><input type="text" placeholder="Last Name" name="usurname" required></div>
        </div>

       <div class="row">
        <div class="col-md-offset-1 col-md-2"><h5>Address</h5></div>
            <div class="col-md-3"><select class="selectDistrict" name	="udistr">
                        <option value="District">District</option>
                        <option value="Mirzo Ulugbek">Mirzo Ulugbek</option>
                        <option value="Yunus Abad">Yunus Abad</option>
                        <option value="Yakkasaroy">Yakkasaroy</option>
                        <option value="Shaykhontokhur">Shaykhontokhur</option>
                        <option value="Yashnobod">Yashnobod</option>
                        <option value="Chilonzor">Chilonzor</option>
                        <option value="Sergeli">Sergeli</option>
												<option value="Olmazor">Olmazor</option>
												<option value="Bektemir">Bektemir</option>
												<option value="Mirobod">Mirobod</option>
												<option value="Yangiobod">Yangiobod</option>
                    </select>
            </div>
        <div class="col-md-3"><input type="text" placeholder="Street" name="ustreet" required></div>
        <div class="col-md-3"><input type="text" placeholder="Home Number" name="hnumber" required></div>
      </div>
      


        <div class="row">
          <div class="col-md-offset-1 col-md-2"><h5>Zip Code</h5></div>
          <div class="col-md-3"><input type="text" placeholder="Zip Code" name="uzipcode" required></div>
        </div>

        <div class="row">
          <div class="col-md-offset-1 col-md-2"><h5>Phone</h5></div>
          <div class="col-md-3"><input type="tel" placeholder="Mobile Phone" name="umobnum" required></div>
          <div class="col-md-3"><input type="tel" placeholder="Home Phone" name="uhomenum" required></div>
        </div>

        <div class="row">
           <div class="col-md-offset-1 col-md-2"><h5>E-mail</h5></div>
           <div class="col-md-3"><input type="text" placeholder="E-mail" name="umail" required></div>
        </div>

				        <div class="row">
				           <div class="col-md-offset-1 col-md-2"><h5>Password</h5></div>
				           <div class="col-md-3"><input type="password" placeholder="Password" name="upass" required></div>
				        </div>

								     <div class="row">
								           <div class="col-md-offset-1 col-md-2"><h5>Confirm Password</h5></div>
								           <div class="col-md-3"><input type="password" placeholder="Confirm Password" name="confirmation" required></div>
								        </div>

         <div class="row" >
           <div class="col-md-offset-1 col-md-2"><h5>Gender</h5></div>
            <div class="row" style="padding-bottom: 15px; padding-top: 5px;">
             <div class="col-md-3"><input  type="radio" name="ugen" value="male" > Male<br></div>
            <div class="col-md-3"> <input  type="radio" name="ugen" value="female"> Female<br></div>
              </div>


   </div>
	 <div class="row" style="padding-bottom: 20px; ">
		 <div class="row">
					 <div class="col-md-offset-1 col-md-2" ><h5>Date of Birth</h5></div>
					<div class="col-md-3"> <input type="date" name="udate">
				</div>
</div>
</div>

          <div class="row">
            <div class=" col-md-offset-6 col-md-3">
							<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;Sign Up
                </button>

           </div>
  </div>
    </div>
   </div>
</div>
  </div>

  </form></div>

  <script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
</body>
</html>
