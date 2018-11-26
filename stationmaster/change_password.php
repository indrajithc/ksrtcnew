<?php

/**
 * @Author: indran
 * @Date:   2018-11-25 09:50:19
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-25 10:08:07
 */



include_once('includes/header.php'); ?>





<?php

if (isset($_POST['update'])) {
	
	$password0 = $_POST['password0'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];


	$temp = selectFromTable('*', 'stationmaster', ' depotpswd ="'. $password0 .'" AND stationmasterid =' . $_SESSION[SYSTEM_NAME."userid0"] , $db );
	if($password1 != $password2) {
		$message[0] = 3;
		$message[1] = " the new password and confirm password fields must be the same ";

	} else if( $temp  )  {

	//	'password' => hash('sha256', encrypt($password1)) 
		
		$params= array ( 
			'depotpswd' => $password1 
		);
		$result = updateTable('stationmaster', $params, 'stationmasterid =' . $_SESSION[SYSTEM_NAME."userid0"], $db );

		if ($result ) {

			$message[0] = 1;
			$message[1] = " password updated successfully ";

		} else { 
			$message[0] = 4;
			$message[1] = " there is some error occurred,may be invalid input ";
		}

	} else {
		$message[0] = 3;
		$message[1] = " Invalid current password ";
	} 



}



?>





<div class="row flex-grow">
	<div class="col-12">



		<div class="card">
			<div class="card-body">
<!-- 	<h4 class="card-title">Horizontal Form</h4>
	<p class="card-description"> Horizontal form layout </p> -->


	<center>	<h3 class="h3 mb-3 font-weight-normal danger-text">Change  Your Password</h3></center>

	<form class="forms-sample" action="" method="post" data-parsley-validate>
		
		<div class="form-group row">
			<label for="exampleInputPassword0" class="col-sm-3 col-form-label">Current Password</label>
			<div class="col-sm-9">
				<input type="password"  name="password0" class="form-control" id="exampleInputPassword0" placeholder="Current Password"> </div>
			</div>

			<div class="form-group row">
				<label for="exampleInputPassword1" class="col-sm-3 col-form-label">New Password</label>
				<div class="col-sm-9">
					<input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="New Password"> </div>
				</div>

				<div class="form-group row">
					<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Confirm Password</label>
					<div class="col-sm-9">
						<input type="password" name="password2"  data-parsley-equalto="#exampleInputPassword1" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password"> </div>
					</div>

					<?php echo show_error($message); ?>
					<button type="submit" name="update" class="btn btn-success mr-2 float-right">Update</button> 
				</form>
			</div>
		</div>



	</div>

</div>





<?php include_once('includes/footer.php'); ?>