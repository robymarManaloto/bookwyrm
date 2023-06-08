
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
												<span><i class="ti-comment"></i><a>Books <em>9</em></a></span>
												<span><i class="ti-bell"></i><a>Documents<em>2</em></a></span>
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
							