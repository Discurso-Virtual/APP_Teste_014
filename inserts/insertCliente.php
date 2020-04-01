<?php 

include_once '../common/connectDB.php';

try
{
    $database = new Connection();
    $db = $database->openConnection();

    $nomeC=$_POST['nomeC'];
    $contactoC=$_POST['contactoC'];
    $emailC=$_POST['emailC'];

    $stm = $db->prepare("INSERT INTO cliente ( codCliente, nomeCliente, contacCliente, emailCliente) VALUES ( :id, :nome, :contacto, :email)") ;
    $stm->execute(
        array(
            ':id' => null ,
            ':nome' => $nomeC ,
            ':contacto' => $contactoC ,
            ':email' => $emailC
        ));
    echo "New record created successfully";

    header('location:../showCliente.php');
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}

?>