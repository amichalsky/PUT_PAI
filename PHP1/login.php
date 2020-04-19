<?php
    session_start();
    require("fun.php");

    $login = test_input($_POST["login"]);
    $pass = test_input($_POST["pass"]);

    if($login == "$osoba1->login" && $pass == $osoba1->haslo) {
        $_SESSION["zalogowanyImie"] = $osoba1->imieNazwisko;
        $_SESSION["zalogowany"] = 1;
        header("Location: user.php");
    }
    else if($login == $osoba2->login && $pass == $osoba2->haslo) {
        $_SESSION["zalogowanyImie"] = $osoba2->imieNazwisko;
        $_SESSION["zalogowany"] = 1;
        header("Location: user.php");
    }
    else {
        header("Location: index.php");
    }
?>