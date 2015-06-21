jQuery(document).ready(function($){
	
	$('#menu1').load('./wew/indexp.php?menu11=1');
	
	$('#zaloguj1').click(function(e) {
				
		e.preventDefault();
        data = new FormData();
		data.append("user1", $('#user1').val());
		data.append("pass1", $('#pass1').val());	
        $.ajax({
            type: 'POST',
            url: './wew/indexp.php?logowanie=1',
            data: data,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(data) {
            console.log(data);
			if (data=='OK')
			{
				$('#alertboxz').html("Logowanie prawidłowe");
				$('#alertboxz').show('slow');
				setTimeout(function(){ 
				$('#alertboxz').hide('slow');
				$('#tresc').html("");
				//location.reload();
				$('#menu1').load('./wew/indexp.php?menu11=1');
				}, 2000);
				
			}
			else
			{
				$('#user1').val("");
				$('#pass1').val("");
				$('#alertboxc').html("Nie prawidłowy użytkownik / hasło");
				//$('#alertboxc').html(data);
				$('#alertboxc').show('slow');
				setTimeout(function(){ $('#alertboxc').hide('slow'); }, 2000);
			}
			
        });
	});
	$(document.body).on('click', '#wyloguj', function() { 	
			$('#menu1').load('./wew/indexp.php?menu11=2');
			$('#alertboxz').text('Użytkownik Wylogowany');
			$('#alertboxz').show('slow');
			setTimeout(function(){ $('#alertboxz').hide('slow'); 
			location.reload();
			}, 2000);
		});

});
