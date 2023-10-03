<?php
    // Inicia a sessão, permitindo o uso de variáveis de sessão
    session_start();
?>

<div class="card">
    <div class="card-header">
        <!-- Título do projeto de blog -->
        <h1> Projeto Blog em PHP - Pontin Bordin </h1>
    </div>
    <?php if (isset($_SESSION['login'])): ?>
    <!-- Se o usuário estiver logado, exibe um cumprimento e um link para fazer logout -->
    <div class="card-body text-right">
        Olá <?php echo $_SESSION['login']['usuario']['nome']?>!
        <a href="core/usuario_repositorio.php?acao=logout" class="btn btn-link btn-sm" role="button">Sair</a>
    </div>
    <?php endif ?>
</div>