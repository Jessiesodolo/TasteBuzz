
<?php include 'login.php' ?>
<?php 
    session_start();  
?>
<nav class="navbar navbar-trans navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="resources/images/logo_3.PNG" alt="logo" ></a>
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
                    if(isset($_SESSION["login"]) && $_SESSION["login"] == true){//if user is logged in
                        if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){//if user is an admin, give admin settings

                            echo '<li role="presentation" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                  <span class="glyphicon glyphicon-user"></span>' . $_SESSION['fname'] . '<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                <li><a href="preferences.php">Preferences</a></li>
                                <li><a href="admin.php">Admin Settings</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#" onclick="logout()">Logout</a></li>
                                </ul>
                              </li>';
                        }
                        else{//if not an admin
                            echo '<li role="presentation" class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                      <span class="glyphicon glyphicon-user"></span>' . $_SESSION['fname'] . '<span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                    <li><a href="preferences.php">Preferences</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#" onclick="logout()">Logout</a></li>
                                    </ul>
                                  </li>';
                        }
                    }
                    else {//if not logged in
                        echo '<li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-circle-o-notch fa-lg"> Login</i></a></li>';
                    }
                ?>
            </ul>
        </div>
       
    </div>
</nav>
<?php include 'loginModal.php' ?>
<script src="resources/header.js"></script>
