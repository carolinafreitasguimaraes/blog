<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título da página -->
    <title>POST | Projeto para Web com PHP</title>
    <!-- Inclusão da folha de estilo Bootstrap -->
    <link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                // Inclusão do arquivo topo.php para exibir o topo da página.
                include 'includes/topo.php';
                ?>
            </div>
        </div>
        <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <?php
                // Inclusão do arquivo menu.php para exibir o menu da página.
                include 'includes/menu.php';
                ?>
            </div>
            <div class="col-md-10" style="padding-top: 50px;">
                <h2>Página teste includes</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                // Inclusão do arquivo rodape.php para exibir o rodapé da página.
                include 'includes/rodape.php';
                ?>
            </div>
        </div>
    </div>
    <!-- Inclusão do script Bootstrap -->
    <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
</body>

</html>