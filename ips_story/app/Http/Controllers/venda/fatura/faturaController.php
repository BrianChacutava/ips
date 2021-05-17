<?php

namespace App\Http\Controllers\venda\fatura;

use App\Models\Preco;
use App\Models\Artigo;
use App\Models\Fatura;
use App\Models\Cliente;
use App\Models\Cotacao;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FaturaHasArtigo;
use Illuminate\Support\Facades\Auth;

class faturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $fatura = Fatura::all();

        return view('vendas/fatura/fatura', compact('fatura'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Fatura $fatura = null)
    {
        //
        if ($fatura == null) {
            $fatura = Fatura::all();

            $validado = 'true';
            $cliente = Cliente::all();
            $funcionario = Funcionario::all();
            $artigos = Artigo::with('precos')->get();
            $precos = Preco::all();
            $numero_fatura = Fatura::all()->count() . now()->format('dy');
            $incidencia = 0;

        }else{
            $fatura = $fatura;
            
            // $validado = 'true';
            $cliente = $fatura->cliente;
            $funcionario = $fatura->funcionario;
            $artigos = $fatura->artigos;
            $precos = Preco::all();
            $numero_fatura = $fatura->numero_fatura;
            $incidencia = $fatura->Incidencia;
        }
        $data = compact('fatura', 'precos', 'fatura', 'cliente', 'funcionario', 'numero_fatura', 'artigos', 'validado', 'incidencia');

        return view('vendas/fatura/criar_fatura', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Fatura $fatura = null)
    {
        //
        if ($fatura == null) {

            $fatura = new Fatura();
            $cliente = Cliente::find($request->cliente);


            $empresa = Auth::user()->funcionario->departamentos()->first()->empresa;

            // Cotacao::whereYear('created_at', now())
            // ->where('validado', '<>', NULL)
            // 002021
            $fatura->numero_fatura = Fatura::all()->count() . now()->format('dy');
            $fatura->cliente_id = $cliente->id;
            $fatura->funcionario_id = Auth::user()->funcionario->id;
            $fatura->empresa_id = $empresa->id;
            // $fatura->estado_pagamento = $request->estado_pagamento;
            $fatura->regime_pagamento_id = $cliente->regime_pagamento_id;
            $fatura->Regime_iva_id = $cliente->Regime_iva_id;
            $fatura->estado_pagamento = 'pendente';
            $fatura->save();
        }

        // return
        //     redirect()->route('orcamento.edit', $cotacao);

        return $this->create($fatura);
    }

    
    public function add_artigo(Request $request, Fatura $fatura)
    {
        // dd($cotacao);
        if ($request->artigo_id != null) {
            // dd($request->artigo_id);
            $fatura_has_artigo = new FaturaHasArtigo();
            $fatura_has_artigo->fatura_id = $fatura->id;
            $fatura_has_artigo->artigo_id = $request->artigo_id;
            $fatura_has_artigo->preco = $request->preco;
            $fatura_has_artigo->quantidade = $request->quantidade;
            $fatura_has_artigo->desconto = $request->desconto;
            $fatura_has_artigo->total = ($request->preco * $request->quantidade) - $request->desconto;
            $fatura_has_artigo->save();

            // dd($this-> soma_pivot($cotacao->artigos, 'total'));

        }
if($request->editar==true){
    
    return $this->alterar_orcamento($fatura->id);
}

        return
            redirect()->route('orcamento.edit', ['orcamento' => $fatura->id]);;
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
