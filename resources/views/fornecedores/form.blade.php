<div class="container-card">
    <div class="card">
        <div class="card-row">
            @error('documento')
                <div class="msg msg-error">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
            {{ Form::label('documento', 'CNPJ ou CPF do fornecedor') }}
            <the-mask :mask="['###.###.###-##', '##.###.###/####-##']"
                value="{{ isset($fornecedor) ? $fornecedor->documento : null }}" name="documento" id="documento"
                class="input" />
        </div>
        @error('nome')
            <div class="msg msg-error">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        <div class="card-row">
            {{ Form::label('nome', 'Nome ou Nome Fantasia') }}
            {{ Form::text('nome', null, ['class' => 'input', 'placeholder' => 'Distribuidor de Embalagens']) }}
        </div>
        @error('produtos')
            <div class="msg msg-error">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        <div class="card-row">
            {{ Form::label('produtos[]', 'Produtos') }}
            {{ Form::select('produtos[]', $produtos, null, ['class' => 'input-select', 'multiple', 'required']) }}
        </div>
        <div class="card-row">

            <button class="btn btn-primary btn-block" type="submit">Salvar</button>

        </div>
    </div>
</div>
