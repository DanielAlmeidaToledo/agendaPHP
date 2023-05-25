<?php 
    session_start();

    if (!isset($_SESSION["perfil"])) {
        header("Location: ../index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/global.css">
    <title>Agenda - Atualização e Exclusão</title>
</head>
<body>
    <div class="principal-content">
        

        <?php 
                if($_SESSION["perfil"]){

                    if($_SESSION["perfil"] == 'user'){
                        echo "<h1 class='principal-title'>Lista de registros na agenda</h1>";

                    } else if ($_SESSION["perfil"] == 'admin') {
                        echo "<h1 class='principal-title'>Atualização e Exclusão de Contato</h1>";
                    }
                }
        ?>

        <?php
            // Realiza a listagem dos contatos
            require_once("../DAO/agendaDAO.php");
            $agendaDAO = new AgendaDAO();
            $contatos = $agendaDAO->listarContatos();

            // Verifica se existem contatos cadastrados
            if ($contatos) {

                if($_SESSION["perfil"]){

                    if($_SESSION["perfil"] == 'user'){
                        echo '<table class="table table-hover table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Telefone</th>
                                </tr>
                            </thead>
                            <tbody>';   

                    } else if ($_SESSION["perfil"] == 'admin') {
                        echo '<table class="table table-hover table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col" style="width: 15rem;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>';                    
                    }
                }

                // Realiza a listagem dos contatos
                foreach ($contatos as $contato) {

                    if($_SESSION["perfil"]){
    
                        if($_SESSION["perfil"] == 'user'){
                            echo '<tr>
                                    <th scope="row">' . $contato['id'] . '</th>
                                    <td>' . $contato['nome'] . '</td>
                                    <td>' . $contato['telefone'] . '</td>
                                  </tr>';

                        } else if ($_SESSION["perfil"] == 'admin') {
                            echo '<tr>
                                    <th scope="row">' . $contato['id'] . '</th>
                                    <td>' . $contato['nome'] . '</td>
                                    <td>' . $contato['telefone'] . '</td>
                                    <td>
                                        <button type="button" class="btn btn-table btn-table-edit" data-toggle="modal" data-target="#editarModal' . $contato['id'] . '">Editar</button>
                                        <button type="button" class="btn btn-table btn-danger" data-toggle="modal" data-target="#excluirModal' . $contato['id'] . '">Excluir</button>
                                    </td>
                                  </tr>';
                        }
                    }
                }

                echo '</tbody></table>';

                // Realiza a listagem dos modais
                foreach ($contatos as $contato) {
                    // Modal de edição
                    echo '<div class="modal fade" id="editarModal' . $contato['id'] . '" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel' . $contato['id'] . '" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarModalLabel' . $contato['id'] . '">Editar Contato</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../Forms/processaTodosFormularios.php" method="post">
                                            <div class="modal-div">
                                                <label for="nome' . $contato['id'] . '">Nome:</label>
                                                <input type="text" class="form-control" id="nome' . $contato['id'] . '" name="nome" value="' . $contato['nome'] . '">
                                            </div>
                                            <div class="modal-div">
                                                <label for="telefone' . $contato['id'] . '">Telefone:</label>
                                                <input type="text" class="form-control" id="telefone' . $contato['id'] . '" name="telefone" value="' . $contato['telefone'] . '">
                                            </div>
                                            <input type="hidden" name="id" value="' . $contato['id'] . '">
											<div class="modal-btn">
												<button type="submit" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn" name="atualizar">Salvar</button>
											</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>';

                    // Modal de exclusão
                    echo '<div class="modal fade" id="excluirModal' . $contato['id'] . '" tabindex="-1" role="dialog" aria-labelledby="excluirModalLabel' . $contato['id'] . '" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="excluirModalLabel' . $contato['id'] . '">Excluir Contato</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Deseja realmente excluir o contato "' . $contato['nome'] . '"?</p>
										<form action="../Forms/processaTodosFormularios.php" method="post">
											<input type="hidden" name="id" value="' . $contato['id'] . '">
											<div class="modal-btn">
												<button type="submit" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn" name="excluir">Excluir</button>
											</div>
										</form>
									</div>
                                </div>
                            </div>
                        </div>';
                }
            } else { // Caso não existam contatos cadastrados
                echo "<img src='../Media/error.png' alt='Nenhum contato encontrado' style='display: block; margin: 10rem auto 2rem; width: 6rem;'>";
                echo "<p style='text-align: center; font-size: 1.8rem;'>Nenhum contato encontrado!</p>";
            }
        ?>

    </div>
    
    <a href="../Paginas/paginaPrincipal.php" class="return-page">
        <img src="../Media/back.png" alt="Voltar">
    </a>

    <footer>
        <p>Desenvolvido por <a href="https://br.linkedin.com/in/danielalmeidadetoledo" target="_blank">Daniel Toledo</a></p>
    </footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
