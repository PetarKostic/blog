<?php session_start(); ?>
<?php include("../inc/header.php"); ?>
<?php include("../model/funkcije.php"); ?>
<style>
.row_selected td {
    background-color: #d3d3d3 !important;
 }
</style>
<br><br><br>
<div class="container">
<h1 class="text-muted">Update <small>some article</small></h1><br>
	<table class="tabela display">
	<thead>
		<tr>
			<th>ID</th>
			<th>Article title</th>
			<th>Article content</th>
			<th>Image</th>
			<th>User id</th>
			<th>Post date</th>
			<th>Article keywords</th>
		</tr>
	</thead>
	<tbody id="prikaz">
		<?php 
		$articles = Funkcije::vratiArticle();
		foreach($articles as $article):?>
			<tr id="<?= $article['article_id'];?>">
				<td><?= $article['article_id']; ?></td>
				<td><?= $article['article_title']; ?></td>
				<td><?= substr($article['article_content'],0,50); ?></td>
				<td><?= $article['article_img']; ?></td>
				<td><?= $article['user_id']; ?></td>
				<td><?= $article['post_date']; ?></td>
				<td><?= $article['keywords']; ?></td>
			</tr>
		<?php endforeach;
		 ?>
	</tbody>	
</table><br>
</div>

<?php include(ROOT_PATH . "inc/footer.php"); ?>
<script type="text/javascript" src="<?= OSNOVNI_URL;?>DataTables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= OSNOVNI_URL;?>DataTables/extensions/editable/jquery.dataTables.editable.js"></script>
<script src="<?= OSNOVNI_URL;?>DataTables/jquery.jeditable.js"></script>
<script type="text/javascript" src="<?= OSNOVNI_URL;?>articleJS/update.js"></script>
