<?php

//

require_once 'connexio.php';


/**
 * Funció que llegeix els paràmetres del formulari i crea una nova casa a la base de dades.
 * @param mixed $conn
 * @return void
 */
function crear_incidencia($conn)
{
    
    $nom = $_POST['nom'];

    if (empty($nom)) {
        echo "<p class='error'>El nom de la casa no pot estar buit.</p>";
        return;
    }

    // Preparar la consulta SQL per inserir una nova casa
    $sql = "INSERT INTO INCIDENCIES (idIncidencia) VALUES (?)";
    $stmt = $conn->prepare($sql);  //La variable $conn la tenim per haver inclòs el fitxer connexio.php
    $stmt->bind_param("s", $nom);

    // Executar la consulta i comprovar si s'ha inserit correctament
    if ($stmt->execute()) {
        echo "<p class='info'>Incidencia registrada amb èxit!</p>";
    } else {
        echo "<p class='error'>Error al crear l'incidencia: " . htmlspecialchars($stmt->error) . "</p>";
    }

    // Tancar la declaració i la connexió
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
    <h1>Crear una Incidencia</h1>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Si el formulari s'ha enviatc (mètode POST), cridem a la funció per crear la casa
        crear_incidencia($conn);
    } else {
        //Mostrem el formulari per crear una nova casa
        //Tanquem el php per poder escriure el codi HTML de forma més còmoda.
        ?>
        <form method="POST" action="crear.php">
            <fieldset>
                <legend>Registrar Incidencia</legend>
                <label for="nom">Descripció de l'incidencia:</label>
                <input type="text" id="nom" name="nom">
                <input type="submit" value="Crear">
            </fieldset>
         
         
            <div class="radio-group">
                <strong>Departament:</strong><br>
                <input type="radio" id="matemàtiques" name="departament" value="matemàtiques">
                <label for="matemàtiques">Matemàtiques</label><br>
                
                <input type="radio" id="tecnologia" name="departament" value="tecnologia">
                <label for="tecnologia">Tecnologia</label><br>
                
                <input type="radio" id="ciències" name="departament" value="ciències" checked>
                <label for="ciències">Ciències</label>
            </div>
            </select>
        
            <div>
            <label for="descripció"><strong>Descripció:</strong></label>
            <textarea id="descripció" name="descripció" placeholder="Descriu aqui la teva incidencia detalladament per a que poguem assignarte un tecnic."></textarea>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        </form>

         
           
        


        <?php
        //Tanquem l'else
    }
    ?>
    <div id="menu">
        <hr>
        <p><a href="index.php">Portada</a> </p>
        <p><a href="incidencies.php">Llistar</a></p>
        <p><a href="crearIncidencia.php">Crear</a></p>
    </div>
</body>

</html>