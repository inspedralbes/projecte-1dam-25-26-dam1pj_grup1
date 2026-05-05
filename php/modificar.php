<?php include_once "header.php"; ?>
<?php
require_once 'connexio.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['idIncidencia'];
    $titol = $_POST['titol'];
    $descripcio = $_POST['descripcio'];
    $estat = $_POST['estat'];

    if (is_numeric($id)) {
        $sql = "UPDATE INCIDENCIA SET titol = ?, descripcio = ?, estat = ? WHERE idIncidencia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $titol, $descripcio, $estat, $id);

        if ($stmt->execute()) {
            echo "<p class='info'>Incidencia modificada amb èxit!</p>";
        } else {
            echo "<p class='error'>Error al modificar la Incidencia: " . htmlspecialchars($stmt->error) . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='error'>ID no vàlid.</p>";
    }

} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (is_numeric($id)) {
        $sql = "SELECT idIncidencia, titol, descripcio, estat FROM INCIDENCIA WHERE idIncidencia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<form method='POST' action='modificar.php'>";
            echo "<fieldset><legend>Modificar Incidencia:</legend>";
            echo "<input type='hidden' name='idIncidencia' value='" . htmlspecialchars($row["idIncidencia"]) . "'>";

            echo "<label for='titol'>Títol:</label><br>";
            echo "<input type='text' name='titol' id='titol' value='" . htmlspecialchars($row["titol"]) . "' required><br><br>";

            echo "<label for='descripcio'>Descripció:</label><br>";
            echo "<textarea name='descripcio' id='descripcio' rows='4' cols='50' required>" . htmlspecialchars($row["descripcio"]) . "</textarea><br><br>";

            echo "<label for='estat'>Estat:</label><br>";
            echo "<select name='estat' id='estat'>";
            $estats = ['Oberta', 'En procés', 'Tancada'];
            foreach ($estats as $opcio) {
                $selected = ($row["estat"] === $opcio) ? "selected" : "";
                echo "<option value='" . htmlspecialchars($opcio) . "' $selected>" . htmlspecialchars($opcio) . "</option>";
            }
            echo "</select><br><br>";

            echo "<input type='submit' value='Guardar canvis'>";
            echo "</fieldset>";
            echo "</form>";
        } else {
            echo "<p class='error'>No s'ha trobat la Incidencia amb ID: " . htmlspecialchars($id) . "</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='error'>ID no vàlid.</p>";
    }

} else {
    echo "<p class='error'>No s'ha especificat cap ID.</p>";
}
?>
<?php include_once "footer.php"; ?>