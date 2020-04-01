<?php 

include_once '../common/connectDB.php';

try
{
    $database = new Connection();
    $db = $database->openConnection();

    $id=$_POST['codTDoc'];
    $nomeTDoc=$_POST['nomeTDoc'];
    $tipoDoc=$_POST['tipoDoc'];
    
 
    $stmt = $db-> prepare("UPDATE tiposdoc  SET  nomeTiposDoc= '".$nomeTDoc."', tipoDoc='".$tipoDoc."' WHERE codTiposDoc = ".$id ) ;
    $affectedrows = $stmt ->execute();

    header('location:../showTiposDoc.php');
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}

?>