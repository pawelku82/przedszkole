<?php
session_start();
include_once('klasy.php');
if (!isset($rys1))
	$rys1 = new rysowanie;	

if (isset($_GET["logowanie"]))
{
	echo $rys1->sesja1->logowanie($_POST["user1"], sha1($_POST["pass1"]));
	
}
else if (isset($_GET["menu11"]))
{
	if ($_GET["menu11"]==2)
		$rys1->sesja1->wyloguj();
		
	$rys1->menu();
	echo $rys1->wybor1;
}
else
{
	
	$rys1->tresc();
	echo $rys1->wybor1;
	
}

?>
