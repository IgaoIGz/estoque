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
  <form action="vendacontroller.php" method="post">
    <div class="center">
      <h3>CADASTRAR VENDA</h3>
      <label>Data da venda</label><br>
      <input type="date" name="DataVenda" class="btn" required>
      <label>Quantidade de venda</label><br>
      <input type="text" name="QtdVenda" required><br>
      <label>Código do produto vendido</label><br>
      <input type="text" name="codVE" required><br><br>
      <input type="submit" name="acao" value="CADASTRAR VENDA" class="submit-btn">
    </div>
    <br>
  </form>
  <form action="vendacontroller.php" method="post">
    <div class="center">
      <h3>CONSULTAR VENDA</h3>
      <input type="submit" name="acao" value="CONSULTAR VENDAS" class="submit-btn">
    </div>
    <br>
  </form>
  <form action="vendacontroller.php" method="post">
    <div class="center">
      <h3>APAGAR/CANCELAR VENDA</h3>
      <label>Código da venda</label><br>
      <input type="text" name="codigovenda" required><br>
      <input type="submit" name="acao" value="APAGAR" class="submit-btn">
    </div>
  </form>
  <br>
  <div class="center">
    <form action="estoqueprincipal.php" method="post">
      <input type="submit" name="acao" value="DESLOGAR" class="submit-btn">
    </form>
  </div>
  <br>
  <div class="center">
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
    echo '<div class="aviso">Venda deletada com sucesso</div>';
  }else if(isset($_GET['semvenda'])){
    echo '<div class="aviso">Não existem vendas cadastradas ainda.</div>';
  }
  ?>
<?php
  include 'h/footer.php';
?>