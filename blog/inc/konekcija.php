<?php 
	class Baza 
	{
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $baza = "blog";
		private $mysqli;
		private static $instance;

		static function getInstance()
		{
			if(self::$instance === null)
			{
				self::$instance = new self();
			}
			return self::$instance;
		}

		function __construct()
		{
			$this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->baza);
			if($this->mysqli->connect_errno)
			{
				die("doslo je do greske prilikom konekcije sa bazom");
			}
		}

		function closeConnection()
		{
			$this->mysqli->close();
		}

		function getArticles()
		{
			$sql = "SELECT * from articles join users USING(user_id) order by article_id DESC limit 0,3 ";
			$rezultat = $this->mysqli->query($sql);
			$niz = array();
			while ($row = $rezultat->fetch_assoc())
			{
				$niz[] = $row;
			}
			echo json_encode($niz);
		}
		function vratiArticle()
		{
			$sql = "SELECT * from articles join users USING(user_id)";
			$rezultat = $this->mysqli->query($sql);
			$niz = array();
			while ($row = $rezultat->fetch_assoc())
			{
				$niz[] = $row;
			}
			return $niz;
		}


		function getArticleID($id)
		{
			$sql = "SELECT * from articles join users using(user_id) where article_id = '$id'";
			$rezultat = $this->mysqli->query($sql);
			$niz = array();
			while ($row = $rezultat->fetch_assoc())
			{
				$niz[] = $row;
			}
			return json_encode($niz);
		}

		function getUsers()
		{
			$sql = "select * from users ";
			$rezultat = $this->mysqli->query($sql);
			$niz = array();
			while ($row = $rezultat->fetch_assoc())
			{
				$niz[] = $row;
			}
			echo json_encode($niz);
		}

		function search($keywords)
		{
			$sql = "SELECT * FROM articles join users using(user_id) WHERE keywords LIKE  '%$keywords%' ";
			$rezultat = $this->mysqli->query($sql);
			$niz = array();
			while ($row = $rezultat->fetch_assoc())
			{
				$niz[] = $row;
			}
			echo json_encode($niz);
		}

		function searchUserID($id)
		{
			$sql = "SELECT * FROM articles join users using(user_id) WHERE user_id = '$id'";
			$rezultat = $this->mysqli->query($sql);
			$niz = array();
			while ($row = $rezultat->fetch_assoc())
			{
				$niz[] = $row;
			}
			echo json_encode($niz);
		}

		function obrisiPost($json)
		{
			$podaci = json_decode($json);
			$id = $podaci->id;
			$sql = "DELETE FROM articles WHERE article_id = '$id'";
			if ($this->mysqli->query($sql) === TRUE){
			echo "uspesno obrisan post";
		}
			else 
			{
				echo "doslo je do greske prilikom brisanja";
			}
		}

		function brojaArticla()
		{
			$sql = "SELECT * from articles ";
			$rez = $this->mysqli->query($sql);
			return $rez->num_rows;
		}

		function login($json)
		{
			$korisnik = json_decode($json);
			$user_name = $korisnik->user;
			$password = $korisnik->sifra;

			$sql = "select * from  users where user_name = '$user_name' and user_password = '$password'";
			$rez = $this->mysqli->query($sql);
			$broj_redova = $rez->num_rows;
			if ($broj_redova == 1)
			{
				$niz = $rez->fetch_assoc();
				extract($niz);
				session_start();
				$_SESSION['username'] = $user_name;
				$_SESSION['level'] = $acces_level;
			    $_SESSION['id'] = $user_id;
				if (isset($_SESSION['username']))
				{
					$sql = "update users set last_log_time = now()";
					$this->mysqli->query($sql);
					$_SESSION['vreme'] = $last_log_time;
					echo "articles/";
				} else
				  {
					 echo "./";
				  }
			}
		}

		function insertArticle($article)
		{
			$title = $article->getArticleTitle();
			$content= $article->getArticleContent();
			$img = $article->getArticleImg();
			$user_id = $article->getUserID();
			$d = $article->getPostDate();
			$datum = date("Y-m-d", strtotime($d));
			$keywords = $article->getKeywords(); 
			$lokacija = "../public/img/";
			$slika = $_FILES['image']['name'];
			$lokacija = $lokacija . $slika;

			$sql = "insert into articles values('0','$title','$content','$slika','$user_id','$datum','$keywords')";
			if ((move_uploaded_file($_FILES['image']['tmp_name'], $lokacija)) && $this->mysqli->query($sql) === TRUE)
			{
					header("location:../articles/");
			}
			else
			{
					header("location:../create/");
			}
		}


		function updateArticle($sql)
		{
			if ($this->mysqli->query($sql) === TRUE) {
    			echo $_REQUEST["value"];
			} else {
    			echo "err";
			}
		}

	}
	
?>