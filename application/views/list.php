<!DOCTYPE html>
<html>
<head>
	<title>Crud_Application - View User </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
</head>
<body>

<div class="navbar navbar-dark bg-dark">
	<div class="container">
		<a href="#" class="navbar-brand">CRUD APPLICATION</a>
	</div>	
</div>
<div class="container" style="padding-top: 10px;">
	<div class="row">
		<div class="col-md-12">
			<?php
				$success= $this->session->userdata('success');
				if ($success != "") {
					?>
					<div class="alert alert-success"><?php echo $success; ?></div>
					<?php
				}
			?>
			<?php
				$failure= $this->session->userdata('failure');
				if ($failure != "") {
					?>
					<div class="alert alert-failure"><?php echo $failure; ?></div>
					<?php
				}
			?>
		</div>
	</div>
	<div class="row">
		<div class="col-6"><h3>View User</h3></div>
		<div class="col-6 text-right">
			<a href="<?php echo base_url().'index.php/user/create' ;?>" class="btn btn-primary">Create</a>
		</div>
	</div>
	
	<hr>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile No</th>
					<th>Date Of Berth</th>
					<th>Pin Code</th>
					<th width="100">Edit</th>
					<th width="100">Delete</th>
				</tr>
				<?php if(!empty($users)) {	foreach($users as $user) { ?>
					<tr>
						<td><?php echo $user['id']?></td>
						<td><?php echo $user['name']?></td>
						<td><?php echo $user['email']?></td>
						<td><?php echo $user['mobile_no']?></td>
						<td><?php echo $user['dob']?></td>
						<td><?php echo $user['pin_code']?></td>
						<td>
							<a href="<?php echo base_url().'index.php/user/edit/'.$user['id']?>" class="btn-primary btn">Edit</a>
						</td>
						<td>
							<a href="<?php echo base_url(). 'index.php/user/delete/'.$user['id']?>" class="btn btn-danger" >Delete</a>
						</td>
					</tr>

				<?php }	} else { ?>
				<tr>
					<td colspan="5">Records not found</td>
				</tr>
			<?php }?>
			</table>
		</div>
	</div>
</div>
</body>
</html>