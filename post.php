<?php

include "includes/header.php";

?>
<?php
ob_start();
session_start();//session create kwa mate
include "includes/dbh.php";
?>

<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
$id=mysqli_real_escape_string($conn,$id);
$id=htmlentities($id);
$sql="select * from posts where id=$id";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){

  $row=mysqli_fetch_assoc($res);
   //echo "Views for this post is:".$row['view'];
   $view=$row['view'];
   $view=$view+1;
   $sql2="update posts set view=$view where id=$id";
   $res2=mysqli_query($conn,$sql2);
?>
<!-------container starts here-->
<div class="container-fluid">
  <div class="row">

    <!--1st portion starts here-->
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">

      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="col mb-4">
            <div class="card h-100">
            <div class="text-center">
            <img src="images/<?php echo $row['feature_image'];?>" class="card-img-top rounded" style="width:50%; height:50%;" alt="..." >
            </div>
           
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['title'];?></h5>
                <p class="card-text"><?php echo $row['content'];?></p>
                
              </div>
            </div>
 <!--comments starts here--->
            <div class="card my-4">
                  <div class="card-header">
                    <h5>Comments </h5>
                  </div>
                  <div class="card-body">
                  <?php
                      if(isset($_SESSION['message'])){
                          echo $_SESSION['message'];
                          unset($_SESSION['message']);
                      }
                  ?>

                  <?php
                     $sql5="select * from comment where post_id=$id and status=1 order by id DESC";
                     $res=mysqli_query($conn,$sql5);
                     if(mysqli_num_rows($res)>0){
                       while($row=mysqli_fetch_assoc($res)){
                  ?>
                     <ul>
                       <li><?php echo $row['comment_text'];?></li>
                      <small class="tetx-right text-muted">
                         Posted by : <span><?php echo $row['email'];?></span>
                      </small>
                     </ul>
                  <?php 
                  
                }
              }
           ?>
                       
                        <form action="post.php?id=<?php echo $id;?>" method="post">
                        <div class="form-group">
                          <label for="email">Email :</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email here" required>
                        </div>
                        <div class="form-group">
                          <label for="comment">Comment :</label>
                          <textarea class="form-control" id="comment"  name="comment" rows="3" placeholder="Enter comments here" required></textarea>
                        </div>
                        <div class="form-group">
                          <input type="submit" name='comment_btn' class="btn btn-primary" value="comment">
                        </div>
                      </form>

                   
                  </div>
                </div>
<!--comments ends here--->

<?php
if(isset($_POST['comment_btn'])){
$email=$_POST['email'];
$email=mysqli_real_escape_string($conn,$email);
$email=htmlentities($email);

$comment=$_POST['comment'];
$comment=mysqli_real_escape_string($conn,$comment);
$comment=htmlentities($comment);

$id=$_GET['id'];
$id=mysqli_real_escape_string($conn,$id);
$id=htmlentities($id);

$sql4="insert into comment(post_id,comment_text,email) values($id,'$comment','$email')";
$res4=mysqli_query($conn,$sql4);
if($res4){
  
   $_SESSION['message']="<div class='badge badge-pill badge-success'>Comment added successfully.</div>";
   header("Location:post.php?id=$id");
  
}else{
    $_SESSION['message']="<div class='badge badge-pill badge-danger'>something went wrong.</div>";
   header("Location:post.php?id=$id");
}

}
?>
          </div>
        </div>
      </div>
    </div>
    <!--1st portion end here-->

    <!--------------2nd portion starts here--=---------------------------->
    <div class="col-md-3 col-lg-3 col-xl-3">

      <?php
  
       include "includes/sidebar.php";
  
      ?>
   
      </div>
  <!------------------------------2nd portion end here----------------------------->
  </div>
</div>
<!--------------------------container end here------------------->

<?php
}}else{
  header("Location:index.php");
}
include "includes/footer.php";

?>
