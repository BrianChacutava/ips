@extends('layouts.app')

@section('content')

<div class="row" style="font-size: 90%;">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Orçamentos / Cotações </strong><small>lista</small>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-size: 90%;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Data</th>
                            <th>Orcamento numero</th>
                            <th>Cliente</th>
                            {{-- <th>Nuit</th> --}}
                            <th>email</th>
                            <th>Estado</th>
                            <th>Total</th>
                            <th>Opcao</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orcamento as $orcamentos)
                        <tr>
                            <td>{{ $orcamentos->id }}</td>
                            <td>{{ $orcamentos->created_at }}</td>
                            <td>{{ $orcamentos->num_cotacao }}</td>
                            <td>{{ $orcamentos->cliente->nome }}</td>
                            {{-- <td>{{ $orcamentos->cliente->nuit }}</td> --}}
                            <td>{{ $orcamentos->cliente->email }}</td>
                            <td>{{ $orcamentos->estado }}</td>
                            <td>{{ $orcamentos->total }}</td>
                            <td  >
                                <a href="{{ route('orcamento.detalhes',$orcamentos) }}"
                                    class="btn btn-info btn-sm">
                                    <i class=" fa fa-eye"></i>
                                </a>
                                <a href="{{ route('orcamento.alterar_orcamento',$orcamentos) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class=" pe-7s-edit"></i>
                                </a>
                                <a href="{{ route('cliente.destroy',$orcamentos->id) }}"
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