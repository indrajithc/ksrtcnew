<?php

/**
 * @Author: indran
 * @Date:   2018-11-26 16:58:56
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 18:01:17
 */ 
include_once('includes/header.php') ?>
<?php
$db=new Database();


if (isset($_POST['dododod'])  ) {



	$params = array(
		'conductor' => $_POST['conductor'],
		'driver' => $_POST['driver']
	);

	$ressdg = updateTable('bus_route',  $params, 'route_id = ' . $_POST['route_id'] , $db);

	if($ressdg){ 
		$message[0] = 1;
		$message[1] ="Successfully updated";
	}
	else{
		$message[0] = "Error"; 
	}

}


if (isset($_POST['distanceAddd'])  ) {



	unset($_POST['distanceAddd']);


	$sdfsdf = selectFromTable( '*',  'bus_stop', '   route_id = "'. $_POST['route_id'].'" and  route_id = "'. $_POST['route_id'].'" and  s_to = "'. $_POST['s_to'].'"   ' , $db);
	if($sdfsdf) {
		$message[0] = 3;
		$message[1] =" already exist ";
	} else {
		$ressdg = insertIntoTable('bus_stop',  $_POST , $db);

		if($ressdg){ 
			$message[0] = 1;
			$message[1] ="Successfully updated";
		}
		else{
			$message[0] = "Error"; 
		}
	}
	

}





if (isset($_POST['gogogo'])) {	
	// $deponame = $_POST['depotname'];
 //       $stmnt=" SELECT * FROM `depot`  where `depotname`= '$deponame' ";

 //         $details = $db->display($stmnt);

 //        foreach ($details as $key => $value){
 //        	$id= $value['depoid'];
        	//$pswd=$value['depopswd'];
        //}

	


	$depotid = $_POST['depotid'];
	$busid = $_POST['busid'];
	$destioantion = $_POST['destioantion'];


	$stmnt ='insert into bus_route (depo_from,bus_id, depo_to) values( :depotid,:busid,:destioantion)';

	$params=array(


		':depotid'        =>  $depotid,
		':busid'       =>  $busid,
		':destioantion'    =>  $destioantion

	);


	$interm = selectFromTable(' * ', ' bus_route ', " depo_from = '$depotid' AND depo_to = '$destioantion' AND  bus_id = '$busid' " , $db);
	if ( $interm ) {
		$message[0] = 3;
		$message[1] = " already exists";



	} else {

		$istrue=$db->execute_query($stmnt,$params);
		if($istrue){ 
			$message[0] = 1;
			$message[1] ="Successfully Added";
		}
		else{
			$message[0] = "Error"; 
		}
	}





}

?>


<section class="mb-2">
	<div class="row p-3 bg-white"  align="center">
		<div class="offset-md-2 col-sm-8" align="left" >
			<h3 class="text-primary">Add Bus stops</h3>
		</div>
	</div>
</section>

<?php 

