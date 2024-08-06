<?php
$id = $_GET["id"];

$sql =  "SELECT * FROM contactos WHERE id = {$id}";
$rs = mysqli_query($conexao,$sql) or die("Erro ao recuperar os dados de registro " . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>

<header>
    <h3>Editar Contacto</h3>
</header>
<div class="row">
<div class="col-6">
    <form action="index.php?menuop=atualizar_contacto" method="post">
    <div class="mb-3 col-3">
            <label class="form-label" for="id">ID:</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-key-fill"></i>
                </span>
                <input class="form-control" type="text" name="id" value="<?=$dados["id"]?>" readonly>
            </div>
        </div>
        <div class="mb-3">
            <labe class="form-label" for="nome">Nome:</label>
              <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-person-fill"></i>
                </span>
                <input class="form-control"  type="text" name="nome" value="<?=$dados["nome"]?>">
            </div>
        </div>

        <div class="mb-3">
            <labe class="form-label" for="email">E-mail:</label>
            <div class="input-group">
                <span class="input-group-text">@</i>
                </span>
                <input class="form-control"  type="email" name="email" value="<?=$dados["email"]?>">
            </div>
        </div>
        <div class="mb-3">
            <labe class="form-label" for="telefone">Telefone:</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-telephone"></i>
                </span>
                <input class="form-control"  type="text" name="telefone" value="<?=$dados["telefone"]?>">
            </div>
        </div>
        <div class="mb-3">
            <labe  class="form-label" for="endereco">Endereço:</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-mailbox2"></i>
                </span>
                <input class="form-control" type="text" name="endereco" value="<?=$dados["endereco"]?>">
            </div>
        </div>
        <div class="row mb-3" >
        <div class="mb-3 " >  
            <label class="form-label" for="sexo">Sexo:</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-gender-ambiguous"></i>
                </span>
                <select class="form-select" name="sexo" id="sexo">
                <option <?php echo ($dados['sexo']=='')?'selected':'' ?> value="">Selecione o genero do contacto</option>
                <option <?php echo ($dados['sexo']=='M')?'selected':'' ?>  value="M">Masculino</option>
                <option <?php echo ($dados['sexo']=='F')?'selected':'' ?>  value="F">Feminino</option>
                <option <?php echo ($dados['sexo']=='O')?'selected':'' ?>  value="O">Outros</option>
            </select>
            </div>
        </div>
        <div class="mb-3" >
            <label class="form-label" for="dataNasc">Data de Nasc:</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-calendar"></i>
                </span>
                <input class="form-control" type="date" name="dataNasc" value="<?=$dados["dataNasc"]?>">
            </div>
        </div>
        </div>
        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>
<div class="col-6" >
    <?php
    if($dados["foto_contacto"]=="" || !file_exists('./paginas/contactos/fotos-contactos/'. $dados["foto_contacto"])){
        $nomeFoto ="sem_foto.png";
    }else{
        $nomeFoto = $dados["foto_contacto"];
    }
    ?>
  
  <div class="mb-3">
      <img id="foto-contacto" class="img-fluid img-thumbnail" width="200"  src="./paginas/contactos/fotos-contactos/<?=$nomeFoto?>" alt="foto do contacto">
    </div>

    <div class="mb-3">
        <button class="btn btn-info " id="btn-editar-foto">
            <i class="bi bi-camera-fill">Editar Foto</i>
        </button>
    </div>
    <div id="editar-foto">
    <form id="form-upload-foto" class="mb-3" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id?>">
        <label class="form-label" for="arquivo">Selecione o arquivo da imagem da foto</label>
        <div class="input-group">
           <input class="form-control" type="file" name="arquivo" id="arquivo">
           <input id="btn-enviar-foto" class="btn btn-secondary" type="submit" value="Enviar">
       </div>

    </form>
    <div id="mensagem" class="mb-3 alert alert-success">
        Mensagem aqui 
    </div>
    <div id="preloader" class="progress">
        <div id="barra"
        class="progress-bar bg-danger" 
        role="progressbar" 
        style="width: 0%" 
        aria-valuenow="0" 
        aria-valuemin="0" 
        aria-valuemax="100" >0%</div>
    </div>
    </div>
    
</div>
</div>

