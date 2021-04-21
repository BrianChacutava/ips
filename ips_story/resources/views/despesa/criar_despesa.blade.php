@extends('layouts.app')

@section('content')

<form action="{{ route('despesa.store1') }}">
    {!! csrf_field() !!}

    <div class="card">
        <div class="card-header"><strong>Criar</strong><small> Fatura</small></div>
        <div class="card-body card-block">

            <div class="row form-group">

                <div class="col col-sm-4"><label for="nome"
                        class=" form-control-label"><small>Referencia</small></label><input type="text" id="referencia"
                        placeholder="Digite a referencia" name="referencia"
                        class="input-sm form-control-sm form-control" required>
                </div>

                <div class="col col-sm-8"><label for="vat"
                        class=" form-control-label"><small>Observação</small></label><textarea name="observacao"
                        id="textarea-input" rows="2" placeholder="observacao..." class="form-control"></textarea></div>


                <div class="col-lg-4">
                    <label for="vat" class=" form-control-label"><small>Tipo de despesas</small></label>
                    <select data-placeholder="Escolha o tipo de despesa..." name="tipo_despesa_id" class="standardSelect"
                        tabindex="1">

                        @forelse ($tipo_despesa as $tipo_despesas)

                        <option value="{{ $tipo_despesas->id }}">{{ $tipo_despesas->descricao }}</option>
                        @empty
                        <p>Nenhuma conta encontrada</p>
                        @endforelse
                    </select>
                </div>


                <div class="col-lg-4">
                    <label for="vat" class=" form-control-label"><small>Regime de Inposto</small></label>
                    <select data-placeholder="Escolha o regime" name="Regime_iva_id" class="standardSelect" tabindex="2">

                        @forelse ($iva as $ivas)

                        <option value="{{ $ivas->id }}">{{ $ivas->regime }}-{{ $ivas->percentagem }}%</option>
                        @empty
                        <p>Nenhum Regime</p>
                        @endforelse
                    </select>
                </div>

                <div class="col-lg-4">
                    <label for="vat" class=" form-control-label"><small>Moeda</small></label>
                    <select data-placeholder="Escolha Moeda" name="moeda_id" class="standardSelect" tabindex="1">

                        @forelse ($moeda as $moedas)

                        <option value="{{ $moedas->id }}">{{ $moedas->sigla }}</option>
                        @empty
                        <p>Nenhuma moeda</p>
                        @endforelse
                    </select>
                </div>

                <div class="col-lg-4">
                    <label for="vat" class=" form-control-label"><small>Funcionario</small></label>
                    <select data-placeholder="Escolha Funcionario" name="funcionario_id" class="standardSelect"
                        tabindex="1">

                        @forelse ($funcionario as $funcionarios)

                        <option value="{{ $funcionarios->id }}">{{ $funcionarios->user->name }}</option>
                        @empty
                        <p>Nenhuma Funcionario</p>
                        @endforelse
                    </select>

                </div>


                <div class="col-lg-4">
                    <label for="vat" class=" form-control-label"><small>Fornecedor</small></label>
                    <select data-placeholder="Escolha fornecedor" name="fornecedor_id" class="standardSelect"
                        tabindex="1">

                        <option value="">----</option>
                        @forelse ($fornecedor as $fornecedores)

                        <option value="{{ $fornecedores->id }}">{{ $fornecedores->nome }}</option>
                        @empty
                        
                        <option value="">Nenhum Fornecedor</option>
                        @endforelse
                    </select>

                </div>
                <div class="col-lg-4">
                    <label for="vat" class=" form-control-label"><small>Estado</small></label>
                    <select data-placeholder="Escolha o Estado de Pagamento" name="pago" class="standardSelect"
                        tabindex="1">

                        <option value="1">Pago</option>
                        <option value="0">Não Pago</option>
                        
                    </select>

                </div>


                <div class="col-lg-4">
                    <label for="vat" class=" form-control-label"><small>Metodo de Pagamento</small></label>
                    <select data-placeholder="Escolha Metodo de Pagamento" name="metode_pagamento_id" class="standardSelect"
                        tabindex="1">

                        <option value=""></option>
                        @forelse ($metodo_pagamento as $metodos_pagamentos)

                        <option value="{{ $metodos_pagamentos->id }}">{{ $metodos_pagamentos->metodo }}</option>
                        @empty
                        
                        <option value="">Nenhum metodo</option>
                        @endforelse
                    </select>

                </div>


                <div class="col-lg-4">
                    <label for="vat" class=" form-control-label"><small>Conta de Pagamento</small></label>
                    <select data-placeholder="Escolha Metodo de Pagamento" name="caixa_id" class="standardSelect"
                        tabindex="1">

                        <option value="">---</option>
                        @forelse ($caixa as $caixas)

                        <option value="{{ $caixas->id }}">{{ $caixas->descricao }}</option>
                        @empty
                        
                        <option value="">Nenhum caixa</option>
                        @endforelse
                    </select>

                </div>

                <div class="col col-sm-4"><label for="valor" class=" form-control-label"><small>Valor
                            Total</small></label><input type="text" id="valor_total" name="valor_total" placeholder="Digite o valor total"
                        name="valor" class="input-sm form-control-sm form-control">
                </div>



            </div>
        </div>

    </div>


    <div class="col-lg-12">
        <button type="submit" name="despesas" value="despesas" class="btn btn-primary btn-sm"
            style="float: right">Guardar e
            Novo</button>
    </div>
</form>
<div class="divider col-xl-12"></div>
<div class="card col-xl-6">
    <div class="card-header"><strong>Anexo</strong></div>

    <div class="card-body card-block">
        <div class="col col-sm-12">
            <div class="text-center">
                <div class="btn-group dropdown">
                    <div class="grid-menu grid-menu-2col">
                        <div class="no-gutters row">

                            <form action="{{ route('despesas.create') }}" id="ipload-files"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- <input type="file" name="foto" id="attachments" accept="image/*"> --}}
                                <input type="file" id="attachments" accept="image/*, application/pdf">
                            </form>

                        </div>
                    </div>
                </div>
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