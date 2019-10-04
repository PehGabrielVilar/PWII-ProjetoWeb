<?php 

include "PerguntaDAO.php";

$acao = $_GET["acao"];

switch ($acao) {
    case 'inserir':
    $pergunta = new PerguntaDAO();
    $pergunta->enunciado = $_POST["enunciado"];
    $pergunta->tipo = $_POST["tipo"];
    $pergunta->inserir();
        break;
    case 'apagar':
        $pergunta = new PerguntaDAO();
        $id = $_GET["id"];
        $pergunta->apagar($id);
        break;
    case 'trocarpergunta':
        $pergunta = new PerguntaDAO();
        $id = $_POST["id"];
        $pergunta->trocarpergunta($id);
        break;
    default:
        # code...
        break;
}

?>