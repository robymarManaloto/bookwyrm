
<div class="col-lg-3">
								<aside class="sidebar static">
									<div class="widget">
										<h4 class="widget-title">Actions</h4>
										<ul class="naves">
											<li>
												<i class="ti-clipboard"></i>
												<a href="newsfeed.html" title="">Manage Posts</a>
											</li>
											<li>
												<i class="ti-mouse-alt"></i>
												<a href="inbox.html" title="">Manage Books</a>
											</li>
										</ul>
									</div><!-- Categories -->
									<div class="widget">
										<h4 class="widget-title">Categories</h4>
										<ul class="activitiez">
											<?php foreach ($categories as $category): ?>
											<li>
												<div class="activity-meta">
													<span><a href="#" title=""><?php echo $category->category_name; ?></a></span>
												</div>
											</li>
											<?php endforeach; ?>
										</ul>
									</div>
									<!-- who's following -->
								</aside>
							</div>