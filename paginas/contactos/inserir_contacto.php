<header>
    <h3>Inserir Contacto</h3>
</header>
<?php
   
   $nome = strip_tags(mysqli_real_escape_string($conexao,$_POST["nome"]));
   $email = strip_tags(mysqli_real_escape_string($conexao,$_POST["email"]));
   $telefone = strip_tags(mysqli_real_escape_string($conexao,$_POST["telefone"]));
   $endereco = strip_tags(mysqli_real_escape_string($conexao,$_POST["endereco"]));
   $sexo = strip_tags(mysqli_real_escape_string($conexao,$_POST["sexo"]));
   $dataNasc = strip_tags(mysqli_real_escape_string($conexao,$_POST["dataNasc"]));
   $userID = $_SESSION["id"];

    $sql = "INSERT INTO contactos (
        user_id,
        nome,
        email,
        telefone,
        endereco,
        sexo,
        dataNasc
        ) 
        VALUES 
        (
        '{$userID}',
        '{$nome}',
        '{$email}',
        '{$telefone}',
        '{$endereco}',
        '{$sexo}',
        '{$dataNasc}'
        )
        ";
    $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta. " . mysqli_error($conexao));

    echo "O registro foi inserido com sucesso!";
?>