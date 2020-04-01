
<?php
$currentPage="Clientes";
session_start();
include_once '../common/cabecalho.php';


    $id = $_GET['id'];

    include_once '../common/connectDB.php';

    $database = new Connection();
    $db = $database->openConnection();
    $sql = "SELECT * from cliente where codCliente =". $id ;

?>
<main role="main" id="main" class="col-lg-12 container main">
    <div class="card col-md-12" >
        <article class="card-body">
            <h4 class="card-title mb-4 mt-1">Update Cliente</h4>
            <div class="row container">
                <button class="tabButton" onclick="changeTab('DadosG',this)" id="default_tab">Dados Gerais</button>
                <button class="tabButton" onclick="changeTab('DadosF',this)">Dados Financeiros</button>
                <button class="tabButton" onclick="changeTab('ODados',this)">Outros dados</button>
            </div>    
            <form action="<?php echo $path ?>/update/updateCliente.php" method="POST" autocomplete="off" id="uForm_cliente"></form>
            <div id="DadosG" class="tabDiv">
                <div class="row ">
                    <?php
                        foreach ($db->query($sql) as $row) {
                    ?> 
                    <div class="form-group col-md-3">
                        <label for="codC">Código Cliente</label>
                        <input class="form-control" type="text" id="codC" name="codC" form="uForm_cliente" value="<?php echo $row['codCliente'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nomeC">Nome Cliente</label>
                        <input class="form-control" type="text" id="nomeC" name="nomeC" form="uForm_cliente" value="<?php echo $row['nomeCliente'] ?>">
                    </div>
                </div>
            </div>
            <div id="DadosF" class="tabDiv">
                <div class="row ">
                    <div class="form-group col-md-3">
                        <label for="contactoC">Contacto Cliente</label>
                        <input class="form-control" type="text" id="contactoC" name="contactoC" form="uForm_cliente"  value="<?php echo $row['contacCliente'] ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="emailC">Email Cliente</label>
                        <input class="form-control" type="text" id="emailC" name="emailC" form="uForm_cliente"  value="<?php echo $row['emailCliente'] ?>">
                    </div>
                   
                </div>
            </div>
            <div id="ODados" class="tabDiv" ></div>
            <div class="form-group col-md-12">
                <button class="btn btn-success" style="float:right" type="submit" form="uForm_cliente" name="submit">Alterar</button>
                <button class="btn btn-danger" style="float:right;margin-right:5px;"  onClick="javascript:history.go(-1)" >Cancelar</button>
            </div>
            </article>
        </div>


</main>
    <?php
    }
     include_once '../common/rodape.php'; 
    ?>
    
</body>
</html>