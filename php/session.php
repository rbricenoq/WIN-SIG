<?php
ini_set('session.gc_maxlifetime', 14400);
session_start();
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
include 'functions_ses.php';
session_timeout(14400, $_SESSION['username']);
if(!isset($_SESSION['username']) !="0") {
header('Location: Home.php');
}
?>