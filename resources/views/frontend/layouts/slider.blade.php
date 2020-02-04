<section id="slider"><!--slider-->
<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<!-- <ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol> -->
						
						<div class="carousel-inner">

						<?php
							$public_slider = DB::table('sliders')
											->where('status', 1)
											->get();
								$i=1;
								foreach($public_slider as $slider){

									if($i==1){
						?>

							<div class="item active">
								<?php }else{ ?>
									<div class="item">
								<?php } ?>
								
								<div class="slide-img">
								<img src="{{ asset('images/slider/' . $slider->image) }}" style="max-width:100%;">
								</div>
							</div>
							<?php $i++; } ?>
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
	</section><!--/slider-->