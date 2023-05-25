<?php
    session_start();
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
    <link rel="stylesheet" href="../styles/global.css">
    <title>Agenda - Consulta</title>
</head>
<body>

    <div class="principal-content">

        <h1 class="principal-title">Consulta</h1>
        <form action="../Forms/processaTodosFormularios.php" method="GET">
            <div class="label-input">
                <label for="id">ID do contato:</label>
                <input type="text" name="id" id="id" required>
            </div>
            <button type="submit" name="consulta" data-bs-toggle="modal" data-bs-target="#consultaModal">Consultar</button>
        </form>

        <?php
            // Verifica se a variável de sessão existe
            if (isset($_SESSION['contacts'])) {
            $contacts = $_SESSION['contacts'];
                // Verifica se a variável de sessão não está vazia
                if (!empty($contacts)) {

                    echo "<div class='result-card'>
                            <img src='../Media/icon-found.png' alt='Usuário'>
                            <div> 
                                <p><strong>Id:</strong> " . $contacts['id'] . "</p>
                                <p><strong>Nome:</strong> " . $contacts['nome'] . "</p>
                                <p><strong>Telefone:</strong> " . $contacts['telefone'] . "</p>
                            </div>
                            <br>
                         </div>";

                // Caso a variável de sessão esteja vazia, exibe mensagem de erro
                } else  { 

                    echo "<div class='result-card not-found'>
                            <p><strong>Aluno não encontrado!</strong></p>
                            <br>
                        </div>";
                }

            // Realiza a limpeza da variável de sessão
            unset($_SESSION['contacts']);
            }
        ?>    

    </div>

    <a href="../Paginas/paginaPrincipal.php" class="return-page">
        <img src="../Media/back.png" alt="Voltar">
    </a>

    <footer>
        <p>Desenvolvido por <a href="https://br.linkedin.com/in/danielalmeidadetoledo" target="_blank">Daniel Toledo</a></p>
    </footer>

</body>
</html>
