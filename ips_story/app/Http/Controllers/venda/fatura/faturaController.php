<?php

namespace App\Http\Controllers\venda\orcamento;

use App\Models\Preco;
use App\Models\Artigo;
use App\Models\Cliente;
use App\Models\Cotacao;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Models\DadosBancario;
use App\Models\CotacaoHasArtigo1;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EmpresaHasDadosBancario;
use App\Models\Fatura;

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
        $faturas = Fatura::all();

        return view('vendas/fatura/fatura', compact('faturas'));
    }


    public function detalhes(Cotacao $cotacao)
    {
        //
        $empresa = Auth::user()->funcionario->departamentos()->first()->empresa;
        $dadosBancariosHas = EmpresaHasDadosBancario::where('empresa_id', $empresa->id)->get();

        // dd($dadosBancariosHas->get());

        return view('vendas/orcamento/detalhes_orcamento', compact('cotacao','empresa', 'dadosBancariosHas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cotacao $cotacao = null)
    {
        //
        $cotacoes = Cotacao::all();
        if($cotacoes->last()->validado != null){

            $orcamento = Cotacao::all();

            // dd($orcamento);
            $validado = 'true';
            $cliente = Cliente::all();
            $funcionario = Funcionario::all();
            $artigos = Artigo::with('precos')->get();
            $precos = Preco::all();
            $referencia = Cotacao::all()->count() . now()->format('dy');
            $subtotal = 0;
            $data = compact('precos', 'orcamento', 'cliente', 'funcionario', 'referencia', 'artigos', 'validado', 'subtotal');
    
            return view('vendas/orcamento/criar_orcamento', $data);
        }else{

            $orcamento = $cotacoes->last();
            // dd($orcamento);
            $validado = 'false';
            $cliente = Cliente::find($orcamento->cliente->id);
            // dd($cliente);
            $funcionario = Funcionario::find($orcamento->funcionario->id);
            $artigos = Artigo::with('precos')->get();
            $precos = Preco::all();
            $referencia = $orcamento->num_cotacao;
            $cotacao = $orcamento;
            $subtotal = $this->soma_pivot($cotacao->artigos,'total');
            $data = compact('cotacao','precos', 'orcamento', 'cliente', 'funcionario', 'referencia', 'artigos', 'validado', 'subtotal');
    
            return view('vendas/orcamento/criar_orcamento', $data);
        }
    }

    public function edit(Cotacao $orcamento)
    {
        $cotacao = $orcamento;
        $validado = 'false';
        // dd($orcamento);
        $validado = 'false';
        $cliente = Cliente::find($orcamento->cliente->id);
        // dd($cliente);
        $funcionario = Funcionario::find($orcamento->funcionario->id);
        $artigos = Artigo::with('precos')->get();
        $precos = Preco::all();
        $referencia = $orcamento->num_cotacao;
        $cotacao = $orcamento;
        $subtotal = $this->soma_pivot($cotacao->artigos,'total');
        $data = compact('cotacao','precos', 'orcamento', 'cliente', 'funcionario', 'referencia', 'artigos', 'validado', 'subtotal');

        return view('vendas/orcamento/criar_orcamento', $data);

    }

    public function alterar_orcamento($orcamento)
    {
        $cotacao = Cotacao::find($orcamento);
        $validado = 'false';
        // dd($cotacao);
        $validado = 'false';
        $cliente = Cliente::find($cotacao->cliente->id);
        // dd($cliente);
        $funcionario = Funcionario::find($cotacao->funcionario->id);
        $artigos = Artigo::with('precos')->get();
        $precos = Preco::all();
        $referencia = $cotacao->num_cotacao;
        // $cotacao = $cotacao;
        $subtotal = $this->soma_pivot($cotacao->artigos,'total');
        $data = compact('cotacao','precos', 'orcamento', 'cliente', 'funcionario', 'referencia', 'artigos', 'validado', 'subtotal');

        return view('vendas/orcamento/editar_orcamento', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request, Cotacao $cotacao = null)
    {
        //
        // dd($cotacao);
        if($cotacao == null){

        $cotacao = new Cotacao();
        $cliente = Cliente::find($request->cliente);


        $empresa = Auth::user()->funcionario->departamentos()->first()->empresa;

        // Cotacao::whereYear('created_at', now())
        // ->where('validado', '<>', NULL)
        // 002021
        $cotacao->num_cotacao = 1;
        $cotacao->cliente_id = $cliente->id;
        $cotacao->funcionario_id = Auth::user()->funcionario->id;
        $cotacao->empresa_id = $empresa->id;
        $cotacao->termo_pagamento_id = $cliente->regime_pagamento_id;
        $cotacao->regime_pagamento_id = $cliente->regime_pagamento_id;
        $cotacao->Regime_iva_id = $cliente->Regime_iva_id;
        $cotacao->estado = 'pendente';
        $cotacao->save();
    }

        // return
        //     redirect()->route('orcamento.edit', $cotacao);

        return $this->create($cotacao);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_artigo(Request $request, Cotacao $cotacao)
    {
        // dd($cotacao);
        if ($request->artigo_id != null) {
            // dd($request->artigo_id);
            $cotacao_has_artigo = new CotacaoHasArtigo1();
            $cotacao_has_artigo->cotacao_id = $cotacao->id;
            $cotacao_has_artigo->artigo_id = $request->artigo_id;
            $cotacao_has_artigo->preco = $request->preco;
            $cotacao_has_artigo->quantidade = $request->quantidade;
            $cotacao_has_artigo->desconto = $request->desconto;
            $cotacao_has_artigo->total = ($request->preco * $request->quantidade) - $request->desconto;
            $cotacao_has_artigo->save();

            // dd($this-> soma_pivot($cotacao->artigos, 'total'));

        }
if($request->editar==true){
    
    return $this->alterar_orcamento($cotacao->id);
}

        return
            redirect()->route('orcamento.edit', ['orcamento' => $cotacao->id]);;
    }

    public function salvar_alteracao(Request $request, Cotacao $cotacao)
    {
        // dd($cotacao);
        $nova_cotacao = Cotacao::find($cotacao->id);
        // $nova_cotacao->validado = now();
        $nova_cotacao->subtotal = $request->subtotal;
        // $nova_cotacao->num_cotacao = (Cotacao::whereYear('created_at', now())->count()+1).(now()->format('Y'));
        $nova_cotacao->iva = $request->iva;
        $nova_cotacao->total = $request->Total;
        $nova_cotacao->estado = $request->estado;
        // dd();
        // $orcamento = Cotacao::all()->where('validado','<>',null);
        $nova_cotacao->save();
        
    
    return $this->alterar_orcamento($cotacao->id);

    }

    public function soma_pivot($tabela, $atributo){
        $total = 0;

        foreach ($tabela as $tb) {
            $total = $total + $tb->pivot->$atributo;
        }
        // dd($tital);
        return $total;
    }


    public function soma($tabela, $atributo){
        $total = 0;

        foreach ($tabela as $tb) {
            $total = $total + $tb->$atributo;
        }
        // dd($tital);
        return $total;
    }

    public function remove_artigo(Request $request, CotacaoHasArtigo1 $id)
    {
        $cotacao_has_artigo = CotacaoHasArtigo1::find($id->id);
        $cotacao_has_artigo->forceDelete();
        return redirect()->back();
    }

    public function validar_cotacao(Request $request, Cotacao $cotacao)
    {
        $nova_cotacao = Cotacao::find($cotacao->id);
        $nova_cotacao->validado = now();
        $nova_cotacao->subtotal = $request->subtotal;
        $nova_cotacao->num_cotacao = (Cotacao::whereYear('created_at', now())->count()+1).(now()->format('Y'));
        $nova_cotacao->iva = $request->iva;
        $nova_cotacao->total = $request->Total;
        // dd();
        $orcamento = Cotacao::all()->where('validado','<>',null);

        $nova_cotacao->save();
        // dd($cotacao);

        return view('vendas/orcamento/cotacao', compact('orcamento'));
    }

    public function Alter_artigo(Request $request, $atigo){
        
        dd($atigo);
        $cotacao_has_artigo = CotacaoHasArtigo1::find($atigo);
        
        $cotacao_has_artigo->artigo_id = $request->artigo_id;
        $cotacao_has_artigo->preco = $request->preco;
        $cotacao_has_artigo->quantidade = $request->quantidade;
        $cotacao_has_artigo->desconto = $request->desconto;
        $cotacao_has_artigo->save();

        
        return response()->json($cotacao_has_artigo);
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
