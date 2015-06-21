<?php
error_reporting(E_ERROR);
session_start(); 
include_once('klasy.php');
if (!isset($rysp))
	$rysp = new rysowanie_pracownicy;

if (isset($_GET["wyloguj"]))
{
	$rysp->sesja1->wyloguj();

}
if (isset($_GET["klawisz"]))
{
	echo $rysp->rysuj_kdodaj();

}
if (isset($_GET["rysujtab"]))
{
	echo $rysp->rysuj_tabelaprac();

}
if (isset($_GET["dodoprac"]))
{
	echo $rysp->dodaj_pracownika();

}
else if (isset($_GET["usunprac"]))
{
	if ($rysp->sesja1->czyzalogowany()>0)
		$rysp->usuwanie_pracownika($_GET["usunprac"]); 
}	

?>
