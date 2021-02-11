@extends('layouts.app')

@section('content')

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
                            <th>Quantidade</th>
                            <th>Valor em stok</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="avatar">
                                <div class="round-img" style="height: 30px; width: 30px;">
                                    <a href="#"><img class="rounded-circle" src="{{ asset('images/avatar/1.jpg') }}" alt=""></a>
                                
                                </div></td>
                            <td>
                                Glue Stick
                            </td>
                            <td>400125698</td>
                            <td>star</td>
                            <td>31</td>
                            <td>0122</td>
                            <td>80mt</td>
                        </tr>
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