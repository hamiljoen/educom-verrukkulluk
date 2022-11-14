<?php

require_once("lib/database.php");
require_once("lib/artikel.php");
require_once("lib/user.php");
require_once("lib/keukentype.php");
require_once("lib/info.php");

/// INIT
$db = new database();
$art = new artikel($db->getConnection());
$usr = new user($db->getConnection());
$keu = new keukentype($db->getConnection());
$inf = new info($db->getConnection());

/// VERWERK 
$data = $inf->selecteerInfo(1); 

/// RETURN
var_dump($data);

?>