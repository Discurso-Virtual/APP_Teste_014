<?php 

include_once '../common/connectDB.php';

try
{
    $database = new Connection();
    $db = $database->openConnection();

    $nomeDoc=$_POST['nomeTDoc'];
    $tipoDoc=$_POST['tipoDoc'];

    $stm = $db->prepare("INSERT INTO tiposdoc ( codTiposDoc, nomeTiposDoc, tipoDoc) VALUES ( :id, :nome, :tipo )") ;
    $stm->execute(
        array(
            ':id' => null ,
            ':nome' => $nomeDoc ,
            ':tipo' => $tipoDoc ,
        ));
    echo "New record created successfully";

    header('location:../showTipoDoc.php');
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}

?>