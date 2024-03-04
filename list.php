<!-- 
    Ce fichier représente la page de liste de tous les pokémons.
-->
<?php
require_once("head.php");
require_once("database-connection.php")
$query = $databaseConnection->query("SELECT nomPokemon, urlPhoto, T.libelleType AS 'Type 1',T2.LibelleType AS 'Type 2'
    FROM Pokemon P
    JOIN TypePokemon T ON P.idTypePokemon=T.idType
    LEFT JOIN TypePokemon T2 ON P;idSecondTypePokemon=T2.idtype
");
$result=$query->fetch_all(MYSQLI_ASSOC);
var_dump($result)
?>



<?php
require_once("footer.php");
?>