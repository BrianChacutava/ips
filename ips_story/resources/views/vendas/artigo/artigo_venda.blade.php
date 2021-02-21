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
                <strong class="card-title">Artigo </strong><small>lista</small>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered" style="font-size: small;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Img</th>
                            <th>Artigo</th>
                            <th>Descrição</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Tipo de Artigo</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($artigo as $artigos)
                        <tr>
                            <td>{{ $artigos->id }}</td>
                            <td class="avatar">
                                <div class="round-img" style="height: 30px; width: 30px;">
                                    <a href="#"><img class="rounded-circle" src="{{ asset('images/avatar/1.jpg') }}" alt=""></a>
                                
                                </div></td>
                            <td>
                                {{ $artigos->artigo }}
                            </td>
                            <td>{{ $artigos->descricao }}</td>
                            <td>{{ $artigos->marca }}</td>
                            <td>{{ $artigos->modelo_marca }}</td>
                            <td>{{ $artigos->tipo_artigo->tipo }}</td>
                            <td>
                                <a href="{{ route('artigo.show',$artigos->id) }}"
                                    class="btn btn-info btn-sm">
                                    <i class=" fa fa-eye"></i>
                                </a>
                                <a href="{{ route('artigo.edit',$artigos->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class=" pe-7s-edit"></i>
                                </a>
                                <a href="{{ route('artigo.destroy',$artigos->id) }}"
                                    onclick="return confirm('Tem sertesa que deseja eliminar')"
                                    class="delete-modal btn btn-danger btn-sm">
                                    <i class=" fa fa-trash"></i>
                                </a>
                            </td>
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
    <a href="{{ route('artigo.create') }}" class="btn-floating btn-large btn-primary">
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