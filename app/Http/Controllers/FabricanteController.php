<?php

namespace App\Http\Controllers;

use App\DataTables\FabricanteDataTable;
use App\Http\Requests\FabricanteRequest;
use App\Models\Fabricante;
use App\Services\FabricanteService;

use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    
    public function index(FabricanteDataTable $fabricanteDataTable)
    {
        return $fabricanteDataTable->render('fabricante.index');
    }

        
    public function create()
    {
        return view('fabricante.form');
    }

    public function store(FabricanteRequest $request)
    {
        $fabricante = FabricanteService::store($request->all());

        if ($fabricante) {
            flash('Fabricante cadastrado com sucesso')->success();

            return back();
        }

        flash('Erro ao salvar o fabricante')->error();

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function show(Fabricante $fabricante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabricante $fabricante)
    {
        return view('fabricante.form', compact('fabricante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fabricante $fabricante)
    {
        $fabricante = FabricanteService::update($request->all(), $fabricante);

        if ($fabricante) {
            flash('Fabricante atualizado com sucesso')->success();

            return back();
        }

        flash('Erro ao atualizar o fabricante')->error();

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fabricante  $fabricante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabricante $fabricante)
    {
        //
    }
}
