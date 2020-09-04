<?php
include "includes/header.php";  
?>
<!-----------------------write_check start--------------------------->
<?php

if(isset($_POST['update']))
{

$id=$_GET['id'];
$id=mysqli_real_escape_string($conn,$id);
$id=htmlentities($id);

$title=$_POST['title'];
$title=mysqli_real_escape_string($conn,$title);
$title=htmlentities($title);
    
$content=$_POST['editor1'];
$content=mysqli_real_escape_string($conn,$content);
//$content=htmlentities($content);

$image=$_FILES['image'];
$image_name=$_FILES['image']['name'];
$image_size=$_FILES['image']['size'];
$image_type=$_FILES['image']['type'];
$image_dir=$_FILES['image']['tmp_name'];

if($image_type == "image/jpeg" || $image_type == "image/jpg" ||  $image_type == "image/png"){
    if($image_size <= 2097152){

 move_uploaded_file($image_dir,"../images/".$image_name);

$sql="update posts set title='$title',content='$content',feature_image='$image_name' where id=$id";
$res=mysqli_query($conn,$sql);

if($res){
    $_SESSION['message']="<div class='chip close green white-text'>Blog Updated Successfully </div>";
    header("Location:edit.php?id=".$id);
}else{
    $_SESSION['message']="<div class='chip close green white-text'>Sorry,Something went wrong. try again </div>";
    header("Location:edit.php?id=".$id);
     }

    }else{
        header("Location:edit.php?id=".$id);
        $_SESSION['message']="<div class='chip close green white-text'>IMAGE SIZE IS EXCEEDED THAN 2 MB </div>";
    }
}else{
    header("Location:edit.php?id=".$id);
    $_SESSION['message']="<div class='chip close green white-text'>file format is not supported</div>";
}

}
?>