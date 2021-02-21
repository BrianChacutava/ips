@extends('layouts.app')

@section('content')

<form action="{{ route('despesa.store1') }}">

<div class="card">
    <div class="card-header"><strong>Criar</strong><small> Despesa</small></div>
    <div class="card-body card-block">

        <div class="row form-group">

            <div class="col col-sm-4"><label for="nome"
                    class=" form-control-label"><small>Referencia</small></label><input type="text" id="referencia"
                    placeholder="Digite a referencia" name="referencia" class="input-sm form-control-sm form-control">
            </div>

            <div class="col col-sm-8"><label for="vat"
                    class=" form-control-label"><small>Descrição</small></label><textarea name="descricao"
                    id="textarea-input" rows="2" placeholder="Descrição..." class="form-control"></textarea></div>


            <div class="col-lg-4">
                <label for="vat" class=" form-control-label"><small>Contas de despesas</small></label>
                <select data-placeholder="Escolha o tipo de despesa..." name="tipoDespesa" class="standardSelect"
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
                <select data-placeholder="Escolha o regime" name="iva" class="standardSelect" tabindex="2">

                    @forelse ($iva as $ivas)

                    <option value="{{ $ivas->id }}">{{ $ivas->regime }}-{{ $ivas->percentagem }}%</option>
                    @empty
                    <p>Nenhum Regime</p>
                    @endforelse
                </select>
            </div>

            <div class="col-lg-4">
                <label for="vat" class=" form-control-label"><small>Moeda</small></label>
                <select data-placeholder="Escolha Moeda" name="moeda" class="standardSelect" tabindex="1">

                    @forelse ($moeda as $moedas)

                    <option value="{{ $moedas->id }}">{{ $moedas->sigla }}</option>
                    @empty
                    <p>Nenhuma moeda</p>
                    @endforelse
                </select>
            </div>

            <div class="col-lg-4">
                <label for="vat" class=" form-control-label"><small>Funcionario</small></label>
                <select data-placeholder="Escolha Funcionario" name="funcionario" class="standardSelect" tabindex="1">

                    @forelse ($funcionario as $funcionarios)

                    <option value="{{ $funcionarios->id }}">{{ $funcionarios->user->name }}</option>
                    @empty
                    <p>Nenhuma Funcionario</p>
                    @endforelse
                </select>

            </div>

            <div class="col col-sm-4"><label for="valor" class=" form-control-label"><small>Valor
                        Total</small></label><input type="text" id="valor total" placeholder="Digite o valor total"
                    name="valor" class="input-sm form-control-sm form-control">
            </div>
            
            <div class="col col-sm-8">
                <label for="vat" class=" form-control-label"><small>Anexo</small></label>
                <input type="file" id="file-input" name="file-input" class="form-control-file">
            </div>


        </div>
    </div>
    
</div>


<div class="col-lg-12">
    <button type="submit" name="despesas" value="despesas" class="btn btn-primary btn-sm" style="float: right">Guardar e
        Novo</button>
</div>
</form>

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