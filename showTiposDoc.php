
<?php

session_start();
$currentPage="TiposDoc";
include_once './common/cabecalho.php';
include_once './common/connectDB.php';



try
{
    $database = new Connection();
    $db = $database->openConnection();
    $sql = "SELECT * FROM tiposdoc " ;?>

<main role="main" id="main" class="col-lg-12">
      <div class="row" id="linha">
            <div class='col-lg-1' id='paraRemover'> </div>
            <div class="col-lg-8" >
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>CodigoTipoDoc</th>
                            <th>NomeTipoDoc</th>
                            <th>TipoDoc</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($db->query($sql) as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['codTiposDoc'] ?></td>
                        <td><?php echo $row['nomeTiposDoc'] ?></td>
                        <td><?php echo $row['tipoDoc'] ?></td>
                        <td>
                            <a href="#" onclick="openModal(<?php echo $row['codTiposDoc'];?>,'<?php echo $currentPage?>', 'Editar')" data-target="#loadModal" data-toggle="modal" >Editar</a>
                        </td>
                        <td>
                            <a href="#" onclick="openModal(<?php echo $row['codTiposDoc'];?>,'<?php echo $currentPage?>', 'Eliminar')" data-target="#loadModal" data-toggle="modal" >Eliminar</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
    <?php
    }
    catch (PDOException $e)
        {
            echo "There is some problem in connection: " . $e->getMessage();
        }


    ?>
      
    <div class="col-lg-3"  >
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th> <a href="#" onclick="openModal(0,'<?php echo $currentPage?>', 'Adicionar')" data-target="#loadModal" data-toggle="modal" >Adicionar
                        <svg class="bi bi-plus" width="32px" height="32px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H6a.5.5 0 010-1h3.5V6a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M9.5 10a.5.5 0 01.5-.5h4a.5.5 0 010 1h-3.5V14a.5.5 0 01-1 0v-4z" clip-rule="evenodd"></path>
                        </svg> 
                        </a>
                    </th>
                </tr>
                <tr>
                    <th><a href="./home.php">Voltar
                        <svg class="bi bi-box-arrow-left" width="32px" height="32px" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M6.354 13.354a.5.5 0 000-.708L3.707 10l2.647-2.646a.5.5 0 10-.708-.708l-3 3a.5.5 0 000 .708l3 3a.5.5 0 00.708 0z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M13.5 10a.5.5 0 00-.5-.5H4a.5.5 0 000 1h9a.5.5 0 00.5-.5z" clip-rule="evenodd"></path>
                            <path fill-rule="evenodd" d="M16 15.5a1.5 1.5 0 001.5-1.5V6A1.5 1.5 0 0016 4.5H9A1.5 1.5 0 007.5 6v1.5a.5.5 0 001 0V6a.5.5 0 01.5-.5h7a.5.5 0 01.5.5v8a.5.5 0 01-.5.5H9a.5.5 0 01-.5-.5v-1.5a.5.5 0 00-1 0V14A1.5 1.5 0 009 15.5h7z" clip-rule="evenodd"></path>
                        </svg>
                        </a>
                    </th>
                </tr>
            </thead>                    
        </table>
    </div>
    </div>
    <div class="modal loadModal" id="loadModal">
    </div>

</main>
<?php include_once './common/rodape.php'; ?>    

</body>
</html>

