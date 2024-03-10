<?php require_once("head.php"); 
require_once('database-connection.php'); 
$query = $databaseConnection->query("SELECT IdPokemon, NomPokemon, urlPhoto, T.libelleType AS 'Type 1', T2.libelleType AS 'Type 2'
FROM pokemon P 
JOIN typepokemon T ON P.IdTypePokemon = T.IdType 
LEFT JOIN typepokemon T2 ON P.IdSecondTypePokemon = T2.IdType 
ORDER BY IdPokemon"); 
?>   
<?php if (!$query) { throw new RuntimeException("Cannot execute query. Cause: " . mysqli_error($databaseConnection)); } 
    else { 
        $result = $query->fetch_all(MYSQLI_ASSOC); 
        echo "<table border='2' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>"; 
        echo "
        <thead>
            <tr>
                <th>Pokemon</th>
                <th>Image</th>
                <th>Type 1</th>
                <th>Type 2</th>
        </tr>
        </thead>";
    foreach ($result as $pokemon) { 
    echo "<tr>
    <td><a href ='details.pokemon.php?id=".$pokemon['IdPokemon']." '>" . $pokemon["NomPokemon"] . "</a></td>
    <td><img src='" . $pokemon['urlPhoto']. "' alt='" . $pokemon["NomPokemon"] . "' width='50' height='50'></td>
    <td>" . $pokemon["Type 1"] . "</td>
    <td>" . $pokemon["Type 2"] . "</td>
    </tr>"; } 
    echo "</table>"; } 
    require_once("footer.php");
     ?>
