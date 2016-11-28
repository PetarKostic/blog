	$.get("../kontroler/articleKontroler.php",{data: "article"}).done(function(odg){
		var data = JSON.parse(odg);
		$.each(data,function(i,item){
				var podaci = '<h2 align="center"><a href="'+item.article_id+'/">'+item.article_title+'</a></h2>'+
				'<img src="../public/img/'+item.article_img+'" alt="slika" class="img-rounded" height="200" weight="800">'+'<br><br>'+
				'<p>'+ item.article_content.substring(0,300) +'...</p> <br>'+ 
				' <a class="btn btn-primary" align="center" id="more" href="'+item.article_id+'/'+'">Read More <span class="glyphicon glyphicon-chevron-right"></span></a><br> '+ '<br>'+
				'<h4 align="right">Write by: <a>'+item.user_name+'</a></h4>'+
				'<hr>';
				$("#articles").append(podaci);
		});
	});

	function searchPost()
	{
	var searchPolje = $("#search").val();
	$.get("../kontroler/articleKontroler.php",{data: "searchArticle",naziv: searchPolje}).done(function(odg){
		var data = JSON.parse(odg);
		$.each(data,function(i,item){
			var podaci = '<h2 align="center"><a href="'+item.article_id+'/">'+item.article_title+'</a></h2>'+
			' <img src="../public/img/'+item.article_img+'" alt="slika" class="img-rounded" height="200" weight="800">'+'<br>'+
			'<p>'+ item.article_content.substring(0,300) +'...</p> <br>'+ 
			' <a class="btn btn-primary" align="center" id="more" href="'+item.article_id+'/">Read More <span class="glyphicon glyphicon-chevron-right"></span></a><br> '+ '<br>'+
			'<h4 align="right">Write by: <a>'+item.user_name+'</a></h4>'+
			'<hr>';
			$("#articles").html(podaci);

		});
	});
	}
		
	$('#search').keypress(function(e){
       if (e.which == 13) {//Enter key pressed
           searchPost();
          $("#search").val('');
       }
    });
	
	$("#sel1").change(function(){
		var podaci = "";
		var selected = $("#sel1 option:selected").val();
		$.get("../kontroler/kontroler.php",{data: "searchUserID", id: selected}).done(function(odg){
		var data = JSON.parse(odg);
		$.each(data,function(i,item){
			 podaci += '<h2 align="center"><a href="'+item.article_id+'/">'+item.article_title+'</a></h2>'+
			' <img src="../public/img/'+item.article_img+'" alt="slika" class="img-rounded" height="200" weight="800">'+'<br>'+
			'<p>'+ item.article_content.substring(0,300) +'...</p> <br>'+ 
			' <a class="btn btn-primary" align="center" id="more" href="'+item.article_id+'/">Read More <span class="glyphicon glyphicon-chevron-right"></span></a><br> '+ '<br>'+
			'<h4 align="right">Write by: <a>'+item.user_name+'</a></h4>'+
			'<hr>';
				});
			$("#articles").html(podaci);
		});

	});

