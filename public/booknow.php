
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


<?php

/**
 * @Author: indran
 * @Date:   2018-10-17 16:48:54
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 20:18:16
 */


include_once('../global.php'); ?>
<?php include_once('../root/connection.php');
include_once('../root/functions.php');





$db=  new Database();
$message=array(null,null);





$result = selectFromTable( '*', 'booking', 'stop_id = '.$_GET['id'] ,$db);
$rque = '';
foreach ($result as $key => $value) {
	if($rque != '') {
		$rque .= ' , "'. $value['seats'] . '"';
	} else {
		$rque .= '   "'. $value['seats'] . '"';
	}

}


?>

<!DOCTYPE html>
<html>
<head> 
	<!-- for-mobile-apps -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="keywords"  />
	<!-- //for-mobile-apps -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/jquery.seat-charts.css">
	<link href="css/_style.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/jquery.seat-charts.js"></script>
	<?php 
	if (! isset($_GET['id'])) {
		?>
		<script type="text/javascript">
			location.href="./";
		</script>
		<?php
	}

	?>
</head>
<body>
	<div class="content"> 
		<div class="main">
			<h2>Book Your Seat Now?</h2>
			<div class="wrapper">
				<div id="seat-map">
					<div class="front-indicator"><h3>Front</h3></div>
				</div>
				<div class="booking-details">
					<div id="legend"></div>


				</div>
				<div class="clear"></div>
			</div>
			<script>
				var firstSeatLabel = 1;

				$(document).ready(function() {
					var $cart = $('#selected-seats'),
					$counter = $('#counter'),
					$total = $('#total'),
					sc = $('#seat-map').seatCharts({
						map: [
						'ff_ff',
						'ff_ff',
						'ee_ee',
						'ee_ee',
						'ee___',
						'ee_ee',
						'ee_ee',
						'ee_ee',
						'eeeee',
						],
						seats: { 
							e: {
								price   : 40,
								classes : 'economy-class', //your custom CSS class
								category: 'Economy Class'
							}					

						},
						naming : {
							top : false,
							getLabel : function (character, row, column) {
								return firstSeatLabel++;
							},
						},
						legend : {
							node : $('#legend'),
							items : [ 
							[ 'e', 'available',   'Economy  '],
							[ 'f', 'unavailable', 'Already Booked']
							]					
						},
						click: function () {
							if (this.status() == 'available') {
								//let's create a new <li> which we'll add to the cart items
								$('<li>'+this.data().category+' : Seat no '+this.settings.label+': <b>$'+this.data().price+'</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
								.attr('id', 'cart-item-'+this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);
								
								/*
								 * Lets update the counter and total
								 *
								 * .find function will not find the current seat, because it will change its stauts only after return
								 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
								 */
								 $counter.text(sc.find('selected').length+1);
								 $total.text(recalculateTotal(sc)+this.data().price);

								 return 'selected';
								} else if (this.status() == 'selected') {
								//update the counter
								$counter.text(sc.find('selected').length-1);
								//and total
								$total.text(recalculateTotal(sc)-this.data().price);

								//remove the item from our cart
								$('#cart-item-'+this.settings.id).remove();

								//seat has been vacated
								return 'available';
							} else if (this.status() == 'unavailable') {
								//seat has been already booked
								return 'unavailable';
							} else {
								return this.style();
							}
						}
					});

					//this will handle "[cancel]" link clicks
					$('#selected-seats').on('click', '.cancel-cart-item', function () {
						//let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
						sc.get($(this).parents('li:first').data('seatId')).click();
					});

					//let's pretend some seats have already been booked




					sc.get([ <?php echo $rque ; ?> ]).status('unavailable');

				});

				function recalculateTotal(sc) {
					var total = 0;

				//basically find every selected seat and sum its price
				sc.find('selected').each(function () {
					total += this.data().price;
				});
				
				return total;
			}




		</script>
	</div>

</div>

<form style="display: none; " method="post" action="bookgo.php">
	<input type="hidden" name="s" id="gotonow">
	<input type="hidden" name="r" id="route" value="<?php echo $_GET['id']; ?>">
</form>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/_scripts.js"></script>

<script type="text/javascript">
	$(document).ready(function($) {

		$(document).on('click', '.seatCharts-seat', function(event) {
			event.preventDefault();
			if( ! $(this).hasClass('unavailable')){
				$id  = $(this).attr('id'); 
				$('#gotonow').val($id);

				$('#gotonow').closest('form').submit();
			}
			/* Act on the event */
		});

		
	});
</script>
</body>
</html>
