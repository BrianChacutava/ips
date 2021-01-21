@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header"><strong>Criar</strong><small> Orçamento</small></div>
    <div class="card-body card-block">

        <div class="row form-group">

            <div class="col col-sm-4"><label for="nome"
                    class=" form-control-label"><small>Referência</small></label><input type="text" id="company"
                    placeholder="Digite o nome" class="input-sm form-control-sm form-control">
            </div>

            <div class="col-lg-4">
                <label for="vat" class=" form-control-label"><small>Cliente</small></label>
                <select data-placeholder="Escolha o Cliente..." class="standardSelect" tabindex="1">
                    <option value="" label="default"></option>
                    <option value="United States">solar work</option>
                    <option value="United Kingdom">CDA</option>
                    <option value="Afghanistan">Mazar</option>
                </select>
            </div>

            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Data</small></label><input
                    type="date" id="vat" placeholder="Digite o nuite" class="input-sm form-control-sm form-control">
            </div>



            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Email</small></label><input
                    type="email" id="vat" placeholder="Digite o email" class="input-sm form-control-sm form-control">
            </div>

            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Endereço</small></label><input
                    type="text" id="vat" placeholder="Digite o endereço" class="input-sm form-control-sm form-control">
            </div>

            <div class="col-lg-4">
                <label for="vat" class=" form-control-label"><small>Vendedor</small></label>
                <select data-placeholder="Escolha o Funcionario..." class="standardSelect" tabindex="1">
                    <option value="" label="default"></option>
                    <option value="United States">Brian Chacutava</option>
                    <option value="United Kingdom">Rasquim Marua</option>
                </select>
            </div>

            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Desconto
                        (%)</small></label><input type="text" id="vat" placeholder="0,00%"
                    class="input-sm form-control-sm form-control"></div>

            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Estado do
                        documento</small></label><input type="text" name="estado" id="estado" placeholder=""
                    value="pendente" class="input-sm form-control-sm form-control"></div>



            <div class="col-lg-12" style="margin-top: 35px">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Produtos e Serviços</strong>
                        <button type="button" class="btn btn-primary btn-sm" style="float: right">Adicionar
                            Item</button>

                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">Artigo</th>
                                    <th>Descrição</th>
                                    <th>Quantidade</th>
                                    <th>Unidade</th>
                                    <th>Preço Unit.</th>
                                    <th>Desconto</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="serial">toner</td>
                                    <td>
                                        131A
                                    </td>
                                    <td> <span class="product">2</span> </td>
                                    <td><span class="count">uni</span></td>
                                    <td><span class="count">2500</span></td>
                                    <td>0,00%</td>
                                    <td class="count">
                                        5000
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div>


            <div class="divider"></div>
            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>subtotal</small></label><input
                    type="text" name="estado" id="estado" placeholder="" value="11215"
                    class="input-sm form-control-sm form-control"></div>

            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Iva
                        (17%)</small></label><input type="text" name="estado" id="estado" placeholder="" value="22,5"
                    class="input-sm form-control-sm form-control"></div>

            <div class="col col-sm-4"><label for="vat" class=" form-control-label"><small>Total</small></label><input
                    type="text" name="estado" id="estado" placeholder="" value="22 256"
                    class="input-sm form-control-sm form-control"></div>

        </div>
    </div>
</div>


<div class="fixed-action-btn">

    <button class="btn-floating btn btn-primary "></button>
    {{-- <a href="#" class="btn-floating btn-large btn-primary">
        <i class="ti-plus"></i>
    </a> --}}
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