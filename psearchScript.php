<?php
	include 'core/init.php';
	include 'includes/head.php';

	if (empty ($_GET) == false) {
		$keyword = $_GET['keyword'];
		$special_chars=array("ã", "á", "ó");
		$replacement_chars=array("a","a","o");
		$keyword=str_replace($special_chars, $replacement_chars, $keyword);
		echo $keyword;

		/*explode (" ", $_GET['keyword']); ----> Servirá para adicionar Multiple Keyword Search support no futuro */

		$query = "SELECT * FROM Jogador WHERE Nome LIKE :key OR Mail LIKE :key";
		$params = array('key' => "%$keyword%");
		$stmt = $connection->prepare($query);
		$stmt->execute($params);

		while ($result =$stmt->fetch(PDO::FETCH_ASSOC)) {
			print_r($result);
		}

		$stmt->debugDumpParams();
	}
		
?>
