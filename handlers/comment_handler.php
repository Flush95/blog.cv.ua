<?php
	include "W:/domains/blog.cv.ua/db.php";
	if (isset($_POST)) {
		$comment = R::dispense("comments");
		$comment->pub_date = date("Y-m-d H:i:s");
		$comment->comment_text = $_POST['comment_text'];
		$comment->user = $_SESSION['logged_user']->id;

		$article = R::load("articles", $_POST['id']);
		$article->ownCommentsList[] = $comment;
		R::store($article);

		header("Location:/views/articles.php");
	}
?>