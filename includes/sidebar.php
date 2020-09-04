<?php
include "includes/dbh.php";
?>
 <!--search blog setion starts here-->
 <div class="card" style="width: 100%; padding:2%; margin-bottom:5%;">
<form style="text-align:left;" action='search.php' method='GET'>
  <div class="form-group">
    <label for="search"><h5 >Search Blog<h5></label>
    <input type="text" class="form-control" id="search" name="search" placeholder="Search Blog here">
  </div>
  <hr>
  <div style="text-align:center;">
  <button type="submit" class="btn" name='submit' style="display: inline-block; background-color:rgb(15,117,188); color:white;">Search</button>
  </div>
</form>
</div>
  <!--search blog section ends here-->

    <!--trending blog section starts here-->
      <div class="card" style="width: 100%;">

        <div class="card-header">
          <h5 style="text-align:center;">Top Trending</h5>
        </div>
        <?php
        $sql="select * from posts order by view DESC limit 6";
        $res=mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
        ?>
        <ul class="list-group list-group-flush">
          <?php
          while($row=mysqli_fetch_assoc($res)){
          ?>
          <li class="list-group-item">
          <a href="post.php?id=<?php echo $row['id'];?>"> <?php echo $row['title'];?></a>
          </li>
          <?php 
           }//end of while
        ?>
          
        </ul>
        <?php 
           }//end of if
        ?>
      </div>
      <!--trending blog section starts here-->