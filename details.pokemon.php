<?php
require_once("head.php");
require_once("database-connection.php");

$id=$_GET['id'];
$query=$databaseConnection->query("SELECT * FROM pokemon WHERE IdPokemon = ".$id);

    $pokemon = $query->fetch_assoc();
    echo "<td class= Mid>";
    echo "<h1>".$pokemon['NomPokemon']."</h1>";
    echo '<a href="detailsPokemon.php?id='.$pokemon['IdPokemon'].'"><img src="'.$pokemon['urlPhoto'].'"class=img></a>';
    echo "<p>PV : ". $pokemon['PV']."</p>
    <p>Attaque : ". $pokemon['Attaque']."</p>
    <p>Defense : ". $pokemon['Defense']."</p>
    <p>Vitesse : ". $pokemon['Vitesse']."</p>
    <p>Special : ". $pokemon['Special']."</p>";
    echo "</td>";

require_once("footer.php");
?>