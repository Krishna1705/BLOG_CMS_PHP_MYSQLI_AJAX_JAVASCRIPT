<?php
include "includes/header.php";
?>

<?php

if(isset($_POST['login'])){
   
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $username= mysqli_real_escape_string($conn,$username);
    $password= mysqli_real_escape_string($conn,$password);

    $username= htmlentities($username);
    $password= htmlentities($password);

    $sql_pass= "select password from users where username='$username'";
   //we can execute sql query as follows:,and it will return result object
    $res_pass=mysqli_query($conn,$sql_pass);

   // echo print_r($res_pass);
    //echo "<br>";

/*res_pass will be associative array which contains row in it 
we can get value of password by passing key,
here res_pass object will contain row we will access that row as follows:*/

  $row=mysqli_fetch_assoc($res_pass);
  echo $row['password'];

//we will store encrypted database password  as follows:
  $database_password= $row['password'];

/*but pw which is into database have already been encrypted by php,
so we need to compare that encrypted password and password that is entered by user with help of 
password verify() method as follows.*/

if(password_verify($password,$database_password)){
  //creates session before redirect a user
    $_SESSION['username']=$username;
    header("Location:dashboard.php");
    
}else{
    header("Location:login.php");
    $_SESSION['message'] ="<div class='chip close red black-text'>Sorry. Credentials Don't Match.</div>";
}

}//login button...---main if condition ends here.


?>

<?php
include "includes/footer.php";

?>