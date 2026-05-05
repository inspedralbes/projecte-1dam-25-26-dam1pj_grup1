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
    $departament = $_POST['departament'];
    $descripcio = $_POST['descripcio'];

    if (empty($descripcio)) {
        echo "<p class='error'>Has d'escriure una descripció.</p>";
        return;
    }

    $sql = "INSERT INTO INCIDENCIA (departament,descripcio) VALUES (?)";
    $stmt = $conn->prepare($sql);  
    $stmt->bind_param("s", $departament,$descripcio);

    if ($stmt->execute()) {
        echo "<p class='info'>Incudencia registrada amb èxit!</p>";
    } else {
        echo "<p class='error'>Error al registrar l'incidencia: " . htmlspecialchars($stmt->error) . "</p>";
    }

    $stmt->close();

}

?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrament d'incidencies</title>
</head>

<body>
    <h1>Registrament D'incidencies</h1>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        crear_incidencia($conn);
    } else {
        ?>
        <form method="POST" action="crearIncidencia.php">
            <fieldset>
                <legend>Empleneu el formulari si us plau:</legend>
                <fieldset>
                
                <legend>Selecciona el departament al que pertannys:</legend>
                  
                <div>
             <input type="radio" id="1" name="Matematiques" value="huey" checked />
             <label for="1">Matematiques</label>
               </div>

              <div>
                 <input type="radio" id="2" name="Informatica" value="dewey" />
                 <label for="2">Informatica </label>
              </div>

             <div>
                 <input type="radio" id="3" name="Ciencies" value="louie" />
                 <label for="3"> Ciencies</label>
             </div>

              <div>
                 <input type="radio" id="4" name="Angles" value="louie" />
                 <label for="4"> Anglés</label>
             </div>

                 </fieldset>
                
                <div> <h5>Descripció de la vostra incidencia:</h5></div>
               <textarea name="message" rows="20" cols="40">
                </textarea>
               <div>
                <input type="submit" value="Enviar">
               </div>  

            </fieldset>
        </form>


        <?php
    }
    ?>
</body>
<div id="menu">
        <hr>
        <p><a href="menuUsuaris.php">&larr;</a></p>
    </div>

</html>
<?php include_once "footer.php"; ?>