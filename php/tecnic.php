<?php include_once "header.php"; ?>


<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Tecnics</title>
    <style>
        p {
            font-size: 40px;
            font-family: 'Arial', sans-serif;
        }

        button {
            font-family: 'Arial', sans-serif;
            text-shadow: 10px 10px 10px rgb(4, 164, 204);
        }
    </style>
</head>


<body>
    <p>Benvinguts al Menu de Gestió incidències informàtiques Institut Pedralbes</p>




    <p>Quina opció vols realitzar?</p>
 
    <div id="menuUsuaris">
        <hr>
        <button><a href="registrarActuacio.php">Registrar actuació:</a> </button>
        <button><a href="incidenciesAssignades.php">Veure incidencie assignades:</a></button>
    </div>









<?php include_once "footer.php"; ?>