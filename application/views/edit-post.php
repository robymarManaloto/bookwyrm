<title>BookWyrm - Edit Post</title>
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
									    <!-- Add Book Section -->
									    <div class="card mb-4">
									      <div class="card-header">
									        <h2  class="mb-4">Edit Post</h2>
									      </div>
									      <div class="card-body">
									      	<?php 
												echo '<div style="color: red;"><small>'.validation_errors().'</small></div><br>';
														    	
												if (isset($error_message)) {
													echo '<div style="color: red;"><small>' . $error_message . '</small></div><br>';
												} 
											?>
									        <?php echo form_open('post/updatePost'); ?>
												<input type="hidden" name="post_id" value="<?php echo $edit_data[0]->post_id; ?>">
												<div class="form-group">
												<label for="post_date">Post Date: <?php 
												$date = new DateTime($edit_data[0]->post_date);
												// Format the date as "YYYY-MM-DD"
												$formattedDate = $date->format('Y-m-d');
												echo $formattedDate; ?></label>
												</div>

									            <div class="form-group">
												<label for="post_description">Post Description</label>
												<textarea class="form-control" id="post_description" name="post_description" rows="4"><?php echo $edit_data[0]->post_description; ?></textarea>
												</div>
												<div class="form-group">
												<label for="category">Category</label>
												<select class="form-control" name="categories" required>
													      	<option value="1">
													      		Select a Category...
													      	</option> 
													      	<?php foreach ($categories as $category): 
													      		?>
													      	<option value="<?php echo $category->category_id; ?>" 
													      		<?php
													      		if ($edit_data[0]->category_id == $category->category_id){
															  	echo "selected";
															  }
													      		?>
													      		><?php echo $category->category_name; ?></option>


													      	<?php endforeach; ?>
													      </select>
												</div>
												<br><br>
									          <button type="submit" class="btn">Update Post</button>
									        <?php echo form_close(); ?>
									      </div>
									    </div>
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
