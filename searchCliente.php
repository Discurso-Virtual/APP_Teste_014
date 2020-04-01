<?php 
    $path = "http://192.168.1.20/teste";

    session_start();
    include_once './common/connectDB.php';
    $database = new Connection();
    $db = $database->openConnection();

    if(isset($_POST['query'])){
        $id=$_POST['query'];
        $sql="SELECT codCliente,nomeCliente FROM cliente WHERE codCliente=".$id;
        $result =$db->query($sql);

        if($result->rowCount()>0){
            while($row=$result->fetch(PDO::FETCH_ASSOC)){

                $codCliente=$row['codCliente'];
                $nomeCliente= $row['nomeCliente'];

                $vals=array($codCliente,$nomeCliente);

                header("Content-Type: application/json");

                echo json_encode($vals);
                
            }
        }
        else {
            
            $codCliente=$row['codCliente'];
            $nomeCliente= "";

            $vals=array($codCliente,$nomeCliente);

            header("Content-Type: application/json");

            echo json_encode($vals);
        }
    }
?>
