<?php
require_once("head.php");
require_once("database-connection.php");
$typeQuery = $databaseConnection->query("SELECT * FROM typepokemon ORDER BY libelleType");

if (!$typeQuery) {
    throw new RuntimeException("Cannot execute query. Cause: " . mysqli_error($databaseConnection));
} else {
    echo "
    <form method='post' action=''>
        <label for='typePokemon'>Choisissez un type de Pokémon:</label>
        <select id='typePokemon' name='typePokemon'>";
    while ($type = $typeQuery->fetch_assoc()) {
        echo "
        <option value='" . $type["IdType"] . "'>" . $type["libelleType"] . "</option>
        ";
    }
    echo "
        </select>
        <input type='Submit' name='SubmitButton' value='Sélectionner'>
    </form>
    ";
}

if(isset($_POST['SubmitButton'])) {
    $typePokemon = $_POST['typePokemon'];
    $query = $databaseConnection->query("SELECT IdPokemon, NomPokemon, urlPhoto
    FROM pokemon
    WHERE IdTypePokemon = $typePokemon OR IdSecondTypePokemon = $typePokemon
    ORDER BY IdPokemon
    ");
    if (!$query) { throw new RuntimeException("Cannot execute query. Cause: " . mysqli_error($databaseConnection)); } 
    else { 
        $result = $query->fetch_all(MYSQLI_ASSOC); 
        echo "<table border='2' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>"; 
        echo "
        <thead>
            <tr>
                <th>N° ID</th>
                <th>Pokemon</th>
                <th>Image</th>
                
                
        </tr>
        </thead>";

        foreach ($result as $pokemon) { 
            echo "<tr>
            <td>" . $pokemon["IdPokemon"] . "</td>
            <td>" . $pokemon["NomPokemon"] . "</td>
            <td><img src='" . $pokemon['urlPhoto']. "' alt='" . $pokemon["NomPokemon"] . "' width='50' height='50'></td>
            </tr>"; 
        } 
        echo "</table>";
        require_once("footer.php");
    }
} else {
    echo "Vous n'avez pas choisi de type de Pokémon. ";
}
?>