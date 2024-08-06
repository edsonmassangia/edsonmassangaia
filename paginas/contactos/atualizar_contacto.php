<header>
    <h3>Atualizar Contacto</h3>
</header>

<?php
   $id = mysqli_real_escape_string($conexao,$_POST["id"]);
   $nome = mysqli_real_escape_string($conexao,$_POST["nome"]);
   $email = mysqli_real_escape_string($conexao,$_POST["email"]);
   $telefone = mysqli_real_escape_string($conexao,$_POST["telefone"]);
   $endereco = mysqli_real_escape_string($conexao,$_POST["endereco"]);
   $sexo = mysqli_real_escape_string($conexao,$_POST["sexo"]);
   $dataNasc = mysqli_real_escape_string($conexao,$_POST["dataNasc"]);

   $sql = "UPDATE contactos SET nome = '{$nome}', email = '{$email}', telefone = '{$telefone}', endereco = '{$endereco}', sexo = '{$sexo}', dataNasc = '{$dataNasc}' WHERE id = '{$id}'";

   mysqli_query($conexao,$sql) or die("Erro ao executar a consulta. " .mysqli_error($conexao));
   echo "O registro foi atualizado com sucesso!";
?>