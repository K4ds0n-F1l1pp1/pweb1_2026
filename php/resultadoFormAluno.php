<?php
include './header.php';
?>

<div class="col-6">
    <?php
        echo "<p>" . $_GET['nomeAluno'] . "</p>";
        echo "<p>" . $_GET['emailAluno'] . "</p>";
    ?>
</div>

<?php
include './footer.php';
?>