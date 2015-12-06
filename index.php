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
    <section class="container-fluid nav-padding" id="section1">
        <div>
            <img src="resources/images/Logo_.PNG" class="center-block img-responsive" alt="logo1">
            <h3 class="text-center">Your one stop shop for quality drink suggestions!</h3>
            <?php 
                //if user is not logged in 
                if((isset($_SESSION["login"]) && $_SESSION["login"] == false) ||  !isset($_SESSION['login'])){ 
                    echo '<h4 class="text-center lato animate slideInDown">Don\'t have an account? <a href="register.php" id"Join" style="color:white;"><b style="text-decoration: underline;">Join Now</b></a></h4>';
                }
            ?>
            <p class="text-center">
                <br>
                <?php
                    if((isset($_SESSION["login"]) && $_SESSION["login"] == false) ||  !isset($_SESSION['login'])){ //if not logged in
                        echo '<a href="#" class="btn btn-blue btn-lg btn-huge lato" data-toggle="modal" data-target="#myModal">Find a Drink For You</a>';
                    }
                    else {//if logged in
                        echo '<a href="drinks.php?type=best" class="btn btn-blue btn-lg btn-huge lato">Find a Drink For You</a>';
                    }
                ?>
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