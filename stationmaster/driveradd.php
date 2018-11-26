<?php

/**
 * @Author: indran
 * @Date:   2018-11-25 10:46:23
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-25 10:49:55
 */

include_once('includes/header.php'); ?>




<?php



if(isset($_POST['submit-btn'])){


	$stmnt=" SELECT * FROM driver WHERE driverid= '" . $_POST['driverid'] ."' OR license= '" . $_POST['license'] ."' ";
	$result = $db->display( $stmnt);
	if( $result ){
		$message [0] = 2;
		$message [1] = ' driver is already exists'; 
	} else {



		unset($_POST["submit-btn"]);


		$istrue=insertInToTable( 'driver', $_POST,  $db);
		if($istrue){
					//$message=' added!';
			$message [0] = 1;
			$message [1] = ' Conductor added '; 
			
		}
		else
		{
			//$message=$istrue;	
		// $message=' value already exists';
			$message [0] = 3;
			$message [1] = ' something is wrong'; 
		}
	}

}
?>





<div class="card">
	<div class="card-body">

		<form  id="addevent"  action="" method="post" class="form-horizontal borderd-row" align="center" data-parsley-validate >

			<center>	<h3 class="h3 mb-3 font-weight-normal danger-text">Add driver</h3></center>




			<?php echo show_error($message); ?>

			<div class="form-group row">
				<label for="exampleInputName2" class="col-sm-3 col-form-label">Conductor ID</label>
				<div class="col-sm-9">
					<input type="text" class="form-control text-success" name="driverid" placeholder="Conductor ID" data-parsley-required="true"   value="<?php
					try {
						$keyge = "D_" . Date('Y') . "_"; 
						$keyge .= rand(100,999)."";
						$result = selectFromTable( 'COUNT(*) AS count ', 'driver' , "1", $db);
						if( isset($result[0]['count'])){
							$keyge  .=  $result[0]['count'];
						}
						echo $keyge ;
						} catch(Exception $e){
						}
						?>">
					</div>
				</div>




				<div class="form-group row">
					<label for="exampleInputName2" class="col-sm-3 col-form-label">Conductor User Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="username" placeholder="Conductor User Name" data-parsley-required="true"  required>
					</div>
				</div>

				<div class="form-group row">
					<label for="exampleInputName2" class="col-sm-3 col-form-label">Conductor Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="name" placeholder="Conductor Name" data-parsley-required="true"  required>
					</div>
				</div>
				<div class="form-group row">
					<label for="exampleInputName2" class="col-sm-3 col-form-label">Conductor phone no</label>
					<div class="col-sm-9">
						<input type="number" minlength="10" maxlength="10" class="form-control" name="phno" placeholder="Conductor phone no" data-parsley-required="true"  required>
					</div>
				</div>

				<div class="form-group row">
					<label for="exampleInputName2" class="col-sm-3 col-form-label">Conductor dob</label>
					<div class="col-sm-9">
						<input type="text" class="form-control datetimepicker" data-date-format="YYYY-M-D" name="dob" placeholder=" Conductor dob" data-parsley-required="true"  >

					</div>
				</div>





				<div class="form-group row">
					<label for="depot" class="col-sm-3 col-form-label">Depot Name</label>
					<div class="col-sm-9">
						<select name="depot" value="select" class="form-control" id="depot"  >


							<option value="Select" selected="selected" disabled="disabled">Select</option>
							<?php

							$sql="SELECT * FROM `depot` WHERE 1";


							$result=$db->display($sql);

							foreach ($result as $key => $value) { 
								$id = $value['depoid'];
								$name = $value['depotname']; 
								$selectedMe = "";
								if(isset($_POST['depotname']))
									if($_POST['depoid'] == $id )
										$selectedMe = "  selected "; 

									echo "<option value='$id'   $selectedMe>$name</option>"; 

								}
								?>


							</select>
						</div>
					</div>



					<div class="form-group row">
						<label for="exampleInputName2" class="col-sm-3 col-form-label">Conductor license no</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="license" placeholder="Conductor license no" data-parsley-required="true"  required>
						</div>
					</div>





					<div class="form-group row">
						<label for="exampleInputName2" class="col-sm-3 col-form-label">Conductor serviceyear</label>
						<div class="col-sm-9">
							<input type="text" class="form-control datetimepicker" data-date-format="YYYY-M-D" name="serviceyear" placeholder=" Conductor serviceyear" data-parsley-required="true"  >

						</div>
					</div>




					<div class="form-group row">
						<label for="exampleInputName2" class="col-sm-3 col-form-label">address</label>
						<div class="col-sm-9">

							<textarea type="textarea" class="form-control" name="address" placeholder="address Of Conductor" data-parsley-required="true"   style="height: 100px"></textarea>

						</div>
					</div>




				</br>


				<button type="submit"  class="btn btn-success mr-2 float-right"  name="submit-btn">Submit
				</button>






			</form>

		</div>

	</div>

	<?php   include_once('includes/footer.php'); ?>