<!-- resources/views/post.blade.php -->
@extends('cms.app')

@section('title', 'Detalhes da Postagem')

@section('content')
    <div class="post-container">
        <h1>Homem encontra cachorro dentro de garrafa de Coca-Cola</h1>

        <div class="post-info">
            <img src="https://i.ibb.co/mc16zFN/cao.jpg" alt="Imagem da Postagem">
            <p class="post-excerpt">
                A fórmula da coca-cola é guardada a sete chaves, mas falhas no processo de fabricação podem causar danos irreversíveis em seus consumidores.
            </p>
            <p>
                O carioca <a href="#">Hank Lobo</a> viveu momentos de terror no último dia 17. Logo após o almoço, ele foi até a geladeira e pegou uma garrafa de Coca-Cola, onde encontrou um filhote de yorkshire. "Eu tomei um p*ta susto! Quando eu abri a garrafa e o líquido não saiu, eu achei que o refrigerante estava congelado, daí olhei direito para a garrafa e tinha um filhote de yorkshire lá dentro", contou o rapaz à nossa equipe de reportagem.
            </p>
            <p>
                Na 35ª delegacia policial do bairro de Campo Grande, no Rio de Janeiro, o delegado responsável pelo caso declarou que o mais assustador nesse caso não foi encontrar um cachorro dentro da garrafa de refrigerante e sim o fato do cachorro estar vivo. Segundo o delegado, o advogado do rapaz entrará com um pedido de pagamento de pensão alimentícia para o cachorro que já foi adotado pelo rapaz e recebeu o nome de Pepsi.
            </p>
            <p>
                Pepsi foi encontrada com sintomas de desidratação, ficou internada por 2 dias em uma clínica veterinária e passa bem.
            </p>
        </div>

        <h2>Veja também:</h2>
        <ul class="related-posts">
            <li><a href="#">Holandesa ganha na justiça o direito de engravidar de seu cachorro</a></li>
            <li><a href="#">Homem perde US$ 80 mil devido a comentário no Facebook</a></li>
            <li><a href="#">NASA descobre primeiro planeta potencialmente habitável</a></li>
            <li><a href="#">Homem é estuprado por 20 pessoas, após estuprar enteado</a></li>
        </ul>
    </div>
@endsection
