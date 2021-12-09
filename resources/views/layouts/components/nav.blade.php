<nav>
    <ul>
        <li><a href="#!logout" onclick="document.getElementById('logoutForm').submit()">Sair</a></li>
    </ul>
</nav>

{!! Form::open(['route' => 'logout', 'method' => 'POST', 'id' => 'logoutForm']) !!}
{!! form::close() !!}
