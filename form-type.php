<!-- 
    Ce fichier représente la page de sélection des types de Pokémons.
-->
<?php
require_once("head.php");
require_once("database-connection.php");
$query = $databaseConnection->query("SELECT * FROM typepokemon ORDER BY libelleType");
?>

<?php
if (!$query) { throw new RuntimeException("Cannot execute query. Cause: " . mysqli_error($databaseConnection)); } 
else {
    echo "
    <form method='post' action='/list-by-type.php'>
        <label for='typePokemon'>Choisissez un type de Pokémon:</label>
        <select id='typePokemon' name='typePokemon'>";
    while($type = $query->fetch_assoc()) {
        echo "
        <option value='" . $type["IdType"]. "'>" . $type["libelleType"]. "</option>
        ";
    }
    echo "
        </select>
        <input type='Submit'>
    </form>
    ";

}
?>