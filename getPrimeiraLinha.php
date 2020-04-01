<?php 
    include_once './common/connectDB.php';
    $database = new Connection();
    $db = $database->openConnection();

    $sql="SELECT max(idLin)+1 as idLin FROM doclin  "; 
    foreach($db->query($sql) as $row){
        if($row['idLin']==null){
            echo 1;
        } else{
            echo  $row['idLin'];
        }
    }
    

?>