@extends('layouts.index')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Home
                                <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px">Add</a>
                            </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <table id="dataTables-home" class="display" callspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Content</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('Admin_View.FormHome')
</div>

@section('js')
    <script type="text/javascript">
       var table = $('#dataTables-home').DataTable({
            processing: true,
            serverSide: true,
            scrollY:'50vh',
            scrollCollapse: true,
            ajax: "{{ route('api.home') }}",
            columns:[
                {data:'id_home', name:'id_home'},
                {data:'judul',name:'judul'},
                {data:'content', name:'content'},
                {data:'action',name:'action', orderable:false, searchable: false}
            ]
        })

        function addForm() {
            save_method= 'add';
            $('input[name=_method').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Add');
        }

        $(function(){
            $('#modal-form').validator().on('submit', function(e){
                if(!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if(save_method == 'add') url = "{{ url(route('home.store')) }}";
                    else url = "{{ url('/home'). '/' }}" + id;

                    $.ajax({
                        url : url,
                        type : "POST",
                        data : $('#modal-form form').serialize(),
                        success : function($data){
                             $('#modal-form').modal('hide');
                             table.ajax.reload();
                        },
                        error : function(){
                            alert('Oppsss salah data');
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@endsection
@stop