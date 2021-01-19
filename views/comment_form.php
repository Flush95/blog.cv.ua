
<?php
if (isset($_SESSION['logged_user'])) { ?>
	<label for="name_text">Оставить комментарий</label>
	<form action="/handlers/comment_handler.php" method="POST">
		<input type="text" name="comment_text">
		<input type ="text" name="id" value ="<?php echo $full_art->id;  ?>" hidden />
		<input type="submit" name="submit_comment">
	</form>
<?php } ?>