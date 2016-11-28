<?php 
	
	include("../model/funkcije.php");
	$metoda = $_SERVER['REQUEST_METHOD'];	

	if (isset($_GET['data']) && $_GET['data'] == "vrati_usere")
	{
		$json = Funkcije::getUsers();
	}

	if (isset($_POST['korisnik']))
	{
		$json = $_POST['korisnik'];
		Funkcije::login($json);	
	}

	if (isset($_GET['data']) && $_GET['data']=="searchUserID")
	{
				
		$id = $_GET['id'];
		Funkcije::searchUserID($id);
	}


	if (isset($_GET['str']))
	{
		$trenutna_strana = $_GET['str'];
	}



 ?>