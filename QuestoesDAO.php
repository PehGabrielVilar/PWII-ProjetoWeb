<?php 
include "config.php";
class QuestoesDAO{
	public $id;
	public $enunciado;
	public $tipo;

	private $con;

	function __construct(){
		$this->con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	}

	public function apagar($id){
		$sql = "DELETE FROM questoes WHERE idQuestao=$id";
		$rs = $this->con->query($sql);
		session_start();
		 if ($rs) {
            $_SESSION["success"] = "Questão Apagada";
        } else {
            $_SESSION["danger"] = "Questão não foi Apagada";
        }
        header("Location: \questoes");
	}

	public function inserir(){
		$sql = "INSERT INTO questoes VALUES (0, '$this->enunciado', '$this->tipo')";
		$rs = $this->con->query($sql);
		session_start();
        if ($rs) {
            $_SESSION["success"] = "Questão inserido com Sucesso";
        } else {
            $_SESSION["danger"] = "Error Fatal... Não deu pra inserir a pergunta";
        }
        header("Location: \questoes");
	}

	public function editar(){
		$sql = "UPDATE questoes SET enunciado='$this->enunciado', tipo='$this->tipo' WHERE idQuestao=$this->id";
		$rs = $this->con->query($sql);
		 session_start();
        if ($rs) {
            $_SESSION["success"] = "Deu bom pra trocar essa questão cara";
        } else {
            $_SESSION["danger"] = "É...então, não deu pra mudar nada não";
        }
        header("Location: \questoes");
	}


	public function buscar(){
		$sql = "SELECT * FROM questoes";
		$rs = $this->con->query($sql);
		$lista = array();
		while ($linha = $rs->fetch_object()){
			$lista[] = $linha;
		}
		return $lista;
	}

	public function buscarPorId(){
		$sql = "SELECT * FROM questoes WHERE idQuestao=$this->id";
		$rs = $this->con->query($sql);
		if ($linha = $rs->fetch_object()){
			$this->enunciado = $linha->enunciado;
			$this->tipo = $linha->tipo;
		}

	}
}


?>