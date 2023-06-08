<title>BookWyrm - Manage Books</title>
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
									  <div class="container mt-5">

								<?php foreach ($posts as $post): ?>
								<div class="central-meta item">
									<div class="user-post">
										<div class="friend-info">
											<figure>
												<?php
												$profile_data = base64_encode($post->profile_picture);
											    $profile_src = 'data:image/jpg;base64,'.$image_data;
												?>
												<img src="<?php echo $profile_src; ?>" alt="">
											</figure>
											<div class="friend-name">
												<ins><a href="time-line.html" title="">
													<?php echo $post->name; ?>
												</a></ins>
												<span>published: <?php echo $post->date; ?></span>
											</div>
											<div class="post-meta">
												<a href="<?php echo base_url('blobcontroller/downloadblob/').$post->file_id; ?>" >
												<div class="file-preview">
											      <div class="file-icon">
											        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm160-14.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/></svg>
											      </div>
											      <div class="file-info">
											        <div class="file-name"><?php echo $post->file_name; ?></div>
											        <div class="file-size"><?php echo $post->converted_size; ?></div>
											      </div>
											    </div>
											    </a>
											    <div class="description">
													
														<?php echo $post->post_description; ?>
												</div>
												<div class="we-video-info">
													<ul>
														<li>
															<span class="views" data-toggle="tooltip" title="views">
																<i class="fa fa-eye"></i>
																<ins><?php echo $post->views; ?></ins>
															</span>
														</li>
														<li>
															<span class="comment" data-toggle="tooltip" title="Comments">
																<i class="fa fa-comments-o"></i>
																<?php
														 		$commentCount = 0;
														        foreach ($comments as $comment) {
														            if ($comment->post_id == $post->post_id) {
														                $commentCount++;
														            }
														        }
																?>
																<ins><?php echo $commentCount;?></ins>
															</span>
														</li>
														<li>
															<span class="like" data-toggle="tooltip" title="like">
															    <button style="border: none;" class="like-button" data-post-id="<?php echo $post->post_id; ?>">
															        <i class="ti-heart"></i>
															        <ins style="margin-left: 0.3em;"><?php echo $post->likes; ?></ins>
															    </button>
															</span>
														</li>
													</ul>
												</div>
												
											</div>
										</div>
										<div class="coment-area">
											<ul class="we-comet">
												
												<?php foreach ($comments as $comment): ?>
													<?php if ($comment->post_id == $post->post_id): ?>
												<li>
													<div class="comet-avatar">
														<?php
														$comment_profile_data = base64_encode($comment->profile_picture);
													    $comment_profile_src = 'data:image/jpg;base64,'.$comment_profile_data;
														?>
														<img src="<?php echo $comment_profile_src; ?>" alt="">
													</div>
													<div class="we-comment">
														<div class="coment-head">
															<h5><a href="time-line.html" title=""><?php echo $comment->name;?></a></h5>
															<span><?php echo $comment->relative_time;?></span>
														</div>
														<p><?php echo $comment->comment_text;?>
														</p>
													</div>
												</li>
													<?php endif; ?>
												 <?php endforeach; ?>

												<li class="post-comment">
													<div class="comet-avatar">
														<img src="<?php echo $image_src; ?>" alt="">
													</div>
													<div class="post-comt-box">
														<?= form_open('post/add_comment') ?>
															<input type="hidden" name="post_id" value="<?php echo $post->post_id; ?>">
															<textarea  name="comment_text" placeholder="Post your comment"></textarea>
															
															<button style="margin-bottom: 0.7em; color:#5C469C;" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
															  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
															</svg>Comment</button>
														<?= form_close() ?>
													</div>
												</li>
											</ul>
										</div>
									</div>
									
								</div>
								<?php endforeach; ?>

							      	</div>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.like-button').click(function() {
            var postId = $(this).data('post-id');
            console.log(postId);
            var likeCountElement = $(this).find('ins');
            $.ajax({
                url: '<?php echo base_url();  ?>/post/like',
                method: 'POST',
                data: { post_id: postId },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        likeCountElement.text(response.likes);
                    }
                }
            });
        });
    });

</script>