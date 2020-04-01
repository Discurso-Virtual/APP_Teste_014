<?php 

include_once '../common/connectDB.php';

try
{
    $database = new Connection();
    $db = $database->openConnection();

    $idCab=$_POST['idDocFisc'];
    $idTipoDoc=$_POST['codTipoDoc'];
    $idCliente=$_POST['codCliente'];
    $nomeCliente=$_POST['nomeCli'];
    $docNo=$_POST['numTipoDoc'];
    $data=$_POST['dataDoc'];


    if(isset($idTipoDoc)){
        $sql = "SELECT tipoDoc FROM tiposdoc WHERE codTiposDoc=".$idTipoDoc ;
        foreach ($db->query($sql) as $row){
            $tipoDoc=$row['tipoDoc'];
        }
    }

    $stm = $db->prepare("
    INSERT INTO doccab ( idCab, codTipoDoc, tipoDoc, codCliente, nomeCliente, docNo, Data) 
    VALUES ( :id, :codTipoDoc, :tipoDoc, :codCliente, :nomeCliente, :docNo, :Data)") ;
    $stm->execute(
        array(
            ':id' => $idCab ,
            ':codTipoDoc' => $idTipoDoc ,
            ':tipoDoc' => $tipoDoc ,
            ':codCliente' => $idCliente ,
            ':nomeCliente' => $nomeCliente ,
            ':docNo' => $docNo ,
            ':Data' => $data 

        ));

        $idLin=$_POST['idLin'];
        $codCab=$_POST['idCab'];
        $refProduto=$_POST['refProdLin'];
        $descProduto=$_POST['descProdLin'];
        $Qtd=$_POST['Quantidade'];
        $precoUni=$_POST['precUni'];
        $precoTot=$_POST['precTot'];

        $size=count($idLin);
        $stm = $db->prepare("INSERT INTO 
        doclin ( idLin, idCab, refProduto, descProduto, Quantidade, precoUni, precoTot) 
        VALUES ( :idLin, :idCab, :refProduto, :descProduto, :Quantidade, :precoUni, :precTot)") ;

        for($i=0;$i<$size;$i++){

            $linha=$idLin[$i];
            $cab=$codCab[$i];
            $rProd=$refProduto[$i];
            $nProd=$descProduto[$i];
            $quantidade=$Qtd[$i];
            $uni=$precoUni[$i];
            $tot=$precoTot[$i];

            $stm->execute(
                array(
                    ':idLin' => $linha ,
                    ':idCab' => $cab ,
                    ':refProduto' => $rProd ,
                    ':descProduto'=> $nProd,
                    ':Quantidade' => $quantidade ,
                    ':precoUni' => $uni ,
                    ':precTot' => $tot 
                ));

        };
        header('location:../docFiscais.php');
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}

?>