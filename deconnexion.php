<?php session_start();
require('./librairie/fonction.lib.php');
require('./inclus/entete.inc'); 

session_unset();
session_destroy();
header("Location: index.php");

?>