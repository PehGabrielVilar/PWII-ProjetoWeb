<?php 

class UsuarioDAO{
    public $nome;
    public $email;
    public $senha;

    private $con;

    function __construct(){
        $this->con = mysqli_connect("localhost", "root", "etecia", "projetopw");
    }

    public function apagar (){
        $sql = "DELETE FROM usuário WHERE idUsuario=$id";
        $rs = $this->con->query($rs);
        if ($rs) header ("Location: usuario.php");
        else echo $this->con->error; 
    }

    public function inserir(){
        $sql = "INSERT INTO usuário VALUES (0, '$this->nome', '$this->email', '$this->senha')";
        $rs = $this->con->query($sql);
        if ($rs) 
            header ("Location: usuarios.php");
        else 
            echo $this->con->error;
    }
    
    public function buscar(){
        $sql = "SELECT * FROM usuário";
        $rs = $this->con->query($sql);
        $linhaDeUsuarios = array();
        while ($linha = $rs->fetch_object ()){
            $listaDeUsuarios [] = $linha;
        }
        return $listaDeUsuarios;
    }
}
?>