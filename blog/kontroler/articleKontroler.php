<?php 
	include("../model/funkcije.php");
	$metoda = $_SERVER['REQUEST_METHOD'];	

	switch($metoda)
	{
		case "POST":
			if (isset($_POST['obrisiID']))
			{
				Funkcije::obrisiPost($_POST['obrisiID']);
			}
		    if (isset($_POST['ubaci'])&& $_POST['ubaci'] == "Insert article")
			{
				$title = $_POST['title'];
				$img = $_FILES['image'];
				$keywords = $_POST['keywords'];
				$date = $_POST['datepicker'];
				$tekstarea = $_POST['tekstarea'];
				$user_id = $_POST['id'];
				$article = Funkcije::insertArticle($title,$img,$keywords,$date,$tekstarea,$user_id);
				var_dump($article);
			}
			 break;

		case "GET":
			if (isset($_GET['data']) && $_GET['data']=="article"){

				$json = Funkcije::getArticles();

			}
			if (isset($_GET['data']) && $_GET['data']=="searchArticle")
			{

				$keywords = $_GET['naziv'];
				Funkcije::search($keywords);
			}
			 break;
	}


	
	
	
 ?>