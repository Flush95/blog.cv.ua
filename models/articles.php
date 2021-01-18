<?php

	/**
	 *
	 */
	class Article {

		private $author;
		private $article_title;
		private $article_text;
		private $article_pub_time;
		private $article_comments;

		function __construct($author, $article_title, $article_text, $article_pub_time, $article_pub_time) {
			$this->author = $author;
			$this->title = $title;
			$this->text = $text;
			$this->article_pub_time = $article_pub_time;
			$this->article_comments = $article_comments;
		}

    /**
     * @return mixed
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * @param mixed $author
     *
     * @return self
     */
    public function setAuthor($author) {
        $this->author = $author;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArticleTitle() {
        return $this->article_title;
    }

    /**
     * @param mixed $article_title
     *
     * @return self
     */
    public function setArticleTitle($article_title) {
        $this->article_title = $article_title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArticleText() {
        return $this->article_text;
    }

    /**
     * @param mixed $article_text
     *
     * @return self
     */
    public function setArticleText($article_text) {
        $this->article_text = $article_text;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArticlePubTime() {
        return $this->article_pub_time;
    }

    /**
     * @param mixed $article_pub_time
     *
     * @return self
     */
    public function setArticlePubTime($article_pub_time) {
        $this->article_pub_time = $article_pub_time;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArticleComments() {
        return $this->article_comments;
    }

    /**
     * @param mixed $article_comments
     *
     * @return self
     */
    public function setArticleComments($article_comments) {
        $this->article_comments = $article_comments;

        return $this;
    }
}
?>