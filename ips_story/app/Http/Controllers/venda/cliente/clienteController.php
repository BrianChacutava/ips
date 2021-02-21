<?php

namespace App\Http\Controllers\venda\cliente;

use App\Models\Pai;
use App\Models\Moeda;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Fornecedor;
use App\Models\Provincium;
use App\Models\GupoCliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DadosBancario;
use App\Models\GupoFornecedor;
use App\Models\MetodePagamento;
use App\Models\RegimeIva;
use App\Models\RegimePagamento;
use App\Models\TermoPagamento;

class clienteController extends Controller
{
    private $cliente;

    /**
     * Class constructor.
     */
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = Cliente::all();
        return view('vendas/cliente/cliente', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clientes = Cliente::all();
        $fornecedores = Fornecedor::all();
        $enderecos = Endereco::all();
        $moedas = Moeda::all();
        $Pais = Pai::with('provincia')->get();
        $Provincia = Provincium::all();
        $grupo_cliente = GupoCliente::all();
        $metodo_pagamento = MetodePagamento::all();
        $iva = RegimeIva::all();
        $termo_pagamento = TermoPagamento::all();
        $regime_pagamento = RegimePagamento::all();
        $grupo_fornecedor = GupoFornecedor::all();


        return view('vendas/cliente/criar_cliente', compact('grupo_fornecedor', 'regime_pagamento', 'termo_pagamento', 'iva', 'metodo_pagamento', 'Provincia', 'clientes', 'fornecedores', 'enderecos', 'moedas', 'Pais', 'grupo_cliente'));
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
        $dados = $request->all();


        // $endereco = new Endereco();
        // $endereco->rua = $request->rua;
        // $endereco->av = $request->avenida;
        // $endereco->provincia_id = $request->provincia_id;
        // $endereco->cod_postal = $request->codigoP;
        // $endereco->save();

        dd($request);

        // return redirect()->route('artigo.index');

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
        $dados = $request->all();
        // dd($request);


        if ($request->cliente == 'cliente') {
            // dd('cliente');


            // criar endereço
            $endereco = new Endereco();
            $endereco->rua = $request->rua;
            $endereco->av = $request->avenida;
            $endereco->provincia_id = $request->provincia_id;
            $endereco->cod_postal = $request->codigoP;
            $endereco->bairo = $request->bairo;
            $endereco->blockeado = 0;
            $endereco->save();


            // Criar Cliente
            $cliente = new Cliente();
            $cliente->nome = $request->nome;
            $cliente->nuit = $request->nuit;
            $cliente->telefone = $request->telefone;
            $cliente->email = $request->email;
            $cliente->website = $request->website;
            $cliente->moeda_id = $request->moeda;
            $cliente->endereco_id = Endereco::all()->last()->id;
            $cliente->gupo_cliente_id = $request->gpcliente;
            $cliente->metode_pagamento_id = $request->MtpagamentoC;
            $cliente->regime_pagamento_id = $request->RpagamentoC;
            $cliente->Regime_iva_id = $request->regimeC;
            $cliente_create = $cliente->save();

            return redirect()->route('cliente.create')
                ->with('message', '...Cliente "'.$cliente->nome.'" criado');

            } elseif ($request->cliente == 'fornecedor') {
                // dd('fornacedor');
                
                // criar endereço
                $endereco = new Endereco();
                $endereco->rua = $request->rua;
                $endereco->av = $request->avenida;
                $endereco->provincia_id = $request->provincia_id;
                $endereco->cod_postal = $request->codigoP;
                $endereco->bairo = $request->bairo;
                $endereco->blockeado = 0;
                $endereco->save();
    
                // Criar fornecedor
                $fornecedor = new Fornecedor();
                $fornecedor->nome = $request->nome;
                $fornecedor->sigla = $request->sigla;
                $fornecedor->nuit = $request->nuit;
                $fornecedor->telefone = $request->telefone;
                $fornecedor->email = $request->email;
                $fornecedor->website = $request->website;
                // $fornecedor->moeda_id = $request->moeda;
                $fornecedor->endereco_id = Endereco::all()->last()->id;
                $fornecedor->gupo_fornecedor_id = $request->gfornecedor;
                $fornecedor->metode_pagamento_id = $request->MtpagamentoF;
                $fornecedor->regime_pagamento_id = $request->regime_pagamentoF;
                $fornecedor->Regime_iva_id = $request->regimeF;
                $fornecedor_create = $fornecedor->save();
    
                return redirect()->route('cliente.create')
                    ->with('message', '...Fornecedor criado');
    
            } elseif ($request->cliente == 'banco') {
            // dd('banco');
            
            // criar endereço
            $endereco = new Endereco();
            $endereco->rua = $request->rua;
            $endereco->av = $request->avenida;
            $endereco->provincia_id = $request->provincia_id;
            $endereco->cod_postal = $request->codigoP;
            $endereco->bairo = $request->bairo;
            $endereco->blockeado = 0;
            $endereco->save();

            // Criar banco
            $banco = new DadosBancario();
            $banco->nome_banco = $request->nome;
            $banco->nuit = $request->nuit;
            $banco->telefone = $request->telefone;
            $banco->email = $request->email;
            $banco->website = $request->website;
            $banco->moeda_id = $request->moeda;
            $banco->endereco_id = Endereco::all()->last()->id;

            $banco->nome_banco = $request->nomeBanco;
            $banco->numero_conta = $request->numConta;
            $banco->nib = $request->nib;
            
            $entidade_bancaria_create = $banco->save();

            return redirect()->route('cliente.create')
                ->with('message', '...Instituicao Bancaria criado');

        }
    
        // return redirect()->route('cliente.create');

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
        // dd('show');
        $cliente = Cliente::find($id);
        $fornecedores = Fornecedor::all();
        $enderecos = Endereco::all();
        $moedas = Moeda::all();
        $Pais = Pai::with('provincia')->get();
        $provincia = Provincium::all();
        $grupo_cliente = GupoCliente::all();
        $metodo_pagamento = MetodePagamento::all();
        $iva = RegimeIva::all();
        $termo_pagamento = TermoPagamento::all();
        $regime_pagamento = RegimePagamento::all();
        $grupo_fornecedor = GupoFornecedor::all();


        return view('vendas/cliente/detalhes_cliente', compact('grupo_fornecedor', 'regime_pagamento', 'termo_pagamento', 'iva', 'metodo_pagamento', 'provincia', 'cliente', 'fornecedores', 'enderecos', 'moedas', 'Pais', 'grupo_cliente'));
    
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
        // dd('edit');
        $cliente = Cliente::find($id);
        $fornecedores = Fornecedor::all();
        $enderecos = Endereco::all();
        $moedas = Moeda::all();
        $Pais = Pai::with('provincia')->get();
        $provincia = Provincium::all();
        $grupo_cliente = GupoCliente::all();
        $metodo_pagamento = MetodePagamento::all();
        $iva = RegimeIva::all();
        $termo_pagamento = TermoPagamento::all();
        $regime_pagamento = RegimePagamento::all();
        $grupo_fornecedor = GupoFornecedor::all();


        return view('vendas/cliente/edit_cliente', compact('grupo_fornecedor', 'regime_pagamento', 'termo_pagamento', 'iva', 'metodo_pagamento', 'provincia', 'cliente', 'fornecedores', 'enderecos', 'moedas', 'Pais', 'grupo_cliente'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update1(Request $request, $id)
    {
        //
        // dd('update');
        $dados = $request->all();
        $cliente = Cliente::find($id);

        // dd($request);


        if ($request->cliente_alterar == 'cliente_alterar') {
            // dd('cliente');


            // criar endereço
            $endereco = Endereco::find($cliente->endereco_id);
            $endereco->rua = $request->rua;
            $endereco->av = $request->avenida;
            if($request->provincia != ""){
                $endereco->provincia_id = $request->provincia;
            }
            $endereco->cod_postal = $request->codigoP;
            $endereco->bairo = $request->bairo;
            $endereco->blockeado = 0;
            $endereco->save();


            // Criar Cliente
            $cliente->nome = $request->nome;
            $cliente->nuit = $request->nuit;
            $cliente->sigla = $request->sigla;
            $cliente->telefone = $request->telefone;
            $cliente->email = $request->email;
            $cliente->website = $request->website;

            if($request->moeda != ""){
            $cliente->moeda_id = $request->moeda;
            }
            $cliente->endereco_id = Endereco::all()->last()->id;
            if($request->gpcliente != ""){
                $cliente->gupo_cliente_id = $request->gpcliente;
            }
            if($request->MtpagamentoC != ""){
                $cliente->metode_pagamento_id = $request->MtpagamentoC;
            }
            if($request->RpagamentoC != ""){
                $cliente->regime_pagamento_id = $request->RpagamentoC;
            }
            if($request->regimeC != ""){
                $cliente->Regime_iva_id = $request->regimeC;
            }
            $cliente_create = $cliente->save();

            return redirect()->route('cliente.index')
                ->with('message', '...Cliente "'.$cliente->nome.'" alterado');

            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy1($id)
    {
        //
        // dd('destroy');
        $cliente = Cliente::find($id);
        $delete = $cliente->delete();

        return redirect()->route('cliente.index')
        ->with('message', 'Cliente "'.$cliente->nome.'" Eliminado');
    }
}
