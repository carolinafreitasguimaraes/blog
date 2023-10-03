<?php
    // Inclusão de arquivos e recuperação de dados GET
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    // Busca informações sobre o post especificado
    $posts = buscar(
        'post',
        [
            'titulo',
            'data_postagem',
            'texto',
            '(select nome
                from usuario
                where usuario.id = post.usuario_id) as nome'
        ],
        [
            ['id', '=', $post]
        ]
    );
    $post = $posts[0];
    $data_post = date_create($post['data_postagem']);
    $data_post = date_format($data_post, 'd/m/Y H:i:s');
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Título da página -->
    <title><?php echo $post['titulo']?></title>
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
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['titulo']?></h5>
                    <h5 class="card-subtitle mb-2 text-muted">
                        <?php echo $data_post?> Por <?php echo $post['nome']?>
                    </h5>
                    <div class="card-text">
                        <?php echo html_entity_decode($post['texto']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php 
                    // Inclusão do arquivo rodape.php para exibir o rodapé da página.
                    include 'includes/rodape.php';
                ?>
                <!-- Botão para voltar à página inicial -->
                <button class="btn btn-dark mt-5"><a href="index.php">Voltar</a></button>
            </div>
        </div>
    </div>
    <!-- Inclusão do script Bootstrap -->
    <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
</body>
</html>