jQuery(document).ready(function($){

	$('#menu1').load('./wew/indexp.php?menu11=1');
	$('#knefeldod').load('./wew/pracownicyp.php?klawisz=1');
	$('#tabelaprac').load('./wew/pracownicyp.php?rysujtab=1');
	$('body').on('click', '#wyloguj', function() { 	
		$('#menu1').load('./wew/indexp.php?menu11=2');
		$('#alertboxz').text('Użytkownik Wylogowany');
		$('#alertboxz').show('slow');
		setTimeout(function(){ window.open ('index.php','_self',false); }, 2000);			
	});
	
	$('body').on('click', '#dodajb', function() { 		
		
		$('#imiep').val("");
		$('#nazwiskop').val("");
		$('#userp').val("");
		$('#passp1').val("");
		$('#passp2').val("");
		
	});
	
	$('#zapiszp').click(function(e){
		e.preventDefault();
        data = new FormData();
		data.append("imiep", $('#imiep').val());
		data.append("nazwiskop", $('#nazwiskop').val());
		data.append("userp", $('#userp').val());
		data.append("passp1", $('#passp1').val());
		data.append("passp2", $('#passp2').val());
		data.append("uprp", $('#uprp').val());
		
        $.ajax({
            type: 'POST',
            url: './wew/pracownicyp.php?dodoprac=1',
            data: data,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data) {
            console.log(data);
			if (data=='Pracownik dodany')
			{
				$('#paneldod').modal('hide');
				$('#alertboxz').text(data);
				$('#alertboxz').show('slow');
				setTimeout(function(){ $('#alertboxz').hide('slow'); }, 3000);
				setTimeout(function(){ $('#tabelaprac').load('./wew/pracownicyp.php?rysujtab=1'); }, 1000);
				
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
function usunprac(nr) {
	var answer = confirm ("Czy na pewno chcesz usunąć Osobę")
	if (answer)
	{
		$.get('./wew/pracownicyp.php?usunprac='+nr);
		setTimeout(function(){ $('#tabelaprac').load('./wew/pracownicyp.php?rysujtab=1'); }, 1000);
		$('#alertboxc').text('Osoba usunięta prawidłowo');
		$('#alertboxc').show('slow');
	    setTimeout(function(){ $('#alertboxc').hide('slow'); }, 3000);
	}
};
