<?php
include 'connect.php';
session_start();

for($i=0;$i<count($_POST['chkmem']);$i++){
	$id=$_POST['chkmem'][$i];

	$obj->Delete($id,"job_application");
}
echo "<script>alert('삭제되었습니다.');parent.location.reload();</script>";
?>
