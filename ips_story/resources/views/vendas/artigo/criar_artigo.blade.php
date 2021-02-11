@extends('layouts.app')

@section('content')


<div class="custom-tab">

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active show" id="custom-nav-geral-tab" data-toggle="tab"
                href="#custom-nav-geral" role="tab" aria-controls="custom-nav-geral" aria-selected="true">Geral</a>
            <a class="nav-item nav-link" id="custom-nav-vendas-tab" data-toggle="tab" href="#custom-nav-vendas"
                role="tab" aria-controls="custom-nav-vendas" aria-selected="false">Vendas</a>
            <a class="nav-item nav-link" id="custom-nav-inventario-tab" data-toggle="tab" href="#custom-nav-inventario"
                role="tab" aria-controls="custom-nav-inventario" aria-selected="false">Inventario</a>
        </div>
    </nav>
    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
        <div class="tab-pane fade active show" id="custom-nav-geral" role="tabpanel"
            aria-labelledby="custom-nav-geral-tab">

            {{-- <div class="row"> --}}
            {{-- <div class="col-lg-12"> --}}
            <div class="card">
                <div class="card-header"><strong>Criar</strong><small> Artigo</small></div>
                <div class="card-body card-block">

                    <div class="row form-group">

                        <div class="col col-sm-4"><label for="nome"
                                class=" form-control-label"><small>Artigo</small></label><input type="text" id="company"
                                placeholder="Digite o nome" name="artigo" class="input-sm form-control-sm form-control">
                        </div>

                        <div class="col col-sm-8"><label for="vat"
                                class=" form-control-label"><small>Descrição</small></label><textarea
                                name="descricao" id="textarea-input" rows="3" placeholder="Descrição..."
                                class="form-control"></textarea></div>


                        <div class="col-lg-4">
                            <label for="vat" class=" form-control-label"><small>Unidade Base</small></label>
                            <select data-placeholder="Escolha a unidade base..." name="unidadeBase" class="standardSelect" tabindex="1">

                                @forelse ($unidade as $unidades)

                                <option value="{{ $unidades->id }}">{{ $unidades->descricao }}</option>
                                @empty
                                <p>Nenhum unidade inserida</p>
                                @endforelse
                            </select>
                        </div>


                        <div class="col-lg-4">
                            <label for="vat" class=" form-control-label"><small>Tipo de Artigo</small></label>
                            <select data-placeholder="Escolha Moeda" name="TArtigo" class="standardSelect" tabindex="2">

                                @forelse ($tipo_artigo as $tipo_artigos)

                                <option value="{{ $tipo_artigos->id }}">{{ $tipo_artigos->tipo }}</option>
                                @empty
                                <p>Nenhum unidade inserida</p>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="vat" class=" form-control-label"><small>Conta_Rendimento</small></label>
                            <select data-placeholder="Escolha Moeda" name="contaRendimento" class="standardSelect" tabindex="2">

                                @forelse ($tipo_artigo as $tipo_artigos)

                                <option value="{{ $tipo_artigos->id }}">{{ $tipo_artigos->tipo }}</option>
                                @empty
                                <p>Nenhum unidade inserida</p>
                                @endforelse
                            </select>
                        </div>

                        {{-- <div class="col col-sm-4"><label for="vat"
                            class=" form-control-label"><small>Codigo de Barras</small></label><input type="text" id="vat"
                            placeholder="Digite o codigo de Barras" class="input-sm form-control-sm form-control">
                        </div> --}}
                    </div>
                </div>
            </div>
            {{-- </div> --}}
            {{-- </div> --}}


            {{-- <div class="row"> --}}
            {{-- <div class="col-lg-12"> --}}
            <div class="card">
                <div class="card-header"><small> Detalhes</small></div>
                <div class="card-body card-block">

                    <div class="row form-group">

                        <div class="col col-sm-8"><label for="nome"
                                class=" form-control-label"><small>Marca</small></label><input type="text" id="marca"
                                placeholder="Digite a marca" name="marca" class="input-sm form-control-sm form-control">
                        </div>

                        <div class="col col-sm-4"><label for="vat"
                                class=" form-control-label"><small>Modelo</small></label><input type="text" id="porta"
                                placeholder="Digite o modelo" name="modelo" class="input-sm form-control-sm form-control">
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row"> --}}

            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary btn-sm" style="float: right">Guardar e Novo</button>

            </div>

            <div class="fixed-action-btn">
                <a href="#" class="btn-floating btn-large btn-primary">
                    <i class="ti-plus"></i>
                </a>
            </div>

        </div>
        <div class="tab-pane fade" id="custom-nav-vendas" role="tabpanel" aria-labelledby="custom-nav-vendas-tab">

            <div class="col-lg-4">
                <label for="vat" class=" form-control-label"><small>Unidade de Venda</small></label>
                <select data-placeholder="Escolha a unidade..." class="standardSelect" tabindex="1">

                    @forelse ($unidade as $unidades)

                    <option value="{{ $unidades->id }}">{{ $unidades->descricao }}</option>
                    @empty
                    <p>Nenhum unidade inserida</p>
                    @endforelse
                </select>
            </div>


            <div class="col-lg-3" style="margin-left: 20px; margin-top: 35px;">

                <label for="checkbox1" class="form-check-label ">
                    <input type="checkbox" id="block" name="block" value="block"
                        class="form-check-input"><small>Bloqueado</small>
                </label>
            </div>

            <div class="col-lg-12" style="margin-top: 35px">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tabela de Preço</strong>
                        <button type="button" class="btn btn-primary btn-sm" style="float: right">Adicionar
                            Preço</button>

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
                                <tr>
                                    <td class="serial">1.</td>
                                    <td> <span class="name">venda ao publico</span> </td>
                                    <td> <span class="count">2500</span> </td>
                                    <td><span class="name">unit</span></td>
                                    <td>
                                        <span class="badge badge-complete">Ativo</span>
                                    </td>
                                </tr>
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
        <div class="tab-pane fade" id="custom-nav-inventario" role="tabpanel"
            aria-labelledby="custom-nav-inventario-tab">


            <div class="row">
                <div class="col-lg-4">
                    <label for="vat" class=" form-control-label"><small>Definir Armazem</small></label>
                    <select data-placeholder="Escolha o Armazem..." class="standardSelect" tabindex="1">
                        <option value="" label="default"></option>
                        <option value="United States">Armazem1</option>
                        <option value="United Kingdom">Armazem2</option>
                    </select>
                </div>
            </div>

            <div class="row">

                <div class="col col-sm-4"><label for="StockMin" class=" form-control-label"><small>Stock
                            Min.</small></label><input type="text" id="Minimo" placeholder="Digite o Stock Minimo"
                        class="input-sm form-control-sm form-control">
                </div>

                <div class="col col-sm-4"><label for="StockMáx" class=" form-control-label"><small>Stock
                            Máx</small></label><input type="text" id="Maximo" placeholder="Digite o Stock Máximo"
                        class="input-sm form-control-sm form-control">
                </div>


                <div class="col-lg-12" style="margin-top: 35px">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Armazéns do Artigo</strong>
                            <button type="button" class="btn btn-primary btn-sm" style="float: right">Adicionar
                                Armazém</button>

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
                                    <tr>
                                        <td class="serial">armazem1.</td>
                                        <td>
                                            <div class="col-lg-3">

                                                <label for="checkbox1" class="form-check-label ">
                                                    <input type="checkbox" id="block" name="block" value="block"
                                                        class="form-check-input"><small>Bloqueado</small>
                                                </label>
                                            </div>
                                        </td>
                                        <td> <span class="product">100</span> </td>
                                        <td><span class="count">500</span></td>
                                        <td><span class="count">50000</span></td>
                                        <td>
                                            <span class="badge badge-complete">Ativo</span>
                                        </td>
                                    </tr>
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