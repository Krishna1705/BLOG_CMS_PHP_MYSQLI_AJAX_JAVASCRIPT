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
<?php
$image_files=scandir("../images/");
    if($image_files){
?>
<!-----------------------main section - create blog start here--------------------------->
<div class="main">
   <div class="row">
        <?php
          for($i=0;$i<sizeof($image_files);$i++){
              if(strlen($image_files[$i])>2){
        ?>
      <div class="col l2 m3 s6">
        <div class="card">
            <div class="card-image">
             <img src="../images/<?php echo $image_files[$i];?>">
             
            </div>
        </div>
      </div>
      <?php
              }
      }
     ?>
    </div>
</div><!-----------------------main section-create blog end here--------------------------->
<?php
}
?>


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