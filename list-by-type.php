
<?php
require_once("head.php");
require_once("database-connection.php");
$query = $databaseConnection->query("SELECT nomPokemon, urlPhoto, T.libelleType AS 'Type 1',T2.LibelleType AS 'Type 2'
    FROM Pokemon P
    JOIN TypePokemon T ON P.idTypePokemon = T.idtype
    LEFT JOIN TypePokemon T2 ON P.idSecondTypePokemon = T2.idtype
    ORDER BY idPokemon ASC
    GROUP BY idtype ASC
");
$result=$query->fetch_all(MYSQLI_ASSOC);

?>

<table>
    <thead>Type Pokemon
        <th>nom Pokemon</th>
        <th> n°Pokemon</th>
        <th>Image</th>
    </thead>
    <tbody>
    <?php
        foreach($result as $pokemon) { 
        $row = "<tr><td>";
        echo $row.$pokemon['nomPokemon']."</td>
        <td><img src=".$pokemon['urlPhoto']."></td>
        <td>".$pokemon['Type 1']."</td>
        <td>".$pokemon['Type 2']."</td></tr>";
        }
    ?>
    <?php foreach(){
        
    }
    ?>
    </tbody>
</table>
<?php
require_once("footer.php");
?>
