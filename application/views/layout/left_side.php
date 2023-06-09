<?php
function active_function_left($current_function,$class) {
 	If ($current_function == $class){
		return "style='color:#5C469C; padding-bottom:0.5em;border-bottom: 0.5px solid #5C469C; '";
	}
	return "";
}
?>

<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
										<h4 class="widget-title">Actions</h4>
										<ul class="naves">
											<li <?php echo active_function_left($current_function,"feed"); ?>>
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
												  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
												</svg>
												<a href="<?php echo base_url(''); ?>home/feed" title="">Home</a>

											</li>
											<li <?php echo active_function_left($current_function,"manage_post"); ?>>
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
												  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
												</svg>
												<a href="<?php echo base_url(''); ?>home/manage_post" title="">Manage Posts</a>
											</li>
											<li <?php echo active_function_left($current_function,"index"); ?>>
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
												  <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
												</svg>
												<a href="<?php echo base_url(''); ?>book/" title="">Manage Books</a>
											</li>
										</ul>
									</div><!-- Categories -->
									<div class="widget">
										<h4 class="widget-title">Categories</h4>
										<ul class="activitiez">
											<?php foreach ($categories as $category): ?>
											<li>
												<div class="activity-meta">
													<span><a href="<?php echo base_url(''); ?>home/category/?category_id=<?php echo urlencode($category->category_id); ?>
														" title=""><?php echo $category->category_name; ?></a></span>
												</div>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
									<!-- who's following -->
								</aside>
							</div>