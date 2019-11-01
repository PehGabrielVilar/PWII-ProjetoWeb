<?php
include "PerguntaDAO.php";

$perguntaDAO = new PerguntaDAO ();
$lista = $perguntaDAO->buscar();


?>
<!DOCTYPE html>
<head>
    <title></title>
    <link rel=" stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <meta charset="UTF-8" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Sem Nome</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
            aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active" >
                    <a class="nav-link" href="#">Home <span class="sr-only">(página atual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Ação</a>
                        <a class="dropdown-item" href="#">Outra ação</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Algo mais aqui</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Desativado</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
            </form>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <ul class="nav flex-column nav-pills vertical">
                    <li class="nav-item">
                        <a class="nav-link " href="usuarios">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="pergunta" >Perguntas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Desativado</a>
                    </li>
                </ul>
            </div>
            <div class="col-10">
                <h3>Questões</h3>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalnovo">
                    <i class="fas fa-question"></i>
                    Nova Questão
                </button>
                <table class="table">
                    <tr>
                        <th>Questão</th>
                        <th>Enunciado</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach($lista as $pergunta): ?>
                    <tr>
                        <td><?= $pergunta -> idQuestao?></td>
                        <td><?= $pergunta -> enunciado?></td>
                        <td><?= $pergunta -> tipo?></td>
                        <td>
                            <button type="button" class="btn btn-info" >
                            <i class="fas fa-list"></i></button>   
                            <button type="button" class="btn btn-warning alterar-senha" data-toggle="modal" data-target="#modalsenha" data-id="<?=$pergunta-> idQuestao?>">
                            <i class="far fa-edit "></i></button>
                            <a class="btn btn-danger" href ="PerguntaController.php?acao=apagar&id=<?=$pergunta-> idQuestao?>">
                            <i class="fas fa-times"></i></a>
                            
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalnovo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nova Pergunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="PerguntaController.php?acao=inserir" method="POST">
                        <div class="form-group">
                            <label for="enunciado">Enunciado</label>
                            <input type="text" name="enunciado" class="form-control" id="enunciado" placeholder="Digite o enunciado">
                        </div>
                        <div class="form-group">
                                <label for="tipo">Tipo</label>
                                <div id = "tipo">
                                <div class="radio">
                                <label><input type="radio" name="optradio" checked> Multipla escolha</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="optradio"> Associação</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="optradio" > Verdadeiro ou Falso</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="optradio" > Resposta breve</label>
                                </div>
                                <div class="radio">
                                <label><input type="radio" name="optradio" > Complete a frase</label>
                                </div>
                                </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- TrocaPergunta -->
    <div class="modal fade" id="modalsenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Pergunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="PerguntaController.php?acao=trocarpergunta" method="POST">
                        <input type="hidden" name="id"  id="campo-id">
                        <div class="form-group">
                            <label for="enunciado">Enunciado</label>
                            <input type="text" name="enunciado" class="form-control" id="enunciado" placeholder="Digite o enunciado">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<script type = "text/javascript">
var botao = document.querySelector(".alterar-senha");
botao.addEventListener("click", function(){
    var campo = document.querySelector("#campo-id");
    campo.value = botao.getAttribute("data-id");
});

</script>




<html>