<?php

  require_once('../BO/agendaBO.php');

  $agendaBO = new AgendaBO();

  if(isset($_POST['inserir'])) {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $agendaBO->inserirContato($nome, $telefone);
    header("Location: ../Paginas/formularioAtualizarExcluir.php");

  } else if(isset($_POST['consulta'])) {
    $id_contato = $_POST['id_contato'];
    $contato = $agendaBO->consultarContato($id_contato);
    // header("Location: ../Paginas/formularioAtualizarExcluir.php");

  } else if(isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $agendaBO->atualizarContato($id, $nome, $telefone);
    header("Location: ../Paginas/formularioAtualizarExcluir.php");

  } else if(isset($_POST['excluir'])) {
    $id = $_POST['id'];
    $agendaBO->excluirContato($id);
    header("Location: ../Paginas/formularioAtualizarExcluir.php");
  }

?>