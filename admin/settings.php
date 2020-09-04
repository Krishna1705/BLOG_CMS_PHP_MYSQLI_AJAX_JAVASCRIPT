<!DOCTYPE html>
<html>
<head>

<?php
include "includes/header.php";  
?>
<style>
header,footer,.main{
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
        header,footer,.main{
        padding-left: 0;
      }
    }
</style>
</head>
<!------------------------body starts here--------------------------->

<!--------------if user is logged in then his session has setted and he can see this body portion
so we need to check session is setted or not with help of following code------------------------->
<body>
<?php 
if(isset($_SESSION['username']))
{
?>
<!---------------------nav sidnav starts here--------------------------->
<?php
include "includes/sidenav.php";
}
?>
<!---------------------nav sidnav end here-------------------------------------------->

<div class="main">
  <div class="row">

<!-----------------change comments section start here----------------------------->
  <div class="col s12 m12 l12">
  <ul class="collection with-header">
  <li class="collection-header light-blue darken-3 white-text"><h5>Change Password</h5></li>
  </ul>
  <?php
  if(isset($_SESSION['message'])){
      echo $_SESSION['message'];
      unset($_SESSION['message']);
  }
  ?>
  <form action="settings.php" method="POST">
  <input type="password"  name="password" placeholder="Enter Password">
  <input type="password" name="conf_password" placeholder="Confirm Password">
  <input type="submit" class="btn" name="change_pass" value="confirm password">
  </form>
  </div>
<!-----------------change comments section start here----------------------------->
  </div>
  <?php 
if(isset($_POST['change_pass'])){
$pass=$_POST['password'];
$conf_pass=$_POST['conf_password'];

$pass=mysqli_real_escape_string($conn,$pass);
$conf_pass=mysqli_real_escape_string($conn,$conf_pass);

$pass=htmlentities($pass);
$conf_pass=htmlentities($conf_pass);

if($pass===$conf_pass){
    
    $username=$_SESSION['username'];
    //echo $username;
    $pass=password_hash($pass,PASSWORD_BCRYPT);
    $confsql="update users set password='$pass' WHERE username='$username'";
    echo $sql;
    
    $res=mysqli_query($conn,$confsql);
    if($res){
        $_SESSION['message'] ="<div class='chip close green white-text'>Password changed successfully.</div>";
        header("Location:settings.php");
    }else{
        $_SESSION['message'] ="<div class='chip close red black-text'>something went wrong.</div>";
        header("Location:settings.php");
    }

}else{
    $_SESSION['message'] ="<div class='chip close red black-text'>Sorry. Password Doesn't Match.</div>";
    header("Location:settings.php");
  }
}

?>
</div>


<?php
include "includes/footer.php";
?>
<script>
  $(document).ready(function(){
  $('.sidenav').sidenav();
  });
</script>


</body>
</html>