<?php include_once "header.php"; ?>
<?php
require_once 'connexio.php';
?>
</head>
<style>
    p {
        font-size: 20px;
        font-family: 'Arial', sans-serif;
        text-shadow: 10px 10px 10px rgb(4, 164, 204);
        padding-top: 20px;
        padding-right: 20px;                
        padding-bottom: 20px;
        padding-left: 20px;
        background-color: rgb(198, 223, 228);
    }   

     button {
        font-size: 20px;
        font-family: 'Arial', sans-serif;
        text-shadow: 10px 10px 10px rgb(4, 164, 204);
        background-color: rgb(198, 223, 228);
        border: none;
        padding: 10px 20px;
        margin: 10px;
        cursor: pointer;

    }

table {
    width: 90%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 4px solid black;
    color: black;
    background-color: rgb(255, 255, 255);

    th {
        padding: 10px;
        text-align: left;
        background-color: rgb(152, 153, 153);
    }

}

btn btn-primary {
    text-decoration: none;
    color: black;
}
    </style>
<body>

<h1>Llistat d'incidències</h1>

<?php
$sql = "SELECT 
    INCIDENCIA.*, 
    TECNIC.nom AS nomTecnic
FROM INCIDENCIA
JOIN TECNIC 
    ON INCIDENCIA.tecnic = TECNIC.idTecnic
ORDER BY INCIDENCIA.prioritat ASC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID Incidència</th>
                <th>ID Tècnic i NomTècnic</th>  
                <th>Prioritat</th>
                <th>Descripció</th>
                <th>Estat</th>
                <th>Data d'enregistrament</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row["idIncidencia"]) ?></td>
                <td><?= htmlspecialchars($row["tecnic"]) ?> - <?= htmlspecialchars($row["nomTecnic"]) ?></td>
                <td><?= htmlspecialchars($row["prioritat"]) ?></td>
                <td><?= htmlspecialchars($row["descripcio"]) ?></td>
                <td><?= htmlspecialchars($row["estat"]) ?></td>
                <td><?= date('d-m-Y', strtotime($row["dataIni"])) ?></td>
                <td><a class="btn btn-primary" href="modificar.php?id=<?= urlencode($row["idIncidencia"]) ?>">Modificar</a></td>

                <td><a class="btn btn-primary" href="esborrar.php?id=<?= urlencode($row["idIncidencia"]) ?>">Eliminar</a></td>
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


