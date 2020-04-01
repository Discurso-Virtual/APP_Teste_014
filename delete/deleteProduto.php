<?php

    include_once '../common/connectDB.php';

    $id=$_GET['id'];

    try
    {
     $database = new Connection();
     $db = $database->openConnection();
     $sql = "DELETE FROM produto WHERE refProduto = ".$id ;
     $affectedrows  = $db->exec($sql);
    if(isset($affectedrows))
        {
            header('location:../showProduto.php');
        }          
}
catch (PDOException $e)
{
   echo "There is some problem in connection: " . $e->getMessage();
}

?>