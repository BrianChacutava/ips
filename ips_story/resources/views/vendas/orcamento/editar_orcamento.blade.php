@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header"><strong>Editar</strong><small> Orçamento</small>
        
    </div>
    <div class="card-body card-block">
        @if ($validado == 'true')

        <form action="{{ route('orcamento.store1') }}">
            @else
            <form action="{{ route('orcamento.store1', $cotacao) }}">
                @endif

                <div class="row form-group">

                    {{-- <div class="col col-sm-4"><label for="nome"
                    class=" form-control-label"><small>Referência</small></label><input type="text" id="company"
                    placeholder="Digite o nome" value="{{ $referencia }}" class="input-sm form-control-sm
                    form-control">
                </div> --}}


                <div class="col-lg-4">
                    <label for="vat" class=" form-control-label"><small>Cliente</small></label>
                    <select name="cliente" data-placeholder="Escolha o Cliente..." class="standardSelect" tabindex="1">
                        @isset($cotacao)
                        <option value="{{ $cotacao->cliente->id }}">{{ $cotacao->cliente->nome }}</option>
                        <option value="">----------------</option>
                        @endisset
                        @if ($validado == 'true')
                        @forelse ($cliente as $clientes)

                        <option value="{{ $clientes->id }}">{{ $clientes->nome }}</option>
                        @empty
                        <p>Não existe cliente</p>
                        @endforelse

                        @else
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>

                        @endif

                    </select>
                </div>

                <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Data</small></label>
                    @if ($validado == 'true')
                    <input type="date" id="vat" placeholder="Digite o nuite"
                        class="input-sm form-control-sm form-control">
                    @else
                    <input type="text" id="vat" placeholder="Digite o nuite"
                        class="input-sm form-control-sm form-control" value="{{ $cotacao->created_at }} " disabled="">
                    @endif

                </div>


                @if ($validado == 'true')

                <div class="col col-sm-4"><label for="vat"
                        class=" form-control-label"><small>Email</small></label><input type="email" id="vat"
                        placeholder="Digite o email" class="input-sm form-control-sm form-control">
                </div>
                @else

                <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Email</small></label>
                    <input type="email" id="vat" placeholder="Digite o email"
                        class="input-sm form-control-sm form-control" value="{{ $cliente->email }} " disabled="">
                </div>
                @endif


                @if ($validado == 'true')

                <div class="col col-sm-4"><label for="vat"
                        class=" form-control-label"><small>Endereço</small></label><input type="text" id="vat"
                        placeholder="Digite o endereço" class="input-sm form-control-sm form-control">
                </div>
                {{-- </div> --}}
                @else

                <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Endereço</small></label>
                    <input type="text" id="vat" placeholder="Digite o endereço"
                        class="input-sm form-control-sm form-control"
                        value="{{ $cliente->endereco->rua }}, {{ $cliente->endereco->provincium->nome }} " disabled="">
                </div>

                @endif

                <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>
                            Vendedor</small></label><input type="text" id="vat"
                        value="{{Auth::user()->nome}} - Brian Chacutava" class="input-sm form-control-sm form-control">
                </div>

                <div class="divider col col-sm-12">.</div>


                {{-- @if ($validado == 'true') --}}
{{-- 
                <div class="col col-sm-12">
                    <button type="submit" class="btn btn-primary btn-sm" style="float: right">continuar
                    </button>
                </div> --}}
                {{-- @endif --}}

                @isset($cotacao)

                <div class="col-lg-12" style="margin-top: 35px">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Produtos e Serviços</strong>

                            <button type="button" class="btn btn-primary btn-sm" style="float: right"
                                data-toggle="modal" data-target="#smallmodal2">Adicionar
                                Produto</button>
                            {{-- <button class="btn btn-primary btn-sm" style="float: right" onclick="adicionaLinha('tbl')">Adicionar</button> --}}
                        </div>

                        {{--  Tabela  --}}

                        <div class="table-stats order-table ov-h" id="test">
                            <table class="table " id="target">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th class="serial">Artigo</th>
                                        <th>Descrição</th>
                                        <th>Quantidade</th>
                                        <th>Preço Unit.</th>
                                        <th>Desconto</th>
                                        <th>Total</th>
                                        <th>Opção</th>
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
                                        <td>
                                            <a href="{{ route('orcamento.remove_artigo', ['id'=>$artigo->pivot->id]) }}"
                                                onclick="return confirm('Tem sertesa que deseja eliminar')"
                                                class="delete-modal btn btn-danger btn-sm">
                                                <i class=" fa fa-trash"></i>
                                            </a>
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
                            {{-- <table id="tbl" style="border: 1">
                            <tr>
                            <td>Produto</td>
                            <td>Valor</td>
                            <td>Acao</td>
                            </tr>
                            </table>   --}}
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
                @endisset
            </form>
            @isset($cotacao)

            <form action="{{ route('orcamento.salvar_alteracao', $cotacao) }}" class="col col-sm-12 form-row">

                <div class="col col-sm-4"><label for="vat"
                        class=" form-control-label"><small>subtotal</small></label><input  type="text" name="subtotal"
                        id="subtotal" placeholder="" value="{{ $subtotal }} "
                        class="input-sm form-control-sm form-control" >
                </div>

                <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Iva
                            17%</small></label><input  type="text"  name="iva" id="iva" placeholder=""
                        value="{{$subtotal*0.17 }}" class="input-sm form-control-sm form-control" >
                </div>

                <div class="col col-sm-4"><label for="vat"
                        class=" form-control-label"><small>Total</small></label><input type="text" name="Total"
                        id="Total" placeholder="" value="{{ $subtotal+($subtotal*0.17) }}"
                        class="input-sm form-control-sm form-control" >
                </div>
                

                <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Estado do
                    documento</small></label><input type="text" name="estado" id="estado" placeholder=""
                value="{{ $cotacao->estado }}" class="input-sm form-control-sm form-control">
        </div>
                <div class="divider col col-sm-12">.</div>


                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-sm"
                        style="float: right">Alterar Cotação</button>
                </div>
            </form>
            @endisset
    </div>
