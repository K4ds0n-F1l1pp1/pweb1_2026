<?php
include '../header.php';

include_once '../database/db.class.php';

$db = new db('usuarios');

$success = '';
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
        
        if (empty($_POST['nome'])) 
        {
            $errors[] = "<li>O nome é obrigatório!</li>";
        } 
        else if (strlen($_POST['nome']) < 3) 
        {
            $errors[] = "<li>O nome deve ter pelo menos 3 caracteres!</li>";
        }

        if (empty($_POST['email'])) 
        {
            $errors[] = "<li>O e-mail é obrigatório!</li>";
        } 
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
            $errors[] = "<li>Insira um endereço de e-mail válido!</li>";
        }

        if (empty($_POST['cpf'])) 
        {
            $errors[] = "<li>O CPF é obrigatório!</li>";
        } 
        else 
        {
            $cpfLimpo = preg_replace('/[^0-9]/', '', $_POST['cpf']);
            if (strlen($cpfLimpo) !== 11) 
            {
                $errors[] = "<li>O CPF deve conter exatamente 11 dígitos numéricos!</li>";
            }
        }

        if (empty($errors))
        {
            $dados = [
                'nome'     => $_POST['nome'],
                'email'    => $_POST['email'],
                'telefone' => $_POST['telefone'],
                'cpf'      => $_POST['cpf']
            ];

            $db->store($dados);

            $success = "Registro Salvo com Sucesso!";
            
            redirect('./userList.php', 750);
        }
        
    } catch (Exception $e) {
        throw new Exception("Erro ao inserir: " . $e->getMessage());
    }
}
?>

<div class="row">
    <div class="col">
        <a href="./userList.php" class="btn btn-success">Voltar</a>
    </div>
</div>

<div class="row">
    <?php actionMessage($success, $errors); ?>
    <div class="col">
        <form action="userForm.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $data->id ?? '' ?>">
            
            <div class="col-6">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" class="form-control" value="<?php echo getFormValue($data, 'nome') ?>" maxlength="35" required> 
            </div>

            <div class="col-6">
                <label for="email">E-mail: </label>
                <input type="email" name="email" class="form-control" value="<?php echo getFormValue($data, 'email') ?>" required> 
            </div>

            <div class="col-6">
                <label for="telefone">Telefone: </label>
                <input type="text" name="telefone" class="form-control" value="<?php echo getFormValue($data, 'telefone') ?>" required> 
            </div>

            <div class="col-6">
                <label for="cpf">CPF: </label>
                <input type="text" name="cpf" class="form-control" value="<?php echo getFormValue($data, 'cpf') ?>" placeholder="000.000.000-00" required> 
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