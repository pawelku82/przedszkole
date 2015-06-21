<?php
error_reporting(E_ERROR);
session_start(); 
include_once('klasy.php');
if (!isset($rysp))
	$rysp = new rysowanie_dzieci;

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
	echo $rysp->rysuj_tabeladzieci();
}
if (isset($_GET["doddzieci"]))
{
	echo $rysp->dodaj_dzieci();

}
if (isset($_GET["usundzieci"]))
{
	if ($rysp->sesja1->czyzalogowany()>0)
		$rysp->usuwanie_dzieci($_GET["usundzieci"]); 
}
if (isset($_GET['ladujopiekun']))
{
	$rysp->listuj_opiekun(); 
}
if (isset($_GET['ladujgrupa']))
{
	$rysp->listuj_grupa(); 
}

?>
