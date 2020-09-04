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

<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);
   
    $sql="select * from posts where id=$id";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
    $rows=mysqli_fetch_assoc($res);
    ?>

<!------------------------body starts here---------------------->
<body>

<!---------------------nav sidnav starts here--------------------------->
<?php
include "includes/sidenav.php";
?>
<!---------------------nav sidnav end here-------------------------------------------->

<!-----------------------main section - create blog start here--------------------------->
<div class="main">

<form action="edit_check.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
<div class="card-panel">
<?php
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
}
?>
<h5>Blog Title</h5>
<textarea name="title" class="materialize-textarea" placeholder="Enter Blog Title Here">
<?php
echo $rows['title'];
?>
</textarea>

<h5>Featured Image</h5>

<div class=" file-field input-field">
<div class="btn">
Upload Image<input type="file" name="image">
</div>
<div class="file-path-wrapper">
  <input class="file-path validate" type="text">
  <?php
echo $rows['feature_image'];
?>
</div>
</div>


<h5>Blog Content</h5>
<textarea name="editor1" id="editor1"  class="materialize-textarea" >
<?php
echo $rows['content'];
?>
</textarea><br>

<div class="center">
<input type="submit" value="update" name="update" class="btn light-blue darken-3 white-text">
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
        header("Location:dashboard.php");
    }
}

?>

</html>