<?php
    session_start();

    // Função para verificar as credenciais do usuário
    function autenticar($usuario, $senha)
    {
        if ($usuario === "admin" && $senha === "123") {
            return "admin";
        } elseif ($usuario === "user" && $senha === "123") {
            return "user";
        } else {
            return false;
        }
    }

    // Verificar se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Obter os valores do formulário
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        // Autenticar o usuário
        $perfil = autenticar($usuario, $senha);

        if ($perfil) {
            // Autenticação bem-sucedida, salvar o perfil na sessão
            $_SESSION["perfil"] = $perfil;

            // Redirecionar para a segunda página
            header("Location: ./Paginas/paginaPrincipal.php");
            exit();
        } else {
            // Autenticação falhou, exibir mensagem de erro
            $erro = "Login ou senha incorretos!";
        }
    }
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
    <link rel="stylesheet" href="./styles/global.css">
    <title>Login</title>
    <style>
        .alert-error {
            color: red;
            text-align: center;
            margin-top: 3rem;
        }
    </style>

</head>
<body>

    <div class="principal-content">
        <div class="principal-info">
            <h1 class="principal-title">Autenticação no sistema</h1>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="label-input">
                    <label for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario" minlength="1" required><br><br>
                </div>
                <div class="label-input">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required><br><br>
                </div>
                <button type="submit" name="entrar">Entrar</button>
            </form>
        </div>
        <!-- Alerta de erro no login -->
        <?php 
            if(isset($erro)) {
                echo "<div class='alert-error'><p>$erro</p></div>";
            }
        ?>
    </div>
    <footer>
        <p>Desenvolvido por <a href="https://br.linkedin.com/in/danielalmeidadetoledo" target="_blank">Daniel Toledo</a></p>
    </footer>

</body>

</html>