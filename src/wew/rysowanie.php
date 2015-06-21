<?php

class Sesja
{
	public function wyloguj()
	{
		session_unregister('zalogowanys');
		session_destroy();
	}
	public function czyzalogowany()
	{
		if(!isset($_SESSION['zalogowanys']))
			return 0;
		else
			return $_SESSION['zalogowanys'];
		
		
	}
	public function imie()
	{
		if(isset($_SESSION['zalogowanys']))
			return $_SESSION['imie'];
	}
	public function logowanie($user1, $pass1)
	{
		$zapytanie = new zapytania_sys;
		$wiersz1=$zapytanie->logowanie($user1, $pass1);
		if ($wiersz1!=false)
		{
			$_SESSION['zalogowanys']=$wiersz1[2];
			$_SESSION['imie']=$wiersz1[0];
			$_SESSION['nazwisko']=$wiersz1[1];
			return "OK";
		}
		else
		{
			$_SESSION['zalogowanys']=0;
			return 0;
		}
		unset($zapytanie);
		

	}
}



class rysowanie
{
	public $wybor1;
	public $sesja1;
	
	public function __construct()
	{
		$this->sesja1 = new sesja;
	}
	public function tresc()
	{
		if ($this->sesja1->czyzalogowany()==0)
		{
			$this->wybor1='<div class="container">
			<div class="col-md-4"></div>
			<div class="col-md-4"><div class="row">
			<form role="form">
			<h2 class="text-center">System zarzÄdzania przedszkolem</h2>
			<label></label>
			<label for="user1" class="sr-only">UĹźytkownik:</label>
			<input type="text" id="user1" class="form-control" placeholder="Podaj login" required autofocus>
			<label for="pass1" class="sr-only">HasĹo:</label>
			<label></label>
			<input type="password" id="pass1" class="form-control" placeholder="Podaj hasĹo" required>
			<label></label>
			<label></label>
		
			<button class="btn btn-lg btn-primary btn-block" type="submit" id="zaloguj1">Zaloguj</button>
		
			</form>
			</div></div>
			</div> <!-- /container -->';
			
		}
		else
		{
	
		}
			
	}
	public function menu()
	{
		if ($this->sesja1->czyzalogowany()==0)
		{
			
		}
		else
		{
			$this->wybor1='
			  <nav class="navbar navbar-default">
			  <div class="container-fluid">
			  <div class="navbar-header">
				<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></a>
			  </div>
			  <ul class="nav navbar-nav">';
				if ($this->sesja1->czyzalogowany()>3)
				{
					$this->wybor1.='
					<li class="dropdown">
					<a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false">Administracja<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="pracownicy.php"><span class="glyphicon glyphicon-user"aria-hidden="true"></span>&nbsp;&nbsp;Osoby</a></li>
						<li><a href="dzieci.php"><span class="glyphicon glyphicon-tree-conifer"aria-hidden="true"></span>&nbsp;&nbsp;Dzieci</a></li>
						<li><a href="grupy.php"><span class="glyphicon glyphicon-asterisk"aria-hidden="true"></span>&nbsp;&nbsp;Grupy</a></li>
						<li class="divider"></li>
					</ul>
					</li>';	
				}	
				$this->wybor1.='</ul>
					
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="wyloguj">Witaj&nbsp;'.$this->sesja1->imie().'&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-off" aria-hidden="true" ></span>&nbsp;&nbsp;Wyloguj</a></li>
				
			  </ul>
			</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
			</nav>';
		}
			
	}
}

