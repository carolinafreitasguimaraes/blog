<?php
// Inclui os arquivos necessários com funções e configurações.
require_once '../includes/funcoes.php';
require_once '../core/conexao_mysql.php';
require_once '../core/sql.php';
require_once '../core/mysql.php';

// Chama a função insert_teste para inserir um registro de usuário.
insert_teste('Leonardo', 'leonardo.dona@ifsp.edu.br', 'leonardo123');

// Chama a função buscar_teste para buscar e exibir todos os registros de usuário.
buscar_teste();

// Chama a função update_teste para atualizar um registro de usuário com ID 38.
update_teste(38, 'murilo', 'silva@gmail.com');

// Chama novamente a função buscar_teste para verificar as alterações após a atualização.
buscar_teste();

// Define a função insert_teste para inserir um registro de usuário.
function insert_teste($nome, $email, $senha): void{
    // Cria um array associativo com os dados a serem inseridos.
    $dados = ['nome' => $nome, 'email' => $email, 'senha' => $senha]; 
    // Chama a função 'insere' para inserir os dados na tabela 'usuario'.
    insere('usuario', $dados);
}

// Define a função buscar_teste para buscar registros de usuário e exibi-los.
function buscar_teste(): void{
    // Realiza a busca na tabela 'usuario' e seleciona os campos desejados.
    $usuarios = buscar('usuario', ['id', 'nome', 'email'], [], '');
    // Exibe os resultados da busca.
    print_r($usuarios);
}

// Define a função update_teste para atualizar um registro de usuário com base no ID.
function update_teste($id, $nome, $email): void{
    // Cria um array associativo com os novos dados.
    $dados = ['nome' => $nome, 'email' => $email];
    // Define o critério de atualização com base no ID.
    $criterio = [['id', '=', $id]];
    // Chama a função 'atualiza' para atualizar os dados na tabela 'usuario'.
    atualiza('usuario', $dados, $criterio);
}
?>