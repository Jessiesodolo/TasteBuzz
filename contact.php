<!DOCTYPE html>
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
    
    <section class="nav-padding">

        <section id="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Contact Us</h1>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required="">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="middleName" name="firstName" placeholder="Middle Name" required="">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="phone" placeholder="Phone" required="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-11">
                                <button class="btn btn-default btn-lg pull-right">Contact Us</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="well well-sm pull-right">
                            <address>
                                  <strong>TasteBuzz</strong><br>
                                  1999 Burdett Ave<br>
                                  Troy, NY 12180<br>
                                  P: (123) 456-7890
                            </address>
                            <address>
                              <strong>Email Us</strong><br>
                              <a href="mailto:#">first.last@example.com</a>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>

    <?php include 'footer.php' ?>


    <div class="scroll-up">
        <a href="#"><i class="fa fa-angle-up"></i></a>
    </div>

    <!--scripts loaded here-->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="resources/scripts.js"></script>
  </body>
</html>