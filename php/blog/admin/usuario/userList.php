<?php
include '../header.php';

include_once '../database/db.class.php';

$db = new db('usuarios');
$db->deleteUser();

if (!empty($_POST))
{
    $db->store($_POST);
} else {
    $dados = $db->all();
}

?>

<div class="row">
    <div class="col">
        <a href="./userForm.php" class="btn btn-success">Adicionar Novo</a>
    </div>
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