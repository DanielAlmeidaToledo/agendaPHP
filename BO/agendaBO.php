<!-- O arquivo agendaBO.php deve conter a lógica de negócio do sistema, ou seja, 
as regras que definem como as operações do banco de dados devem ser realizadas. 
Abaixo segue um exemplo básico de implementação: -->

<?php

require_once '../DAO/agendaDAO.php';

class AgendaBO {
    
    private $agendaDAO;
    
    public function __construct() {
        $this->agendaDAO = new AgendaDAO();
    }
    
    public function inserirContato($nome, $telefone) {
        $this->agendaDAO->inserirContato(strtoupper($nome), $telefone);
    }
    
    public function consultarContato($nome) {
        return $this->agendaDAO->consultarContato(strtoupper($nome));
    }
    
    public function excluirContato($id) {
        $this->agendaDAO->excluirContato($id);
    }
    
    public function atualizarContato($id, $nome, $telefone) {
        $this->agendaDAO->atualizarContato($id, strtoupper($nome), $telefone);
    }
    
    public function selecionarContato($id) {
        return $this->agendaDAO->selecionarContato($id);
    }
    
}
