<?php

namespace App\Http\Controllers;

use App\DataTables\ProdutoDataTable;
use App\Http\Requests\ProdutoRequest;
use App\Models\Fabricante;
use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\Request;
use Throwable;

class ProdutoController extends Controller
{
    
    public function index(ProdutoDataTable $produtoDataTable)
    {
        return $produtoDataTable->render('produto.index');
    }

    public function create()
    {
        return view('produto.form', [
            'fabricantes' => Fabricante::pluck('nome', 'id')
        ]);
    }

    public function store(ProdutoRequest $request)
    {
        $produto = ProdutoService::store($request->all());

        if ($produto) {
            flash('Produto cadastrado com sucesso')->success();

            return back();
        }

        flash('Erro ao salvar o produto')->error();

        return back()->withInput();
    }

    public function show(Produto $produto)
    {
        if ($produto) {
            flash('Produto cadastrado com sucesso')->success();

            return back();
        }

        flash('Erro ao salvar o produto')->error();

        return back()->withInput();
    }

    public function edit(Produto $produto)
    {
        return view('produto.form', [
            'produto' => $produto,
            'fabricantes' => Fabricante::pluck('nome', 'id')
        ]);
    }
    
    public function update(ProdutoRequest $request, Produto $produto)
    {
        $prod = ProdutoService::update($request->all(), $produto);

        if ($prod) {
            flash('Produto atualizado com sucesso')->success();

            return back();
        }

        flash('Erro ao atualizar o produto')->error();

        return back()->withInput();
    }
    
    public function destroy(Produto $produto)
    {
        try {
            $produto->delete();
        } catch (Throwable $th) {
            return response('Erro ao apagar', 400);
        }
    }
}
