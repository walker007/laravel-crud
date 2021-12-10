<nav>
    <ul>
        <li><a href="{{ route('marcas.index') }}">Marcas</a></li>
        <li><a href="{{ route('produtos.index') }}">Produtos</a></li>
        <li><a href="#!logout" onclick="document.getElementById('logoutForm').submit()">Sair</a></li>
    </ul>
</nav>

{!! Form::open(['route' => 'logout', 'method' => 'POST', 'id' => 'logoutForm']) !!}
{!! form::close() !!}
