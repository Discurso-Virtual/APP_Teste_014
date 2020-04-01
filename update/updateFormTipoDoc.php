
<?php
$currentPage="TiposDoc";
session_start();

include_once '../common/cabecalho.php';
    $id = $_GET['id'];

    include_once '../common/connectDB.php';

    $database = new Connection();
    $db = $database->openConnection();
    $sql = "SELECT * from tiposdoc where codTiposDoc =". $id ;

?>
<main role="main" id="main" class="col-lg-12 container main">
    <div class="card col-md-12">
        <article class="card-body">
            <h4 class="card-title mb-4 mt-1">Update Tipo Documento</h4>
            <form action="./updateTipoDoc.php" method="POST">
            <div class="row">
                <?php
                    foreach ($db->query($sql) as $row) {
                ?>
                <div class="form-group col-md-4">
                    <label for="codTDoc">Código Tipo Documento</label>
                    <input class="form-control" type="text" id="codTDoc" name="codTDoc" value="<?php echo $row['codTiposDoc'] ?>" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="nomeTDoc">Nome Tipo Documento</label>
                    <input class="form-control" type="text" id="nomeTDoc" name="nomeTDoc" value="<?php echo $row['nomeTiposDoc'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="tipoDoc">Tipo Documento</label>
                    <input class="form-control" type="text" id="tipoDoc" name="tipoDoc"  value="<?php echo $row['tipoDoc'] ?>">
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-success" style="float:right" type="submit" name="submit">Alterar</button>
                    <button class="btn btn-danger" style="float:right;margin-right:5px;"  onClick="javascript:history.go(-1)" >Cancelar</button>
                </div>
            </div>
            </form>
        </article>
    </div>
</main>
    <?php
    }
     include_once '../common/rodape.php'; 
    ?>
</body>
</html>