	$.get("../kontroler/kontroler.php",{data: "vrati_usere"}).done(function(odg){
		var data = JSON.parse(odg);
		$.each(data,function(i,item){
			var podaci = "<option value='"+item.user_id+"'>"+item.user_name+"</option>"
			$("#sel1").append(podaci);
		});
	});




	

