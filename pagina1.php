<?php
    session_start();
    echo "<h1>Pagina1 </h1>";
    echo "ID: " . session_id() . "<br>";

    $_SESSION['username'] = "edson";
    $_SESSION['senha'] = "123456";

    echo $_SESSION['username'] . "<br>";
    echo $_SESSION['senha'] . "<br>";
?>