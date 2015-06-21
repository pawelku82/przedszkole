<?php
error_reporting(E_ERROR);
session_start(); 
include_once('klasy.php');
if (!isset($rysp))
	$rysp = new rysowanie_grupy;

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
	echo $rysp->rysuj_tabelagrupy();

}
if (isset($_GET["dodgrupy"]))
{
	echo $rysp->dodaj_grupy();

}
else if (isset($_GET["usungrupy"]))
{
	if ($rysp->sesja1->czyzalogowany()>0)
		$rysp->usuwanie_grupy($_GET["usungrupy"]); 
}	

?>
