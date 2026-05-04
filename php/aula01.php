<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "Oi mundo PHP <br>";


    $nome = "Felipe";
    $idade = 18;
   
    echo "Nome: $nome, Idade: $idade.";


    if ($idade >= 18){
        echo "Maior de idade";
    }else{
        echo "Menor de idade";
    }


    $notas = [5, 6, 7, 8];


    for ($i = 0; $i <count($notas); $i++){
        echo $notas[$i]."<br>";
    }
    echo "<br>";
    foreach ($notas as $item) {
        echo $item . "<br>";
    }


    $nomes = ["Felipe", "Dudu", "Kadinho"];


    for ($i = 0; $i <count($nomes); $i++){
        echo $nomes[$i]."<br>";
    }
        echo "<br>";
    foreach ($nomes as $item) {
        echo $item . "<br>";
    }


    $carros = [
        ["modelo"=>"Mustang", "cor" => "vermelho", "ano" => 1997],
        ["modelo"=>"Sandeiro", "cor" => "Prata", "ano" => 2014],
        ["modelo"=>"Brasilia", "cor" => "Amarela", "ano" => 1969],
        ];


    echo $carros[0]["modelo"]. "-". $carros[0]["ano"];


    foreach($carros as $carro){
        echo "<br>";
        foreach($carro as $item){
            echo "Modelo:" . $item['modelo'] . "Ano:" . $item['ano'];
        }
    }


    ?>
   


    <p>Meu Site <?= $carros[0]["modelo"]. "-". $carros[0]["ano"];?> ?></p>
</body>
</html>