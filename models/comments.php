<?php

	/**
	 *
	 */
	class comment {

		private $user_name;
		private $date;
		private $article_id;
		private $comment_text;

		function __construct($user_name, $date, $article_id, $comment_text) {
			$this->user_name = $user_name;
			$this->date = $date;
			$this->article_id = $article_id;
			$this->comment_text = $comment_text;
		}


    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     *
     * @return self
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArticleId()
    {
        return $this->article_id;
    }

    /**
     * @param mixed $article_id
     *
     * @return self
     */
    public function setArticleId($article_id)
    {
        $this->article_id = $article_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentText()
    {
        return $this->comment_text;
    }

    /**
     * @param mixed $comment_text
     *
     * @return self
     */
    public function setCommentText($comment_text)
    {
        $this->comment_text = $comment_text;

        return $this;
    }
}


?>