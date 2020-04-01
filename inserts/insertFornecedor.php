<?php 

include_once '../common/connectDB.php';

try
{
    $database = new Connection();
    $db = $database->openConnection();

    $nomeF=$_POST['nomeF'];
    $contactoF=$_POST['contactoF'];
    $emailF=$_POST['emailF'];

    $stm = $db->prepare("INSERT INTO fornecedor ( codForne, nomeForne, contacForne, emailForne) VALUES ( :id, :nome, :contacto, :email)") ;
    $stm->execute(
        array(
            ':id' => null ,
            ':nome' => $nomeF ,
            ':contacto' => $contactoF ,
            ':email' => $emailF
        ));
    echo "New record created successfully";

    header('location:../showFornecedor.php');
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}

?>