<?php
// Inicia a sessão PHP para trabalhar com variáveis de sessão.
session_start();

// Inclui arquivos necessários para o funcionamento do código.
require_once '../includes/valida_login.php';
require_once '../includes/funcoes.php';
require_once 'conexao_mysql.php';
require_once 'sql.php';
require_once 'mysql.php';

// Loop para limpar e atribuir os dados do array $_POST a variáveis com o mesmo nome.
foreach($_POST as $indice => $dado) {
    $$indice = limparDados($dado);
}

// Loop para limpar e atribuir os dados do array $_GET a variáveis com o mesmo nome.
foreach($_GET as $indice => $dado) {
    $$indice = limparDados($dado);
}

// Converte a variável $id em um número inteiro.
$id = (int)$id;

// Estrutura de switch para determinar a ação com base na variável $acao.
switch($acao){
    case 'insert':
        // Define um array $dados com os valores dos campos da postagem.
        $dados =[
            'titulo' => $titulo,
            'texto' => $texto,
            'data_postagem' => "$data_postagem $hora_postagem",
            'usuario_id' => $_SESSION['login']['usuario']['id']
        ];

        // Chama a função insere() para inserir os dados na tabela 'post'.
        insere(
            'post',
            $dados
        );

        break;

    case 'update':
        // Define um array $dados com os valores dos campos da postagem.
        $dados = [
            'titulo' => $titulo,
            'texto' => $texto,
            'data_postagem' => "$data_postagem $hora_postagem",
            'usuario_id' => $_SESSION['login']['usuario']['id']
        ];

        // Define um critério para identificar a postagem a ser atualizada com base no $id.
        $criterio = [
            ['id', '=', $id]
        ];

        // Chama a função atualiza() para atualizar os dados na tabela 'post'.
        atualiza(
            'post',
            $dados,
            $criterio
        );

        break;

    case 'delete':
        // Define um critério para identificar a postagem a ser excluída com base no $id.
        $criterio = [
            ['id', '=', $id]
        ];

        // Chama a função deleta() para excluir a postagem da tabela 'post'.
        deleta(
            'post',
            $criterio
        );

        break;
}

// Redireciona o usuário de volta para a página inicial.
header('Location: ../index.php');
?>