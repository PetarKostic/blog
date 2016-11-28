function logovanje()
{
	var username = $("#username").val();
	var sifra = $("#sifra").val();
	var obj = 
		{
			user: username,
			sifra: sifra
		}
	var json = JSON.stringify(obj);
	$.post("kontroler/kontroler.php",{korisnik: json }).done(function(odg){
		window.location = odg;
	});
}

$('#sifra').keypress(function(e){
    if(e.which == 13){//Enter key pressed
      logovanje();  
    }
});

$('#username').keypress(function(e){
    if(e.which == 13){//Enter key pressed
           logovanje();     
    }
});

$("#aplikacija").hide();
$(".sadrzaj").click(function(){
	$(this).hide(4000);
	$("#aplikacija").show(4000);
});

$("#aplikacija").click(function(){
	$(".sadrzaj").slideDown(4000);
});


