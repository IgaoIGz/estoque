<?php

include 'conexao.php';

class vendadao{
    /*CRUD - create read update delete*/

    /*C create */
    public function cadastrar(Venda $v){
        $sql = "insert into vendamercado (datavenda, qtd_venda, venda_estoque) values (?, ?, ?)";

        $bc = new Conexao();
        $con = $bc->getConexao();

        $valores = $con->prepare($sql);
        $valores->bindValue(1, $v->GetDatavenda());
        $valores->bindValue(2, $v->GetQuantidadevenda());
        $valores->bindValue(3, $v->GetCodVE());
        
        $result = $valores->execute();

        if($result){
            header('Location: vendaprincipal.php?sucesso=true');
        }else{
            echo "erro ao cadastrar";
        }
    }

    public function consultar(){
        $sql = "select * from vendamercado";

        $bc = new Conexao();
        $con = $bc->getConexao();

        $valores = $con->prepare($sql);
        $valores->execute();

        if($valores->rowCount()>0){
            $resultado = $valores->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
    }

    public function apagar(Venda $v){
        $sql = "delete from vendamercado where cod_venda=?";

        $bc = new Conexao();
        $con = $bc->getConexao();

        $valores = $con->prepare($sql);
        $valores->bindValue(1, $v->getCodigo());

        $result = $valores->execute();

        if($result){
            header('Location: vendaprincipal.php?apagou=true');
        }else{
            echo "erro ao apagar";
        }
    }
}