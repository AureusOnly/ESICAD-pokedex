<!-- 
    Ce fichier représente la page de liste par type de pokémon du site.
-->
<?php
require_once("head.php");
require_once("database-connection.php");
$query = $databaseConnection->query("SELECT *
    FROM Pokemon P
    JOIN TypePokemon T ON  P.idTypePokemon=T.idType
    ORDER BY idPokemon ASC
    GROUP BY TypePokemon ASC
");

$result=$query->fetch_all(MYSQLI_ASSOC);

?>

<table>
    <thead>
        <th> Type pokemon </th>
        <th> numero </th>
        <th> nom Pokemon </th>
        <th> Image </th>
    </thead>
<tbody>
<?php
    foreach($result as $pokemon) { 
        $row = "<tr><td>";
        echo $row.$pokemon['Type']."</td>
        <td>".$pokemon['']."</td>
        <td><img src=".$pokemon['urlPhoto']."></td>
        <td>".$pokemon['']."</td></tr>";
    }
?>
</tbody>
</table>


?>

<?php
require_once("footer.php");
?>