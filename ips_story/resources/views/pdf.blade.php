<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IPS</title>
    <meta name="description" content="IPS">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
@include('pdf-style')
<div class="custom-tab row">

    <div class="top-left" style="margin-left: 1%">

        {{-- <div class="navbar-brand "><img src="{{asset('images/lg-01.png')}}" alt="IPS"></div> --}}
    <div class="navbar-brand col-lg-12">
        @php
        $image = public_path()."/images/lg-01.png";
        $content = file_get_contents($image);
        $encodedImage = (base64_encode($content));
        @endphp
        {{-- $obj->logoB64(); --}}

        <img src="data:image/png;base64,{{ $encodedImage }}" alt="IPS">
    </div>
    {{-- <div class="col-lg-12"> --}}
    <span class="badge badge-light ">{{ $empresa->domicilio_atividade->website }}</span>
    {{-- </div> --}}

    <h6> {{ $empresa->nome_comercial }} </h6>
    <h6>{{ $empresa->domicilio_atividade->endereco->provincium->capital }}/ Rua
        {{ $empresa->domicilio_atividade->endereco->rua }}</h6>
    <h6>Nuit: {{ $empresa->nuit }} </h6>


    <br><br><br>

</div>

{{--  <div class="navbar-brand col-lg-12" style="background-color: darkcyan"><img src="{{asset('images/lg-01.png')}}"
alt="IPS">
</div> --}}
{{--  <a class="navbar-brand hidden" href="./"><img src="{{asset('images/lg-01.png')}}" alt="IPS"></a> --}}
</div>


