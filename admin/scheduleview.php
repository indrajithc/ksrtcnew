<?php

/**
 * @Author: indran
 * @Date:   2018-11-26 14:54:40
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 16:50:25
 */ 
include_once('includes/header.php') ?>
<?php
$db=new Database();
?>
<?php
if (isset($_POST['depoid'])) 
{

	$id = $_POST['depoid'];
	$sql="DELETE FROM `depot` WHERE `depot`.`depoid` = '$id'";


	if(  $db->execute_query($sql) ){
		$message[0] = 1;
		$message[1] = 'Successfully Deleted'; 
	} else {
		$message[0] = 4;
		$message[1] = 'error'; 
	}
}
?>
<section class="my-3">
	<div class="row"  align="center">
		<div class="col-sm-6" align="left" > 

			<?php echo show_error($message); ?> 


		</div>
	</div>

</section>

<div class="row">
	<div class="col-sm-12 ">
		<form name="frm2"  method="post"> 


			<div class="page-header">
				<div class="h3 mb-3 bg-primary text-white"><h1>StationMaster Details</h1>
				</div>
			</div>

			<?php



			$stmnt=" SELECT * FROM `bus_route` where 1";


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
								<!-- <th scope="col">Delete</th>  -->
							</tr>
						</thead>

						<tbody>

							<?php foreach ($details as $key => $value): ?>
								<tr> 
									<td><?php echo selectFromTable( 'busid', 'bus', 'busid = "' . $value['bus_id'].'"',  $db) ;  ?></td> 
									<td><?php echo selectFromTable( 'depotname', 'depot', 'depoid = ' . $value['depo_from'] , $db);  ?></td>
									<td><?php echo selectFromTable( 'depotname', 'depot', 'depoid = ' . $value['depo_to'],  $db);  ?></td> 


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
<?php else : ?>
	<div class="alert text-center alert-warning">
		<p>no data found</p>
	</div>

<?php endif; ?>




</div> 
</div>
</form>
<?php include_once('includes/footer.php') ?>