<?php ?>

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
  <body >
    <?php include 'header.php' ?>

<section class="container-fluid nav-padding" id="section1">
    <div class="v-center">
        <!-- <h1 class="text-center">TasteBUZZ</h1> -->
        <img src="resources/images/Logo_.PNG" class="center-block img-responsive" alt="logo1">
        <h2 class="text-center lato animate slideInDown">Don't have an account? <a href="register.php" id"Join" style="color:white;"><b style="text-decoration: underline;">Join Now</b></a></h2>
        <p class="text-center">
            <br>
            <a href="#" class="btn btn-blue btn-lg btn-huge lato" data-toggle="modal" data-target="#myModal">Find a Drink For You</a>
        </p>
    </div>
    <a href="#section2">
        <div class="scroll-down bounceInDown animated">
            <span>
                <i class="fa fa-angle-down fa-2x"></i>
            </span>
        </div>
    </a>
</section>

<section class="container-fluid" id="section2">
   <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInLeft animate">
                            <div class="panel-heading">
                                <h3>Simple</h3></div>
                            <div class="panel-body">
                                <p>We'll ask about your drink preferences and then suggest drinks you might like!</p>
                                <hr>FIND
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInUp animate">
                            <div class="panel-heading">
                                <h3>Customized</h3></div>
                            <div class="panel-body">
                                <p>You can change your preferences to find what your drinks oh choice are</p>
                                <hr>YOUR
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="panel panel-default slideInRight animate">
                            <div class="panel-heading">
                                <h3>Instant</h3></div>
                            <div class="panel-body">
                                <p>Preferences are searched via database and matches are displayed to you!</p>
                                <hr>BUZZ
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <div class="row">
            <br>
        </div>
    </div>
    <!--/container-->
</section>

<section>
    <!--The text is buggy so i'm still working on that-->
     <div class="container-fluid v-center">
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <img style="width:100px;" class="img-circle img-responsive center-block" src="//placehold.it/100/222/?text=ALE">
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <img style="width:100px;" class="img-circle img-responsive center-block" src="//placehold.it/100/222/?text=Vodka">
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <img style="width:100px;" class="img-circle img-responsive center-block" src="//placehold.it/100/222/?text=Rum">
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <img style="width:100px;" class="img-circle img-responsive center-block" src="//placehold.it/100/222/?text=Wine">
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <img style="width:100px;" class="img-circle img-responsive center-block" src="//placehold.it/100/222/?text=Cider">
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <img style="width:100px;" class="img-circle img-responsive center-block" src="//placehold.it/100/222/?text=Tequila">
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <img style="width:100px;" class="img-circle img-responsive center-block" src="//placehold.it/100/222/?text=WHISKEY">
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
            <div class="col-sm-2 col-xs-6">
                <div class="text-center">
                    <a href="">
                        <img style="width:100px;" class="img-circle img-responsive center-block" src="//placehold.it/100/222/?text=Gin">
                    </a>
                    <h3 class="text-center"></h3>
                </div>
            </div>
        </div>
        <!--/row-->
    </div>
</section>

<section class="container-fluid" id="section3">
   <h1 class="text-center">Discover your BUZZ</h1>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h3 class="text-center lato slideInUp animate">Finding the <strong>TASTE</strong> that suits you.</h3>
            <br>
            <div class="row">
                <div class="col-xs-5 col-xs-offset-1"><p>TASTEBUZZ is intended to help newcomers to the drinking world discover which drinks fit their needs.</p></div>
                <div class="col-xs-2"></div>
                <div class="col-xs-5 "><p>The data behind our suggestions is from experience, personal testimonies and product research.</p></div>
            </div>
            <br>
            <p class="text-center">
                <img src="resources/images/fire-bomb.jpg" class="img-responsive thumbnail center-block ">
            </p>
        </div>
    </div>
</section>

<section id="section4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Make Contact</h1>
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
                        <input type="homepage" class="form-control" placeholder="Website URL" required="">
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
                          <strong>Some LLC</strong><br>
                          795 Folsom Ave, Suite 600<br>
                          Newport, RI 94107<br>
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
<!--
<section class="container-fluid" id="section5">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <h2 class="text-center lato">Section with Marketing Highlights.</h2>
            <hr>
            <div class="media">
                <h3>Boom</h3>
                <div class="media-left">
                    <img src="//placehold.it/100">
                </div>
                <div class="media-body media-middle">
                    <p>Some brand-tacular designs even have home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                </div>
            </div>
            <hr>
            <div class="media">
                <h3>Boom</h3>
                <div class="media-body media-middle">
                    <p>Offset right home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                </div>
                <div class="media-right">
                    <img src="//placehold.it/100">
                </div>
            </div>
            <hr>
            <div class="media">
                <h3>Boom</h3>
                <div class="media-left">
                    <img src="//placehold.it/100">
                </div>
                <div class="media-body media-middle">
                    <p>Some brand-tacular designs even have home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                </div>
            </div>
            <hr>
            <div class="media">
                <h3>Boom</h3>
                <div class="media-body media-middle">
                    <p>Offset right home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                </div>
                <div class="media-right">
                    <img src="//placehold.it/100">
                </div>
            </div>
            <hr>
            <div class="media">
                <h3>Boom</h3>
                <div class="media-left">
                    <img src="//placehold.it/100">
                </div>
                <div class="media-body media-middle">
                    <p>Some brand-tacular designs even have home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                </div>
            </div>
            <hr>
            <div class="media">
                <h3>Boom</h3>
                <div class="media-body media-middle">
                    <p>Offset right home page content that is taller that 12,000 pixels. That's a lotta content Lorem ipsum dolor sit amet, adipiscing elit.</p>
                </div>
                <div class="media-right">
                    <img src="//placehold.it/100">
                </div>
            </div>

        </div>
    </div>
</section>-->
<!--
<section class="container-fluid" id="section6">
    <ul class="row list-unstyled">
        <li class="col-md-6 col-md-offset-1 col-xs-10 col-xs-offset-1">
            <h3 class="text-center">This will scale down proportionately.</h3>
        </li>
        <li class="col-md-3 col-md-offset-0 col-xs-10 col-xs-offset-1 text-center">
            <a href="" class="center-block btn btn-default btn-lg btn-huge lato animate slideInRight">Responsive Design</a>
        </li>
    </ul>
</section>

<section class="container-fluid" id="section7">
    <div class="row">
        <div class="col-sm-1 col-sm-offset-3 col-xs-4 text-center">
            <i class="fa fa-github fa-4x"></i>
        </div>
        <div class="col-sm-1 col-xs-4 text-center">
            <i class="fa fa-foursquare fa-4x"></i>
        </div>
        <div class="col-sm-1 col-xs-4 text-center">
            <i class="fa fa-pinterest fa-4x"></i>
        </div>
        <div class="col-sm-1 col-xs-4 text-center">
            <i class="fa fa-google-plus fa-4x"></i>
        </div>
        <div class="col-sm-1 col-xs-4 text-center">
            <i class="fa fa-twitter fa-4x"></i>
        </div>
        <div class="col-sm-1 col-xs-4 text-center">
            <i class="fa fa-dribbble fa-4x"></i>
        </div>
    </div>
</section>
-->
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