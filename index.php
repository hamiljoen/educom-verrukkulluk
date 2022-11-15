<?php

require_once("lib/database.php");
require_once("lib/artikel.php");
require_once("lib/user.php");
require_once("lib/info.php");
require_once("lib/ingredient.php");
require_once("lib/keuken.php");
require_once("lib/type.php");
require_once("lib/gerecht.php");

/// INIT
$db = new database();
$art = new artikel($db->getConnection());
$usr = new user($db->getConnection());
$inf = new info($db->getConnection());
$ing = new ingredient($db->getConnection());
$keu = new keuken($db->getConnection());
$typ = new type($db->getConnection());
$ger = new gerecht($db->getConnection());

/// VERWERK 
$data = $inf->selecteerInfo(4);

/// RETURN
var_dump($data);

?>