<?php include_once "header.php"; ?>
<?php

//Sempre volem tenir una connexió a la base de dades, així que la creem al principi del fitxer
require_once 'connexio.php';
// Un cop inclòs el fitxer connexio.php, ja podeu utilitzar la variable $conn per a fer les consultes a la base de dades.

?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llistat</title>
</head>

<body>
    <h1>Llistat d'incidencies</h1>
    <?php

$sql = "SELECT * FROM INCIDENCIA";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>ID incidencia:  " . $row["idIncidencia"] .  "     ------   " . " ID_Tecnic: " . $row["tecnic"] . "   ------   " . "Prioritat: " . $row["prioritat"] . "   ----------    " . "Descripcio: " . $row["descripcio"] . "Data d'enregistrament: " . date('d-m-Y', strtotime($row["data"]));
        echo " <a href='modificar.php?id=" . $row["idIncidencia"] . "'>Modificar</a></p>";
    }
} else {
    echo "<p>No hi ha dades a mostrar.</p>";
}

$conn->close();
?>

    <div id="menu">
        <hr>
        <p><a href="tecnic.php">&larr;</a></p>
    </div>
</body>

</html>
<?php include_once "footer.php"; ?>