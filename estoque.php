<?php

class estoque{
    private $cod_produto;
    private $nome_produto;
    private $precocompra;
    private $precovenda;
    private $quantidadeproduto;
    private $datacompra;

    public function GetCodigo(){
        return $this->cod_produto;
    }
    public function SetCodigo($codigo){
        $this->cod_produto = $codigo;
    }

    public function GetNome(){
        return $this->nome_produto;
    }
    public function SetNome($Nome){
        $this->nome_produto = $Nome;
    }

    public function GetPrecoCompra(){
        return $this->PrecoCompra;
    }
    public function SetPrecoCompra($Preco_Compra){
        $this->PrecoCompra = $Preco_Compra;
    }

    public function GetPrecovenda(){
        return $this->precovenda;
    }
    public function SetPrecovenda($preco_venda){
        $this->precovenda = $preco_venda;
    }

    public function GetQuantidadeproduto(){
        return $this->Quantidadeproduto;
    }
    public function SetQuantidadeproduto($Quantidade_produto){
        $this->Quantidadeproduto = $Quantidade_produto;
    }

    public function GetDatacompra(){
        return $this->datacompra;
    }
    public function SetDatacompra($data_compra){
        $this->datacompra = $data_compra;
    }
}