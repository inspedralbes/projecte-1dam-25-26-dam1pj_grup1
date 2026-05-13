<?php include_once "header.php"; ?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inici</title>

    <style>
        p {
            font-size: 40px;
            font-family: 'Arial', sans-serif;
            text-shadow: 10px 10px 10px rgb(4, 164, 204);
            padding-top: 300px;
            padding-right: 300px;
            padding-bottom: 500px;
            padding-left: 400px;
            background-color: rgb(198, 223, 228);
        }

        button {
            font-size: 20px;
            font-family: 'Arial', sans-serif;
            text-shadow: 10px 10px 10px rgb(4, 164, 204);
            background-color: rgb(198, 223, 228);
            border: 2px solid white;
            padding: 10px 20px;
            margin: 10px;
            cursor: pointer;
        }

</style>

</head>

<body>
    <p>  Benvinguts al Menu de Gestió d'incidències de l'Institut Pedralbes</p>

   


        <button><a href="menuUsuaris.php">Sóc Usuari</a> </button>

        <button><a href="tecnic.php">Sóc tecnic</a></button>

        <button><a href="admin.php">Sóc admin</a></button>


</body>     


</html>
<?php include_once "footer.php"; ?>