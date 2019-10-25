<?php 

class PerguntaDAO{
    public $enunciado;
    public $tipo;
    

    private $con;

    function __construct(){
        $this->con = mysqli_connect("localhost", "root", "etecia", "projetopw");
    }

    public function apagar ($id){
        $sql = "DELETE FROM pergunta WHERE idQuestao = $id";
        $rs = $this->con->query($sql);
        if ($rs) header ("Location: pergunta.php");
        else echo $this->con->error; 
    }
    public function trocarpergunta ($id){
        $sql = "UPDATE pergunta SET enunciado = $enunciado  WHERE idQuestao = $id";
        $rs = $this->con->query($sql);
        if ($rs) header ("Location: pergunta.php");
        else echo $this->con->error; 
    }

    public function inserir(){
        $sql = "INSERT INTO pergunta VALUES (0, '$this->enunciado', '$this->tipo')";
        $rs = $this->con->query($sql);
        if ($rs) 
            header ("Location: pergunta.php");
        else 
            echo $this->con->error;
    }
    
    public function buscar(){
        $sql = "SELECT * FROM pergunta";
        $rs = $this->con->query($sql);
        $listaDePerguntas = array();
        while ($linha = $rs->fetch_object ()){
            $listaDePerguntas [] = $linha;
        }
        return $listaDePerguntas;
    }
}
?>