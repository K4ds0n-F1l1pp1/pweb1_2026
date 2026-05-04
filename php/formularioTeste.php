<?php
include './header.php';
?>

<div class="col">
    <form action="resultadoFormAluno.php" method="get">
        <div class="col-6">
            <label for="nome">Nome: </label>
            <input type="text" name="nomeAluno" class="form-control" maxlength="35"> 
        </div>

        <div class="col-6">
            <label for="nome">E-mail: </label>
            <input type="email" name="emailAluno" class="form-control"> 
        </div>

        <div class="col mt-4">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</div>

<?php
include './footer.php';
?>