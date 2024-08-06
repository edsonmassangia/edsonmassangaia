<header>
    <h3>Excluir Contacto</h3>
</header>
<?php
$id = mysqli_real_escape_string($conexao,$_GET["id"]);
$sql = "DELETE FROM contactos WHERE id = '{$id}'";

mysqli_query($conexao,$sql) or die("Erro ao excluir o registo. " . mysqli_error($conexao));
echo'Registo excluído com sucesso'
?>