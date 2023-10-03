<form action="" class="form-inline my-2 my-lg-0" method="get">
    <!-- O formulário envia os dados para a URL atual, pois o atributo 'action' está vazio. 
         Isso significa que a página atual será recarregada quando o formulário for enviado. -->
    
    <input type="search" class="form-control mr-sm-2" name="busca" placeholder="Busca" aria-label="Busca">
    <!-- Um campo de entrada de texto é fornecido com o nome 'busca' para inserir o termo de busca.
         A classe 'form-control' é usada para estilização Bootstrap.
         'mr-sm-2' é uma classe de margem para adicionar espaço à direita, dependendo do tamanho da tela.
         O atributo 'placeholder' fornece um texto de exemplo dentro do campo de entrada.
         'aria-label' é um atributo de acessibilidade que fornece uma descrição ao leitor de tela. -->
    
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    <!-- Um botão é fornecido com a classe Bootstrap 'btn' para estilização.
         'btn-outline-success' é uma classe para botões de contorno verde.
         'my-2 my-sm-0' são classes de margem para adicionar espaço superior e inferior, dependendo do tamanho da tela.
         O atributo 'type' é definido como 'submit' para enviar o formulário quando o botão é clicado. -->
</form>