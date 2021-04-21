@extends('layouts.app')

@section('content')


<div class="custom-tab">

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active show" id="custom-nav-geral-tab" data-toggle="tab"
                href="#custom-nav-geral" role="tab" aria-controls="custom-nav-geral" aria-selected="true">Editar
                {{ $artigo->artigo }}</a>
            <a class="nav-item nav-link" id="custom-nav-vendas-tab" data-toggle="tab" href="#custom-nav-vendas"
                role="tab" aria-controls="custom-nav-vendas" aria-selected="false">Preços</a>
            <a class="nav-item nav-link" id="custom-nav-inventario-tab" data-toggle="tab" href="#custom-nav-inventario"
                role="tab" aria-controls="custom-nav-inventario" aria-selected="false">Inventario</a>
        </div>
    </nav>
        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
            
            <div class="tab-pane fade active show" id="custom-nav-geral" role="tabpanel"
            aria-labelledby="custom-nav-geral-tab">
            
            <form action="{{ route('artigo.store1') }}">
                <div class="card">
                    <div class="card-header"><strong>Alterar</strong><small> Artigo/ Serviço</small></div>
                    <div class="card-body card-block">

                        <div class="row form-group">

                            <div class="col col-sm-4"><label for="nome" class=" form-control-label"><small>Artigo/
                                        Serviço</small></label><input type="text" id="company"
                                    placeholder="Digite o nome" name="artigo"
                                    class="input-sm form-control-sm form-control" value="{{ $artigo->artigo }}">
                            </div>

                            <div class="col col-sm-8"><label for="vat"
                                    class=" form-control-label"><small>Descrição</small></label><input type="text"
                                    name="descricao" placeholder="Descrição..."
                                    class="input-sm form-control-sm form-control" value="{{ $artigo->descricao }}">
                            </div>

                            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Unidade
                                        Base</small></label><input type="text" name="descricao"
                                    placeholder="Unidade base..." class="input-sm form-control-sm form-control"
                                    value="{{ $artigo->unidade_base->unidade }}" disabled="">
                            </div>

                            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Tipo de
                                        Artigo</small></label><input type="text" name="tartigo"
                                    placeholder="tipo artigo..." class="input-sm form-control-sm form-control"
                                    value="{{ $artigo->tipo_artigo->tipo }}" disabled="">
                            </div>


                            <div class="col col-sm-4"><label for="vat"
                                    class=" form-control-label"><small>Conta_Rendimento</small></label><input
                                    type="text" name="conta" placeholder="conta de rendimento..."
                                    class="input-sm form-control-sm form-control"
                                    value="{{ $artigo->conta_rendimento->conta }}" disabled="">
                            </div>

                            <div class="col-lg-4">
                                <label for="vat" class=" form-control-label"><small>Alterar Unidade Base</small></label>
                                <select data-placeholder="Escolha a unidade base..." name="unidadeBase"
                                    class="standardSelect" tabindex="1">

                                    @forelse ($unidade as $unidades)

                                    <option value="{{ $unidades->id }}">{{ $unidades->descricao }}</option>
                                    @empty
                                    <p>Nenhum unidade inserida</p>
                                    @endforelse
                                </select>
                            </div>


                            <div class="col-lg-4">
                                <label for="vat" class=" form-control-label"><small>Alterar Tipo de
                                        Artigo</small></label>
                                <select data-placeholder="Escolha Tipo de Artigo" name="TArtigo" class="standardSelect"
                                    tabindex="2">

                                    <option value=""></option>
                                    @forelse ($tipo_artigo as $tipo_artigos)

                                    <option value="{{ $tipo_artigos->id }}">{{ $tipo_artigos->tipo }}</option>
                                    @empty
                                    <p>Nenhum Tipo de Artigo</p>
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-lg-4">
                                <label for="vat" class=" form-control-label"><small>Alterar Conta de
                                        Rendimento</small></label>
                                <select data-placeholder="Escolha conta de Rendimento" name="contaRendimento"
                                    class="standardSelect" tabindex="2">

                                    <option value=""></option>
                                    @forelse ($conta_rendimento as $conta_rendimentos)

                                    <option value="{{ $conta_rendimentos->id }}">{{ $conta_rendimentos->conta }}
                                    </option>
                                    @empty
                                    <p>Nenhuma conta de Rendimento</p>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><small> Detalhes</small></div>
                    <div class="card-body card-block">

                        <div class="row form-group">

                            <div class="col col-sm-8"><label for="nome"
                                    class=" form-control-label"><small>Marca</small></label><input type="text"
                                    id="marca" placeholder="Digite a marca" name="marca" value="{{ $artigo->marca }}"
                                    class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="vat"
                                    class=" form-control-label"><small>Modelo</small></label><input type="text"
                                    id="porta" placeholder="Digite o modelo" name="modelo"
                                    value="{{ $artigo->modelo_marca }}" class="input-sm form-control-sm form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-sm" style="float: right">Alterar</button>

                </div>
            </form>
            </div>

            {{--  vendas  --}}
            <div class="tab-pane fade" id="custom-nav-vendas" role="tabpanel" aria-labelledby="custom-nav-vendas-tab">


                <div class="col-lg-12" style="margin-top: 35px">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tabela de Preço</strong>
                            <button type="button" class="btn btn-primary btn-sm" style="float: right"
                                data-toggle="modal" data-target="#smallmodal">Adicionar
                                Preço</button>
                        </div>

                        {{--  modal pop up  --}}
                        <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog"
                            aria-labelledby="smallmodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="smallmodalLabel">Adicionar Preço</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('artigo.add_preco',$artigo->id) }}">
                                        <div class="modal-body">


                                            <div class="col col-sm-12"><label for="preco"
                                                    class=" form-control-label"><small>Valor</small></label><input
                                                    type="text" id="preco" placeholder="Digite o preço" name="preco"
                                                    class="input-sm form-control-sm form-control">
                                            </div>

                                            <input type="hidden" id="artigo" placeholder="Digite o preço"
                                                name="artigo_id" class="input-sm form-control-sm form-control"
                                                value="{{ $artigo->id }}">


                                            <div class="col-lg-12">
                                                <label for="vat" class=" form-control-label"><small>Grupo de
                                                        preços</small></label>
                                                <select data-placeholder="Escolha o grupo..." class="standardSelect"
                                                    tabindex="1" name="gpreco">

                                                    @forelse ($grupo_preco as $grupo_precos)

                                                    <option value="{{ $grupo_precos->id }}">
                                                        {{ $grupo_precos->descricao }}</option>
                                                    @empty
                                                    <p>Nenhum grupo_preco</p>
                                                    @endforelse
                                                </select>
                                            </div>

                                            <div class="col col-sm-12"><label for="nome"
                                                    class=" form-control-label"><small>Por
                                                        Quntidade</small></label><input type="text" id="quantidade"
                                                    placeholder="Digite a quantidade" name="quantidade"
                                                    class="input-sm form-control-sm form-control" value="1">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Adicionar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>grupo de preços</th>
                                        <th>preço</th>
                                        <th>unidade de venda</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($preco as $precos)
                                    @if($precos->artigo->id == $artigo->id)
                                    <tr>
                                        <td class="serial">{{ $precos->id }}</td>
                                        <td> <span class="name">{{ $precos->grupo_preco->descricao }}</span> </td>
                                        <td> <span class="number" step="0.01">{{ $precos->preco }}</span> </td>
                                        <td><span class="name">{{ $artigo->unidade_base->unidade }}</span></td>
                                        <td>
                                            @if($precos->ativo == 1)
                                            <a href="{{ route('artigo.alterar_status_preco', ['status'=>0,'preco_id'=>$precos->id ,'artigo_id'=>$artigo->id]) }}" class="delete-modal" onclick="return confirm('Deseja Desativar Preço?')"><span class="badge badge-complete">Ativo</span></a>
                                            @endif
                                            @if($precos->ativo == 0)
                                            <a href="{{ route('artigo.alterar_status_preco', ['status'=>1,'preco_id'=>$precos->id ,'artigo_id'=>$artigo->id]) }}" class="delete-modal" onclick="return confirm('Deseja Ativar Preço?')"><span class="badge badge-danger">Desativo</span></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @empty
                                    <p>Nenhum preço encontrado</p>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>

            </div>
            {{--  Inventario  --}}
            <div class="tab-pane fade" id="custom-nav-inventario" role="tabpanel"
                aria-labelledby="custom-nav-inventario-tab">


                <div class="row">

                    <div class="col col-sm-4"><label for="StockMin" class=" form-control-label"><small>Stock
                                Min.</small></label><input type="text" id="Minimo" placeholder="Digite o Stock Minimo"
                            class="input-sm form-control-sm form-control" value="{{ $artigo->armazems->first()->pivot->stock_min }}">
                    </div>

                    <div class="col col-sm-4"><label for="StockMáx" class=" form-control-label"><small>Stock
                                Máx</small></label><input type="text" id="Maximo" placeholder="Digite o Stock Máximo"
                            class="input-sm form-control-sm form-control" value="{{ $artigo->armazems->first()->pivot->stock_max }}">
                    </div>

                    <div class="col col-sm-4"><label for="StockMáx" class=" form-control-label"><small>
                        .</small></label>
                            <div><button type="button" class="btn btn-dark btn-sm">Alterar</button></div>
                    </div>

                    

                    <div class="col-lg-12" style="margin-top: 35px">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Armazéns do Artigo</strong>
                                <button type="button" class="btn btn-primary btn-sm" style="float: right" data-toggle="modal" data-target="#smallmodal2">Adicionar
                                    Armazém</button>

                            </div>

                            
                        {{--  modal pop up  --}}
                        <div class="modal fade" id="smallmodal2" tabindex="-1" role="dialog"
                        aria-labelledby="smallmodalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="smallmodalLabel">Adicionar Preço</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('artigo.add_preco',$artigo->id) }}">
                                    <div class="modal-body">


                                        {{--  <div class="col col-sm-12"><label for="preco"
                                                class=" form-control-label"><small>Valor</small></label><input
                                                type="text" id="preco" placeholder="Digite o preço" name="preco"
                                                class="input-sm form-control-sm form-control">
                                        </div>

                                        <input type="hidden" id="artigo" placeholder="Digite o preço"
                                            name="artigo_id" class="input-sm form-control-sm form-control"
                                            value="{{ $artigo->id }}">


                                        <div class="col-lg-12">
                                            <label for="vat" class=" form-control-label"><small>Grupo de
                                                    preços</small></label>
                                            <select data-placeholder="Escolha o grupo..." class="standardSelect"
                                                tabindex="1" name="gpreco">

                                                @forelse ($grupo_preco as $grupo_precos)

                                                <option value="{{ $grupo_precos->id }}">
                                                    {{ $grupo_precos->descricao }}</option>
                                                @empty
                                                <p>Nenhum grupo_preco</p>
                                                @endforelse
                                            </select>
                                        </div>

                                        <div class="col col-sm-12"><label for="nome"
                                                class=" form-control-label"><small>Por
                                                    Quntidade</small></label><input type="text" id="quantidade"
                                                placeholder="Digite a quantidade" name="quantidade"
                                                class="input-sm form-control-sm form-control" value="1">
                                        </div>  --}}

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Adicionar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">Armazém</th>
                                            <th>Bloqueado?</th>
                                            <th>Stock</th>
                                            <th>Custeio</th>
                                            <th>Saldo de Inventário</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($artigo->armazems as $armazems)
                                        <tr>
                                            {{--  @dd($armazems->pivot->quantidade)  --}}
                                            <td class="serial">{{ $armazems->armazem }}</td>
                                            <td>
                                                <div class="col-lg-3">

                                                    <label for="checkbox1" class="form-check-label ">
                                                        <input type="checkbox" id="block" name="block" value="block"
                                                            class="form-check-input"><small>Bloqueado</small>
                                                    </label>
                                                </div>
                                            </td>
                                            <td> <span class="product">{{ $armazems->pivot->quantidade }}</span> </td>
                                            <td><span class="count">{{ $artigo->precos->first()->preco }}</span></td>
                                            <td><span class="count">{{ $artigo->precos->first()->preco * $armazems->pivot->quantidade }}</span></td>
                                            <td>
                                                
                                            @if($armazems->pivot->quantidade <= $armazems->pivot->stock_min)
                                            <span class="badge badge-danger ">stock baixo</span>
                                            @endif
                                            @if($armazems->pivot->quantidade > $armazems->pivot->stock_min)

                                            <span class="badge badge-complete">stock ok</span>
                                            @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <p>Nenhum preço encontrado</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>





                    <div class="fixed-action-btn">
                        <a href="#" class="btn-floating btn-large btn-primary">
                            <i class="ti-plus"></i>
                        </a>
                    </div>


                </div>

            </div>
    </form>
</div>




@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('plugins\kartik-v-bootstrap-fileinput-5c94ab0\css\fileinput.min.css') }}">
@endpush

@push('js')

<script src="{{ asset('plugins\kartik-v-bootstrap-fileinput-5c94ab0\js\fileinput.min.js') }}"></script>
<script src="{{ asset('plugins\kartik-v-bootstrap-fileinput-5c94ab0\themes\fa\theme.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $("#attachments").fileinput({
            theme: "fa",
            uploadExtraData: {
                '_token': "{{ csrf_token() }}"
            },
            uploadUrl: '#'
        })
    });
  
</script>
@endpush