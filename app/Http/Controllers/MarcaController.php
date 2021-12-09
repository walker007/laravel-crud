<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaRequest;
use App\Models\Marca;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MarcaController extends Controller
{
    public function index(): View
    {
        $marcas = Marca::paginate();
        return view('marcas.index', compact('marcas'));
    }

    public function create(): View
    {
        return view('marcas.create');
    }

    public function edit($marca_id,Request $request): View
    {
        $marca = Marca::find($marca_id);

        return view('marcas.edit', compact('marca'));
    }

    public function store(MarcaRequest $request): RedirectResponse
    {
        if(Marca::create($request->only('nome')))
        {
            return redirect()->route('marcas.index')->with('message', "Marca Cadastrada");
        }

        return redirect()->back()->with('message', "Marca Não Cadastrada");
    }

    public function update($marca_id,MarcaRequest $request): RedirectResponse
    {
        $marca = Marca::find($marca_id);

        if($marca->update($request->only('nome'))){
            return redirect()->route('marcas.index')->with('message', "Marca Atualizada");
        }
        return redirect()->back()->with('message', "Marca Não Atualizada");
    }

    public function delete($marca_id): RedirectResponse
    {
        $marca = Marca::find($marca_id);

        if($marca->delete()){
            return redirect()->route('marcas.index')->with('message', "Marca apagada!");
        }
        return redirect()->back()->with('message', "Não foi possível apagar a marca");

    }
}
