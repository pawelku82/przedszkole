jQuery(document).ready(function($){

	$('#menu1').load('./wew/indexp.php?menu11=1');
	$('#knefeldod').load('./wew/grupyp.php?klawisz=1');
	$('#tabelaprac').load('./wew/grupyp.php?rysujtab=1');
	$('body').on('click', '#wyloguj', function() { 	
		$('#menu1').load('./wew/indexp.php?menu11=2');
		$('#alertboxz').text('Użytkownik Wylogowany');
		$('#alertboxz').show('slow');
		setTimeout(function(){ window.open ('index.php','_self',false); }, 2000);			
	});
	
	$('body').on('click', '#dodajb', function() { 	
		
		$('#nazwap').val("");
		$('#rocznikp').val("");
	});
	
	$('#zapiszp').click(function(e){
		e.preventDefault();
        data = new FormData();
		data.append("nazwap", $('#nazwap').val());
		data.append("rocznikp", $('#rocznikp').val());
		
        $.ajax({
            type: 'POST',
            url: './wew/grupyp.php?dodgrupy=1',
            data: data,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data) {
            console.log(data);
			if (data=='Grupa dodana prawidłowo')
			{
				$('#paneldod').modal('hide');
				$('#alertboxz').text(data);
				$('#alertboxz').show('slow');
				setTimeout(function(){ $('#alertboxz').hide('slow'); }, 3000);
				setTimeout(function(){ $('#tabelaprac').load('./wew/grupyp.php?rysujtab=1'); }, 1000);
				
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
function usungrupy(nr) {
	var answer = confirm ("Czy na pewno chcesz usunąć Grupę")
	if (answer)
	{
		$.get('./wew/grupyp.php?usungrupy='+nr);
		setTimeout(function(){ $('#tabelaprac').load('./wew/grupyp.php?rysujtab=1'); }, 1000);
		$('#alertboxc').text('Grupa usunięta prawidłowo');
		$('#alertboxc').show('slow');
	    setTimeout(function(){ $('#alertboxc').hide('slow'); }, 3000);
	}
};
