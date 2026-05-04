<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisão de PHP</title>
</head>
<body>
    <?php 
    
    echo "Olá, mundo PHP!<br>";

    $nome = "Kadson";
    $idade = 19;
   
    echo "<strong>Nome:</strong> $nome, homem de idade aproximada em $idade milênios. <br><hr>";

    if ($idade >= 18) 
    {
        echo "<br> Maior de idade. <br>";
    } else {
        echo "<br> Menor de idade. <br>";
    }

    $notas = [5, 6, 7, 8];

    for ($i = 0; $i <count($notas); $i++)
    {
        echo $notas[$i]."<br>";
    }
    echo "<br>";
    foreach ($notas as $item)
    {
        echo $item . "<br>";
    }

    $nomes = ["Felipe", "Dudu", "Kadinho"];

    for ($i = 0; $i <count($nomes); $i++)
    {
        echo $nomes[$i]."<br>";
    }

        echo "<br>";
    foreach ($nomes as $item)
    {
        echo $item . "<br>";
    }

    $carros = [
            ['modelo' => "Mustang", 'cor' => "vermelho", 'ano' => 1997],
            ['modelo' => "Sauber C9", 'cor' => "Silver", 'ano' => 1984],
            ['modelo' => "Brasilia", 'cor' => "Amarela", 'ano' => 1969] # Na última, a vírgula é opcional.
        ];

    echo $carros[0]['modelo']. " - ". $carros[0]['ano'];

    foreach($carros as $carro)
    {
        echo "<br>";
        foreach($carro as $item)
        {
            echo "Modelo: " . $item['modelo'] . " - Ano: " . $item['ano'];
        }
    }

    ?>
   
    <p>Meu Site Topzera</p>
</body>
</html>