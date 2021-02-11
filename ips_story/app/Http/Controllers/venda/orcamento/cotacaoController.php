<?php

namespace App\Http\Controllers\venda\orcamento;

use App\Http\Controllers\Controller;
use App\Models\Artigo;
use App\Models\Cliente;
use App\Models\Cotacao;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cotacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('vendas/orcamento/cotacao');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $orcamento = Cotacao::all();
        $cliente = Cliente::all();
        $funcionario = Funcionario::all();
        $produto = Artigo::all();
        $referencia = Cotacao::all()->count() . now()->format('dy');

                  
        $empresa = Auth::user()->funcionarios()->departamentos()->empresa()->get();
        dd($empresa);


        return view('vendas/orcamento/criar_orcamento', compact('orcamento', 'cliente', 'funcionario','referencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
