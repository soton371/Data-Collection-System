<?php 

	require_once('inc/db.php');


	//variable
	
	$erorr = '';
	$success = '';
	

	if (isset($_POST['submit'])) {
		if (!empty($_POST['emp_nam']) && !empty($_POST['emp_id'])) {
			
			$name 		= $_POST['emp_nam'];
			$emp_id   	= $_POST['emp_id'];
			$department = $_POST['emp_dep'];
			$salary   	= $_POST['emp_sal'];
			$address   	= $_POST['emp_add'];

			global $dbcontection;
			$sql = "INSERT INTO emp_info(emp_nam,emp_id,emp_dep,emp_sal,emp_add) VALUES('$name','$emp_id','$department','$salary','$address')";

			$final_data = $dbcontection -> query($sql);

			if ($final_data) {
				$success = '<p class="text-success text-center">success</p>';
			}
			

		} else {
			$erorr = '<p class="text-danger text-center">please enter name and id</p>';
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
		<h2 class="text-center text-capitalize text-primary">Employer Recodes</h2>
		
		<form action="#" method="POST">
			<div class="form-group">
				<label for="emp_nam">Name:</label>
				<input name="emp_nam" class="form-control" type="text" placeholder="enter employer name">
			</div>

			<div class="form-group">
				<label for="emp_id">ID:</label>
				<input name="emp_id" class="form-control" type="text" placeholder="enter employer id">
			</div>

			<div class="form-group">
				<label for="emp_dep">Department:</label>
				<input name="emp_dep" class="form-control" type="text" placeholder="enter employer department">
			</div>

			<div class="form-group">
				<label for="emp_sal">Salary:</label>
				<input name="emp_sal" class="form-control" type="text" placeholder="enter employer salary">
			</div>

			<div class="form-group">
				<label for="emp_add">Address:</label>
				<textarea name="emp_add" class="form-control" rows="2"></textarea>
			</div>
			<div class="form-group">
				<input name="submit" type="submit" value="SUBMIT" name="submit" class="btn btn-primary form-control">
			</div>

			
		</form>

		<?php echo $erorr; echo $success; ?>

	</div>
	
<script src="assetes/js/jquery-3.4.1.slim.min.js"></script>
<script src="assetes/js/popper.min.js"></script>
<script src="assetes/js/bootstrap.min.js"></script>
</body>
</html>