<?php
namespace Tester;
require "configClass.php";
session_start();
$h = new ConfigClass( "localhost","root","", "sudokuPlus" );

$conn = mysqli_connect($h->getHost(), $h->getRoot(),$h->getPass(), $h->getDb());
//$conn = mysqli_connect( "localhost","root","", "sudokuPlus" );
?>
