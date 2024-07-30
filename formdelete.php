<?php include 'conn.php';
$id=$_GET['id'];
$query="DELETE FROM form WHERE id='$id'";
$result=mysqli_query($con,$query);
if($result){
    ?>
    <script>alert("Data Deleted successfully"); window.location.href="formshow.php";</script>;
    <?php 
}
else{
    ?>
    <script>alert("Data not deleted.Try Again")</script>;
    <?php
}
?>