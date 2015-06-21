jQuery(document).ready(function($){

	$('#menu1').load('./wew/indexp.php?menu11=1');
	$('#knefeldod').load('./wew/dziecip.php?klawisz=1');
	$('#tabelaprac').load('./wew/dziecip.php?rysujtab=1');
	$('#opiekun1').load('./wew/dziecip.php?ladujopiekun=1');
	$('#opiekun2').load('./wew/dziecip.php?ladujopiekun=1');
	$('#grupa1').load('./wew/dziecip.php?ladujgrupa=1');
	
	$('body').on('click', '#wyloguj', function() { 	
		$('#menu1').load('./wew/indexp.php?menu11=2');
		$('#alertboxz').text('Użytkownik Wylogowany');
		$('#alertboxz').show('slow');
		setTimeout(function(){ window.open ('index.php','_self',false); }, 2000);			
	});
	
	$('body').on('click', '#dodajb', function() { 	
		
		$('#imiep').val("");
		$('#nazwiskop').val("");
		$('#opiekun1').val("");
		$('#grupa1').val("");
		$('#opiekun2').val("");
		$('#opiekun1').load('./wew/dziecip.php?ladujopiekun=1');
		$('#opiekun2').load('./wew/dziecip.php?ladujopiekun=1');
		$('#grupa1').load('./wew/dziecip.php?ladujgrupa=1');
	});
	
	$('#zapiszp').click(function(e){
		e.preventDefault();
        data = new FormData();
		data.append("imiep", $('#imiep').val());
		data.append("nazwiskop", $('#nazwiskop').val());
		data.append("opiekun1", $('#opiekun1').val());
		data.append("opiekun2", $('#opiekun2').val());
		data.append("grupa1", $('#grupa1').val());
		
        $.ajax({
            type: 'POST',
            url: './wew/dziecip.php?doddzieci=1',
            data: data,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data) {
            console.log(data);
			if (data=='Dziecko dodane prawidłowo')
			{
				$('#paneldod').modal('hide');
				$('#alertboxz').text(data);
				$('#alertboxz').show('slow');
				setTimeout(function(){ $('#alertboxz').hide('slow'); }, 3000);
				setTimeout(function(){ $('#tabelaprac').load('./wew/dziecip.php?rysujtab=1'); }, 1000);	
			}
			else
			{
				$('#alertboxp').html(data);
				$('#alertboxp').show('slow');
				setTimeout(function(){ $('#alertboxp').hide('slow'); }, 5000);
			}
			
        });
	});
});
function usundzieci(nr) {
	var answer = confirm ("Czy na pewno chcesz usunąć Dziecko")
	if (answer)
	{
		$.get('./wew/dziecip.php?usundzieci='+nr);
		setTimeout(function(){ $('#tabelaprac').load('./wew/dziecip.php?rysujtab=1'); }, 1000);
		$('#alertboxc').text('Osoba usunięta prawidłowo');
		$('#alertboxc').show('slow');
	    setTimeout(function(){ $('#alertboxc').hide('slow'); }, 3000);
	}
};
