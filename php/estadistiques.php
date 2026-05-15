<?php include("header.php");

$mysqli = include_once "connexio.php";

$resultat = $mysqli->query("SELECT nom, temps, numInc FROM consumDepartaments");

$departaments = $resultat->fetch_all(MYSQLI_ASSOC);

$tempsArray = array();

$deptsArray = array();

?>


<?php foreach ($departaments as $unDepartament) {

$tempsArray[] = $unDepartament["temps"];

$deptsArray[] = $unDepartament["nom"];?>

<tbody>

<tr>

      <th scope="row"><?php echo $unDepartament["nom"] ?></th>

      <td><?php echo $unDepartament["temps"] ?> minuts</td>

      <td><?php echo $unDepartament["numInc"] ?></td>

      </tr>

</tbody>

<?php } ?>
<script>

 const ctx = document.getElementById('myChart');

 new Chart(ctx, {

   type: 'pie',

   data: {

     labels: <?php echo json_encode($deptsArray); ?>,

     datasets: [{

       label: 'Minuts',

       data: <?php echo json_encode($tempsArray); ?>,

       borderWidth: 1

     }]

   },

   options: {

     scales: {

       y: {

         beginAtZero: true

       }

     }

   }

 });

</script>

<?php

$mysqli = include_once "connexio.php";

$resultat = $mysqli->query("SELECT idInc, DEPARTAMENT.nom as aula, descripcio, DATE(dataIni) as dataIni, prioritat FROM INCIDENCIA JOIN DEPARTAMENT ON DEPARTAMENT.IdDept = INCIDENCIA.aula WHERE dataFi IS NULL ORDER BY prioritat DESC");

$incidencies = $resultat->fetch_all(MYSQLI_ASSOC);

?>


<div class="llegenda">

   <span><span class="prioritat-urgent"></span> Urgent</span>

   <span><span class="prioritat-alta"></span> Alta</span>

   <span><span class="prioritat-mitja"></span> Mitja</span>

   <span><span class="prioritat-baixa"></span> Baixa</span>

</div>

<div class="container">

   <div class="titulos">

       <div class="id">

           <h3>@ID</h3>

       </div>

       <div class="aula">

           <h3>Dept.</h3>

       </div>

       <div class="descripcion">

           <h3>Descripció</h3>

       </div>

       <div class="fecha">

           <h3>Data inici</h3>

       </div>

   </div>

   <div class="cajaIncidencias">

       <?php foreach ($incidencies as $unaIncidencia) { ?>

           <div class="editar">

               <a href="modificar_incidencia.php?id=<?php echo $unaIncidencia["idInc"] ?>">

                   <div class="incidencia prioritat<?php echo $unaIncidencia["prioritat"] ?>">

                       <div class="id">

                           <p><?php echo $unaIncidencia["idInc"] ?></p>

                       </div>

                       <div class="aula">

                           <p><?php echo $unaIncidencia["aula"] ?></p>

                       </div>

                       <div class="descripcion">

                           <p><?php echo $unaIncidencia["descripcio"] ?></p>

                       </div>

                       <div class="fecha">

                           <p><?php echo $unaIncidencia["dataIni"] ?></p>

                       </div>

                   </div>

               </a>

           </div>

       <?php } ?>

   </div>

</div>