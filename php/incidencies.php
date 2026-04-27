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

    // Consulta SQL per obtenir totes les files de la taula 'incidencia'
$sql = "SELECT * FROM INCIDENCIA";
$result = $conn->query($sql);

// Comprovar si hi ha resultats
if ($result->num_rows > 0) {
    // Llistar els resultats
    while ($row = $result->fetch_assoc()) {
        echo "<p>ID incidencia:  " . $row["idIncidencia"] .  "     ------   " . " ID_Tecnic: " . $row["tecnic"] . "   ------   " . "Prioritat: " . $row["prioritat"] . "   ----------    " . "Descripcio: " . $row["descripcio"] . "Data d'enregistrament: " . date('d-m-Y', strtotime($row["data"]));
        echo " <a href='esborrar.php?id=" . $row["idIncidencia"] . "'>Esborrar</a></p>";
    }
} else {
    echo "<p>No hi ha dades a mostrar.</p>";
}

// Tancar la connexió
$conn->close();
?>

    <div id="menu">
        <hr>
        <p><a href="landingPage.php">Portada</a> </p>
        <p><a href="incidencies.php">Llistar</a></p>
        <p><a href="crearIncidencia.php">Crear</a></p>
    </div>

</body>

</html>