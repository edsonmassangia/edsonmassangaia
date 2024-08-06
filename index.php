<?php
    include("./db/conexao.php");
    session_start();
    if(isset($_SESSION["id"]) and isset($_SESSION["loginUser"]) and isset($_SESSION["senhaUser"])){
        $id = $_SESSION["id"];
        $loginUser = $_SESSION["loginUser"];
        $senhaUser = $_SESSION["senhaUser"];
        $nomeUser = $_SESSION["nomeUser"];

        $sql = "SELECT * FROM tbusuarios WHERE loginUser = '{$loginUser}' and senhaUser = '{$senhaUser}'";
        $rs = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($rs);
        $linha = mysqli_num_rows($rs);

        if($linha == 0){
            session_unset();
            session_destroy();
            header('Location: login.php');
            exit();
        }
    }else{
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Agendador 1.0</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

   <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="bg-dark">
        <div class="container">
        <div>
        <h1 class="navbar-nav w-100 justify-content-end">Bem-vindo, <?php echo $_SESSION["nomeUser"]; ?>!</h1>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navabar-brand" href="#">
               <img width="90px" src="img/agenda.jpg" alt="Sis_agendador">
        </a>
           <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
           
            <ul class="navbar-nav mr-auto">

                <li class="nav-item active"><a class="nav-link" href="index.php?menuop=home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?menuop=contactos">Contactos</a></li>
                <li class="nav-item"> <a class="nav-link" href="index.php?menuop=tarefas">Tarefas</a> </li>
                <li class="nav-item"><a class="nav-link" href="index.php?menuop=eventos">Eventos</a></li>
             </ul>
            <div class="navbar-nav w-100 justify-content-end">
                <a href="logout.php" class="nav-link">
                    <i class="bi bi-person"></i>
                    <?=$nomeUser?>  Sair <i class="bi bi-box-arrow-right"></i>
                </a>
            </div>
            </div>
        </nav>
        </div>
    </header>
    <main>
        <div class="container">
    <?php
        $menuop = (isset($_GET["menuop"]))? $_GET["menuop"] : "home";
        switch ($menuop) {
            case 'home':
                include("paginas/home/home.php");
            break;
            case 'contactos':
            include("paginas/contactos/contactos.php");
            break;
            case 'cad_contacto':
                include("paginas/contactos/cad_contacto.php");
                break;
            case 'inserir_contacto':
                include("paginas/contactos/inserir_contacto.php");
            break;
            case 'editar_contacto':
                include("paginas/contactos/editar_contacto.php");
            break;
            case 'excluir_contacto':
                include("paginas/contactos/excluir_contacto.php");
            break;
            case 'atualizar_contacto':
                include("paginas/contactos/atualizar_contacto.php");
            break;
            case 'eventos':
                include("paginas/eventos/eventos.php");
            break;
            case 'cad_evento':
                include("paginas/eventos/cad_eventos.php");
            break;
            case 'inserir_evento':
                include("paginas/eventos/inserir_eventos.php");
            break;
            case 'editar_evento':
                include("paginas/eventos/editar_eventos.php");
            break;
            case 'atualizar_evento':
                include("paginas/eventos/atualizar_eventos.php");
            break;
            case 'excluir_evento':
                include("paginas/eventos/excluir_eventos.php");
            break;
            case 'tarefas':
                include("paginas/tarefas/tarefas.php");
            break;
            case 'cad_tarefa':
                include("paginas/tarefas/cad_tarefas.php");
            break;
            case 'inserir_tarefa':
                include("paginas/tarefas/inserir_tarefas.php");
            break;
            case 'editar_tarefa':
                include("paginas/tarefas/editar_tarefas.php");
            break;
            case 'atualizar_tarefa':
                include("paginas/tarefas/atualizar_tarefas.php");
            break;
            case 'excluir_tarefa':
                include("paginas/tarefas/excluir_tarefas.php");
            break;
            default:
                include("paginas/home/home.php");
                break;
           }
    ?>
    </div>
    </main>
    <footer class="container-fluid fixed-bottom bg-dark">

           <div class="text-center">Sistema Agendador V 1.0</div>

    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script> 
    <script src="./js/jquery.js"></script>
    <script src="./js/jquery.form.js"></script>
    <script src="./js/upload.js"></script>
    <script src="./js/javascript.js"></script>

</body>
</html>