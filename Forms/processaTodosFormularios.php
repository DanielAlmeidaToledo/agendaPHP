<?php

  require_once('../BO/agendaBO.php');

  $agendaBO = new AgendaBO();

  if(isset($_POST['inserir'])) {
    $nome = strtoupper($_POST['nome']);
    $telefone = $_POST['telefone'];
    $agendaBO->inserirContato($nome, $telefone);
    header("Location: ../Paginas/formularioAtualizarExcluir.php");

  } else if(isset($_POST['consulta'])) {
    $id_contato = $_POST['id_contato'];
    $contato = $agendaBO->consultarContato($id_contato);
    header("Location: ../Paginas/formularioAtualizarExcluir.php");

  } else if(isset($_POST['atualizar'])) {
    $id_contato = $_POST['id_contato'];
    $nome = strtoupper($_POST['nome']);
    $telefone = $_POST['telefone'];
    $agendaBO->atualizarContato($id_contato, $nome, $telefone);
    header("Location: ../Paginas/formularioAtualizarExcluir.php");

  } else if(isset($_POST['excluir'])) {
    $id_contato = $_POST['id_contato'];
    $agendaBO->excluirContato($id_contato);
    header("Location: ../Paginas/formularioAtualizarExcluir.php");
  }

?>