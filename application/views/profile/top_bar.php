<div class="topbar stick">
		<div class="logo">
			<img src="<?php echo base_url(''); ?>assets/images/banner.svg" alt="">
		</div>
		
		<div class="top-area">
			<ul class="setting-area">
				<li>
					<a href="#" title="Search" data-ripple=""><i class="ti-search"></i></a>
					<div class="searched">
						<form method="post" class="form-search">
							<input type="text" placeholder="Search Books or Documents">
							<button data-ripple><i class="ti-search"></i></button>
						</form>
					</div>
				</li>
			</ul>
			<?php
			$image_data = base64_encode($user->profile_picture);
		    $image_src = 'data:image/jpg;base64,'.$image_data;

		    $cover_data = base64_encode($user->background_picture);
		    $cover_src = 'data:image/jpg;base64,'.$cover_data;
			?>

			<div class="user-img">
				<img src="<?php echo $image_src; ?>" style="height:3em;" alt="">
				<span class="status f-online"></span>
				<div class="user-setting">
					<a href="<?php echo base_url(''); ?>home/edit_profile" title=""><i class="ti-pencil-alt"></i>edit profile</a>
					<a href="<?php echo base_url(''); ?>home/account_settings" title=""><i class="ti-settings"></i>account setting</a>
					<a href="<?php echo base_url(''); ?>auth/logout"><i class="ti-power-off"></i>log out</a>
				</div>
			</div>
		</div>
	</div>
