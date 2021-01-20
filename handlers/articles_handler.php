<?php

class ArticleHandler {
	private $table_name = "articles";
	private $page = 1;
	private $limit = 10;

	//return total records in articles table
	public function count_total() {
		return R::count($this->table_name);
	}

	//counting pages
	public function get_total_pages($count) {
		return ceil($count / $this->limit);
	}

	//Paggination query
	public function find_page($page) {
		return R::findAll($this->table_name, "ORDER BY `pub_time` DESC LIMIT ?,?", array((($page - 1) * $this->limit), $this->limit));
	}


	public function getArticleComments($article) {
		foreach ($article->ownCommentsList as $comm) {
			echo $comm->comment_text;
		}
		return $article->ownCommentsList;
	}


}