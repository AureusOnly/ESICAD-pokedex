<!-- 
    Ce fichier représente la page de liste de tous les pokémons.
-->
<?php
require_once("head.php");
?>
<table>
    <thead>
        <th>
            nom Pokemon
        </th>
        <th>
            Image
        </th>
        <th>Type 1</th>
        <th>Type 2</th>
    </thead>
</table>
<?php
require_once("database-connection.php")
$query = $databaseConnection->query("SELECT nomPokemon, urlPhoto, T.libelleType AS 'Type 1',T2.LibelleType AS 'Type 2'
    FROM Pokemon P
    JOIN TypePokemon T ON P.idTypePokemon=T.idType
    LEFT JOIN TypePokemon T2 ON P.idSecondTypePokemon=T2.idtype
    ORDER BY idPokemon ASC
");
$result=$query->fetch_all(MYSQLI_ASSOC);
var_dump($result);
print_r();
?>



<?php
require_once("footer.php");
?>