<?php
  session_start();
  require_once('../BO/agendaBO.php');

  $agendaBO = new AgendaBO();

  if(isset($_POST['inserir'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $agendaBO->inserirContato($nome, $telefone);
    header("Location: ../Paginas/formularioAtualizarExcluir.php");

  } else if(isset($_POST['excluir'])) {
    $id = $_POST['id'];
    $agendaBO->excluirContato($id);
    header("Location: ../Paginas/formularioAtualizarExcluir.php");

  } else if(isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $agendaBO->atualizarContato($id, $nome, $telefone);
    header("Location: ../Paginas/formularioAtualizarExcluir.php");

  } else if(isset($_GET['consulta'])) {
    $id = $_GET['id'];
    echo $id;
    $contato = $agendaBO->consultarContato($id);
    $_SESSION['contacts'] = $contato;
    header("Location: ../Paginas/formularioConsulta.php");
  }
?>