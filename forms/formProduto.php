
<?php
$currentPage="Produtos";
session_start();
include_once '../common/cabecalho.php';
?>
   <main role="main" id="main" class="col-lg-12 container main">
    <div class="card col-md-12">
        <article class="card-body">
            <h4 class="card-title mb-4 mt-1">New Produto</h4>
            <div class="row container">
                <button class="tabButton" onclick="changeTab('DadosG',this)" id="default_tab">Dados Gerais</button>
                <button class="tabButton" onclick="changeTab('DadosF',this)">Dados Financeiros</button>
                <button class="tabButton" onclick="changeTab('ODados',this)">Outros dados</button>
            </div>
            <form action="../inserts/insertProduto.php" method="POST" id="form_produto" autocomplete="off"> </form>
            <div id="DadosG" clasS="tabDiv"> 
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="refProd">Referência</label>
                        <input  class="form-control" type="text" id="refProd" form="form_produto" name="refProd"> 
                    </div>
                    <div class="form-group col-md-2">
                        <label for="uniProd">Unidade Produto</label>
                        <input class="form-control" type="text" id="uniProd" form="form_produto" name="uniProd">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="famProd">Familia Produto</label>
                        <input class="form-control" type="text" id="famProd" form="form_produto" name="famProd">
                    </div>
                    <div class="form-group col-md-5">
                        <label for="descProd">Descrição Produto</label>
                        <input class="form-control" type="text" id="descProd" form="form_produto" name="descProd">
                    </div>
                </div>
            </div>
            <div id="DadosF" clasS="tabDiv"> 
                <div class="row"> 
                    <div class="form-group col-md-3">
                        <label for="preco1Prod">Preço1 Produto</label>
                        <input class="form-control" type="text" id="preco1Prod" form="form_produto" name="preco1Prod">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="preco2Prod">Preço2 Produto</label>
                        <input class="form-control" type="text" id="preco2Prod" form="form_produto" name="preco2Prod">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="preco3Prod">Preço3 Produto</label>
                        <input class="form-control" type="text" id="preco3Prod" form="form_produto" name="preco3Prod">
                    </div>
                </div>
            </div>
            <div id="ODados" clasS="tabDiv"></div>
            <div class="form-group col-md-12">
                <button class="btn btn-info" style="float:right" type="submit" form="form_produto" name="submit">Criar</button>
                <button class="btn btn-danger" style="float:right;margin-right:5px;"  onClick="javascript:history.go(-1)" >Cancelar</button>
            </div>
        </article>
    </div>
</main>
    <?php
     include_once '../common/rodape.php'; 
    ?>
</body>
</html>