<?php 
session_start();
	include 'db.php';

//=============start of query================

	if(isset($_POST['update_subject'])){
		$description = addslashes($_POST['description']);
		$delete = "UPDATE `tblsubjects` SET subj_desc='$description' WHERE autonum = '$_POST[autonum]'";
		$rundelete = mysqli_query($conn, $delete);
	}

	if(isset($_POST['remove_subject'])){
		
		$delete = "DELETE FROM `tblsubjects` WHERE autonum = '$_POST[autonum]'";
		$rundelete = mysqli_query($conn, $delete);
	}


	if(isset($_POST['save_subject'])){
		$subj_code = addslashes($_POST['subj_code']);
		$subj_desc = addslashes($_POST['subj_desc']);
		$accuntid = $_SESSION['accuntid'];

		$insert = "INSERT INTO `tblsubjects` (`subj_code`, `subj_desc`, `accuntid`) 
					VALUES ('$subj_code', '$subj_desc', '$accuntid')";
		$runinsert = mysqli_query($conn, $insert);
	}

	if(isset($_POST['load_subject'])){
		echo 
		'';?>
			<div class="row">
				
					<?php 
$theimage=0;
						$select = "SELECT * FROM `tblsubjects` WHERE accuntid= '$_SESSION[accuntid]'";
						$runselect = mysqli_query($conn, $select);
						while($rowselect = mysqli_fetch_assoc($runselect)){
$myimage = rand(1,4);
if($myimage == 1){
	$theimage = "images/image1.png";
}else if($myimage == 2){
	$theimage = "images/image2.png";
}else if($myimage == 3){
	$theimage = "images/image3.jpg";
}else if($myimage == 4){
	$theimage = "images/image4.png";
}

							echo 
							'
            <div class="col-lg-3">
                <div class="card h-100">
                  <img src="'.$theimage.'" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">'.$rowselect['subj_code'].'</h5>
                    <p onblur="getval(this,\''.$rowselect['autonum'].'\')" class="card-text" contenteditable="true">'.$rowselect['subj_desc'].'</p>
                  </div>
  
		<div class="btn-group" role="group" aria-label="Basic example">
		  <button type="button" class="btn btn-info">Add student</button>
		  <button type="button" class="btn btn-warning">Edit</button>
		  <button onclick="remove_subject(\''.$rowselect['autonum'].'\')" type="button" class="btn btn-danger">Delete</button>
		</div>
  
                </div>

            </div>
							';
						}
					?>
				</div>
		
		<?php echo'';
	} 

	?>

