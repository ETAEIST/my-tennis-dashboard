<?php

function is_admin(PDO $connection, $user_id) {

	$resultObject=$connection->prepare("SELECT COUNT(Permission) as level FROM Users WHERE User_id=:user_id AND Permission = 2");
	$resultObject->execute(array(':user_id' => $user_id));
	$result=$resultObject->fetch(PDO::FETCH_ASSOC);
	if ((int)$result['level'] == 1) {
		return true;
	} else { 
		return false;
	}
}

/*	Parametros: user_id, p1, p2, ... , pn 
	Returns: array
	- Recebe um user_id e o nome dos campos que pretendemos obter da base de dados.
	- Consulta a base de dados sobre o valor dos campos com esse nome, para o user_id fornecido.
	- Arruma o valor dos campos (informacao do user) num array e devolve esse array. */
function user_data($user_id) {
	$data=array();
	$user_id=(int)$user_id;
	
	$func_num_args=func_num_args(); // Esta funcao pode ser chamada com N parametros
	$func_get_args=func_get_args();

	if ($func_num_args > 1) {
		unset($func_get_args[0]);
	}

	//print_r($func_get_args);
}


/* - Ajuda à legibilidade do código em geral. */
function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

/* - Uma das condições de teste quando o user submete um formulário de login */
function user_exists (PDO $connection, $Username) {
	$resultObject=$connection->prepare("SELECT COUNT(user_id) as userCount FROM Users WHERE Username=:username");
	$resultObject->execute(array(':username' => $Username));
	$result=$resultObject->fetch(PDO::FETCH_ASSOC);	
	if (empty($result) == false) {
		if($result['userCount']==0) {
			echo NO_USER;
			return false;
		} else {
			echo YES_USER;
			return true;
		}
	}
}


function user_id_from_username ($connection, $Username) {
	$resultObject=$connection->query("SELECT User_id FROM Users WHERE Username='$Username'");
	$result=$resultObject->fetch(PDO::FETCH_ASSOC);
	echo $result['User_id'];
	return $result['User_id'];
}

/*	Parametros: Objecto da conexao ao MYSQL, Username, Password
	Returns: Boolean
	- Interroga a base de dados sobre uma fila que contenha o par Username/Password fornecido. */
function login (PDO $connection, $Username, $Password) {
	$user_id=user_id_from_username($connection, $Username);

	$Password=md5($Password);
	$resultObject=$connection->query("SELECT COUNT(User_id) as matches FROM Users WHERE Username='$Username' AND Password='$Password'");
	$result=$resultObject->fetch(PDO::FETCH_ASSOC);

	
	if ($result['matches']==1) { return $user_id; }
	else { return false; }
}

?>
