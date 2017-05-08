<?php
session_start();
require_once("user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('user/home.php');
}
if(isset($_POST['btn-login']))
{
	$umail = strip_tags($_POST['umail']);
	$upass = strip_tags($_POST['upass']);

	if($login->doLogin($umail,$upass))
	{
		$login->redirect('user/home.php');
	}
	else
	{
		$error = "Wrong E-mail or Password";
	}
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>E-clinics.Uz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="newone.css" type="text/css" rel="stylesheet"/>
  <style>

  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


<div class="parallax">
<div class="jumbotron text-center">
  <h1>Welcome to E-clinics.Uz</h1>

          <form method="post">
           <div class="row">
						 <?php
if(isset($error))
{
?>
				<div class="alert alert-danger">
					 <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
				</div>
				<?php
}
?>
            <div class="col-md-offset-4 col-md-4 ">
              <input type="email" class="form-control"  placeholder="email" name = "umail"required>
            </div>
            </div>

              <div class="row">
                   <div class="col-md-offset-4 col-md-4">
                      <input type="password" class="form-control"  placeholder="password" name = "upass"required>
                      </div>
                      </div>

                      <div class="row">
                          <div class="col-md-offset-4 col-md-4">
														<button type="submit" name="btn-login" class="btn btn-default"> Sign In
					</button>
                          </div>
                       </div>
              </form>
       </div>


</div>
  <nav class="navbar navbar-default " data-spy="affix" data-offset-top="575">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#myPage">E-clinics.Uz</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><a href="sign_up.php">Sign Up</a></li>
      </ul>
    </div>
  </div>
</nav>

</div>



<!-- Container (About Section) -->
<div id="home" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>Health is the most important thing in our life</h2><br>
      <h4>Health is a significant asset in a person's life. However, unlike tangible assets, real estate, shares in companies, securities and money; Health has no direct capitalization or price. It cannot be bought or sold. Nevertheless, as a tangible asset, health can and should be managed.</h4><br>
      <p>Being healthy means eating right and exercising. To keep a healthy balance diet a person should try to eat daily at least a portion of the six major food groups, and exercise at least three times a week to keep the body fit and reduce the chances of poor health. A wholesome diet and lifestyle can help a person live a long healthy life.</p>

    </div>
    <div class="col-sm-4">
      <img src="4.jpg" class="img-circle" alt="Cinque Terre" style="width: 400px; height: 400px;">
    </div>
  </div>
</div>

<div id="about" class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-5">
     <img src="3.1.jpg" class="img-circle" alt="Cinque Terre" style="width: 400px; height: 400px;">
    </div>
    <div class="col-sm-7">
      <h2>About Us</h2><br>
      <h4>One of the steps towards healthy living is regulary make appointments with your doctors. And here we are to make it<strong> easy, fast </strong> and <strong>comfortable.</strong></h4><br>
      <p>Our patients are our neighbors and we are dedicated to their, and our, optimal health and well-being. We are guided by our faith-based heritage, a call to healing that respects the dignity and culture of every person. We empower our patients with user-friendly access to their health information, dependable service, and affordable, high-quality care.
      <strong>Mission: </strong>We are focuced on optimal health and well-being for our patientsand our communities.</p>
    </div>
  </div>


<!-- Container (Services Section) -->
<div class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-calendar logo-small"></span>
      <h4>ONLINE BOOKING</h4>
      <p>You can book order online, which is easy and fast</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-user logo-small"></span>
      <h4>DOCTORS</h4>
      <p>Now You can get information about doctors and their schadules, not going out of your home</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4>SERVICES</h4>
      <p>Now Medical History in electronic version</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-folder-open logo-small"></span>
      <h4>RESULTS </h4>
      <p>You can get your results of analyses online</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-book logo-small"></span>
      <h4>MEDICAL HISTORY</h4>
      <p>In Medical History will be collected medication of your doctors and all your results and analyse answers </p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-thumbs-up logo-small"></span>
      <h4 style="color:#303030;">HELP </h4>
      <p>We try to make Your life easy</p>
    </div>
  </div>
</div>
</div>




<!-- Container (Pricing Section) -->

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid">
  <h2 class="text-center">CONTACT US</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us </p>
      <p><span class="glyphicon glyphicon-map-marker"></span> INHA University in Tashkent</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> 9 Ziyolilar Street</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> District Mirzo Ulugbek</p>
       <p><span class="glyphicon glyphicon-map-marker"></span> Tashkent 100000</p>
        <p><span class="glyphicon glyphicon-map-marker"></span> Uzbekistan</p>
        <p><span class="glyphicon glyphicon-envelope"></span> something@gmail.com</p>
         <p><span class="glyphicon glyphicon-phone"></span> Tel: 123-45-67</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">

        <div class="col-sm-8 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <div class="row">
          <div class="col-sm-8">
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
          </div>
      </div>

      <div class="row">
        <div class="col-sm-8 form-group">
          <button class="btn btn-default btn-lg pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>




<footer class="container-fluid text-center bg-grey">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Copyright <span>&copy</span> 2017</a></p>
</footer>


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


$(document).on('click','.navbar-collapse.in',function(e) {
    if( $(e.target).is('a') ) {
        $(this).collapse('hide');
    }
});
</script>

</body>
</html>
