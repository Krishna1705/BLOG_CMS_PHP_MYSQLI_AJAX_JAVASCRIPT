<?php
include "includes/header.php";  
?>
<!-----------------------write_check start--------------------------->
<?php

if(isset($_POST['publish']))
{

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
//echo "Blog Title:".$title."<br>"."Blog Content".$content;
$sql= "insert into posts(title,content,feature_image) values ('$title','$content','$image_name')";

$res=mysqli_query($conn,$sql);

if($res){
    header("Location: write.php");
   $_SESSION['message']="<div class='chip close green white-text'>Blog Posted Successfully </div>";
}else{
    header("Location: write.php");
    $_SESSION['message']="<div class='chip close red black-text'>Sorry, Something went wrong </div>";
}


    }else{
        header("Location: write.php");
        $_SESSION['message']="<div class='chip close green white-text'>IMAGE SIZE IS EXCEEDED THAN 2 MB </div>";
    }
}else{
    header("Location: write.php");
    $_SESSION['message']="<div class='chip close green white-text'>file format is not supported</div>";
}


}else{
   
   header("Location: write.php");
}

?>

<!-----------------------write_check end--------------------------->
