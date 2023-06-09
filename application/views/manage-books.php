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
									        <h2  class="mb-4">Add a new Book</h2>
									      </div>
									      <div class="card-body">
									      	<?php 
												echo '<div style="color: red;"><small>'.validation_errors().'</small></div><br>';
														    	
												if (isset($error_message)) {
													echo '<div style="color: red;"><small>' . $error_message . '</small></div><br>';
												} 
											?>
									        <?php echo form_open_multipart('book/addBook'); ?>
									          <!-- Book details input fields -->
									          <div class="form-group">
									            <label for="title">Title</label>
									            <input type="text" name="title" class="form-control" id="title" required>
									          </div>
									          <div class="form-group">
									            <label for="author">Author</label>
									            <input type="text" name="author" class="form-control" id="author" required>
									          </div>
									          <div class="form-group">
									            <label for="description">Description</label>
									            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
									          </div>
									          <div class="form-group">
									            <label for="publication_date">Publication Date</label>
									            <input name="publication_date" type="date" class="form-control" id="publication_date">
									          </div>
									          <div class="form-group">
									            <label for="isbn">ISBN</label>
									            <input name="isbn" type="text" class="form-control" id="isbn">
									          </div>
									          <div class="form-group">
									            <label for="file">Upload File</label>
									            <input name="file" type="file" class="form-control-file" id="file" required>
									          </div>
									          <button type="submit" class="btn">Add Book</button>
									        <?php echo form_close(); ?>
									      </div>
									    </div>
							      	</div>
							    </div>
								<div class="central-meta">
									  <div class="container mt-5">
									    <!-- Explore Books Available -->
									    <div class="card mb-4">
									      <div class="card-header">
									         <h2 class="mb-4">Explore Books Available</h2>
									      </div>
									      <div class="card-body">
									        <table id="availableBooksTable" class="table table-striped">
									          <thead>
									            <tr>
									              <th>Title</th>
									              <th>Author</th>
									              <th>Description</th>
									              <th>Publication Date</th>
									              <th>ISBN</th>
									              <th>Lender</th>
									              <th>Action</th>
									            </tr>
									          </thead>
									          <tbody>
									          	<?php foreach ($avail_books as $book): ?>
									          		<tr>
									          		  <th><?php echo $book->title; ?></th>
										              <th><?php echo $book->author; ?></th>
										              <th><?php echo $book->description; ?></th>
										              <th><?php echo $book->publication_date; ?></th>
										              <th><?php echo $book->isbn; ?></th>
										              <th><?php echo $book->lender_name; ?></th>
										              <th> 
										              <?php echo form_open('book/addOwned'); ?>
										              <input type="hidden" name="book_id" value="<?php echo $book->book_id; ?>">
										              	<button type="submit" class="btn btn-sm btn-primary">Add</button>
														<?php echo form_close(); ?>
										              </th>
									          		</tr>
									          	<?php endforeach; ?>
									          </tbody>
									        </table>
									      </div>
									    </div>
									</div>
								</div>
								<div class="central-meta">
									  <div class="container mt-5">
									    <!-- Books Owned from Other Lenders -->
									    <div class="card mb-4">
									      <div class="card-header">
									         <h2  class="mb-4">Books You Owned</h2>
									      </div>
									      <div class="card-body">
									        <table id="ownedBooksTable" class="table table-striped">
									          <thead>
									            <tr>
									              <th>Title</th>
									              <th>Author</th>
									              <th>Description</th>
									              <th>Publication Date</th>
									              <th>ISBN</th>
									              <th>Lender</th>
									              <th>Action</th>
									            </tr>
									          </thead>
									          <tbody>
											    <?php foreach ($books_owned as $book): ?>
									          		<tr>
									          		  <th><?php echo $book->title; ?></th>
										              <th><?php echo $book->author; ?></th>
										              <th><?php echo $book->description; ?></th>
										              <th><?php echo $book->publication_date; ?></th>
										              <th><?php echo $book->isbn; ?></th>
										              <th><?php echo $book->lender_name; ?></th>
										              <th> 
										              <?php echo form_open('book/removeOwned'); ?>
										              <input type="hidden" name="book_id" value="<?php echo $book->book_id; ?>">
										              	<button type="submit" class="btn btn-sm btn-danger">Remove</button>
														<?php echo form_close(); ?>
										              </th>
									          		</tr>
									          	<?php endforeach; ?>

									          </tbody>
									        </table>
									      </div>
									    </div>
									 </div>
								</div>
								<div class="central-meta">
									  <div class="container mt-5">

									    <!-- Books You Lend -->
									    <div class="card mb-4">
									      <div class="card-header">
									         <h2 class="mb-4">Books You Lend</h2>
									      </div>
									      <div class="card-body">
									        <table id="lendBooksTable" class="table table-striped">
									          <thead>
									            <tr>
									              <th>Title</th>
									              <th>Author</th>
									              <th>Description</th>
									              <th>Publication Date</th>
									              <th>ISBN</th>
									              
									              <th>Action</th>
									            </tr>
									          </thead>
									          <tbody>
									            <?php foreach ($books_len as $book): ?>
									          		<tr>
									          		  <th><?php echo $book->title; ?></th>
										              <th><?php echo $book->author; ?></th>
										              <th><?php echo $book->description; ?></th>
										              <th><?php echo $book->publication_date; ?></th>
										              <th><?php echo $book->isbn; ?></th>
										              <th> 
										              <?php echo form_open('book/editLend'); ?>
										              <input type="hidden" name="book_id" value="<?php echo $book->book_id; ?>">
										              	<button type="submit" class="btn btn-sm btn-primary">Edit</button>
													  <?php echo form_close(); ?>
													  
										              <?php echo form_open('book/removeLend'); ?>
										              <input type="hidden" name="book_id" value="<?php echo $book->book_id; ?>">
										              	<button type="submit" class="btn btn-sm btn-danger">Remove</button>
														<?php echo form_close(); ?>
										              </th>
									          		</tr>
									          	<?php endforeach; ?>
									          </tbody>
									        </table>
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