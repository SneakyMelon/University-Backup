<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db_const.php';

include 'functions.php';

session_destroy(); 

header ('location: admin.php');

?>