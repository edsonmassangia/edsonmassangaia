<header>
    <h3><i class="bi bi-person-square"></i> Cadastro de Contacto</h3>
</header>

<div>
    <form class="needs-validation" action="index.php?menuop=inserir_contacto" method="post" novalidate>
        <div class="mb-3">
            <label class="form-label" for="nome">Nome:</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input class="form-control" type="text" name="nome" required>
                <div class="valid-feedback">
                    Está correcto.
                </div>
                <div class="invalid-feedback">
                    Por favor, introduza o nome.
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="email">E-mail:</label>
            <div class="input-group">
                <span class="input-group-text"> @</span>
                <input class="form-control" type="email" name="email" required>
            </div>
        </div>
        <div class="mb-3">
            <label lass="form-label" for="telefone">Telefone:</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input class="form-control" type="text" name="telefone" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="endereco">Endereço:</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                <input class="form-control" type="text" name="endereco" required>
            </div>
        </div>
        <div class="row">
        <div class="mb-3 col-3">
            <label class="form-label" for="sexo">Sexo:</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
            <select class="form-select" name="sexo" id="sexo" required>
                <option selected>Selecione o sexo do aluno</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
            </div>
        </div>
        <div class="mb-3 col-3">
            <label class="form-label" for="dataNasc">Data de Nascimento:</label>
            <div class="input-group">
            <span class="input-group-text"><i class="bi bi-calendar"></i></span> 
            <input class="form-control" type="date" name="dataNasc" required>
            </div>
        </div>
        </div>
     
        <div class="mb-3">
            <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>
