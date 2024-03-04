<?php
require_once("head.php");
require_once("database-connection.php")
$idpokemon = $_GET['id'];
$result = $query ->fetch_assoc();
$query = $dataConnection->query();