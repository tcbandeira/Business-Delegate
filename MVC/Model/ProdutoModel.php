<?php

//Criando Regras de negócio
/*Com essa tecnologia, podemos ter mais de um tipo de serviço (serviços para
 *  bancos de dados e serviços para arquivos xml, por exemplo) controlados 
 * por vários business delegates. Isso permitiria mudar a maneira como se 
 * faz a persistência dos dados sem modificar nada na camada de visão.*/
class ProdutoModel {
    public function insertModel(ProdutoVO $value){
        $prod = new ProdutoDAO();
        //encapsular negócio
        if($value->getPreco() == "0"){
            $value->setPreco("10.90");
        }
        return $prod->insert($value);
    }
    
    public function deleteModel(ProdutoVO $value){
        $prod = new ProdutoDAO();
        return $prod->delete($value);
    }
    
        public function updateModel(ProdutoVO $value){
        $prod = new ProdutoDAO();
        return $prod->update($value);
    }
    
    public function getByIdModel($id){
        $prod = new ProdutoDAO();
        $vo = $prod->getById($id);
        //encapsular negócio
        //criando a formatação do preço
        $value->setPreco("R$ " . number_format($vo->getPreco(), 2, ',', '.'));
        return $vo;
    }
    public function getByAllModel($id){
        $prod = new ProdutoDAO();
        return $prod->getByAll();
        
    }
}
