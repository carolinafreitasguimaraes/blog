<!DOCTYPE html>
<html>
<head>
    <!-- Título da página (deve ser corrigido para "<title>Título da Página</title>") -->
    <litle></litle>
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

                // Inclusão do arquivo valida_login.php para validar o login (verifique se o arquivo existe e está corretamente implementado).
                include 'includes/valida_login.php';
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
            <div class="col-md-12" style="padding-top: 50px;">
                <?php
                // Inclusão de arquivos e recuperação de dados GET
                require_once 'includes/funcoes.php';
                require_once 'core/conexao_mysql.php';
                require_once 'core/sql.php';
                require_once 'core/mysql.php';

                foreach($_GET as $indice => $dado){
                    $$INDICE = limparDados($dado);
                }

                // Verificação e recuperação de dados de um post existente
                if(!empty($id)){
                    $id = (int)$id;

                    $criterio = [
                        ['id', '=', $id]
                    ];

                    $retorno = buscar(
                        'post',
                        ['*'],
                        $criterio
                    );

                    $entidade = $retorno[0];
                }
                ?>

                <h2>Post</h2>
                <form method="post" action="core/post_repositorio.php">
                    <input type="hidden" name="acao"
                        value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                    <input type="hidden" name="id"
                        value="<?php echo $entidade['id'] ?? '' ?>">
                    <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input class="form-group" type="text"
                                require="require" id="titulo" name="titulo"
                                value="<?php echo $entidade['titulo'] ?? '' ?>">
                    </div>
                    <div class="form-group">
                            <label for="texto">Texto:</label>
                            <textarea class="form-control" type="text"
                                require="require" id="texto" name="texto" rows="5">
                                <?php echo $entidade['texto'] ?? '' ?>
                            </textarea>
                    </div>
                    <div class="form-group">
                        <label for="texto">Postar em:</label>
                        <?php 
                            // Separa a data e a hora da postagem
                            $data = (!empty($entidade['data_postagem']))?
                                explode(' ', $entidade['data_postagem'])[0] : '';
                            $hora = (!empty($entidade['data_postagem']))?
                                explode(' ', $entidade['data_postagem'])[1] : '';
                        ?>
                        <div class="row">
                            <div class="col-md-3">  
                                <input class="form-control" type="date"
                                    require="required"
                                    id="data_postagem"
                                    name="data_postagem"
                                    value="<?php echo $data ?>">
                            </div>
                            <div class="col-md-3">  
                                <input class="form-control" type="time"
                                    require="required"
                                    id="hora_postagem"
                                    name="hora_postagem"
                                    value="<?php echo $hora ?>">
                            </div>
                        </div>
                    </div>   
                    <div class="texto-right">  
                        <button class="btn btn-success"
                                type="submit">Salvar</button>
                    </div>
                </form>
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
    <!-- Inclusão do script Bootstrap (verifique a ortografia correta do nome do arquivo) -->
    <script src="lib/bootstrap-4.2.1-dist/js/boostrap.min.js"></script>   
</body>
</html>