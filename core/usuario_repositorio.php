<?php
session_start(); // Inicia a sessão

// Inclui os arquivos necessários
require_once '../includes/funcoes.php';
require_once 'conexao_mysql.php';
require_once 'sql.php';
require_once 'mysql.php';

$salt = '$ifsp'; // Define um valor de sal para criptografia

// Limpa os dados POST e GET para evitar injeção de SQL
foreach($_POST as $indice => $dado){
    $$indice = limparDados($dado);
}

foreach($_GET as $indice => $dado){
    $$indice = limparDados($dado);
}

switch($acao){
    case 'insert':
        // Define os dados a serem inseridos
        $dados = [
            'nome' => $nome,
            'email' => $email,
            'senha' => crypt($senha, $salt) // Criptografa a senha antes de inserir
        ];

        // Chama a função 'insere' para inserir um novo usuário
        insere('usuario', $dados);

        break;

    case 'update':
        $id = (int)$id; // Converte o ID para inteiro
        // Define os dados a serem atualizados
        $dados = [
            'nome' => $nome,
            'email' => $email
        ];

        $criterio = [
            ['id', '=', $id] // Critério de atualização: ID igual ao ID fornecido
        ];

        // Chama a função 'atualiza' para atualizar os dados do usuário
        atualiza('usuario', $dados, $criterio);

        break;

    case 'login':
        $criterio = [
            ['email', '=', $email], // Critério de pesquisa: email igual ao email fornecido
            ['AND', 'ativo', '=', 1] // E ativo igual a 1 (ativo)
        ];

        // Realiza a busca na tabela 'usuario' com os critérios especificados
        $retorno = buscar(
            'usuario',
            ['id', 'nome', 'email', 'senha', 'adm'],
            $criterio
        );

        // Verifica se algum usuário foi encontrado
        if (count($retorno) > 0) {
            // Compara a senha criptografada no banco de dados com a senha fornecida
            if (crypt($senha, $salt) == $retorno[0]['senha']) {
                $_SESSION['login']['usuario'] = $retorno[0]; // Define os dados do usuário na sessão

                // Redireciona para a URL de retorno, se houver
                if (!empty($_SESSION['url_retorno'])) {
                    header('Location:' . $_SESSION['url_retorno']);
                    $_SESSION['url_retorno'] = '';
                    exit;
                }
            }
        }

        break;

    case 'logout':
        session_destroy(); // Destroi a sessão (faz logout)
        break;

    case 'status':
        $id = (int)$id; // Converte o ID e o valor para inteiros
        $valor = (int)$valor;

        // Define os dados de atualização (ativo)
        $dados = [
            'ativo' => $valor
        ];

        $criterio = [
            ['id', '=', $id] // Critério de atualização: ID igual ao ID fornecido
        ];

        // Chama a função 'atualiza' para atualizar o status do usuário
        atualiza('usuario', $dados, $criterio);

        header('Location: ../usuarios.php'); // Redireciona para a página de usuários
        exit;
        break;

    case 'adm':
        $id = (int)$id; // Converte o ID e o valor para inteiros
        $valor = (int)$valor;

        // Define os dados de atualização (administrador)
        $dados = [
            'adm' => $valor
        ];

        $criterio = [
           ['id', '=', $id] // Critério de atualização: ID igual ao ID fornecido
        ];

        // Chama a função 'atualiza' para atualizar o status de administrador do usuário
        atualiza('usuario', $dados, $criterio);

        header('Location: ../usuarios.php'); // Redireciona para a página de usuários
        exit;
        break;
}

header('Location: ../index.php'); // Redireciona de volta para a página inicial
?>