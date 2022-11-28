<?php
namespace Tester;
require "configClass.php";
session_start();
$h = new ConfigClass( "localhost","root","", "sudokuPlus" );
//$h = new ConfigClass( "sql311.epizy.com","epiz_33029786","NqzyRge3e5TZX", "epiz_33029786_sudokuPlus" );
$conn = mysqli_connect($h->getHost(), $h->getRoot(),$h->getPass(), $h->getDb());
//$conn = mysqli_connect( "localhost","root","", "sudokuPlus" );
?>