</div>

</div>
{{--  Model fade  --}}
@isset($cotacao)

<div class="modal fade" id="smallmodal2" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Adicionar Preço</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('orcamento.add_artigo', ['cotacao' => $cotacao]) }}">

                @csrf
                <div class="modal-body">

                    <div class="col-lg-12">
                        <label for="vat" class=" form-control-label"><small>Artigo</small></label>
                        <select id="artigo_id" name="artigo_id" data-placeholder="Escolha o artigo..."
                            class="standardSelect" tabindex="1">

                            <option value="">---</option>
                            @forelse ($artigos as $artigo)

                            <option value="{{ $artigo->id }}">
                                {{ $artigo->artigo }}</option>
                            @empty
                            <p>Nenhum preco</p>
                            @endforelse
                        </select>
                    </div>

                    {{--  <div class="col-lg-12">
                                    <label for="vat" class=" form-control-label"><small>Preço</small></label>

                                        <div class="col-lg-12">
                                            <select id="preco" name="preco" class="form-control-sm form-control">
                                            </select>
                                        </div>
                                </div>  --}}

                    <input type="hidden" name="editar" id="editar" value="true">
                    <div class="col col-sm-12"><label for="nome" class=" form-control-label"><small>
                                Preço</small></label><input type="number" step="0.01" id="preco"
                            placeholder="Digite o preço" name="preco" class="input-sm form-control-sm form-control"
                            value="1">
                    </div>

                    <div class="col col-sm-12"><label for="nome" class=" form-control-label"><small>
                                Quntidade</small></label><input type="text" id="quantidade"
                            placeholder="Digite a quantidade" name="quantidade"
                            class="input-sm form-control-sm form-control" value="1">
                    </div>
                    <div class="col col-sm-12"><label for="nome" class=" form-control-label"><small>Desconto
                            </small></label><input type="number" step="0.01" id="desconto" name="desconto"
                            placeholder="0.01" name="quantidade" class="input-sm form-control-sm form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endisset

