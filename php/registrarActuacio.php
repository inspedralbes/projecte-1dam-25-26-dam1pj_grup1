<?php include_once "header.php"; ?>
<?php
require_once 'connexio.php';
?>
<!DOCTYPE html>
<html lang="ca"> 
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu actuacions</title>
</head>
<body>
<p>Benvingut al Menu de gestió d'Actuacions</p>
<?php
$sql = "SELECT * FROM ACTUACIO";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "<p>ID Actuacio:  " . $row["idActuacio"] .  "     ------   " . " ID_Tecnic: " . $row["tecnic"] . "   ------   " . "ID_Incidencia: " . $row["incidencia"] . "   ------   " . "Descripcio: " . $row["descripcio"] . "   ------   " . "Data d'enregistrament: " . ($row["data"] ? date('d-m-Y', strtotime($row["data"])) : "Sense data");
echo "</p>";
    }
} else {
echo "<p>No hi ha dades a mostrar.</p>";
}
$conn->close();
?>
<form method="POST" action="registrarActuacio.php">
<label for="idIncidencia">ID de la incidència a la qual es vol registrar l'actuació:</label><br>
<input type="number" id="idIncidencia" name="idIncidencia" value=""><br><br>
<h5>Registra la teva actuació:</h5>
<label for="actuacio_realitzada">Actuació realitzada:</label><br>
<textarea id="actuacio_realitzada" name="actuacio_realitzada" rows="20" cols="40"></textarea><br><br>
<label for="temps_invertit">Temps invertit en la resolució de la incidència:</label><br>
<input type="number" id="temps_invertit" name="temps_invertit" value=""><br><br>
<input type="submit" value="Enviar">
</form>
</body>
</html>














