<title>BookWyrm - Profile</title>

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
	
	<?php include 'view-profile-pages-layout/top_area.php';?>
	<!-- top area -->
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
									<div class="groups">
										<span><i class="fa fa-file-text-o"></i>Documents</span>
									</div>
									<ul class="liked-pages">
										<?php foreach ($posts as $post): ?>
										<li>
											<a href="<?php echo base_url('blobcontroller/downloadblob/').$post->file_id; ?>" >

											<div class="f-page">
												
												<figure>
														<br>
														<center>
														<svg xmlns="http://www.w3.org/2000/svg" height="6em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/></svg>
														</center>
													<em><?php echo $post->likes;?> likes</em>
												</figure>
												<div class="page-infos">
													<h5><?php echo $post->post_description;?></h5>
													<span><?php echo $post->date;?></span>
												</div>
												
											</div>
											</a>
										</li>
										<?php endforeach; ?>
										
									</ul>
									
								</div>
								<div class="central-meta">
									<div class="groups">
										<span><i class="fa fa-file-text-o"></i>Books</span>
									</div>
									<ul class="liked-pages">
										<?php foreach ($books as $book): ?>
										<li>
											<a href="<?php echo base_url('blobcontroller/downloadblob/').$book->file_id; ?>" >

											<div class="f-page">
												
												<figure>
														<br>
														<center>
														<svg xmlns="http://www.w3.org/2000/svg" height="6em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/></svg>
														</center>
												</figure>
												<div class="page-infos">
													<h5><?php echo $book->title;?></h5>
													<span><?php echo $book->publication_date;?></span>
												</div>
												
											</div>
											</a>
										</li>
										<?php endforeach; ?>
										
									</ul>
									
								</div>
							</div>


							<!-- centerl meta -->
							<div class="col-lg-3 col-md-12">
								<aside class="sidebar static">
									<div class="widget">
										<h4 class="widget-title">Your Posts</h4>	
										<div class="your-page">
											<figure>
												<a><img src="<?php echo base_url('assets/images/').'profile.jpg'; ?>" alt=""></a>
											</figure>
											<div class="page-meta">
												<a class="underline">Posts</a>
												<span>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
  <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg>
													<a>Books <em><?php echo $totals_books[0]->total_books;?></em></a></span>
												<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-post" viewBox="0 0 16 16">
  <path d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-8z"/>
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
</svg><a> Documents<em><?php echo $totals[0]->total_documents;?></em></a></span>
											</div>
											<div class="page-likes">
												<ul class="nav nav-tabs likes-btn">
													<li class="nav-item"><a class="active" href="#link1" data-toggle="tab">likes</a></li>
													 <li class="nav-item"><a class="" href="#link2" data-toggle="tab">views</a></li>
												</ul>
												<!-- Tab panes -->
												<div class="tab-content">
												  <div class="tab-pane active fade show " id="link1" >
													<span><i class="ti-heart"></i>
													<?php echo $totals[0]->total_likes;?>
													</span>
													  <div class="users-thumb-list">
														<a href="#" title="Anderw" data-toggle="tooltip">
															<img src="images/resources/userlist-1.jpg" alt="">  
														</a>
														<a href="#" title="frank" data-toggle="tooltip">
															<img src="images/resources/userlist-2.jpg" alt="">  
														</a>
														<a href="#" title="Sara" data-toggle="tooltip">
															<img src="images/resources/userlist-3.jpg" alt="">  
														</a>
														<a href="#" title="Amy" data-toggle="tooltip">
															<img src="images/resources/userlist-4.jpg" alt="">  
														</a>
														<a href="#" title="Ema" data-toggle="tooltip">
															<img src="images/resources/userlist-5.jpg" alt="">  
														</a>
														<a href="#" title="Sophie" data-toggle="tooltip">
															<img src="images/resources/userlist-6.jpg" alt="">  
														</a>
														<a href="#" title="Maria" data-toggle="tooltip">
															<img src="images/resources/userlist-7.jpg" alt="">  
														</a>  
													  </div>
												  </div>
												  <div class="tab-pane fade" id="link2" >
													  <span><i class="ti-eye"></i>
													  <?php echo $totals[0]->total_views;?>
													</span>
												  </div>
												</div>
											</div>
										</div>
									</div>

								</aside>
							</div><!-- sidebar -->
							

							
							
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>
	<?php include 'layout/bottombar.php';?>
</div>