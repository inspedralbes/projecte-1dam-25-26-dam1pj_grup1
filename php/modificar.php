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
    $dataIni = date('Y-m-d H:i:s');

    if (is_numeric($id)) {
        $sql = "UPDATE INCIDENCIA SET tecnic = ?, descripcio = ?, departament = ?, tipo = ?, prioritat = ?, dataIni = ? WHERE idIncidencia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiiis", $tecnic, $descripcio, $departament, $tipo, $prioritat, $dataIni, $id);

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
            echo "<select name='prioritat' id='prioritat' required>";
            echo "<option value='Alta' " . ($row["prioritat"] == "Alta" ? "selected" : "") . ">Alta</option>";
            echo "<option value='Mitja' " . ($row["prioritat"] == "Mitja" ? "selected" : "") . ">Mitja</option>";
            echo "<option value='Baixa' " . ($row["prioritat"] == "Baixa" ? "selected" : "") . ">Baixa</option>";
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
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Incidencia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;        
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        fieldset {
            border: 1px solid #ccc;
            padding: 10px;
        }
        legend {
            font-size: 1.2em;
            font-weight: bold;
        }       
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;             
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;       
            padding: 10px 20px;     
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        .info {             
            color: green;
            font-weight: bold;
        }   
    </style>
</head>
<body>
<?php include_once "footer.php"; ?>