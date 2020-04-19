<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <a href="user.php">user</a>

        <?php
            echo "<h1> Nasz system </h1>";

            if(isSet($_POST["wyloguj"])) {
				$_SESSION["zalogowany"] = 0;
            }
            
            if(isSet($_COOKIE["Cookie2000"])){
				echo "Wartość ciasteczka: " . $_COOKIE["Cookie2000"];
			}
        ?>
        <fieldset>
  		<legend>Log in</legend>
        <form action = "login.php" method = "post">
            Login: <input type = "text" name = "login"><br>
            Hasło: <input type = "password" name = "pass"><br>
            <input type = "submit" name = "submit" value = "Zaloguj się">
        </form>
        </fieldset>

        <fieldset>
  		<legend>Cookie maker</legend>
		<form action="cookie.php" method="get">
			Life time: <input type="number" name="time"><br>
			<input type="submit" name="makeCookie" value="make cookie">
		</form>
		</fieldset>

    </body>
</html>