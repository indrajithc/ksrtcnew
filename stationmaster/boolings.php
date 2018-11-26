<?php

/**
 * @Author: indran
 * @Date:   2018-11-25 10:20:06
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 20:27:14
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

	$istrue = $db->execute_query("  DELETE FROM conductor WHERE conductor_id = " . $id);

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
		
		<center>	<h3 class="h3 mb-3 font-weight-normal danger-text">conductors</h3></center>
		

	</br>

	<div class="table-responsive">

		<table class="table dataTable table-hover ">
			<thead>
				<tr>  
					<th scope="col"> route</th> 
					<th scope="col">name</th> 
					<th class="text-uppercase">idproof</th> 
					<th class="text-uppercase">phone no</th>
					<th class="text-uppercase">amount	</th>
					<th class="text-uppercase">gender	</th>
					<th class="text-uppercase">seats	</th>
					<th></th>

				</tr>
			</thead>

			<tbody>

				<?php
				$stmnt=' SELECT * FROM `booking` ';

				$details = $db->display($stmnt);

				?>

				<?php foreach ($details as $key => $value): ?>

					<tr>

						<td><?php
						$resut = selectFromTable('*', 'bus_stop', 'stop_id = ' . $value['stop_id'] , $db);

						echo "<b>".$resut[0]['s_from']."</b>" ;
						echo " to ";
						echo "<b>".$resut[0]['s_to']."</b>" ;



						?></td>

						<td><?php echo $value['name']; ?></td>

						<td><?php echo $value['idproof']; ?></td>
						<td><?php echo $value['phno']; ?></td>
						<td><?php echo $value['amount']; ?></td> 
						<td><?php echo $value['gender']; ?></td>
						<td><?php echo $value['seats']; ?></td> 
						




					</tr>


				<?php endforeach; ?>
			</tbody>
		</table>


	</div>





</div> 
</div>












</div>








<?php include_once('includes/footer.php'); ?>