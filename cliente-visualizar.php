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
    $id = $_POST['id'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $msg = "E-mail inválido";
    }
    else if (!validarCPF($cpf)){
      $msg = "CPF inválido";
    }
    else {
    //criar sql
    $sql = "UPDATE cliente SET
    nome = '{$nome}',
    telefone = '{$telefone}',
    email = '{$email}',
    cpf = '{$cpf}'
    WHERE pk_cliente = {$id}";
    //tenta cadastrar, retoma true ou false
    $resposta = $conn->query($sql);
    // se true, verdadeiro, cadastro efetuado
    if($resposta === true){
      $msg = "Atualizado com sucesso";
    }
    else {
      $msg = "Erro ao cadastrar!". $conn->error;
    }
  }
  }
?>
<?php
    include "includes/conexao.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM cliente WHERE pk_cliente = {$id}";
    $lista = $conn->query($sql);
    $cliente = $lista->fetch_assoc();
?>
<?php include "includes/header.php";?>
<div class="container">
    <h1>Cadastro de Clientes</h1>
    <form class="form-horizontal" method="post" action="cliente-visualizar.php?id=<?php echo $cliente['pk_cliente']; ?>">
    <fieldset>
    <input value="<?php echo $cliente['pk_cliente']; ?>" id="id" name="id" type="hidden" placeholder="Id">
<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="id">ID</label>  
  <div class="col-md-4">
  <input value="<?php echo $cliente['pk_cliente']; ?>" id="id" name="id" disabled="disabled" type="text" placeholder="Id" class="form-control input-md">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="nome"></label>  
  <div class="col-md-4">
  <input  value="<?php echo $cliente['nome']; ?>" id="telefone" id="nome" name="nome" type="text" placeholder="Nome" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefone"></label>  
  <div class="col-md-4">
  <input value="<?php echo $cliente['telefone']; ?>" id="telefone" name="telefone" type="text" placeholder="Telefone" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email"></label>  
  <div class="col-md-4">
  <input  value="<?php echo $cliente['email']; ?>" id="telefone" id="email" name="email" type="text" placeholder="E-mail" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cpf"></label>  
  <div class="col-md-4">
  <input  value="<?php echo $cliente['cpf']; ?>" id="telefone" id="cpf" name="cpf" type="text" placeholder="CPF" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="" class="btn btn-primary">Atualizar</button>
  </div>
</div>

</fieldset>
</form>
<div>
  <?php if(isset($msg)) echo $msg; //se existir $msg, imprima?> 
</div>
    </div>
<?php include "includes/footer.php";?>