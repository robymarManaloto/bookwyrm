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
									    <!-- Add Book Section -->
									    <div class="card mb-4">
									      <div class="card-header">
									        <h2  class="mb-4">Edit Book</h2>
									      </div>
									      <div class="card-body">
									      	<?php 
												echo '<div style="color: red;"><small>'.validation_errors().'</small></div><br>';
														    	
												if (isset($error_message)) {
													echo '<div style="color: red;"><small>' . $error_message . '</small></div><br>';
												} 
											?>
									        <?php echo form_open('book/updateBook'); ?>
									          <!-- Book details input fields -->
									          <input type="hidden" value="<?php echo $edit_data[0]->book_id; ?>" name="book_id">
									          <div class="form-group">
									            <label for="title">Title</label>
									            <input type="text" value="<?php echo $edit_data[0]->title; ?>" name="title" class="form-control" id="title" required>
									          </div>
									          <div class="form-group">
									            <label for="author">Author</label>
									            <input type="text" value="<?php echo $edit_data[0]->author; ?>" name="author" class="form-control" id="author" required>
									          </div>
									          <div class="form-group">
									            <label for="description">Description</label>
									            <textarea name="description" class="form-control" id="description" rows="3"><?php echo $edit_data[0]->description; ?></textarea>
									          </div>
									          <div class="form-group">
									            <label for="publication_date">Publication Date</label>
									            <input value="<?php echo $edit_data[0]->publication_date; ?>" name="publication_date" type="date" class="form-control" id="publication_date">
									          </div>
									          <div class="form-group">
									            <label for="isbn">ISBN</label>
									            <input value="<?php echo $edit_data[0]->isbn; ?>" name="isbn" type="text" class="form-control" id="isbn">
									          </div>
									          <button type="submit" class="btn">Update Book</button>
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
	<?php include 'layout/bottombar.php';?>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
