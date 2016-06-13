<?php
    http://localhost/Aula_RL/MVC/index.php?Controller=Produto&Action=novo
    if(isset($_GET["Controller"])){
        
        
        
        include "Controller/" . $_GET["Controller"]. "Controller.php";
        
        //recebe uma string como parâmetro string em código PHP
        $class = $_GET["Controller"]."Controller";
        eval ("\$Controller = new $class();");
            
        if(isset($_GET["Action"])){
            eval("\$Controller->\$_GET['Action']();");
        }
    }
?>