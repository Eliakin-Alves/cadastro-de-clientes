<?php
  if($_POST){
    // incluir conexão
    include "includes/conexao.php";
    include "includes/funcoes.php";
    //capturar os dados do post
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $msg = "E-mail inválido";
    }
    else if (!validarCPF($cpf)){
      $msg = "CPF inválido";
    }
    else {
    //criar sql
    $sql = "INSERT INTO cliente VALUES
    (default, '{$nome}','{$telefone}','{$email}','{$cpf}')";
    //tenta cadastrar, retoma true ou false
    $resposta = $conn->query($sql);
    // se true, verdadeiro, cadastro efetuado
    if($resposta === true){
      $msg = "Cadastrar com sucesso!";
    }
    else {
      $msg = "Erro ao cadastrar!". $conn->error;
    }
  }
  }
?>
<?php include "includes/header.php";?>
  <div class="container">
    <h1>Cadastro de Clientes</h1>
    <form class="form-horizontal" method="post" action="cliente-novo.php">
    <fieldset>

<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome"></label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefone"></label>  
  <div class="col-md-4">
  <input id="telefone" name="telefone" type="text" placeholder="Telefone" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email"></label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="E-mail" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cpf"></label>  
  <div class="col-md-4">
  <input id="cpf" name="cpf" type="text" placeholder="CPF" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Cadastrar</button>
  </div>
</div>

</fieldset>
</form>
<div>
  <?php if(isset($msg)) echo $msg; //se existir $msg, imprima?> 
</div>
    </div>
<?php include "includes/footer.php";?>