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
<!------------------------body starts here---------------------->
<body>
<?php 
if(isset($_SESSION['username']))
{
?>

<!---------------------nav sidnav starts here--------------------------->
<?php
include "includes/sidenav.php";
?>
<!---------------------nav sidnav end here-------------------------------------------->

<!-----------------------main section - create blog start here--------------------------->
<div class="main">
<form action="write_check.php" method="POST" enctype="multipart/form-data">
<div class="card-panel">
<?php
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
}
?>
<h5>Blog Title</h5>
<textarea name="title" class="materialize-textarea" placeholder="Enter Blog Title Here"></textarea>

<h5>Featured Image</h5>

<div class=" file-field input-field">
<div class="btn">
Upload Image<input type="file" name="image">
</div>
<div class="file-path-wrapper">
  <input class="file-path validate" type="text">
</div>
</div>


<h5>Blog Content</h5>
<textarea name="editor1" id="editor1"  class="materialize-textarea" ></textarea><br>

<div class="center">
<input type="submit" value="publish" name="publish" class="btn light-blue darken-3 white-text">
</div>

</div>
</form>

</div>
<!-----------------------main section-create blog end here--------------------------->


<!--------------------foooter start--------------------------------->
      <!--JavaScript at end of body for optimized loading-->
      <!--import jquery before materalize.min.js-->
      <script src="../js/jquery.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>

<!-----------------------------script for ckeditor start------------------------------->
<script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
 <script>
    CKEDITOR.replace( 'editor1' );
</script>
<!----------------------------script for ckeditor end---------------------------------->  

<script>
  $(document).ready(function(){
  $('.sidenav').sidenav();
  });
</script>
</body>
<?php
}else{
$_SESSION['message'] ="<div class='chip close red black-text'>You are not Logged in. Please Login To Continue.</div>";
header("Location:login.php");
}
  ?>

</html>