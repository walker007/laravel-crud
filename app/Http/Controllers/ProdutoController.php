<?php

namespace App\Http\Controllers;

use App\Helpers\MoneyFormat;
use App\Http\Requests\ProdutoRequest;
use App\Models\Marca;
use App\Models\Produto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProdutoController extends Controller
{
    public function index(): View
    {
        $produtos = Produto::paginate();

        return view('produtos.index', compact('produtos'));
    }

    public function create(): View
    {
        $marcas = Marca::pluck('nome', 'id');

        return view('produtos.create', compact('marcas'));
    }

    public function edit($produto_id): View
    {
        $marcas = Marca::pluck('nome', 'id');
        $produto = Produto::find($produto_id);

        return view('produtos.edit', compact('marcas', 'produto'));
    }

    public function store(ProdutoRequest $request): RedirectResponse
    {
        $produtoData = $this->getProdutoData($request);

        if(Produto::create($produtoData))
        {
            return redirect()->route('produtos.index')->with('message', "Produto Cadastrado");
        }

        return redirect()->back()->with('message', "Produto Não Cadastrado");
        
    }

    public function update($produto_id,ProdutoRequest $request): RedirectResponse
    {
        $produtoData = $this->getProdutoData($request);
        $produto = Produto::find($produto_id);

        if($produto->update($produtoData))
        {
            return redirect()->route('produtos.index')->with('message', "Produto Editado");
        }

        return redirect()->back()->with('message', "Produto Não Editado");

    }

    public function delete($produto_id): RedirectResponse
    {
        $produto = Produto::find($produto_id);
        
        if($produto->delete())
        {
            return redirect()->route('produtos.index')->with('message', "Produto Editado");
        }

        return redirect()->back()->with('message', "Produto Não Editado");
    }

    private function getProdutoData(ProdutoRequest $request): array
    {
        $data = $request->only( 'marca_id','nome','preco','quantidade');
        $data['preco'] = MoneyFormat::toFloat($data['preco']);
        return $data;
      
    }
}
