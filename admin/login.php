<!DOCTYPE html>
<html>
<head>
<?php
include "includes/header.php";  
?>
</head>

<body class="grey lighten-3">
<!----------login and signup strat here-------------->
<div class="container" >
    
    
        
<div class="row" style="margin-top:120px;">

    <div class="col s12 m8 offset-m2  l6 offset-l3" >
      <div class="card-panel center  light-blue darken-3" style="margin-bottom:0px;"> 
      <ul class="tabs  light-blue darken-3" >
       <li class="tab"><a href="#login" class="white-text">login</a></li>
       <li class="tab"><a href="#signup" class="white-text">signup</a></li>
      </ul>
      </div>
    </div>

    <div class="col s12 m8 offset-m2  l6 offset-l3" id="login" >
    <div class="card-panel center" style="margin-top:1px;">
    <h5>Login to Continue</h5>
    
<?php

if (isset($_SESSION['message'])){
  echo $_SESSION['message'];
  unset ($_SESSION['message']);
}

?>

  <form action="login_check.php" method="post">
     <div class="input-field">
     <input type="text" name="username" id="username" placeholder="Enter username">
     </div>

     <div class="input-field">
     <input type="password" name="password" id="password" placeholder="Enter password">
     </div>

    <input type="submit" name="login" value="Login" class="btn orange darken-2">
  </form>

    </div>  
    </div>

    <div class="col s12 m8 offset-m2  l6 offset-l3" id="signup" >
    <div class="card-panel center"  style="margin-top:1px;">
    <h5>Sign Up to Register </h5>

 <form action="signup_check.php" method="POST">
    <div class="input-field">
    <input type="email" name="email" id="email" placeholder="Enter email" class="validate">
 <!--front-end validator as follow:label-->
    <label for="email" data-error="Invalid Email-format" data-success="valid Email"></label>
    </div>

     <div class="input-field">
     <input type="text" name="username" id="username" placeholder="Enter username">
     </div>

     <div class="input-field">
     <input type="password" name="password" id="password" placeholder="Enter password">
     </div>

    <input type="submit" class="btn orange darken-2" value="Sign up" name="signup">
 </form>

    </div>
    </div>
      
      
</div>
              

</div>

<?php
include "includes/footer.php";
?>

<script>
       $(document).ready(function(){
       $('.tabs').tabs();
      });
</script>
</body>
</html>


