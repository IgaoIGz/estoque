<?php
include 'h/header.php';
?>

<div class="center">
    <form action="validalogin.php" method="post">
        <label>Usuário</label>
        <input type="text" name="usuario" placeholder="usuario" required>
        <label>Senha</label>
        <input type="password" name="senha" placeholder="senha" required>
        <input type="submit" value="LOGAR">
    </form>
</div>

<?php 
if(isset($_GET['erro'])){
    echo '<div class="aviso">Erro, usuário ou senha inválidos</div>';
}else if(isset($_GET['error'])){
    echo '<div class="aviso">É necessário logar para acessar o sistema</div>';
}else if(isset($_GET['des'])){
    echo '<div class="aviso">Você saiu de sua conta</div>';
}
?>

<?php
include 'h/footer.php';
?>
