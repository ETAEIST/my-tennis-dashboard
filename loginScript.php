<?php
	include 'core/init.php';
	include 'includes/head.php';

	if (empty ($_POST) == false) {
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];

		if (empty($Username) == true || empty($password) == true) {
			echo EMPTY_FIELD;	
		} else if (user_exists ($connection, $Username) == false ) {
			echo USER_NO_EXISTS;
		} else {
			$login=login($connection, $Username, $Password);
			if ($login==false) {
				echo Password_Incorrect;
				//erro
			} else {
				$_SESSION['user_id']=$login;
				header('Location: index.php'); // redirect to home
				exit();
			}
		}
		
				
	}

?>
