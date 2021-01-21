
<?php function displayComments($article_comments) { ?>
	<div class="row">
	<?php foreach ($article_comments as $comm) { ?>

		<div class="col-lg-8">
		    <span class="badge badge-success"><?php  echo R::findOne("users", "id = ?", [$comm->user])->login; ?></span>
		    <p><span class="badge badge-light"><?php echo $comm->comment_text; ?></span></p>
		    <span class="badge badge-primary badge-pill float-right"><?php echo $comm->pub_date; ?></span>
		    <hr>
		</div>

	<?php } ?>
	</div>
<?php } ?>