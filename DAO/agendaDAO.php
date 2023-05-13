// O arquivo agendaDAO.php deve conter as funções responsáveis por realizar as operações no banco de dados. Abaixo segue um exemplo básico de implementação:

<?php

require_once 'conexao.php';

class AgendaDAO {
    
    private $conexao;
    
    public function __construct() {
        $this->conexao = Conexao::getInstance();
    }
    
    public function inserirContato($nome, $telefone) {
        $sql = "INSERT INTO contatos (nome, telefone) VALUES (:nome, :telefone)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':telefone', $telefone);
        $stmt->execute();
    }
    
    public function consultarContato($nome) {
        $sql = "SELECT * FROM contatos WHERE UPPER(nome) LIKE :nome";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':nome', '%' . $nome . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    
    public function selecionarContato($id) {
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
