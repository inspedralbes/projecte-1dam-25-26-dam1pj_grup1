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
    <h1>Esborrar</h1>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['idIncidencia'];
        if (is_numeric($id)) {
            $sql = "DELETE FROM INCIDENCIA WHERE idIncidencia = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo "<p class='info'>Incidencia esborrada amb èxit!</p>";
            } else {
                echo "<p class='error'>Error al esborrar la Incidencia: " . htmlspecialchars($stmt->error) . "</p>";
            }

            $stmt->close();
        } else {
            echo "<p class='error'>ID no vàlid.</p>";
        }
    } elseif (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (is_numeric($id)) {

        $sql = "SELECT idIncidencia FROM INCIDENCIA WHERE idIncidencia = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                echo "<form method='POST' action='esborrar.php'>";
                echo "<fieldset><legend>Incidencia a esborrar:</legend>" . htmlspecialchars($row["idIncidencia"]) . "";

                echo "<br>";
                echo "<input type='hidden' name='idIncidencia' value='" . htmlspecialchars($row["idIncidencia"]) . "'>";
                echo "<input type='submit' value='Sí, esborrar'>";
                echo "</fieldset>";
                echo "</form>";
            } else {
                echo "<p class='error'>No s'ha trobat la Incidencia amb ID: " . htmlspecialchars($id) . "</p>";
            }
        } else {
            echo "<p class='error'>ID no vàlid.</p>";
        }
    } else {
        echo "<p class='error'>No s'ha especificat cap ID.</p>";
    }
    ?>

    <div id="menu">
        <hr>
        <p><a href="incidencies.php">&larr;</a></p>
    </div>
</body>

</html>
<?php include_once "footer.php"; ?>