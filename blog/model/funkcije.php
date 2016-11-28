<?php 
	include("../inc/konekcija.php");
	class Funkcije
	{
		public static function getArticles()
		{
			 Baza::getInstance()->getArticles();
		}

		public static function vratiArticle()
		{
			return Baza::getInstance()->vratiArticle();
		}

		public static function getArticleID($id)
		{
			return Baza::getInstance()->getArticleID($id);
		}

		public static function getUsers()
		{
			 Baza::getInstance()->getUsers();
		}

		public static function login($json)
		{
			Baza::getInstance()->login($json);
		}

		public static function search($keywords)
		{
			Baza::getInstance()->search($keywords);
		}

		public static function searchUserID($id)
		{
			Baza::getInstance()->searchUserID($id);
		}

		public static function obrisiPost($json)
		{
			Baza::getInstance()->obrisiPost($json);
		}

		public static function brojArticla()
		{
			Baza::getInstance()->brojaArticla();
		}

		public static function insertArticle($title, $img, $keywords, $date, $tekstarea, $user_id)
		{
			include('article.php');
			$article = FactoryArticle::create($title, $tekstarea, $img, $user_id, $date, $keywords); 
			return Baza::getInstance()->insertArticle($article);
		}
	}

 ?>