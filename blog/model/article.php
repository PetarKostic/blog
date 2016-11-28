<?php 
	class Article
	{
		private $article_title;
		private $article_content;
		private $article_img;
		private $user_id;
		private $post_date;
		private $keywords;

		function __construct($article_title, $article_content, $article_img, $user_id, $post_date, $keywords)
		{
			$this->article_title = $article_title;
			$this->article_content = $article_content;
			$this->article_img = $article_img;
			$this->user_id = $user_id;
			$this->post_date = $post_date;
			$this->keywords = $keywords;
		}

		function getArticleTitle()
		{
			return $this->article_title;
		}
		function getArticleContent()
		{
			return $this->article_content;
		}
		function getArticleImg()
		{
			return $this->article_img;
		}
		function getUserID()
		{
			return $this->user_id;
		}
		function getPostDate()
		{
			return $this->post_date;
		}
		function getKeywords()
		{
			return $this->keywords;
		}
	}

	class FactoryArticle
	{
		static function create($article_title, $article_content, $article_img, $user_id, $post_date, $keywords)
		{
			return new Article($article_title, $article_content, $article_img, $user_id, $post_date, $keywords);
		}
	}


 ?>