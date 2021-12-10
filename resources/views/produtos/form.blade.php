<div class="container-card">
    <div class="card">
        @error('nome')
            <div class="msg msg-error">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        <div class="card-row">
            {{ Form::label('nome', 'Nome do produto*') }}
            {{ Form::text('nome', null, ['class' => 'input', 'placeholder' => 'Fones de ouvido']) }}
        </div>
        @error('preco')
            <div class="msg msg-error">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        <div class="card-row">
            {{ Form::label('preco', 'Preço do produto*') }}
            <money value="{{ isset($produto) ? $produto->preco : 0 }}" decimal="," class="input" name='preco'
                id="preco"></money>

        </div>
        @error('quantidade')
            <div class="msg msg-error">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        <div class="card-row">
            {{ Form::label('quantidade', 'Quantidade do produto*') }}
            {{ Form::number('quantidade', null, ['class' => 'input', 'placeholder' => '15']) }}
        </div>
        @error('marca_id')
            <div class="msg msg-error">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        <div class="card-row">
            {{ Form::label('marca_id', 'Marca do produto*') }}
            {{ Form::select('marca_id', $marcas, null, ['class' => 'input']) }}
        </div>
        <div class="card-row">

            <button class="btn btn-primary btn-block" type="submit">Salvar</button>

        </div>
    </div>
</div>

@push('scripts')

@endpush
