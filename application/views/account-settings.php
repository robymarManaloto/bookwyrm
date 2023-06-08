<title>BookWyrm - Account Settings</title>

<div class="theme-layout">
	<div class="responsive-header">
		<div class="mh-head first Sticky">
			<span class="mh-text">
				<a href="newsfeed.html" title=""><img src="<?php echo base_url(''); ?>assets/images/banner.svg" alt=""></a>
			</span>
		</div>
		<div class="mh-head second">
			<form class="mh-form">
				<input placeholder="search" />
				<a href="#/" class="fa fa-search"></a>
			</form>
		</div>
	</div><!-- responsive header -->
	
	<?php include 'layout/top_bar.php';?>
	
	<!-- topbar -->
<!-- topbar -->
	
	<?php include 'layout/top_area.php';?>
	
	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							
							<?php include 'layout/left_side.php';?>
							
							<!-- sidebar -->
								<div class="col-lg-6">
									<div class="central-meta">
										<div class="editing-info">
											<h5 class="f-title"><i class="ti-lock"></i>Change Password</h5>

										    <?php 
										    	echo '<div style="color: red;"><small>'.validation_errors().'</small></div><br>';

										    	if (isset($error_message)) {
										        echo '<div style="color: red;"><small>' . $error_message . '</small></div><br>';
										   		 } ?>

										    <?php echo form_open('auth/update_password'); ?>
												<div class="form-group">	
												  <input name="old_password" type="password" required="required"/>
												  <label class="control-label" for="input">Current password</label><i class="mtrl-select"></i>
												</div>
												<div class="form-group">	
												  <input name="new_password" type="password" id="input" required="required"/>
												  <label class="control-label" for="input">New password</label><i class="mtrl-select"></i>
												</div>
												<div class="form-group">	
												  <input type="password" name="confirm_password" required="required"/>
												  <label  class="control-label" for="input">Confirm password</label><i class="mtrl-select"></i>
												</div>
												
												<div class="submit-btns">
													<a href="<?php echo base_url(); ?>/home/feed">
												<button type="button" class="mtr-btn"><span>Cancel</span></button></a>
													<button type="submit" class="mtr-btn"><span>Update</span></button>
												</div>
											<?php echo form_close(); ?>
										</div>
									</div>	
								</div>


							<?php include 'layout/right_side.php';?>

						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>
	<div class="bottombar">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<span class="copyright"><a target="_blank" href="https://www.templateshub.net">Angeles University Foundation</a></span>
					<i><img src="images/credit-cards.png" alt=""></i>
				</div>
			</div>
		</div>
	</div>
</div>