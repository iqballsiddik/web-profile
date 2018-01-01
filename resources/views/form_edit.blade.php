@extends('layouts.index')

@section('content')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <a href="{{ url(route('master.portfolio')) }}" >Back List Data </a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="{{ url(route('update-portfolio'))}}" method="POST" enctype="multipart/form-data" >
                                        {{ csrf_field() }} {{ method_field('POST') }}
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="{{ !empty($accept[0]['name']) ? $accept[0]['name'] : '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Content</label>
                                            <input class="form-control" name="content" value="{{ !empty($accept[0]['content']) ? $accept[0]['content'] : '' }}" >
                                            <input class="form-control" type="hidden" name="id" value="{{ !empty($accept[0]['id_portfolio']) ? $accept[0]['id_portfolio'] : '' }}" >
                                        </div>
                                        <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" id="image" name="image" src="public/images/{{ !empty($accept[0]['image']) ? $accept[0]['image'] : '' }}"  required>
                                                <span class="help-block with-errors"></span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success btn-save">Update</button>
                                           
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
@endsection