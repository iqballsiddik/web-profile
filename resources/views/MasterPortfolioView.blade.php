@extends('layouts.index')

@section('content')
<body>
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
                        <h4>Portfolio list
                                <a onclick="addForm()" class="btn btn-primary pull-right" style="margin-top: -8px;">Add Portfolio</a>
                        </h4>
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover table-borderless" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Content</th>
                                        <th>Content</th>
                                        <th>Images</th>
                                        <th>Show</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php $no = 1 ?>
                                <tbody>
                                
                                @foreach($listData as $key => $val)
                                    <tr class="odd gradeX">
                                        <td>{{ $no }}</td>
                                        <td>{{ $val['name'] }}</td>
                                        <td>{{ $val['content'] }}</td>
                                        <td><img width="80px" src="{{url('/storage/images/')}}/{{ $val['image'] }}"></td>
                                        <td><a href="#" class="btn btn-info">Show</td>
                                        <td><a href="{{ url('/admin/edit-portfolio'). '?id='.$val['id_portfolio'] }}"  class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-edit"></i>Edit</a></td>
                                        <td><a onclick="deleteProcess({{ $val['id_portfolio'] }})" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-denger"></i>Delete</a></td>
                                    </tr>
                                    <?php $no++ ?>
                                @endforeach
                                </tbody>    
                                
                            </table>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        @include('form_portfolio')
        </div>
        
</body>
@section('js')
<script trpe="text/javascript">
    
    var urlDelete = "{{url('admin/delete-portfolio')}}";
    
    function deleteProcess(id_portfolio){
        swal({
        title: "Apakah anda yakin ?",
        text: "Anda akan menghapus data.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete ",
        closeOnConfirm: true,
       }, function (){
          window.location.href = urlDelete+'/'+id_portfolio;
       });
    }
    
    function addForm(){
        $('input[name=_method').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form_porfolio')[0].reset();
        $('.modal-title').text('Add');
    }

</script>


@endsection

@stop