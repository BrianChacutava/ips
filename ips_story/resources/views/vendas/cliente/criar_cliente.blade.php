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
            <a class="nav-item nav-link" id="custom-nav-fornecedor-tab" data-toggle="tab" href="#custom-nav-fornecedor"
                role="tab" aria-controls="custom-nav-fornecedor" aria-selected="false">Fornecedor</a>
            <a class="nav-item nav-link" id="custom-nav-banco-tab" data-toggle="tab" href="#custom-nav-banco" role="tab"
                aria-controls="custom-nav-banco" aria-selected="false">Instituição Bancaria</a>
        </div>
    </nav>

    <form action="{{ route('cliente.store1') }}">

    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
            {{--  geral  --}}
            <div class="tab-pane fade active show" id="custom-nav-geral" role="tabpanel"
                aria-labelledby="custom-nav-geral-tab">



                <div class="card">
                    <div class="card-header"><strong>Criar</strong><small> Entidade</small></div>

                    {!! csrf_field() !!}

                    <div class="card-body card-block">
                        <div class="row form-group">

                            <div class="col col-sm-4"><label for="nome"
                                    class=" form-control-label"><small>Nome</small></label><input type="text"
                                    name="nome" id="nome" placeholder="Digite o nome"
                                    class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="sigla"
                                    class=" form-control-label"><small>Sigla</small></label><input type="text"
                                    name="sigla" id="sigla" placeholder="Digite a sigla"
                                    class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="nuit"
                                    class=" form-control-label"><small>NUIT</small></label><input type="text"
                                    name="nuit" id="vat" placeholder="Digite o nuite"
                                    class="input-sm form-control-sm form-control"></div>



                            <div class="col col-sm-4"><label for="email"
                                    class=" form-control-label"><small>Email</small></label><input type="email"
                                    name="email" id="vat" placeholder="Digite o email"
                                    class="input-sm form-control-sm form-control"></div>

                            <div class="col-lg-4">
                                <label for="pais" class=" form-control-label"><small>Pais</small></label>
                                <select data-placeholder="Escolha o pais..." class="standardSelect" name="pais_id"
                                    id="paises" tabindex="1">
                                    <option value="" label="default"></option>
                                    @forelse ($Pais as $pais)

                                    <option value="{{ $pais->id }}">{{ $pais->nome }}</option>
                                    @empty
                                    <p>Nenhuma Pais</p>
                                    @endforelse
                                </select>
                            </div>


                            <div class="col-lg-4">
                                <label for="moeda" class=" form-control-label"><small>Moeda</small></label>
                                <select data-placeholder="Escolha Moeda" class="standardSelect" name="moeda"
                                    tabindex="2">
                                    @forelse ($moedas as $moeda)

                                    <option value="{{ $moeda->id }}">{{ $moeda->nome }}</option>
                                    @empty
                                    <p>Nenhuma Moeda</p>
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-lg-3" style="margin-left: 20px; margin-top: 35px;">

                                <label for="checkbox1" class="form-check-label ">
                                    <input type="checkbox" id="checkbox1" name="pessoa" value="option1"
                                        class="form-check-input">Pessoa
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
                                    id="rua" placeholder="Digite o nome da Rua"
                                    class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="vat"
                                    class=" form-control-label"><small>Avenida</small></label><input type="text"
                                    name="avenida" id="avenida" placeholder="AV..."
                                    class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Codigo
                                        Postal</small></label><input type="text" name="codigoP" id="vat"
                                    placeholder="Digite o codigo postal" class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col-lg-4">
                                <label for="vat" class=" form-control-label"><small>Provincia</small></label>
                                <select data-placeholder="Escolha a provincia..." name="provincia_id" id="provincia"
                                    class="standardSelect" tabindex="1">
                                    <option value="" label="default"></option>
                                </select>
                            </div>

                            <div class="col col-sm-4"><label for="bairo"
                                    class=" form-control-label"><small>Bairo</small></label><input type="text"
                                    name="bairo" id="Bairo" placeholder="Digite o nome do Bairo"
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
                                    name="telefone" id="telefone" placeholder="Digite o telefone"
                                    class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="TelefoneAd"
                                    class=" form-control-label"><small>Telefone
                                        adicional</small></label><input type="text" name="telAd" id="porta"
                                    placeholder="Digite o telefone fixo" class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="Fax"
                                    class=" form-control-label"><small>Fax</small></label><input type="Fax" name="Fax"
                                    id="Fax" placeholder="Digite o fax" class="input-sm form-control-sm form-control">
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            {{--  cliente  --}}
            <div class="tab-pane fade" id="custom-nav-cliente" role="tabpanel" aria-labelledby="custom-nav-cliente-tab">

                <div class="row">
                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Grupo de Clientes</small></label>
                        <select data-placeholder="Escolha o clientes..." name="gpcliente" class="standardSelect"
                            tabindex="1">

                            @forelse ($grupo_cliente as $grupo_clientes)

                            <option value="{{ $grupo_clientes->id }}">{{ $grupo_clientes->descricao }}</option>
                            @empty
                            <p>Nenhuma Moeda</p>
                            @endforelse
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Metodo de Pagamento</small></label>
                        <select data-placeholder="Escolha o metodo de pagamento..." name="MtpagamentoC"
                            class="standardSelect" tabindex="1">

                            @forelse ($metodo_pagamento as $metodo_pagamentos)

                            <option value="{{ $metodo_pagamentos->id }}">{{ $metodo_pagamentos->metodo }}</option>
                            @empty
                            <p>Nenhum metodo</p>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px">
                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Regime de Imposto</small></label>
                        <select data-placeholder="Escolha o imposto..." name="regimeC" class="standardSelect"
                            tabindex="1">

                            @forelse ($iva as $ivas)

                            <option value="{{ $ivas->id }}">{{ $ivas->regime }}</option>
                            @empty
                            <p>Nenhum Imposto</p>
                            @endforelse
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Termo de Pagamento</small></label>
                        <select data-placeholder="Escolha Termo de pagamento..." name="RpagamentoC"
                            class="standardSelect" tabindex="1">

                            
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
                            class="form-check-input"><small>Bloqueado</small>
                    </label>
                </div>


                <div class="col-lg-12">
                    <button type="submit" name="cliente" value="cliente" class="btn btn-primary btn-sm" style="float: right">Guardar e
                        Novo</button>
                </div>

            </div>
            {{--  Fornecedor  --}}
            <div class="tab-pane fade" id="custom-nav-fornecedor" role="tabpanel"
                aria-labelledby="custom-nav-fornecedor-tab">


                <div class="row">
                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Grupo de Fornecedor</small></label>
                        <select data-placeholder="Escolha o grupo de fornecedor..." name="gfornecedor" class="standardSelect" tabindex="1">
                            
                            @forelse ($grupo_fornecedor as $grupo_fornecedors)

                            <option value="{{ $grupo_fornecedors->id }}">{{ $grupo_fornecedors->descricao }}</option>
                            @empty
                            <p>Nenhuma Grupo encontrado</p>
                            @endforelse
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Metodo de Pagamento</small></label>
                        <select data-placeholder="Escolha o metodo de pagamento..." name="MtpagamentoF" class="standardSelect" tabindex="1">
                            
                            @forelse ($metodo_pagamento as $metodo_pagamentos)

                            <option value="{{ $metodo_pagamentos->id }}">{{ $metodo_pagamentos->metodo }}</option>
                            @empty
                            <p>Nenhum metodo</p>
                            @endforelse
                        </select>
                    </div>
                </div>

                {{-- <div class="col-lg-4">
                    <label for="vat" class=" form-control-label"><small>Condição de Envio</small></label>
                    <select data-placeholder="Escolha o metodo de pagamento..." class="standardSelect" tabindex="1">
                        <option value="" label="default"></option>
                        <option value="United States">Correio</option>
                        <option value="United Kingdom">Em Mão</option>
                        <option value="Afghanistan">Não Aplicavel</option>
                        <option value="Aland Islands">Viatura Particular</option>
                        <option value="Aland Islands">Transportadora</option>
                    </select>
                </div> --}}

                <div class="row" style="margin-top: 20px">
                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Regime de Imposto</small></label>
                        <select data-placeholder="Escolha o imposto..." name="regimeF" class="standardSelect" tabindex="1">
                            {{--  <option value="" label="default"></option>
                            <option value="United States">Exportaacao</option>
                            <option value="United Kingdom">Insento a IVA</option>
                            <option value="Afghanistan">IVA Normal</option>
                            <option value="Aland Islands">Tributo Expecial Unificado</option>  --}}
                            

                            @forelse ($iva as $ivas)

                            <option value="{{ $ivas->id }}">{{ $ivas->regime }}</option>
                            @empty
                            <p>Nenhum Imposto</p>
                            @endforelse
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label for="vat" class=" form-control-label"><small>Condição de Pagamento</small></label>
                        <select data-placeholder="Escolha o tipo de pagamento..." name="regime_pagamentoF" class="standardSelect" tabindex="1">
                            
                            
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
                        <input type="checkbox" id="block" name="blockF" value="block"
                            class="form-check-input"><small>Bloqueado</small>
                    </label>
                </div>


                <div class="col-lg-12">
                    <button type="submit" value="fornecedor" name="cliente" class="btn btn-primary btn-sm" style="float: right">Guardar
                        e Novo</button>
                </div>


            </div>
            {{--  Banco  --}}
            <div class="tab-pane fade" id="custom-nav-banco" role="tabpanel" aria-labelledby="custom-nav-banco-tab">

                <div class="card">
                    <div class="card-header"><strong>Criar</strong><small> Entidade</small></div>
                    <div class="card-body card-block">

                        <div class="row form-group">

                            <div class="col col-sm-4"><label for="nome" class=" form-control-label"><small>Nome Do
                                        Banco</small></label><input type="text" id="company"
                                    placeholder="Digite o nome do Banco" name="nomeBanco" class="input-sm form-control-sm form-control">
                            </div>

                            <div class="col col-sm-4"><label for="nome" class=" form-control-label"><small>Numero de
                                Conta</small></label><input type="text" name="numConta" id="company"
                            placeholder="Digite o numero de Conto"
                            class="input-sm form-control-sm form-control">
                        </div>
                        </div>
                        <div class="row form-group">


                            <div class="col col-sm-4"><label for="vat"
                                    class=" form-control-label"><small>NIB</small></label><input type="text" name="nib" id="vat"
                                    placeholder="Digite o NIB" class="input-sm form-control-sm form-control"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <button type="submit"  value="banco" name="cliente" class="btn btn-primary btn-sm" style="float: right">Guardar e
                        Novo</button>
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
            alert(html)

            jQuery('select#provincia.standardSelect').html(html);
            console.log(jQuery('select#provincia'));
    }

    jQuery(document).ready(chageProvincesByCountry);
    jQuery(document).on('change', '#paises',chageProvincesByCountry);
</script>

@endpush