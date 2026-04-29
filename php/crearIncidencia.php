<?php include_once "header.php"; ?>
<div class="row">
    <div class="col-12">
        <h1>Registrar Incidencia</h1>
        <form action="registrar.php" method="POST">
            <div class="form-group">
                <label for="departament">Departament al que pertanys:</label>
            <select id="departament" name="departaments">
             <option value="1">Matematiques</option>
             <option value="2">Informatica</option>
             <option value="3">Ciències</option>
              <option value="4">Anglés</option>
            </select>
            </div>
            <div class="form-group">
                <label for="descripcio">Descripció de l'incidencia</label>
                <textarea placeholder="Descripción" class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" required></textarea>
            </div>
            <div class="form-group"><button class="btn btn-success">Guardar</button></div>
        </form>
    </div>
</div>

<div class="form-group"><button class="btn btn-warning"><a href="menuUsuaris.php">&larr;</a> </button>
<?php include_once "footer.php"; ?>     