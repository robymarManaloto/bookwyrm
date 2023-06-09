<title>BookWyrm - Manage Posts</title>
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
	
<!-- topbar -->
	<?php include 'layout/top_bar.php';?>

	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
						<?php include 'layout/left_side.php';?>
							<!-- sidebar -->
							<div class="col-lg-8">
								<div class="central-meta">
									<div class="groups">
										<span><i class="fa fa-file-text-o"></i> Your Posts</span>
									</div>
									<ul class="liked-pages">
										<?php foreach ($posts as $post): ?>
										<li>
											<div class="f-page">
												<figure>
														<br>
														<center>
														<svg xmlns="http://www.w3.org/2000/svg" height="6em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/></svg>
														</center>
													<div class="dropdown pgs">
														
														<?= form_open('post/delete_post') ?>
														<input type="hidden" name="post_id" value="<?php echo $post->post_id; ?>">
														<button class="btn btn-danger" type="submit" >
															Delete
														  </button>
														<?= form_close() ?>
													</div>
													<em><?php echo $post->likes;?> likes</em>
												</figure>
												<div class="page-infos">
													<h5><?php echo $post->post_description;?></h5>
													<span><?php echo $post->date;?></span>
												</div>
											</div>
										</li>
										<?php endforeach; ?>
										
									</ul>
									
								</div>
								

								

							</div>


						
							<!-- sidebar -->
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

<script src="<?php echo base_url(''); ?>assets/js/main.min.js"></script>
<script src="<?php echo base_url(''); ?>assets/js/script.js"></script>