class rysowanie_pracownicy extends rysowanie
{
	public function rysuj_kdodaj()
	{
		if ($this->sesja1->czyzalogowany()>3)
		{
			return '<button  type="submit" class="btn btn-primary" onclick="#paneldod" id="dodajb"  data-toggle="modal" data-target="#paneldod">&nbsp;
					<span class="glyphicon glyphicon-user" aria-hidden="true" ></span>&nbsp;&nbsp;Dodaj&nbsp;OsobÄ&nbsp;</button>';
		}
	}
	public function rysuj_tabelaprac()
	{
		if ($this->sesja1->czyzalogowany()>3)
		{
			$slownik = new slownik_sys;
			$zapytanie = new zapytania_pracownicy;
			$wynik1=$zapytanie->listuj_pracownicy(0); 
			if ($wynik1)
			{
				$wybor1='<table class="table table-striped table-condensed">
				<caption></caption>
				<thead><tr><th>ImiÄ Nazwisko</th><th>UĹźytkownik</th><th>Stanowisko</th><th></th></tr></thead>
				<tbody>';
				while($wiersz=mysql_fetch_row($wynik1))
				{
					$wybor1.='<tr><td>'.$wiersz[0].' '.$wiersz[1].'</td>
					<td>'.$wiersz[2].'</td>
					<td>'.$slownik->rodzaj_uprawnienia($wiersz[3]).'</td>
					
					<td><button type="button"  class="btn btn-danger btn-xs" aria-label="UsuĹ" onclick="usunprac('.$wiersz[4].')">
					<strong>&nbsp;UsuĹ&nbsp;</strong></button>';
					}
					$wybor1.='</td></tr>';
					
					
				}
				$wybor1.='</tbody></table>';
				unset($zapytanie);
				unset($lownik);
				return $wybor1;
		}
	}
	public function dodaj_pracownika()
	{
		$wynik1="";
		$pola="";
		$dane="";
		$zapytanie = new zapytania_pracownicy;
		if (strlen($_POST["imiep"])<2)
			$wynik1="ProszÄ podaÄ ImiÄ<br>";
		
		if (strlen($_POST["nazwiskop"])<2)
			$wynik1.="ProszÄ podaÄ Nazwisko<br>";
		
		if (strlen($_POST["userp"])<2)
			$wynik1.="ProszÄ podaÄ nazwÄ uĹźytkownika<br>";
		else
			if ($zapytanie->sprawdz_login($_POST["userp"]))
				$wynik1.="Nazwa uĹźytkownika juĹź jest zarejestrowana<br>";
		
		
		if (strlen($_POST["passp1"])<8)
			$wynik1.="ProszÄ podaÄ HasĹo min 8 znakĂłw<br>";
		
		if ($_POST["passp1"]!=$_POST["passp2"])
			$wynik1.="HasĹa nie sÄ takie same<br>";
			
		
		if (strlen($wynik1)==0)
		{	
			$pola.="imie1, nazwisko, user1, pass1, stanowisko";
			$dane.="'".$_POST['imiep']."', "."'".$_POST['nazwiskop']."', "."'".$_POST['userp']."', ";
			$dane.="'".sha1($_POST['passp1'])."', "."'".$_POST['uprp']."'";
			$wynik1=$zapytanie->dodaj_pracownika($pola, $dane);
			if (strlen($wynik1)<2)
				$wynik1="Pracownik dodany";
			unset($zapytanie);
			unset($slownik);
		}	
			echo $wynik1;
	}
	public function usuwanie_pracownika($nr)
	{
		$zapytanie = new zapytania_pracownicy;
		$zapytanie->usun_pracownika($nr);
		unset($zapytanie);
	}
}

class rysowanie_dzieci extends rysowanie
{
	public function rysuj_kdodaj()
	{
		if ($this->sesja1->czyzalogowany()>3)
		{
			return '<button  type="submit" class="btn btn-primary" onclick="#paneldod"  id="dodajb" data-toggle="modal" data-target="#paneldod">&nbsp;
					<span class="glyphicon glyphicon-user" aria-hidden="true" ></span>&nbsp;&nbsp;Dodaj&nbsp;Dziecko&nbsp;</button>';
		}
	}
	public function rysuj_tabeladzieci()
	{
		if ($this->sesja1->czyzalogowany()>3)
		{
			$zapytanie = new zapytania_dzieci;
			$wynik1=$zapytanie->listuj_dzieci(0); 
			if ($wynik1)
			{
				$wybor1='<table class="table table-striped table-condensed">
				<caption></caption>
				<thead><tr><th>ImiÄ Nazwisko</th><th>Grupa</th><th>Opiekun</th><th>Opiekun</th><th></th></tr></thead>
				<tbody>';
				while($wiersz=mysql_fetch_row($wynik1))
				{
					$wybor1.='<tr><td>'.$wiersz[0].' '.$wiersz[1].'</td>
					<td>'.$zapytanie->grupa_dzieci($wiersz[4]).'</td>
					<td>'.$zapytanie->opiekun_dzieci($wiersz[2]).'</td>
					<td>'.$zapytanie->opiekun_dzieci($wiersz[3]).'</td>
					
					<td><button type="button"  class="btn btn-danger btn-xs" aria-label="UsuĹ" onclick="usundzieci('.$wiersz[5].')">
					<strong>&nbsp;UsuĹ&nbsp;</strong></button>';
					}
					$wybor1.='</td></tr>';
					
					
				}
				$wybor1.='</tbody></table>';
				unset($zapytanie);
				unset($lownik);
				return $wybor1;
		}
	}
	public function dodaj_dzieci()
	{
		$wynik1="";
		$pola="";
		$dane="";
		$zapytanie = new zapytania_dzieci;
		if (strlen($_POST["imiep"])<2)
			$wynik1="ProszÄ podaÄ ImiÄ<br>";
		
		if (strlen($_POST["nazwiskop"])<2)
			$wynik1.="ProszÄ podaÄ Nazwisko<br>";
		
		if ($_POST["opiekun1"]==0)
			$wynik1.="ProszÄ wybraÄ opiekuna<br>";
		
		if ($_POST["grupa1"]==0)
			$wynik1.="ProszÄ wybraÄ grupÄ<br>";
		
		
		
		if (strlen($wynik1)==0)
		{	
			$pola.="imie1, nazwisko, opiekun1_id, opiekun2_id, grupa_id";
			$dane.="'".$_POST['imiep']."', "."'".$_POST['nazwiskop']."', ".$_POST['opiekun1'].", ".$_POST['opiekun2'].", ".$_POST['grupa1'];
			$wynik1=$zapytanie->dodaj_dzieci($pola, $dane);
			if (strlen($wynik1)<2)
				$wynik1="Dziecko dodane prawidĹowo";
			unset($zapytanie);
		}	
			echo $wynik1;
	}
	public function usuwanie_dzieci($nr)
	{
		$zapytanie = new zapytania_dzieci;
		$zapytanie->usun_dzieci($nr);
		unset($zapytanie);
	}
	public function listuj_opiekun()
	{
		echo '<option value="0"></option>';
		$pyt= new zapytania_pracownicy;
		$wynik=$pyt->listuj_pracownicy(' stanowisko=1 and akt=1');
		while ($row=mysql_fetch_row($wynik))
			echo '<option value="'.$row[4].'">'.$row[1].'  '.$row[0].'</option>';
		unset($pyt);
	}
	public function listuj_grupa()
	{
		echo '<option value="0"></option>';
		$pyt= new zapytania_grupy;
		$wynik=$pyt->listuj_grupy(0);
		while ($row=mysql_fetch_row($wynik))
			echo '<option value="'.$row[2].'">'.$row[0].'</option>';
		unset($pyt);
	}
}

