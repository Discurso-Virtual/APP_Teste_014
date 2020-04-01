
<div class="modal show fade" id="myModal" tabindex="-1" role="dialog" style="padding-right: 17px; display: block;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php
      
        $pagina=$_POST['current'];
        $operacao=$_POST['operacao'];
        $path="http://192.168.1.20/teste";     
      
        switch ($pagina){
          case 'Cliente':
            {
              switch($operacao){
                case 'Adicionar': {
                  $link= $path.'/forms/formCliente.php' ;
                  ?>
                    <p>Deseja adicionar um novo cliente?</p>
                  <?php 
                }
                break;
                case 'Editar': {
                  $link= $path.'/update/updateFormCliente.php';
                  ?>
                    <p>Deseja editar o cliente:</p>
                    <p>Id: <?php echo $_POST['id'] ?></p>
                  <?php 
                }
                break;
                case 'Eliminar': {
                  $link= $path.'/delete/deleteCliente.php';
                  ?>
                  <p>Deseja eliminar o cliente:</p>
                  <p>Id: <?php echo $_POST['id'] ?></p>
                <?php 
                }
                break;
              }
            break;
            };
            case 'Fornecedor':
              {
                switch($operacao){
                  case 'Adicionar': {
                    $link= $path.'/forms/formFornecedor.php';
                    ?>
                     <p>Deseja adicionar um novo fornecedor?</p>
                    <?php 
                    
                  }
                  break;
                  case 'Editar': {
                    $link= $path.'/update/updateFormFornecedor.php';
                    ?>
                    <p>Deseja editar o fornecedor:</p>
                    <p>Id: <?php echo $_POST['id'] ?></p>
                  <?php 
                  };

                  break;
                  case 'Eliminar': {
                    $link= $path.'/delete/deleteFornecedor.php';
                    ?>
                    <p>Deseja eliminar o fornecedor:</p>
                    <p>Id: <?php echo $_POST['id'] ?></p>
                  <?php 
                  };

                  break;
                };
              break;
              };
              case 'Produto':
                {
                  switch($operacao){
                    case 'Adicionar':{
                        $link= $path.'/forms/formProduto.php' ;
                        ?>
                          <p> Deseja adicionar um novo produto ?</p>
                        <?php 
                      }
                    break;
                    case 'Editar': {
                      $link= $path.'/update/updateFormProduto.php';
                      ?>
                        <p>Deseja editar o produto:</p>
                        <p>Id: <?php echo $_POST['id'] ?></p>
                      <?php 
                    }
                    break;
                    case 'Eliminar': {
                      $link= $path.'/delete/deleteProduto.php';
                      ?>
                        <p>Deseja eliminar o produto:</p>
                        <p>Id: <?php echo $_POST['id'] ?></p>
                      <?php 
                    }
                    break;
                  };
                }
              break;
              case "TiposDoc":
                {
                  switch($operacao){
                    case 'Adicionar': {
                      $link= $path.'/forms/formTipoDoc.php' ;
                      ?>
                        <p>Deseja adicionar um novo tipo de documento?</p>
                      <?php 
                    }
                    break;
                    case 'Editar': {
                      $link= $path.'/update/updateFormTipoDoc.php';
                      ?>
                        <p>Deseja editar o tipo de documento:</p>
                        <p>Id: <?php echo $_POST['id'] ?></p>
                      <?php 
                    }
                    break;
                    case 'Eliminar': {
                      $link= $path.'/delete/deleteTipoDoc.php';
                      ?>
                      <p>Deseja eliminar o tipo de documento:</p>
                      <p>Id: <?php echo $_POST['id'] ?></p>
                    <?php 
                    }
                    break;
                  }
                }break;
                case "DocumentosFiscais":
                  {
                    switch($operacao){
                      case 'Adicionar': {
                        $link= $path.'/forms/formDocFiscais.php' ;
                        ?>
                          <p>Deseja adicionar um novo documento fiscal?</p>
                        <?php 
                      }
                      break;
                      case 'Editar': {
                        $link= $path.'/update/updateFormDocFiscal.php';
                        ?>
                          <p>Deseja editar o documento fiscal:</p>
                          <p>Id: <?php echo $_POST['id'] ?></p>
                        <?php 
                      }
                      break;
                      case 'Eliminar': {
                        $link= $path.'/delete/deleteDocCab.php';
                        ?>
                        <p>Deseja eliminar o documento fiscal:</p>
                        <p>Id: <?php echo $_POST['id'] ?></p>
                      <?php 
                      }
                      break;
                    }
                  }
              break;
          }
        
        ?>
         </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <button type="button" onclick="window.location.href = '<?php echo $link ?>?id=<?php echo $_POST['id']?>'" class="btn btn-primary" >Sim</button>
      </div>
    </div>
  </div>
</div>



  
