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
    <div class="nav-padding container center-block admin-page">
      <h3>All Drinks</h1>
      <div class="terms drink">
          <p></p>
          <li></li>
      </div>
      <h3>Add Drink:</h3>
      <form role="form" action="admin_query.php" method="post" id ="adddrink">
		  <input type="hidden" id="action" name="action" value="addDrink">
        <div class="form-group col-sm-6">
            <label for="Drinkname">Enter Drink Name:</label>
            <input type="text" class="form-control" id ="drinkName" name="drinkName"> 
        </div>
        <div class="form-group col-sm-8">
            <label for="Drinkdes">Enter Drink Description:</label>
            <textarea class="form-control" rows="5" id ="drinkDesc" name="drinkDesc"></textarea>
        </div>
        <div class="form-group col-sm-8">
            <label for="imageurl">Enter Image Url:</label>
            <textarea class="form-control " rows="3" id="drinkURL" name="drinkURL" placeholder="Copy Image url here"></textarea>
            <div class=" clearfix"> <button type="submit" id="addrink" name="addrink" class="btn btn-default pull-left ">Add Drink</button> </div>
        </div>
      </form>
	  
	   <h3>Add Drink Trait:</h3>
	  <form role="form" action="admin_query.php" method="post" id ="addDrinkTrait">
		  <input type="hidden" id="action" name="action" value="addDrinkTrait">
        <div class="form-group col-sm-6">
            <label for="drinkID">Enter Drink ID:</label>
            <input type="text" class="form-control" id ="drinkID" name="drinkID"> 
        </div>
        <div class="form-group col-sm-8">
            <label for="drinkTrait">Enter Trait:</label>
            <input type="text" class="form-control" id ="drinkTrait" name="drinkTrait"> 
			 <div class=" clearfix"> <button type="submit" id="addrink" name="addrink" class="btn btn-default pull-left ">Add Trait</button> </div>
        </div>
      </form>

      <div class="clearfix">
        <h3>Remove Drink:</h3>
        <form role="form" action="admin_query.php" method="post" id ="removedrink">
			<input type="hidden" id="action" name="action" value="removeDrink">
             <div class="form-group col-sm-6">
                 <label for="drinkID">Enter Drink ID:</label>
                <input type="text" class="form-control" id ="drinkID" name="drinkID" placeholder="Enter drink ID"> 
            </div>
             <div class=" clearfix"> <button type="submit" id="removedrink" name="removedrink" class="btn btn-default pull-left">Remove Drink</button> </div> 
        </form>
      </div>


      <!-- User form!-->
      <h3>All Users</h1>
      <div class="terms user">
          
      </div>

      <h3>Make user an admin:</h3>
      <form role="form" action="admin_query.php" method="post" id ="addadmin">
		<input type="hidden" id="action" name="action" value="addAdmin">
        <div class="form-group col-sm-6">
                <label for="addadmin">Enter User ID:</label>
                <input type="text" class="form-control" rows="3" id ="addadmin" name="addadmin" placeholder="Enter User ID number to become admin" > 
                 <div class=" clearfix"> <button type="submit" id="Admin" name="Admin" class="btn btn-default pull-left">Set Admin</button> </div>
        </div>
      </form>
      <!-- There are redundancies in the form but there had to be because of the Database structure, if the id is the primary key you can't remove it by that!-->

      <div class="clearfix">
          <h3>Remove User:</h3>
        <form role="form" action="admin_query.php" method="post" id ="removeuser">
			<input type="hidden" id="action" name="action" value="removeUser">
            <div class="form-group col-sm-6">
                <label for="removeuser">Enter User ID:</label>
                <input type="text" class="form-control" rows="3" id ="Userid" name="Userid" placeholder="Enter User ID to remove preferences" >            
           </div>
             <div class=" clearfix"> <button type="submit" id ="Removeuser" name="removeduser" class="btn btn-default pull-left">Remove user</button> </div> 
        </form>
      </div>


    </div>
    
    <?php include 'footer.php' ?>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="resources/admin.js"></script>
  </body>
</html>