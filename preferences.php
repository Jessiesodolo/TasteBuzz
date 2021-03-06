
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
        <div class="container">
            <div class="input-group col-md-6">
                <input type="text" id="preferenceInput" class="form-control" placeholder="New Preference"></input>
                <div class="input-group-btn">
                    <button id="addPreference" onclick="addPreference()" class="btn btn-primary">Add Preference</button>
                </div>
            </div>
        </div>
        <div id="preferences" class="container">
            <!--section for all users preferences-->
        </div>

    </section>

    <?php include 'footer.php' ?>


    <div class="scroll-up">
        <a href="#"><i class="fa fa-angle-up"></i></a>
    </div>

    <!--scripts loaded here-->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="resources/preferences.js"></script>
    <script src="resources/scripts.js"></script>
  </body>
</html>