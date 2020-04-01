<?php 

include_once '../common/connectDB.php';

try
{
    $database = new Connection();
    $db = $database->openConnection();

    $refProd=$_POST['refProd'];
    $descProd=$_POST['descProd'];
    $uniProd=$_POST['uniProd'];
    $famProd=$_POST['famProd'];
    $preco1Prod=$_POST['preco1Prod'];
    $preco2Prod=$_POST['preco2Prod'];
    $preco3Prod=$_POST['preco3Prod'];

    $stm = $db->prepare("INSERT INTO produto 
    
    ( refProduto, descProduto, unidadeProduto, familiaProduto, preco1Produto, preco2Produto, preco3Produto) VALUES
    ( :ref, :descricao, :unidade, :familia, :preco1, :preco2, :preco3)") ;

    $stm->execute(
        array(
            ':ref' => $refProd ,
            ':descricao' => $descProd ,
            ':unidade' => $uniProd ,
            ':familia' => $famProd ,
            ':preco1' => $preco1Prod ,
            ':preco2' => $preco2Prod ,
            ':preco3' => $preco3Prod
        ));


    echo "New record created successfully";

   header('location:../showProduto.php');

}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}

?>