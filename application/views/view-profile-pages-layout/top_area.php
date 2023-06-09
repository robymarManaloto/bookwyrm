<?php 

function active_function($current_function,$class) {
 	If ($current_function == $class){
		return "active";
	}
	return "";
}

?>
<section>
		<div class="feature-photo">
			<figure><img src="<?php echo $cover_src; ?>" alt=""></figure>
				
			<div class="container-fluid">
				<div class="row merged">
					<div class="col-lg-2 col-sm-3">
						<div class="user-avatar">
							<figure>
								<img src="<?php echo $image_src; ?>" alt="">
								   
							</figure>
						</div>
					</div>
					<div class="col-lg-10 col-sm-9">
						<div class="timeline-info">
							<ul>
								<li class="admin-name">
								  <h5><?php echo $user->first_name." ".$user->last_name; ?></h5>
								  <span>@<?php echo $user->username; ?></span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- top area -->