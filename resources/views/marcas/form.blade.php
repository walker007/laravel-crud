<div class="container-card">
    <div class="card">
        @error('nome')
            <div class="msg msg-error">
                <strong>{{ $message }}</strong>
            </div>
        @enderror
        <div class="card-row">
            {{ Form::label('nome', 'Nome da marca') }}
            {{ Form::text('nome', null, ['class' => 'input', 'placeholder' => 'Nike']) }}
        </div>
        <div class="card-row">

            <button class="btn btn-primary btn-block" type="submit">Cadastrar</button>

        </div>
    </div>
</div>
