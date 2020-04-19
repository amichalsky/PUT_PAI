<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset='UTF-8' />
    </head>
    <body>
        <a href="index.php">Index</a>

        <?php
            echo "<h1>Zalogowany</h1>";
            
            if($_SESSION["zalogowany"] != 1) {
                header("Location: index.php");
            }
            else {
                echo "Imię i nazwisko: " . $_SESSION['zalogowanyImie'];
            }

            if(isSet($_POST["upload"])) {
                $currentDir = getcwd();
                $uploadDirectory = "\zdjeciaUzytkownikow\\";
                $fileName = $_FILES['myfile']['name'];
                $fileSize = $_FILES['myfile']['size'];
                $fileTmpName = $_FILES['myfile']['tmp_name'];
                $fileType = $_FILES['myfile']['type'];
                
                $uploadPath = $currentDir.$uploadDirectory.$fileName;
                
                if(move_uploaded_file($fileTmpName, $uploadPath)) {
                    echo "Poprawnie załadowano zdjęcie";
                }
            }

        ?>

        <form action='user.php' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <legend>Image upload:</legend>
                <input type="file" name="myfile">
                <input type="submit" value="upload" name="upload">
            </fieldset>
        </form>

        <form action="index.php" method="post">
			<input type="submit" value="wyloguj" name="wyloguj">
		</form>
    </body>
</html>