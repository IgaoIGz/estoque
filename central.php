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

    <div class="cent">
      <form action="estoqueprincipal.php" method="post">
        <input type="submit" value="GERENCIAR ESTOQUE" class="submit-btn">
      </form>
    </div>
    <br>
    <div class="cent">
      <form action="vendaprincipal.php" method="post">
        <input type="submit" value="GERENCIAR VENDAS" class="submit-btn">
      </form>
    </div>
    <br>
    <div class="cent">
        <form action="estoqueprincipal.php" method="post">
            <input type="submit" name="acao" value="DESLOGAR" class="submit-btn">
        </form>
  </div>
<?php
  $acao = filter_input(INPUT_POST, 'acao');
  if($acao == "DESLOGAR"){
    session_destroy();
    header('Location: index.php?des=true');
  }

  include 'h/footer.php';
?>