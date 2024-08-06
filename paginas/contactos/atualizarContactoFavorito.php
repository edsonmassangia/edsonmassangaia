<?php
    include("../../db/conexao.php");
    $id = $_GET["id"];
    $fag = $_GET["fag"];

    $sql = "UPDATE contactos SET fag = {$fag} WHERE id = {$id}";

    mysqli_query($conexao, $sql);
?>