@extends('layouts.app')

@section('content')


<div class="custom-tab">

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active show" id="custom-nav-geral-tab" data-toggle="tab"
                href="#custom-nav-geral" role="tab" aria-controls="custom-nav-geral" aria-selected="true">Criar Artigo ou Serviço</a>
        </div>
    </nav>
    <form action="{{ route('artigo.store1') }}">
        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
        <div class="tab-pane fade active show" id="custom-nav-geral" role="tabpanel"
            aria-labelledby="custom-nav-geral-tab">

            {{-- <div class="row"> --}}
            {{-- <div class="col-lg-12"> --}}
            <div class="card">
                <div class="card-header"><strong>Criar</strong><small> Artigo/ Serviço</small></div>
                <div class="card-body card-block">

                    <div class="row form-group">

                        <div class="col col-sm-4"><label for="nome"
                                class=" form-control-label"><small>Artigo/ Serviço</small></label><input type="text" id="company"
                                placeholder="Digite o nome" name="artigo" class="input-sm form-control-sm form-control">
                        </div>

                        <div class="col col-sm-8"><label for="vat"
                                class=" form-control-label"><small>Descrição</small></label><textarea
                                name="descricao" id="textarea-input" rows="2" placeholder="Descrição..."
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
                            <select data-placeholder="Escolha Tipo de Artigo" name="TArtigo" class="standardSelect" tabindex="2">

                                <option value=""></option>
                                @forelse ($tipo_artigo as $tipo_artigos)

                                <option value="{{ $tipo_artigos->id }}">{{ $tipo_artigos->tipo }}</option>
                                @empty
                                <p>Nenhum Tipo de Artigo</p>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="vat" class=" form-control-label"><small>Conta_Rendimento</small></label>
                            <select data-placeholder="Escolha conta de Rendimento" name="contaRendimento" class="standardSelect" tabindex="2">

                                <option value=""></option>
                                @forelse ($conta_rendimento as $conta_rendimentos)

                                <option value="{{ $conta_rendimentos->id }}">{{ $conta_rendimentos->conta }}</option>
                                @empty
                                <p>Nenhuma conta de Rendimento</p>
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
                <button type="submit" class="btn btn-primary btn-sm" style="float: right">Criar</button>

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