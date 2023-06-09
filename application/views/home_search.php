<title>BookWyrm - Search Results</title>
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
								
								<!-- add post new box -->
								<div class="central-meta">
									  <div class="container mt-5">
									    <!-- Books Owned from Other Lenders -->
									    <div class="card mb-4">
									      <div class="card-header">
									         <h2  class="mb-4">Documents</h2>
									      </div>
									      <div class="card-body">
									        <table id="searchDocumentTable" class="table table-striped">
									          <thead>
									            <tr>
									              <th>Posted By</th>
									              <th>Description</th>
									              <th>Category</th>
									              <th>File</th>
									              <th>File Size</th>
									              <th>Date</th>
									              
									            </tr>
									          </thead>
									          <tbody>
											    <?php foreach ($documents as $document): ?>
									          		<tr>
									          		  <th><?php echo $document->posted_by; ?></th>
										              <th><?php echo $document->post_description; ?></th>
										              <th><?php echo $document->category_name; ?></th>
										              <th><?php echo $document->file_name; ?></th>
										              <th><?php echo $document->file_size; ?></th>
										              <th><?php echo $document->lender_name; ?></th>										           
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
									         <h2  class="mb-4">Books</h2>
									      </div>
									      <div class="card-body">
									        <table id="searchBookTable" class="table table-striped">
									          <thead>
									            <tr>
									              <th>Published By</th>
									              <th>Title</th>
									              <th>Author</th>
									              <th>Description</th>
									              <th>ISBN</th>
									              <th>File</th>
									              <th>File Size</th>
									              <th>Published Date</th>

									            </tr>
									          </thead>
									          <tbody>
											    <?php foreach ($books as $book): ?>
									          		<tr>
									          		  <th><?php echo $book->published_by; ?></th>
									          		  <th><?php echo $book->title; ?></th>
										              <th><?php echo $book->author; ?></th>
										              <th><?php echo $book->description; ?></th>
										              <th><?php echo $book->isbn; ?></th>
										              <th><?php echo $book->file_name; ?></th>
										              <th><?php echo $book->file_size; ?></th>
										              <th><?php echo $book->published_date; ?></th>
									          		</tr>
									          	<?php endforeach; ?>

									          </tbody>
									        </table>
									      </div>
									    </div>
									 </div>
								</div>
							</div><!-- centerl meta -->

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