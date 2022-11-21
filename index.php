<?php

require_once("lib/database.php");
require_once("lib/artikel.php");
require_once("lib/user.php");
require_once("lib/info.php");
require_once("lib/ingredient.php");
require_once("lib/keukentype.php");
require_once("lib/gerecht.php");
require_once("lib/boodschappenlijst.php");

/// INIT
$db = new database();
$art = new artikel($db->getConnection());
$usr = new user($db->getConnection());
$inf = new info($db->getConnection());
$ing = new ingredient($db->getConnection());
$keu = new keukentype($db->getConnection());
$ger = new gerecht($db->getConnection());
$lij = new boodschappenlijst($db->getConnection());

/// VERWERK 
$data = $ing->selecteerIngredient(3);

/// RETURN
var_dump($data);

?>