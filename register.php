<?php
// Configurações do banco de dados
include "./db/conexao.php"; // Inclua seu arquivo de conexão aqui

$msg_error = "";
$msg_success = "";

// Verificar se o formulário foi enviado
if (isset($_POST["loginUser"]) && isset($_POST["senhaUser"]) && isset($_POST["nomeUser"])) {
    $loginUser = mysqli_escape_string($conexao, $_POST["loginUser"]);
    $senhaUser = $_POST["senhaUser"];
    $nomeUser = mysqli_escape_string($conexao, $_POST["nomeUser"]);

    // Hash da senha
    $senhaUserHash = hash('sha256', $senhaUser);

    // Verificar se o login já existe
    $sql = "SELECT * FROM tbusuarios WHERE loginUser = '{$loginUser}'";
    $rs = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($rs) > 0) {
        $msg_error = "<div class='alert alert-danger mt-3'>
                        <p>Login já está em uso.</p>
                    </div>";
    } else {
        // Preparar e executar a inserção
        $sql = "INSERT INTO tbusuarios (loginUser, senhaUser, nomeUser) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $loginUser, $senhaUserHash, $nomeUser);

        if (mysqli_stmt_execute($stmt)) {
            $msg_success = "<div class='alert alert-success mt-3'>
                                <p>Registro bem-sucedido!</p>
                            </div>";
        } else {
            $msg_error = "<div class='alert alert-danger mt-3'>
                            <p>Erro ao registrar usuário. Tente novamente.</p>
                        </div>";
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-secondary">
    <div class="container">
        <?php
        if (isset($msg_success)) {
            echo $msg_success;
        } elseif (isset($msg_error)) {
            echo $msg_error;
        }
        ?>
         <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow rounded">
            <h2 class=" justify-content-center mb-4 " ><strong>Registro de Usuário</strong></h2>
                <div class="row justify-content-center mb-4">
                    <img src="./img/bo.jpg" alt="agenda" height="50px" width="50px">
                </div>
                <form class="needs-validation" action="register.php" method="post" novalidate>
                    <div class="form-group mb-4">
                        <label class="form-label" for="loginUser">Username</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input class="form-control" type="text" name="loginUser" id="loginUser" required>
                            <div class="invalid-feedback">
                                Informe o username.
                            </div>
                        </div>
                    </div>

                    <div class="form-group  mb-4">
                        <label class="form-label" for="senhaUser">Senha</label>
                        <div class="input-group mb-4" >
                            <span class="input-group-text">
                                <i class="bi bi-key-fill"></i>
                            </span>
                            <input class="form-control" type="password" name="senhaUser" id="senhaUser" required>
                            <div class="invalid-feedback">
                                Informe a senha.
                            </div>
                        </div>
                    <div class="form-group  mb-4">
                        <label class="form-label" for="nomeUser">Nome Completo</label>
                        <div class="input-group mb-4">
                            <input class="form-control" type="text" name="nomeUser" id="nomeUser" required>
                            <div class="invalid-feedback">
                                Informe o nome.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success w-100"><i class="bi bi-box-arrow-in-right"></i> Registrar</button>
                </form>
                <p class="mt-3"><a href="login.php">Já tem uma conta? Faça login aqui.</a></p>
            </div>
        </div>
    </div>

<!-- 
        <form action="register.php" method="post" class="mt-4">
            <div class="form-group">
                <label for="loginUser">Login:</label>
                <input type="text" id="loginUser" name="loginUser" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="senhaUser">Senha:</label>
                <input type="password" id="senhaUser" name="senhaUser" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nomeUser">Nome:</label>
                <input type="text" id="nomeUser" name="nomeUser" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>

        <p class="mt-3"><a href="login.php">Já tem uma conta? Faça login aqui.</a></p>
    </div> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script>
</body>
</html>
