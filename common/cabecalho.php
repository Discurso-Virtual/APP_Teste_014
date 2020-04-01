

<?php 
  $path = "http://192.168.1.20/teste";
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="node_modules/bootstrap-icons/icons/">
    <link rel="stylesheet" href="<?php echo $path?>/css/skins/default.css">
    <link rel="stylesheet" href="<?php echo $path?>/css/bootstrap.min.css">
    <title>Teste</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light ">
      <div> 
        <a href="<?php echo $path ?>/home.php">
          <img class="logo" src="<?php echo $path?>/img/logoDvti.png" alt="">
        </a>
      </div>
      <div class="container">
        <?php if(isset($_SESSION['userID'])){ ?>
          <a class="navbar-brand" href="#">
            <span class="navbar-toggler-icon" id="colapse-menu"></span>
          </a>
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link menuLink" href="#"><?php echo $currentPage?></a>
              </li>
            </ul>
          </div>
          <svg class="bi bi-person userIcon" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M15 16s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002zM5.022 15h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C13.516 12.68 12.289 12 10 12c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002zM10 9a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"></path>
          </svg>
        
        <span class="nomeUser"><?php echo $_SESSION['username']; ?></span>
        <a class="logOut" href="<?php echo $path?>/logout.php">
        <svg class="powerLog bi bi-power" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M7.578 6.437a5 5 0 104.922.044l.5-.865a6 6 0 11-5.908-.053l.486.874z" clip-rule="evenodd"></path>
          <path fill-rule="evenodd" d="M9.5 10V3h1v7h-1z" clip-rule="evenodd"></path>
        </svg>
        </a>
        <?php
        }
        ?>
        
      </div>
      </nav>
      <?php

      //NAVBAR

      if(isset($_SESSION['userID'])){ ?>
      <div class="container-fluid">
        <div class="row sideBarBackGround">
          <nav class="col-md-2 d-none d-md-block bg-light colapsed sidebar" id="sidebar">
            <div class="sidebar-sticky">
              <ul class="nav flex-column">
                <li>
                      <a class="nav-link " href="<?php echo $path?>/docFiscais.php">
                          Documentos Fiscais
                      </a>
                </li>
                <li class="nav-item">
                  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link navBarHead">Tabelas</a>
                  <li>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                      <li class="nav-item sub-item">
                        <a class="nav-link " href="<?php echo $path?>/showCliente.php">
                          Clientes
                        </a>
                      </li>
                      <li class="nav-item sub-item">
                        <a class="nav-link" href="<?php echo $path?>/showFornecedor.php">
                          Fornecedores
                        </a>
                      </li>
                      <li class="nav-item sub-item">
                        <a class="nav-link" href="<?php echo $path?>/showProduto.php">
                          Produtos
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link  navBarHead">Parâmetros</a>
                    <li>
                      <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li class="nav-item sub-item">
                          <a class="nav-link " href="<?php echo $path?>/showTiposDoc.php">
                            Séries
                          </a>
                        </li>
                      </ul>
                    </li>
                </li>
              </ul>
            </div>
          </nav>
      <?php } ?>