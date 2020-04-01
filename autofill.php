    <?php 
    include_once "./common/connectDB.php";

    $database = new Connection();
    $db = $database->openConnection();


    if(isset($_POST['query'])){

        $id = $_POST['query'];
        $sql = "SELECT * FROM tiposdoc WHERE codTiposDoc = '$id' LIMIT 1" ;
        $result =$db->query($sql);   
        
        if($result->rowCount()>0){
            while($row=$result->fetch(PDO::FETCH_ASSOC)){


                $codTipo=$row['codTiposDoc'];
                $nomeTipo= $row['nomeTiposDoc'];

                $vals=array($codTipo,$nomeTipo);
            }
        }
        else {
            echo "";
        };

        $sql="SELECT max(docNo)+1 as numDoc FROM doccab where codTipoDoc='$id'  "; 
        foreach($db->query($sql) as $row){
            if($row['numDoc']==null){
                $numTipoDoc= 1;
            }else{
                $numTipoDoc= $row['numDoc'];

            }
        }
        $sql="SELECT max(idCab)+1 as idCab FROM doccab "; 
        foreach($db->query($sql) as $row){
            if($row['idCab']==null){
                $numCodCab= 1;
            } else{
                $numCodCab= $row['idCab'];

            }
        }

        $sql="SELECT max(idLin)+1 as idLin FROM doclin  "; 
        foreach($db->query($sql) as $row){
            if($row['idLin']==null){
                $idLinha= 1;
            } else{
                $idLinha= $row['idLin'];
            }
        }
        $sql="SELECT max(idCab)+1 as idCab FROM doccab "; 
            foreach($db->query($sql) as $row){
                if($row['idCab']==null){
                    $idCab= 1;
                } else{
                    $idCab=$row['idCab'];
                    }
                }

        array_push($vals, $numTipoDoc,$numCodCab,$idLinha,$idCab);

        header("Content-Type: application/json");
        echo json_encode($vals);

    }
    
    ?>