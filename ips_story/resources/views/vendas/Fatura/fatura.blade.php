@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Fatura </strong><small>lista</small>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-size: small;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Estado do Pagamento</th>
                            <th>Data</th>
                            <th>Fatura</th>
                            <th>Cliente</th>
                            <th>Nuit</th>
                            <th>Total</th>
                            <th>Opcao</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fatura as $faturas)
                        <tr>
                            <td>{{ $faturas->id }}</td>
                            <td>{{ $faturas->estado_pagamento }}</td>
                            <td>{{ $faturas->created_at }}</td>
                            <td>{{ $faturas->numero_fatura }}</td>
                            <td>{{ $faturas->cliente->nome }}</td>
                            <td>{{ $faturas->cliente->nuit }}</td>
                            <td>{{ $faturas->total }}</td>
                            <td>{{ $faturas->total }}</td>
                            <td>
                                <a href="{{ route('orcamento.detalhes',$faturas) }}"
                                    class="btn btn-info btn-sm">
                                    <i class=" fa fa-eye"></i>
                                </a>
                                <a href="{{ route('orcamento.alterar_orcamento',$faturas) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class=" pe-7s-edit"></i>
                                </a>
                                <a href="{{ route('fatura.destroy',$faturas->id) }}"
                                    onclick="return confirm('Tem sertesa que deseja eliminar')"
                                    class="delete-modal btn btn-danger btn-sm">
                                    <i class=" fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <p>Nenhum orcamento encontrado</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="fixed-action-btn">
    <a href="{{ route('orcamento.create') }}" class="btn-floating btn-large btn-primary">
        <i class="ti-plus"></i>
    </a>
</div>



<script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/init/datatables-init.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
  } );
</script>
@endsection