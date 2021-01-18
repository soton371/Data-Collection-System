<?php 

	require_once('inc/db.php');

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

	<div class="view_body">
		<form action="view_info.php" method="GET">
			<div class="form-group">
				<input class="form-control" type="search" name="search_bar" placeholder="Name Or NID">
			</div>
			<div class="form-group">
				<input class="form-control btn-info" type="submit" name="search_btn" value="Serach">
			</div>

			<?php 
				if (isset($_GET['search_btn'])) {
					$search_result = $_GET['search_bar'];

					global $dbcontection;
					$serach_sql = "SELECT * FROM emp_info WHERE emp_nam='$search_result' OR emp_id='$search_result'";
					$stmt = $dbcontection->query($serach_sql);
					while ($data_rows = $stmt->fetch_assoc()) {
						
						$id = $data_rows['id'];
						$emp_nam = $data_rows['emp_nam'];
						$emp_id  = $data_rows['emp_id'];
						$emp_dep = $data_rows['emp_dep'];
						$emp_sal = $data_rows['emp_sal'];
						$emp_add = $data_rows['emp_add'];

						?>
						<table class="table text-center">
							<thead>
								<tr>
									<th>ID</th>
								    <th>Name</th>
								    <th>NID</th> 
								    <th>Department</th>
								    <th>Salary</th>
								    <th>Address</th>
								    <th>Update</th>
								    <th>Delete</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $id ?></td>
									<td><?php echo $emp_nam ?></td>
									<td><?php echo $emp_id ?></td>
									<td><?php echo $emp_dep ?></td>
									<td><?php echo $emp_sal ?></td>
									<td><?php echo $emp_add ?></td>
									<td><a href="update.php?id=<?php echo $id ?>">Update</a></td>
									<td><a class="text-danger" href="delete.php?id=<?php echo $id ?>">Delete</a></td>
								</tr>
							</tbody>
						</table>
						<?php
					}
				}
			?>
		</form>
		<table class="table text-center">
			<h2 class="text-center text-capitalize text-success mb-4">Employer Information</h2>
			<thead>
			  <tr>
			  	<th>ID</th>
			    <th>Name</th>
			    <th>NID</th> 
			    <th>Department</th>
			    <th>Salary</th>
			    <th>Address</th>
			    <th>Update</th>
			    <th>Delete</th>
			  </tr>
			</thead>
			<tbody>
				<?php 

					global $dbcontection;

					$sql = "SELECT * FROM emp_info";
					$stmt = $dbcontection -> query($sql);
					while ($data_rows = $stmt->fetch_assoc()) {
						
						$id = $data_rows['id'];
						$emp_nam = $data_rows['emp_nam'];
						$emp_id  = $data_rows['emp_id'];
						$emp_dep = $data_rows['emp_dep'];
						$emp_sal = $data_rows['emp_sal'];
						$emp_add = $data_rows['emp_add'];

					
				?>
				<tr>
					<td><?php echo $id ?></td>
					<td><?php echo $emp_nam ?></td>
					<td><?php echo $emp_id ?></td>
					<td><?php echo $emp_dep ?></td>
					<td><?php echo $emp_sal ?></td>
					<td><?php echo $emp_add ?></td>
					<td><a href="update.php?id=<?php echo $id ?>">Update</a></td>
					<td><a class="text-danger" href="delete.php?id=<?php echo $id ?>">Delete</a></td>
				</tr>

				<?php 
					}
				?>
			</tbody>
		</table>
	</div>
	
<script src="assetes/js/jquery-3.4.1.slim.min.js"></script>
<script src="assetes/js/popper.min.js"></script>
<script src="assetes/js/bootstrap.min.js"></script>
</body>
</html>