<?php

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

if (array_key_exists('submit', $_POST)) {
    $err = false;
    $msg = '';
    $email = '';

    if (array_key_exists('message', $_POST)) {
        $message = substr(strip_tags($_POST['message']), 0, 16384);
    } else {
        $message = '';
        $msg = 'No message provided!';
        $err = true;
    }

    if (array_key_exists('name', $_POST)) {
        $name = substr(strip_tags($_POST['name']), 0, 255);
    } else {
        $name = '';
    }
 
    $to = 'webmaster@cde-ct.com';
        
    if (array_key_exists('email', $_POST) and PHPMailer::validateAddress($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $msg = "Error: invalid email address provided";
        $err = true;
    }
    if (!$err) {
        $mail = new PHPMailer;
        /*$mail->isSMTP();*/
        /*$mail->Host = 'a2plcpn10426.prod.iad2.secureserver.net';*/
        $mail->Host = 'relay-hosting.secureserver.net';
        $mail->Port = 25;
        /*$mail->SMPTAuth = true;*/
        $mail->Username = "xxxxxxx";
        $mail->Password = "xxxxxxx";
        /*$mail->SMTPSecure = "tls";*/
        $mail->CharSet = 'utf-8';
        $mail->setFrom('webmaster@cde-ct.com', (empty($name) ? 'Contact form' : $name));
        $mail->addAddress($to);
        $mail->addReplyTo($email, $name);
        $mail->Subject = 'New message from cde-ct.com visitor!';
        $mail->Body = "Contact form submission\n\n" . $message;
        if (!$mail->send()) {
            $msg .= "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $msg .= "Message sent!";
        }
    }
} ?>

<!doctype html>
<html class="no-js" lang="">

<head>


<!-- REDIRECTING STARTS -->
<link rel="canonical" href="http://insider.zone/"/>
<noscript>
	<meta http-equiv="refresh" content="5;URL=http://insider.zone/">
</noscript>
<!--[if lt IE 9]><script type="text/javascript">var IE_fix=true;</script><![endif]-->
<script type="text/javascript">
	var url = "http://www.cde-ct.com/index.html";
	var delay = "5000";
	window.onload = function ()
	{
		setTimeout(GoToURL, delay);
	}
	function GoToURL()
	{
		if(typeof IE_fix != "undefined") // IE8 and lower fix to pass the http referer
		{
			var referLink = document.createElement("a");
			referLink.href = url;
			document.body.appendChild(referLink);
			referLink.click();
		}
		else { window.location.replace(url); } // All other browsers
	}
</script>
<!-- Credit goes to http://insider.zone/ -->
<!-- REDIRECTING ENDS -->

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Roboto|Open+Sans|Montserrat:400,700' rel='stylesheet' type='text/css'>


</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  
    <div class="container logo-bar">
    <div class="row h-100">
      <div class="d-flex col-sm-12 align-self-center">
        <div class="logo-wrapper">
          <img src="/img/logo-full.png" alt="Center for Diabetes Excellence logo">
        </div>
      </div>
    </div>
  </div>
  
  <?php if(empty($msg)) { ?>
	  <div class="container mt-5">
	    <h2>This feature has not been implemented yet. Please call the clinic directly.</h2>
	    <p>Redirecting you in just a few seconds...</p>
	  </div>
  <?php } else {
  	echo $msg;
  } ?>
  
  
  
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script> if(typeof($.fn.modal) === 'undefined') {document.write('<script src="js/vendor/bootstrap.bundle.js"><\/script>')}</script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>