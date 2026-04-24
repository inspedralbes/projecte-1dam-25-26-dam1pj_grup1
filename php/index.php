<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inici</title>
</head>

<body>
    <h1>Projecte GI3P</h1>
    <p>Benvinguts al Menu de Gestió incidències informàtiques Institut Pedralbes</p>
    <?php
    echo "<h2>Hola, món!</h2>";
    ?>
    <h2>Variables</h2>
    <p>Les variables s'han d'utilitzar per a definir la cadena de connexió independentment del codi</p>
    <?php
    $v1 = getenv('VAR1') ?: 'Ups, variable no definida';
    $v2 = getenv('VAR2') ?: 'Ups, variable no definida';
    echo "<p>El valor de la variable d'entorn VAR1 és: <strong>$v1</strong> </p>";
    echo "<p>El valor de la variable d'entorn VAR2 és: <strong>$v2</strong></p>";
    ?>
    <div id="menu">
        <hr>
        <p><a href="index.php">Portada</a> </p>
        <p><a href="incidencies.php">Llistar</a></p>
        <p><a href="crearIncidencia.php">Crear</a></p>
    </div>
    <p>Fi de la pàgina</p>
</body>

</html>