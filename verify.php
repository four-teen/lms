<?php 
	session_start();

	include 'db.php';

		if(isset($_GET['uname'])){
		  $select="SELECT * FROM `tblaccounts` 
		  WHERE
		  username='$_GET[uname]' AND password='$_GET[passw]'
		  ";
		  $runselect = mysqli_query($conn, $select);
		  $rowselect = mysqli_fetch_assoc($runselect);
		  $_SESSION['username'] = $rowselect['username'];
			$_SESSION['accuntid'] = $rowselect['accuntid'];
		 if(mysqli_num_rows($runselect)==1){
		 	header('location:add_subjects.php');
		 }else{
		 	echo 'Invalid username or password!';
		 }

	
		}

	?>

