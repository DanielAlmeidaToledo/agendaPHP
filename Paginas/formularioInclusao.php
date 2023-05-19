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
    <title>Agenda - Inclusão</title>
</head>
<body>

    <div class="principal-content">
        <h1 class="principal-title">Formulário de inserção de registros na agenda</h1>
        <form action="../Forms/processaTodosFormularios.php" method="POST">
            <div class="label-input">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required><br><br>
            </div>
            <div class="label-input">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" required>
            </div>
            <button type="submit" name="inserir">inserir</button>
        </form>
    </div>

    <footer>
        <p>Desenvolvido por <a href="https://br.linkedin.com/in/danielalmeidadetoledo" target="_blank">Daniel Toledo</a></p>
    </footer>
    
</body>
</html>