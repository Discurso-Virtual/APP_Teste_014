
<?php
    $currentPage="Produtos";
    session_start();

    include_once '../common/cabecalho.php';

        $id = $_GET['id'];

        include_once '../common/connectDB.php';
    
        $database = new Connection();
        $db = $database->openConnection();
        $sql = "SELECT * from produto where refProduto =". $id ;
    ?>
    <main role="main" id="main" class="col-lg-12 container main">
    <div class="card col-md-12">
        <article class="card-body">
            <h4 class="card-title mb-4 mt-1">Update Produto</h4>
                <div class="row container">
                    <button class="tabButton" onclick="changeTab('DadosG',this)" id="default_tab">Dados Gerais</button>
                    <button class="tabButton" onclick="changeTab('DadosF',this)">Dados Financeiros</button>
                    <button class="tabButton" onclick="changeTab('ODados',this)">Outros dados</button>
                </div>
                <form action="./updateProduto.php" method="POST" id="uForm_produto" > </form>

            <div id="DadosG" class="tabDiv" > 
                <div class="row" >
                    <?php
                        foreach ($db->query($sql) as $row) {
                    ?>
                    <div class="form-group col-md-2">
                        <label for="refProd">Referência</label>
                        <input class="form-control" type="text" id="refProd" name="refProd" form="uForm_produto" value="<?php echo $row['refProduto'] ?>" readonly> 
                    </div>
                    <div class="form-group col-md-2">
                        <label for="uniProd">Unidade Produto</label>
                        <input class="form-control" type="text" id="uniProd" name="uniProd" form="uForm_produto" value="<?php echo $row['unidadeProduto'] ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="famProd">Familia Produto</label>
                        <input class="form-control" type="text" id="famProd" form="uForm_produto" name="famProd"value="<?php echo $row['familiaProduto'] ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="descProd">Descrição Produto</label>
                        <input class="form-control" type="text" id="descProd" name="descProd" form="uForm_produto" value="<?php echo $row['descProduto'] ?>">
                    </div>
                </div>
            </div>
            <div id="DadosF" class="tabDiv">
                <div class="row ">
                    <div class="form-group col-md-2">
                        <label for="preco1Prod">Preço1 Produto</label>
                        <input class="form-control" type="text" id="preco1Prod" form="uForm_produto" name="preco1Prod" value="<?php echo $row['preco1Produto'] ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="preco2Prod">Preço2 Produto</label>
                        <input class="form-control" type="text" id="preco2Prod" form="uForm_produto" name="preco2Prod" value="<?php echo $row['preco2Produto'] ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="preco3Prod">Preço3 Produto</label>
                        <input class="form-control" type="text" id="preco3Prod" form="uForm_produto" name="preco3Prod" value="<?php echo $row['preco3Produto'] ?>">
                    </div>
                </div>
            </div>
            <div id="ODados" class="tabDiv">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="ean13">ean13</label>
                        <input class="form-control" type="text" id="ean13" form="uForm_produto" name="ean13" value="<?php echo $row['ean13'] ?>">
                    </div>

                </div>
            </div>
            <div class="form-group col-md-12">
                <button class="btn btn-success" style="float:right" form="uForm_produto" type="submit" name="submit">Alterar</button>
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