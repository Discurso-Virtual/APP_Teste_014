<?php 
    include_once './common/connectDB.php';
    $database = new Connection();
    $db = $database->openConnection();

    if(isset($_POST['query'])){
        $id=$_POST['query'];
        $sql="SELECT codCliente,nomeCliente FROM cliente WHERE codCliente LIKE '%$id%'";
        $result =$db->query($sql);

        if($result->rowCount()>0){
            while($row=$result->fetch(PDO::FETCH_ASSOC)){

                echo "<a href='#' class='list-group-item list-group-item-action' style='height:25px;font-size:13px;padding:0px; '  id='selection'>".$row['codCliente']."-".$row['nomeCliente']."</a>";
            }
        }
        else {
            echo "<p style='height: 25px;font-size: 13px; padding:0px;' class='list-group-item'>Cliente não encontrado</p>";
        }
    }

?>