<?php


class ProdutoDAO {
    
    
    //métodos crud
    public function insert(ProdutoVO $value){
        $SQL = "INSERT INTO produtos (nome, marca, preco) VALUES (?, ?, ?)";
        $DB = new DB();
        $DB->getConnection();
        $pstm = $DB->execSQL($SQL);

        $pstm->bind_param("sss",$value->getNome(), $value->getMarca(), $value->getPreco());
        
        if($pstm->execute()){
            return true;
        }else{
            return false;
        }
    }
    //////////
    public function update(ProdutoVO $value){
        $SQL = "UPDATE produtos SET nome = ?, marca = ?, preco = ? WHERE id = ?";
        $DB = new DB();
        $DB->getConnection();
        $pstm = $DB->execSQL($SQL);
        $pstm->bind_param("sssi",$value->getNome(), $value->getmarca(), $value->getPreco(), $value->getId());

        if($pstm->execute()){
            return true;
        }else{
            return false;
        }
    }
    //////////////
        public function delete(ProdutoVO $value){
        $SQL = "DELETE FROM produtos WHERE id = ?";
        $DB = new DB();
        $DB->getConnection();
        $pstm = $DB->execSQL($SQL);

        $pstm->bind_param("i",$value->getId());
        
        if($pstm->execute()){
            return true;
        }else{
            return false;
        }
    }
    /////////////
    public function getById($id){
        $SQL = "SELECT * FROM produtos WHERE id = ".  addslashes($id);
        $DB = new DB();
        $DB->getConnection();
        $query = $DB->execReader($SQL);
        
        $vo = new ProdutoVO();
        while($reg = $query->fetch_array(MYSQLI_ASSOC)){
            $vo->setId($reg["id"]);
            $vo->setNome($reg["nome"]);
            $vo->setMarca($reg["marca"]);
            $vo->setPreco($reg["preco"]);
        }
        return $vo;
        
    }
        public function getByAll(){
            $SQL = "SELECT * FROM produtos";

            $DB = new DB();
            $DB->getConnection();
            $query = $DB->execReader($SQL);
            return $query;
        }
}
