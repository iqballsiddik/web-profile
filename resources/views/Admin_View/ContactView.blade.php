@extends('layouts.index')

@section('content')
@include('Admin_view.AddFormContact')
@include('Admin_view.updateContactForm')
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
                        
                            <button class="btn btn-info" data-toggle="modal" data-target="#myModal">+Contact</button>

                            <button class="btn btn-info pull-right btn-xs" id="read-data">Load Data</button>
                            
                        
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover table-borderless" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody id="contact-info">
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
        <!-- @include('form_portfolio') -->
        </div>
        
</body>
@section('js')
<script trpe="text/javascript">
    // csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // read data
    $('#read-data').on('click',function(){
        $.get("{{ URL::to('admin/read-contact') }}",function(data){
            $("#contact-info").empty().html(data);
        })
    })
    //  add contact
    $("#form-contact").on("submit",function(e){
        
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        var post = $(this).attr('method');
        $.ajax({
            type : post,
            url : url,
            data : data,
            dataTy : 'json',
            success:function(data)
            {
                swal({
                    title: 'Success',
                    text: 'Data has been delete',
                    type: 'success',
                    timer: '1500'
                })
            }
        })
       
    }) 
    // update contact
    $("body").delegate('#contact-info #edit','click',function(e){
        $('#contact-update').modal('show');
    })
        
</script>

@endsection

@stop