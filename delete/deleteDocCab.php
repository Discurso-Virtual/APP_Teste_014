<?php

    include_once '../common/connectDB.php';

    $id=$_GET['id'];

    try
    {
     $database = new Connection();
     $db = $database->openConnection();
     $sql = "DELETE FROM doccab WHERE idCab = ".$id ;
     $affectedrows  = $db->exec($sql);
    if(isset($affectedrows))
        {
            header('location:../docFiscais.php');
        }          
}
catch (PDOException $e)
{
   echo "There is some problem in connection: " . $e->getMessage();
}

?>