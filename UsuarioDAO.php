<?php 

class UsuarioDAO{
    public $nome;
    public $email;
    public $senha;

    public function inserir(){
        $con = mysqli_connect("localhost", "root", "etecia", "projetopw");
        $sql = "INSERT INTO usuário VALUES (0, '$this->nome', '$this->email', '$this->senha')";
        $rs = $con->query($sql);
        if ($rs) 
            echo "usuário cadastrado com sucesso";
        else 
            echo $con->error;
    }
}


?>