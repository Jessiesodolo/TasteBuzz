
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 class="text-center">
                    <br>Login
                </h2>
            </div>
            <div class="modal-body row">
                <h6 class="text-center">COMPLETE THESE FIELDS TO SIGN IN</h6>
                <form action="login.php" method="post" class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" value="Submit" class="btn btn-danger btn-lg btn-block">Sign In</button>
                        <span class="pull-right"><a href="register.php">Register</a></span><span><a href="#">Need help?</a></span>
                    </div>
                    <input type="hidden" name="function" id="function" value="login">
                </form>
            </div>
            <div class="modal-footer">
                <h6 class="text-center"><a href="">Privacy is important to us. Click here to read why.</a></h6>
            </div>
        </div>
    </div>
</div>