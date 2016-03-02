<?php 
	include 'includes/overall/header.php';

	$Jogadores=$connection->query("SELECT * FROM Jogador");

	$numJogadores = $Jogadores->rowCount();

	echo("<p>$numJogadores jogadores na base de dados:</p>\n");

	if (is_admin($connection, $_SESSION['user_id']) === true) { echo '<p><a href="novojogador.php">+</a></p>'; }


	echo("<table border= \"1\">\n");
		echo("<tr><td>Nome</td><td>Mail</td><td>Telefone</td></tr>\n");
		foreach($Jogadores as $Jogador) {
			echo("<tr><td>");
			echo($Jogador["Nome"]);
			echo("</td><td>");
			echo($Jogador["Mail"]);
			echo("</td><td>");
			echo($Jogador["Telefone"]);
			echo("</td></tr>");
		}
	echo("</table>");

?>
	
<?php include 'includes/overall/footer.php'; ?>
