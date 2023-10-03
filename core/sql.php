<?php
// Função para criar uma instrução SQL de inserção de dados em uma entidade.
function insert(string $entidade, array $dados) : string
{
    $instrucao = "INSERT INTO {$entidade}";
    $campos = implode(', ', array_keys($dados));
    $valores = implode(', ', array_values($dados));

    $instrucao .= " ({$campos})";
    $instrucao .= " VALUES ({$valores})";

    return $instrucao;
}

// Função para criar uma instrução SQL de atualização de dados em uma entidade.
function update(string $entidade, array $dados, array $criterio = []) : string
{
    $instrucao = "UPDATE {$entidade}";

    foreach($dados as $campo => $dado){
        $set[] = "{$campo} = {$dado}";
    }

    $instrucao .= ' SET '. implode(', ', $set) ;

    if(!empty($criterio)){
        $instrucao .= ' WHERE ';
        foreach($criterio as $expressao){
            $instrucao .= ' ' . implode(' ', $expressao);
        }
    }
    return $instrucao;
}

// Função para criar uma instrução SQL de exclusão de dados em uma entidade.
function delete(string $entidade, array $criterio = []) : string
{
    $instrucao = "DELETE {$entidade}";

    if(!empty($criterio)){
        $instrucao .= ' WHERE ';

        foreach($criterio as $expressao){
            $instrucao .= ' ' . implode(' ', $expressao);
        }
    }
    return $instrucao;
}

// Função para criar uma instrução SQL de seleção de dados de uma entidade.
function select(string $entidade, array $campos, array $criterio = [], string $ordem = null) : string
{
    $instrucao = "SELECT ". implode(', ' ,$campos);
    $instrucao .= " FROM {$entidade}";

    if(!empty($criterio)){
        $instrucao .= ' WHERE ';

        foreach($criterio as $expressao){
            $instrucao .= ' ' . implode(' ', $expressao);
        }
    }
    if(!empty($ordem)){
        $instrucao .= " ORDER BY $ordem ";
    }

    return $instrucao;
}
?>