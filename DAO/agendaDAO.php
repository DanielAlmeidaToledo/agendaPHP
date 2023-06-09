<?php

require_once('../Util/conexaoBD.php');

class AgendaDAO {
    
    private $conexao;
    
    public function __construct() {
        $this->conexao = new PDO("mysql:host=localhost;port=3306;dbname=agenda", "root", "");
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function inserirContato($nome, $telefone) {
        $sql = "INSERT INTO contatos (nome, telefone) VALUES (:nome, :telefone)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':telefone', $telefone);
        $stmt->execute();
    }
    
    public function excluirContato($id) {
        $sql = "DELETE FROM contatos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    
    public function atualizarContato($id, $nome, $telefone) {
        $sql = "UPDATE contatos SET nome = :nome, telefone = :telefone WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':telefone', $telefone);
        $stmt->execute();
    }

    public function listarContatos() {
        $sql = "SELECT * FROM contatos";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function consultarContato($id) {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
