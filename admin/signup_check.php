<?php

include "includes/header.php";
//print_r($conn);
?>


<?php

if(isset($_POST['signup'])){
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];

//we need to encrypt password before inserting into database

//above steps can be vulnarable(hacked) by sql injection so we need to senitise each variable before going into database as follows:
//u can use mysqli_real_escape_string() function to senitise above variable and provide protection against SQL INJECTION
    $email= mysqli_real_escape_string($conn,$email);
    $username= mysqli_real_escape_string($conn,$username);
    $password= mysqli_real_escape_string($conn,$password);

/*above way you can protect ur user info against SQL INJECTION,still there are another hacking attacks like 
cross site scripting attacks and  access attacks.these are javascript attacks. aese attacks me
jb koi bhi aadami aapke input field par javascript code...<script>.....</script> likh de to hackers
user ko kahi par bhi bhej sakate he...means aapki info wo chura lenge.so we will use htmlentities() function use krenge. */
    $email= htmlentities($email);
    $username= htmlentities($username);
    $password= htmlentities($password);

/*to check we will print all above variable to check that we accessed all variables or not
we execute following commented echo line*/
echo $email,$username,$password;

/*we must encrypt password before sending it to the database.
we encrypt it as follows WITH USE OF PASSWORD_BCRYPT ALGORITHM
THIS IS THE BEST ALGO TO ENCRYPT PASSWORD.ALWAYS USE IT FOR PW ENCRYPTION*/
$password=password_hash($password,PASSWORD_BCRYPT);


//sql query to check email is already exist or not is as follows:
$sql_email= "select * from users where email='$email'";
//we can execute sql query as follows:,and it will return result object
$res_email=mysqli_query($conn,$sql_email);

//sql query to check username is already exist or not is as follows:
$sql_username= "select * from users where username='$username'";
//we can execute sql query as follows:,and it will return result object
$res_username=mysqli_query($conn,$sql_username);


if(mysqli_num_rows($res_email)>0){
    header("Location: login.php");
    $_SESSION['message']="<div class='chip close red black-text'>Email Already exists. Please Login To Continue</div>";
}else if(mysqli_num_rows($res_username)>0){
    header("Location: login.php");
    $_SESSION['message']="<div class='chip close red black-text'>Username Already exists. Please Login To Continue</div>";
}
else{
//sql query FOR SIGNUP is as follows:---if new fresh user ant to signup 
$sql= "insert into users(email,username,password) values('$email','$username','$password')";

//we can execute sql query as follows:,and it will return result object

$res=mysqli_query($conn,$sql);

if($res){
//data sign up successfully then redirect as follows:
header("Location: login.php");
//u can show message by creating session msg like as follows:
$_SESSION['message']="<div class='chip close green white-text'>You Have been Successfully Registered. Please Login To Continue</div>";
}else{
    header("Location: login.php");
    $_SESSION['message']="<div class='chip close red black-text'>Sorry.Something went wrong. Please Sign Up Again</div>";
   }
}


}//main post button ----if statement ends here

?>

<?php

include "includes/footer.php";

?>