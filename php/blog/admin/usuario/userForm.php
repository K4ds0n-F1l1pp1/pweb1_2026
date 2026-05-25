<?php
include '../header.php';

include_once '../database/db.class.php';

$db = new db('usuarios');

$success = '';
$error = '';

if (!empty($_GET['id']))
{
    $data = $db->find($_GET['id']);
}

if (!empty($_POST))
{
    try {
        $db->store($_POST);

        $success = "Registro Salvo com Sucesso!";
        
        redirect('./userList.php', 750);
    } catch (Exception $e) {
        throw new Exception("Erro ao inserir: ", $e->getMessage());
    }

}

?>

<div class="row">
    <div class="col">
        <a href="./userList.php" class="btn btn-success">Voltar</a>
    </div>
</div>

<div class="row">
    <?php actionMessage($success, $error); ?>
    <div class="col">
        <form action="userForm.php" method="POST">
            <div class="col-6">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" class="form-control" maxlength="35" required> 
            </div>

            <div class="col-6">
                <label for="email">E-mail: </label>
                <input type="email" name="email" class="form-control" required> 
            </div>

            <div class="col-6">
                <label for="telefone">Telefone: </label>
                <input type="text" name="telefone" class="form-control" required> 
            </div>

            <div class="col mt-4">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="./userList.php" class="btn btn-danger">Voltar</a>
            </div>
        </form>
    </div>
</div>

<?php

include '../footer.php';

?>