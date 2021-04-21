<?php

namespace App\Http\Controllers\despesas;

use App\Models\Caixa;
use App\Models\Moeda;
use App\Models\Empresa;
use App\Models\Desspesa;
use App\Models\RegimeIva;
use App\Models\Fornecedor;
use App\Models\Funcionario;
use App\Models\TipoDespesa;
use Illuminate\Http\Request;
use App\Models\MetodePagamento;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        // dd($request);
        $despesa = new Desspesa();

        $despesa->referencia = $request->referencia;
        $despesa->tipo_despesa_id = $request->tipo_despesa_id;
        $despesa->pago = $request->pago;
        // $despesa->taxa_cambio = $request->taxa_cambio;
        $despesa->observacao = $request->observacao;
        $despesa->fornecedor_id = $request->fornecedor_id;
        $despesa->moeda_id = $request->moeda_id;
        $despesa->metode_pagamento_id = $request->metode_pagamento_id;
        $despesa->caixa_id = $request->caixa_id;
        $despesa->Regime_iva_id = $request->Regime_iva_id;
        $despesa->empresa_id =  Auth::user()->funcionario->departamentos()->first()->empresa->id;
        $despesa->funcionario_id = $request->funcionario_id;
        $despesa->valor_total = $request->valor_total;

        $despesa->save();

        return redirect()->route('despesas.index')
            ->with('message', '...Despesa de"'.$despesa->referencia.'" Cadastrada');

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
