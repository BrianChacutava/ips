@extends('layouts.app')

@section('content')

@if (session('message'))
    <div class="alert alert-success fade show" role="alert">Sucess. <a href="javascript:void(0);"
            class="alert-link">{{ session('message') }}</a>
    </div>
    @endif

<div class="custom-tab">

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active show" id="custom-nav-geral-tab" data-toggle="tab"
                href="#custom-nav-geral" role="tab" aria-controls="custom-nav-geral" aria-selected="true">Geral</a>
            <a class="nav-item nav-link" id="custom-nav-cliente-tab" data-toggle="tab" href="#custom-nav-cliente"
                role="tab" aria-controls="custom-nav-cliente" aria-selected="false">Cliente</a>
        </div>
    </nav>

    <form action="{{ route('cliente.update1',$cliente->id) }}">

    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
            {{--  geral  --}}
            <div class="tab-pane fade active show" id="custom-nav-geral" role="tabpanel"
                aria-labelledby="custom-nav-geral-tab">



                <div class="card">
                    <div class="card-header"><strong>Editar</strong><small> Entidade</small></div>

                    {!! csrf_field() !!}

                    <div class="card-body card-block">
                        <div class="row form-group">

                            <div class="col col-sm-4"><label for="nome"
                                    class=" form-control-label"><small>Nome</small></label><input type="text"
                                    name="nome" id="nome" placeholder="Digite o nome" value="{{ $cliente->nome }}"
                                    class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="sigla"
                                    class=" form-control-label"><small>Sigla</small></label><input type="text"
                                    name="sigla" id="sigla" placeholder="Digite a sigla" value="{{ $cliente->sigla }}"
                                    class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="nuit"
                                    class=" form-control-label"><small>NUIT</small></label><input type="text"
                                    name="nuit" id="vat" placeholder="Digite o nuite" value="{{ $cliente->nuit }}"
                                    class="input-sm form-control-sm form-control">
                            </div>



                                    <div class="col col-sm-4"><label for="email"
                                        class=" form-control-label"><small>Email</small></label><input type="email"
                                        name="email" id="vat" placeholder="Digite o email" value="{{ $cliente->email }}"
                                        class="input-sm form-control-sm form-control">
                                    </div>

                                    <div class="col col-sm-4"><label for="email"
                                        class=" form-control-label"><small>Moeda</small></label><input type="Moeda"
                                        name="Moeda" id="vat"  value="{{ $cliente->moeda->sigla }}"
                                        class="input-sm form-control-sm form-control" disabled="">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="vat" class=" form-control-label"><small>Alterar Moeda</small></label>
                                        <select data-placeholder="Escolha o clientes..." name="moeda" class="standardSelect"
                                    tabindex="1">
                                            <option value="" label="default"></option>
                                            
                                            @forelse ($moedas as $moeda)
                                            
                                            <option value="{{ $moeda->id }}">{{ $moeda->sigla }}</option>
                                            
                                            @empty
                                            <p>Nenhuma moeda</p>
                                            @endforelse
                                        </select>
                                    </div>
                                    

                            <div class="col-lg-3" style="margin-left: 20px; margin-top: 35px;">

                                <label for="checkbox1" class="form-check-label ">
                                    <input type="checkbox" id="checkbox1" name="pessoa" value="1"
                                        class="form-check-input">blockeado
                                </label>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><small> Endereço</small></div>
                    <div class="card-body card-block">

                        <div class="row form-group">

                            <div class="col col-sm-8"><label for="nome"
                                    class=" form-control-label"><small>Rua</small></label><input type="text" name="rua"
                                    id="rua" placeholder="Digite o nome da Rua" value="{{ $cliente->endereco->rua }}"
                                    class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="vat"
                                    class=" form-control-label"><small>Avenida</small></label><input type="text"
                                    name="avenida" id="avenida" placeholder="AV..." value="{{ $cliente->endereco->av }}"
                                    class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Codigo
                                        Postal</small></label><input type="text" name="codigoP" id="vat" value="{{ $cliente->endereco->cod_postal }}"
                                    placeholder="Digite o codigo postal" class="input-sm form-control-sm form-control">
                            </div>

                            
                            <div class="col col-sm-4"><label for="vat"
                                class=" form-control-label"><small>Provincia</small></label><input type="text"
                                name="avenida" id="avenida" placeholder="Provincia..." value="{{ $cliente->endereco->provincium->nome }}"
                                class="input-sm form-control-sm form-control" disabled="">
                        </div>
                            <div class="col-lg-4">
                                <label for="vat" class=" form-control-label"><small>Alterar Provincia</small></label>
                                <select data-placeholder="Escolha o clientes..." name="provincia" class="standardSelect"
                            tabindex="1">
                                    <option value="" label="default"></option>
                                    
                                    @forelse ($provincia as $provincias)
                                    @if($provincias->pai->id == $cliente->endereco->provincium->pai->id)
                                    <option value="{{ $provincias->id }}">{{ $provincias->nome }}</option>
                                    @endif
                                    @empty
                                    <p>Nenhuma provincia</p>
                                    @endforelse
                                </select>
                            </div>

                            <div class="col col-sm-4"><label for="bairo"
                                    class=" form-control-label"><small>Bairo</small></label><input type="text"
                                    name="bairo" id="Bairo" placeholder="Digite o nome do Bairo" value="{{ $cliente->endereco->bairo }}"
                                    class="input-sm form-control-sm form-control">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"><small> Contacto</small></div>
                    <div class="card-body card-block">

                        <div class="row form-group">


                            <div class="col col-sm-4"><label for="telefone"
                                class=" form-control-label"><small>Telefone</small></label><input type="text"
                                name="telefone" id="telefone" placeholder="Digite o telefone"value="{{ $cliente->telefone }}"
                                class="input-sm form-control-sm form-control">
                        </div>
                        <div class="col col-sm-4"><label for="telefone"
                                class=" form-control-label"><small>Web Site</small></label><input type="text"
                                name="website" id="website" placeholder="Ex. www.xyz.com"value="{{ $cliente->website }}"
                                class="input-sm form-control-sm form-control">
                        </div>


                        </div>
                    </div>
                </div>

            </div>

            {{--  cliente  --}}
            <div class="tab-pane fade" id="custom-nav-cliente" role="tabpanel" aria-labelledby="custom-nav-cliente-tab">

                <div class="row">
                    
                    <div class="col col-sm-4"><label for="telefone"
                        class=" form-control-label"><small>Grupo de Clientes</small></label><input type="text"
                        name="telefone" id="telefone" placeholder="Digite o telefone"value="{{ $cliente->gupo_cliente->descricao }}"
                        class="input-sm form-control-sm form-control" disabled="">
                </div>

                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Alterar G. Cliente</small></label>
                        <select data-placeholder="Escolha o clientes..." name="gpcliente" class="standardSelect"
                            tabindex="1">
                            <option value="" label="default"></option>

                            @forelse ($grupo_cliente as $grupo_clientes)

                            <option value="{{ $grupo_clientes->id }}">{{ $grupo_clientes->descricao }}</option>
                            @empty
                            <p>Nenhuma Moeda</p>
                            @endforelse
                        </select>
                    </div>

                    

                    <div class="col col-sm-4"><label for="telefone"
                        class=" form-control-label"><small>Metodo de Pagamento</small></label><input type="text"
                        name="telefone" id="telefone" placeholder="Digite o telefone"value="{{ $cliente->metode_pagamento->metodo }}"
                        class="input-sm form-control-sm form-control" disabled="">
                </div>
                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Alterar M. Pagamento</small></label>
                        <select data-placeholder="Escolha o metodo de pagamento..." name="MtpagamentoC"
                            class="standardSelect" tabindex="1">
                            <option value="" label="default"></option>

                            @forelse ($metodo_pagamento as $metodo_pagamentos)

                            <option value="{{ $metodo_pagamentos->id }}">{{ $metodo_pagamentos->metodo }}</option>
                            @empty
                            <p>Nenhum metodo</p>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px">
                    

                    <div class="col col-sm-4"><label for="telefone"
                        class=" form-control-label"><small>Regime de Imposto</small></label><input type="text"
                        name="telefone" id="telefone" placeholder="Digite o telefone" value="{{ $cliente->regime_iva->regime }}"
                        class="input-sm form-control-sm form-control" disabled="">
                </div>
                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Alterar Regime. Imposto</small></label>
                        <select data-placeholder="Escolha o imposto..." name="regimeC" class="standardSelect"
                            tabindex="1">
                            <option value="" label="default"></option>

                            @forelse ($iva as $ivas)

                            <option value="{{ $ivas->id }}">{{ $ivas->regime }}</option>
                            @empty
                            <p>Nenhum Imposto</p>
                            @endforelse
                        </select>
                    </div>

                                        

                    <div class="col col-sm-4"><label for="telefone"
                        class=" form-control-label"><small>Termo de Pagamento</small></label><input type="text"
                        name="telefone" id="telefone" placeholder="Digite o telefone"value="{{ $cliente->regime_pagamento->descricao }}"
                        class="input-sm form-control-sm form-control" disabled="">
                </div>
                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Alterar T. Pagamento</small></label>
                        <select data-placeholder="Escolha Termo de pagamento..." name="RpagamentoC"
                            class="standardSelect" tabindex="1">

                            <option value="" label="default"></option>
                            
                            @forelse ($regime_pagamento as $regime_pagamentos)

                            <option value="{{ $regime_pagamentos->id }}"> {{ $regime_pagamentos->descricao }}</option>
                            @empty
                            <p>Nenhum Imposto</p>
                            @endforelse
                        </select>
                    </div>
                </div>


                <div class="col-lg-3" style="margin-left: 20px; margin-top: 35px;">

                    <label for="checkbox1" class="form-check-label ">
                        <input type="checkbox" id="block" name="block" value="block"
                            class="form-check-input"><small>Bloquear</small>
                    </label>
                </div>


                <div class="col-lg-12">
                    <button type="submit" name="cliente_alterar" value="cliente_alterar" class="btn btn-primary btn-sm" style="float: right">Alterar</button>
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


<script src="{{ asset('js\js\collections.js') }}"></script>




<script>
    jQuery(document).ready(function () {
        

        jQuery("#attachments").fileinput({
            theme: "fa",
            uploadExtraData: {
                '_token': "{{ csrf_token() }}"
            },
            uploadUrl: '#'
        })
    });
  
</script>

<script>
    function chageProvincesByCountry(){

        const paises = {!! $Pais->toJson() !!};
        const selectedOption = jQuery('select#paises').val()
        
        let pais = (new Searchable(paises)).data(selectedOption);
        
        let html = '';
        if(pais != null)

        jQuery.each(pais.provincia, function (index, value) {

            html += "<option value='"+value.id+"'>"+value.nome+"</option>"

            });

            jQuery('select#provincia.standardSelect').html(html);
            console.log(jQuery('select#provincia'));
    }

    jQuery(document).ready(chageProvincesByCountry);
    jQuery(document).on('change', '#paises',chageProvincesByCountry);
</script>

@endpush