class rysowanie_grupy extends rysowanie
{
	public function rysuj_kdodaj()
	{
		if ($this->sesja1->czyzalogowany()>3)
		{
			return '<button  type="submit" class="btn btn-primary" onclick="#paneldod" id="dodajb" data-toggle="modal" data-target="#paneldod">&nbsp;
					<span class="glyphicon glyphicon-asterisk" aria-hidden="true" ></span>&nbsp;&nbsp;Dodaj&nbsp;GrupÄ&nbsp;</button>';
		}
	}
	public function rysuj_tabelagrupy()
	{
		if ($this->sesja1->czyzalogowany()>3)
		{
			$zapytanie = new zapytania_grupy;
			$wynik1=$zapytanie->listuj_grupy(' akt=1'); 
			if ($wynik1)
			{
				$wybor1='<table class="table table-striped table-condensed">
				<caption></caption>
				<thead><tr><th>Nazwa</th><th>Rocznik</th><th></th></tr></thead>
				<tbody>';
				while($wiersz=mysql_fetch_row($wynik1))
				{
					$wybor1.='<tr><td>'.$wiersz[0].'</td>
					<td>'.$wiersz[1].'</td>
					
					
					<td><button type="button"  class="btn btn-danger btn-xs" aria-label="UsuĹ" onclick="usungrupy('.$wiersz[2].')">
					<strong>&nbsp;UsuĹ&nbsp;</strong></button>';
					}
					$wybor1.='</td></tr>';
					
					
				}
				$wybor1.='</tbody></table>';
				unset($zapytanie);
				return $wybor1;
		}
	}
	public function dodaj_grupy()
	{
		$wynik1="";
		$pola="";
		$dane="";
		$zapytanie = new zapytania_grupy;
		if (strlen($_POST["nazwap"])<2)
			$wynik1="ProszÄ podaÄ NazwÄ<br>";
		
		if (strlen($_POST["rocznikp"])==4)
		{
			$spr1=(int)$_POST["rocznikp"];
			if ($spr1<2009)
				$wynik1.="ProszÄ podaÄ rocznik<br>";
		}
		else
			$wynik1.="ProszÄ podaÄ rocznik<br>";
		
		$wynik1=$zapytanie->sprawdz_grupy($_POST["nazwap"], $_POST["rocznikp"]);
		if ($wynik1=='NOK')
			$wynik1="Grupa i rocznik juĹź istniejÄ<br>";
		else
			$wynik1="";
	
		if (strlen($wynik1)==0)
		{	
			$pola.="nazwa, rocznik";
			$dane.="'".$_POST['nazwap']."', ".$_POST['rocznikp'];
			$wynik1=$zapytanie->dodaj_grupy($pola, $dane);
			if (strlen($wynik1)<2)
				$wynik1="Grupa dodana prawidĹowo";
			unset($zapytanie);
		}	
			echo $wynik1;
	}
	public function usuwanie_grupy($nr)
	{
		$zapytanie = new zapytania_grupy;
		$zapytanie->usun_grupy($nr);
		unset($zapytanie);
	}
}

class slownik_sys
{
	public $uprawnienia=array('Opiekun', 'Nauczyciel', 'Wychowawca', 'Dyrektor');
	public function rodzaj_uprawnienia($rodz)
	{
		return $this->uprawnienia[($rodz-1)];
		
	}
	
}


?>
