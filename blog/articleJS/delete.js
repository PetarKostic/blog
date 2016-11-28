	$.get("../kontroler/articleKontroler.php",{data: "article"}).done(function(odg){
		var data = JSON.parse(odg);
		$.each(data,function(i, item){
			var podaci = '<h2 align="center">'+item.article_title+'</h2>'+
			' <img src="../public/img/'+item.article_img+'" alt="slika" class="img-rounded" height="200" weight="800">'+'<br>'+
			'<p>'+ item.article_content.substring(0,300) +'...</p> <br>'+ 
			' <a class="btn btn-primary" align="center" onclick="obrisiPost('+item.article_id+')" >Delete post</a><br> '+ '<br>'+
			'<h4 align="right">Write by: <a>'+item.user_name+'</a></h4>'+
			'<hr>';
			$("#articles").append(podaci);
		});
	});

	$.get("../kontroler/kontroler.php",{data: "vrati_usere"}).done(function(odg){
		var data = JSON.parse(odg);
		$.each(data,function(i, item){
			var podaci = "<option value='"+item.user_id+"'>"+item.user_name+"</option>"
			$("#sel1").append(podaci);
		});
	});

	$("#sel1").change(function(){
		var selected = $("#sel1 option:selected").val();
		$.get("../kontroler/kontroler.php",{data: "searchUserID", id: selected}).done(function(odg){
		var data = JSON.parse(odg);
		var podaci = "";
			$.each(data,function(i, item){
				 podaci += '<h2 align="center">'+item.article_title+'</h2>'+
				' <img src="../public/img/'+item.article_img+'" alt="slika" class="img-rounded" height="200" weight="800">'+'<br>'+
				'<p>'+ item.article_content.substring(0,500) +'...</p> <br>'+ 
				' <a class="btn btn-primary" align="center" onclick="obrisiPost('+item.article_id+')" >Delete post</a><br> '+ '<br>'+
				'<h4 align="right">Write by: <a>'+item.user_name+'</a></h4>'+
				'<hr>';
				
			});
			$("#articles").html(podaci);
		});

	});

	
	$("#nadji").click(function(){
		var searchPolje = $("#search").val();
		$.get("../kontroler/articleKontroler.php",{data: "searchArticle",naziv: searchPolje}).done(function(odg){
			var data = JSON.parse(odg);
			$.each(data,function(i, item){
				var podaci = '<h2 align="center"><a href="'+item.article_id+'/">'+item.article_title+'</a></h2>'+
				' <img src="../public/img/'+item.article_img+'" alt="slika" class="img-rounded" height="200" weight="800">'+'<br>'+
				'<p>'+ item.article_content.substring(0,300) +'...</p> <br>'+ 
				' <a class="btn btn-primary" align="center" onclick="obrisiPost('+item.article_id+')" >Delete post</a><br> '+ '<br>'+
				'<h4 align="right">Write by: <a>'+item.user_name+'</a></h4>'+
				'<hr>';
			});
			$("#articles").html(podaci);
		});
	});

	function searchPost()
	{
	var searchPolje = $("#search").val();
	$.get("../kontroler/articleKontroler.php",{data: "searchArticle",naziv: searchPolje}).done(function(odg){
		var data = JSON.parse(odg);
		var podaci = "";
		$.each(data,function(i,item){
			 podaci += '<h2 align="center"><a href="'+item.article_id+'/">'+item.article_title+'</a></h2>'+
			' <img src="../public/img/'+item.article_img+'" alt="slika" class="img-rounded" height="200" weight="800">'+'<br>'+
			'<p>'+ item.article_content.substring(0,500) +'...</p> <br>'+ 
			' <a class="btn btn-primary" align="center" onclick="obrisiPost('+item.article_id+')" >Delete post</a><br> '+ '<br>'+
			'<h4 align="right">Write by: <a>'+item.user_name+'</a></h4>'+
			'<hr>';
		});
		$("#articles").html(podaci);
	});
	}

	$('#search').keypress(function(e){
        if (e.which == 13){//Enter key pressed
           searchPost();
           $("#search").val('');
        }
    });

	$("#stil").hide();
	
	function obrisiPost(id)
	{
		var obj = { id: id ,}
		var json = JSON.stringify(obj);
		$.post("../kontroler/articleKontroler.php",{obrisiID: json}).done(function(odgovorServera){
			window.location = "./";
		}).fail(function(odgovorServera){
			alert(odgovorServera);
		});
	}

