<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-body fs_bg">

    <div class="container">
    <p> </p>

      <form class="form-signin cmxform form-horizontal tasi-form" action="<?php echo $BASE; ?><?php echo $PARAMS[0]; ?>" method="post" id="signupForm">
        <h2 class="form-signin-heading">BECOME AN OWNER</h2>
        <div class="login-wrap">
            <p>Enter your personal details below <br /><?php echo $this->raw($error); ?>
                
            <span style="font-size: 11px">Already Registered?
                <a class="" href="login">
                    Login
                </a>
            </span>
            </p>


            <input type="text" class="form-control" id="fname" placeholder="First Name" autofocus name="fname">
            <input type="text" class="form-control" id="lname" placeholder="Last Name" autofocus name="lname">
            <input type="text" class="form-control" id="email" placeholder="Email/Username" autofocus  type="email" name="email">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
            <label class="checkbox">
                <input type="checkbox" value="agree this condition"> I agree to the Terms and Privacy Policy
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>

        </div>

      </form>

    </div>
<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src="js/respond.min.js" ></script>

  <!--right slidebar-->
  <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/form-validation-script.js"></script>
  </body>
</html>
