<?php

/**
 * @Author: indran
 * @Date:   2018-11-22 10:20:11
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-26 19:57:39
 */
include_once('includes/header.php');
?>


<?php
$result = null;
if (isset($_POST['find'])) {




	$result = selectFromTable( ' * ', ' bus_stop ', ' LOWER ( s_from  ) LIKE "%'.$_POST['from'].'%"  AND  LOWER ( s_to  ) LIKE "%'.$_POST['to'].'%"   ' , $db);




}

?>

<section class="hero-section">
	<div id="slider-revolution">
		<ul>
			<li data-slotamount="7" data-masterspeed="500" data-title="Slide title 1">
				<img src="images/bg/1.jpg" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
				<div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-1" data-x="500" data-y="230" data-speed="700" data-start="1500" data-easing="easeOutBack">Last minute deal</div>
				<div class="tp-caption sfb fadeout slider-caption slider-caption-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack" data-start="2000">Top discount Paris Hotels</div>

			</li>
			<li data-slotamount="7" data-masterspeed="500" data-title="Slide title 2">
				<img src="images/bg/2.jpg" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
				<div class="tp-caption sft fadeout slider-caption-sub slider-caption-sub-2" data-x="center" data-y="220" data-speed="700" data-start="1500" data-easing="easeOutBack">Check out the top weekly destination</div>
				<div class="tp-caption sft fadeout slider-caption slider-caption-2" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack" data-start="2000">Travel with us</div> 
			</li>
			<li data-slotamount="7" data-masterspeed="500" data-title="Slide title 3">
				<img src="images/bg/3.jpg" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
				<div class="tp-caption lfl fadeout slider-caption slider-caption-3" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack" data-start="1500">Gofar</div>
				<div href="#" class="tp-caption lfr fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="365" data-easing="easeOutBack" data-speed="700" data-start="2000">Take you to every corner of the world</div>
			</li>
		</ul>
	</div>
</section>
<section>
	<div class="container">
		<div class="awe-search-tabs tabs">
			<ul>
				<li><a href="#awe-search-tabs-1"><i  ></i></a></li> 
			</ul>
			<div class="awe-search-tabs__content tabs__content">
				<div id="awe-search-tabs-1" class="search-flight-hotel">
					<h2>Search </h2>
					<form class="" method="post">
						<div class="form-group row " style="min-width: 45rem;">
							<div class="form-elements col-md-6">
								<label>From</label>
								<div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> <input type="text" name="from"></div>
							</div>
							<div class="form-elements col-md-6">
								<label>To</label>
								<div class="form-item"><i class="awe-icon awe-icon-marker-1"></i> <input type="text"  name="to"></div>
							</div>
						</div>

						<div class="form-actions"><input type="submit" name="find" value="Find bus route"></div>
					</form>
				</div>



			</div>
		</div>
	</div>
</section>


<section class="sale-flights-section-demo">
	<div class="container">
		<div class="row">
			<div class="col-md-8">

				<?php   if($result ) :  ?>

					<div class="sale-flights-tabs tabs">
						<ul>
							<li><a href="#sale-flights-tabs-1"></a></li> 
						</ul>
						<div class="sale-flights-tabs__content tabs__content px-4">
							<div id="sale-flights-tabs-2">
								<table class="sale-flights-tabs__table" style=" display: inline; ">
									<tbody>
										<?php   foreach($result AS $value): ?>



											<tr>
												<td class="sale-flights-tabs__item-flight"> 
													<div class="td-content">
														<div class="title">
															<h3>
																<?php echo isit( 's_from', $value); ?>

															</h3>
														</div> 
													</div>
												</td>
												<td class="sale-flights-tabs__item-depart">
													<h4>
														<?php echo isit( 's_to', $value); ?>
													</h4> 
												</td>
												<td class="sale-flights-tabs__item-arrive">
													<h4><?php echo isit( 'distance', $value); ?>  Km</h4>

												</td>

												<td class="sale-flights-tabs__item-choose"><span class="amount"><i class="fa fa-inr mr-2" aria-hidden="true"></i><?php echo isit( 'amount', $value); ?></span> <a href="booknow.php?id=<?php echo isit( 'stop_id', $value); ?>" class="awe-btn">Choose</a></td>
											</tr>



											<?php ?>
											<?php ?>
											<?php ?>
											<?php ?>
											<?php ?> 
										<?php endforeach; ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>


				<?php   endif; ?>

			</div>
			<div class="col-md-4">
				<div class="awe-services">
					<h2>Why your friends like our services?</h2>
					<ul class="awe-services__list">
						<li><a href="#"><i class="awe-icon awe-icon-check"></i> <i class="awe-icon awe-icon-arrow-right"></i> 100,000 real deals <span>No booking fees . No fake</span></a></li>
						<li><a href="#"><i class="awe-icon awe-icon-check"></i> <i class="awe-icon awe-icon-arrow-right"></i> 100% trusted reviews <span>We verify them in person</span></a></li>
						<li><a href="#"><i class="awe-icon awe-icon-check"></i> <i class="awe-icon awe-icon-arrow-right"></i> 24/7 global support <span>anytime and any where</span></a></li>
						<li><a href="#"><i class="awe-icon awe-icon-check"></i> <i class="awe-icon awe-icon-arrow-right"></i> 24/7 global support <span>anytime and any where</span></a></li>
						<li><a href="#"><i class="awe-icon awe-icon-check"></i> <i class="awe-icon awe-icon-arrow-right"></i> Manage your bookings online <span>anytime and any where</span></a></li>
					</ul>
					<div class="video-wrapper embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="https://player.vimeo.com/video/50880604"></iframe></div>
				</div>
			</div>
		</div>
	</div>
</section>



<?php 
include_once('includes/footer.php'); 
?>