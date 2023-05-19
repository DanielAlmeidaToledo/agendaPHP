<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/global.css">
    <title>Agenda - Atualização e Exclusão</title>
</head>
<body>
	<div class="principal-content">

		<h1 class="principal-title">Atualização e Exclusão de Contato</h1>

		<?php
			require_once("../DAO/agendaDAO.php");
			$agendaDAO = new AgendaDAO();
			$contatos = $agendaDAO->listarContatos();

			if ($contatos) {
				echo '<table class="table table-hover table-dark">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Nome</th>
								<th scope="col">Telefone</th>
								<th scope="col">Ações</th>
							</tr>
						</thead>
						<tbody>';

				foreach ($contatos as $contato) {
					echo '<tr>
							<th scope="row">' . $contato['id'] . '</th>
							<td>' . $contato['nome'] . '</td>
							<td>' . $contato['telefone'] . '</td>
							<td>
								<button type="button" class="btn btn-primary">Editar</button>
								<button type="button" class="btn btn-danger">Excluir</button>
							</td>
						</tr>';
				}

				echo '</tbody></table>';
			} else {
				echo "<p>Nenhum contato encontrado!</p>";
			}
		?>

	</div>
	
	<footer>
        <p>Desenvolvido por <a href="https://br.linkedin.com/in/danielalmeidadetoledo" target="_blank">Daniel Toledo</a></p>
    </footer>

</body>
</html>
