<?php
require_once("head.php");
require_once("database-connection.php");

$nomPokemon = $_POST["q"];

echo "Ta recherche : " . $nomPokemon;
?>