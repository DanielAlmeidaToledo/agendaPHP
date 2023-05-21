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
		<form action="Forms/processaTodosFormularios.php" method="GET">
			<div class="label-input">
				<label for="id">ID do contato:</label>
				<input type="text" name="id" id="id" required>
			</div>
			<button type="submit" name="consulta" data-target="#consultaModal' . $contato['id'] . '">Consultar</button>
		</form>

	</div>

    <!-- <? 
        // Modal de consulta
        echo '<div class="modal fade" id="consultaModal' . $contato['id'] . '" tabindex="-1" role="dialog" aria-labelledby="consultaModalLabel' . $contato['id'] . '" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="consultaModalLabel' . $contato['id'] . '">Consulta Contato</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Id: "' . $contato['id'] . '"</p>
                            <p>Nome: "' . $contato['nome'] . '"</p>
                            <p>Telefone: "' . $contato['telefone'] . '"</p>
                            <div class="modal-btn">
                                <button type="submit" class="btn btn-cancel" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn" name="excluir">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    
    ?> -->

	<a href="../Paginas/paginaPrincipal.php" class="return-page">
        <img src="../Media/back.png" alt="Voltar">
    </a>

	<footer>
        <p>Desenvolvido por <a href="https://br.linkedin.com/in/danielalmeidadetoledo" target="_blank">Daniel Toledo</a></p>
    </footer>

</body>
</html>
