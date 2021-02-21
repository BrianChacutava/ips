<?php

namespace App\Http\Controllers\venda\artigo;

use App\Http\Controllers\Controller;
use App\Models\Artigo;
use App\Models\ContaRendimento;
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
        $artigo->conta_rendimento_id = $request->modelo;
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
