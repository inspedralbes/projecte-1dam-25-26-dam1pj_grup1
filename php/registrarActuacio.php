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
<style>
h1 {
    font-size: 40px;
    font-family: 'Arial', sans-serif;
    text-shadow: 10px 10px 10px rgb(4, 164, 204);
    padding-top: 20px;
    padding-right: 20px;                
    padding-bottom: 20px;
    padding-left: 20px;
    background-color: rgb(198, 223, 228);
}
 button {
    font-size: 20px;
    font-family: 'Arial', sans-serif;
    text-shadow: 10px 10px 10px rgb(4, 164, 204);
    background-color: rgb(198, 223, 228);
    border: none;
    padding: 10px 20px;
    margin: 10px;
    cursor: pointer;
}

textarea {
    font-size: 16px;
    font-family: 'Arial', sans-serif;
    padding: 10px;
    border-radius: 4px;
    resize: horizontal;
}

</style>





</head>
<body>
<h1>Benvingut al Menu de gestió d'Actuacions</h1>
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
options:
<select id="temps_invertit" name="temps_invertit">
<option value="1">5 minuts</option>
<option value="2">10 minuts</option>
<option value="3">15 minuts</option>
<option value="4">30 minuts</option>
<option value="5">45 minuts</option>
<option value="6">1 hora</option>
<option value="7">  > 1 hora </option>


<input type="submit" value="Enviar">
</form>
</body>
</html>

<?php include_once "footer.php"; ?>












