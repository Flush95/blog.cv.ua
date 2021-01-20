<?php
	include "W:/domains/blog.cv.ua/db.php";
	include "W:/domains/blog.cv.ua/handlers/articles_handler.php";
	include "W:/domains/blog.cv.ua/views/article_comments.php";

	$art_handler = new ArticleHandler();

	$pages = $art_handler->get_total_pages($art_handler->count_total());

	$page_arts;

	if (!empty($_GET["page"]))
		$page_arts = $art_handler->find_page($_GET["page"]);
	else
		$page_arts = $art_handler->find_page(1);


?>
<!DOCTYPE html>
<html lang="en">

    <?php include "head.php"?>

    <body id="page-top">
    	<?php include "menu.php"; ?>

    	<br>
    	<br>
    	<br>

    	<!-- News Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
            	<div class="accordion" id="accordionExample" style="color:rgb(0, 0, 0);">
            		<?php foreach($page_arts as $art) { ?>

					  <div class="card">
					    <div class="card-header" id="headingOne">
					      <h2 class="mb-0">
					        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $art->id; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $art->id; ?>">
					          <?php echo substr($art->title, 0, 150); ?>
					        </button>
					      </h2>
					    </div>

					    <div id="collapseOne<?php echo $art->id; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
					      <div class="card-body">
					        <h1><?php echo $art->title; ?></h1>
					        <p><?php echo $art->text; ?></p>
					        <div class="row">
					        	<div class="col-lg-6"><p class="text-left"><?php echo $art->author; ?></p></div>
					        	<div class="col-lg-6"><p class="text-right"><?php echo $art->pub_time; ?></p></div>
					        </div>
					        <img src="<?php echo $art->image; ?>" class="rounded img-fluid mx-auto d-block" alt="...">

					        	<?php displayComments($art->ownCommentsList);?>

					      </div>
					    </div>
					  </div>

					<?php } ?>
				</div>
				<div class="text-center mt-4" >
                    <nav aria-label="Page navigation example" >
  						<ul class="pagination">
  							<?php for ($i = 1; $i <= $pages; $i++) { ?>
				    			<li class="page-item">
				    				<a class="page-link" href="articles.php?page=<?php echo $i; ?>">
				    					<?php echo $i; ?>

				    				</a>
				    			</li>

						    <?php } ?>
		 				</ul>
					</nav>
                </div>
            </div>
            </div>
        </section>

    	<!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="/assets/mail/jqBootstrapValidation.js"></script>
        <script src="/assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
    </body>
</html>