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
    <form class="form-horizontal" method="post" action="cliente-novo.php">
    <fieldset>

<!-- Form Name -->

<!-- Text input-->
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