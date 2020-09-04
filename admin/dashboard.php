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

<!-----------------recent post section start here----------------------------->
  <div class="col s12 m6 l6">
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
  <span><a href="edit.php?id=<?php echo $id; ?>"><i class="material-icons tiny dark blue-text">edit</i> Edit</a></span> | <span><a href="" id="<?php echo $id; ?>" class="delete"><i class="material-icons tiny red-text">clear</i> Delete</a></span> 
  </li>
<?php
}//end of while
}//end of if
else{
  echo "<div class='chip close grey white-text'>You have not any Post yet. Create New Post by Clicking Below Circular Button</div>";
}
?>
  

  </ul>
  </div>
<!-----------------recent post section end here----------------------------->

<!-----------------recent comments section start here----------------------------->
  <div class="col s12 m6 l6">
  <ul class="collection with-header">
  <li class="collection-header light-blue darken-3 white-text"><h5>Recent Comments</h5></li>
  <span id="message1"></span>

                  <?php
                     $sql5="select * from comment order by id DESC";
                     $res=mysqli_query($conn,$sql5);
                     if(mysqli_num_rows($res)>0){
                       while($row=mysqli_fetch_assoc($res)){
                  ?>
  <li class="collection-item">
  <a href=""><?php echo $row['comment_text'];?></a>
  <br>
  <span><a href="" class="approve" id=<?php echo $row['id']; ?>><i class="material-icons tiny green-text">done</i> Approve</a></span> | <span><a href="" class="remove" id=<?php echo $row['id'];?>><i class="material-icons tiny red-text">clear</i> Remove</a></span> 
  </li>
                <?php       }}?>

  </ul>
  </div>
  <!-----------------recent comments section end here----------------------------->
  
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

<!--javascript code for approve comment is as follows:-->
<script>
const approve=document.querySelectorAll(".approve");
console.log(approve);
approve.forEach(function(item,index)
{
console.log(item);
console.log(index);
item.addEventListener("click",approveNow)
})

function approveNow(e){
  e.preventDefault();
 // console.log("clicked");

 if (confirm("Do You Really want to Approve this comment?")){
  console.log("comment is approved");
  console.log(e.target.id);
  //code to redirect this logic to approve.php page

  const xhr=new XMLHttpRequest();
  xhr.open("GET","approve.php?id="+Number(e.target.id),true);//true will make this request async.

  xhr.onload=function(){
   const msg= xhr.responseText;

   const message=document.getElementById("message1");
   message.innerHTML=msg;
  }
  xhr.send();
 }
}

</script>
<!--javascript code for approve comment is finished here:-->


<!--javascript code for remove comment is as follows:-->
<script>
const remove=document.querySelectorAll(".remove");
console.log(remove);
remove.forEach(function(item,index)
{
console.log(item);
console.log(index);
item.addEventListener("click",removeNow)
})

function removeNow(e){
  e.preventDefault();
 // console.log("clicked");

 if (confirm("Do You Really want to remove this comment?")){
  console.log("comment is removed");
  console.log(e.target.id);
  //code to redirect this logic to remove.php page

  const xhr=new XMLHttpRequest();
  xhr.open("GET","remove.php?id="+Number(e.target.id),true);//true will make this request async.

  xhr.onload=function(){
   const msg= xhr.responseText;

   const message=document.getElementById("message1");
   message.innerHTML=msg;
  }
  xhr.send();
 }
}

</script>
<!--javascript code for remove comment is finished here:-->

<?php
}else{
$_SESSION['message'] ="<div class='chip close red black-text'>You are not Logged in. Please Login To Continue.</div>";
header("Location:login.php");
}
  ?>              
</body>
</html>

