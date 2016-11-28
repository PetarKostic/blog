<?php 
  include("../inc/konekcija.php");

switch ($_REQUEST ['columnId']){
	case 1:
		$sql = "UPDATE articles SET article_title='".$_REQUEST['value']."' WHERE article_id=".$_REQUEST['id'];
	break;
	case 2:
		$sql = "UPDATE articles SET article_content='".$_REQUEST['value']."' WHERE article_id=".$_REQUEST['id'];
	break;
	case 3:
		$sql = "UPDATE articles SET article_img='".$_REQUEST['value']."' WHERE article_id=".$_REQUEST['id'];
	break;
	case 4:
		$sql = "UPDATE articles SET user_id='".$_REQUEST['value']."' WHERE article_id=".$_REQUEST['id'];
	break;
	case 5:
		$sql = "UPDATE articles SET post_date='".$_REQUEST['value']."' WHERE article_id=".$_REQUEST['id'];
	break;
	case 6:
		$sql = "UPDATE articles SET keywords='".$_REQUEST['value']."' WHERE article_id=".$_REQUEST['id'];
	break;

}

Baza::getInstance()->updateArticle($sql);

 ?>