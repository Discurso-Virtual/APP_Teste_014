
<?php
$currentPage="Clientes";
session_start();
include_once '../common/cabecalho.php';
?>
<main role="main" id="main" class="col-lg-12 container main">

<div class="card col-md-12 " >
    <article class="card-body">
        <h4 class="card-title mb-4 mt-1">New Cliente</h4>
        <div class="row container">
            <button class="tabButton" onclick="changeTab('DadosG',this)" id="default_tab">Dados Gerais</button>
            <button class="tabButton" onclick="changeTab('DadosF',this)">Dados Financeiros</button>
            <button class="tabButton" onclick="changeTab('ODados',this)">Outros dados</button>
        </div>    
        <form action="<?php echo $path?>/inserts/insertCliente.php" method="POST" id="form_cliente" autocomplete="off"></form>
        <div id="DadosG" class="tabDiv">
            <div class="row ">
                <div class="form-group col-md-4">
                    <label for="nomeC">Nome Cliente</label>
                    <input class="form-control" type="text" id="nomeC" name="nomeC">
                </div>
            </div>
        </div>
        <div id="DadosF" class="tabDiv">
            <div class="row ">
                <div class="form-group col-md-4">
                    <label for="contactoC">Contacto Cliente</label>
                    <input class="form-control" type="text" id="contactoC" name="contactoC">
                </div>
                <div class="form-group col-md-4">
                    <label for="emailC">Email Cliente</label>
                    <input class="form-control" type="text" id="emailC" name="emailC">
                </div>
            </div>
        </div>
        <div  id="ODados" class="tabDiv"></div>
        <div class="form-group col-md-12">
            <button class="btn btn-info" style="float:right" type="submit" name="submit">Criar</button>
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