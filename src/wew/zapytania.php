<?php
class czytajini
{
	protected $dane;
	
	public function wczytaj($plik)
	{
		if(file_exists($plik))
			
			$this->dane=parse_ini_file($plik);
		else
			$this->dane=false;
	}

}

Class Baza extends czytajini
{
	public $con;
	
	public function __construct($plik)
	{
		$konfiguracja = new czytajini($plik);
		if ($konfiguracja!=false)
		{
			$this->wczytaj($plik);
			$this->polacz();
		}	
	}
	
	private function polacz()
	{
		$this->con = @mysql_connect($this->dane['server1'], $this->dane['user1'], $this->dane['pass1'])
			or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysql_error()); 
		mysql_select_db($this->dane['baza1'], $this->con)
			or die('Nie mogę połączyć się z bazą danych<br />Błąd: '.mysql_error());
	}		
	
	public function __destruct()
	{
		mysql_close($this->con);
	}

}



class zapytania_sys
{
	protected $baza1;
	protected $con1;
	
	public function __construct()
	{
		$this->baza1 = new Baza('ustawb.ini');
		$this->con1 = $this->baza1->con;
	}
	public function logowanie($user1, $pass1)
	{
		$pyt="select imie1, Nazwisko, Stanowisko from Osoby where  user1='".$user1."' and pass1='".$pass1."'";
		$wynik1=mysql_query($pyt, $this->con1);
		if (mysql_num_rows($wynik1)==1)
			return mysql_fetch_row($wynik1);
		else
			return false;
	}
	public function __destruct()
	{
		unset($baza1);
	}
	
}


class zapytania_pracownicy extends zapytania_sys
{
	public function listuj_pracownicy($filtr)
	{
		if (strlen($filtr)==1)
		{
			if ($filtr==0);
				$pytd="";
		}
		else
			$pytd=" where ".$filtr;
		
		
			
		$pyt="select imie1, nazwisko, user1, stanowisko, id_osoby, pass1 from Osoby ".$pytd." order by nazwisko asc";
		if (!$wynik=mysql_query($pyt, $this->con1))
			echo mysql_error($this->con1);
		else
		{
			if (mysql_num_rows($wynik)==0)
				return false;
			else
				return $wynik;
		}
	}
	public function sprawdz_login($login)
	{
		$pyt="select id_osoby from Osoby where user1='".$login."'";
		if (!$wynik=mysql_query($pyt, $this->con1))
			echo mysql_error($this->con1);
		else
		{
			if (mysql_num_rows($wynik)==0)
				return false;
			else
				return true;
		}
	}
	public function dodaj_pracownika($pola, $dane)
	{
		$pyt="insert into Osoby (".$pola.") values (".$dane.")";
		if(!mysql_query($pyt, $this->con1))
			return  mysql_error($this->con1);
	}
	public function usun_pracownika($nr)
	{
		$pyt="delete from Osoby where id_osoby=".$nr;
		if(!mysql_query($pyt, $this->con1))
			echo  mysql_error($this->con1);
	}
}


class zapytania_dzieci extends zapytania_sys
{
	public function listuj_dzieci($filtr)
	{
		if (strlen($filtr)==1)
		{
			if ($filtr==0);
				$pytd="";
		}
		else
			$pytd=" where ".$filtr;
		
		
			
		$pyt="select imie1, nazwisko, opiekun1_id, opiekun2_id, grupa_id, id_dziecka from Dzieci tab1 ".$pytd." where akt=1 order by nazwisko asc";
		if (!$wynik=mysql_query($pyt, $this->con1))
			echo mysql_error($this->con1);
		else
		{
			if (mysql_num_rows($wynik)==0)
				return false;
			else
				return $wynik;
		}
	}
	public function opiekun_dzieci($ido)
	{
		$pyt="select imie1, nazwisko from Osoby where id_osoby=".$ido;
		$wynik=mysql_query($pyt, $this->con1);
		$row=mysql_fetch_row($wynik);
		
		return $row[1]." ".$row[0];
	}
	
	public function grupa_dzieci($ido)
	{
		$pyt="select nazwa from Grupy where id_grupy=".$ido;
		$wynik=mysql_query($pyt, $this->con1);
		$row=mysql_fetch_row($wynik);
		return $row[0];
	}
	
	public function dodaj_dzieci($pola, $dane)
	{
		$pyt="insert into Dzieci (".$pola.") values (".$dane.")";
		if(!mysql_query($pyt, $this->con1))
			return  mysql_error($this->con1);
	}
	public function usun_dzieci($nr)
	{
		$pyt="update Dzieci set akt=0 where id_dziecka=".$nr;
		if(!mysql_query($pyt, $this->con1))
			echo  mysql_error($this->con1);
	}
}

class zapytania_grupy extends zapytania_sys
{
	public function listuj_grupy($filtr)
	{
		if (strlen($filtr)==1)
		{
			if ($filtr==0);
				$pytd="";
		}
		else
			$pytd=" where ".$filtr;
		
		
			
		$pyt="select nazwa, rocznik, id_grupy  from Grupy ".$pytd." order by nazwa asc";
		if (!$wynik=mysql_query($pyt, $this->con1))
			echo mysql_error($this->con1);
		else
		{
			if (mysql_num_rows($wynik)==0)
				return false;
			else
				return $wynik;
		}
	}
	
	public function dodaj_grupy($pola, $dane)
	{
		$pyt="insert into Grupy (".$pola.") values (".$dane.")";
		if(!mysql_query($pyt, $this->con1))
			return  mysql_error($this->con1);
	}
	public function sprawdz_grupy($nazwa, $rocznik)
	{
		$pyt="select * from Grupy where nazwa='".$nazwa."' and rocznik=".$rocznik." and akt=1";
		$wynik=mysql_query($pyt, $this->con1);
		if (mysql_num_rows($wynik)>0)
			return "NOK";
		else
			return "OK";
		
	}
	public function usun_grupy($nr)
	{
		$pyt="update Grupy  set akt=0 where id_grupy=".$nr;
		if(!mysql_query($pyt, $this->con1))
			echo  mysql_error($this->con1);
		//echo $pyt;
	}
}
?>
