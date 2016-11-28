<?php session_start(); ?>
<?php include("inc/header.php"); ?>
 <div class="header">
    <img src="public/img/river.jpg" alt="" height="350px" width="100%">
</div>
	<div class="sadrzaj">
	<div class="col-md-12"><br>
		<section>
        <?php
        $count = 0;
        $xmlDoc = simplexml_load_file('http://www.blic.rs/rss/IT');
        ?>
           <center ><?php echo '<h1 class="text-muted">' . $xmlDoc->channel->title . ' RSS</h1>'; ?></center><br><br>
        <?php
        foreach ($xmlDoc->channel->item as $item):
            ?>
        <div class="col-md-4">
            <label for=""><h5 align="center"><a class='text-muted' href="<?php echo $item->link; ?>" target="_blank"></label>
			    <blockquote>    
                        <?php 
                        echo substr($item->title, 0, 80);
                        $count++;
        				?>...</a></h5>
                        <p class="text-center"><?php echo substr($item->description, 0, 200); ?>...</p><hr/>
                </blockquote>
    	</div>
        <?php if ($count > 2) break; ?>
  <?php endforeach ?> 
    	</section>
	</div>
	</div>
     <div class="well" id="aplikacija" >
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <center><h2 id="opis">Opis aplikacije</h2></center>
                                   <p class="text-center">Aplikacija za kreiranje,citanje,update i brisanje postova.Sadrzaj postova je informativnog karaktera
                                   o IT novostima.
                                     </p>
                            </div>
                        </div>
                    </div>
                </div>
<?php include("inc/footer.php"); ?>
</body>
</html>