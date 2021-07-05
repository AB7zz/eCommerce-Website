<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<?php
if(isset($_GET['delete_user'])){
	$delete_id = $_GET['delete_user'];
	$delete_user = "delete from admin where admin_id = '$delete_id'";
	$run_delete = mysqli_query($con, $delete_user);
	if($run_delete){
		echo "<script>window.open('index2.php?view_user','_self');</script>";
	}
}
?>
<?php
}
?>