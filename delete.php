<?php 

	require_once('inc/db.php');

	@$delete_id = $_GET['id'];
	//variable
	
	$erorr = '';
	$success = '';
	

	if (isset($_POST['submit'])) {
			
		$name 		= $_POST['emp_nam'];
		$emp_id   	= $_POST['emp_id'];
		$department = $_POST['emp_dep'];
		$salary   	= $_POST['emp_sal'];
		$address   	= $_POST['emp_add'];

		global $dbcontection;
		$sql = "DELETE FROM emp_info WHERE id='$delete_id' ";

		$final_data = $dbcontection -> query($sql);

		if ($final_data) {
			echo "<script>window.open('view_info.php?id=delete_data','_self')</script>";
		}
		
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CURD</title>
	<link rel="stylesheet" href="assetes/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="form_body">
		<h2 class="text-center text-capitalize text-danger">Deletete Employer Recodes</h2>

		<?php  

			global $dbcontection;

			$up_sql = "SELECT * FROM emp_info WHERE id='$delete_id'";
			$stmt = $dbcontection -> query($up_sql);

			while ($pre_data = $stmt->fetch_assoc()) {
				$id 	 = $pre_data['id'];
				$emp_nam = $pre_data['emp_nam'];
				$emp_id  = $pre_data['emp_id'];
				$emp_dep = $pre_data['emp_dep'];
				$emp_sal = $pre_data['emp_sal'];
				$emp_add = $pre_data['emp_add'];
			}
		?>
		
		<form action="delete.php?id=<?php echo $delete_id ?>" method="POST">
			<div class="form-group">
				<label for="emp_nam">Name:</label>
				<input name="emp_nam" class="form-control" type="text" value="<?php echo @$emp_nam ?>" placeholder="enter employer name">
			</div>

			<div class="form-group">
				<label for="emp_id">ID:</label>
				<input name="emp_id" class="form-control" type="text" value="<?php echo @$emp_id ?>" placeholder="enter employer id">
			</div>

			<div class="form-group">
				<label for="emp_dep">Department:</label>
				<input name="emp_dep" class="form-control" type="text" value="<?php echo @$emp_dep ?>" placeholder="enter employer department">
			</div>

			<div class="form-group">
				<label for="emp_sal">Salary:</label>
				<input name="emp_sal" class="form-control" type="text" value="<?php echo @$emp_sal ?>" placeholder="enter employer salary">
			</div>

			<div class="form-group">
				<label for="emp_add">Address:</label>
				<textarea name="emp_add" class="form-control" rows="2"><?php echo @$emp_add ?></textarea>
			</div>
			<div class="form-group">
				<input name="submit" type="submit" value="SUBMIT" name="submit" class="btn btn-danger form-control">
			</div>

			
		</form>

		<?php echo $erorr; echo $success; ?>

	</div>
	
<script src="assetes/js/jquery-3.4.1.slim.min.js"></script>
<script src="assetes/js/popper.min.js"></script>
<script src="assetes/js/bootstrap.min.js"></script>
</body>
</html>