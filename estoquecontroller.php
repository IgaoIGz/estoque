<?php

include 'estoque.php';
include 'estoquedao.php';

$CodigoProduto = filter_input(INPUT_POST, 'codigoproduto');
$NomeProduto = filter_input(INPUT_POST, 'NomeProduto');
$PrecoCompra = filter_input(INPUT_POST, 'PrecoCompra');
$PrecoVenda = filter_input(INPUT_POST, 'PrecoVenda');
$Quantidade = filter_input(INPUT_POST, 'Quantidade');
$DataCompra = filter_input(INPUT_POST, 'DataCompra');
$acao = filter_input(INPUT_POST, 'acao');

$estoque = new estoque();
$estoqueDao = new estoquedao();

$estoque->setCodigo($CodigoProduto);
$estoque->setNome($NomeProduto);
$estoque->SetPrecoCompra($PrecoCompra);
$estoque->SetPrecovenda($PrecoVenda);
$estoque->SetQuantidadeproduto($Quantidade);
$estoque->SetDatacompra($DataCompra);

if($acao=="CONSULTAR"){
    $estoqueDao->consultar();
    include 'h/header.php';
    foreach($estoqueDao->consultar() as $consult){
        echo '<br>';
        echo '<div class="cent">';
        echo 'Código do produto: '.$consult['cod_produto']."<br>";
        echo 'Nome do produto: '.$consult['nome_produto']."<br>";
        echo 'Preço de compra: '.$consult['precocompra']."<br>";
        echo 'Preço de venda: '.$consult['precovenda']."<br>";
        echo 'Quantidade do produto: '.$consult['quantidadeproduto']."<br>";
        $data = $consult['datacompra'];
        $data=implode("/", array_reverse(explode("-", $data)));
        echo 'Data da venda: '.$data."<br>";
        echo '</div>';
        echo '<br>';
    }
    echo '
        <div class="cent">
            <form action="estoqueprincipal.php" method="post">
                <input type="submit" value="VOLTAR" class="submit-btn">
            </form>
        </div>
    ';
    include 'h/footer.php';
}else if($acao=="CADASTRAR"){
    $estoqueDao->cadastrar($estoque);
}else if($acao=="APAGAR"){
    $estoqueDao->apagar($estoque);
}else if($acao=="ATUALIZAR"){
    $estoqueDao->atualizar($estoque);
}else if($acao=="CONSULTAR2"){
    $estoqueDao->consultar();
    include 'h/header.php';
    if($estoqueDao->consultar()){
        foreach($estoqueDao->consultar() as $consult){
            if($CodigoProduto == $consult['cod_produto']){
                echo '<br>';
                echo '<div class="cent">';
                echo 'Código do produto: '.$consult['cod_produto']."<br>";
                echo 'Nome do produto: '.$consult['nome_produto']."<br>";
                echo 'Preço de compra: '.$consult['precocompra']."<br>";
                echo 'Preço de venda: '.$consult['precovenda']."<br>";
                echo 'Quantidade do produto: '.$consult['quantidadeproduto']."<br>";
                $data = $consult['datacompra'];
                $data=implode("/", array_reverse(explode("-", $data)));
                echo 'Data da venda: '.$data."<br>";
                echo '</div>';
                echo '<br>';
                $codzin = $consult['cod_produto'];
            }
        }
        if($CodigoProduto != $codzin){
            header('Location: estoqueprincipal.php?erroconsulta=true');
        }
    }
    echo '
        <div class="cent">
            <form action="estoqueprincipal.php" method="post">
                <input type="submit" value="VOLTAR" class="submit-btn">
            </form>
        </div>
    ';
    include 'h/footer.php';
}
