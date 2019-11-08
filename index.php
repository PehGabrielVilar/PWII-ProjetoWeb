<?php

switch ($_SERVER["PATH_INFO"]) {
    case '/usuarios':
    case '/usuario':
        require "usuarios.php";
    
        break;
    case '/pergunta':
    case '/pergunta':
        require "pergunta.php";
     
        break;
    default:
    echo "Erro 404 - Página não encontrada";
    
        break;
}

?>