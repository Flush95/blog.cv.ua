
	<form class="form-inline" action="/handlers/comment_handler.php" method="POST">
		<input class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" type="text" name="comment_text" placeholder="Оставить комментарий">
		<input type ="text" name="id" value ="<?php echo $full_art->id;  ?>" hidden />
		<input class="form-control mb-2 mr-sm-2" type="submit" name="submit_comment">
	</form>