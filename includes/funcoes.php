<?php
function limparDados(string $dado) : string
{
    // Define uma lista de tags HTML permitidas que serão preservadas.
    $tags = '<p><strong><i><ul><ol><li><h1><h2><h3>';

    // Remove todas as tags HTML, exceto as tags permitidas da string de entrada.
    $retorno = htmlentities(strip_tags($dado, $tags));

    // Retorna a string limpa e sanitizada.
    return $retorno;
}
?>