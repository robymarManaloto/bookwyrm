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
									              <th>Due Date</th>
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
										              <th><?php echo $book->due_date; ?></th>
										              <th> 
										              <?php echo form_open('book/removeOwned'); ?>
										              <input type="hidden" name="transaction_id" value="<?php echo $book->transaction_id; ?>">
										              	<button type="submit" class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></button>
														<?php echo form_close(); ?>
														<a class="btn btn-sm btn-success" href="<?php echo base_url('blobcontroller/downloadblob/').$book->file_id; ?>" >
														<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
</svg>
														</a>
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
										              	<button type="submit" class="btn btn-sm btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg></button>
													  <?php echo form_close(); ?>

													  <?php echo form_open('book/removeLend'); ?>
										              <input type="hidden" name="transaction_id" value="<?php echo $book->transaction_id; ?>">
										              	<button type="submit" class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></button>
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