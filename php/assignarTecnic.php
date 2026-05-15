<?php include_once "header.php"; ?>
<?php
require_once 'connexio.php';
?>
<!DOCTYPE html>
<html lang="ca">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Assignar Tècnic</title>
</head>
<body>
<p>Assignar Tècnic a una Incidència</p>
<?php
$sql = "SELECT * FROM INCIDENCIA";
$result = $conn->query($sql);
if ($result->num_rows > 0): ?>
<table border="1">
<thead>
<tr>
<th>ID</th>
<th>Descripció</th>
<th>Tipus</th>
<th>Prioritat</th>
<th>Data d'obertura</th>
<th>Tècnic</th>
<th>Estat</th>
</tr>
</thead>
<tbody>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
<td><?= htmlspecialchars($row["idIncidencia"]) ?></td>
<td><?= htmlspecialchars($row["descripcio"]) ?></td>
<td><?= htmlspecialchars($row["tipo"]) ?></td>
<td><?= htmlspecialchars($row["prioritat"]) ?></td>
<td><?= $row["dataIni"] ? date('d-m-Y', strtotime($row["dataIni"])) : "Sense data" ?></td>
<td><?= htmlspecialchars($row["tecnic"]) ?></td>
<td><?= htmlspecialchars($row["estat"]) ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
<?php else: ?>
<p>No hi ha dades a mostrar.</p>
<?php endif; ?>

<br>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idIncidencia = $_POST["idIncidencia"];
    $idTecnic = $_POST["idTecnic"];

    $stmtUpdate = $conn->prepare("UPDATE INCIDENCIA SET tecnic = ?, estat = 'En procés' WHERE idIncidencia = ?");
    $stmtUpdate->bind_param("ii", $idTecnic, $idIncidencia);
    $stmtUpdate->execute();
    $stmtUpdate->close();

    $conn->close();
}
?>
<form method="POST" action="assignarTecnic.php">
<label for="idIncidencia">ID de la incidència:</label><br>
<input type="number" id="idIncidencia" name="idIncidencia" value=""><br><br>
<label for="idTecnic">ID del tècnic:</label><br>
<input type="number" id="idTecnic" name="idTecnic" value=""><br><br>
<input type="submit" value="Assignar Tècnic">
</form>
</body>
</html>
<?php include_once "footer.php"; ?>