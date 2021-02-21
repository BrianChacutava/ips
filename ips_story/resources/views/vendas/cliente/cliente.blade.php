@extends('layouts.app')

@section('content')

@if (session('message'))
    <div class="alert alert-success fade show" role="alert">Sucess. <a href="javascript:void(0);"
            class="alert-link">{{ session('message') }}</a>
    </div>
    @endif
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Cliente </strong><small>lista</small>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-size: small;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Nuit</th>
                            <th>Email</th>
                            <th>Grupo</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                            <td>
                                <a href="{{ route('cliente.show',$cliente->id) }}"
                                    class="btn btn-info btn-sm">
                                    <i class=" fa fa-eye"></i>
                                </a>
                                <a href="{{ route('cliente.edit',$cliente->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class=" pe-7s-edit"></i>
                                </a>
                                <a href="{{ route('cliente.destroy1',$cliente->id) }}"
                                    onclick="return confirm('Tem sertesa que deseja eliminar')"
                                    class="delete-modal btn btn-danger btn-sm">
                                    <i class=" fa fa-trash"></i>
                                </a>
                            </td>
                        @forelse ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->nuit }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->gupo_cliente->descricao }}</td>
                        </tr>
                        @empty
                        <p>Nenhum cliente encontrado</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="fixed-action-btn">
    <a href="{{ route('cliente.create') }}" class="btn-floating btn-large btn-primary">
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