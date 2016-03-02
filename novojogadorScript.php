<?php
	include 'core/init.php';
	if (is_admin($connection, $_SESSION['user_id']) === false) { echo 'Not allowed'; } else {
		echo 'POST ARRAY:';
		print_r($_POST);
		echo 'Lateraliadede' . $_POST['Lateralidade'];
		if (empty ($_POST) == false) {
		
			$Nome = $_POST['Nome'];
			$Mail = $_POST['Mail'];
	
			if (empty($Nome) == true || empty($Mail) == true) {
				echo 'Campos Obrigatórios não preenchidos';
				header('Location: jogadores.php');
				exit();
			} else {
				$sql="INSERT INTO Jogador (Nome, Mail, Telefone, Desde, Lateralidade, Raquete) VALUES (:nome, :mail, :telefone, :desde, :lateralidade, :raquete)";

				$infojogador=array(':nome' => $_POST['Nome'], ':mail' => $_POST['Mail'], ':telefone'=>$_POST['Telefone'], ':desde'=>$_POST['Desde'], ':lateralidade'=>intval($_POST['Lateralidade']), ':raquete'=>$_POST['Raquete']);
			
				foreach ($infojogador as $fieldname => $field) {
					if (is_int($field)==false && empty($field) == true) { $infojogador[$fieldname]=NULL; }
				}
			
				$resultObject=$connection->prepare($sql);
				$resultObject->execute($infojogador);
			
				header('Location: jogadores.php');
			}
		}	
	}
?>
			
