<?php  

include "includes/header.php";  

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);

    $sql="update comment set status=1 where id=$id ";
    $res=mysqli_query($conn,$sql);
    if($res){
        echo "<div class='chip close green white-text'>Comment is approved.</div>";
    }else{
        echo "<div class='chip close red black-text'>Something went wrong.</div>";
    }
}

?>