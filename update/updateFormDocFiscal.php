
<?php
$currentPage="Documentos Fiscais";
session_start();
include_once '../common/cabecalho.php';
include_once '../common/connectDB.php';

$database = new Connection();
$db = $database->openConnection();

$id=$_GET['id'];
$sql = "SELECT * from doccab where idCab =". $id ;


if(isset($_SESSION['codTipoDoc']) && isset($_SESSION['tipoDoc'])){

    $codTipo=$_SESSION['codTipoDoc'];
    $tipo=$_SESSION['tipoDoc'];


    unset($_SESSION['codTipoDoc']);
    unset($_SESSION['tipoDoc']);
};

foreach($db->query($sql)as $row){
?>



<main role="main" id="main" class="col-lg-12 container main">

            <div class="card col-md-12 formDocs" >
                
            <article class="card-body">
                <h4 class="card-title mb-4 mt-1">Alterar Documento Fiscal</h4>
                <form action="<?php echo $path?>/inserts/insertDocFiscais.php" method="POST" id="form_docFiscais" autocomplete="off"></form>
                <label for="fiscCriar"> Tipo de Documento Fiscal a alterar </label>                   

                <div class="row ">
                    <select class="form-control col-md-3" id="fiscCriar" name="fiscCriar" >
                        <option value="" selected><?php echo $row[''] ?></option>
                    <?php
                        $sql = "SELECT * FROM tiposdoc " ;
                        foreach ($db->query($sql) as $row){?>
                            <option value="<?php echo $row['codTiposDoc']?>"><?php echo $row['nomeTiposDoc'] ?></option>
                    <?php 
                        }
                    ?>
                    </select>
                    <div class="col-md-1">
                        <button class="btn btn-primary" onclick="fetchInfo()">Fetch </button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 rightSideCab">
                        <div class="row">
                                <div class="form-group form-inline col-md-12">
                                    <label class="col-md-3" for="idDocFisc"> CódDoc</label>
                                    <input class="form-control col-md-4" type="text" id="idDocFisc" name="idDocFisc" form="form_docFiscais" value="<?php
                                        $sql="SELECT max(idCab)+1 as idCab FROM doccab "; 
                                        foreach($db->query($sql) as $row){
                                            if($row['idCab']==null){
                                                echo 1;
                                            } else{
                                            echo $row['idCab'];

                                            }
                                        }
                                        ?>" readonly  >

                                    <div class="form-group date col-md-4">
                                        <label class="sr-only" for="dataDoc">Data</label>
                                        <input class="form-control" type="date" id="dataDoc" name="dataDoc" style="border:0;float:right;"  form="form_docFiscais"  value="<?php echo date('Y-m-d');?>" >
                                    </div>
                                </div>
                                <div class="form-group form-inline col-md-12">
                                    <label class="col-md-3" for="codTipoDoc">CódTipo</label>
                                    <input class="form-control col-md-4" type="text" id="codTipoDoc" form="form_docFiscais" value="<?php if(isset($codTipo)){ echo $codTipo;} ?>" name="codTipoDoc" readonly >
                                </div>
                                <div class="form-group form-inline col-md-12">
                                    <label class="col-md-3" for="tipoDoc">TipoDoc</label>
                                    <input class="form-control col-md-4" type="text" id="tipoDoc"  form="form_docFiscais" value="<?php if(isset($tipo)){ echo $tipo;} ?>"  name="tipoDoc" readonly >
                                </div>
                                <div class="form-group form-inline col-md-12">
                                    <label class="col-md-3" for="numTipoDoc">DocNo</label>
                                    <input class="form-control col-md-4" type="text" id="numTipoDoc" form="form_docFiscais" name="numTipoDoc" value="<?php 
                                        if(isset($codTipo)){
                                            $sql="SELECT max(docNo)+1 as numDoc FROM doccab where codTipoDoc='$codTipo'  "; 
                                            foreach($db->query($sql) as $row){
                                                if($row['numDoc']==null){
                                                    echo 1;
                                                }else{
                                                    echo $row['numDoc'];

                                                }
                                            }
                                        }
                                    ?>" readonly >
                                </div>
                        </div>
                    </div>
                </div>
               
                
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="codCliente">Cod Cliente</label>
                            <input class="form-control" type="text" id="codCliente" form="form_docFiscais" name="codCliente" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nomeCli">Nome Cliente</label>
                            <input class="form-control" type="text" id="nomeCli" form="form_docFiscais" name="nomeCli">
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="list-group" id="show-list" style="margin-top:-17px">
                            </div>    
                        </div>
                        <div class ="col-md-12" style="border-bottom:solid 1px black; margin:15px 15px 50px 15px"></div>
                <?php }?>
                        <div class="col-md-12">
                            <table class="table" id="linTable">
                                <tr>
                                    <th>Id Linha</th>
                                    <th>Id Cabeçalho</th>
                                    <th>Ref Produto</th>
                                    <th>Desc Prod</th>
                                    <th>Quantidade</th>
                                    <th>Preço Uni</th>
                                    <th>Preço Tot</th>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-control" type="text" name="idLin[]" id="idLin[]" form="form_docFiscais" value="<?php
                                        $sql="SELECT max(idLin)+1 as idLin FROM doclin  "; 
                                        foreach($db->query($sql) as $row){
                                            if($row['idLin']==null){
                                                echo 1;
                                            } else{
                                                echo $row['idLin'];

                                            }
                                        }
                                        ?>"readonly  ></input>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="idCab[]" id="idCab[]" form="form_docFiscais" value="<?php
                                        $sql="SELECT max(idCab)+1 as idCab FROM doccab "; 
                                        foreach($db->query($sql) as $row){
                                            if($row['idCab']==null){
                                                echo 1;
                                            } else{
                                            echo $row['idCab'];

                                            }
                                        }
                                        ?>" readonly ></input>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="refProdLin[]" id="refProdLin[0]" form="form_docFiscais" value="" onblur="searchProd(value)"></input>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="descProdLin[]" id="descProdLin[0]" form="form_docFiscais" value=""></input>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="Quantidade[]" id="Quantidade[]" form="form_docFiscais"></input>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="precUni[]" id="precUni[0]" form="form_docFiscais"></input>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="precTot[]" id="precTot[]" form="form_docFiscais"></input>
                                    </td>
                                </tr>
                            </table>




                        </div>
                        
                    
                    <div class="form-group col-md-12">
                       
                        <button class="btn btn-success btn-block col-md-1 " style="float:right" type="submit"  form="form_docFiscais"  name="submit">Alterar</button>
                        <button class="btn btn-light btn-block col-md-2 " onclick="novaLinha()" style="float:right;margin-top:0px;">Adicionar Linha</button>
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