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

<!------------------------body starts here--------------------------->

<!--------------if user is logged in then his session has setted and he can see this body portion
so we need to check session is setted or not with help of following code------------------------->
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

<!----------------------------main dashboard area start here-------------------------->
<div class="main">
  <div class="row">
    <div class="col s12 m12 l12">
       <div class="card-panel">
<!---------------------post section starts here-------------------------->    
       <ul class="collection with-header">
  <li class="collection-header light-blue darken-3 white-text"><h5>Recent Posts</h5></li>
<span id="message"></span>
<?php
$sql="select * from posts order by id desc";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
  while($row=mysqli_fetch_assoc($res)){
?>
  <li class="collection-item">
  <a href="">
  <?php
  echo $row['title'];
  $id=$row['id'];
  
  ?>
  </a><br>
  <span><a href="edit.php?id=<?php echo $id; ?>"><i class="material-icons tiny dark blue-text">edit</i> Edit</a></span> | <span><a href="" id="<?php echo $id; ?>" class="delete"><i class="material-icons tiny red-text">clear</i> Delete</a></span> | <span><a href=""><i class="material-icons tiny green-text">share</i> Share</a></span>
  </li>
<?php
}//end of while
}//end of if
else{
  echo "<div class='chip close grey white-text'>You have not any Post yet. Create New Post by Clicking Below Circular Button</div>";
}
?>
  </ul>
<!---------------------post section ends here-------------------------->    
       </div>
    </div>
  </div><!--row ends here----------->

<!--------------------create new post button start-------------------->
<div class="fixed-action-btn">
<a href="write.php" class="btn-floating btn btn-large pulse white-text"><i class="material-icons">edit</i></a>
</div>
<!--------------------create new post button end-------------------->

</div>
<!----------------------------main dashboard area end here-------------------------->
<?php
include "includes/footer.php";
?>
<script>
  $(document).ready(function(){
  $('.sidenav').sidenav();
  });
</script>
<!--javascript code for delete post is as follows:-->
<script>
const del=document.querySelectorAll(".delete");
console.log(del);
del.forEach(function(item,index)
{
console.log(item);
item.addEventListener("click",deleteNow)
})

function deleteNow(e){
  e.preventDefault();
 // console.log("clicked");

 if (confirm("Do You Really want to Delete this Post?")){
  // console.log("post is deleted");
  console.log(e.target.id);
  //code to redirect this logic to delete.php page

  const xhr=new XMLHttpRequest();
  xhr.open("GET","delete.php?id="+Number(e.target.id),true);

  xhr.onload=function(){
   const msg= xhr.responseText;

   const message=document.getElementById("message");
   message.innerHTML=msg;
  }
  xhr.send();
 }
}

</script>
<!--javascript code for delete post is finished here:-->
<?php
}else{
$_SESSION['message'] ="<div class='chip close red black-text'>You are not Logged in. Please Login To Continue.</div>";
header("Location:login.php");
}
  ?>              
</body>
</html>

