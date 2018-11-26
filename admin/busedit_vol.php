 

<?php include_once('includes/header.php') ?>
<?php
$db=new Database();
?>
<?php 
if (isset($_POST['submit'])) {	
	// $deponame = $_POST['depotname'];
 //       $stmnt=" SELECT * FROM `depot`  where `depotname`= '$deponame' ";

 //         $details = $db->display($stmnt);

 //        foreach ($details as $key => $value){
 //        	$id= $value['depoid'];
        	//$pswd=$value['depopswd'];
        //}


	//var_dump($_POST);
	$busid = $_POST['busno'];
	$bustype = $_POST['bustype'];
	$purchase = $_POST['purchase'];
	$seat = $_POST['seat'];
	$deponame = $_POST['depotname'];
	$producer = $_POST['producer'];
	$depotid = $_POST['depotid'];
	$submit=$_POST['submit'];


	$stmnt ='UPDATE  bus SET type = :type,purchasedate = :purchasedate,noofseats = :noofseats,depot = :depot,producer = :producer,depoid = :depoid WHERE  busid = :busid ';

	$params=array(


		':busid'        =>  $busid,
		':type'       =>  $bustype,
		':purchasedate'    =>  $purchase,

		':noofseats'     =>  $seat,
		':depot'       =>  $deponame,
		':producer'        =>  $producer,
		':depoid'   =>  $depotid,
         // ':longestroute'    =>  $lngstsrc.$lngstdes,
         // ':topcollection'   =>  $tpsrc.$tpdes,
         // ':income'          =>  $income,

	);


	$interm = selectFromTable(' * ', ' bus', " busid = '$busid' " , $db);
	if (! $interm ) {
		$message[0] = 3;
		$message[1] = " missing values ";



	} else {
		$istrue=$db->execute_query($stmnt,$params);
		if($istrue){ 
			$message[0] = 1;
			$message[1] ="Successfully Added";
		}
		else{
			$message[0] = 4;  
			$message[1] ="Error";
		}
	}





}

?>


<div class="row">
	<div class="col-sm-12 ">
		
		<?php echo show_error($message); ?>
		<form name="frm2"  method="post">
			<?php  if (isset($_GET['id'])): ?>


				<div class="page-header">
					<div class="h3 mb-3 bg-primary text-white"><h1>Bus Details</h1>
					</div>
				</div>

				<?php 
				$idd = 0;
				if (isset($_GET['id'])) {
					$idd = $_GET['id'];

				} else {
					setLocation('admin/busedit.php');
				}

				$stmnt="  SELECT * FROM bus WHERE busid = '$idd'  ";


				$details = $db->display($stmnt);
				if (isset($details[0])) {
					$details = $details[0];
				}
				?>

				<?php if( $details ): ?>
					<form  action="" method="POST" data-parsley-validate >
						<input type="hidden" name="depotname" value="<?php echo selectFromTable('depotname', 'depot', ' depoid = "'. isit('depoid', $details).'" ', $db ); ?>"> 
						<input type="hidden" name="depotid" value="<?php echo selectFromTable('depoid', 'depot', ' depoid = "'. isit('depoid', $details).'" ', $db ); ?>">  
						<input type="hidden" class="form-control" id="busno" name="busno"  value="<?php echo isit('busid', $details) ?>"  placeholder="Enter Bus No" required="Required">  
						<div class="form-group">
							<label for="type">Type</label>
							<select name="bustype" value="select" class="form-control" id="bustype">
								<option value="Select" selected="selected" disabled="disabled">Select</option>
								<option value="ordinary" <?php if(isit('type', $details) == 'ordinary'){ echo 'selected'; }  ?>>Ordinary</option>
								<option value="superfast"  <?php if(isit('type', $details) == 'superfast'){ echo 'selected'; }  ?>>Super Fast</option>
								<option value="superdeluxe"  <?php if(isit('type', $details) == 'superdeluxe'){ echo 'selected'; }  ?>>Super Deluxe</option>
								<option value="venad"  <?php if(isit('type', $details) == 'venad'){ echo 'selected'; }  ?>>Venad</option>
								<option value="towntotown"  <?php if(isit('type', $details) == 'towntotown'){ echo 'selected'; }  ?>>Town to Town</option>
							</select>
						</div>
						<div class="form-group">
							<label for="purchase">Purchase Date</label>
							<input type="text" class="form-control datetimepicker" max-date="<?php echo Date('Y-m-d'); ?>" data-date-format="YYYY-M-D" id="purcase" name="purchase"   placeholder="Enter Bus No"   value="<?php echo isit('purchasedate', $details) ?>"  data-parsley-required="true"  >

						</div>

						<div class="form-group">
							<label for="seat">No of Seats</label>
							<input type="number" class="form-control" id="seat" name="seat"   value="<?php echo isit('noofseats', $details) ?>"    placeholder="Enter No of Seats" required="Required"> 
						</div>
						<div class="form-group">
							<label for="producer">Producer</label>
							<select name="producer" value="select" class="form-control"  name="producer" id="prducer" required="Required">
								<option value="Select" selected="selected" disabled="disabled">Select</option>
								<option value="Ashok Leyland"  <?php if(isit('producer', $details) == 'Ashok Leyland'){ echo 'selected'; }  ?>>Ashok Leyland</option>
								<option value="Tata"  <?php if(isit('producer', $details) == 'Tata'){ echo 'selected'; }  ?>>Tata</option>

							</select>
						</div>
						<input type="submit" name="submit" value="Submit" class="btn btn-success">
					</form>
					<?php else : ?>
						<div class="alert text-center alert-warning">
							<p>no data found</p>
						</div>

					<?php endif; ?>

				<?php endif; ?>



			</div> 
		</div>
	</form>
	<?php include_once('includes/footer.php') ?>
