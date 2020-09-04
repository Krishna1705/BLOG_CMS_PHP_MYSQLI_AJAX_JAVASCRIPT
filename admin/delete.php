<?php
include "includes/header.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);

    $sql="delete from posts where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res){
            echo "<div class='chip close green white-text'>Post is Deleted Successfully.</div>";
    }else{
        echo "<div class='chip close red black-text'>Something Went Wrong.</div>";
          
    }
}
?>


