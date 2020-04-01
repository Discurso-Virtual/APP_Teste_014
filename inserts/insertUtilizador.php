<?php 

include_once '../common/connectDB.php';

try
{
    $database = new Connection();
    $db = $database->openConnection();

    $Pnome=$_POST['Pnome'];
    $Unome=$_POST['Unome'];
    $emailU=$_POST['emailU'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    $stm = $db->prepare("INSERT INTO utilizador ( codUtil, primeiroNome, ultimoNome, emailUtil, username, password) 
    VALUES ( :id, :Pnome, :Unome, :email, :user, :pass)") ;
    $stm->execute(
        array(
            ':id' => null ,
            ':Pnome' => $Pnome ,
            ':Unome' => $Unome ,
            ':email' => $emailU ,
            ':user' => $username ,
            ':pass' => $password
        ));
   

    header('location:../index.php');
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}

?>