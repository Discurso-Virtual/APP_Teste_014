<?php 

include_once '../common/connectDB.php';

try
{
    $database = new Connection();
    $db = $database->openConnection();

    $id=$_POST['codF'];
    $nomeF=$_POST['nomeF'];
    $contactoF=$_POST['contactoF'];
    $emailF=$_POST['emailF'];
 
    $stmt = $db-> prepare("UPDATE fornecedor  SET  nomeForne= '".$nomeF."', contacForne=".$contactoF.", emailForne='".$emailF."' WHERE codForne = ".$id ) ;
    $affectedrows = $stmt ->execute();

    header('location:../showFornecedor.php');
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}

?>