<?php
    session_start();
    echo "<h1>Pagina3</h1>";
    echo "ID: " . session_id() . "<br>";

    echo $_SESSION['username'] . "<br>";
    echo $_SESSION['senha'] . "<br>";
?>