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
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>ID Actuacio:  " . $row["idActuacio"] .  "     ------   " . " ID_Tecnic: " . $row["tecnic"] . "   ------   " . "ID_Incidencia: " . $row["idIncidencia"] . "   ------   " . "Descripcio: " . $row["descripcio"] . "Data d'enregistrament: " . date('d-m-Y', strtotime($row["dataRegis"]));
        echo "</p>";
    }
} else {
    echo "<p>No hi ha dades a mostrar.</p>";
}
$conn->close();
?>   
 <form method="POST" action="registrarActuacio.php">
         <label for="idIncidencia">ID de l'incidencia a la que es vol registrar l'actuació:</label><br>
         </label><br>
         <input type="number" id="idIncidencia" name="idIncidencia" value=""><br><br>

<div> <h5>Registra la teva actuacio:</h5></div>
               <textarea name="Actuacio realitzada" rows="20" cols="40">
                </textarea>
               


               <label for="Temps invertit">Temps invertit en la resolució de la incidencia:</label><br>
         </label><br>
         <input type="number" id="Temps invertit" name="Temps invertit" value=""><br><br>  
         
                  
         <input type="submit" value="Enviar">
    
    
    
    
    
    
    <?php
    














