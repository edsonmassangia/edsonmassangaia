$(document).ready(function(){
    // alert("Testando")
    //  Atualiza fag Favoriro Sim ou Não'
    $('.fag').click(function(){
        var id = $(this).prop("id");
        var titulo = $(this).prop("title");

        if(titulo === "Favorito"){
            $(this).html('<i class="bi bi-star"></i>').prop("title", "Não Favorito");
            $.get.JSON('./paginas/contactos/atualizarContactoFavorito.php?id='+id+'&fag=0');
        }else{
            $(this).html('<i class="bi bi-star"></i>').prop("title", "Favorito");
            $.get.JSON('./paginas/contactos/atualizarContactoFavorito.php?id='+id+'&fag=1');
        }
    })
})