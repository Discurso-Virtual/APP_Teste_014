
<?php
$currentPage="Fornecedores";
session_start();
include_once '../common/cabecalho.php';
?>
<body>
    <main role="main" id="main" class="col-lg-12 main">
    <div class="card col-md-12">
        <article class="card-body">    
            <h4 class="card-title mb-4 mt-1">New Fornecedor</h4>
            <div class="row container">
                <button class="tabButton" onclick="changeTab('DadosG',this)" id="default_tab">Dados Gerais</button>
                <button class="tabButton" onclick="changeTab('DadosF',this)">Dados Financeiros</button>
                <button class="tabButton" onclick="changeTab('ODados',this)">Outros dados</button>
            </div>   
            <form action="../inserts/insertFornecedor.php" method="POST" id="form_fornecedor" autocomplete="off"></form>
            <div id="DadosG" class="tabDiv">
                <div class="row ">
                    <div class="form-group col-md-4">    
                        <label for="nomeF">Nome Fornecedor</label>
                        <input class="form-control" type="text" id="nomeF" name="nomeF" form="form_fornecedor">
                    </div>
                </div>
            </div>
            <div id="DadosF" class="tabDiv" >
                <div class="row ">
                    <div class="form-group col-md-4">
                        <label for="contactoF">Contacto Fornecedor</label>
                        <input class="form-control" type="text" id="contactoF" name="contactoF" form="form_fornecedor">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="emailF">Email Fornecedor</label>
                        <input class="form-control" type="text" id="emailF" name="emailF" form="form_fornecedor">
                    </div>
                </div>
            </div>
            <div id="ODados" class="tabDiv"></div>
            <div class="form-group col-md-12">
                <button class="btn btn-info" style="float:right" type="submit" form="form_fornecedor" name="submit">Criar</button>
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