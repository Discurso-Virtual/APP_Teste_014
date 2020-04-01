<?php
    session_start();
    $path = "http://192.168.1.20/teste";
    include_once './common/connectDB.php';
    $database = new Connection();
    $db = $database->openConnection();

if(isset($_POST['submit'])){

    $username=trim($_POST['userN']);
    $password=trim($_POST['pass']);

   
    if($username != "" && $password != ""){

        try{

        $stmt = $db->prepare("select * from utilizador where username = '". $username."' && password ='".$password."'");

        $stmt -> execute();
        
        $count= $stmt-> rowCount() ;
        $row = $stmt-> fetch();

        if($count == 1 && !empty($row)){
            $_SESSION['userID'] = $row['codUtil'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password']= $row['password'];


        }
    }
    catch (PDOException $e){
        echo "Error: ".$e->getMessage();
    }
    }

    if ($_SESSION['userID'] != 0){
        header('location:'.$path.'/home.php');
    }else{
        $message = "Username and/or Password incorrect.\\nTry again.";
        header('location:'.$path.'/index.php?msg='.$message);
    }
}

?>