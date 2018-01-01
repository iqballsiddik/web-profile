<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" method="post" action="{{ url(route('upload-portfolio')) }}" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="alert alert-denger print-error-msg" style="display:none">
                    <ul> </ul>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title">Add Data</h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control"  autofocus required>
                            <span class="help-block with-errors" ></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content" class="col-md-3 control-label">Content</label>
                        <div class="col-md-6">
                            <input type="text" id="content" name="content" class="form-control" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="image" class="col-md-3 control-label">Image</label>
                      <div class="col-md-6">
                          <input type="file" id="image" name="image"  required>
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>