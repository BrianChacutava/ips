<?php

namespace App\Http\Controllers\venda\artigo;

use App\Http\Controllers\Controller;
use App\Models\Armazem;
use App\Models\ArmazemHasArtigo;
use App\Models\Artigo;
use App\Models\ContaRendimento;
use App\Models\Empresa;
use App\Models\GrupoPreco;
use App\Models\Preco;
use App\Models\TipoArtigo;
use App\Models\UnidadeBase;
use Illuminate\Http\Request;

class artigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $artigo = Artigo::all();
        $unidade = UnidadeBase::all();
        $tipo_artigo = TipoArtigo::all();
        $conta_rendimento = ContaRendimento::all();
        return view('vendas/artigo/artigo_venda', compact('artigo', 'unidade', 'tipo_artigo', 'conta_rendimento'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $artigo = Artigo::all();
        $unidade = UnidadeBase::all();
        $tipo_artigo = TipoArtigo::all();
        $conta_rendimento = ContaRendimento::all();
        
        return view('vendas/artigo/criar_artigo', compact('artigo', 'unidade', 'tipo_artigo', 'conta_rendimento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store1(Request $request)
    {
        // dd($request);

        $artigo = new Artigo();
        $artigo->artigo = $request->artigo;
        $artigo->descricao = $request->descricao;
        $artigo->tipo_artigo_id = $request->TArtigo;
        $artigo->unidade_base_id = $request->unidadeBase;
        $artigo->marca = $request->marca;
        $artigo->modelo_marca = $request->modelo;
        $artigo->conta_rendimento_id = $request->contaRendimento;
        $salvar_artigo = $artigo->save();
        
        return redirect()->route('artigo.index')
        ->with('message', '...Artigo "'.$artigo->artigo.'" criado');
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
        
        $artigo = Artigo::find($id);
        $unidade = UnidadeBase::all();
        $tipo_artigo = TipoArtigo::all();
        $conta_rendimento = ContaRendimento::all();
        $preco = Preco::all();
        $grupo_preco = GrupoPreco::all();
        $armazem = Armazem::all();
        $empresa = Empresa::all();
        $armazem_artigo = ArmazemHasArtigo::all();
        
        return view('vendas/artigo/edit_artigo', compact('empresa','armazem', 'armazem_artigo', 'artigo', 'unidade', 'tipo_artigo', 'conta_rendimento', 'preco', 'grupo_preco'));
    
    }

    public function add_preco(Request $request, $id)
    {
        //
        // dd($request);
        $preco = new Preco();
        $preco->preco = $request->preco;
        $preco->grupo_preco_id = $request->gpreco;
        $preco->artigo_id = $request->artigo_id;
        $preco->quantidade = $request->quantidade;
        $preco->ativo = 1;
        $preco->save();
        
        return redirect()->route('artigo.edit',$request->artigo_id);
    }

    public function alterar_status_preco($status, $preco_id, $artigo_id)
    {
        //
        // dd($request);
        $preco = Preco::find($preco_id);
        $preco->ativo = $status;
        $preco->save();
        
        return redirect()->route('artigo.edit',$artigo_id);
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
