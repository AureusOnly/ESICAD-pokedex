
<?php
require_once("head.php");
require_once("database-connection.php");
$query = $databaseConnection->query("SELECT idPokemon, nomPokemon, urlPhoto, T.libelleType AS 'Type 1',T2.LibelleType AS 'Type 2'
    FROM Pokemon P
    JOIN TypePokemon T ON P.idTypePokemon = T.idtype
    LEFT JOIN TypePokemon T2 ON P.idSecondTypePokemon = T2.idtype
    ORDER BY idPokemon ASC
    GROUP BY idType ASC
");
?>
<?php if (!$query) { throw new RuntimeException("Cannot execute query. Cause: " . mysqli_error($databaseConnection)); } 
    else { 
        $result = $query->fetch_all(MYSQLI_ASSOC); 
        echo "<table border='2' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>"; 
        echo "
        <thead>
        Type Pokemon
            <tr>
                <th>N° ID</th>
                <th>Pokemon</th>
                <th>Image</th>
                
                
        </tr>
        </thead>";
    }
    foreach ($result as $pokemon) { 
    echo "<tr>
    <td>" . $pokemon["NomPokemon"] . "</td>
    <td><img src='" . $pokemon['urlPhoto']. "' alt='" . $pokemon["NomPokemon"] . "' width='50' height='50'></td>
    <td>" . $pokemon["Type 1"] . "</td>
    <td>" . $pokemon["Type 2"] . "</td>
    </tr>"; } 
    echo "</table>";
    require_once("footer.php");
     ?>