<?php include_once "header.php"; ?>
<?php
require_once 'connexio.php';


/**
 * Funció que llegeix els paràmetres del formulari i crea una nova casa a la base de dades.
 * @param mixed $conn
 * @return void
 */
function crear_incidencia($conn)
{
     $depart = $_POST['nom'];

    if (empty($nom)) {
        echo "<p class='error'>El nom de la casa no pot estar buit.</p>";
        return;
    }

    
    $sql = "INSERT INTO INCIDENCIES (idIncidencia) VALUES (?)";
    $stmt = $conn->prepare($sql);  
    $stmt->bind_param("s", $depart);

   
    if ($stmt->execute()) {
        echo "<p class='info'>Incidencia registrada amb èxit!</p>";
    } else {
        echo "<p class='error'>Error al crear l'incidencia: " . htmlspecialchars($stmt->error) . "</p>";
    }

    
    $stmt->close();

}




?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRAMENT D'INCIDENCIES</title>
</head>





<body>

    <div class="col-12">
        <h1>Registrar Incidencia</h1>
        <form action="registrar.php" method="POST">


        <p>Selecciona el departament al que pertanys</p>
          
                <input type="radio" id="1" name="fav_language" value="Matematiques">     
                  <label for="matematiques">Matematiques</label><br>
                <input type="radio" id="2" name="fav_language" value="Programació">
                <label for="programacio">Programació</label><br>
                <input type="radio" id="3" name="fav_language" value="Ciències">
                <label for="ciències">Ciències</label><br>
                
                <input type="radio" id="4" name="fav_language" value="Anglés">
                <label for="anglés">Anglés</label><br>


                <div class="form-group">
                <p>Descriu aqui la teva incidencia per a que poguem assignarte un tecnic:</p>
                <textarea placeholder="Descripción" class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group"><button class="btn btn-success">Enviar</button></div>
        </form>
    </div>
</div>
</body>
<div id="menuUsuaris">
        <hr>
        <button><a href="menuUsuaris.php">&larr;</a> </button>
    </div>
    <?php include_once "footer.php"; ?>
    