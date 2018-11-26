<?php

/**
 * @Author: indran
 * @Date:   2018-11-26 14:54:06
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 16:43:07
 */
include_once('includes/header.php') ?>
<?php
$db=new Database();
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
			<h3 class="text-primary">Add Bus Schedule</h3>
		</div>
	</div>
</section>
<section>
	<div class="row p-3 bg-white"  align="center">
		<div class="offset-md-2 col-sm-8" align="left" >


			<?php echo show_error($message); ?>
			<form action="" method="post">

				<div class="form-group">
					<label for="depotname">Depot Name</label>
					<?php 

					?>

					<select name="depotid" value="select" class="form-control" id="depotid" OnChange="this.form.submit()">


						<option value="Select" selected="selected" disabled="disabled">Select</option>
						<?php
						$depotid = null;

						$sql="SELECT * FROM `depot` WHERE 1";

						$result=$db->display($sql);
						foreach ($result as $key => $value) {
							$depotid = $value['depoid']; 

							$selectedMe = "";
							if(isset($_POST['depotid']))
								if($_POST['depotid'] == $depotid )
									$selectedMe = "  selected ";

								$name = $value['depotname'];

								echo "<option value='".$value['depoid']."'   $selectedMe>$name</option>";

							}
							?>

						</select>
					</div>
				</form>




				<?php if(isset($_POST['depotid'])): ?>
					<form action="" method="post">
						
						<input type="hidden" name="depotid" value="<?php echo $_POST['depotid']; ?>"> 

						<div class="form-group">
							<label for="depotname">Select Bus </label>
							<?php 

							?>

							<select name="busid" value="select" class="form-control" id="busid" OnChange="this.form.submit()">


								<option value="Select" selected="selected" disabled="disabled">Select</option>
								<?php
								$busid = null;

								echo $sql="SELECT * FROM `bus` WHERE depoid = " .$_POST['depotid'];

								$result=$db->display($sql);
								foreach ($result as $key => $value) {
									$busid = $value['busid']; 

									$selectedMe = "";
									if(isset($_POST['busid']))
										if($_POST['busid'] == $busid )
											$selectedMe = "  selected ";



										echo "<option value='".$value['busid']."'   $selectedMe>" . $value['type'] ."-". $value['busid'] . "</option>";

									}
									?>

								</select>
							</div>
						</form>



						<?php if(isset($_POST['busid'])): ?>

							<form action="" method="post">

								<input type="hidden" name="depotid" value="<?php echo $_POST['depotid']; ?>"> 
								<input type="hidden" name="busid" value="<?php echo $_POST['busid']; ?>"> 


								<select name="destioantion" value="select" class="form-control" id="depotid"  required ">


									<option value="Select" selected="selected" disabled="disabled">Select</option>
									<?php
									$depotid = null;

									$sql="SELECT * FROM `depot` WHERE 1";

									$result=$db->display($sql);
									foreach ($result as $key => $value) {

										$name = $value['depotname'];
										if( $value['depoid'] != $_POST['depotid'])
											echo "<option value='".$value['depoid']."'   $selectedMe>$name</option>";

									}
									?>

								</select>

								<div class="form-group mt-3">
									<button type="submit" name="gogogo" class="btn btn-success">ad</button>
								</div>
							</form>

							<?php 

							?> 
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<?php include_once('includes/footer.php') ?>