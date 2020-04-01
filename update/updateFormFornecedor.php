
<?php
$currentPage="Fornecedores";
session_start();

include_once '../common/cabecalho.php';
    $id = $_GET['id'];

    include_once '../common/connectDB.php';

    $database = new Connection();
    $db = $database->openConnection();
    $sql = "SELECT * from fornecedor where codForne =". $id ;

?>

<main role="main" id="main" class="col-lg-12 container main">
    <div class="card col-md-12 " >
        <article class="card-body">
            <h4 class="card-title mb-4 mt-1">Update Fornecedor</h4>
            <div class="row container">
                <button class="tabButton" onclick="changeTab('DadosG',this)" id="default_tab">Dados Gerais</button>
                <button class="tabButton" onclick="changeTab('DadosF',this)">Dados Financeiros</button>
                <button class="tabButton" onclick="changeTab('ODados',this)">Outros dados</button>
            </div>   
            <form action="./updateFornecedor.php" method="POST" id="uForm_fornecedor" autocomplete="off"></form>
            <div id="DadosG" class="tabDiv">
                <div class="row ">
                    <?php
                        foreach ($db->query($sql) as $row) {
                    ?>
                    <div class="form-group col-md-3">
                        <label for="codF">Código Fornecedor</label>
                        <input class="form-control" type="text" id="codF" name="codF" form="uForm_fornecedor" value="<?php echo $row['codForne'] ?>" readonly >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nomeF">Nome Fornecedor</label>
                        <input class="form-control" type="text" id="nomeF" name="nomeF" form="uForm_fornecedor" value="<?php echo $row['nomeForne'] ?>">
                    </div>
                </div>
            </div>
            <div id="DadosF" class="tabDiv">
                <div class="row ">
                    <div class="form-group col-md-3">
                        <label for="contactoF">Contacto Fornecedor</label>
                        <input class="form-control" type="text" id="contactoF" name="contactoF" form="uForm_fornecedor" value="<?php echo $row['contacForne'] ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="emailF">Email Fornecedor</label>
                        <input class="form-control" type="text" id="emailF" name="emailF" form="uForm_fornecedor" value="<?php echo $row['emailForne'] ?>">
                    </div>
                </div>
            </div>
            <div id="ODados" class="tabDiv"></div>            
            <div class="form-group col-md-12">
                <button class="btn btn-success" style="float:right" type="submit" form="uForm_fornecedor" name="submit">Alterar</button>
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