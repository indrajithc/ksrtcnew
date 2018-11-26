<?php

/**
 * @Author: indran
 * @Date:   2018-11-25 10:46:46
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-25 10:50:46
 */



include_once('includes/header.php');

?>
<?php

if (isset($_POST['make_delete'])) {
	$action = 0;


	$id = isit('id', $_POST, 0 );
	$id = unIndexMe((int) $id );

	if($_POST['make_delete'] == 1)
		$action = 1;


	$params = array(
		'awrd_delete' => $action
	); 

	$istrue = $db->execute_query("  DELETE FROM driver WHERE driver_id = " . $id);

	if($istrue){

		$message [0] = 1;
		$message [1] = ' updated ';  

	}  else {

		$message [0] = 4;
		$message [1] = ' update error ';  
	}

}

?>



<div class="content-wrapper">


	<div class="row">
		<div class="col">

			<?php 





			echo show_error($message); ?>


		</div>
	</div>

	<div class="row bg-white">
		<div class="col-sm-12">


			
		</br>
		
		<center>	<h3 class="h3 mb-3 font-weight-normal danger-text">driver</h3></center>
		

	</br>

	<div class="table-responsive">

		<table class="table dataTable table-hover ">
			<thead>
				<tr>  
					<th scope="col">driver id</th>
					<th scope="col">username</th>
					<th scope="col">name</th> 
					<th class="text-uppercase">phone no</th> 
					<th class="text-uppercase">serviceyear</th>
					<th class="text-uppercase">depot	</th>
					<th class="text-uppercase">license	</th>
					<th class="text-uppercase">dob	</th>
					<th></th>

				</tr>
			</thead>

			<tbody>

				<?php
				$stmnt=' SELECT * FROM `driver` ';

				$details = $db->display($stmnt);

				?>

				<?php foreach ($details as $key => $value): ?>

					<tr>

						<td><?php echo $value['driverid']; ?></td>

						<td><?php echo $value['username']; ?></td>

						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['phno']; ?></td>
						<td><?php echo $value['serviceyear']; ?></td>
						<td><?php echo selectFromTable( 'depotname', 'depot', 'depoid = "'.$value['depot'].'"' ,$db) ; ?></td>
						<td><?php echo $value['license']; ?></td>
						<td><?php echo $value['dob']; ?></td> 




					<!-- 	<td >

							<time class="timeago" datetime="<?php echo isit('awrd_ddate', $value); ?>" title="<?php echo isit('awrd_ddate', $value); ?>">1 hour ago</time>



						</td> -->

						<td >
							<form accept="" method="post">
								<input type="hidden" name="id" value="<?php echo indexMe( (int) isit('driver_id', $value, 0)); ?>">

								<button class="btn btn-sm btn-danger" name="make_delete" value="1">Inactive</button>

							</form>


						</td>




					</tr>


				<?php endforeach; ?>
			</tbody>
		</table>


	</div>





</div> 
</div>












</div>








<?php include_once('includes/footer.php'); ?>