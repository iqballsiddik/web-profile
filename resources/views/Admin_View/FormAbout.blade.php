@extends('layouts.index')

@section('content')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <a href="{{ route('master.about') }}" >Back List Data </a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                @if(empty($accept))
                                    <form role="form" action="{{ url(route('insert.about'))}}" method="POST" enctype="multipart/form-data" >
                                @else 
                                     <form role="form" action="{{ url(route('update.about')) }}" method="POST" enctype="multipart/form-data" >
                                @endif
                                        {{ csrf_field() }} {{ method_field('POST') }}
                                        <div class="form-group">
                                            <label>Content</label>
                                            <input class="form-control" name="content" value="{{ !empty($accept[0]['content']) ? $accept[0]['content'] : ''}}" >
                                            <input class="form-control" type="hidden" name="id" value="" >
                                        </div>
                                        <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" id="image" name="image" src=""  required>
                                                <span class="help-block with-errors"></span>
                                        </div>
                                        <div class="modal-footer">
                                        @if(empty($accept))
                                            <button type="submit" class="btn btn-success btn-save">Submit</button>
                                        @else 
                                             <input type="hidden" name="id" value="{{ !empty($accept[0]['id_about']) ? $accept[0]['id_about'] : '' }}" >
                                             <button type="submit" class="btn btn-success btn-save">Update</button>
                                        @endif
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