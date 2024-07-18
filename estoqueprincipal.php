<?php 
session_start();

if((!isset($_SESSION['usuario'])==true) && (!isset($_SESSION['senha'])==true)){
  header('location: index.php?error=true');
}

$login = $_SESSION['usuario'];

echo "<h2>"."Seja bem-vindo(a) ".$login."</h2>";
?>

<?php 
  include 'h/header.php';
?>
  <form action="estoquecontroller.php" method="post">
    <div class="center">
      <h3>Cadastrar produto</h3>
      <label>Nome do produto</label><br>
      <input type="text" name="NomeProduto" required><br>
      <label>Preço de compra</label><br>
      <input type="text" name="PrecoCompra" required><br>
      <label>Preço de venda</label><br>
      <input type="text" name="PrecoVenda" required><br>
      <label>Quantidade</label><br>
      <input type="text" name="Quantidade" required><br>
      <label>Data da compra</label><br>
      <input type="date" name="DataCompra" class="btn" required><br><br>
      <input type="submit" name="acao" value="CADASTRAR" class="submit-btn">
    </div>
  </form>
  <br>
  <form action="estoquecontroller.php" method="post">
    <div class="center">
      <h3>Consultar produto</h3>
      <input type="submit" name="acao" value="CONSULTAR" class="submit-btn">
    </div>
  </form>
  <br>
  <form action="estoquecontroller.php" method="post">
    <div class="center">
      <h3>Consultar produto por código</h3>
      <label>Código do produto</label><br>
      <input type="text" name="codigoproduto" required><br>
      <input type="submit" name="acao" value="CONSULTAR2" class="submit-btn">
    </div>
  </form>
  <br>
  <form action="estoquecontroller.php" method="post">
    <div class="center">
      <h3>Deletar produto</h3>
      <label>Código do produto</label><br>
      <input type="text" name="codigoproduto" required><br>
      <input type="submit" name="acao" value="APAGAR" class="submit-btn">
    </div>
  </form>
  <br>
  <form action="estoquecontroller.php" method="post">
    <div class="center">
      <h3>Atualizar produto</h3>
      <label>Código do produto</label><br>
      <input type="text" name="codigoproduto" required><br><br>
      <label>Nome do produto</label><br>
      <input type="text" name="NomeProduto" required><br>
      <label>Preço de compra</label><br>
      <input type="text" name="PrecoCompra" required><br>
      <label>Preço de venda</label><br>
      <input type="text" name="PrecoVenda" required><br>
      <label>Quantidade</label><br>
      <input type="text" name="Quantidade" required><br>
      <label>Data da compra</label><br>
      <input type="date" name="DataCompra" class="btn" required><br><br>
      <input type="submit" name="acao" value="ATUALIZAR" class="submit-btn">
    </div>
  </form>
  <br>
  <div class="center">
    <form action="estoqueprincipal.php" method="post">
      <input type="submit" name="acao" value="DESLOGAR" class="submit-btn">
    </form>
    <form action="central.php" method="post">
      <input type="submit" value="VOLTAR" class="submit-btn">
    </form>
  </div>
  <?php
  $acao = filter_input(INPUT_POST, 'acao');
  if($acao == "DESLOGAR"){
    session_destroy();
    header('Location: index.php?des=true');
  }

  if(isset($_GET['sucesso'])){
    echo '<div class="aviso">Cadastrado com sucesso</div>';
  }else if(isset($_GET['apagou'])){
    echo '<div class="aviso">Produto deletado com sucesso</div>';
  }else if(isset($_GET['atualizou'])){
    echo '<div class="aviso">Produto atualizado com sucesso</div>';
  }else if(isset($_GET['erratt'])){
    echo '
    <div class="aviso">
      Erro ao atualizar!
      <br>
      O código digitado não existe
    </div>';
  }else if(isset($_GET['erroconsulta'])){
    echo '
    <div class="aviso">
      Erro na consulta!
      <br>
      O código digitado não existe
    </div>';
  }else if(isset($_GET['errodelete'])){
    echo '
    <div class="aviso">
      Erro ao deletar!
      <br>
      O código digitado não existe
    </div>';
  }
  ?>
<?php
  include 'h/footer.php';
?>