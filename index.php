<?php

require_once 'BO/agendaBO.php';

// Cria uma instância da classe AgendaBO
$agendaBO = new AgendaBO();

// Verifica se a página foi acessada há mais de 1,5 minutos e muda a cor de fundo da página
if (isset($_SESSION['ultimo_acesso']) && (time() - $_SESSION['ultimo_acesso'] > 90)) {
    $cores = array('red', 'blue', 'green');
    $cor = $cores[array_rand($cores)];
    echo '<body style="background-color: '.$cor.'">';
} else {
    echo '<body>';
}

// Armazena o horário do último acesso à página
$_SESSION['ultimo_acesso'] = time();

// Verifica qual página deve ser exibida
if (isset($_GET['pagina'])) {
    switch ($_GET['pagina']) {
        case 'inclusao':
            require_once 'Paginas/formularioInclusao.php';
            break;
        case 'consulta':
            require_once 'Paginas/formularioConsulta.php';
            break;
        case 'atualizacao':
            require_once 'Paginas/formularioAtualizarExcluir.php';
            break;
        case 'atualizacao2':
            require_once 'Paginas/formularioAtualizarExcluir2.php';
            break;
        default:
            require_once 'Paginas/paginaPrincipal.php';
            break;
    }
} else {
    require_once 'Paginas/paginaPrincipal.php';
}
