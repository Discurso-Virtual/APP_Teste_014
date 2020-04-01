
<?php
$currentPage="Documentos Fiscais";
session_start();
include_once '../common/cabecalho.php';
include_once '../common/connectDB.php';


$database = new Connection();
$db = $database->openConnection();
$sql = "SELECT * FROM tiposdoc " ;


if(isset($_SESSION['codTipoDoc']) && isset($_SESSION['tipoDoc'])){

    $codTipo=$_SESSION['codTipoDoc'];
    $tipo=$_SESSION['tipoDoc'];


    unset($_SESSION['codTipoDoc']);
    unset($_SESSION['tipoDoc']);
};


?>



<main role="main" id="main" class="col-lg-12 container main">

            <div class="card col-md-12 formDocs" >
                
            <article class="card-body">
                <h4 class="card-title mb-4 mt-1 tituloNewDoc " id="tituloNewDoc">Novo Documento Fiscal</h4>
                <form action="<?php echo $path?>/inserts/insertDocFiscais.php" method="POST" id="form_docFiscais" autocomplete="off"></form>
                <label for="fiscCriar"> Tipo de Documento Fiscal a criar </label>                   

                <div class="row ">
                    <select class="form-control col-md-3" id="fiscCriar" name="fiscCriar" >
                        <option value="" selected>Escolher Tipo Documento...</option>
                    <?php
                        foreach ($db->query($sql) as $row){?>
                            <option value="<?php echo $row['codTiposDoc']?>"><?php echo $row['nomeTiposDoc'] ?></option>
                    <?php 
                        }
                    ?>
                    </select>
                    <div class="col-md-1">
                        <button class="btn btn-primary" onclick="fetchInfo()">Fetch </button>
                    </div>
                    <div class="col-md-8 rightSideCab">
                        <div class="row">
                                <div class="form-group form-inline col-md-2">
                                    <label class="col-md-6" for="numTipoDoc">DocNo</label>
                                    <input class="form-control col-md-6" type="text" id="numTipoDoc" form="form_docFiscais" name="numTipoDoc" value="" readonly >
                                </div>
                                <div class="form-group date col-md-5">
                                    <label class="col-md-4 " for="dataDoc">Data</label>
                                    <input class="form-control col-md-8" type="date" id="dataDoc" name="dataDoc" style="border:0;float:right;"  form="form_docFiscais"  value="<?php echo date('Y-m-d');?>" >
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="col-md-4 " for="dataDoc">Data Vencimento</label>
                                    <input class="form-control col-md-8" type="date" id="dataVencDoc" name="dataVencDoc" style="border:0;float:right;"  form="form_docFiscais"  value="" >
                                </div> 
                                <div class="form-group col-md-4" style="text-align:center">
                                    <label style="font-weight:bold">
                                        Dados do Cliente
                                    </label>
                                </div>
                                <div class="form-group col-md-4"></div>
                                <div class="form-group col-md-4"></div>
                                <div class="form-group form-inline col-md-4">
                                    <label for="nomeCli" class="col-md-3">Nome</label>
                                    <input class="form-control" type="text" id="nomeCli" form="form_docFiscais" name="nomeCli" onblur="searchClienteNome(value)">
                                </div>
                                <div class="form-group col-md-4" >
                                    <div class="list-group col-md-8 " id="show-list2" style="margin-left:-50px"></div> 
                                </div>
                                <div class="form-group col-md-4" ></div>
                                <div class="form-group form-inline col-md-4">
                                    <label for="codCliente" class="col-md-3">Cod</label>
                                    <input class="form-control" type="text" id="codCliente" form="form_docFiscais" name="codCliente"  onblur="searchCliente(value)">
                                </div>
                                <div class="form-group col-md-4" >
                                    <div class="list-group  col-md-8" id="show-list" style="margin-left:-50px"></div> 
                                </div>
                            
                        </div>
                    </div>
                        <div class="col-md-4 dadosCab">
                            <div class="form-group form-inline col-md-5">
                                <label class="col-md-6" for="idDocFisc"> CódDoc</label>
                                <input class="form-control col-md-6" type="text" id="idDocFisc" name="idDocFisc" form="form_docFiscais" value="" readonly  >
                            </div>
                            <div class="form-group form-inline col-md-5">
                                <label class="col-md-6" for="codTipoDoc">CódTipo</label>
                                <input class="form-control col-md-6" type="text" id="codTipoDoc" form="form_docFiscais" value="" name="codTipoDoc" readonly >
                            </div>
                            <div class="form-group form-inline col-md-5">
                                <label class="col-md-6" for="tipoDoc">TipoDoc</label>
                                <input class="form-control col-md-6" type="text" id="tipoDoc"  form="form_docFiscais" value=""  name="tipoDoc" readonly >
                            </div>
                        </div>
                        <div class ="col-md-12" style="border-bottom:solid 1px black; margin:15px 15px 50px 15px"></div>
                        <div class="col-md-12">
                            <table class="table" id="linTable">
                                <tr>
                                    <th></th>
                                    <th>Id Linha</th>
                                    <th>Id Cabeçalho</th>
                                    <th>Ref Produto</th>
                                    <th>Desc Prod</th>
                                    <th>Quantidade</th>
                                    <th>Preço Uni</th>
                                    <th>Preço Tot</th>
                                </tr>
                                
                            </table>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <button class="btn btn-light btn-block col-md-2 " onclick="novaLinha()" style="float:right;margin-top:0px;">Adicionar Linha</button>
                        </div>

                        <div class="col-md-12" style="margin-top:300px">
                            <button class="btn btn-info btn-block col-md-1 " style="float:right" type="submit"  form="form_docFiscais"  name="submit">Criar</button>
                            <button class="btn btn-danger btn-block col-md-1 cancelarTipo" id="cancelarTipo"  onclick="cancelarTipo()" style="float:right;margin:0px 5px 0px 0px;">Cancelar</button>
                        </div>
                </div>

            </article>
        </div>
    
</main>
<?php
     include_once '../common/rodape.php'; 
?>
</body>
</html>