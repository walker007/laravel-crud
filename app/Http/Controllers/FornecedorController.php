<?php

namespace App\Http\Controllers;

use App\Helpers\DocumentFormat;
use App\Http\Requests\FornecedorRequest;
use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FornecedorController extends Controller
{
    public function index(): View
    {
        $fornecedores = Fornecedor::paginate();
       

        return view('fornecedores.index', compact('fornecedores'));
    }

    public function create(): View
    {
        $produtos = Produto::pluck("nome", 'id');

        return view('fornecedores.create',compact( 'produtos'));
    }

    public function edit($fornecedor_id,Request $request): View
    {
        $fornecedor = Fornecedor::find($fornecedor_id);
        $produtos = Produto::pluck("nome", 'id');

        return view('fornecedores.edit', compact('fornecedor','produtos'));
    }

    public function store(FornecedorRequest $request): RedirectResponse
    {
        $fornecedorData = $this->getFornecedorData($request);
        $fornecedor = Fornecedor::create($fornecedorData);

        if($fornecedor)
        {
            $fornecedor->produtos()->sync($fornecedorData['produtos']);
            return redirect()->route('fornecedores.index')->with('message', "Fornecedor Cadastrado");
        }

        return redirect()->back()->with('message', "Fornecedor Não Cadastrado");
    }

    public function update($fornecedor_id,FornecedorRequest $request): RedirectResponse
    {
        $fornecedorData = $this->getFornecedorData($request);
        $fornecedor = Fornecedor::find($fornecedor_id);

        if($fornecedor->update($fornecedorData))
        {
            $fornecedor->produtos()->sync($fornecedorData['produtos']);
            return redirect()->route('fornecedores.index')->with('message', "Fornecedor Atualizado");
        }
        return redirect()->back()->with('message', "Fornecedor Não Atualizado");
    }

    public function delete($fornecedor_id): RedirectResponse
    {
        $fornecedor = Fornecedor::find($fornecedor_id);

        if($fornecedor->delete()){
            return redirect()->route('fornecedores.index')->with('message', "Fornecedor apagado!");
        }
        return redirect()->back()->with('message', "Não foi possível apagar o Fornecedor");

    }

    private function getFornecedorData(FornecedorRequest $request): array
    {
        $data = $request->only('nome','documento','produtos');
        $data['documento'] = DocumentFormat::toInt($data['documento']);
        return $data;
    }
}
