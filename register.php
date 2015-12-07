<html>
  <head>
    <meta charset="utf-8">
    <title>TasteBuzz</title>
    <meta name="description" content="This one page example has a fixed navbar and full page height sections. Each section is vertically centered on larger screens, and then stack responsively on smaller screens. Scrollspy is used to activate the current menu item. This layout also has a contact form example. Uses animate.css, FontAwesome, Google Fonts (Lato and Bitter) and Bootstrap." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">



    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="resources/bootstrap-3.3.5-dist/css/styles.css" />
  </head>

<body>
<?php include 'header.php' ?>

<div class="container-fluid nav-padding">
    <div class="text-center">
        <div class="center-block">
            <div class="row center-block">
                <form action="login.php" method="post" id="register-form" class="col-md-6 col-md-offset-3 col-xs-12 col-xs-offset-0">
                    <h2 class="text-center text-info">
                        <br>Register
                    </h2>
                    <h6 class="text-center">COMPLETE THESE FIELDS</h6>
					<?php 
						if(isset($_SESSION["msgToUser"])){
							echo ' <h6 class="text-center">'.$_SESSION["msgToUser"].'</h6>';
						}
					?>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control input-lg" placeholder="Email" required>
                    </div>
                    <div class="form-group form-inline">
                        <input type="text" name="fname" id="fname" class="form-control input-lg" placeholder="First Name" required>
                        <input type="text" name="lname" id="lname" class="form-control input-lg" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control input-lg" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" class="form-control input-lg" placeholder="Repeat Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" value="Submit" class="btn btn-danger btn-lg btn-block">Register</button>
                    </div>
                    <input type="hidden" name="function" id="function" value="register">
                </form>
            </div>
            <div class="">
                <h6 class="text-center"><a href="">Privacy is important to us. Click here to read why.</a></h6>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <script src="resources/scripts.js"></script>

</body>
</hmtl>