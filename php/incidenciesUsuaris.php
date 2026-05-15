<?php include_once "header.php"; ?>
<?php
require_once 'connexio.php';

$id = $_GET['id'] ?? '';
$departament = $_GET['departament'] ?? '';

$sql = "SELECT INCIDENCIA.*, TECNIC.nom AS nomTecnic
        FROM INCIDENCIA
        JOIN TECNIC ON INCIDENCIA.tecnic = TECNIC.idTecnic
        WHERE 1=1";

if ($id != '') {
    $sql .= " AND idIncidencia = '$id'";
}

if ($departament != '') {
    $sql .= " AND departament = '$departament'";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Consultar Incidències</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #000000;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>      
<h1>Consultar incidències</h1>

<form method="GET">

    ID:
    <input type="number" name="id">

    Departament:
    <select name="departament">
        <option value="Matematiques">Matematiques</option>
        <option value="Informatica">Informàtica</option>
        <option value="Ciencies">Ciencies</option>
        <option value="Angles">Angles</option>
    </select>

    <button type="submit">Buscar</button>

</form>

<br>

<table border="1" width="100%">

<tr>
    <th>ID</th>
    <th>Tècnic</th>
    <th>Departament</th>
    <th>Descripció</th>
    <th>Estat</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>

    <td><?= $row['idIncidencia'] ?></td>

    <td>
        <?= $row['tecnic'] ?> -
        <?= $row['nomTecnic'] ?>
    </td>

    <td><?= $row['departament'] ?></td>

    <td><?= $row['descripcio'] ?></td>

    <td><?= $row['estat'] ?></td>

</tr>

<?php } ?>

</table>

<?php $conn->close(); ?>

<?php include_once "footer.php"; ?>