@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('plugins\kartik-v-bootstrap-fileinput-5c94ab0\css\fileinput.min.css') }}">
@endpush

@push('js')

<script src="{{ asset('plugins\kartik-v-bootstrap-fileinput-5c94ab0\js\fileinput.min.js') }}"></script>
<script src="{{ asset('plugins\kartik-v-bootstrap-fileinput-5c94ab0\themes\fa\theme.min.js') }}"></script>



<script src="{{ asset('inplace-editing-table-simpletablecelleditor\SimpleTableCellEditor.es6.min.js') }}"></script>



<script>
    function updateRow(target) {
    const data = {
        sale_code: target.find('.code').text(),
        
        sale_name: target.find('.name').text(),
        quantity: target.find('.quantity').text(),
        unit_amount: target.find('.unit_amount').text(),
        discount: target.find('.discount').text(),
    }

     console.log(data)
let data1 = data
    $.ajax({
        
        type: "PUT",
        url: target.attr('_target'),
        dataType: "JSON",
        data: data,
        statusCode: {
            202: function (response) {
                
            },
            401: (response) => {
 
                console.log('@lang("Volte a fazer o login").');


                
            },
            403: () => {
                 
            },
            422: (response) => {
                $.each(response.responseJSON.errors, function (indexInArray, valueOfElement) {
                    toastr.error(valueOfElement[0])
                });

                console.log('@lang("Verifique os dados inseridos e submeta de novo").');

                
            },
        },
    });
}
           


function configEditors() {

    var logAllEvents = true;
    const editor = new SimpleTableCellEditor("target");

    $('#target').on("cell:edited", function (event) {
        updateRow($(event.element).parent())
    });

    editor.SetEditableClass('text-edit', {

        // method used to vali<a href="https://www.jqueryscript.net/time-clock/">date</a> new value
        validation: (value) => {
            return true;
        }, //method used to validate new value
        // method used to format new value
        formatter: (value) => {
            return value;
        }, //Method used to format new value

        // key codes
        keys: {
            validation: [13],
            cancellation: [27]
        }
    });
    editor.SetEditableClass('numeric-edit', {
        // method used to vali<a href="https://www.jqueryscript.net/time-clock/">date</a> new value
        validation: (value) => {
            // console.log('validatong')
            if ($.isNumeric(value))
                return value >= 0

        },

        // method used to format new value
        formatter: (value) => {
            let data = parseFloat(value)
            return data.toFixed(2)
        },

        // key codes
        keys: {
            validation: [13],
            cancellation: [27]
        }
    });


    if (logAllEvents) {

        $('table').on("cell:onEditEnter", function (event) {
            // console.log('onEditEnter event');
        });

        $('table').on("cell:onEditEntered", function (event) {
            // console.log('onEditEntered event');
        });

        $('table').on("cell:onEditExit", function (event) {
            // console.log('onEditExit event');
        });

        $('table').on("cell:onEditExited", function (event) {
            // console.log('onEditExited event');
        });
    }
}






    jQuery(document).ready(function () {
        configEditors();
        jQuery("#attachments").fileinput({
            theme: "fa",
            uploadExtraData: {
                '_token': "{{ csrf_token() }}"
            },
            uploadUrl: '#'
        })
    });  
</script>

{{--  
<script>

    function chagePrecoByArtigo(){
alert(artigo);

        const artigo_id = {!! $artigos->toJson() !!};
        const selectedOption = jQuery('select#artigo_id').val()
        let artigo = (new Searchable(artigo_id)).data(selectedOption)
        let html = '';

        console.log(artigo);
        if(artigo != null)
            jQuery.each(artigo.precos, function (index, value) { 
              html += "<option value='"+value.id+"'>"+value.nome+"</option>"
            });
            jQuery('select#preco').html(html)
    }

    jQuery(document).ready(chagePrecoByArtigo);
    jQuery(document).on('change', '#artigo_id',chagePrecoByArtigo);
</script>  --}}

@endpush