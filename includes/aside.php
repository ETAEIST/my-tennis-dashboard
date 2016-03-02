<aside>
	<?php

		if (logged_in()==true) {
			echo 'Logged in';
			echo '<br><a href="logoutScript.php">Logout</a>';

			include 'includes/widgets/loggedin.php';
			include 'includes/widgets/playersearch.php';
		} else {
			include 'includes/widgets/login.php';
		}
	?>
</aside>