<div class="col-lg-12  text-right">
    <strong>Exmo.(s) Sr.(s)</strong><br>

    <strong>{{ $cotacao->cliente->nome }}</strong><br>
    <h6>{{ $cotacao->cliente->endereco->provincium->capital }}/ {{ $cotacao->cliente->endereco->rua }}</h6>
    <h6>Nuit: {{ $cotacao->cliente->nuit }} </h6>

    <div class=" text-center" style="font-size: 120%;"><span class="badge badge-light">
            Cotação
            {{  Auth::user()->funcionario->departamentos()->first()->empresa->domicilio_atividade->endereco->provincium->capital }}
            Num. {{ $cotacao->num_cotacao }}
        </span>
    </div>
    <h6 class=" text-right" style="font-size: 80%">Original</h6>
    <br>


    <div class="divider" style="border-bottom: 1px solid #636363"></div>

    <div class="row float-left">

        <span style="font-size: 80%; padding: .75rem 1.25rem;">Quem vende: {{ $cotacao->funcionario->user->name }}
        </span>

        <span style="font-size: 80%; padding: .75rem 1.25rem;">Termos de Pagamento:
            {{ $cotacao->termo_pagamento->termo }}</span>

        <span style="font-size: 80%; padding: .75rem 1.25rem;">Limite de Pagamento:
            {{ $cotacao->termo_pagamento->limite_pagamento }}</span>

        <span style="font-size: 80%; padding: .75rem 1.25rem;">Moeda: {{ $cotacao->cliente->moeda->sigla }}</span>

        <span style="font-size: 80%; padding: .75rem 1.25rem;">Cambio:
            {{ $cotacao->cliente->moeda->cambio_atual }}</span>
        <br>

        <span style="font-size: 80%; padding: .75rem 1.25rem;">Condição de Pagamento:
            Fatura {{ $cotacao->regime_pagamento->dias }} dias</span>

        <span style="font-size: 80%; padding: .75rem 1.25rem;">Data de Faturação:
            {{ $cotacao->created_at }}</span>

    </div>

    <div class="divider" style="border-bottom: 1px solid #636363"></div>


    {{--  Tabela  --}}

    <div class="table-stats order-table ov-h" id="test">
        <table class="table " id="target" style="font-size: 80%">
            <thead>
                <tr>
                    <th class="serial">#</th>
                    <th class="serial">Artigo</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Preço Unit.</th>
                    <th>Desconto</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                {{--  @dd($cotacao->artigos)  --}}
                @forelse ($cotacao->artigos as $artigo)
                <tr>
                    <td class="numeric code"> {{ $artigo->pivot->id }}</td>
                    <td class="text-edit name">{{ $artigo->artigo }}</td>
                    <td class="text-edit product"> {{ $artigo->descricao }}</td>
                    <td class="numeric-edit quantity"> {{ $artigo->pivot->quantidade }}</td>
                    <td class="numeric-edit unit_amount"> {{ $artigo->pivot->preco }}</td>
                    <td class="numeric-edit discount"> {{ $artigo->pivot->desconto }} </td>

                    <td><span
                            class="">{{ $artigo->pivot->quantidade * $artigo->pivot->preco-$artigo->pivot->desconto }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>
                        Nenhum produto ou serviço encontrado
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div> <!-- /.table-stats -->

    <div class="divider" style="border-bottom: 1px solid #cacaca"></div>

    <div class="row">
        <div class="col-sm-6">
            <strong class="text-left" style="font-size: 80%; float: left;">Resumo de IVA</strong>
            <br>

            {{-- <div class="weather-category twt-category"> --}}
            {{-- <ul> --}}
            {{-- <span class="active"  style="color: black"> --}}
            <span style="font-size: 80%; float: left;"><strong>Taxa</strong> {{ $cotacao->regime_iva->percentagem }}% |
            </span>

            {{-- </span> --}}
            {{-- <span style="color: black"> --}}
            <span style="font-size: 80%; float: left;"><strong>Insidencia</strong> {{ $cotacao->subtotal }} | </span>
            {{-- </span> --}}
            {{-- <span style="color: black"> --}}
            <span style="font-size: 80%; float: left;"><strong>Total IVA</strong> {{  $cotacao->iva }} | </span>

            {{-- </span> --}}
            {{-- </ul> --}}
            {{-- </div> --}}
        </div>


        <div class="row" style="float: right;">
            <div class="col-lg-4 text-right">
                <table class="table table-responsive text-right" id="target" style="float: right; font-size: 80%">
                    <tr>
                        <td> Mercadoria e/ Serviço</td>
                        <td>{{ $cotacao->subtotal }}</td>
                    </tr>
                    <tr>
                        <td>Descontos Comerciais</td>
                        <td>{{ $cotacao->desconto }}.00</td>
                    </tr>
                    <tr>
                        <td>Descontos Financeiros</td>
                        <td>{{ $cotacao->desconto }}.00</td>
                    </tr>
                    <tr>
                        <td>Adiantamentos</td>
                        <td>0.00</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #636363">
                        <td>Iva</td>
                        <td>{{  $cotacao->iva }}</td>
                    </tr>
                    <tr style="border-top: #636363; font-size: 150%">
                        <td style="border-top: #636363; color: black;"><strong>Total</strong></td>
                        <td style="border-top: #636363; color: black;"><strong>{{ $cotacao->total }}</strong></td>
                    </tr>

                </table>
            </div>
        </div>

        <div class="col-lg-4">
            <strong class="text-left" style="float: left; font-size: 80%">DETALHES BANCARIOS</strong>
        </div>
        <table class="table table-responsive" id="target" style="font-size: 80%">

            @forelse ($dadosBancariosHas as $dadosBancarios)
            <tr>
                <td> {{ $dadosBancarios->dados_bancario->nome_banco }}</td>
                <td>conta {{ $dadosBancarios->dados_bancario->numero_conta }}</td>
                <td>Nib {{ $dadosBancarios->dados_bancario->nib }}</td>

            </tr>
            @empty
            <tr>
                <td>
                    *Nenhum dado bancario Encontrado*
                </td>
            </tr>
            @endforelse

        </table>
    </div>


</div>

<div class="col-sm-8">
    <h6 style="font-size: 80%">Documento processado por computador </h6>
</div>

<div class="divider col-sm-12" style="border-bottom: 1px solid #000009"></div>



<h6 style="font-size: 80%" style="margin-left: 1%;">
    {{ $empresa->nome_comercial }}
    * {{ $empresa->domicilio_atividade->endereco->provincium->capital }} * Rua
    {{ $empresa->domicilio_atividade->endereco->rua }}
    * Nuit: {{ $empresa->nuit }} * (+258) {{ $empresa->domicilio_atividade->telemovel }}
    * E-mail: {{ $empresa->domicilio_atividade->email }} * WebSite: {{ $empresa->domicilio_atividade->website }}
</h6>


</div>


{{-- @endsection --}}

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


@endpush