<?php
$data = json_decode('[{"id":"1","employee_name":"Tiger Nixon","employee_salary":"320800","employee_age":"61","profile_image":"default_profile.png"},{"id":"2","employee_name":"Garrett Winters","employee_salary":"434343","employee_age":"63","profile_image":"default_profile.png"},{"id":"3","employee_name":"Ashton Cox","employee_salary":"86000","employee_age":"66","profile_image":"default_profile.png"},{"id":"4","employee_name":"Cedric Kelly","employee_salary":"433060","employee_age":"22","profile_image":"default_profile.png"},{"id":"5","employee_name":"Airi Satou","employee_salary":"162700","employee_age":"33","profile_image":"default_profile.png"},{"id":"6","employee_name":"Brielle Williamson","employee_salary":"372000","employee_age":"61","profile_image":"default_profile.png"},{"id":"7","employee_name":"Herrod Chandler","employee_salary":"137500","employee_age":"59","profile_image":"default_profile.png"},{"id":"8","employee_name":"Rhona Davidson","employee_salary":"327900","employee_age":"55","profile_image":"default_profile.png"},{"id":"9","employee_name":"Colleen Hurst","employee_salary":"205500","employee_age":"39","profile_image":"default_profile.png"},{"id":"10","employee_name":"Sonya Frost","employee_salary":"103600","employee_age":"23","profile_image":"default_profile.png"}]');

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Generate PDf files</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<body>
	<div class="container">
      <div class="">
        <h2>Generate PDF file using mPDF and PHP</h2>
		
        <div class="col-sm-8">
		<div class="well"><a class="btn btn-success" href="generate_pdf.php" target="_blank">Export</a></div>
		<table id="employee_grid" class="table table-condensed table-hover table-striped" width="60%" cellspacing="0" data-toggle="bootgrid">
			<thead>
				<tr>
					<th>Empid</th>
					<th>Name</th>
					<th>Salary</th>
					<th>Age</th>
				</tr>
			</thead>
			<tbody>
			 <?php foreach($data as $k=>$emp): ?>
			<tr>
			<td><?php echo $emp->id;?></td>
			<td><?php echo $emp->employee_name;?></td>
			<td><?php echo $emp->employee_salary;?></td>
			<td><?php echo $emp->employee_age;?></td>
			</tr>
			 <?php endforeach; ?>
			</tbody>
		</table>
    </div>
      </div>
    </div>
</body>
</html>
