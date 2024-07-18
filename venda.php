<?php

class venda{
    private $cod_venda;
    private $datavenda;
    private $quantidadevenda;
    private $venda_estoque;

    public function GetCodigo(){
        return $this->cod_venda;
    }
    public function SetCodigo($codigo){
        $this->cod_venda = $codigo;
    }

    public function GetDatavenda(){
        return $this->datavenda;
    }
    public function SetDatavenda($data_venda){
        $this->datavenda = $data_venda;
    }
        
    public function GetQuantidadevenda(){
        return $this->Quantidadevenda;
    }
    public function SetQuantidadevenda($Quantidade_venda){
        $this->Quantidadevenda = $Quantidade_venda;
    }

    public function GetCodVE(){
        return $this->venda_estoque;
    }
    public function SetCodVE($CodVE){
        $this->venda_estoque = $CodVE;
    }
}