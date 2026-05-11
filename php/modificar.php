<?php include_once "header.php"; ?>
<?php
require_once 'connexio.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['idIncidencia'];   
    $tecnic = $_POST['tecnic'];
    $descripcio = $_POST['descripcio'];
    $departament = $_POST['departament'];
    $tipo = $_POST['tipo'];
    $prioritat = $_POST['prioritat'];

    if (is_numeric($id)) {
        $sql = "UPDATE INCIDENCIA SET tecnic = ?, descripcio = ?, departament = ?, tipo = ?, prioritat = ? WHERE idIncidencia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiii", $tecnic, $descripcio, $departament, $tipo, $prioritat, $id);

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
        $sql = "SELECT * FROM INCIDENCIA WHERE idIncidencia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<form method='POST' action='modificar.php'>";
            echo "<fieldset><legend>Modificar Incidencia:</legend>";
            echo "<input type='text' name='idIncidencia' value='" . htmlspecialchars($row["idIncidencia"]) . "'>";

            echo "<label for='departament'>Departament:</label><br>";
            echo "<input type='text' name='departament' id='departament' value='" . htmlspecialchars($row["departament"]) . "' required><br><br>";

            echo "<label for='descripcio'>Descripció:</label><br>";
            echo "<textarea name='descripcio' id='descripcio' required>" . htmlspecialchars($row["descripcio"]) . "</textarea><br><br>";

            echo "<label for='tecnic'>Tècnic:</label><br>";
            echo "<input type='text' name='tecnic' id='tecnic' value='" . htmlspecialchars($row["tecnic"]) . "' required><br><br>";

            echo "<label for='tipo'>Tipus:</label><br>";
            echo "<input type='text' name='tipo' id='tipo' value='" . htmlspecialchars($row["tipo"]) . "' required><br><br>";

            echo "<label for='prioritat'>Prioritat:</label><br>";
            echo "<input type='number' name='prioritat' id='prioritat' value='" . htmlspecialchars($row["prioritat"]) . "' required><br><br>";

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