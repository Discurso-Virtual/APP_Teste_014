<?php 

include_once '../common/connectDB.php';

try
{
    $database = new Connection();
    $db = $database->openConnection();

    $id=$_POST['refProd'];
    $descP=$_POST['descProd'];
    $uniP=$_POST['uniProd'];
    $famP=$_POST['famProd'];
    $preco1P=$_POST['preco1Prod'];
    $preco2P=$_POST['preco2Prod'];
    $preco3P=$_POST['preco3Prod'];
    $ean13 = $_POST['ean13'];
 
    $stmt = $db-> prepare("UPDATE produto  SET  
    descProduto= '".$descP."',
    unidadeProduto='".$uniP."',
    familiaProduto='".$famP."', 
    preco1Produto=".$preco1P.",
    preco2Produto=".$preco2P.",
    preco3Produto=".$preco3P." ,
    ean13=".$ean13."
    WHERE 
    refProduto = ".$id ) ;



    $affectedrows = $stmt ->execute();

    header('location:../showProduto.php');
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}

?>