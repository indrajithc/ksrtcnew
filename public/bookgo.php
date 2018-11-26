<?php

/**
 * @Author: indran
 * @Date:   2018-11-22 10:20:11
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 20:11:06
 */
include_once('includes/header.php');
?>


<?php
$result = null;
$resultd = 0;
if (isset($_POST['s']) && isset($_POST['r'])) {

	if (isset($_POST['update'])) { 


		$params = array(
			'name' => $_POST['name'] ,
			'idproof' => $_POST['idproof'],
			'phno' => $_POST['phno'] ,
			'amount' => $_POST['amount'] ,
			'gender' => $_POST['gender'] ,
			'seats' => $_POST['seats'] ,
			'stop_id' => $_POST['r'] 
		);

		$resultd   = insertIntoTable( 'booking' , $params  ,   $db);


	}



	?>
	<?php 

	$rt = selectFromTable('amount', 'bus_stop', 'stop_id = '. $_POST['r'], $db);

	?>



	<section class="sale-flights-section-demo">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="p-5 m-5" style="magin:1rem; padding: 1rem; text-align: center;">

						<form class="form" method="post" style="text-align: center;">

							<?php 
							if(	$resultd ) {
								?>



								<div class="alert alert-success">

									<p>thank you for using</p>
									<a href=".">go home</a>
								</div>



								<?php
							} else {

								?>
								<center>


									<table>
										<tr>
											<th>name</th>
											<td><input type="text" class=" form-control" required name="name"></td>
										</tr>
										<tr>
											<th>AADHAR</th>
											<td><input type="number" minlength="14" class=" form-control" required name="idproof"></td>
										</tr>
										<tr>
											<th>phone no</th>
											<td><input type="number" minlength="10" maxlength="10" class=" form-control" required name="phno"></td>
										</tr>
										<tr>
											<th>amount</th>
											<td><input type="number" readonly  class=" form-control"  value="<?php echo $rt;  ?>" required name="amount"></td>
										</tr>
										<tr>
											<th>gender</th>
											<td>
												<input type="radio" class="  fo " required name="gender" value="male">  male
												<input type="radio" class=" for ol" required name="gender" value="female"> female
											</td>
										</tr>

										<tr>
											<th>seats</th>
											<td><input type="text" readonly  class=" form-control" value="<?php echo $_POST['s']; ?>" required name="seats"></td>
										</tr>
									</table>



								</center>
								<div class="form-group">
									<label class="form-label"></label>

									<input type="hidden" name="r" value="<?php echo $_POST['r']; ?>">
									<input type="hidden" name="s" value="<?php echo $_POST['s']; ?>">

									<div class="form-group">
										<label class="form-label"></label>
										<input type="submit" class="btn btn-success" name="update" value="book now">
									</div>

								</div>

								<?php
							}
							?>
						</form>
						
					</div>

				</div>

			</div>
		</div>
	</section>



	<?php 


} else {
	?>
	<script type="text/javascript">
		location.href="./";
	</script>

	<?php
}
include_once('includes/footer.php'); 
?>