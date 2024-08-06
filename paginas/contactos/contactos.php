<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    <h3><i class="bi bi-person-square"></i> Contactos</h3>
</header>
<div>
    <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad_contacto"><i class="bi bi-person-fill-add"></i> Novo contacto</a>
</div>
<div>
    <form action="index.php?menuop=contactos" method="post">
        <div class="input-group">
        <input class="form-control" type="text" name="txt_pesquisa">
        <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
       
    </form>
</div>
<div class="tabela">
<table class="table table-dark table-striped table-bordered table-sm ">
    <thead>
        <tr>
            <th>
                <i class="bi bi-star-fill"></i>
            </th>
           <!-- <th>ID</th> -->
           <th>Nome</th>
           <th>E-Mail</th>
           <th>Telefone</th>
           <th>Endereço</th>
           <th>Sexo</th>
           <th>Data de Nasc.</th>
           <th>Editar</th>
           <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
    <?php 

        $quantidade = 10;
         $userID = $_SESSION["id"];

        $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;

        $inicio = ($quantidade * $pagina) - $quantidade; 

        $txt_pesquisa = (isset($_POST["txt_pesquisa"]))?$_POST ["txt_pesquisa"]:"";

        /* TODO=======>>>
            if-else- to check the TXT_PESQUISA value.
            if it is a number then we will call the numeric /{where id} query
            else we will call the string query
        */
        $sql = "SELECT
        id,
        upper(nome) AS nome,
        lower(email) AS email,
        telefone,
        upper(endereco) AS endereco,
        CASE
	        WHEN sexo= 'F' THEN 'FEMININO'
	        WHEN sexo= 'M' THEN 'MASCULINO'
        ELSE
	        'NÃO ESPECIFICADO'
        END AS sexo,
        DATE_FORMAT(dataNasc,'%d/%m/%y') AS dataNasc,
        fag
        FROM contactos c
        WHERE
        c.user_id = $userID and nome LIKE '%{$txt_pesquisa}%' ORDER BY fag DESC, nome ASC LIMIT $inicio, $quantidade " ;
        
        // c.user_id = 0 and  c.id ='{$txt_pesquisa}'
        
        $rs = mysqli_query($conexao,$sql) or die("Erro ao executar!" . mysqli_error($conexao));
        while($dados= mysqli_fetch_assoc($rs)){


    ?>
        <tr>
            <td>
               
                <?php
                    if($dados["fag"]==1){
                        echo"<a href=\"#\" class=\"fag link-warning\" title=\"Favorito\" id=\"{$dados["id"]}\">
                        <i class=\"bi bi-star-fill\"></i>
                        </a>";  
                    }else{
                        echo"<a href=\"#\" class=\"fag link-warning\" title=\" Não Favorito\" id=\"{$dados["id"]}\">
                        <i class=\"bi bi-star-fill\"></i>
                        </a>";   
                    }
                ?>
            </td>
            <!-- <td><?=$dados["id"] ?></td> -->
            <td class='text-nowrap'><?=$dados["nome"] ?></td>
            <td class='text-nowrap'><?=$dados["email"] ?></td>
            <td class='text-nowrap'><?=$dados["telefone"] ?></td>
            <td class='text-nowrap'><?=$dados["endereco"] ?></td>
            <td class='text-nowrap'><?=$dados["sexo"] ?></td>
            <td class='text-nowrap'><?=$dados["dataNasc"] ?></td>
            <td class='text-center'><a class='btn btn-outline-warning btn-sm' href="index.php?menuop=editar_contacto&id=<?=$dados["id"] ?>"><i class="bi bi-pencil-square"></i></a></td>
            <td class='text-center'><a class='btn btn-outline-danger btn-sm'href="index.php?menuop=excluir_contacto&id=<?=$dados["id"] ?>"><i class="bi bi-trash-fill"></i></a></td>
        </tr>
    <?php
        }
    ?>
    </tbody>
</table>
</div>

<ul class="pagination justify-content-center">
<?php

$sqlTotal= "SELECT id FROM contactos";
$qrTotal = mysqli_query($conexao,$sqlTotal) or die(mysqli_error($conexao));
$numTotal = mysqli_num_rows($qrTotal);

$totalPagina = ceil($numTotal / $quantidade);

echo "<li class='page-item'><span class='page-link'>Total de Registos: " . $numTotal . " </span></li>";

echo '<li class="page-item"><a class="page-link" href="?menuop=contactos&pagina=1">Primeira Pagina </a></li>';

if($pagina>6){ 
    ?>
    <li class="page-item"><a class="page-link" href="?menuop=contactos&pagina=<?php echo $pagina-1?>"><<</a></li>
    <?php
}

for($i=1;$i<=$totalPagina;$i++){
    
   if($i>=($pagina-5) && $i <= ($pagina+5)){
            if($i== $pagina){
                echo "<li class='page-item active'><span class='page-link' href='#'>$i</span></li>";
            }else{
                 echo"<li class='page-item'><a class='page-link'href=\"?menuop=contactos&pagina={$i}\">{$i} </a></li>"; 
            }
   }
}

if($pagina<$totalPagina-5){
    ?>
        <li class='page-item'><a class= 'page-link' href="?menuop=contactos&pagina=<?php echo $pagina+1?>">>></a></li>
    <?php
}

echo "<li class='page-item'><a class='page-link' href=\"?menuop=contactos&pagina=$totalPagina\"> Ultima Pagina</a></li>";
?>
</ul>
</body>
</html>