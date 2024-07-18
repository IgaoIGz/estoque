<?php

include 'conexao.php';

class estoquedao{
    /*CRUD - create read update delete*/

    /*C create */
    public function cadastrar(Estoque $estq){
        $sql = "insert into estoquemercado(nome_produto, precocompra, precovenda, quantidadeproduto, datacompra) values (?, ?, ?, ?, ?)";

        $bc = new Conexao();
        $con = $bc->getConexao();

        $valores = $con->prepare($sql);
        $valores->bindValue(1, $estq->GetNome());
        $valores->bindValue(2, $estq->GetPrecoCompra());
        $valores->bindValue(3, $estq->GetPrecovenda());
        $valores->bindValue(4, $estq->GetQuantidadeproduto());
        $valores->bindValue(5, $estq->GetDatacompra());
        
        $result = $valores->execute();

        if($result){
            header('Location: estoqueprincipal.php?sucesso=true');
        }else{
            echo "erro ao cadastrar";
        }
    }

    public function consultar(){
        $sql = "select * from estoquemercado";

        $bc = new Conexao();
        $con = $bc->getConexao();

        $valores = $con->prepare($sql);
        $valores->execute();

        if($valores->rowCount()>0){
            $resultado = $valores->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
    }


    public function atualizar(Estoque $estq){
        $sql = 'update estoquemercado set nome_produto=?, precocompra=?, precovenda=?, quantidadeproduto=?, datacompra=? where cod_produto=?';

        $bc = new Conexao();
        $con = $bc->getConexao();

        $valores = $con->prepare($sql);
        $valores->bindValue(1, $estq->getNome());
        $valores->bindValue(2, $estq->getPrecoCompra());
        $valores->bindValue(3, $estq->getPrecovenda());
        $valores->bindValue(4, $estq->getQuantidadeproduto());
        $valores->bindValue(5, $estq->getDatacompra());
        $valores->bindValue(6, $estq->getCodigo());

        $valores->execute();

        if($valores->rowCount()>0){
            header('Location: estoqueprincipal.php?atualizou=true');
        }else{
            header('Location: estoqueprincipal.php?erratt=true');
        }
    }

    public function apagar(Estoque $estq){
        $sql = "delete from estoquemercado where cod_produto=?";

        $bc = new Conexao();
        $con = $bc->getConexao();

        $valores = $con->prepare($sql);
        $valores->bindValue(1, $estq->getCodigo());

        $valores->execute();

        if($valores->rowCount()>0){
            header('Location: estoqueprincipal.php?apagou=true');
        }else{
            header('Location: estoqueprincipal.php?errodelete=true');
        }
    }
}