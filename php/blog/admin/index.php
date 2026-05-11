<?php

include_once './database/db.class.php';

$conn = new db("usuarios");

$dados = [
    'nome' => "Felipe Zonta",
    'telefone' => "(49) 98882-9086",
    'email' => "fezonta04@gmail.com"
];

$conn->store($dados);
echo "Inserido com sucesso!";

?>