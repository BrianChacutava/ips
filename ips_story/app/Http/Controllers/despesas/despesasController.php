<?php

namespace App\Http\Controllers\despesas;

use App\Http\Controllers\Controller;
use App\Models\Caixa;
use App\Models\Desspesa;
use App\Models\Empresa;
use App\Models\Fornecedor;
use App\Models\Funcionario;
use App\Models\MetodePagamento;
use App\Models\Moeda;
use App\Models\RegimeIva;
use App\Models\TipoDespesa;
use Illuminate\Http\Request;

class despesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        
        $despesa = Desspesa::all();        
        return view('despesa/despesa', compact('despesa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $despesa = Desspesa::all();
        $fornecedor = Fornecedor::all();
        $caixa = Caixa::all();
        $iva = RegimeIva::all();
        $tipo_despesa = TipoDespesa::all();
        $moeda = Moeda::all();
        $metodo_pagamento = MetodePagamento::all();
        $empresa = Empresa::all();
        $funcionario = Funcionario::all();

        return view('despesa/criar_despesa', compact('despesa', 'fornecedor', 'caixa', 'iva', 'tipo_despesa', 'moeda', 'metodo_pagamento', 'empresa', 'funcionario'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {
        //
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
