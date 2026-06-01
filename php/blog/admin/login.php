<?php
include 'header.php';

include_once './database/db.class.php';

$db = new db('usuarios');

$success = "";
$errors = [];
$data = null;

if (!empty($_GET['id']))
{
    $data = $db->find($_GET['id']);
}

if (!empty($_POST))
{
    $data = (object) $_POST;

    try {
        if (empty($_POST['senha']))
        {
            $errors[] = "<li>A senha é obrigatória!</li>";
        }
        else 
        {
            if (strlen($_POST['senha']) < 3)
            {
                $errors[] = "<li>A senha deve ter mais de três caracteres!</li>";
            }
        }

        if (empty($errors))
        {
            $dados = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'telefone' => $_POST['telefone'],
                'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
            ];

            $db->store($dados);

            $success = "Usuário Cadastrado Sucesso!";
            
            redirect('./login.php', 750);
        }
        
    } catch (Exception $e) {
        throw new Exception("Erro ao inserir: " . $e->getMessage());
    }
}
?>

<div class="row">
    <div class="col">
        <a href="./usuario/userList.php" class="btn btn-success">Voltar</a>
    </div>
</div>

<div class="row">
    <?php actionMessage($success, $errors); ?>
    <div class="col">
        <form action="userForm.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $data->id ?? '' ?>">

            <div class="col-6">
                <label for="email">E-mail: </label>
                <input type="email" name="email" class="form-control" value="<?php echo getFormValue($data, 'email') ?>"required> 
            </div>
            <div class="col-6">
                <label for="senha">Senha: </label> <input type="password" name="senha" class="form-control" value="<?php echo getFormValue($data, 'senha') ?>"required> 
            </div>

            <div class="col mt-4">
                <button type="submit" class="btn btn-success">Logar</button>
                Não tem uma conta? <a href="./registrar.php" class="btn btn-danger">Crie Aqui</a>

            <div class="col mt-4">
                <a href="./usuario/userList.php" class="btn btn-danger">Lista</a>
            </div>
            </div>
        </form>
    </div>
</div>

<?php
include 'footer.php';
?>