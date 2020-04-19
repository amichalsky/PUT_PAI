<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP</title>
		<meta charset='UTF-8' />
	</head>
	<body>
		<?php
            require("fun.php");
            
			if(isSet($_GET["makeCookie"])){
				setcookie("Cookie2000", "123", time() + ($_GET["time"]), "/");
				echo "You made a cookie!";
			}
		?>
        <br>
        <a href="index.php">back</a>
	</body>
</html>