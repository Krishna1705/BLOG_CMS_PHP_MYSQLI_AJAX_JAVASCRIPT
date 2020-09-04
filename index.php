<?php

include "includes/header.php";

?>

<!--blog section-list of blogs starts here-->
<div class="container-fluid">
  <div class="row">


    <!--1st portion starts here-->
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">

      
<div class="row">
<?php
ob_start();
/*session_start();session create kwa mate*/
include "includes/dbh.php";
$sql="select * from posts order by id desc";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){

 while($row=mysqli_fetch_assoc($res)){
?>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">

        <div class="col mb-4">
            <div class="card">
              <img src="images/<?php echo $row['feature_image'];?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['title'];?></h5>
                <p class="card-text">
<?php
echo substr($row['content'], 0, 150).'...';
?>
            
                </p>
                  <div style="text-align:center;">
                  <a href="post.php?id=<?php  echo $row['id'];?>" class="btn btn-primary" style="display: inline-block; background-color:rgb(15,117,188); color:white;">Read More</a>
                  </div>
              </div>
            </div>
          </div>

</div>
        
<?php
 }
}
?>

</div><!----row ends here-->    

       
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

<!--blog section-list of blogs ends here-->
<?php

include "includes/footer.php";

?>