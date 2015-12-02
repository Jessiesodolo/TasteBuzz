
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <title>Administrator Page</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="resources/style.css">
  </head>
  <body>
    <div class=" container center-block">
      <h3>All Drinks</h1>
    <div class="terms drink">
        <p></p>
        <li></li>
    </div>
    <h3>Add Drink:</h3>
    <form role="form" action="admin_query.php" method="post" id ="adddrink">
      <div class="form-group col-sm-6">
           <label for="Drinkname">Enter Drink Name:</label>
          <input type="text" class="form-control" id ="Dname" name="Dname"> 
      </div>
      <div class="form-group col-sm-8">
          <label for="Drinkdes">Enter Drink Description:</label>
          <textarea class="form-control" rows="5" id ="ddes" name="ddes"></textarea>
      </div>
      <div class="form-group col-sm-8">
          <label for="imageurl">Enter Image Url:</label>
          <textarea class="form-control " rows="3" id="imgurl" name="imgurl" placeholder="Copy Image url here"></textarea>
          <div class=" clearfix"> <button type="submit" id="addrink" name="addrink" class="btn btn-default pull-left ">Add Drink</button> </div>
      </div>
      
     
    </form>

    <div class="clearfix">
        <h3>Remove Drink:</h3>
      <form role="form" action="admin_query.php" method="post" id ="removedrink">
           <div class="form-group col-sm-6">
               <label for="drinkID">Enter Drink ID:</label>
              <input type="text" class="form-control" id ="drinkID" name="drinkID" placeholder="Enter drink ID"> 
          </div>
          <div class="form-group col-sm-6">
              <label for="drinkName">Enter Drink Name:</label>
              <input type="text" class="form-control" rows="3" id ="drinkName" name="drinkName" placeholder="Enter drink name" >
         </div>
           <div class=" clearfix"> <button type="submit" id="removedrink" name="removedrink" class="btn btn-default pull-left">Remove Drink</button> </div> 
      </form>
    </div>


    <!-- User form!-->
    <h3>All Users</h1>
    <div class="terms user">
        <p>ss</p>
        <li></li>
    </div>

    <h3>Make user an admin:</h3>
    <form role="form" action="admin_query.php" method="post" id ="addadmin">
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
          <div class="form-group col-sm-6">
              <label for="removeuser">Enter First Name:</label>
              <input type="text" class="form-control" rows="3" id ="firstName" name="firstName" placeholder="Enter User First Name to Remove " >
         </div>
          <div class="form-group col-sm-6">
              <label for="removeuser">Enter Last Name:</label>
              <input type="text" class="form-control" rows="3" id ="lastName" name="lastName" placeholder="Enter User Last Name to Remove" >
              
         </div>
          <div class="form-group col-sm-6">
              <label for="removeuser">Enter User ID:</label>
              <input type="text" class="form-control" rows="3" id ="Userid" name="Userid" placeholder="Enter User ID to remove preferences" >            
         </div>
           <div class=" clearfix"> <button type="submit" id ="Removeuser" name="removeduser" class="btn btn-default pull-left">Remove user</button> </div> 
      </form>
    </div>


    </div>
    

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script src="resources/drinks.js"></script>
  </body>
</html>