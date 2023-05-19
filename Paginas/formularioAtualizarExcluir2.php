<!DOCTYPE html>
<html>
<head>
	<title>Atualização e Exclusão de Contato</title>
</head>
<body>
	<h1>Atualização e Exclusão de Contato</h1>
	<form action="../Forms/processaTodosFormularios.php" method="POST">
			<?php
				require_once("../DAO/agendaDAO.php");
				$agendaDAO = new AgendaDAO();
				$contato = $agendaDAO->consultarContato($_GET['nome']);
				if ($contato) {
					echo "<label for='nome'>Nome:</label>";
					echo "<input type='text' id='nome' name='nome' value='".$contato['nome']."' required><br><br>";
					echo "<label for='telefone'>Telefone:</label>";
					echo "<input type='text' id='telefone' name='telefone' value='".$contato['telefone']."' required><br><br>";
					echo "<input type='hidden' name='id' value='".$contato['id']."'>";
					echo "<input type='submit' name='acao' value='Atualizar'>";
					echo "<input type='submit' name='acao' value='Excluir'>";
				} else {
					echo "<p>Contato não encontrado!</p>";
				}
			?>
	</form>
</body>
</html>
