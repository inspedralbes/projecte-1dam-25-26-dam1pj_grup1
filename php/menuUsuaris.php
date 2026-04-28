<?php include_once "header.php"; ?>
<?php
require_once 'connexio.php';
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Usuaris</title>
</head>


<body>
    <p>Benvinguts al Menu de Gestió incidències informàtiques Institut Pedralbes</p>




    <p>Quina opció vols realitzar?</p>

    <div id="menuUsuaris">
        <hr>
        <button><a href="registrar.php">Registrar Una nova Incidencia</a> </button>
        <button><a href="llistarIncidenciesusuaris.php">Consultar l'Estat de una incidència:</a></button>
        <button><a href="landingPage.php">&larr;</a> </button>
        
    </div>
    <?php include_once "footer.php"; ?>