if (isset($_GET['id'])) {
	?>


	<a class="btn btn-success" href="stationmaster/route_stops.php"> view all </a>




	<section>
		<div class="row p-3 bg-white"  align="center">
			<div class="offset-md-2 col-sm-8" align="left" >


				<?php echo show_error($message); ?>



				<?php



				$stmnt=" SELECT * FROM `bus_route` where route_id = " .$_GET['id'] ;


				$details = $db->display($stmnt);


				?>

				<?php if( $details ): ?>
					<div class="table-responsive">

						<table class="table   table-bordered bg-white">
							<thead>
								<tr> 
									<th scope="col">BUS</th>
									<th scope="col " class="text-uppercase">source</th> 
									<th scope="col " class="text-uppercase">destination</th> 
								</tr>
							</thead>

							<tbody>

								<?php foreach ($details as $key => $value): ?>
									<tr> 
										<td><?php echo selectFromTable( 'busid', 'bus', 'busid = "' . $value['bus_id'].'"',  $db) ;  ?></td> 
										<td><?php echo selectFromTable( 'depotname', 'depot', 'depoid = ' . $value['depo_from'] , $db);  ?></td>
										<td><?php echo selectFromTable( 'depotname', 'depot', 'depoid = ' . $value['depo_to'],  $db);  ?></td> 

									</tr> 
								<?php endforeach; ?>
							</tbody>
						</table>

					</div>

				<?php endif; ?>



				<form action="" method="post" class="p-3 border ">
					<div class="row">

						<div class="form-group col-6">

							<input type="hidden" name="route_id" value="<?php echo $_GET['id']; ?>">  
							<label>conductor</label>

							<select name="conductor"  class="form-control" id="depotid"  required ">


								<option value="Select" selected="selected" disabled="disabled">Select</option>
								<?php
								$depotid = null;

								$sql="SELECT * FROM `conductor` WHERE conductor_id NOT IN (  SELECT conductor FROM `bus_route`  )";

								$result=$db->display($sql);
								foreach ($result as $key => $value) {
									$selectedMe ="";
									if( $value['conductor_id'] == $details[0]['conductor'])
										$selectedMe = "  selected ";


									echo "<option value='".$value['conductor_id']."'   $selectedMe>".$value['conductorid']."-" .$value['name']."</option>";

								}
								?>

							</select>

						</div>



						<div class="form-group col-6">

							<input type="hidden" name="route_id" value="<?php echo $_GET['id']; ?>">  
							<label>driver</label>

							<select name="driver"  class="form-control" id="depotid"  required ">


								<option value="Select" selected="selected" disabled="disabled">Select</option>
								<?php
								$depotid = null;

								$sql="SELECT * FROM `driver` WHERE  driver_id NOT IN (  SELECT driver FROM `bus_route`  ) ";

								$result=$db->display($sql);
								foreach ($result as $key => $value) {
									$selectedMe ="";
									if( $value['driver_id'] == $details[0]['driver'])
										$selectedMe = "  selected ";


									echo "<option value='".$value['driver_id']."'   $selectedMe>".$value['driverid']."-" .$value['name']."</option>";

								}
								?>

							</select>

						</div>



					</div>

					<div class="form-group mt-3">
						<button type="submit" name="dododod" class="btn btn-success">ad</button>
					</div>
				</form>


				<form action="" method="post" class="mt-3" data-parsley-validate>

					<input type="hidden" name="route_id" value="<?php echo $_GET['id']; ?>">  
					<div class="form-group">
						<label for="depotname">From</label>
						<input type="text" name="s_from" class="form-control" required> 
					</div>


					<div class="form-group">
						<label for="depotname">To</label>
						<input type="text" name="s_to" class="form-control" required> 
					</div>


					<div class="form-group">
						<label for="depotname">amount</label>
						<input type="number" name="amount" class="form-control" required> 
					</div>


					<div class="form-group">
						<label for="depotname">distance</label>
						<input type="number" name="distance" class="form-control" required> 
					</div>


					<div class="form-group">
						<label for="depotname"></label>
						<input type="submit" name="distanceAddd" value="add" class="btn btn-warning" required> 
					</div>




				</form>



				<?php 

				?>  
			</div>
		</div>
	</section>


	<section>


		<?php



		$stmnt=" SELECT * FROM `bus_stop` where route_id = " .$_GET['id'] ;


		$details = $db->display($stmnt);


		?>

		<?php if( $details ): ?>

			<h4 class="mt-4">Added routes</h4>
			<div class="table-responsive">

				<table class="table   table-bordered bg-white">
					<thead>
						<tr>  
							<th scope="col">FROM</th> 
							<th scope="col">TO</th> 
							<th scope="col">AMOUNT</th> 
							<th scope="col">KM	</th> 
						</tr>
					</thead>

					<tbody>

						<?php foreach ($details as $key => $value): ?>
							<tr> 
								<td><?php echo $value['s_from'] ;  ?></td> 
								<td><?php echo $value['s_to'] ;  ?></td> 
								<td><?php echo $value['amount'] ;  ?></td>  
								<td><?php echo $value['amount'] ;  ?></td>  

							</tr> 
						<?php endforeach; ?>
					</tbody>
				</table>

			</div>

		<?php endif; ?>



	</section>



	<?php
} else  {

	?>




	<?php



	$stmnt=" SELECT * FROM `bus_route` where depo_from = " .$_SESSION[SYSTEM_NAME . 'userid1'] ;


	$details = $db->display($stmnt);


	?>

	<?php if( $details ): ?>
		<div class="table-responsive">

			<table class="table dataTable table-hover bg-white">
				<thead>
					<tr> 
						<th scope="col">BUS</th>
						<th scope="col">FROM</th> 
						<th scope="col">TO</th>
						<th scope="col">add stop</th> 
					</tr>
				</thead>

				<tbody>

					<?php foreach ($details as $key => $value): ?>
						<tr> 
							<td><?php echo selectFromTable( 'busid', 'bus', 'busid = "' . $value['bus_id'].'"',  $db) ;  ?></td> 
							<td><?php echo selectFromTable( 'depotname', 'depot', 'depoid = ' . $value['depo_from'] , $db);  ?></td>
							<td><?php echo selectFromTable( 'depotname', 'depot', 'depoid = ' . $value['depo_to'],  $db);  ?></td> 
							<td>
								<a class="btn" href="stationmaster/route_stops.php?id=<?php echo $value['route_id']; ?>"> add stops  </a>
							</td>


								<!-- 	<td>
										<form action="" method="post">
											<input type="hidden" value="<?php echo $value['depoid']; ?>" name="depoid">
											
											<button name="submit" class="btn btn-sm btn-info "><i class="fas fa-trash-alt" ></i>go</button>
										</form>
									</td>
								-->

<!-- 
	<td><a href="admin/stationmasteredit_vol.php?id=<?php echo $value['depoid']; ?>" id=<?php echo $value['depoid']; ?>"   class="btn btn-sm btn-warning "  ><i class="far fa-edit"></i></a>     </td> -->
</tr>



<?php endforeach; ?>
</tbody>
</table>

</div>

<?php endif; ?>

<?php 	
}
?>


<?php include_once('includes/footer.php') ?>