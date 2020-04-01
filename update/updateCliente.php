<?php 

include_once '../common/connectDB.php';

try
{
    $database = new Connection();
    $db = $database->openConnection();

    $id=$_POST['codC'];
    $nomeC=$_POST['nomeC'];
    $contactoC=$_POST['contactoC'];
    $emailC=$_POST['emailC'];
 
    $stmt = $db-> prepare("UPDATE cliente  SET  nomeCliente= '".$nomeC."', contacCliente=".$contactoC.", emailCliente='".$emailC."' WHERE codCliente = ".$id ) ;
    $affectedrows = $stmt ->execute();

    header('location:../showCliente.php');
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}

?>