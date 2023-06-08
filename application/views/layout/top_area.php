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
				<?php echo form_open_multipart('profile/cover_picture', array('class' => 'edit-phto')); ?>
				<i class="fa fa-camera-retro"></i>
				<label class="fileContainer">
					Edit Cover Photo
				<input type="file" name="photo" onchange='this.form.submit();' accept="image/jpeg" />
				</label>
				<?php echo form_close(); ?>
			<div class="container-fluid">
				<div class="row merged">
					<div class="col-lg-2 col-sm-3">
						<div class="user-avatar">
							<figure>
								<img src="<?php echo $image_src; ?>" alt="">
								   <?php echo form_open_multipart('profile/profile_picture', array('class' => 'edit-phto')); ?>
									<i class="fa fa-camera-retro"></i>
									<label class="fileContainer">
										Edit Display Photo
										<input type="file" name="photo" onchange='this.form.submit();' accept="image/jpeg" />
									</label>
									<?php echo form_close(); ?>
							</figure>
						</div>
					</div>
					<div class="col-lg-10 col-sm-9">
						<div class="timeline-info">
							<ul>
								<li class="admin-name">
								  <h5><?php echo $user->first_name." ".$user->last_name; ?></h5>
<!-- 								  <span>Group Admin</span> -->
								</li>
								<li>
									<a class="<?php echo active_function($current_function,"view_books"); ?>" href="timeline-photos.html" title="" data-ripple="">Books</a>
									<a class="<?php echo active_function($current_function,"view_documents"); ?>" href="timeline-videos.html" title="" data-ripple="">Documents</a>
									<a class="<?php echo active_function($current_function,"edit_profile"); ?>" href="<?php echo base_url(''); ?>home/edit_profile" title="">Profile</a>
									<a class="<?php echo active_function($current_function,"account_settings"); ?>" href="<?php echo base_url(''); ?>home/account_settings" title="" data-ripple="">Account Settings
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- top area -->