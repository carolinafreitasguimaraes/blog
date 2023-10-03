<div class="card">
    <div class="card-header">
        Menu
    </div>
    <div class="card-body">
        <ul class="nav flex-column">
            <!-- Link para a página inicial (Home) -->
            <li class="nav-item">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <!-- Link para a página de cadastro de usuários -->
            <li class="nav-item">
                <a href="usuario_formulario.php" class="nav-link">Cadastre-se</a>
            </li>
            <!-- Link para a página de login -->
            <li class="nav-item">
                <a href="login_formulario.php" class="nav-link">Login</a>
            </li>
            <!-- Verifica se o usuário está logado (sessão ativa) -->
            <?php if (isset($_SESSION['login'])) : ?>
                <!-- Link para a página de inclusão de posts (visível apenas para usuários logados) -->
                <li class="nav-item">
                    <a href="post_formulario.php" class="nav-link">Incluir Post</a>
                </li>
            <?php endif; ?>
            <!-- Verifica se o usuário está logado e é um administrador (adm) -->
            <?php if (isset($_SESSION['login']) && ($_SESSION['login']['usuario']['adm'] === 1)) : ?>
                <!-- Link para a página de gerenciamento de usuários (visível apenas para administradores) -->
                <li class="nav-item">
                    <a href="usuarios.php" class="nav-link">Usuários</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>