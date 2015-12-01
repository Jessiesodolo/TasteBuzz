<?php include 'loginModal.php' ?>
<?php include 'login.php' ?>
<?php 
    session_start();  
?>
<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
    <div class="container">
           <!--<form class="navbar-form navbar-right" role="search">
              <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" value="Email">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword3">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password" value="Password">
            </div>
              <button type="submit" class="btn btn-default">Sign In</button>
        </form>-->

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="resources/images/logo_3.PNG" alt="logo" ></a>
            <!-- <a class="navbar-brand" href="#section1">TasteBUZZ</a> -->
        </div> 
        <div class="navbar-collapse collapse" id="navbar-collapsible">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php">Home</a></li>
                <li><a href="drinks.php?type=all">Drinks</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li>&nbsp;</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(isset($_SESSION["login"]) && $_SESSION["login"] == true){ 
                        echo '<li role="presentation" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                  <span class="glyphicon glyphicon-user"></span>' . $_SESSION['fname'] . '<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                <li><a href="preferences.php">Preferences</a></li>
                                <li role="separator" class="divider"></li>
                                    <li><form action="login.php" method="post" id="logout">
                                        <button class="navbar-btn" type="submit">Logout</button>
                                        <input type="hidden" name="function" id="function" value="logout">
                                    </form></li>
                                </ul>
                              </li>';
                    }
                    else {
                        echo '<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-circle-o-notch fa-lg"> Login</i></a></li>';
                    }
                    ?>
            </ul>
        </div>
       
    </div>
</nav>