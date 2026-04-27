<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Dados</title>
</head>
<body>
    
    <h1>PREENCHA OS DADOS:</h1>

    <form method="POST" action="">

        <?php

        $listName = 0;

        while ($listName < 5)
        {
            echo "<br> <Label>Digite um nome: </br>
                <input type='text' name='nome[]' maxlength='25'>";

            $listName++;
        }

        ?>
        
        <br><br>

        <Label>Digite sua Idade: </Label>
        <input type="number" name="idade" maxlength="3">
        <button type="submit">Inserir Dados</button>
        <br>
    </form>

    <?php

        $nomes = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $idade = $_POST["idade"];
            $nome = $_POST["nome"];

            if (!empty($idade) && !empty($nome))
            {

                if ($idade < 18)
                {
                    echo "<hr style='margin-top: 12px; margin-bottom: 12px'>Você é de menor! <br>";
                }

                if ($idade >= 18)
                {
                    echo "<hr style='margin-top: 12px; margin-bottom: 12px'>Você é de maior! <br>";
                }

                echo "Lista de Nomes:";
                echo "<ul>";

                    foreach ($nome as $itemNome)
                    {
                        if (!empty($itemNome))
                        {
                            echo "<li>" . htmlspecialchars($itemNome) . "</li>";
                        }
                    }

                echo "</ul> <br>";
            }

        }

    ?>

    <a href="./aula01.php">
        <br>
        <button style="color: red;">RELOAD</button>
    </a>

</body>
</html>