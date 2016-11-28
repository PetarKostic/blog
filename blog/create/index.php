<?php session_start(); ?>
<?php include("../inc/header.php"); ?><br><hr>
<form method="post" id="create_aritcle" action="../kontroler/articleKontroler.php" enctype="multipart/form-data">

<div class="container">
<h1 class="text-muted">Insert <small>new article</small></h1><br>
    <div class="col-md-12">
        <div class="col-md-6">
                <div class="form-group">
                    <label for="article_title"><h4>Article title</h4></label>
                    <input type="text" class="form-control" name="title"  id="article_title" placeholder="Unesi ime"  >
                </div>
                <div class="form-group">
                    <label for="article image"><h4>Article image</h4></label>
                    <input type="file" id="article_img"  name="image" class="btn btn-default btn-file" accept="image/*"  >
                </div>
             <div class="form-group">
                    <label for="aricle_date"><h4>Insesrt date</h4></label><br>
                     <input type="text" class="form-control" name="datepicker" id="datepicker"  placeholder="pick date" >
                </div>  

                <input type="hidden" name="id" value="<?= $_SESSION['id'];?>"> 
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="user-message" class=" control-label">
                   <h4>Article content</h4>
                </label>
                <div class="form-group">
                    <textarea id="article_content"  name="tekstarea"  class="form-control" cols="20" rows="7" style="width: 514px; height: 128px;" placeholder="Unesite opis proizvoda" ></textarea>
                </div>
            </div>
               <div class="form-group">
                <label for="Ime"><h4>Keywords</h4></label>
                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="Insert keywords"  >
            </div>
        </div>
    </div>
</div>
    <div class="dugmici"><br><br>
        <div class="form-group col-md-4 col-md-offset-3">
           <input type="submit" value="Insert article" name="ubaci" class="btn btn-primary">
           <input type="reset" value="Reset field" name="ubaci" class="btn btn-default">
        </div>   
    </div>
</form>

    <?php include(ROOT_PATH . "inc/footer.php"); ?>
    <script type="text/javascript" src="<?= OSNOVNI_URL;?>articleJS/create.js"></script>
