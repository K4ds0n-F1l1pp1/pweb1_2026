<?php
include '../header.php';

include_once '../database/db.class.php';

$db = new db('usuarios');
$db->deleteUser();

if (!empty($_POST) && !isset($_POST['btn-buscar']))
{
    $db->store($_POST);
} 

if (isset($_POST['btn-buscar'])) {
    $filtros = [
        'tipo'  => $_POST['tipo'],
        'valor' => $_POST['valor']
    ];
    $dados = $db->search($filtros);
} else {
    $dados = $db->all();
}

?>

<div class="row mb-4">
    <div class="col-12">
        <h3>Listagem de Usuários</h3>
    </div>
    
    <form action="userList.php" method="POST" class="col-12">
        <div class="row align-items-end">
            <div class="col-md-4 col-sm-12">
                <label for="tipo" class="form-label"><strong>Tipo:</strong></label>
                <select name="tipo" id="tipo" class="form-control"> 
                    <option value="nome">Nome</option>
                    <option value="cpf">CPF</option>
                    <option value="email">E-mail</option>
                </select>
            </div>
            
            <div class="col-md-5 col-sm-12">
                <label for="valor" class="form-label"><strong>Valor:</strong></label>
                <input type="text" name="valor" id="valor" class="form-control" placeholder="Pesquisar...">
            </div>
            
            <div class="col-md-3 col-sm-12">
                <button type="submit" name="btn-buscar" class="btn btn-primary w-100">Buscar</button>
            </div>
        </div>
    </form>
</div>

<div class="col">
    <a href="./userForm.php" class="btn btn-success">Adicionar Novo</a>
</div>


<div class="row">
    <table class="table table-striped table-hover mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOME</th>
                <th scope="col">TELEFONE</th>
                <th scope="col">E-MAIL</th>
                <th scope="col">AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php

                foreach ($dados as $item)
                {
                    echo "<tr>
                            <th scope='row'>$item->id</th>
                            <td>$item->nome</td>
                            <td>$item->telefone</td>
                            <td>$item->email</td>
                            <td>
                                <a class='btn btn-warning btn-sm' 
                                title='Editar'
                                href='./userForm.php?id=$item->id'> 
                                Editar
                                </a>
                            </td>
                            <td>
                                <a href='?action=deleteUser&id=$item->id' 
                                class='btn btn-danger btn-sm' 
                                onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\");'>
                                Excluir
                                </a>
                            </td>
                        </tr>";
                }

            ?>

        </tbody>
    </table>
</div>

<?php

include '../footer.php';

?>