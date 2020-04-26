<?php  
    session_start();

    $link=mysqli_connect("localhost","scott","tiger","instytut");

    if(!$link) {
        printf("Connectfailed:%s\n",mysqli_connect_error());
        exit();
    }

    $sql="SELECT* FROM pracownicy";
    $result=$link->query($sql);
    foreach($result as $v) {
        echo $v["ID_PRAC"]."".$v["NAZWISKO"]."<br/>";
    }

    $result->free();
    $link->close();

    printf('<a href="form06_post.php">Dodaj pracownika</a>');

    if(isSet($_SESSION['SUCCESS'])) {
        if($_SESSION['SUCCESS'] == 1) {
            printf("Poprawnie dodano pracownika");
            $_SESSION['SUCCESS'] = 0;
        }
    }

?>