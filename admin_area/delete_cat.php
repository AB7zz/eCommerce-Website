<?php
include ("includes/db.php");
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php', '_self');</script>";
}
else {
?>
<?php
if(isset($_GET['delete_categories'])){
	$delete_id = $_GET['delete_categories'];
	$delete_cat = "delete from medcategories where cat_id = '$delete_id'";
	$run_delete = mysqli_query($con, $delete_cat);
	if($run_delete){
		echo "<script>window.open('index2.php?view_categories','_self');</script>";
	}
}
?>
<?php
}
?>