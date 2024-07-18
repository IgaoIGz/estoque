<?php

include 'venda.php';
include 'vendadao.php';

$CodigoVenda = filter_input(INPUT_POST, 'codigovenda');
$Data_Venda = filter_input(INPUT_POST, 'DataVenda');
$Qtd_venda = filter_input(INPUT_POST, 'QtdVenda');
$Cod_ve = filter_input(INPUT_POST, 'codVE');
$acao = filter_input(INPUT_POST, 'acao');

$venda = new venda();
$vendaDao = new vendadao();

$venda->setCodigo($CodigoVenda);
$venda->SetDatavenda($Data_Venda);
$venda->SetQuantidadevenda($Qtd_venda);
$venda->SetCodVE($Cod_ve);

if($acao=="CONSULTAR VENDAS"){
    $vendaDao->consultar();
    $c = $vendaDao->consultar();
    if($c){
        include 'h/header.php';
        foreach($c as $consult){
            echo '<br>';
            echo '<div class="cent">';
            echo 'Código da venda: '.$consult['cod_venda']."<br>";
            echo 'Código do produto: '.$consult['venda_estoque']."<br>";
            echo 'Quantidade vendida: '.$consult['qtd_venda']."<br>";
            $data = $consult['datavenda'];
            $data=implode("/", array_reverse(explode("-", $data)));
            echo 'Data da venda: '.$data."<br>";
            echo '</div>';
            echo '<br>';
        }
        echo '
        <div class="cent">
            <form action="vendaprincipal.php" method="post">
                <input type="submit" value="VOLTAR" class="submit-btn">
            </form>
        </div>
        ';
        include 'h/footer.php';
    }else{
        header('Location: vendaprincipal.php?semvenda=true');
    }
}else if($acao=="CADASTRAR VENDA"){
    $vendaDao->cadastrar($venda);
}else if($acao=="APAGAR"){
    $vendaDao->apagar($venda);
}
