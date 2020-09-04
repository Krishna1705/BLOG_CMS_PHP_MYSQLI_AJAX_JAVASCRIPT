<?php 
if(isset($_SESSION['username']))
{
?>
<!---------------------nav sidnav starts here--------------------------->
<nav>
    <div class="nav-wrapper" style="background-color: rgb(2,119,189);">
      <a href="#!" class="brand-logo center white-text">Blogera</a>
      <a href="#" data-target="allscreen-demo" class="sidenav-trigger"><i class="material-icons blue-text">menu</i></a>   
    </div>
  </nav>

<ul class="sidenav sidenav-fixed" id="allscreen-demo">
<li>
   <div class="user-view">
   <div class="background">
       <img src=../images/digital_agency_logo.png style="opacity:0.1;" class="responsive-img">
    </div>
    <a href=""><img src=../images/digital_agency_logo.png  class="circle" ></a>
    <p><b>Admin</b></p>
    <span class="username black-text">
    <?php
    if (isset($_SESSION['username'])){  
          echo $_SESSION['username'];
        }
    ?>
    </span>
    <span class="email black-text">
 <?php
 $user=$_SESSION['username'];
 $sql="select email from users where username='$user'";
 $res=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($res);
 echo $row['email'];
?>
    </span>

   </div>
</li>

<li><a href="dashboard.php">Dashboard</a></li> 
<li><a href="post.php">Posts</a></li>  
<li><a href="image.php">Images</a></li>  
<li><a href="comments.php">Comments</a></li>  
<li><a href="settings.php">Setting</a></li>  

<div class="divider"></div>
<li><a href="logout.php">Logout</a></li>  

</ul>

<!---------------------nav sidnav end here-------------------------------------------->
<?php
}else{
$_SESSION['message'] ="<div class='chip close red black-text'>You are not Logged in. Please Login To Continue.</div>";
header("Location:../login.php");
}
  ?>      