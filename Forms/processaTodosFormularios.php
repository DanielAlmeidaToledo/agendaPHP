//O arquivo processaTodosFormularios.php deve ser responsável por receber as informações enviadas pelos formulários e encaminhá-las para as respectivas ações, de acordo com o botão clicado.

<?php
// Importa o arquivo da classe AgendaBO
require_once('../BO/agendaBO.php');

// Verifica qual botão do formulário foi pressionado
if(isset($_POST['inserir'])) {
  // Caso o botão "inserir" tenha sido pressionado, chama o método de inserção do contato
  $nome = strtoupper($_POST['nome']);
  $telefone = $_POST['telefone'];
  AgendaBO::inserirContato($nome, $telefone);
  header("Location: ../Paginas/paginaPrincipal.php");
} elseif(isset($_POST['consulta'])) {
  // Caso o botão "consulta" tenha sido pressionado, chama o método de consulta do contato
  $id_contato = $_POST['id_contato'];
  $contato = AgendaBO::consultarContato($id_contato);
  header("Location: ../Paginas/formularioConsulta2.php?id_contato=$id_contato");
} elseif(isset($_POST['atualizar'])) {
  // Caso o botão "atualizar" tenha sido pressionado, chama o método de atualização do contato
  $id_contato = $_POST['id_contato'];
  $nome = strtoupper($_POST['nome']);
  $telefone = $_POST['telefone'];
  AgendaBO::atualizarContato($id_contato, $nome, $telefone);
  header("Location: ../Paginas/paginaPrincipal.php");
} elseif(isset($_POST['excluir'])) {
  // Caso o botão "excluir" tenha sido pressionado, chama o método de exclusão do contato
  $id_contato = $_POST['id_contato'];
  AgendaBO::excluirContato($id_contato);
  header("Location: ../Paginas/formularioAtualizarExcluir.php");
}
