
<?php
$currentPage="Utilizador";
session_start();
include_once '../common/cabecalho.php';
?>
<main role="main" id="main" class="col-lg-12 container main">

    <div class="card col-md-12 " >
        <article class="card-body">
            <h4 class="card-title mb-4 mt-1">Novo Utilizador</h4>
            <form class="form" action="../inserts/insertUtilizador.php" method="POST" autocomplete="off">
                <div class="form-group form-inline col-md-4">
                    <label class="col-md-5" for="Pnome">Primeiro Nome</label>
                    <input class="form-control col-md-7" type="text" id="Pnome" name="Pnome">
                </div>
                <div class="form-group form-inline col-md-4">
                    <label class="col-md-5" for="Unome">Último Nome</label>
                    <input class="form-control col-md-7" type="text" id="Unome" name="Unome">
                </div>
                <div class="form-group form-inline col-md-4">
                    <label class="col-md-5" for="emailU">Email</label>
                    <input class="form-control col-md-7" type="text" id="emailU" name="emailU">
                </div>
                <div class="form-group form-inline col-md-4">
                    <label class="col-md-5" for="username">Username</label>
                    <input class="form-control col-md-7" type="text" id="username" name="username">
                </div>
                <div class="form-group form-inline col-md-4">
                    <label class="col-md-5" for="password">Password</label>
                    <input class="form-control col-md-7" type="password" id="password" name="password">
                </div>
                <div class="form-group col-md-12" >
                    <button class="btn btn-primary " style="float:right;" type="submit" name="submit">Criar</button>
                    <button class="btn btn-danger" style="float:right;margin-right:5px;"  onClick="javascript:history.go(-1)" >Cancelar</button>
                </div>
        </form>
        </div>
</main>
    <?php
     include_once '../common/rodape.php'; 
    ?>
</body>
</html>