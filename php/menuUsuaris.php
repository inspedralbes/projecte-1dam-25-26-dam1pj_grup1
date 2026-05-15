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
    <style>
        #menuUsuaris {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            margin-top: 50px;
        }

        #menuUsuaris button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        #menuUsuaris button:hover {
            background-color: #f0f0f0;
        }

        p {
            text-align: center;
            font-size: 18px;
            letter-spacing: 0.7px;
        }

        button a {
            text-decoration: none;
            color: inherit;
        }   

        button a:hover {
            color: #007BFF;
        }   

        



    </style>
</head>


<body>
    <p>Benvinguts al Menu de Gestió incidències informàtiques Institut Pedralbes</p>




    <p>Quina opció vols realitzar?</p>

    <div id="menuUsuaris">
        <hr>
        <button><a href="crearIncidencia.php">Registrar Una nova Incidencia</a> </button>
        <button><a href="incidenciesUsuaris.php">Consultar l'Estat de una incidència:</a></button>
    </div>

    
    
   
   
     <?php include_once "footer.php"; ?>
