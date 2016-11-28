<?php 
	include("../inc/header.php");?><br><hr><?php
	include("../model/funkcije.php");
	if (isset($_GET['id']))
	{
		$id =  $_GET['id'];
		$json = Funkcije::getArticleID($id);
		$podaci = json_decode($json);
	}
		foreach ($podaci as $item):?>
			<div class="container">
				<h1 align="center"> <?= $item->article_title;?> </h1>
				<center> <img src="../../public/img/<?= $item->article_img?>" alt="slika" class="img-rounded" height="300" weight="800"> </center><br>
				<p> <?= $item->article_content; ?> </p>
				<h4 align="right">Write by: <a><?= $item->user_name; ?></a></h4>
		   	    <p> <span class="glyphicon glyphicon-time"></span> Posted on :<?= $item->post_date; ?> </p>
			    <hr>
			    <a class="btn btn-primary" align="center" id="more" href="<?= OSNOVNI_URL . 'articles/'; ?>"> <span class="glyphicon glyphicon-chevron-left"></span>GO BACK</a>
			</div>
  <?php endforeach; ?>
<?php include("../inc/footer.php"); ?>
