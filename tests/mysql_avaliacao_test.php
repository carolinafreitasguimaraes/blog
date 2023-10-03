<?php
// Inclui os arquivos necessários com funções e configurações.
require_once '../includes/funcoes.php';
require_once '../core/conexao_mysql.php';
require_once '../core/sql.php';
require_once '../core/mysql.php';

// Chama a função insert_teste para inserir um registro de avaliação.
insert_teste ('10', 'excelente', '1', '3');

// Chama a função buscar_teste para buscar e exibir todos os registros de avaliação.
buscar_teste();

// Chama a função update_teste para atualizar um registro de avaliação com ID 1.
update_teste(1, '2', 'péssimo', '1', '3');

// Chama novamente a função buscar_teste para verificar as alterações após a atualização.
buscar_teste();

// Define a função insert_teste para inserir um registro de avaliação.
function insert_teste($nota, $comentario, $usuario_id, $post_id): void{
    // Cria um array associativo com os dados a serem inseridos.
    $dados = ['nota' => $nota, 'comentario' => $comentario, 'usuario_id' => $usuario_id, 'post_id' => $post_id]; 
    // Chama a função 'insere' para inserir os dados na tabela 'avaliacao'.
    insere('avaliacao', $dados);
}

// Define a função buscar_teste para buscar registros de avaliação e exibi-los.
function buscar_teste(): void{
    // Realiza a busca na tabela 'avaliacao' e seleciona os campos desejados.
    $avaliacoes = buscar('avaliacao', ['id', 'nota', 'comentario', 'usuario_id', 'post_id'], [], '');
    // Exibe os resultados da busca.
    print_r($avaliacoes);
}

// Define a função update_teste para atualizar um registro de avaliação com base no ID.
function update_teste($id, $nota, $comentario, $usuario_id, $post_id): void{
    // Cria um array associativo com os novos dados.
    $dados = ['nota' => $nota, 'comentario' => $comentario, 'usuario_id' => $usuario_id, 'post_id' => $post_id];
    // Define o critério de atualização com base no ID.
    $criterio = [['id', '=', $id]];
    // Chama a função 'atualiza' para atualizar os dados na tabela 'avaliacao'.
    atualiza('avaliacao', $dados, $criterio);
}
?>