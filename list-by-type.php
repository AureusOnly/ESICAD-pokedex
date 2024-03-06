<?php
require_once("head.php");
require_once("database-connection.php");

// Prepare and execute the SQL query
$query = $databaseConnection->prepare("SELECT P.*, T.libelleType AS typepokemon
    FROM pokemon P
    JOIN typepokemon T ON P.IdTypePokemon = T.IdType
    ORDER BY T.IdType ASC, P.IdPokemon ASC");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

// Get unique types
$types = array_unique(array_column($result, 'typepokemon'));
?>
<?php  
foreach ($types as $type)  { 
        $row = "<tr><td>";
        echo $row.$pokemon['nomPokemon']."</td>
        <td><img src=".$pokemon['urlPhoto']."></td>
        <td>".$pokemon['Type 1']."</td>
        <td>".$pokemon['Type 2']."</td></tr>";
    }
?>
    <h2><?php echo $type; ?></h2>
    <table>
        <thead>
            <tr>
                <th>Nom Pokémon</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $pokemon) {
                if ($pokemon['typepokemon'] === $type)
                $row = "<tr><td>";
                echo $row.$type['TypePokemon']."<tr>
                        <td>".$pokemon['nomPokemon']." </td>
                        <td><img src=".$pokemon['urlPhoto']."></td>
                    </tr>"
                
            }
             ?>
        </tbody>
    </table>
    <?php
require_once("footer.php");
?>