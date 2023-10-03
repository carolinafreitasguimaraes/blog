<!DOCTYPE html>
<html>
<head>
    <title>Login | Projeto para Web com PHP</title>
    <link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php include 'includes/topo.php'; ?>
            </div>
        </div>
        <!DOCTYPE html>
<html>
<head>
    <!-- Título da página (deve ser corrigido para "<title> Login | Projeto para Web com PHP</title>") -->
    <title></title>
    <!-- Inclusão da folha de estilo Bootstrap -->
    <link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                // Inclusão do arquivo topo.php para exibir o topo da página (corrigir as aspas simples).
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
            <div class="col-md-12" style="padding-top: 50px;">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <!-- Formulário de login -->
                    <form method="post" action="core/usuario_repositorio.php">
                        <!-- Campo oculto que define a ação como "login" -->
                        <input type="hidden" name="acao" value="login">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <!-- Campo de entrada para o email -->
                            <input class="form-control" type="text" require="required" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <!-- Campo de entrada para a senha -->
                            <input class="form-control" type="password" require="required" id="senha" name="senha">
                        </div>
                        <div class="text-right">
                            <!-- Botão de submit para enviar o formulário -->
                            <button class="btn btn-sucess" type="submit">Acessar</button>
                        </div>
                    </form>
                </div>
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
</html>   <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <?php include 'includes/menu.php'; ?>
            </div>
            <div class="col-md-10" style="padding-top: 50px;">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="post" action="core/usuario_repositorio.php">
                        <input type="hidden" name="acao" value="login">
                        <div class="form-group">
                         <label for="email">E-mail</label>
                            <input class="form-control" type="text"
                                require="required" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input class="form-control" type="password" require="required" id="senha" name="senha">
                        </div>
                        <div class="text-right">
                            <button class="btn btn-success"
                                type="submit">Acessar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php include 'includes/rodape.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
</body>
</html>