<?php
    // Defina as cores disponíveis
    $colors = array('#FF0000', '#00FF00', '#0000FF', '#FFFF00', '#FF00FF', '#00FFFF', '#FFA500', '#800080', '#008000', '#FFC0CB');

    // Defina o tempo limite em segundos (1,5 minutos = 90 segundos)
    $limitTime = 90;

    // Verifique se já foi definida uma cor de fundo no cookie e se é uma cor válida
    if (isset($_COOKIE['background_color']) && in_array($_COOKIE['background_color'], $colors)) {
        $backgroundColor = $_COOKIE['background_color'];
    } else {
        // Gere uma nova cor de fundo aleatória
        $backgroundColor = $colors[array_rand($colors)];
        setcookie('background_color', $backgroundColor, time() + $limitTime);
    }

    // Verifique se o último acesso foi há mais de 1,5 minutos
    if (isset($_COOKIE['last_acess']) && (time() - $_COOKIE['last_acess'] > $limitTime)) {
        // Gere uma nova cor de fundo aleatória
        $backgroundColor = $colors[array_rand($colors)];
        setcookie('background_color', $backgroundColor, time() + $limitTime);
    }

    // Atualize o tempo do último acesso
    setcookie('last_acess', time(), time() + $limitTime);
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
    <link rel="stylesheet" href="../styles/paginaPrincipal.css">
    <link rel="stylesheet" href="../styles/global.css">
    <title>Agenda - Daniel Toledo</title>

    <style>
        .last-visit {
            background-color: <?php echo $backgroundColor; ?>;
            position: absolute;
            inset: auto auto 1rem 1rem;
            border-radius: 10rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .last-visit-image {
            padding: 1rem; 
            width: 2rem;
        }
    </style>
</head>
<body>

    <div class="principal-content">
        <div class="principal-info">
            <h1 class="principal-title">Menu Principal</h1>
            <div class="principal-buttons">
                <a class="principal-link" href="formularioInclusao.php">Incluir</a>
                <a class="principal-link" href="formularioConsulta.php">Consultar</a>
                <a class="principal-link" href="formularioAtualizarExcluir.php">Atualizar e Excluir</a>
            </div>
        </div>
        <div class="principal-image">
            <img class="principal-image" src="../Media/img1.svg" alt="Imagem de uma agenda">
        </div>
    </div>

    <div class="last-visit">
        <img class="last-visit-image" src="../Media/timer.png" alt="Tempo">
    </div>

    <footer>
        <p>Desenvolvido por <a href="https://br.linkedin.com/in/danielalmeidadetoledo" target="_blank">Daniel Toledo</a></p>
    </footer>
    
</body>
</html>