@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Despesas </strong><small>lista</small>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-size: small;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Estado de Pagamento</th>
                            <th>Data</th>
                            <th>Despesa</th>
                            <th>Conta de Pagamento</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($despesa as $despesas)
                        <tr>
                            <td>{{ $despesas->id }}</td>
                            <td> 
                                @if($despesas->pago != 1)
                                Não Pago
                                @else
                                pago 
                                @endif                                         
                            </td>
                            <td>{{ $despesas->created_at }}</td>
                            <td>{{ $despesas->referencia }}</td>
                            <td>{{ $despesas->caixa->descricao }}</td>
                            <td>{{ $despesas->valor_total }}</td>
                        </tr>
                        @empty
                        <p>Nenhuma despesa encontrada</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="fixed-action-btn">
    <a href="{{ route('despesas.create') }}" class="btn-floating btn-large btn-primary">
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