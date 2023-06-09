<div class="topbar stick">
		<a href="<?php echo base_url(''); ?>home/feed">
		<div class="logo">
			<img src="<?php echo base_url(''); ?>assets/images/banner.svg" alt="">
		</div>
		</a>
		<div class="top-area">
			<ul class="setting-area">
				<li>
					<a href="#" title="Search" data-ripple=""><i class="ti-search"></i></a>
					<div class="searched">
						<?= form_open('home/search', array('class' => 'form-search')) ?>
							<input type="text" name="search" placeholder="Search Books or Documents">
							<button data-ripple><i class="ti-search"></i></button>
						<?= form_close() ?>
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
					<a href="<?php echo base_url(''); ?>auth/logout" id="logout-link"><i class="ti-power-off"></i>log out</a>
				</div>
			</div>
		</div>
	</div>


<script>
  // Attach event listener to the logout link
  document.getElementById('logout-link').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    
    // Display the confirmation dialog
    Swal.fire({
      title: 'Logout Confirmation',
      text: 'Are you sure you want to log out?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, log out',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        // If the user confirms, navigate to the logout URL
        window.location.href = event.target.href;
      }
    });
  });
</script>