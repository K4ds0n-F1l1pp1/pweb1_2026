<?php
include './header.php';
?>

<div class="col-6">
    <?php
        echo "<p>" . $_POST['nomeAluno'] . "</p>";
        echo "<p>" . $_POST['emailAluno'] . "</p>";
        echo "<p>" . $_POST['telefoneAluno'] . "</p>";
    ?>
</div>

<?php
include './footer.php';
?>