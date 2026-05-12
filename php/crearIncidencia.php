<?php include_once "header.php"; ?>
<?php
require_once 'connexio.php';

/**
 * Funció que llegeix els paràmetres del formulari i crea una nova incidència a la base de dades.
 * @param mixed $conn
 * @return void
 */
function crear_incidencia($conn)
{
    $departament = $_POST['departament'] ?? '';
    $descripcio = $_POST['descripcio'] ?? '';
    $dataRegis = date('Y-m-d H:i:s');

    if (empty($descripcio)) {
        echo "<p class='error'>Has d'escriure una descripció.</p>";
        return;
    }

    $sql = "INSERT INTO INCIDENCIA (departament, descripcio, dataRegis) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    
    $stmt->bind_param("sss", $departament, $descripcio, $dataRegis);

    if ($stmt->execute()) {
        echo "<p class='info'>Incidència registrada amb èxit!</p>";
    } else {
        echo "<p class='error'>Error al registrar la incidència: " . htmlspecialchars($stmt->error) . "</p>";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrament d'incidències</title>
</head>
<body>
<h1>Registrament d'Incidències</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    crear_incidencia($conn);
} else {
?>

<form method="POST" action="crearIncidencia.php">
    <fieldset>
        <legend>Empleneu el formulari si us plau:</legend>
        <fieldset>
            <legend>Selecciona el departament al qual pertanys:</legend>

            <div>
                <input type="radio" id="dep1" name="departament" value="1" />
                <label for="dep1">Matemàtiques</label>
            </div>
            <div>
                <input type="radio" id="dep2" name="departament" value="2" />
                <label for="dep2">Informàtica</label>
            </div>
            <div>
                <input type="radio" id="dep3" name="departament" value="3" />
                <label for="dep3">Ciències</label>
            </div>
            <div>
                <input type="radio" id="dep4" name="departament" value="4" />
                <label for="dep4">Anglès</label>
            </div>
        </fieldset>

        <div><h5>Descripció de la vostra incidència:</h5></div>

        <textarea name="descripcio" rows="10" cols="50"></textarea>


        <div>Data d'enregistrament: <?php echo date('d-m-Y H:i:s'); ?></div>

        <div>
            <input type="submit" value="Enviar">
        </div>
    </fieldset>
</form>

<?php
}
?>


</body>
</html>
<?php include_once "footer.php"; ?>