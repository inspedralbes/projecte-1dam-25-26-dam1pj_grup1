<?php include_once "header.php"; ?>
<?php
require_once 'connexio.php';
?>
</head>
<body>

<h1>Llistat d'incidències</h1>

<?php
$sql = "SELECT * FROM INCIDENCIA ORDER BY prioritat ASC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID Incidència</th>
                <th>ID Tècnic</th>  
                <th>Prioritat</th>
                <th>Descripció</th>
                <th>Data d'enregistrament</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row["idIncidencia"]) ?></td>
                <td><?= htmlspecialchars($row["tecnic"]) ?></td>
                <td><?= htmlspecialchars($row["prioritat"]) ?></td>
                <td><?= htmlspecialchars($row["descripcio"]) ?></td>
                <td><?= date('d-m-Y', strtotime($row["dataRegis"])) ?></td>
                <td><a class="btn btn-primary" href="modificar.php?id=<?= urlencode($row["idIncidencia"]) ?>">Modificar</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>No hi ha dades a mostrar.</p>
<?php endif; ?>

<?php $conn->close(); ?>



</body>
</html>
<?php include_once "footer.php"; ?>