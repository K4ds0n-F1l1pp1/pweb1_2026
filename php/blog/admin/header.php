<!doctype html>
<html lang="pt-BR">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formulário PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  </head>

  <?php

  if (session_status() === PHP_SESSION_NONE)
  {
      session_start();
  }

  function actionMessage($success, $error)
  {
    if (!empty($success))
    {
      echo "<div class='alert alert-success' role='alert'>
              <srong>$success</srong>
            </div>";
    }

    else if ($error)
    {
      echo "<div class='alert alert-danger' role='alert'>
              <srong>$error</srong>
            </div>";
    }
  }

  function redirect($page, $time = 1500)
  {
    echo "<script>
                setTimeout(() => window.location.href='$page', $time);
          </script>";
  }

  function getFormValue($data, $field = '')
  {
    return isset($data->$field) ? $data->$field : "";
  }

  ?>

  <body>

    <div class="container">
        <div class="col">
            <div class="row">
                <div class="col mt-4 mb-2">
                    <a href="./index.php" class="btn btn-success">Home</a>
                </div>
            </div>