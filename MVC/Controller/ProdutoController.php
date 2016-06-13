<?php
include("Model/ProdutoModel.php");
include("Model/ProdutoVO.php");
include("Model/ProdutoDAO.php");
include("Model/DB.php");
//Basicamente tem que ter as Actions(ação que vai ser requisitada)

class ProdutoController {
    
    public function ProdutoController(){
        
    }
    //trabalhando com a model
    public function salvar(){
        $model = new ProdutoModel();
        $vo = new ProdutoVO();
        $vo->setNome($_POST["txtNome"]);
        $vo->setMarca($_POST["txtMarca"]);
        $vo->setPreco($_POST["txtPreco"]);
        
        if($model->insertModel($vo)){
            $_SESSION["msg"]= "Produto cadastrado com sucesso";
        }else{
            $_SESSION["msg"]= "Erro ao cadastrar produto.";
        }
        //header("Location: View/produtos/retorno.php");
    }
    //action novo para aparecer o formulário
    public function novo(){
        //chamar a View correspondente
        include ("View/produtos/insert.php");
    }
    public function edit(){
        $model = new ProdutoModel();
        $vo = $model->getById($_GET["id"]);
        
        $_SESSION["id"] = $vo->getId();
        $_SESSION["nome"] = $vo->getNome();
        $_SESSION["marca"] = $vo->getmarca();
        $_SESSION["preco"] = $vo->getPreco();
        
        header("Location: View/produtos/edit.php");
    }
    ///////////////
    public function update(){
        $model = new ProdutoModel();
        $vo = new ProdutoVO();
        
        $vo->setId($_POST["txtId"]);
        $vo->setNome($_POST["txtNome"]);
        $vo->setMarca($_POST["txtMarca"]);
        $vo->setPreco($_POST["txtPreco"]);
        
        if($model->update($vo)){
            $_SESSION["msg"]= "Produto atualizar com sucesso";
        }else{
            $_SESSION["msg"]= "Erro ao atualizar produto.";
        }
        header("Locarion: View/produtos/retorno.php");
    }
    
}
